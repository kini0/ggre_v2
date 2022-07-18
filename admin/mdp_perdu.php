<?php
// champs : nom, age, mail
if(empty($_POST["nom"]) || empty($_POST["age"]) || empty($_POST["mail"]))
{
	//Redirection
	header("Location: mdp.php?error=1");
}
else 
	{
		$sql = "SELECT * FROM compte WHERE nom = '".$_POST["nom"]."' AND age = '".$_POST["age"]."' AND mail = '".$_POST["mail"]."';";
		$res = mysqli_query($conn, $sql);
		$total = mysqli_num_rows($res);
			if($total == "1")
			{
				$tab = mysqli_fecth_array($res);
				$recipient = $tab["contact_mail"]; // Mail destinataire
				$subject = "Meife93 : Votre mot de passe";
				$mailheaders ='From: "meife93"<info@meife-93.com>'."\n";
				$mailheaders .='Content-Type: text/html; charset="iso-8859-1"'."\n";
				$mailheaders .='Content-Transfer-Encoding: 8bit';
				$msg = $tab["nom"]." ".$tab["prenom"].",\n Voici votre mot de passe : ".$tab["pass"]."\n\n meife93.fr";
				mail($recipient, $subject, $msg, $mailheaders);
			}
			else
			{
				//Redirection
				header("Location: mdp.php?error=2");
			}
	}
?>