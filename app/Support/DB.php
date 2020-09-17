<?php

 namespace APP\Support;
 use mysqli;
/**
 * Database class
 */
abstract class DB
{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "practice_crud";
	private $conn;

	/**
	 * create connection to database
	 */
	private function Dbonnection () {

		return $this->conn = new mysqli ($this->host, $this->user, $this->pass, $this->db);
	}

	protected function InsertData($table_name, array $data){

		// get keys from array
		$data_key = array_keys($data);
		$data_keys = implode(',', $data_key);

		// get values from array
		$data_value = array_values($data);
		
 
		foreach ($data_value as $value) {
			$data_values[] = "'".$value. "'"; 
		}
		$data_v = implode(',', $data_values);
		$sql = "INSERT INTO $table_name ($data_keys) VALUES ($data_v)";
		$insert = $this-> Dbonnection()-> query($sql);
		if ($insert) {
			return true;
		}

	}


	
}
	
?>