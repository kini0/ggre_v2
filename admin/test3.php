<?php session_start();
include("_header.inc.php");


		$sql = "SELECT id_membre, nom, prenom, dn, adresse, email, cp, ville, tel, actif
FROM compte
WHERE CONCAT( nom, prenom, dn )
IN (

SELECT CONCAT( nom, prenom, dn ) AS trois_col
FROM compte
GROUP BY nom, prenom, dn
HAVING COUNT( * ) >

1
) ORDER BY nom ASC ;";
		$res = mysqli_query($conn, $sql);
	
		echo mysqli_num_rows($res); ?>