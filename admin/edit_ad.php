<?php
session_start();
	$id_actu = (isset($_GET["id_actu"]))?$_GET["id_actu"]:$_POST["id_actu"];
	if(empty($id_actu))
		header("Location: actualite-defilante.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$sql = "UPDATE actu_defilante SET ";
		$sql .= "titre = '".str_replace("'","''",$_POST["titre"])."', contenu = '".str_replace("'","''",$_POST["contenu_article"])."',actif = '".$_POST["actif"]."';";
		$res = mysqli_query($conn, $sql);
		if($res != false)
		 echo "<div class='okay'>L'actualit� d�filante a bien �t� mise � jour.<br /><a href='actualite-defilante.php'>Retour � la liste des actualit�s d�filantes</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		$sqlR = "SELECT * FROM actu_defilante";
		$sqlR .= " WHERE id_actu = '".$id_actu."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				mysqli_query($conn, "DELETE FROM actu_defilante WHERE id_actu ='".$id_actu."'")
					or die("Une erreur s'est produite. Veuillez recommencer.");
				echo "<div class='okay'>L'actualit� d�filante a bien �t� supprim�e.<br />";
				echo "<a href='actualite-defilante.php'>Retour � la liste des actualit�s d�filantes</a></div>";
			}
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM actu_defilante";
	$sql .= " WHERE id_actu = '".$id_actu."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$id_actu = $tab["id_actu"];
		$titre = $tab["titre"];
		$contenu_article = $tab["contenu"];
		$actif = $tab["actif"];
	}
?>
    <form id="form-offre" action="?" method="post">
    <fieldset>
    <legend>Actualit� d�filante</legend>
    <input type="hidden" name="id_actu" id="id_actu" value="<?php echo $id_actu?>" />
        <label for="titre">Titre :</label>
        <input id="titre" name="titre" type="text" value="<?php echo $titre?>" />
                
        <label for="contenu_article">Contenu :</label>
        <textarea name="contenu_article"id="contenu_article"><?php echo $contenu_article?></textarea>
        </fieldset>
      
      <fieldset>
        <legend>Informations</legend>
  		<label for="actif">En ligne :</label>
        <input type="radio" id="actif" name="actif" value="1" <?php echo ($actif=='1')?"checked='checked'":"";?> /> Oui
        <input type="radio" id="actif" name="actif"  value="0" <?php echo ($actif=='0')?"checked='checked'":"";?> /> Non
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer cet actualit� d�filante ?'));" value="Supprimer l'actualit� d�filante" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>