<?php 
$server="localhost";
$login="root";
$pwd="Rg]a?2-";
$db="meife93";

$ftp_server="193.34.130.32";
$ftp_user_name="capnetinteractive"; 
$ftp_user_pass="65csndsj43qQze";


$conn = mysqli_connect($server, $login, $pwd) or die('Error connecting to mysql');
mysqli_select_db($conn, $db) or die('Error selectDB');

// à elle seule, la ligne suivante suffit à envoyer le résultat du script dans une feuille Excel
    header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"export-".$_REQUEST["type-action"]."-".date("d/m/Y").".xls\"");
	// Par défaut : On affiche les doublons
	switch($_REQUEST["type-action"])
	{
		// Affichages des doublons
		case "doublons":
		$Titre = "Doublons";
		$sql = "SELECT id_membre, nom, prenom, dn, adresse, email, cp, ville, tel, actif
				FROM compte
				WHERE CONCAT( nom, prenom, dn )
				IN (
				SELECT CONCAT( nom, prenom, dn ) AS trois_col
				FROM compte
				GROUP BY nom, prenom, dn
				HAVING COUNT( * ) > 1
				) ORDER BY nom ASC ";
		break;
		
		// Affichages des comptes à examiner
		case "erreurs":
		$Titre = "Comptes à problèmes";
		$sql = "SELECT * FROM compte WHERE nom = '' OR prenom = '' OR adresse = '' OR cp = ''";
		$sql .= " OR ville = '' OR dn = '' OR tel = '' OR code_conseiller = '' OR pass = '' ";
		$sql .= "ORDER BY compte.nom ASC ";
		break;
		
		default:
		break;
	}
	$res = mysqli_query($conn, $sql, $con);
	$total = mysqli_num_rows($res);

	// Affichage du résultat
		if($total>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>Nom</a></th>";
			echo "<th>Pr&eacute;nom</a></th>";
			echo "<th>Adresse</a></th>";
			echo "<th>Code postal</a></th>";
			echo "<th>Ville</a></th>";
			echo "<th>Mail</a></th>";
			echo "<th>T&eacute;l&eacute;phone</a></th>";
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
				echo "</tr>";
			}
			echo "</table>";
		}
		    mysqli_close();

?>
