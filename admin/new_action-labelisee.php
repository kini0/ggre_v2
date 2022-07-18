<?php
session_start();
include("_header.inc.php"); ?>
<?php
	$id_type_action= (isset($_GET["type_action"]))?$_GET["type_action"]:$_POST["type_action"];
	if(empty($id_type_action))
		header("Location: action-labelisee.php");
	// Formulaire envoy� ?
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
				// Sinon on affiche une erreur syst�me
				die ("Une erreur s'est produite dans la mise en ligne du document, veuillez recommencez.");
			}
		}
		// Traitement de la requ�te
		$sql = "INSERT INTO action_labelisee (titre,contenu,date_depot,document,actif,type_action) ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["titre"])."','". str_replace(array("'","\n","<gras>","</gras>"),array("''","<br />","<b>","</b>"),$_POST["contenu_article"])."',";
		$sql .= "'".date("Y-m-d")."','".$nom_file."','".$_POST["actif"]."','".$id_type_action."');";
		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.");

		echo "<div class='okay'>L'article est mis en ligne.<br />";
		if ($upload == "1" ) echo "Un document a �t� joint � l'article"; 
		echo "<br /><br /><a href='action-labelisee";echo (isset($id_type_action) && $id_type_action!=1)?"-".$id_type_action:"";echo ".php'>Retour aux articles</a></div>";
		exit();
	}
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Article : </legend>
        <label for="titre">Titre : </label>
        <input id="titre" name="titre" type="text" value="<?php echo $_POST["titre"]?>" />
        
        <label for="contenu_article">Contenu : </label>
        <textarea name="contenu_article" id="contenu_article"><?php echo $_POST["contenu_article"]?></textarea>
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
 <input type="hidden" id="type_action" name="type_action" value="<?php echo $id_type_action;  ?>" />
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr�er l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>