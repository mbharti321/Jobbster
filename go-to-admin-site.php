<?php
	if(!isset($_SESSION['userLoggedIn'])) {//if session is not started yet
        session_start();//starting session
    }
	session_destroy();
	
	header("Location: admin-login.php");
?>