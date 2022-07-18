<?php
session_start();
	$id_offre = (isset($_GET["id_offre"]))?$_GET["id_offre"]:$_POST["id_offre"];
	if(empty($id_offre))
		header("Location: offres.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$sql = "UPDATE annonce SET ";
		$sql .= "intitule = '".str_replace("'","''",$_POST["intitule"])."', mission = '".str_replace("'","''",$_POST["mission"])."', ";
		$sql .= "profil = '".str_replace("'","''",$_POST["profil"])."', ";
		$sql .= "infos = '".str_replace("'","''",$_POST["infos"])."', description = '".str_replace("'","''",$_POST["description"])."', ";
		$sql .= "societe = '".str_replace("'","''",$_POST["societe"])."',cp = '".$_POST["cp"]."',ville = '".$_POST["ville"]."',";
		$sql .= "contact_mail = '".$_POST["contact_mail"]."', commentaire = '".str_replace("'","''",$_POST["commentaire"])."', ";
		$sql .= "suspension = '".$_POST["suspension"]."', date_suspension = '".formatDateDB($_POST["date_suspension"])."', ";
		$sql .= "actif='".$_POST["actif"]."' ";
		$sql .= "WHERE id_offre = '".$_POST["id_offre"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>L'offre a bien �t� mise � jour.<br /><a href='offres.php'>Retour aux offres d'emploi</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM annonce";
		$sqlR .= " WHERE id_offre = '".$id_offre."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM annonce WHERE id_offre ='".$id_offre."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'offre a bien �t� supprim�e.<br />";
				echo "<a href='offres.php'>Retour aux offre d'emplois</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM annonce";
	$sql .= " WHERE id_offre = '".$id_offre."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_offre = $tab["id_offre"];
		$intitule = $tab["intitule"];
		$mission = $tab["mission"];
		$profil = $tab["profil"];
		$infos = $tab["infos"];
		$ville = $tab["ville"];
		$description = $tab["description"];
		$contact_mail = $tab["contact_mail"];
		$contact_tel = $tab["contact_tel"];
		$societe = $tab["societe"];
		$commentaire = $tab["commentaire"];
		$cp = $tab["cp"];
		$suspension = $tab["suspension"];
		$date_suspension = $tab["date_suspension"];
		$date_depot = GetDateFR($tab["date_depot"]);
		$actif = $tab["actif"];
	}
?>
    <form id="form-offre" action="?" method="post">
    <fieldset>
    <legend>Offre d'emploi</legend>
    <input type="hidden" name="id_offre" id="id_offre" value="<?php echo $id_offre?>" />
        <label for="intitule">Intitul� :</label>
        <input id="intitule" name="intitule" type="text" value="<?php echo $intitule?>" />
        
        <label for="mission">Mission : </label>
        <textarea name="mission" id="mission"><?php echo $mission?></textarea>

        <label for="profil">Profil : </label>
        <textarea name="profil" id="profil"><?php echo $profil?></textarea>

        <label for="infos">Informations compl�mentaires : </label>
        <textarea name="infos" id="infos"><?php echo $infos?></textarea>
        
        <label for="description">Description :</label>
        <textarea name="description" id="description"><?php echo $description?></textarea>
            
         <label for="societe">Nom de la soci�t� :</label>
        <input name="societe" type="text" id="societe" value="<?php echo $societe?>"  />
        
      <label for="cp">Code postal :</label>
        <input name="cp" type="text" id="cp" value="<?php echo $cp?>"  />
        
        <label for="ville">Ville :</label>
        <input name="ville" type="text" id="ville" value="<?php echo $ville?>"  />
		</fieldset>
      
      <fieldset>
        <legend>D�tails</legend>
        
        <label for="contact_mail">Mail du d&eacute;posant de l'annonce :</label>
       	<input name="contact_mail" id="contact_mail" type="text" value="<?php echo $contact_mail?>" />
            
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire"><?php echo $commentaire?></textarea>
        
		<label for="suspension">Supension automatique : </label>
        <input type="radio" id="suspension" name="suspension" value="1" <?php echo ($suspension=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" id="suspension" name="suspension"  value="0" <?php echo ($suspension=='0')?"checked='checked'":"";?> /> Non

        <label for="date_suspension">Date de suspension: </label>
       	<input name="date_suspension" id="date_suspension" type="text" value="<?php echo GetDateFR($date_suspension)?>"  />
		<label for="actif">Offre en ligne :</label>
        <input type="radio" id="actif" name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" id="actif" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non<br>
<br>Annonce d�pos�e le <?php echo $date_depot;?>
<br><?php //if ($tab["relance"]=="1") echo "Annonce relanc�e le ".GetDateFR($tab["date_relance"])." aupr�s du d�poseur de l'annonce."; ?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cette offre ?'));" value="Supprimer l'offre" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>