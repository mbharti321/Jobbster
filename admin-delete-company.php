<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $company_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-company.php");
    }


    $deleteQuery ="DELETE from tbl_company where company_id ='$company_id'";
    $QryResult = mysqli_query($con, $deleteQuery);
    if($QryResult)  {
    	echo "<script> alert('Record, deleted successfully...'); </script>";
    	header("Location: admin-manage-company.php");
    }
    else{
    	echo "<script> alert('Some Unkown error occured!!'); </script>";
    	header("Location: admin-manage-company.php");
    }

?>
