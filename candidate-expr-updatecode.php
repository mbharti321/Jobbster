<?php
    include("includes/config.php");
      // `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`) 
    if(isset($_POST['updatedata']))
    {   
        $user_wid = $_POST['update_id'];
        
        $edit_exprCompany = $_POST['edit_exprCompany'];
        $edit_exprDesignation = $_POST['edit_exprDesignation'];
        $edit_exprYear = $_POST['edit_exprYear'];
        $edit_exprAddress = $_POST['edit_exprAddress'];

        $updateQuery = "UPDATE tbl_user_work 
                            SET company_name='$edit_exprCompany', designation='$edit_exprDesignation', experiance_year='$edit_exprYear', address=' $edit_exprAddress' 
                            WHERE user_wid='$user_wid'  ";
        $result = mysqli_query($con, $updateQuery);

        if($result)
        {
            echo '<script> alert("Experience Updated successfuly"); </script>';
            // header("Location: profile_candidate.php");
            header( "refresh:0.5; url=profile_candidate.php" );
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            // header("Location: profile_candidate.php");
            header( "refresh:1; url=profile_candidate.php" );
        }
    }
?>