<?php
session_start();
include("_header.inc.php"); ?>

<?php

	if($_SESSION['superAdmin']!=1) header("Location: admin.php");
	// Formulaire envoyé ?
	if(isset($_POST["envoyer"]))
	{
	// Traitement de la requête
	$sql = "INSERT INTO user (id_user,nom,prenom,adresse, ville, codePostal, telFixe, telPortable, mail) ";
	$sql .= "VALUES('','".str_replace("'","''",$_POST["nom"])."','".str_replace("'","''",$_POST["prenom"])."','".str_replace("'","''",$_POST["adresse"])."','".str_replace("'","''",$_POST["ville"])."','".str_replace("'","''",$_POST["cp"])."','".str_replace("'","''",$_POST["tel"])."','".str_replace("'","''",$_POST["portable"])."','".str_replace("'","''",$_POST["mail"])."');";

	if($_SESSION['superAdmin']==1) {
		$sql = "INSERT INTO user (id_user,nom,prenom,adresse, ville, codePostal, telFixe, telPortable, mail, login, pass) ";
		$sql .= "VALUES('','".str_replace("'","''",$_POST["nom"])."','".str_replace("'","''",$_POST["prenom"])."','".str_replace("'","''",$_POST["adresse"])."','".str_replace("'","''",$_POST["ville"])."','".str_replace("'","''",$_POST["cp"])."','".str_replace("'","''",$_POST["tel"])."','".str_replace("'","''",$_POST["portable"])."','".str_replace("'","''",$_POST["mail"])."','".str_replace("'","''",$_POST["login"])."','".str_replace("'","''",$_POST["pass"])."');";
	}
	echo $sql;
	// Envoi de la requête
	$res = mysqli_query($conn, $sql)
	or die ("Une erreur s'est produite, veuillez recommencez.".$sql);

	echo "<div class='okay'>Nouveau graphothérapeute en ligne.<br />";
	echo "<br /><br /><a href='annuaire.php'>Retour à l'annuaire</a></div>";
	exit();
	}
?>
    <form id="form-annuaire" enctype="multipart/form-data" action="?" method="post">
	<div style="width: 250px;margin: 0 auto;">
    <fieldset>
    <legend>Graphothérapeute : </legend>
        <label for="nom">Nom : </label>
        <input id="nom" name="nom" type="text" value="<?php echo $_POST["nom"]?>" />
        <label for="prenom">Prénom : </label>
        <input id="prenom" name="prenom" type="text" value="<?php echo $_POST["prenom"]?>" />
        <label for="adresse">Adresse : </label>
        <input id="adresse" name="adresse" type="text" value="<?php echo $_POST["adresse"]?>" />
        <label for="ville">Ville : </label>
        <input id="ville" name="ville" type="text" value="<?php echo $_POST["ville"]?>" />
        <label for="cp">Code Postal : </label>
        <input id="cp" name="cp" type="text" value="<?php echo $_POST["cp"]?>" />
        <label for="tel">Téléphone : </label>
        <input id="tel" name="tel" type="text" value="<?php echo $_POST["tel"]?>" />
        <label for="portable">Portable : </label>
        <input id="portable" name="portable" type="text" value="<?php echo $_POST["portable"]?>" />
        <label for="mail">E-mail : </label>
        <input id="mail" name="mail" type="text" value="<?php echo $_POST["mail"]?>" />
		<?php
		if($_SESSION['superAdmin']==1) {
			?>
			<label for="login">Login :</label>
			<input id="login" name="login" type="text" value="<?php echo $_POST["login"]?>" />
			<br>
			<label for="pass">Mot de Passe :</label>
			<input id="pass" name="pass" type="text" value="<?php echo $_POST["pass"]?>" />
			<br>
			<?php
		}
		?>
        
    </fieldset>
     </div>
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Créer le profil" />
 </div>
    </form>
        </div>
    </body>
</html>