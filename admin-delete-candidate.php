<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $user_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-candidates.php");
    }


    $deleteQuery ="DELETE from tbl_user where user_id ='$user_id'";
    $QryResult = mysqli_query($con, $deleteQuery);
    if($QryResult)  {
    	echo "<script> alert('Record, deleted successfully...'); </script>";
    	header("Location: admin-manage-candidates.php");
    }
    else{
    	echo "<script> alert('Some Unkown error occured!!'); </script>";
    	header("Location: admin-manage-candidates.php");
    }

?>
