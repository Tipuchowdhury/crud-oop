<?php 
	
	namespace APP\Controller;
	use APP\Support\DB;
	/**
	 * Student class
	 */
	class Student extends DB {

		/**
		 * add student information in database
		 */
		public function addStudent($name, $email, $cell, $photo) {

			// file upload
			$photo = $this->photoUpload($photo, "media/students");
			
			$data = $this ->InsertData('crud', [

				'name' => $name,
				'email' => $email,
				'cell' => $cell,
				'photo' => $photo,
			]);
			if ($data) {
				return true;
			}
			
			
		}
		/**
		 * show all information of all student
		 */
		public function AllStudent() {

			$all_students = $this-> Students_info('crud', 'DESC');
			if ($all_students) {
				return $all_students;
			}
		}
		public function ViewStudent($id) {
			$info = $this->single_student_info($id);
			if ($info) {
				return $info->fetch_assoc();
			}
		}
	}
 ?>