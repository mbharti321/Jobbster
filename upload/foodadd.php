<!DOCTYPE html>
<?php 
require_once('conn.php');
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<meta charset="utf-8">
	<title>My Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
  <!-- or -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
<body class="my-login-page">
 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Jobbester</label>
      <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="upload.php">Admin</a></li>
        
      </ul>
    </nav>
        
	<br>
	<br>
	<br>
	<br>

	<section class="h-100">
		<div class="container h-200">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper animated fadeInLeft" style="width:500px;">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title font-weight-bold">Training Portal</h4>
							<form method="POST" enctype="multipart/form-data">
								<br>

							 
								<div class="form-group">
									<input id="img" type="file" class="form-control" name="fileToUpload" required autofocus>
								</div>

								<div class="form-group">
									<label for="name">Video Description</label>
									<input id="name" type="text" class="form-control" name="name" required>
								</div>
									<input id="information" type="hidden" value="na" class="form-control" name="information" required data-eye>
									<br>
								

									<div>
									  <select name="category" class="custom-select-md margin-top20">
									    <option selected>Select Category</option>
									    <option value="Aptitude test">Aptitude test</option>
									    <option value="Technical test"> Technical test</option>
									    <option value="Communication Skills"> Communication Skills</option>
									    <option value="General">General</option>
									    </select>
								</div>
								<br>

															
								
								<div class="form-group margin-top20">
									<button type="submit" name="submit" class="btn btn-primary btn-block">
										Upload
									</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		if (isset($_POST["submit"])){
		$name=$_POST["name"];
		$information=$_POST["information"];
		$price=$_POST["price"];
		$category=$_POST["category"];
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		// $_SESSION["foodid"]=$row['id'];
		$sql="INSERT INTO food(`image`, `name`, `information`, `price`, `category`) VALUES ('$target_file','$name','$information','$price','$category')";
		$query=mysqli_query($con,$sql);
		if($query){
			?>
			<script>
			alert('succesfully added');
			window.location="index.html";
			</script>
			<?php
			}
			else{
				?>
				<script>
				alert('failed');
				</script>
				<?php
				}
}
				}
		}
				?>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>