<?php
session_start();
	$id_news = (isset($_GET["id_news"]))?$_GET["id_news"]:$_POST["id_news"];
	if(empty($id_news))
		header("Location: news.php");
?>
<?php include("_header.inc.php"); ?>
<?php
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
		else { echo "<p>le fichier n'a pas �t� envoy�</p>"; }
		// Traitement de la requ�te
		$sql = "UPDATE news SET ";
		$sql .= "titre = '".$_POST["titre"]."', contenu = '".$_POST["contenu_article"]."', actif = '".$_POST["actif"]."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."' ";
		$sql .= "WHERE id_news = '".$_POST["id_news"]."';";
		$res = mysqli_query($conn, $sql);
		echo $sql;
		if($res != false)
		 echo "<div class='okay'>Votre article a bien �t� mis � jour.<br /><a href='news.php'>Retour aux articles</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM news";
		$sqlR .= " WHERE id_news = '".$id_news."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM news WHERE id_news ='".$id_news."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'article a bien �t� supprim�.<br />";
				echo "<a href='news.php'>Retour aux articles</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM news";
	$sql .= " WHERE id_news = '".$id_news."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_news = $tab["id_news"];
		$titre = $tab["titre"];
		$contenu_article = $tab["contenu"];
		$fichier = $tab["document"];
		$date_depot = $tab["date_depot"];
		$actif = $tab["actif"];
	}
?>
    <form id="form-news" action="?" method="post">
    <fieldset>
    <legend>Article</legend>
    <input type="hidden" name="id_news" id="id_news" value="<?php echo $id_news?>" />
        <label for="titre">Titre :</label>
        <input id="titre" name="titre" type="text" value="<?php echo $titre?>" />
        <br>
        <label for="contenu_article">Contenu : </label>
        <textarea name="contenu_article" id="contenu_article"><?php echo $contenu_article?></textarea>

		</fieldset>
      
      <fieldset>
        <legend>D�tails</legend>
        <label for="actif">Article en ligne :</label>
        <input type="radio"  name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non<br>
<br>

        <legend>Document</legend>
        <label for="fichier"> <input type="file" id="fichier" name="fichier"  /> </label>
        <?php if(isset($fichier))
				{
				echo "<div id='doc'><small><a href='http://www.meife93.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint � l'article</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_news."\");' /></div><br>";
				}?>
<br><br>
Article d�pos� le <?php echo GetDateFR($date_depot);?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cet article ?'));" value="Supprimer l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>