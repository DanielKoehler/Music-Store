<?php
class database{
	var $conn;
	function __construct()
	{
		try{
			// $this->conn = new PDO('mysql:host=ephesus.cs.cf.ac.uk;dbname=c1340154;','c1340154', 'caffenero'); // Uni DB server
			$this->conn = new PDO('mysql:host=localhost;dbname=c1340154;','root', ''); // Local DB server
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	function prep_keys($data = array())
	{
		if(is_array($data) &&  !empty($data)){
			foreach($data as $key => $value){
				if($key{0} != ':'){
					$data[':'.$key] = $value;
					unset($data[$key]);
				}
			}
			return $data;
		}
		return array($data);
	}

	function select($sql, $data = array())
	{
		$stmt = $this->conn->prepare($sql);
		try {
			$stmt->execute($data);
		} catch(PDOException $e){
			die($e->getMessage());
		}
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function num_rows($sql, $data = array())
	{
		$stmt = $this->conn->prepare($sql);
		try {
			$stmt->execute($data);
		} catch(PDOException $e){
			die($e->getMessage());
		}
		
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$n = count($rows);
		
		return $n;
	}

	function yield_select($sql, $data = array())
	{
		$stmt = $this->conn->prepare($sql);
		try {
			$stmt->execute($data);
		} catch(PDOException $e){
			die($e->getMessage());
		}

		$results = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
			yield $row;
		}
	}

	function insert($table, $data)
	{
		if(!empty($data)){
			foreach($data as $key => $value)
			{
				$columns[] = $key;
			}
			$stmt = $this->conn->prepare("INSERT INTO `$table` (`".implode('`, `', $columns)."`) VALUES (".implode(', ', array_keys($this->prep_keys($data))).")");
			
			try {
				$stmt->execute($this->prep_keys($data));
			} catch(PDOException $e){
				die($e->getMessage());
			}
			return $this->conn->lastInsertId();
		}
	}

	function update($table, $data,$where_column,$ids)
	{
		$state = true;
		foreach ($data as $key => $value) 
		{
			$set_data[] = "`$key` = :" . $key; 
		}

		$stmt = $this->conn->prepare("UPDATE `$table` SET ".implode(', ', $set_data)." WHERE `$where_column` = :whereid");

		foreach ($ids as $id) {
			$data['whereid'] = $id;
			try {
				$state = $stmt->execute($this->prep_keys($data));
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
		return $state;
	}

	function delete($table,$where_column,$ids = array())
	{
		$stmt = $this->conn->prepare("DELETE FROM `$table` WHERE `$where_column` = :whereid");
		foreach ($ids as $id) {
			$data['whereid'] = $id;
			$state = $stmt->execute($this->prep_keys($data));
		}
		try {
			return $stmt->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	function force_disconnect()
	{
		$this->conn = null;
	}

	function __destruct()
	{
		$this->conn = null;
	}
}