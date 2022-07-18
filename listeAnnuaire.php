<?php
session_start();
require_once('connexion.php');

if(isset($_REQUEST['dpt'])) {
	$query = "SELECT * FROM user WHERE codePostal LIKE '$_REQUEST[dpt]%' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}

if(isset($_REQUEST['name'])) {
	$query = "SELECT * FROM user WHERE nom = '$_REQUEST[name]' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}

if(isset($_REQUEST['namelibre'])) {
	$query = "SELECT * FROM user WHERE CONCAT(nom, ' ', prenom) LIKE '%" . $_REQUEST['namelibre'] . "%' OR codePostal LIKE '" . $_REQUEST['namelibre'] . "%' ORDER BY CONCAT(nom, ' ', prenom)";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}

if(isset($_REQUEST['reg'])) {
	$region = str_replace(",","%' OR codePostal LIKE '",$_REQUEST['reg']);
	$query = "SELECT * FROM user WHERE codePostal LIKE '$region%' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result)) {
		echo '<a onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}

if(isset($_REQUEST['code_postal'])) {
	$query = "SELECT * FROM user WHERE codePostal LIKE '$_REQUEST[code_postal]%' ORDER BY codePostal";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo '<a onclick="infosLightBox('.$row['id_user'].');" class="lightbox-link" rel="lightbox">'.utf8_encode($row['nom']).' '.utf8_encode($row['prenom']).'<br /><span class="Style42">'.utf8_encode($row['codePostal']).' '.utf8_encode($row['ville']).' ><br /></span><br /></a>';
	}
}
	
?>