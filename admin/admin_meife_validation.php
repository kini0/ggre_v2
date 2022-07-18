<?php

session_start();

require_once 'functions/connexion.php';

$conn = mysqli_connect($server, $login, $pwd) or die('Error connecting to mysql');
mysqli_select_db($conn, $db) or die('Error selectDB');

if (isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password'])))
{
    extract($_POST);

    $sql = "SELECT login, pass, super_admin FROM admin WHERE login = '".addslashes($login)."'";
    $req = mysqli_query($conn, $sql) or die('Erreur SQL : <br />'.$sql);

    if (mysqli_num_rows($req) > 0)
    {
		$data = mysqli_fetch_assoc($req);
		$password = $_POST['password'];
		if ($password == $data['pass'])
		{
		    $loginOK = true;
		}
    }
}

if (isset($loginOK))
{
    $_SESSION['loginAdmin'] = $data['login'];
    $_SESSION['superAdmin'] = $data['super_admin'];
    header("Location: admin.php");

}

else
{
    $_SESSION['error'] = true;

    header("Location: index.php");
}
?>

