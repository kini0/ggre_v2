<?php
session_start();
include("_header.inc.php"); ?>
<?php


	// Formulaire envoyé ?
	if(isset($_POST["envoyer"]))
	{
		$upload = "";
		$target = "../files/";
		// Traitement du fichier document
		if(!empty($_FILES['fichier']['name']))
		{
			// Si c'est OK, on teste l'upload
			$nom_file   = getMdp()."_".$_FILES['fichier']['name'];
			$tmp        = $_FILES["fichier"]["tmp_name"];
	
			if(move_uploaded_file($_FILES['fichier']['tmp_name'],$target.$nom_file)) {
				$upload = "1";
			} else {
				// Sinon on affiche une erreur système
				die ("Une erreur s'est produite dans la mise en ligne du document, veuillez recommencez.");
			}
		}
		// Traitement de la requête
		$sql = "INSERT INTO pv_ag (id_pv_ag,titre,date_depot,document, contenu, actif) ";
		$sql .= "VALUES('','".str_replace("'","''",$_POST["titre"])."',";
		$sql .= "'".date("Y-m-d")."','".$nom_file."','".str_replace("'","''",$_POST["contenu_actu"])."','".$_POST["actif"]."');";

		// Envoi de la requête
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.".$sql);

		echo "<div class='okay'>L'actualité est mise en ligne.<br />";
		if ($upload == "1" ) echo "Un document a été joint"; 
		echo "<br /><br /><a href='pv_ag.php'>Retour aux actualités</a></div>";
		exit();
	}
?>
    <form id="form-pv_ag" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Actualité: </legend>
        <label for="titre">Titre : </label>
        <input id="titre" name="titre" type="text" value="<?php echo $_POST["titre"]?>" />
        <label for="contenu_actu">Texte : </label>
		<textarea name="contenu_actu" id="contenu_actu"><?php echo $contenu_actu?></textarea>
        
    </fieldset>
      
      <fieldset>        
        <legend>Détails</legend>
        <label for="actif">Mettre en ligne : </label>
        <input type="radio" id="actif" name="actif" value="1" checked="checked" /> Oui
        <input type="radio" id="actif" name="actif"  value="0" /> Non
		<br>
        <legend>Document</legend>
        <label for="fichier"><input type="file" name="fichier"  /></label>

      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr&eacute;er l'actualité" />
 </div>
    </form>
        </div>
    </body>
</html>