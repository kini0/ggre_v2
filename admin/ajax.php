<?php
include("connexion.php");
if($_GET["mode"] == "delete" && is_numeric($_GET["id_type"]) == true)
{
	// Suppression dans la base de donn�es
	$sql = "UPDATE ".$_GET["type"]." SET document = '' WHERE id_".$_GET["type"]." = '".$_GET["id_type"]."' ";
if ($_GET["type"]=="trim1") $sql =  "UPDATE observatoire SET trim1 = '' WHERE id_observatoire = '".$_GET["id_type"]."'";
if ($_GET["type"]=="trim2") $sql =  "UPDATE observatoire SET trim2 = '' WHERE id_observatoire = '".$_GET["id_type"]."'";
if ($_GET["type"]=="trim3") $sql =  "UPDATE observatoire SET trim3 = '' WHERE id_observatoire = '".$_GET["id_type"]."'";
if ($_GET["type"]=="trim4") $sql =  "UPDATE observatoire SET trim4 = '' WHERE id_observatoire = '".$_GET["id_type"]."'";
	$res = mysqli_query($conn, $sql);
	echo $sql; 
	// Suppression dans le r�pertoire
	$nom_fichier = $_GET["nom_fichier"];
	unlink("../../files/".$nom_fichier);
	
	if($res != false)
		echo "true";
	else
		echo "false";
}
?>