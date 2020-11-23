<?php

	ob_start();
	
	if(!isset($_SESSION['userLoggedIn'])) {//if session is not started yet
        session_start();//starting session
    }
	

	$timezone = date_default_timezone_set("Asia/Kolkata");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jobportal";

	// Create connection
	$con = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($con->connect_error) {
		echo "<br> !!!Connection Error!!!! <br>";
	  	die("Connection failed: " . $con->connect_error);
	}
	
?>