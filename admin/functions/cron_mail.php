<?php
// Relance automatique de mails
// Période : 15 jours après la depôt de l'annonce

require_once ("functions/connexion.php");
include("functions/php/functions.php");

// Date actuelle
$date_now = date("Y-m-d");

// Requête
$sql = "SELECT * FROM annonce WHERE actif ='1' ";
$res = mysqli_query($conn, $sql);
	
// Vérifier qu'il y a des annonces dans la bd
	if(mysqli_num_rows($res)>0)
	{
		while($tab=mysqli_fetch_array($res))
		{
			// Si cela fait plus de 15 jours, envoyer un mail de relance
			if($tab["date_depot"],$date_suspension)
			{
				$msg .= "Vous avez déposé une annonce sur notre site internet www.meife93.com\n";
				$msg .= "Nom :\t$nom\n";
				$recipient = $tab["contact_mail"]; // Mail destinataire
				$subject = "Votre offre d'emploi sur le site meife93.fr\n";
				$mailheaders ='From: "Meife93"<info@meife-93.com>'."\n";
				$mailheaders .='Content-Type: text/html; charset="iso-8859-1"'."\n";
				$mailheaders .='Content-Transfer-Encoding: 8bit'; 
				mail($recipient,$subject,$msg,$mailheaders);  
			}
		}
	}
?>