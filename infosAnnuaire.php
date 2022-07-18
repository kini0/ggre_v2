<?php
session_start();
require_once('connexion.php');

if(isset($_POST['id'])) {
	$query = "SELECT * FROM user WHERE id_user = '".$_POST['id']."'";
	$result = mysqli_query($conn, $query);
	if($row = mysqli_fetch_assoc($result)) {
		echo "Nom : <span class=\"resultatBold\">".utf8_encode($row['nom']).'</span><br/>';
		echo "Prénom : <span class=\"resultatBold\">".utf8_encode($row['prenom']).'</span><br/>';
		echo "Code Postal : <span class=\"resultatBold\">".utf8_encode($row['codePostal']).'</span><br/>';
		echo "Téléphone : <span class=\"resultatBold\">".utf8_encode($row['telFixe']).'</span><br/>';
		echo "E-mail : <span class=\"resultatBold\">".utf8_encode($row['mail']).'</span><br/>';
	}
}
	/*
		echo "Adresse : ".utf8_encode($row['adresse']).'<br/>';
		echo "Ville : ".utf8_encode($row['ville']).'<br/>';
		echo "Téléphone : ".utf8_encode($row['telFixe']).'<br/>';
		echo "Portable : ".utf8_encode($row['telPortable']).'<br/>';
	*/
?>