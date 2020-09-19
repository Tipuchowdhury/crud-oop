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
	/**
	 * insert into database from form
	 */
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
	/**
	 * uploading file into database
	 */
	protected function photoUpload($file, $location= '', array $file_type= ['jpg', 'png', 'jpeg', 'gif' ] ) {

		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_array = explode('.', $file_name);
		$file_extension = strtolower (end($file_array));
		$unique_name = md5(time(). rand()) . '.'. $file_extension;
		move_uploaded_file($file_tmp, $location . $unique_name);
		return $unique_name;
	}

	/**
	 * pull all student data from database
	 */

	protected function Students_info ($table, $order_by) {

		$sql = "SELECT * FROM $table ORDER BY id $order_by";
		$data = $this->Dbonnection ()-> query($sql);
		if ($data) {
			return $data;
		}

	}
	protected function single_student_info ($id) {

		$sql = "SELECT * FROM crud WHERE id = $id";
		$info = $this->Dbonnection ()-> query($sql);
		if ($info) {
			return $info;
		}
	}


	
}
	
?>