<?php 
session_start();
include("_header.inc.php"); ?>

<?php
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"nom";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"ASC";
	// Liste des véhicules 
	$sql = "SELECT * FROM compte ORDER BY ".$orderby." ".$tri.";";
	$res = mysqli_query($conn, $sql);
	
	// Affichage du résultat
		if(mysqli_num_rows($res)>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("membres.php","nom")." Nom</a></th>";
			echo "<th>".getTri("membres.php","prenom")." Pr&eacute;nom</a></th>";
			echo "<th>".getTri("membres.php","adresse")." Adresse</a></th>";
			echo "<th>".getTri("membres.php","cp")." Code postal</a></th>";
			echo "<th>".getTri("membres.php","ville")." Ville</a></th>";
			echo "<th>".getTri("membres.php","email")." Mail</a></th>";
			echo "<th>".getTri("membres.php","tel")." T&eacute;l&eacute;phone</a></th>";
			echo "<th>".getTri("membres.php","actif")." Actif</a></th>";
			echo "<th>".getTri("membres.php","inscription")." Inscription</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["nom"]."</td>";
				echo "<td>".$tab["prenom"]."</td>";
				echo "<td>".$tab["adresse"]."</td>";
				echo "<td>".$tab["cp"]."</td>";
				echo "<td>".$tab["ville"]."</td>";
				echo "<td>".$tab["email"]."</td>";
				echo "<td>".$tab["tel"]."</td>";
				echo "<td>";
				if($tab["actif"] =="1") echo "Oui"; else echo "Non";
				echo "</td>";
				echo "<td>".$tab["inscription"]."</td>";
				echo "<td><a href='edit_membre.php?id_membre=".$tab["id_membre"]."'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo"</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucun membre n'est r&eacute;pertori&eacute; dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>