<?php 
	
	namespace APP\Controller;
	use APP\Support\DB;
	/**
	 * Student class
	 */
	class Student extends DB {

		public function addStudent($name, $email, $cell, $photo) {

			$data = $this ->InsertData('crud', [

				'name' => $name,
				'email' => $email,
				'cell' => $cell,
			]);
			if ($data) {
				return true;
			}
			
		}
	}
 ?>