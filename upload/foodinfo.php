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
  <style>
	table{
		color:gold;
		background:teal;
		border:5px solid blue;
		padding-left:40px;
		padding-right:40px;
		padding-bottom:10px;
		padding-top:10px;
		text-transform:uppercase;
		font-weight=bold;
	}
	tr,td,th{
		border:4px solid blue;
		padding-left:30px;
		padding-right:30px;
		padding-bottom:10px;
		padding-top:10px;
		background:teal;
	}
	</style>

  </head>
<body class="my-login-page">
	 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Jobbester</label>
      <ul>
        <li><a class="active" href="index.html">Home</a></li>
        <li><a href="adminlogin.php">Admin</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>
				
	</nav>
	<br>
	<br>
	<br>
	<br>

	<section class="h-100">
		<div class="container h-200">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper animated fadeInLeft" style="width:500px;"">
				
						<div class="card-body" style="position:relative;right:200px;top:100px">
							
			<table style="padding:20px" align="center">
   <tr>
<th>id</th>
<th>VIDEO</th>
<th>DESCRIPTIONS</th>

<th>CATEGORY</th></tr>
<?php
$sql="SELECT * FROM food";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query)){
	?>
	<tr>
	<td><?= $row['id']?></td>
	<td><video src="<?= $row['image']?>" " alt="Cinque Terre" width="200" height="150" controls></td>
    <td><?= $row['name']?></td>
	
	<td><?= $row['category']?></td>
	<?php
}
?></tr></table>
		</div></div></div></div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>