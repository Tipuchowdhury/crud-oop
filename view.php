<?php require_once "vendor/autoload.php" ;?>
<?php 
	use APP\Controller\Student;
	$stu = new Student;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$info = $stu-> ViewStudent($id);
	}
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
	<div class="wrap ">
		<a class= "btn btn-primary" href="data.php">All Students</a>
		<div class="card shadow">
			<div class="card-body">
				<img style= "width: 200px; height: 200px; border-radius: 50%; display: block;margin-left: auto; margin-right: auto;"src="media/<?php echo $info['photo']; ?>" alt="">
				<h2 style = "text-align: center;"><?php echo $info['name']; ?></h2>
				<table class="table">
					<tr>
						<td>Email</td>
						<td><?php echo $info['email']; ?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $info['cell']; ?></td>
					</tr>

				</table>

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