<?php require_once "vendor/autoload.php" ?>
<?php 
	use APP\Controller\Student;
	$stu = new Student;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$mess = $info = $stu-> DeleteStudent($id);
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
	
	

	<div class="wrap-table">
		<a class = "btn btn-primary" href="index.php">Add Student</a>
		<?php 
		if (isset($mess)) {
		 	echo $mess;
		 } ?>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$all_students = $stu -> AllStudent();
							$id  = 1;
							while ($data = $all_students->fetch_assoc()): 
								
							
						 ?>
						<tr>
							<td><?php echo $id; $id++; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['cell']; ?></td>
							<td><img src="media/students/<?php echo $data['photo']; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="view.php?id=<?php echo $data['id']; ?> ">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="?id=<?php echo $data['id']; ?>">Delete</a>
							</td>
						</tr>
					<?php endwhile; ?>
						
						

					</tbody>
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