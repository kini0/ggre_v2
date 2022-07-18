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
		$sql = "INSERT INTO newsletter (id_newsletter,titre,date_depot,document) ";
		$sql .= "VALUES('','".str_replace("'","''",$_POST["titre"])."',";
		$sql .= "'".date("Y-m-d")."','".$nom_file."');";

		// Envoi de la requête
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.".$sql);

		echo "<div class='okay'>La newsletter est mise en ligne.<br />";
		if ($upload == "1" ) echo "Un document a été joint à la newsletter"; 
		echo "<br /><br /><a href='newsletter.php'>Retour aux newsletter</a></div>";
		exit();
	}
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Newsletter : </legend>
        <label for="titre">Titre : </label>
        <input id="titre" name="titre" type="text" value="<?php echo $_POST["titre"]?>" />
        
    </fieldset>
      
      <fieldset>        
        <legend>Document</legend>
        <label for="fichier"><input type="file" name="fichier"  /></label>

      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr&eacute;er la newsletter" />
 </div>
    </form>
        </div>
    </body>
</html>