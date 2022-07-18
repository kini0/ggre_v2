<?php
session_start();

if(!isset($_SESSION['loginAdmin']))
{
    echo 'Vous n\'êtes pas autoris&eacute; à acceder à cette zone';
    exit;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Interface Administrateur</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
	<div align="center">
	    <div id="haut"><img src="images/taitiere.jpg" width="500" height="129" alt="taitiere" title="taitiere"></div>
	    <br><br>
	    <strong><font color="#207FC3" size="2" face="Arial, Helvetica, sans-serif">Interface Gestion - Administration</font></strong>
	    <br><br><br><br>
	</div>

	<div style="margin-left:20px; ">
	    <table width="911" border="0" id="info_connexion">
		<tr>
		    <td width="250"><font size="2" face="Arial, Helvetica, sans-serif"></font><u>Bienvenue administrateur</u> : <font color="#0468B3"><strong><?php echo $_SESSION["loginAdmin"]?> </strong></font></td>
		    <td width="100"><a href="deconnexion.php">Déconnexion</a></td>
		</tr>
	    </table>

	    <hr width="100%" size="1" style="margin-left:-20px;">
	    <strong>Choisissez une des actions possibles ci-dessous :</strong>
	    <ul id="index-admin">
		<li><a href="offres.php">Offres d'emploi</a></li>
        <li><a href="membres.php">Membres</a></li>
	    </ul>
	</div>
    </body>
</html>