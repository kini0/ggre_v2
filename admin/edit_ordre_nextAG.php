<?php
session_start();
	$id_news = (isset($_GET["id_ordre_nextAG"]))?$_GET["id_ordre_nextAG"]:$_POST["id_ordre_nextAG"];
	if(empty($id_news))
		header("Location: ordre_nextAG.php");
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
		$sql = "UPDATE ordre_nextAG SET ";
		$sql .= "titre = '".str_replace("'","''",$_POST["titre"])."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."' ";
		$sql .= ", contenu = '".str_replace("'","''",$_POST["contenu_info"])."', actif = '".$_POST["actif"]."' ";
		$sql .= "WHERE id_ordre_nextAG = '".$_POST["id_ordre_nextAG"]."';";echo $sql;
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Votre info a bien été mise à jour.<br /><a href='ordre_nextAG.php'>Retour aux informations</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM ordre_nextAG";
		$sqlR .= " WHERE id_ordre_nextAG = '".$id_news."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM ordre_nextAG WHERE id_ordre_nextAG ='".$id_news."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'information a bien été supprimée.<br />";
				echo "<a href='ordre_nextAG.php'>Retour aux informations</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au véhicules
	$sql = "SELECT * FROM ordre_nextAG";
	$sql .= " WHERE id_ordre_nextAG = '".$id_news."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_news = $tab["id_ordre_nextAG"];
		$titre = $tab["titre"];
		$fichier = $tab["document"];
		$date_depot = $tab["date_depot"];
		$contenu_info = $tab["contenu"];
		$actif = $tab["actif"];
	}
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Information</legend>
    <input type="hidden" name="id_ordre_nextAG" id="id_ordre_nextAG" value="<?php echo $id_news?>" />
        <label for="titre">Titre :</label>
        <input id="titre" name="titre" type="text" value="<?php echo $titre?>" />
        <br>
        <label for="contenu_info">Contenu : </label>
        <textarea name="contenu_info" id="contenu_info"><?php echo $contenu_info?></textarea>

		</fieldset>
      
      <fieldset>
        <legend>Détails</legend>
        <label for="actif">Info en ligne :</label>
        <input type="radio"  name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non<br>
		<br>

        <legend>Document</legend>
        <label for="fichier"> <input type="file" name="fichier"  /> </label>
        <?php if($fichier != "")
				{
				echo "<div id='doc'><small><a href='http://www.ggre.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint à l'info</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_news."\",\"ordre_nextAG\",\"".$tab["document"]."\");' /></div><br>";
				}?>
<br><br>
Information déposée le <?php echo GetDateFR($date_depot);?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre à jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette information ?'));" value="Supprimer l'information" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>