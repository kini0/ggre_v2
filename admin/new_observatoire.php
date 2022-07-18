<?php
session_start();
include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$upload = "";
		$upload_trim1 = "";
		$upload_trim2 = "";
		$upload_trim3 = "";
		$upload_trim4 = "";
		$nom_trim1 = "";$tmp_trim1 = "";
		$nom_trim2 = "";$tmp_trim2 = "";
		$nom_trim3 = "";$tmp_trim3 = "";
		$nom_trim4 = "";$tmp_trim4 = "";
		$target = "../files/";
		// Traitement du fichier document
		if(!empty($_FILES['fichier']['name']) || !empty($_FILES['trim1']['name']) || !empty($_FILES['trim2']['name']) || !empty($_FILES['trim3']['name']) || !empty($_FILES['trim4']['name']))
		{
			// Si c'est OK, on teste l'upload
			$nom_file   = getMdp()."_".$_FILES['fichier']['name'];
			$tmp        = $_FILES["fichier"]["tmp_name"];
			
			if(!empty($_FILES['trim1']['name'])) {
				$nom_trim1   = getMdp()."_".$_FILES['trim1']['name'];
				$tmp_trim1   = $_FILES["trim1"]["tmp_name"];

				if(move_uploaded_file($_FILES['trim1']['tmp_name'],$target.$nom_trim1)) {
					$upload_trim1 = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produite dans la mise en ligne du document du trimestre 1, veuillez recommencer.");
				}
			}
			if(!empty($_FILES['trim2']['name'])) {
				$nom_trim2   = getMdp()."_".$_FILES['trim2']['name'];
				$tmp_trim2   = $_FILES["trim2"]["tmp_name"];

				if(move_uploaded_file($_FILES['trim2']['tmp_name'],$target.$nom_trim2)) {
					$upload_trim2 = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produite dans la mise en ligne du document du trimestre 2, veuillez recommencer.");
				}
			}
			if(!empty($_FILES['trim3']['name'])) {
				$nom_trim3  = getMdp()."_".$_FILES['trim3']['name'];
				$tmp_trim3   = $_FILES["trim3"]["tmp_name"];

				if(move_uploaded_file($_FILES['trim3']['tmp_name'],$target.$nom_trim3)) {
					$upload_trim3 = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produite dans la mise en ligne du document du trimestre 3, veuillez recommencer.");
				}
			}
			if(!empty($_FILES['trim4']['name'])) {
				$nom_trim4   = getMdp()."_".$_FILES['trim4']['name'];
				$tmp_trim4   = $_FILES["trim4"]["tmp_name"];

				if(move_uploaded_file($_FILES['trim4']['tmp_name'],$target.$nom_trim4)) {
					$upload_trim4 = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produite dans la mise en ligne du document du trimestre 4, veuillez recommencer.");
				}
			}
			if(!empty($_FILES['fichier']['name'])) {
				if(move_uploaded_file($_FILES['fichier']['tmp_name'],$target.$nom_file)) {
					$upload = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produite dans la mise en ligne du document, veuillez recommencez.");
				}
			}
		}
		// Traitement de la requ�te
		$sql = "INSERT INTO observatoire (titre,contenu,date_depot";
		if(!empty($_FILES['fichier']['name'])) { $sql .= ",document"; }
		$sql .= ",actif";
		if(!empty($_FILES['trim1']['name'])) { $sql .= ",trim1"; }
		if(!empty($_FILES['trim2']['name'])) { $sql .= ",trim2"; }
		if(!empty($_FILES['trim3']['name'])) { $sql .= ",trim3"; }
		if(!empty($_FILES['trim4']['name'])) { $sql .= ",trim4"; }
		$sql .=") ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["titre"])."','". str_replace(array("'","\n","<gras>","</gras>"),array("''","<br />","<b>","</b>"),$_POST["contenu_article"])."',";
		$sql .= "'".date("Y-m-d");
		if(!empty($_FILES['fichier']['name'])) { $sql .="','".$nom_file; }
		$sql .= "','".$_POST["actif"];
		if(!empty($_FILES['trim1']['name'])) { $sql .= "','".$nom_trim1; }
		if(!empty($_FILES['trim2']['name'])) { $sql .= "','".$nom_trim2; }
		if(!empty($_FILES['trim3']['name'])) { $sql .="','".$nom_trim3; }
		if(!empty($_FILES['trim4']['name'])) { $sql .="','".$nom_trim4; }
		$sql .= "');";

		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.".$sql);

		echo "<div class='okay'>L'article est mis en ligne.<br />";
		if ($upload == "1" ) echo "Un document a �t� joint � l'article<br />"; 
		if ($upload_trim1 == "1" ) echo "Un document trimestre 1 a �t� joint � l'article<br />"; 
		if ($upload_trim2 == "1" ) echo "Un document trimestre 2 a �t� joint � l'article<br />"; 
		if ($upload_trim3 == "1" ) echo "Un document trimestre 3 a �t� joint � l'article<br />"; 
		if ($upload_trim4 == "1" ) echo "Un document trimestre 4 a �t� joint � l'article<br />"; 
		echo "<br /><a href='observatoire.php'>Retour aux articles</a></div>";
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
      <fieldset>
        <legend>Fichiers Trimestres</legend>
        <label for="trim1">Trimestre 1</label><input type="file" name="trim1"  />
        <label for="trim1">Trimestre 2</label><input type="file" name="trim2"  />
        <label for="trim1">Trimestre 3</label><input type="file" name="trim3"  />
        <label for="trim1">Trimestre 4</label><input type="file" name="trim4"  />

      </fieldset>
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr�er l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>