<?php
$server="localhost";
$login="root";
$pwd="";
$db="ggre";

$conn = mysqli_connect($server, $login, $pwd) or die('Error connecting to mysql');
mysqli_select_db($conn, $db) or die('Error selectDB');


function redirection($adresse_url, $temps)
{
	print('<meta http-equiv="refresh" content="' . $temps . ';URL='.$adresse_url.'">');
}
?>