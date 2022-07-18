<?php
	function requestEmpty($field){
		if(isset($_REQUEST[$field])){
			return strlen(trim($_REQUEST[$field])) === 0;
		} else {
			return true;
		}
	}

	function getTableFields($table){
		global $pdo;

		$arr = array();
		try {
		    $result = $pdo->query('SHOW FIELDS FROM ' . $table);	    
		    $arr = $result->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		}
		return $arr;			
	}

	function getTablePrimaryKeyFields($table){
		global $pdo;

		$arr = array();
		try {
		    $result = $pdo->query('SHOW FIELDS FROM ' . $table);	    
		    while($row = $result->fetch(PDO::FETCH_ASSOC)){
		    	if($row['Key'] == 'PRI'){
		    		$arr[] = $row;
		    	}
		    }
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		}
		return $arr;			
	}

	function insertDB($table, $data, $returnSql = false){
		global $pdo;

		$fields = getTableFields($table);
		$comma = ' ';

		$list_fields = $list_values = '';
		foreach($fields as $field){
			// Prend uniquement que les champ envoyer en paramêtres
			if(array_key_exists($field['Field'],$data)){
				/*$type = mb_strtolower($field['Type']);
				if(($data[$field['Field']] !== 'NULL') && (mb_strpos($type,'int') === false)){ //Si le type est tinyint, int, mediumint
					$sql .= $comma . $field['Field'] . ' = \'' . mysqli_escape_string($data[$field['Field']]) . '\'';
				}else{
					$sql .= $comma . $field['Field'] . ' = ' . mysqli_escape_string($data[$field['Field']]);
				}*/

				// Prendre tous les champs sauf l'id en autoincrément
				if($field['Extra'] != 'auto_increment'){
					$type = mb_strtolower($field['Type']); //Récupération du type du champ

					// Si le champ est de type date, datetime ...
					if(!(mb_strpos($type,'date') === false)){
						if(empty($data[$field['Field']])){
							//Si la valeur est vide alors prendre la valeur par défaut de la base de données
							$list_values .= $comma . ' DEFAULT';
						} else {
							$list_values .= $comma . $pdo->quote($data[$field['Field']]);
						}
					} else{
						$list_values .= $comma . $pdo->quote($data[$field['Field']]);
					}

					$list_fields .= $comma . $field['Field'];
					$comma = ' ,';	
				}				
			}				
		}
		$sql = 'INSERT INTO ' . $table . '('. $list_fields . ') VALUES ('. $list_values . ')'; //die($sql);

		if($returnSql) return $sql; // Retourne le code sql à executer

		try {
		    $nb_ligne_inseree = $pdo->exec($sql);
		    return $nb_ligne_inseree;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		    // print "Erreur !: " . $e->getMessage() . "<br/>";
		    //die($sql);
		}
	}

	function replaceDB($table, $data, $returnSql = false){
		global $pdo;

		$fields = getTableFields($table);
		$comma = ' ';

		$list_fields = $list_values = '';
		foreach($fields as $field){
			// Prend uniquement que les champ envoyer en paramêtres
			if(array_key_exists($field['Field'],$data)){
				/*$type = mb_strtolower($field['Type']);
				if(($data[$field['Field']] !== 'NULL') && (mb_strpos($type,'int') === false)){ //Si le type est tinyint, int, mediumint
					$sql .= $comma . $field['Field'] . ' = \'' . mysqli_escape_string($data[$field['Field']]) . '\'';
				}else{
					$sql .= $comma . $field['Field'] . ' = ' . mysqli_escape_string($data[$field['Field']]);
				}*/

				// Prendre tous les champs sauf l'id en autoincrément
				if($field['Extra'] != 'auto_increment'){
					$type = mb_strtolower($field['Type']); //Récupération du type du champ

					// Si le champ est de type date, datetime ...
					if(!(mb_strpos($type,'date') === false)){
						if(empty($data[$field['Field']])){
							//Si la valeur est vide alors prendre la valeur par défaut de la base de données
							$list_values .= $comma . ' DEFAULT';
						} else {
							$list_values .= $comma . $pdo->quote($data[$field['Field']]);
						}
					} else{
						$list_values .= $comma . $pdo->quote($data[$field['Field']]);
					}

					$list_fields .= $comma . $field['Field'];
					$comma = ' ,';	
				}				
			}				
		}
		$sql = 'REPLACE INTO ' . $table . '('. $list_fields . ') VALUES ('. $list_values . ')'; //die($sql);

		if($returnSql) return $sql; // Retourne le code sql à executer

		try {
		    $nb_ligne_inseree = $pdo->exec($sql);
		    return $nb_ligne_inseree;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		    // print "Erreur !: " . $e->getMessage() . "<br/>";
		    //die($sql);
		}
	}



	/**
	*	Methode update d'une table de la base de données
	*	@params $table : Nom de la table de la base de données
	*	@params $data : tableau php contenant les valeurs ; le tableau doit être de la forme array('champ1' => 'valeur', 'champ2' => 'valeur')
	*	@params $clauseWhere : clause à include le code sql a générer. 
	*			(exple : champ_id = '45' AND champDelta IN ('01','02','03').) 
	*			NB : Si les tables son renommer alors utiliser le renommage
	*	@params $all : mettre à true pour indiquer que les clés primaires la la table font partie des valeurs à modifier 
	*	@params $returnSql : mettre à true pour juste retourner le code sql sans l'executer;
	**/
	function updateDB($table, $data, $clauseWhere = '', $all = false, $returnSql = false){
		global $pdo;

		$fields = getTableFields($table);
		$sql = 'UPDATE ' . $table . ' SET ';
		$comma = ' ';

		foreach($fields as $field){
			if($all || $field['Key'] != 'PRI'){ //$all || (!$all && $field['Key'] != 'PRI')
				if(array_key_exists($field['Field'],$data)){
					//echo '<pre>'; print_r($data); die('</pre>');
					/*
					$type = mb_strtolower($field['Type']);
					if(($data[$field['Field']] !== 'NULL') && (mb_strpos($type,'int') === false)){ //Si le type est tinyint, int, mediumint
						$sql .= $comma . $field['Field'] . ' = \'' . mysqli_escape_string($data[$field['Field']]) . '\'';
					}else{
						$sql .= $comma . $field['Field'] . ' = ' . mysqli_escape_string($data[$field['Field']]);
					}*/


					$type = mb_strtolower($field['Type']); //Récupération du type du champ

					// Si le champ est de type date, datetime ...
					//int => tinyint, int, mediumint
					if(!(mb_strpos($type,'date') === false)){
						if(empty($data[$field['Field']])){
							//Si la valeur est vide alors prendre la valeur par défaut de la base de données
							$sql .= $comma . $field['Field'] . ' = ' . ' DEFAULT';
						} else {
							$sql .= $comma . $field['Field'] . ' = ' . $pdo->quote($data[$field['Field']]);	
						}
					} else {
						$sql .= $comma . $field['Field'] . ' = ' . $pdo->quote($data[$field['Field']]);	
					}

					$comma = ' ,';				
				}
			}
		}

		// Ajout de la clause where dans la requette sql
		if(!empty($clauseWhere)){
			$sql .= ' WHERE ' . $clauseWhere;
		}

		if($returnSql) return $sql; // Retourne le code sql à executer

		try {
			// die($sql);
		    $nb_ligne_modifiee = $pdo->exec($sql);
		    return $nb_ligne_modifiee;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		    // print "Erreur !: " . $e->getMessage() . "<br/>".$sql;
		}
	}


	function deleteDB($table, $clauseWhere = '', $returnSql = false){
		global $pdo;

		$fields = getTableFields($table);
		$sql = 'DELETE FROM ' . $table;

		// Ajout de la clause where dans la requette sql
		if(!empty($clauseWhere)){
			$sql .= ' WHERE ' . $clauseWhere;
		}
		//die($sql);
		if($returnSql) return $sql; // Retourne le code sql à executer

		try {
		    $nb_ligne_supprimee = $pdo->exec($sql);
		    return $nb_ligne_supprimee;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		    // print "Erreur !: " . $e->getMessage() . "<br/>";
		}
	}
