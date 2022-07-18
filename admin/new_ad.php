<?php
session_start();
include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de la requ�te
		$sql = "INSERT INTO actu_defilante (titre,contenu,actif) ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["titre"])."','".str_replace("'","''",$_POST["contenu_article"])."','".$_POST["actif"]."');";

		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produite, veuillez recommencez.");

		echo "<div class='okay'>L'actualit� a correctement �t� ajout�e � la base de donn�es.<br />";
		echo "<br /><br /><a href='actualite-defilante.php'>Retour aux actualit�s</a></div>";
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
        

      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr�er l'actualit�" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>