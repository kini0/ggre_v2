<?php
session_start();
require_once('connexion.php');

if(isset($_POST['mail']) && $_POST['mail']!="") {
	$mail=$_POST['mail'];

	$sql = "SELECT * FROM user WHERE mail='".$mail."'";
	$res = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$tab = mysqli_fetch_array($res);
		$nom = $tab['nom'];
		$prenom = $tab['prenom'];
		$login = $tab['login'];
		$pass = $tab['pass'];
		$mail = $tab['mail'];
		
		$msg = "Bonjour ".$prenom." ".$nom.",\n<br/>";
		$msg .= "Votre demande de r�cup�ration de mot de passe a bien �t� re�ue.\n<br/>";
		$msg .= "Voici les informations li�es � votre compte extranet du site GGRE :\n<br/><br/>";
		$msg .= "Nom :\t".$tab['nom']."\n<br/>";
		$msg .= "Pr�nom :\t".$tab['prenom']."\n<br/>";
		$msg .= "Mail :\t".$tab['mail']."\n<br/>";
		$msg .= "Login :\t".$tab['login']."\n<br/>";
		$msg .= "Mot de Passe :\t".$tab['pass']."\n<br/><br/>";
		
	    $recipient = $tab['mail']; // Mail destinataire
		$subject = "R�cup�ration de mot de passe ggre.org\n";
		$mailheaders ='From: "ggre.org"<info@g-g-r-e.com>'."\n";
		$mailheaders .='Content-Type: text/html; charset="ISO-8859-1"'."\n";
		$mailheaders .='Content-Transfer-Encoding: 8bit'; 
		
		if(mail($recipient, $subject, $msg, $mailheaders)) {
			header("Location: http://www.ggre-asso.fr/result_password.php?m=1");
		}
		else header("Location: http://www.ggre-asso.fr/result_password.php?m=2");
	}
	else header("Location: http://www.ggre-asso.fr/result_password.php?m=3");
}
else header("Location: http://www.ggre-asso.fr/ggre-password.php?m=1");


?>