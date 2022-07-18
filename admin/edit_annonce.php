<?php
session_start();
	$Mail = (isset($_GET["Mail"]))?$_GET["Mail"]:$_POST["Mail"];
	if(empty($Mail))
		header("Location: vendeurs.php");
?>
<?php include("_header.inc.php"); ?>
<?php
	// Formulaire envoy� ?
	if(isset($_POST["envoyer"]))
	{
		$sql = "UPDATE Annonce SET ";
		$sql .= "nom = '".str_replace("'","''",$_POST["nom"])."', prenom = '".str_replace("'","''",$_POST["prenom"])."', ";
		$sql .= "tel = '".$_POST["tel"]."', rue = '".str_replace("'","''",$_POST["rue"])."', ";
		$sql .= "ville = '".str_replace("'","''",$_POST["ville"])."', region = '".str_replace("'","''",$_POST["region"])."', ";
		$sql .= "cp = '".$_POST["cp"]."',pwd = '".str_replace("'","''",$_POST["pwd"])."', ";
		$sql .= "idStatus = '".$_POST["idStatus"]."', visible = '".$_POST["visible"]."', Mail = '".$Mail."' ";
		$sql .= "WHERE Mail = '".$_POST["_Mail"]."';";
		$res = mysqli_query($conn, $sql);
		mysqli_query($conn, "UPDATE Vehicule SET Mail = '".$Mail."' WHERE Mail = '".$_POST["_Mail"]."'")
		or die ("Un erreur s'est produite, veullez recommencez.");
		
		if($res != false)
		 echo "<div class='okay'>La fiche vendeur a bien �t� mise � jour.<br /><a href='vendeurs.php'>Retour aux vendeurs</a></div>";
	}
	elseif(isset($_POST["delete"]))
	{
		
		$sqlR = "SELECT idVehicule FROM Vehicule, Marque, Modele, TypeVehicule";
		$sqlR .= " WHERE Vehicule.marque = Marque.idMarque";
		$sqlR .= " AND Vehicule.modele = Modele.idModele";
		$sqlR .= " AND Vehicule.idTypeVehicule = TypeVehicule.idTypeVehicule";
		$sqlR .= " AND Vehicule.Mail = '".$Mail."';";
		$resR = mysqli_query($conn, $sqlR);
		$totalR = mysqli_num_rows($resR);
		$i=0;
			if($totalR>0)
			{
				while($tabR = mysqli_fetch_array($resR))
					{
						$req = "SELECT * FROM Concerner WHERE idVehicule ='".$tabR["idVehicule"]."'";
							if(mysqli_num_rows(mysqli_query($conn, $req))>0)
								mysqli_query($conn, "DELETE FROM Concerner WHERE idVehicule ='".$tabR["idVehicule"]."'") or die("1");
						$req2 = "SELECT * FROM Photo WHERE idVehicule ='".$tabR["idVehicule"]."'";
							if(mysqli_num_rows(mysqli_query($conn, $req2))>0)
								mysqli_query($conn, "DELETE FROM Photo WHERE idVehicule ='".$tabR["idVehicule"]."'")or die("2");
								mysqli_query($conn, "DELETE FROM Vehicule WHERE idVehicule ='".$tabR["idVehicule"]."'")or die("3");
					}
			}
		mysqli_query($conn, "DELETE FROM Vendeur WHERE Mail ='".$Mail."'")or die("4");

		echo "<div class='okay'>La fiche vendeur a bien �t� supprim�.<br />";
		echo "<a href='vendeurs.php'>Retour aux vendeurs</a></div>";
		exit();
	}
	
	// Affichage des informations relatives au v�hicules
	$sql = "SELECT * FROM Vendeur";
	$sql .= " WHERE Vendeur.Mail = '".$Mail."';";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$Mail = $tab["Mail"];
		$nom = $tab["nom"];
		$prenom = $tab["prenom"];
		$tel = $tab["tel"];
		$rue = $tab["rue"];
		$cp = $tab["cp"];
		$ville = $tab["ville"];
		$region = $tab["region"];
		$idStatus = $tab["idStatus"];
		$active = $tab["active"];
		$pwd = $tab["pwd"];
		$visible = $tab["visible"];
	}
