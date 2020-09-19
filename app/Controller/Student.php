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
		/**
		 * show single student information
		 */
		public function ViewStudent($id) {
			$info = $this->single_student_info($id);
			if ($info) {
				return $info->fetch_assoc();
			}
		}
		public function DeleteStudent($id) {
			$data = $this-> Delete_single_student($id);
			if ($data) {
				return " <p class= 'alert alert-danger'>Delete successfully !!<button class = 'close', data-dismiss = 'alert'>&times;</button></p> ";
			}
		}
	}
 ?>