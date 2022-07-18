<?php
session_start();
	$id_observatoire = (isset($_GET["id_observatoire"]))?$_GET["id_observatoire"]:$_POST["id_observatoire"];
	if(empty($id_observatoire))
		header("Location: observatoire.php");
?>
<?php include("_header.inc.php"); ?>
<?php

// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM observatoire";
	$sql .= " WHERE id_observatoire = '".$id_observatoire."';";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_observatoire = $tab["id_observatoire"];
		$titre = $tab["titre"];
		$contenu_article =  str_replace(array("<br />","<b>","</b>"),array("\n","<gras>","</gras>"),$tab["contenu"]);
		$fichier = $tab["document"];
		$date_depot = $tab["date_depot"];
		$actif = $tab["actif"];
		$trim1= $tab["trim1"];
		$trim2= $tab["trim2"];
		$trim3= $tab["trim3"];
		$trim4= $tab["trim4"];
	}

	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de l'image
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
			$nom_file = cleaner($_FILES["fichier"]["name"]);
			$tmp = $_FILES["fichier"]["tmp_name"];
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
				if( move_uploaded_file($_FILES['fichier']['tmp_name'],$target.$nom_file)) {
					$upload = "1";
				} else {
					// Sinon on affiche une erreur syst�me
					die ("Une erreur s'est produitee dans la mise en ligne du document, veuillez recommencez.");
				}
			}
		} 
		// Traitement de la requ�te
		$sql = "UPDATE observatoire SET ";
		$sql .= "titre = '".str_replace("'","''",$_POST["titre"])."', contenu = '". str_replace(array("'","\n","<gras>","</gras>"),array("''","<br />","<b>","</b>"),$_POST["contenu_article"])."', actif = '".$_POST["actif"]."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."'";
		if ($upload_trim1 == "1" )  $sql .= ", trim1 = '".$nom_trim1 ."'";
		if ($upload_trim2 == "1" )  $sql .= ", trim2 = '".$nom_trim2 ."'";
		if ($upload_trim3 == "1" ) $sql .= ", trim3 = '".$nom_trim3 ."'";
		if ($upload_trim4 == "1" ) $sql .= ", trim4 = '".$nom_trim4 ."'"; 
		$sql .= " WHERE id_observatoire = '".$_POST["id_observatoire"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>Votre article a bien �t� mis � jour.<br /><a href='observatoire.php'>Retour aux articles</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM observatoire";
		$sqlR .= " WHERE id_observatoire = '".$id_observatoire."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM observatoire WHERE id_observatoire ='".$id_observatoire."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'article a bien �t� supprim�.<br />";
				echo "<a href='observatoire.php'>Retour aux articles</a></div>";
			}
		exit();
	}
	
	
?>
    <form id="form-news" enctype="multipart/form-data" action="?" method="post">
    <fieldset>
    <legend>Observatoire</legend>
    <input type="hidden" name="id_observatoire" id="id_observatoire" value="<?php echo $id_observatoire?>" />
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
				echo "<div id='doc'><small><a href='http://www.meife93.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint � l'article</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_observatoire."\",\"observatoire\",\"".$tab["document"]."\");' /></div>";
				}?>
<br>Article d�pos� le <?php echo GetDateFR($date_depot);?>
      </fieldset>
<?php if(stripos($titre,"trimestr") !== false)
{ ?>
      <fieldset>
        <legend>Nouveaux Fichiers Trimestres</legend>
        <label for="trim1">Trimestre 1</label><input type="file" name="trim1"  />
        <?php if($trim1 != "")
	{
		echo "<div id='doc_trim1'><small><a href='http://www.meife93.fr/files/".$trim1."' target='_blank'>Cliquez ici pour ouvrir le document trimestre 1</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_observatoire."\",\"trim1\",\"".$trim1."\");' /></div><br />";
	}?>
        <label for="trim1">Trimestre 2</label><input type="file" name="trim2"  />
 <?php if($trim2 != "")
	{
		echo "<div id='doc_trim2'><small><a href='http://www.meife93.fr/files/".$trim2."' target='_blank'>Cliquez ici pour ouvrir le document trimestre 2</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_observatoire."\",\"trim2\",\"".$trim2."\");' /></div><br />";
	}?>
        <label for="trim1">Trimestre 3</label><input type="file" name="trim3"  />
 <?php if($trim3 != "")
	{
		echo "<div id='doc_trim3'><small><a href='http://www.meife93.fr/files/".$trim3."' target='_blank'>Cliquez ici pour ouvrir le document trimestre 3</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_observatoire."\",\"trim3\",\"".$trim3."\");' /></div><br />";
	}?>
        <label for="trim1">Trimestre 4</label><input type="file" name="trim4"  />
 <?php if($trim4 != "")
	{
		echo "<div id='doc_trim4'><small><a href='http://www.meife93.fr/files/".$trim4."' target='_blank'>Cliquez ici pour ouvrir le document trimestre 4</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_observatoire."\",\"trim4\",\"".$trim4."\");' /></div>";
	}?>
      </fieldset>
<?php } ?>
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cet article ?'));" value="Supprimer l'article" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>