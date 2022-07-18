<?php
session_start();
	$id_news = (isset($_GET["id_newsletter"]))?$_GET["id_newsletter"]:$_POST["id_newsletter"];
	if(empty($id_news))
		header("Location: newsletter.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoyé ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de l'image
		$upload = "";
		$target = "../files/";
		// Traitement du fichier document
		if(!empty($_FILES["fichier"]["name"]))
		{
			// Si c'est OK, on teste l'upload
			$nom_file = cleaner($_FILES["fichier"]["name"]);
			$tmp = $_FILES["fichier"]["tmp_name"];
	
			if(move_uploaded_file($_FILES['fichier']['tmp_name'],$target.$nom_file)) {
				$upload = "1";
			} else {
				// Sinon on affiche une erreur système
				die ("Une erreur s'est produitee dans la mise en ligne du document, veuillez recommencez.");
			}
		} 
		// Traitement de la requête
		$sql = "UPDATE newsletter SET ";
		$sql .= "titre = '".str_replace("'","''",$_POST["titre"])."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."' ";
		$sql .= "WHERE id_newsletter = '".$_POST["id_newsletter"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Votre article a bien été mis à jour.<br /><a href='newsletter.php'>Retour aux articles</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM newsletter";
		$sqlR .= " WHERE id_newsletter = '".$id_news."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM newsletter WHERE id_newsletter ='".$id_news."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>La newsletter a bien été supprimé.<br />";
				echo "<a href='newsletter.php'>Retour aux newsletter</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au véhicules
	$sql = "SELECT * FROM newsletter";
	$sql .= " WHERE id_newsletter = '".$id_news."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_news = $tab["id_newsletter"];
		$titre = $tab["titre"];
		$fichier = $tab["document"];
		$date_depot = $tab["date_depot"];
	}
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Newsletter</legend>
    <input type="hidden" name="id_newsletter" id="id_newsletter" value="<?php echo $id_news?>" />
        <label for="titre">Titre :</label>
        <input id="titre" name="titre" type="text" value="<?php echo $titre?>" />

		</fieldset>
      
      <fieldset>

        <legend>Document</legend>
        <label for="fichier"> <input type="file" name="fichier"  /> </label>
        <?php if($fichier != "")
				{
				echo "<div id='doc'><small><a href='http://www.ggre.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint à l'article</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_news."\",\"newsletter\",\"".$tab["document"]."\");' /></div><br>";
				}?>
<br><br>
Newsletter déposée le <?php echo GetDateFR($date_depot);?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre à jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet article ?'));" value="Supprimer l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>