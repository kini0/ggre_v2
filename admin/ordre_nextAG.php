<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"id_ordre_nextAG";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"DESC";
	// Liste des véhicules 
	$sql = "SELECT * FROM ordre_nextAG ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du résultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("ordre_nextAG.php","titre")."Titre</a></th>";
			echo "<th>".getTri("ordre_nextAG.php","date_depot")."Date</a></th>";
			echo "<th>".getTri("ordre_nextAG.php","actif")."En ligne</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["titre"]."</td>";
				echo "<td>".GetDateFR($tab["date_depot"])."</td>";
				echo "<td>";
				if($tab["actif"] =="1") echo "Oui"; else echo "Non";
				echo "</td>";
				echo "<td><a href='edit_ordre_nextAG.php?id_ordre_nextAG=".$tab["id_ordre_nextAG"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucun ordre n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>