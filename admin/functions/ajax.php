<?php
session_start();
include("connexion.php");
if($_GET["mode"] == "delete" && is_numeric($_GET["id_type"]) == true)
{
	// Suppression dans la base de données
	$sql = "UPDATE ".$_GET["type"]." SET document = '' WHERE id_".$_GET["type"]." = '".$_GET["id_type"]."' ";
	
	$res = mysqli_query($conn, $sql);
	echo $sql; 
	// Suppression dans le répertoire
	$nom_fichier = $_GET["nom_fichier"];
	unlink("../../files/".$nom_fichier);
	
	if($res != false)
		echo "true";
	else
		echo "false";
}
?>