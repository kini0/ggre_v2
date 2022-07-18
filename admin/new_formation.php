<?php
session_start();

include("_header.inc.php");

	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$upload = "";
		$target = "../files/";
		// Traitement du fichier document
		if(!empty($_FILES['fichier']['name']))
		{
			// Si c'est OK, on teste l'upload
			$nom_file   = cleaner($_FILES['fichier']['name']);
			$tmp        = $_FILES["fichier"]["tmp_name"];
	
			if(move_uploaded_file($_FILES['fichier']['tmp_name'],$target.$nom_file)) {
				$upload = "1";
			} else {
				// Sinon on affiche une erreur syst�me
				die ("Une erreur s'est produite dans la mise en ligne du document, veuillez recommencez.");
			}
		}
		// Traitement de la requ�te
		$sql = "INSERT INTO formation (intitule,contenu,document,actif) ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["titre"])."','".str_replace("'","''",$_POST["contenu_formation"])."',";
		$sql .= "'".$nom_file."','".$_POST["actif"]."');";

		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.");

		echo "<div class='okay'>La formation a correctement �t� ajout�e.<br />";
		if ($upload == "1" ) echo "<br />Un document a �t� joint."; 
		echo "<br /><a href='formations.php'>Retour aux articles</a></div>";
		exit();
	}
?>
    <form id="form-formation" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Article : </legend>
        <label for="titre">Titre : </label>
        <input id="titre" name="titre" type="text" value="<?php echo $_POST["titre"]?>" />
        
        <label for="contenu_formation">Contenu : </label>
        <textarea name="contenu_formation" id="contenu_formation"><?php echo $_POST["contenu_formation"]?></textarea>
    </fieldset>
      
      <fieldset>
        <legend>D�tails</legend>
        <label for="actif">Mettre en ligne : </label>
        <input type="radio" id="actif" name="actif" value="1" checked="checked" /> Oui
        <input type="radio" id="actif" name="actif"  value="0" /> Non
        
        <legend>Document</legend>
        <label for="fichier"><input type="file" name="fichier"  /></label>

      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Ajouter � la formation" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>