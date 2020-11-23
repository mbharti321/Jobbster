<?php 
    $dbhost = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'jobportal';
	$con = mysqli_connect($dbhost,$username,$pass,$dbname,"3306");
	
	if (!$con) {
		echo "mysqli Error :" . mysqli_connect_errno();
		exit();
	}
?>