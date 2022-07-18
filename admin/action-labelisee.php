<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"id_action_labelisee";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"DESC";
	// Liste des véhicules 
	$sql = "SELECT * FROM action_labelisee WHERE type_action='1' ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);

	// Affichage du résultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("action-labelisee.php","titre")."Titre</a></th>";
			echo "<th>".getTri("action-labelisee.php","date_depot")."Date</a></th>";
			echo "<th>".getTri("action-labelisee.php","actif")."En ligne</a></th>";
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
				echo "<td><a href='edit_action-labelisee.php?id_action_labelisee=".$tab["id_action_labelisee"]."&type_action=1'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucune actualit&eacute; n'est r&eacute;pertori&eacute;e dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>