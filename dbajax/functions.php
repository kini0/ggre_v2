<?php

$routes = array(
    'accueil' => '',
    'utilisateur' => 'utilisateurs',
    'typeprestation' => 'typeprestation',
    'typeabsence' => 'typeabsence',
    'prestation' => 'prestations',
    'client' => 'clients',
    'collaborateur' => 'collaborateurs',
    'planning' => 'planning',
    'etat' => 'etat',
);

$body_attributes = 'class="hold-transition skin-green sidebar-mini" '; //style="height: auto;"
$app_name = 'Clinett';
$date_fin_systeme = '01/01/3000';


if(date("d") >= '05') {
    $DATE_LIMIT_MODIFICATION = date("Y-m-01");
} else {
    $DATE_LIMIT_MODIFICATION = date("Y-m-d", strtotime("-1 month", strtotime(date("Y-m-01"))));
}

function get_route_url($page_name) {
    global $routes;
    return $routes[$page_name];
}

function get_page_name($slug) {
    global $routes;
    $page_name = array_keys($routes, $slug);
    return $page_name[0];
}

function date_fr_to_en($date_fr) {
    $d = explode('/', $date_fr);
    return $d[2] .'-'. $d[1] .'-'. $d[0];
}

function a_droit($groupe) {
    if($_SESSION['user']['groupe'] == 'ADMINISTRATEUR') {
        return true;
    } else {
        if(empty($_SESSION['user']['droits'])) {
            return false;
        } else {
            $droits = explode(",", $_SESSION['user']['droits']);
            return in_array($groupe, $droits);
        }
    }
}

/**
 * Cette fonction retourne un tableau de timestamp correspondant
 * aux jours fériés en France pour une année donnée.
*/
function jours_feries($year = null) {
    global $InstanceCache;


    if ($year === null) {
        $year = intval(date('Y'));
    } else {
        $year = intval($year);
    }

    $cache_key = 'jours_feries_'. $year; 
    $CachedString = $InstanceCache->getItem($cache_key);

    if (is_null($CachedString->get())) {
        $easterDate  = easter_date($year); // Paques
        $easterDay   = date('j', $easterDate);
        $easterMonth = date('n', $easterDate);
        $easterYear   = date('Y', $easterDate);

        $holidays = array(
            // Dates fixes
            mktime(0, 0, 0, 1,  1,  $year),  // 1er janvier
            mktime(0, 0, 0, 5,  1,  $year),  // Fête du travail
            mktime(0, 0, 0, 5,  8,  $year),  // Victoire des alliés
            mktime(0, 0, 0, 7,  14, $year),  // Fête nationale
            mktime(0, 0, 0, 8,  15, $year),  // Assomption
            mktime(0, 0, 0, 11, 1,  $year),  // Toussaint
            mktime(0, 0, 0, 11, 11, $year),  // Armistice
            mktime(0, 0, 0, 12, 25, $year),  // Noel

            // Dates variables
            mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear), // Lundi de pacques
            mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear), // Pentecote
            mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear), // Ascenssion
        );

        sort($holidays);

        $CachedString->set($holidays);// ->expiresAfter(60);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
        return $CachedString->get();

    } else {
        return $CachedString->get(); // Will print 'First product'
    }
}

/**
* @param DateTime $date
*
* @return bool
*/
function est_jour_ferie($date = null) {
    if ($date) {
        $date = strtotime($date);
    } else {
        $date = time();
    }

    $est_ferie = false;

    $jours_feries = jours_feries(date("Y", $date));
    $d = date('Y-m-d', $date);
    foreach ($jours_feries as $jour) {
        if ($d == date('Y-m-d', $jour)) {
            $est_ferie = true;
            break;
        }
    }
    return $est_ferie;
}

function est_absent($date = null, $id = null, $type='client') {
    global $pdo;
    
    // $sql = "SELECT *
    //         FROM absence_{$type} 
    //         WHERE  {$type}_id = '$id'
    //             AND ('{$date}' BETWEEN datedebut AND datefin)"; 

    $sql = "SELECT *
            FROM absence_{$type} 
            WHERE  {$type}_id = '$id'
                AND (':date' BETWEEN datedebut AND datefin)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':date' => $date));
    $nb_rows = $stmt->rowCount() > 0;
    $stmt->closeCursor();
    return $nb_rows > 0;
    // return $pdo->query($sql)->rowCount() > 0;
}

