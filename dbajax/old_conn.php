<?php	
	$base_url = 'http://localhost/gogo/clinett';
	$db_host = 'localhost';
	$db_username = 'root'; 
	$db_mdp = ''; 
	$db_app_name = 'clinqnks_bdd';

	// $base_url = 'http://pluto.ca.planethoster.net/~serveurt/clinett/login.php';
	// $db_host = 'localhost';
	// $db_username = 'serveurt_clinett'; 
	// $db_mdp = '48lsGxT[Mus_Qn=Fbfjt'; 
	// $db_app_name = 'serveurt_clinett';


	try {
	    $pdo = new PDO('mysql:host='. $db_host .';dbname='. $db_app_name , $db_username ,$db_mdp);
	    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $pdo->query('SET NAMES UTF8'); // Encodage UTF-8
	} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}

	date_default_timezone_set('Europe/Paris');

	if (empty($root_path)) $root_path = realpath("..");

	// Include composer autoloader
	require_once($root_path. '/vendor/autoload.php');


	use phpFastCache\CacheManager;
	use phpFastCache\Core\phpFastCache;
	// Setup File Path on your config files
	CacheManager::setDefaultConfig([
	  // "path" => sys_get_temp_dir(),
		"path" => $root_path. '/appcache',
	  	"itemDetailedDate" => false
	]);

	// In your class, function, you can call the Cache
	$InstanceCache = CacheManager::getInstance('files');