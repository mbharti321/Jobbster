<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $job_post_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-jobs.php");
    }


    $deleteQuery ="DELETE from tbl_job_post where job_post_id ='$job_post_id'";
    $QryResult = mysqli_query($con, $deleteQuery);
    if($QryResult)  {
    	echo "<script> alert('Record, deleted successfully...'); </script>";
    	header("Location: admin-manage-jobs.php");
    }
    else{
    	echo "<script> alert('Some Unkown error occured!!'); </script>";
    	header("Location: admin-manage-jobs.php");
    }

?>
