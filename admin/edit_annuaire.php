<?php
session_start();
	$id_user = (isset($_GET["id_user"]))?$_GET["id_user"]:$_POST["id_user"];
	if(empty($id_user))
		header("Location: annuaire.php");
	if($_SESSION['superAdmin']!=1) header("Location: admin.php");
?>
<?php include("_header.inc.php"); ?>

<?php

	// Formulaire envoyé ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de la requête
		$sql = "UPDATE user SET ";
		$sql .= "nom = '".str_replace("'","''",$_POST["nom"])."', ";
		$sql .= "prenom = '".str_replace("'","''",$_POST["prenom"])."', ";
		$sql .= "adresse = '".str_replace("'","''",$_POST["adresse"])."', ";
		$sql .= "codePostal = '".str_replace("'","''",$_POST["codePostal"])."', ";
		$sql .= "ville = '".str_replace("'","''",$_POST["ville"])."', ";
		$sql .= "telFixe = '".str_replace("'","''",$_POST["telephone"])."', ";
		$sql .= "telPortable = '".str_replace("'","''",$_POST["portable"])."', ";
		$sql .= "mail = '".str_replace("'","''",$_POST["email"])."' ";
		if($_SESSION['superAdmin']==1) {
			$sql .= ", login = '".str_replace("'","''",$_POST["login"])."' ";
			$sql .= ", pass = '".str_replace("'","''",$_POST["pass"])."' ";
		}
		$sql .= "WHERE id_user = '".$_POST["id_user"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Le profil a bien été mis à jour.<br /><a href='annuaire.php'>Retour à l'annuaire</a></div>";
	}
	else if(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM user";
		$sqlR .= " WHERE id_user = '".$id_user."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM user WHERE id_user ='".$id_user."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>Le profil a bien été supprimé.<br />";
				echo "<a href='annuaire.php'>Retour à la liste</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au véhicules
	$sql = "SELECT * FROM user";
	$sql .= " WHERE id_user = '".$id_user."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_user = $tab["id_user"];
		$nom = $tab["nom"];
		$prenom = $tab["prenom"];
		$adresse = $tab["adresse"];
		$codePostal = $tab["codePostal"];
		$ville = $tab["ville"];
		$telephone = $tab["telFixe"];
		$portable = $tab["telPortable"];
		$email = $tab["mail"];
		if($_SESSION['superAdmin']==1) {
			$login = $tab["login"];
			$pass = $tab["pass"];
		}
	}
?>
    <form id="form-user" enctype="multipart/form-data" action="?" method="post">
	<div style="width: 250px;margin: 0 auto;">
    <fieldset>
    <legend>Graphthérapeute</legend>
    <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>" />
        <label for="nom">Nom :</label>
        <input id="nom" name="nom" type="text" value="<?php echo $nom; ?>" />
        <br>
        <label for="prenom">Prénom :</label>
        <input id="prenom" name="prenom" type="text" value="<?php echo $prenom; ?>" />
        <br>
        <label for="adresse">Adresse :</label>
        <input id="adresse" name="adresse" type="text" value="<?php echo $adresse; ?>" />
        <br>
        <label for="codePostal">Code Postal :</label>
        <input id="codePostal" name="codePostal" type="text" value="<?php echo $codePostal; ?>" />
        <br>
        <label for="ville">Ville :</label>
        <input id="ville" name="ville" type="text" value="<?php echo $ville; ?>" />
        <br>
        <label for="telephone">Téléphone :</label>
        <input id="telephone" name="telephone" type="text" value="<?php echo $telephone; ?>" />
        <br>
        <label for="portable">Portable :</label>
        <input id="portable" name="portable" type="text" value="<?php echo $portable; ?>" />
        <br>
        <label for="email">E-mail :</label>
        <input id="email" name="email" type="text" value="<?php echo $email; ?>" />
        <br>
		<?php
		if($_SESSION['superAdmin']==1) {
			?>
			<label for="login">Login :</label>
			<input id="login" name="login" type="text" value="<?php echo $login; ?>" />
			<br>
			<label for="pass">Mot de Passe :</label>
			<input id="pass" name="pass" type="text" value="<?php echo $pass; ?>" />
			<br>
			<?php
		}
		?>
		</fieldset>
     </div>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre à jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce profil ?'));" value="Supprimer le profil" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>