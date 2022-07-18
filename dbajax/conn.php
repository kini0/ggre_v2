<?php	
	$db_host = "localhost";
	$db_username = "ggre"; 
	$db_mdp = "Rg]a?2-"; 
	$db_app_name = "ggre";

	try {
	    $pdo = new PDO('mysql:host='. $db_host .';dbname='. $db_app_name , $db_username ,$db_mdp);
	    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $pdo->query('SET NAMES UTF8'); // Encodage UTF-8
	} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    exit;
	}

	date_default_timezone_set('Europe/Paris');

	if (empty($root_path)) $root_path = realpath("..");

	// Include composer autoloader
	//require_once($root_path. '/vendor/autoload.php');
