<?php
	session_start();

	$db_user = (isset($_SESSION["user"]))? $_SESSION["user"]['id'] : '';

	require('conn.php');
	include('functions.php');
	include('crud_function.php');
	include('list.php');
	include('insert.php');
	include('update.php');
	include('delete.php');
	include('operation.php');

	$task = $_REQUEST['task'];


	if(function_exists($task)){
		call_user_func($task);
	} else {
		// Verififier existance de la table si list, insert, update, delete
		$tab = explode('_', $task);
		$db_operation = array_shift($tab);
		$db_tablename = implode('_', $tab);
		$db_list_operation = array('list','listlimit','insert','update','delete','save');

		if(in_array($db_operation, $db_list_operation)){
			call_user_func($db_operation . '_db_operation');
		} else {
			die("la fonction $task n'existe pas");
		}
	}


	function list_db_operation(){
		global $db_tablename;
		global $pdo;

		$arr = array();
		try {
			$sql = 'SELECT * FROM ' . $db_tablename;

			// Clause where
			//$cles = getTablePrimaryKeyFields($db_tablename);
			$cles = getTableFields($db_tablename);

			$connecteur = ' ';
			$clauseWhere = '';
			foreach ($cles as $key => $c) {
				if(isset($_REQUEST[$c['Field']])){
					$clauseWhere .= $connecteur . $c['Field'] . ' = '. $pdo->quote($_REQUEST[$c['Field']]);
					$connecteur = ' AND ';
				}
			}

			if(!empty($clauseWhere)) {
				$sql .= ' WHERE '. $clauseWhere;
			}

		    $result = $pdo->query($sql);
		    $arr = $result->fetchAll(PDO::FETCH_ASSOC);
		    $dataJson = json_encode($arr);
			echo '{"total":'. $result->rowCount() .', "data":'. $dataJson .'}';
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		}
		return $arr;
	}

	function listlimit_db_operation(){
		global $db_tablename;
		global $pdo;

		$arr = array();
		try {
			$sql = 'SELECT * FROM ' . $db_tablename;
		    $result = $pdo->query($sql);
		    $nbTotal = $result->rowCount();


		    $limit = (empty($_REQUEST['limit']))? 10 : $_REQUEST['limit'];
			$page = (empty($_REQUEST['page']))? 1 : $_REQUEST['page'];
			$limit = ' LIMIT '. $limit * ($page - 1) . ','. $page * $limit;
			$sql .= $limit;
		    $result = $pdo->query($sql);
		    $arr = $result->fetchAll(PDO::FETCH_ASSOC);

		    $dataJson = json_encode($arr);
			echo '{"total":'.$nbTotal.', "data":'. $dataJson .'}';
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		}
		return $arr;
	}

	function insert_db_operation(){
		global $pdo;
		global $db_tablename;
		global $db_user;

		save_upload();

		$data = $_REQUEST + array("created_on" => date("Y-m-d H:i:s"),"created_by" => $db_user);

		$nbligne = insertDB($db_tablename,$data);
		if($nbligne){
			echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","insert_id":'. $pdo->lastInsertId() .',"nb_row":'. $nbligne .'}';
		} else {
			echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
		}
	}

	function update_db_operation(){
		global $pdo;
		global $db_tablename;
		global $db_user;

		save_upload();

		// Clause where
		$cles = getTablePrimaryKeyFields($db_tablename);

		$connecteur = ' ';
		$clauseWhere = '';
		foreach ($cles as $key => $c) {
			$clauseWhere .= $connecteur . $c['Field'] . ' = '. $pdo->quote($_REQUEST[$c['Field']]);
			$connecteur = ' AND ';
		}

		$data = $_REQUEST + array("updated_on" => date("Y-m-d H:i:s"),"updated_by" => $db_user);

		try {
			$nbligne = updateDB($db_tablename,$data,$clauseWhere);
			if($nbligne){
				echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","nb_row":'. $nbligne .'}';
			} else {
				echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
			}
		} catch (Exception $e) {
			$response = new stdClass;
			$response->success = false;
			$response->msg = "ENREGISTREMENT NON EFFECTUE";
			$response->errormsg = $e->getMessage();
			echo json_encode($response);
		}
		
	}


	function save_db_operation() {
		global $pdo;
		global $db_tablename;
		global $db_user;

		save_upload();

		// Clause where
		$cles = getTablePrimaryKeyFields($db_tablename);

		$connecteur = ' ';
		$clauseWhere = '';
		$update_mode = false;
		foreach ($cles as $key => $c) {
			if(isset($_REQUEST[$c['Field']])){
				$clauseWhere .= $connecteur . $c['Field'] . ' = '. $pdo->quote($_REQUEST[$c['Field']]);
				$connecteur = ' AND ';

				$update_mode = $update_mode || !empty($_REQUEST[$c['Field']]);
			}
		}

		$data = $_REQUEST; 

		// Gestion du champ mot de passe
		if(isset($data['pass_user'])) {
			if(empty($data['pass_user'])) {
			    unset($data['pass_user']);
			} else {
				$data['pass_user'] = sha1($data['pass_user'].'prd');
			}
		}		

		try {
			if($update_mode) {
				// Opération de modification
				$data += array("updated_on" => date("Y-m-d H:i:s"),"updated_by" => $db_user);
				$nbligne = updateDB($db_tablename,$data,$clauseWhere);
				if($nbligne){
					echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","nb_row":'. $nbligne .'}';
				} else {
					echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
				}
			} else {
				// Opération d'insertion
				$data += array("created_on" => date("Y-m-d H:i:s"),"created_by" => $db_user);
				$nbligne = insertDB($db_tablename,$data); //die($nbligne); 
				if($nbligne){
					echo '{"success":true, "msg":"ENREGISTREMENT EFFECTUE AVEC SUCCES","insert_id":'. $pdo->lastInsertId() .',"nb_row":'. $nbligne .'}';
				} else {
					echo '{"success":false, "msg":"ENREGISTREMENT NON EFFECTUE"}';
				}
			}
		} catch (Exception $e) {
			$response = new stdClass;
			$response->success = false;
			$response->msg = "ENREGISTREMENT NON EFFECTUE";
			$response->errormsg = $e->getMessage();
			echo json_encode($response);
		}			
	}

	function delete_db_operation(){
		global $pdo;
		global $db_tablename;

		// Clause where
		$cles = getTablePrimaryKeyFields($db_tablename);

		$connecteur = ' ';
		$clauseWhere = '';
		foreach ($cles as $key => $c) {
			$clauseWhere .= $connecteur . $c['Field'] . ' = '. $pdo->quote($_REQUEST[$c['Field']]);
			$connecteur = ' AND ';
		}

		try {
			$nbligne = deleteDB($db_tablename,$clauseWhere);
			if($nbligne){
				echo '{"success":true, "msg":"SUPPRESION EFFECTUEE AVEC SUCCES","nb_row":'. $nbligne .'}';
			} else {
				echo '{"success":false, "msg":"SUPPRESION NON EFFECTUEE"}';
			}
		} catch (Exception $e) {
			$response = new stdClass;
			$response->success = false;
			$response->msg = "SUPPRESION NON EFFECTUEE";
			$response->errormsg = $e->getMessage();
			echo json_encode($response);
		}		
	}


	function connexion(){
		global $pdo;

		$login = empty($_REQUEST['login'])? '' : $_REQUEST['login'];
		$mdp = empty($_REQUEST['pass'])? '' : $_REQUEST['pass'];

		try{
			$login_field = $pdo->quote($_REQUEST['login']);
			$pass_field = $pdo->quote($_REQUEST['pass']);
			$sql = "SELECT * FROM bn_user WHERE mail = {$login_field} AND pass = sha1($pass_field)";
			$result = $pdo->query($sql) ;
			if($result->rowCount() > 0){
				$_SESSION['user']  = $result->fetch(PDO::FETCH_ASSOC);
				
				echo '{"success":true,"msg":"CONNEXION OK"}';
			} else {
				echo '{"success":false,"msg":"Login ou mot de passe incorrect"}';
			}
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		}
	}

	function save_upload() {	
		if(!empty($_FILES)){
            foreach($_FILES as $index => $file){
                $filename = upload($file, $index);
                if($filename) {
                	$_REQUEST[$index] = $filename;
                }
            }
        }
	}

	function upload($file, $index) {
		if($file['error'] == UPLOAD_ERR_OK) {
			if (is_uploaded_file($file['tmp_name'])) {
			   	if(isset($file) && $file["name"] != "") {
			       	$file_info = pathinfo($file["name"]);
			       	$extension = $file_info["extension"];
			   
			   		$ext_doc = array(
			   		    'gif', 'jpg', 'jpeg', 'png',
			   		    'doc', 'docx', 'xls', 'xlsx', 'csv', 'pdf', 'txt', 'dot', 'rtf', 'ppt', 'pptx',
			   		    'zip', 'rar'
			   		);

			       	if(in_array(strtolower($extension), $ext_doc)) {
			           	$lien = 'doc_'.$index.'_'.mt_rand().'_'.substr(sha1($file["name"]), 0, 10).'.'.$extension;

						$fichier = realpath("../docs") . '/' . $lien; 
	
			           	try {
				           	if(move_uploaded_file($file["tmp_name"], $fichier)) {
				           		return $lien;
				           	} else {
				           		return '';
				           	}
			           	} catch (Exception $e) {
				           	// print_r($e); exit;
				           	return '';
			           	}                
			       	} else {
			           	return ''; // Extention non reconnue	
			       	}
			   	} else {
			       	return '';  // Aucun Fichier
			   	}
			} else {
			   	return '';
			}		
		} else {
			return '';
		}

        
    }

	/*
	ALTER TABLE `table_name`
	ADD COLUMN `created_on` DATE NULL DEFAULT NULL,
	ADD COLUMN `created_by` VARCHAR(250) NULL DEFAULT '' AFTER `created_on`,
	ADD COLUMN `updated_on` DATE NULL DEFAULT NULL AFTER `created_by`,
	ADD COLUMN `updated_by` VARCHAR(250) NULL DEFAULT '' AFTER `updated_on`;
	*/