function diff_minute($heure_debut, $heure_fin) {
    if($heure_debut <= $heure_fin) {
        $intervalle =  strtotime($heure_debut) - strtotime($heure_fin); 
    } else {
        $intervalle =  strtotime(date("Y-m-d") .' '. $heure_debut) - strtotime(date("Y-m-d",strtotime("+1 day")) .' '. $heure_fin); 
    }

    return abs($intervalle / 60); //  % 60

    // SELECT (TIME_TO_SEC('10:30:00') - TIME_TO_SEC('08:00:00')) / 60  AS nbreminute;
}

function taches($type, $date_debut, $date_fin, $collaborateur_id = null, $client_id = null ) {
    global $db_tablename;
    global $pdo;


    set_time_limit(10);

    
    // initialistation des valeurs
    $events = array(); // Pour le planning
    $nbre_minute_total = 0; // Pour horaire

    $jour_debut = date("w", strtotime($date_debut));

    $whereClause = '';
    if(!empty($collaborateur_id)) {
        // $whereClause .= " AND h.collaborateur_id = '$collaborateur_id' ";
        $whereClause .= " AND h.collaborateur_id = :collaborateur_id ";
    }

    if(!empty($client_id)) {
        // $whereClause .= " AND p.client_id = '$client_id' ";
        $whereClause .= " AND p.client_id = :client_id ";
    }  

    try {
        // $sql = "SELECT h.*, 
        //             p.periodicite_frequence, p.client_id, p.type_contrat, p.commentaire,
        //             cl.nom AS client, 
        //             tp.libelle AS prestation, 
        //             ta.libelle AS raison_absence,
        //             ut.couleur AS utilisateur_couleur,
        //             ut.nom AS utilisateur_nom,
        //             tp.couleur AS type_prestation_couleur,
        //             cl.jour_ferie
        //         FROM horaire h
        //             INNER JOIN prestation p ON p.id = h.prestation_id
        //             INNER JOIN client cl ON cl.id = p.client_id
        //             INNER JOIN typeprestation tp  ON tp.id = p.type_prestation_id
        //             LEFT JOIN typeabsence ta  ON ta.id = h.raison_remplacement_id
        //             LEFT JOIN utilisateur ut  ON ut.id = h.updated_by
        //         WHERE h.date_debut <= h.date_fin
        //             AND h.date_debut <= '$date_fin' 
        //             AND h.date_fin >= '$date_debut'
        //             $whereClause
        //         ";

        $sql = "SELECT h.*, 
                    p.periodicite_frequence, p.client_id, p.type_contrat, p.commentaire,
                    cl.nom AS client, 
                    tp.libelle AS prestation, 
                    ta.libelle AS raison_absence,
                    ut.couleur AS utilisateur_couleur,
                    ut.nom AS utilisateur_nom,
                    tp.couleur AS type_prestation_couleur,
                    cl.jour_ferie
                FROM horaire h
                    INNER JOIN prestation p ON p.id = h.prestation_id
                    INNER JOIN client cl ON cl.id = p.client_id
                    INNER JOIN typeprestation tp  ON tp.id = p.type_prestation_id
                    LEFT JOIN typeabsence ta  ON ta.id = h.raison_remplacement_id
                    LEFT JOIN utilisateur ut  ON ut.id = h.updated_by
                WHERE h.date_debut <= h.date_fin
                    AND h.date_debut <= :date_fin 
                    AND h.date_fin >= :date_debut
                    $whereClause
                ";
        $result = $pdo->prepare($sql);
        $result->bindValue(':date_debut', $date_debut);
        $result->bindValue(':date_fin', $date_fin);
        if(!empty($collaborateur_id)) {
            $result->bindValue(':collaborateur_id', $collaborateur_id, PDO::PARAM_INT);
        }

        if(!empty($client_id)) {
            $result->bindValue(':client_id', $client_id, PDO::PARAM_INT);
        }  
        
        $result->execute();

        // echo 'Nombre ligne = '. $result->rowCount(); exit;
        // echo $result->debugDumpParams(); exit;

        // $result->closeCursor();

        // $result = $pdo->query($sql); // die($sql);

        // echo "Duree = {$debug_duree} secondes\n"; exit;

        $i = 1;
        $j_semaine = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if($row['date_debut'] < $date_debut) {
                $date_debut_prestation = $date_debut;
            } else {
                $date_debut_prestation = $row['date_debut'];
            }

            if($row['date_fin'] < $date_fin) {
                $date_fin_prestation = $row['date_fin'];
            } else {
                $date_fin_prestation = $date_fin;
            }

            $duree_minute = diff_minute($row['heure_debut'], $row['heure_fin']) - diff_minute("00:00:00", $row['pause']);
            
            switch ($row['periodicite_frequence']) {

                case 'SEMAINE':
                    // Calcul des jours
                    $date_encours = $date_debut_prestation;

                    if(date("w", strtotime($date_debut_prestation)) == $row['jour']) {
                        $date_encours = $date_debut_prestation;
                    } else {
                        $date_encours = date("Y-m-d", strtotime('next '. $j_semaine[$row['jour']], strtotime($date_debut_prestation)));
                    }

                    while ($date_encours <= $date_fin_prestation) {
                        if($row['jour_ferie'] != 1) {
                            $jour_valide = !est_jour_ferie($date_encours);
                        } else {
                            $jour_valide = true;
                        }

                        if($jour_valide) {
                            $jour_valide = !est_absent($date_encours, $row['client_id'], 'client');

                            if($jour_valide) {
                                $jour_valide = !est_absent($date_encours, $row['collaborateur_id'], 'collaborateur');
                            }
                        }

                        if($jour_valide) {
                            if($type == 'planning') {
                                $ev = new stdClass;
                                $ev->id = $i++;
                                $ev->resourceId = $row['collaborateur_id'];
                                $ev->color = $row['type_prestation_couleur'];
                                $ev->title = $row['client'] ."\n". $row['prestation'];

                                $ev->start = $date_encours .' '. $row['heure_debut'];

                                if($row['heure_debut'] <= $row['heure_fin']) {
                                    $ev->end = $date_encours .' '.  $row['heure_fin'];
                                } else {
                                    $ev->end = date("Y-m-d",strtotime("$date_encours +1 day")) .' '.  $row['heure_fin'];
                                }

                                // Données extra
                                $ev->horaire_id = $row['id'];
                                $ev->prestation_id = $row['prestation_id'];
                                $ev->type_contrat = $row['type_contrat'];
                                $ev->prestation = $row['prestation'];
                                $ev->client_id = $row['client_id'];
                                $ev->client = $row['client'];
                                $ev->collaborateur_remplacant_id = $row['collaborateur_remplacant_id'];
                                $ev->raison_id = $row['raison_id'];
                                $ev->collaborateur_remplace_id = $row['collaborateur_remplace_id'];
                                $ev->raison_remplacement_id = $row['raison_remplacement_id'];
                                $ev->raison_absence = $row['raison_absence'];
                                $ev->commentaire = $row['commentaire'];
                                $ev->utilisateur_nom = $row['utilisateur_nom'];
                                $ev->duree = $duree_minute / 60;


                                // Ajout à la liste dans le calendrier
                                $events[] = $ev;
                            }

                            if($type == 'horaire') {
                                $nbre_minute_total += $duree_minute;
                            }
                        }

                        $date_encours = date("Y-m-d", strtotime("+7 DAY", strtotime($date_encours)));
                    }
                    break;


                case 'MOISJOUR':
                    // Calcul des jours
                    $date_encours = date("Y-m-d", strtotime($row['jourmois'] . ' '. $j_semaine[$row['jour']] .' of this month', strtotime($date_debut_prestation)));

                    if($date_encours < $date_debut_prestation) {
                        $date_encours = date("Y-m-d", strtotime($row['jourmois'] . ' '. $j_semaine[$row['jour']] .' of next month', strtotime($date_debut_prestation)));
                    }

                    if($row['date_fin'] < $date_fin) {
                        $date_fin_prestation = $row['date_fin'];
                    } else {
                        $date_fin_prestation = $date_fin;
                    }

                    while ($date_encours <= $date_fin_prestation) {
                        if($row['jour_ferie'] != 1) {
                            $jour_valide = !est_jour_ferie($date_encours);
                        } else {
                            $jour_valide = true;
                        }

                        if($jour_valide) {
                            $jour_valide = !est_absent($date_encours, $row['client_id'], 'client');

                            if($jour_valide) {
                                $jour_valide = !est_absent($date_encours, $row['collaborateur_id'], 'collaborateur');
                            }
                        }

                        if($jour_valide) {
                            if($type == 'planning') {
                                $ev = new stdClass;
                                $ev->id = $i++;
                                $ev->resourceId = $row['collaborateur_id'];
                                $ev->color = $row['type_prestation_couleur'];
                                $ev->title = $row['client'] ."\n". $row['prestation'];

                                $ev->start = $date_encours .' '. $row['heure_debut'];

                                if($row['heure_debut'] <= $row['heure_fin']) {
                                    $ev->end = $date_encours .' '.  $row['heure_fin'];
                                } else {
                                    $ev->end = date("Y-m-d",strtotime("$date_encours +1 day")) .' '.  $row['heure_fin'];
                                }

                                // Données extra
                                $ev->horaire_id = $row['id'];
                                $ev->prestation_id = $row['prestation_id'];
                                $ev->type_contrat = $row['type_contrat'];
                                $ev->prestation = $row['prestation'];
                                $ev->client_id = $row['client_id'];
                                $ev->client = $row['client'];
                                $ev->collaborateur_remplacant_id = $row['collaborateur_remplacant_id'];
                                $ev->raison_id = $row['raison_id'];
                                $ev->collaborateur_remplace_id = $row['collaborateur_remplace_id'];
                                $ev->raison_remplacement_id = $row['raison_remplacement_id'];
                                $ev->raison_absence = $row['raison_absence'];
                                $ev->commentaire = $row['commentaire'];
                                $ev->utilisateur_nom = $row['utilisateur_nom'];
                                $ev->duree = $duree_minute / 60;


                                // Ajout à la liste dans le calendrier
                                $events[] = $ev;
                            }

                            if($type == 'horaire') {
                                $nbre_minute_total += $duree_minute;
                            }
                        }

                        // $prochain_mois = date("Y-m-d", strtotime("next month", strtotime($date_encours)));
                        $date_encours = date("Y-m-d", strtotime($row['jourmois'] . ' '. $j_semaine[$row['jour']] .' of next month', strtotime($date_encours)));
                    }
                    break;

                case 'MOIS':
                    $mois_debut = date("Y-m", strtotime($date_debut_prestation));
                    $no_jour = str_pad($row['jour'], 2, '0', STR_PAD_LEFT);

                    // Calcul des jours
                    $date_encours = $mois_debut. '-'. $no_jour;

                    if($date_encours < $date_debut_prestation) {
                        $date_encours = date("Y-m-d", strtotime("+1 month", strtotime($date_encours)));
                    }

                    if($row['date_fin'] < $date_fin) {
                        $date_fin_prestation = $row['date_fin'];
                    } else {
                        $date_fin_prestation = $date_fin;
                    }

                    while ($date_encours <= $date_fin_prestation) {
                        if($row['jour_ferie'] != 1) {
                            $jour_valide = !est_jour_ferie($date_encours);
                        } else {
                            $jour_valide = true;
                        }

                        if($jour_valide) {
                            $jour_valide = !est_absent($date_encours, $row['client_id'], 'client');

                            if($jour_valide) {
                                $jour_valide = !est_absent($date_encours, $row['collaborateur_id'], 'collaborateur');
                            }
                        }

                        if($jour_valide) {
                            if($type == 'planning') {
                                $ev = new stdClass;
                                $ev->id = $i++;
                                $ev->resourceId = $row['collaborateur_id'];
                                $ev->color = $row['type_prestation_couleur'];
                                $ev->title = $row['client'] ."\n". $row['prestation'];

                                $ev->start = $date_encours .' '. $row['heure_debut'];
                                
                                if($row['heure_debut'] <= $row['heure_fin']) {
                                    $ev->end = $date_encours .' '.  $row['heure_fin'];
                                } else {
                                    $ev->end = date("Y-m-d",strtotime("$date_encours +1 day")) .' '.  $row['heure_fin'];
                                }

                                // Données extra
                                $ev->horaire_id = $row['id'];
                                $ev->prestation_id = $row['prestation_id'];
                                $ev->type_contrat = $row['type_contrat'];
                                $ev->prestation = $row['prestation'];
                                $ev->client_id = $row['client_id'];
                                $ev->client = $row['client'];
                                $ev->collaborateur_remplacant_id = $row['collaborateur_remplacant_id'];
                                $ev->raison_id = $row['raison_id'];
                                $ev->collaborateur_remplace_id = $row['collaborateur_remplace_id'];
                                $ev->raison_remplacement_id = $row['raison_remplacement_id'];
                                $ev->raison_absence = $row['raison_absence'];
                                $ev->commentaire = $row['commentaire'];
                                $ev->utilisateur_nom = $row['utilisateur_nom'];
                                $ev->duree = $duree_minute / 60;

                                // Ajout à la liste dans le calendrier
                                $events[] = $ev;
                            }

                            if($type == 'horaire') {
                                $nbre_minute_total += $duree_minute;
                            }
                        }
                        
                        $date_encours = date("Y-m-d", strtotime("+1 month", strtotime($date_encours)));
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        // Rendu du résultat

        if($type == 'planning') {
            return $events;
        }

        if($type == 'horaire') {
            return $nbre_minute_total;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
}