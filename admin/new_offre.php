<?php
session_start();
include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de la requ�te
		$sql = "INSERT INTO annonce (intitule,mission,profil,infos,description,societe,cp,ville,contact_mail,commentaire,suspension,date_suspension,date_depot,actif) ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["intitule"])."','".str_replace("'","''",$_POST["profil"])."','".str_replace("'","''",$_POST["mission"])."','".str_replace("'","''",$_POST["infos"])."',";
		$sql .= "'".str_replace("'","''",$_POST["description"])."','".str_replace("'","''",$_POST["societe"])."', ";
		$sql .= "'".$_POST["cp"]."','".str_replace("'","''",$_POST["ville"])."','".str_replace("'","''",$_POST["contact_mail"])."','".str_replace("'","''",$_POST["commentaire"])."',";
		$sql .= "'".str_replace("'","''",$_POST["suspension"])."','".formatDateDB($_POST["date_suspension"])."','".date("Y-m-d")."','".$_POST["actif"]."');";
		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produitee, veuillez recommencez.");

		echo "<div class='okay'>L'offre d'emploi est mise en ligne.<br />";
		echo "<a href='offres.php'>Retour aux offre d'emplois</a></div>";
		exit();
	}
?>
    <form id="form-offre" action="?" method="post">
    <fieldset>
    <legend>Offre d'emploi : </legend>
        <label for="intitule">Intitul� : </label>
        <input id="intitule" name="intitule" type="text" value="" />
        
        <label for="mission">Mission : </label>
        <textarea name="mission" id="mission"></textarea>

        <label for="profil">Profil : </label>
        <textarea name="profil" id="profil"></textarea>

        <label for="infos">Informations compl�mentaires : </label>
        <textarea name="infos" id="infos"></textarea>

        <label for="description">Description : </label>
        <textarea name="description" id="description"></textarea>
        
		<label for="societe">Nom de la soci�t� :</label>
        <input name="societe" type="text" id="societe" value=""  /> 

        <label for="cp">Code postal : </label>
        <input name="cp" type="text" id="cp" maxlength="5" /> 
     
		<label for="ville">Ville : </label>
        <input name="ville" type="text" id="ville" /> 
	</fieldset>
      
      <fieldset>
        <legend>D�tails</legend>
        <label for="contact_mail">Mail du d&eacute;posant de l'annonce: </label>
       	<input name="contact_mail" id="contact_mail" type="text" value="" />

        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire"><?php echo $commentaire?></textarea>
		
		<label for="suspension">Supension automatique : </label>
        <input type="radio" id="suspension" name="suspension" value="1" /> Oui
        <input type="radio" id="suspension" name="suspension"  value="0" checked="checked" /> Non

        <label for="date_suspension">Date de suspension: </label>
       	<input name="date_suspension" id="date_suspension" type="text" value=""  />

        <label for="actif">Mettre en ligne : </label>
        <input type="radio" id="actif" name="actif" value="1" checked="checked" /> Oui
        <input type="radio" id="actif" name="actif"  value="0" /> Non
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr�er l'offre" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>