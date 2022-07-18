<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"id_observatoire";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"DESC";
	// Liste des acticles Observatoire 
	$sql = "SELECT * FROM observatoire ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du r�sultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("observatoire.php","titre")."Titre</a></th>";
			echo "<th>".getTri("observatoire","date_depot")."Date</a></th>";
			echo "<th>".getTri("observatoire.php","actif")."En ligne</a></th>";
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
				echo "<td><a href='edit_observatoire.php?id_observatoire=".$tab["id_observatoire"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucune donn&eacute;e &eacute;conomique n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>