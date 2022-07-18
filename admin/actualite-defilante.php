<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"titre";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"ASC";
	// Liste des véhicules 
	$sql = "SELECT * FROM actu_defilante ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du résultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("actualite_defilante.php","titre")."Titre</a></th>";
			echo "<th>".getTri("actualite_defilante.php","actif")."En ligne</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["titre"]."</td>";
				echo "<td>";
				if($tab["actif"] =="1") echo "Oui"; else echo "Non";
				echo "</td>";
				echo "<td><a href='edit_ad.php?id_actu=".$tab["id_actu"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucune actualit&eacute; d&eacute;filante n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>