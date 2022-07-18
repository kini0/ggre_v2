<?php
$server="localhost";
$login="ggre";
$pwd="Rg]a?2-";
$db="ggre";

mysqli_connect($server, $login, $pwd) or die('Error connecting to mysql');
mysqli_select_db($db) or die('Error selectDB');


function redirection($adresse_url, $temps)
{
	print('<meta http-equiv="refresh" content="' . $temps . ';URL='.$adresse_url.'">');
}
?>