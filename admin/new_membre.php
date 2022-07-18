<?php
session_start();
include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		// Traitement de la requ�te
		$sql = "INSERT INTO compte (nom,prenom,email,adresse,cp,ville,dn,tel,code_conseiller,pass,inscription) ";
		$sql .= "VALUES('".str_replace("'","''",$_POST["nom"])."','".str_replace("'","''",$_POST["prenom"])."','".$_POST["email"]."', '".str_replace("'","''",$_POST["adresse"])."', ";
		$sql .= "'".$_POST["cp"]."', '".str_replace("'","''",$_POST["ville"])."', '".formatDateDB($_POST["dn"])."', '".$_POST["tel"]."', ";
		$sql .= "'".str_replace("'","''",$_POST["code_conseiller"])."','".$_POST["pass"]."','".date("Y-m-d")."');";
		echo $sql;
		// Envoi de la requ�te
		$res = mysqli_query($conn, $sql)
		or die ("Une erreur s'est produitee, veuillez recommencez.");

		echo "<div class='okay'>Le compte membre a bien �t� cr�e.<br />";
		echo "<a href='membres.php'>Retour aux membres</a></div>";
		exit();
	}
?>
    <form id="form-offre" action="?" method="post">
    <fieldset>
    <legend>Fiche membre</legend>
        <label for="nom">Nom :</label>        
<input id="nom" name="nom" type="text" value="" />
       
        <label for="prenom">Pr�nom :</label>
        <input id="prenom" name="prenom" type="text" value="" />
                
        <label for="adresse">Adresse :</label>
        <textarea name="adresse"id="adresse"></textarea>
        
        <label for="cp">Code postal :</label>
        <input name="cp" type="text" id="cp" value=""/>
        
        <label for="ville">Ville :</label>
        <input name="ville" type="text" id="ville" value=""/> 

      </fieldset>
      
      <fieldset>
        <legend>D�tails</legend>

        <label for="dn">Date de naissance :</label>
       	<input name="dn" id="dn" type="text" value="" />

        <label for="email">Adresse mail :</label>
       	<input name="email" id="email" type="text" value="" />
        
        <label for="contact_tel">T�l�phone :</label>
       	<input name="tel" id="tel" type="text" value="" />
        
       	<label for="code_conseiller">Nom du  conseiller :</label>
       	<input name="code_conseiller" id="code_conseiller" type="text" value="" />

        <label for="pass">Mot de passe :</label>
        <input name="pass" type="text" id="pass" value="" /> 
      </fieldset>
      
  <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Cr�er le compte membre" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>