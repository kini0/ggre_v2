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
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Interface Administrateur</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
	<div align="center">
	    <div id="haut"><img src="images/logo-ggre.png"></div>
	    <strong><font color="#207FC3" size="2" face="Arial, Helvetica, sans-serif">Interface Gestion - Administration</font></strong>
<br><br>
	</div>

	<div style="margin-left:20px; ">
	    <table width="911" border="0" id="info_connexion">
		<tr>
		    <td width="250"><font size="2" face="Arial, Helvetica, sans-serif"></font><u>Bienvenue administrateur</u> : <font color="#0468B3"><strong><?php echo $_SESSION["loginAdmin"]?> </strong></font></td>
		    <td width="100"><a href="deconnexion.php">DECONNEXION</a></td>
		</tr>
	    </table>

	    <hr width="100%" size="1" style="margin-left:-20px;">
	    <strong>Choisissez une des actions possibles ci-dessous :</strong>
      <div style="margin-left:auto;margin-right:auto;">
      <ul id="index-admin">
		<?php
		if($_SESSION['superAdmin']==1) { ?>
      	<li class="orange"><br>
<a href="annuaire.php" class="big">Annuaire</a>
    	<br><br>
      	 <a href="annuaire.php">Liste des graphotherapeutes</a><br>
      	<br> <a href="new_annuaire.php">Ajouter un graphotherapeute</a>
      </li>
		<?php } ?>
      	<li class="bleu"><br>
<a href="newsletter.php" class="big">La Lettre &amp; La Plume<br></a>
    	<br>
      	 <a href="newsletter.php">Liste des newsletter</a><br>
      	<br>  <a href="new_newsletter.php">Ajouter une newsletter</a>
      </li>
      	<li class="vert"><br>
<a href="ordre_nextAG.php" class="big">Infos & Docs</a>
    	<br><br>
      	 <a href="ordre_nextAG.php">Liste des Informations</a><br>
      	<br> ; <a href="new_ordre_nextAG.php">Ajouter une Information</a>
      </li>
      	<li class="emeraude"><br>
<a href="pv_ag.php" class="big">Actualites</a>
    	<br><br>
      	 <a href="pv_ag.php">Liste des Actualites</a><br>
      	<br>  <a href="new_pv_ag.php">Ajouter une Actualite</a>
      </li>
	  </ul>
    </div>
	</div>
    </body>
</html>