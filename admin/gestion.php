<?php 
session_start();
include("_header.inc.php");
	$orderby = (isset($_GET["orderby"]))?$_GET["orderby"]:"nom";
	$tri = (isset($_GET["tri"]))?$_GET["tri"]:"DESC";
	$action = (isset($_REQUEST["action"]))?$_REQUEST["action"]:"doublons";
 ?>

<div class="table">
<form action="?" method="get" id="form-gestion" name="form-gestion">
  <button class="big" type="submit" name="action" value="doublons">Doublons</button>
  <button class="big" type="submit" name="action" value="erreurs">Comptes &agrave; examiner</button>
 </form>
<form action="export-excel.php" method="post" id="form-export" name="form-export">
  <button class="big" type="submit" name="action" value="export">Export XLS</button>
   <input type="hidden" value="<?php echo $action;?>" name="type-action" id="type-action" />
 </form>
 </div>
<?php
	// Par défaut : On affiche les doublons
	switch($action)
	{
		// Affichages des doublons
		case "doublons":
		$Titre = "Doublons";
		$sql = "SELECT id_membre, nom, prenom, dn, adresse, email, cp, ville, tel, actif
				FROM compte
				WHERE CONCAT( nom, prenom, dn )
				IN (
				SELECT CONCAT( nom, prenom, dn ) AS trois_col
				FROM compte
				GROUP BY nom, prenom, dn
				HAVING COUNT( * ) > 1
				) ORDER BY nom ASC ;";
		break;
		
		// Affichages des comptes à examiner
		case "erreurs":
		$Titre = "Comptes à problèmes";
		$sql = "SELECT * FROM compte WHERE nom = '' OR prenom = '' OR adresse = '' OR cp = ''";
		$sql .= " OR ville = '' OR dn = '' OR tel = '' OR code_conseiller = '' OR pass = '' ";
		$sql .= "ORDER BY ".$orderby.";";
		break;
		
		default:
		break;
	}
	$res = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($res);

	// Affichage du résultat
		if($total>0)
		{
			echo "<table cellpadding='5' class='table'>";
			echo "<tr>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"nom")." Nom</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"prenom")." Pr&eacute;nom</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"adresse")." Adresse</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"cp")." Code postal</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"ville")." Ville</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"email")." Mail</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"tel")." T&eacute;l&eacute;phone</a></th>";
			echo "<th>".getTri("gestion.php?action=".$_GET["action"],"actif")." Actif</a></th>";
			echo "<th>&Eacute;diter</th>";
			echo "</tr>";
			while($tab = mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>".$tab["nom"]."</td>";
				echo "<td>".$tab["prenom"]."</td>";
				echo "<td>".$tab["adresse"]."</td>";
				echo "<td>".$tab["cp"]."</td>";
				echo "<td>".$tab["ville"]."</td>";
				echo "<td>".$tab["email"]."</td>";
				echo "<td>".$tab["tel"]."</td>";
				echo "<td>";
				if($tab["actif"] =="1") echo "Oui"; else echo "Non";
				echo "</td>";
				echo "<td><a href='javascript:newpopup(".$tab["id_membre"].")'>";
				echo "<img src='images/edit.png' /></a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else
			echo "Aucun membre n'est r&eacute;pertori&eacute; dans la base de donn&eacute;es.";
?>
<br />
<br /><div class="table"><a href="admin.php">Retour au sommaire</a></div>
<?php include("_footer.inc.php"); ?>