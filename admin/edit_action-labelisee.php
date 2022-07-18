<?php
session_start();
	$id_action_labelisee= (isset($_GET["id_action_labelisee"]))?$_GET["id_action_labelisee"]:$_POST["id_action_labelisee"];
	$id_type_action= (isset($_GET["type_action"]))?$_GET["type_action"]:$_POST["type_action"];
	if(empty($id_action_labelisee))
		header("Location: action-labelisee.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
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
				// Sinon on affiche une erreur syst�me
				die ("Une erreur s'est produitee dans la mise en ligne du document, veuillez recommencez.");
			}
		} 
		// Traitement de la requ�te
		$sql = "UPDATE action_labelisee SET ";
		$sql .= "titre = '".str_replace("'","''",$_POST["titre"])."', contenu = '".str_replace(array("'","\n","<gras>","</gras>"),array("''","<br />","<b>","</b>"),$_POST["contenu_article"])."', actif = '".$_POST["actif"]."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."' ";
		$sql .= "WHERE id_action_labelisee = '".$_POST["id_action_labelisee"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Votre article a bien �t� mis � jour.<br /><a href='action-labelisee";echo (isset($id_type_action) && $id_type_action!=1 && $id_type_action!="")?"-".$id_type_action:"";echo ".php'>Retour aux articles</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM action_labelisee";
		$sqlR .= " WHERE id_action_labelisee= '".$id_action_labelisee."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM action_labelisee WHERE id_action_labelisee='".$id_action_labelisee."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'article a bien �t� supprim�.<br />";
				echo "<a href='action-labelisee";echo (isset($id_type_action) && $id_type_action!=1)?"-".$id_type_action:"";echo ".php'>Retour aux articles</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM action_labelisee";
	$sql .= " WHERE id_action_labelisee= '".$id_action_labelisee."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_action_labelisee= $tab["id_action_labelisee"];
		$titre = $tab["titre"];
		$contenu_article = str_replace(array("<br />","<b>","</b>"),array("\n","<gras>","</gras>"),$tab["contenu"]);
		$fichier = $tab["document"];
		$date_depot = $tab["date_depot"];
		$actif = $tab["actif"];
	}
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Article</legend>
    <input type="hidden" name="id_action_labelisee" id="id_action_labelisee" value="<?php echo $id_action_labelisee?>" />
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
        <label for="fichier"> <input type="file" name="fichier"  /> </label>
        <?php if($fichier != "")
				{
				echo "<div id='doc'><small><a href='http://www.meife93.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint � l'article</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_action_labelisee."\",\"action-labelisee\",\"".$tab["document"]."\");' /></div><br>";
				}?>
<br><br>
Article d�pos� le <?php echo GetDateFR($date_depot);?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input type="hidden" id="type_action" name="type_action" value="<?php echo $id_type_action;  ?>" />
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cet article ?'));" value="Supprimer l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>