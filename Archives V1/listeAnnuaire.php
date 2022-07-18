<?php
session_start();
require_once('connexion.php');

if(isset($_POST['dpt'])) {
	$query = "SELECT * FROM user WHERE codePostal LIKE '".$_POST['dpt']."%' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a href="#" onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}
if(isset($_POST['name'])) {
	$query = "SELECT * FROM user WHERE nom = '".$_POST['name']."' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a href="#" onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}
if(isset($_POST['reg'])) {
	$region = str_replace(",","%\" OR codePostal LIKE \"",$_POST['reg']);
	$query = "SELECT * FROM user WHERE codePostal LIKE \"".$region."%\" ORDER BY codePostal";
	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result)) {
		echo '<a href="#" onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}

if(isset($_POST['code_postal'])) {
	$query = "SELECT * FROM user WHERE codePostal LIKE '".$_POST['code_postal']."%' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a href="#" onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}
	
?>