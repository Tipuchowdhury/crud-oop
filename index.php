<?php require_once "vendor/autoload.php" ;?>
<?php 
	use APP\Controller\Student;
	$stu = new Student;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php 
	/**
	 * get data from form
	 */
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$uname = $_POST['uname']; 
		$photo = $_FILES['photo'];

		if (empty($name) || empty($email) || empty($cell) || empty($uname)) {
			$mess = " <p class= 'alert alert-danger'>Field must not be empty !!<button class = 'close', data-dismiss = 'alert'>&times;</button></p> ";
		}
		elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$mess = " <p class= 'alert alert-danger'>Email isn't correct !!<button class = 'close', data-dismiss = 'alert'>&times;</button></p> ";
		}
		else {
			
			$mess = $stu -> addStudent($name, $email, $cell, $photo);
			if ($mess) {
				$mess = " <p class= 'alert alert-success'>Registration successfull !!<button class = 'close', data-dismiss = 'alert'>&times;</button></p> ";
			}
			
		}
	}
	 ?>
	

	<div class="wrap ">
		<a class= "btn btn-primary" href="data.php">All Students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Sign Up</h2>
				<?php 
					if (isset($mess)) {
						echo $mess;
					}
				 ?>
				<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name  = "name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name  = "email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name  = "cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name  = "uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name  = "photo" class="form-control" type="file">
					</div>

					<div class="form-group">
						<input name  = "submit" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>