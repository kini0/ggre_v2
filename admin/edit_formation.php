<?php
session_start();
	$id_formation = (isset($_GET["id_formation"]))?$_GET["id_formation"]:$_POST["id_formation"];
	if(empty($id_formation))
		header("Location: formations.php");

include("_header.inc.php"); 
?>
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
				die ("Une erreur s'est produite dans la mise en ligne du document, veuillez recommencez.");
			}
		} 
		// Traitement de la requ�te
		$sql = "UPDATE formation SET ";
		$sql .= "intitule = '".str_replace("'","''",$_POST["titre"])."', contenu = '".str_replace("'","''",$_POST["contenu_formation"])."', actif = '".$_POST["actif"]."' ";
		if($upload == "1") $sql .= ", document = '".$nom_file."' ";
		$sql .= "WHERE id_formation = '".$_POST["id_formation"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>La formation a bien �t� mise � jour.<br /><a href='formations.php'>Retour aux formations</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT * FROM formation";
		$sqlR .= " WHERE id_formation = '".$id_formation."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM formation WHERE id_formation ='".$id_formation."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>La formation a bien �t� supprim�.<br />";
				echo "<a href='formations.php'>Retour aux formations</a></div>";
			}
		exit();
	}
	
	// Affichage des formations
	$sql = "SELECT * FROM formation";
	$sql .= " WHERE id_formation = '".$id_formation."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_formation = $tab["id_formation"];
		$intitule = $tab["intitule"];
		$contenu_formation = $tab["contenu"];
		$fichier = $tab["document"];
		$actif = $tab["actif"];
	}
?>    <form id="form-formation" enctype="multipart/form-data" action="?" method="post">
    <input type="hidden" name="id_formation" id="id_formation" value="<?php echo $id_formation?>" />
    <fieldset>
    <legend>Formation : </legend>
        <label for="titre">Intitul&eacute; : </label>
        <input id="titre" name="titre" type="text" value="<?php echo $intitule;?>" />
        
        <label for="contenu_formation">Contenu : </label>
        <textarea name="contenu_formation" id="contenu_formation"><?php echo $contenu_formation;?></textarea>
    </fieldset>
      
      <fieldset>
        <legend>D�tails</legend>
        <label for="actif">Mettre en ligne : </label>
        <input type="radio" id="actif" name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" id="actif" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non
        
        <legend>Document</legend>
        <label for="fichier"><input type="file" name="fichier"  /></label>
        <?php if($fichier != "")
				{
				echo "<div id='doc'><small><a href='http://www.meife93.fr/files/".$fichier."' target='_blank'>Cliquez ici pour ouvrir le document joint � l'article</a></small><img src='http://meife93.fr/admin/images/drop.png' onclick='deleteDoc(\"".$id_formation."\",\"formation\",\"".$tab["document"]."\");' /></div><br>";
				}?>
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
  <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cette formation ?'));" value="Supprimer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre &agrave; jour" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>