<?php
session_start();

if(isset($_SESSION['loginAdmin']))
{
    header("Location: admin.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Espace d'administration - Connexion</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
	<div id="total">

	    <div id="haut"><img src="images/logo-ggre.png"></div>

	    <div id="contenu">
		<img src="images/texte2.gif" width="405" height="38" alt="instrcutions"><br><br>

		<?php
		if ($_SESSION['error'])
		{
		    echo'<span id="error">Erreur de login/mot de passe</span>';
		    $_SESSION['error'] = false;
		}
		?>

		<form  method="post" class="form-auth" name="form" action="admin_meife_validation.php">
		    <table border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
			    <td><div align="right"><img src="images/login.gif" width="47" height="24" border="0" alt="login" onClick="javascript:(document.form.login.focus())"></div></td>

			    <td><input name="login" type="text" maxlength="25"></td>
			</tr>
			<tr>
			    <td><img src="images/passe.gif" width="119" height="27" border="0" alt="mot de passe" onClick="javascript:(document.form.password.focus())"></td>
			    <td><input name="password" type="password" maxlength="25"></td>
			</tr>
		    </table>
	      <br>
		    <input name="submit" type="image" src="images/valider.gif">
		</form>

	    </div>
	</div>

    </body>
</html>