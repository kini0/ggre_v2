<?php
session_start();
	$id_membre = (isset($_GET["id_membre"]))?$_GET["id_membre"]:$_POST["id_membre"];
	if(empty($id_membre))
		header("Location: membres.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$sql = "UPDATE compte SET ";
		$sql .= "nom = '".str_replace("'","''",$_POST["nom"])."', prenom = '".str_replace("'","''",$_POST["prenom"])."',email = '".str_replace("'","''",$_POST["email"])."', ";
		$sql .= "adresse = '".str_replace("'","''",$_POST["adresse"])."', cp = '".$_POST["cp"]."',ville = '".str_replace("'","''",$_POST["ville"])."',dn = '".formatDateDB($_POST["dn"])."', ";
		$sql .= "tel = '".$_POST["tel"]."', code_conseiller = '".str_replace("'","''",$_POST["code_conseiller"])."', pass='".$_POST["pass"]."', actif='".$_POST["actif"]."' ";
		$sql .= "WHERE id_membre = '".$_POST["id_membre"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Le compte membre a bien �t� mise � jour.<br />";
		 	if(empty($_POST["popup"]) || $_POST["popup"] != "1")
		 		echo "<a href='membres.php'>Retour � la liste des membres</a></div>";
		 	else 
		 		echo "<a href='javascript:closepopup()'>Fermer la fen�tre</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		$sqlR = "SELECT * FROM compte";
		$sqlR .= " WHERE id_membre = '".$id_membre."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM compte WHERE id_membre ='".$id_membre."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>Le compte membre a bien �t� supprim�.<br />";
				echo "<a href='membres.php'>Retour � la liste des membres</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM compte";
	$sql .= " WHERE id_membre = '".$id_membre."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_membre = $tab["id_membre"];
		$nom = $tab["nom"];
		$prenom = $tab["prenom"];
		$email = $tab["email"];
		$adresse = $tab["adresse"];
		$cp = $tab["cp"];
		$ville = $tab["ville"];
		$tel = $tab["tel"];
		$dn = GetDateFR($tab["dn"]);
		$pass = $tab["pass"];
		$inscription = $tab["inscription"];
		$actif = $tab["actif"];
		$compteur = $tab["compteur"];
		$code_conseiller = $tab["code_conseiller"];
	}
?>
    <form id="form-offre" action="?" method="post">
    <fieldset>
    <legend>Compte</legend>
    <input type="hidden" name="id_membre" id="id_membre" value="<?php echo $id_membre?>" />
        <label for="nom">Nom :</label>
        <input id="nom" name="nom" type="text" value="<?php echo $nom?>" />
        
      <label for="prenom">Pr�nom :</label>
        <input name="prenom" type="text" id="prenom" value="<?php echo $prenom?>"/>
        
        <label for="adresse">Adresse :</label>
        <textarea name="adresse"id="adresse"><?php echo $adresse?></textarea>
        
        <label for="cp">Code postal :</label>
        <input name="cp" type="text" id="cp" value="<?php echo $cp?>"/>
        
        <label for="ville">Ville :</label>
        <input name="ville" type="text" id="ville" value="<?php echo $ville?>"/>
       </fieldset>
      
      <fieldset>
        <legend>Informations</legend>
        
        <label for="dn">Date de naissance :</label>
       	<input name="dn" id="dn" type="text"  value="<?php echo $dn?>" />
        
        <label for="email">Contact Mail :</label>
       	<input name="email" id="email" type="text" value="<?php echo $email?>" />
            
        <label for="tel">T�l�phone :</label>
        <input name="tel" type="text" id="tel" maxlength="10" value="<?php echo $tel?>" />
        
       	<label for="code_conseiller">Nom du  conseiller :</label>
       	<input name="code_conseiller" id="code_conseiller" type="text" value="<?php echo $code_conseiller?>" />
        
		<label for="pass">Mot de passe :</label>
        <input name="pass" type="text" id="pass" maxlength="10" value="<?php echo $pass?>" />
        
		<label for="actif">Compte actif :</label>
        <input type="radio" id="actif" name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" id="actif" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non
        <br><br>Abonn� inscrit le <?php echo $inscription;?>
        <br><br>Demandes de mot de passe : <?php echo $compteur;?>
        <input type='hidden' name='popup' value="<?php if(empty($_GET["popup"]) || $_GET["popup"] != "1") echo "0"; else echo "1";?>" />
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer ce compte ?'));" value="Supprimer le compte" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>