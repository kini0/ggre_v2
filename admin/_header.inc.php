<?php
if (!isset($_SESSION['loginAdmin']))
{
    echo 'Vous n\'êtes pas autoris&eacute; à acceder à cette zone';
    exit;
}

require_once 'functions/connexion.php';
//require_once '../functions.php';
include("functions/php/functions.php");

$tb = array();
// Module de gestion
$tb[] = "gestion.php";
// Module formation
$tb[] = "formations.php";
$tb[] = "new_formation.php";
$tb[] = "edit_formation.php";
// Module actualité défilante
$tb[] = "actualite-defilante.php";
$tb[] = "new_ad.php";
$tb[] = "edit_ad.php";


// Placer dans une variable la page actuelle
$current_page = getCurrentPage();
foreach ($tb as $v) 
{
	if($v == $current_page)
	{
		if ($_SESSION['superAdmin'] != '1')
		{
    		echo "Vous n\'êtes pas autoris&eacute; à acceder à cette zone.";
    		echo "<br /><a href='http://meife93.fr/admin/index.php'>Retour à l'accueil</a>";
    		exit;
		}
	}
}
/*  */


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Interface Administrateur</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <script type="application/javascript" language="javascript" src="functions/js/script.js"></script>
    </head>

    <body>
        <div align="center">
            <div id="haut"><a href="admin.php"><img src="images/logo-ggre.png" ></a></div>
            <strong><font color="#207FC3" size="2" face="Arial, Helvetica, sans-serif">Interface Gestion - Administration</font></strong>
            <br><br>
        </div>

        <div style="margin-left:20px; ">
            <table width="911" border="0" id="info_connexion">
                <tr>
                    <td width="250"><font size="2" face="Arial, Helvetica, sans-serif"></font><u>Bienvenue administrateur</u> : <font color="#0468B3"><strong><?php echo $_SESSION["loginAdmin"]; ?></strong>  - <?php echo $superAdmin?> </font></td>
                    <td width="100"><a href="deconnexion.php">Déconnexion</a> - <a href="admin.php">Retour à l'accueil</a></td>
                </tr>
            </table>

            <hr width="100%" size="1" style="margin-left:-20px;">
