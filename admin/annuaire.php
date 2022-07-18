<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	if($_SESSION['superAdmin']!=1) header("Location: admin.php");
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"id_user";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"DESC";
	// Liste des v�hicules 
	$sql = "SELECT * FROM user ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du r�sultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("annuaire.php","nom")."Nom</a></th>";
			echo "<th>".getTri("annuaire.php","codePostal")."Code Postal</a></th>";
			echo "<th>".getTri("annuaire.php","ville")."Ville</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["nom"]."</td>";
				echo "<td>".$tab["codePostal"]."</td>";
				echo "<td>".$tab["ville"]."</td>";
				echo "<td><a href='edit_annuaire.php?id_user=".$tab["id_user"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucungraphoth&eacuterapeute; n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>