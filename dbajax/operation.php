<?php

function get_user_password(){
    global $pdo;

    $sql = "SELECT * 
            FROM bn_user
            WHERE mail = ". $pdo->quote($_REQUEST['email']);
    $result = $pdo->query($sql); 
    if($result->rowCount() > 0){
        // Envoyer mail si le compte existe
        $user = $result->fetch(PDO::FETCH_ASSOC); 

        $token = md5( "{$user['id']}GGRE@TOKEN{$user['mail']}" . date("Y-m-d_H") );
        $url = "https://ggre-asso.fr/GGRE-BN-changepass.php?i={$user['id']}&account={$user['mail']}&token={$token}";
        //$url = "http://localhost/ggrenew/GGRE-BN-changepass.php?i={$user['id']}&account={$user['mail']}&token={$token}"; 

        $to      = $user['mail'];
        $subject = "GGRE: Demande de renouvellement de mot de passe";
        $message = "
<html>

<head>
    <title>GGRE mot de passe oublié</title>
</head>

<body>
    <p>Bonjour,</p>
    <p>Vous avez fait la demande de renouvellement de votre mot de passe.
    <br>Veuillez cliquer sur le lien ci dessous pour pouvoir le faire.
    <br><a href=\"{$url}\">{$url}</a></p>
    <p>Cordialement,</p>
    <p>L'équipe GGRE.</p>
</body>

</html>
         ";

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // En-têtes additionnels
        //$headers[] = "To: <{$to}>";
        $headers[] = 'From: GGRE <no-reply@GGRE.fr>';

        mail($to, $subject, $message, implode("\r\n", $headers));
        echo '{"success":true, "msg":"Un mail vous a été envoyé. Veuillez consulter votre boite mail."}';
  
        
    } else {
        echo '{"success":false, "msg":"EMAIL INCONNU."}';
    }
}

function change_user_password(){
    global $pdo;

    $data = $_REQUEST;

    if($data['pass'] == $data['pass_verif']) {
        $data += array("updated_on" => date("Y-m-d H:i:s"),"updated_by" => $db_user);
        $data['pass'] = sha1($data['pass']); // Encoder le mot de passe
        $nbligne = updateDB('bn_user',$data, "id = {$data['id']}");
        if($nbligne) {
            echo '{"success":true, "msg":"Votre nouveau mot de passe a été pris en compte.<br>Vous pouvez vous connecter avec votre nouveau mot de passe<br><a href=\"./GGRE-connect-BN.php\">Cliquer ici pour vous connecter</a>","nb_row":'. $nbligne .'}';
        } else {
            echo '{"success":false, "msg":"MODIFICATION NON EFFECTUEE"}';
        }
    } else {
        echo '{"success":false, "msg":"LES DEUX MOTS DE PASSE NE SONT PAS IDENTIQUES"}';
    }   
}

function connect_to_client(){
	global $pdo;

    $sql = "SELECT * 
            FROM user
            WHERE email_user = ". $pdo->quote($_REQUEST['email']);
    $result = $pdo->query($sql); //die($sql);
    if($result->rowCount() > 0){
        $_SESSION["admin"]= $_SESSION["user"];
        $_SESSION["user"] = $result->fetch(PDO::FETCH_ASSOC);
        echo '{"success":true, "msg":"CONNEXION CLIENT EFFECTUEE"}';
    } else {
        echo '{"success":false, "msg":"CONNEXION NON EFFECTUEE"}';
    }
}


function return_to_admin(){
    global $pdo;

    $_SESSION['user'] = $_SESSION['admin'];
    unset($_SESSION['admin']);
    echo '{"success":true, "msg":"RETOUR ADMIN EFFECTUEE"}';
}

function save_doc() {
    global $pdo;
    global $db_user;

    $db_tablename = 'doc';

    save_upload();

    $data = $_REQUEST;    

    try {
        $data += array("edite_le" => date("Y-m-d H:i:s"), "edite_par" => $db_user);

        $nbligne = replaceDB($db_tablename, $data); 
        if($nbligne){
            echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES"}';
        } else {
            echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
        }
    } catch (Exception $e) {
        $response = new stdClass;
        $response->success = false;
        $response->msg = "ENREGISTREMENT NON EFFECTUE";
        $response->errormsg = $e->getMessage();
        echo json_encode($response);
    }           
}

function save_client(){
    global $pdo;
    global $db_tablename;
    global $db_user;

    save_upload();

    $update_mode = !empty($_REQUEST['id_entreprise']);
    $data = $_REQUEST; 

    // Gestion du champ mot de passe
    if(isset($data['pass_user'])) {
        if(empty($data['pass_user'])) {
            unset($data['pass_user']);
        } else {
            $data['pass_user'] = sha1($data['pass_user'].'prd');
        }
    }

    $user_fields = [
        'photo_user' => 'logo_entreprise',
        'email_user' => 'mail_entreprise'
    ];
    foreach ($user_fields as $user_field => $entreprise_field) {
        if(!empty($data[$entreprise_field])) {
            $data[$user_field] = $data[$entreprise_field];
        }
    }

    try {
        if($update_mode) {
            // Opération de modification
            $data += array("updated_on" => date("Y-m-d H:i:s"),"updated_by" => $db_user);
            $nbligne = updateDB('entreprise',$data, "id_entreprise = {$data['id_entreprise']}");
            if($nbligne) {
                updateDB('user',$data, "id_user = {$data['id_user']}");
                echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","nb_row":'. $nbligne .'}';
            } else {
                echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
            }
        } else {
            // Opération d'insertion
            $data += array("created_on" => date("Y-m-d H:i:s"),"created_by" => $db_user);
            $nbligne = insertDB('entreprise',$data);
            if($nbligne){
                $data['id_entreprise'] = $pdo->lastInsertId();
                $nbligne = insertDB('user',$data); 
                if($nbligne){
                    echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","insert_id":'. $data['id_entreprise'] .',"nb_row":'. $nbligne .'}';
                } else {
                    echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
                }
            } else {
                echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
            }
        }
    } catch (Exception $e) {
        $response = new stdClass;
        $response->success = false;
        $response->msg = "ENREGISTREMENT NON EFFECTUE";
        $response->errormsg = $e->getMessage();
        echo json_encode($response);
    }
}

