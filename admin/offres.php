<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"intitule";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"ASC";
	// Liste des véhicules 
	$sql = "SELECT * FROM annonce ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du résultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("offres.php","intitule")."Intitul&eacute;</a></th>";
			echo "<th>".getTri("offres.php","societe")."Soci&eacute;t&eacute;</a></th>";
			echo "<th>".getTri("offres.php","ville")."Ville</a></th>";
			echo "<th>".getTri("offres.php","date_depot")."D&eacute;pos&eacute;e le </a></th>";
			echo "<th>".getTri("offres.php","contact_mail")."Mail</a></th>";
			echo "<th>".getTri("offres.php","actif")."En ligne</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["intitule"]."</td>";
				echo "<td>".$tab["societe"]."</td>";
				echo "<td>".$tab["ville"]."</td>";
				echo "<td>".GetDateFR($tab["date_depot"])."</td>";
				echo "<td>".$tab["contact_mail"]."</td>";
				echo "<td>";
				if($tab["actif"] =="1") echo "Oui"; else echo "Non";
				echo "</td>";
				echo "<td><a href='edit_offre.php?id_offre=".$tab["id_offre"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucune offre n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>