?>
    <form id="form-vendeur" action="?" method="post">
    <fieldset>
    <legend>Vendeur</legend>
    <input type="hidden" name="_Mail" id="_Mail" value="<?php echo $Mail?>" />
        <label for="nom">Nom</label>
        <input id="nom" name="nom" type="text" value="<?php echo $nom?>" />
        
        <label for="prenom">Prenom</label>
        <input name="prenom" type="text" id="prenom" value="<?php echo $prenom?>" />
        
        <label for="rue">Rue</label>
        <input name="rue" type="text" id="rue" value="<?php echo $rue?>" />
        
        <label for="cp">Code postal</label>
        <input name="cp" type="text" id="cp" maxlength="5" value="<?php echo $cp?>" />
        
        <label for="ville">Ville</label>
        <input name="ville" type="text" id="ville" value="<?php echo $ville?>" />

        <label for="region">R�gion</label>
        <input name="region" type="text" id="region" value="<?php echo $region?>" />
        
        <label for="tel">T�l�phone</label>
        <input name="tel" type="text" id="tel" value="<?php echo $tel?>" />
        
        <label for="Mail">Mail</label>
        <input name="Mail" type="text" id="Mail" value="<?php echo $Mail?>" />
        
        <label for="pwd">Mot de passe</label>
        <input name="pwd" type="text" id="pwd" value="<?php echo $pwd?>" />
        
        </fieldset>
        
        <fieldset>
        <legend>Options</legend>
        <label for="visible">Visible</label>
        <input type="radio" id="visible" name="visible" value="1" <?php echo($visible==1)?"checked='checked'":"";?> /> Oui
        <input type="radio" id="visible" name="visible" value="0" <?php echo($visible==0)?"checked='checked'":"";?> /> Non
       <br /> <br /><img src="images/icone_excel.png"/>  
		<a href="excel_vendeur.php?mail=<?php echo $Mail?>&nom=<?php echo $nom?>&prenom=<?php echo $prenom?>" >Extraire cette fiche vendeur au format XLS </a>
	  </fieldset>
      
      <fieldset>
        <legend>Annonce(s)</legend>
        <?php 
		$sqlR = "SELECT * FROM Vehicule, Marque, Modele, TypeVehicule";
		$sqlR .= " WHERE Vehicule.marque = Marque.idMarque";
		$sqlR .= " AND Vehicule.modele = Modele.idModele";
		$sqlR .= " AND Vehicule.idTypeVehicule = TypeVehicule.idTypeVehicule";
		$sqlR .= " AND Vehicule.Mail = '".$Mail."';";
		$resR = mysqli_query($conn, $sqlR);
			if(mysqli_num_rows($resR)>0)
			{
					while($tabR = mysqli_fetch_array($resR))
					{
						echo "&raquo; <a href='edit_vehicule.php?idVehicule=".$tabR["idVehicule"]."'>";
						echo $tabR["nomMarque"]." ".$tabR["nomModele"];
						echo "</a><br >";
					}
			}
			else
				echo "Pas d'annonce.";
		?>
	  </fieldset>
      
    <div style="clear:both; margin-bottom:10px;"></div>
        <div class="table">
 <input class="big" type="reset" value="Recommencer" />
 <input class="big" type="submit" id="envoyer" name="envoyer" value="Mettre � jour" />
 <input class="big" type="submit" id="delete" name="delete" onclick="return(confirm('Etes-vous s�r de vouloir supprimer ce vendeur?\nEn supprimant ce vendeur, ses annonces seront �galement supprim�es.'));" value="Supprimer le vendeur" />
 </div>
    </form>
<?php include("_footer.inc.php"); ?>