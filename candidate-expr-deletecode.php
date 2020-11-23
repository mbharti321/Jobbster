<?php
    include("includes/config.php");

    if(isset($_POST['deletedata']))
    {
        // $id = $_POST['delete_id'];
         $user_wid = $_POST['delete_id'];

        $query = "DELETE FROM student WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        $deleteQuery ="DELETE from tbl_user_work where user_wid ='$user_wid'";
        $QryResult = mysqli_query($con, $deleteQuery);
        if($QryResult)  {
            echo "<script> alert('Job experiance deleted successfully...'); </script>";
            header("Location: profile_candidate.php");
        }
        else{
            echo "<script> alert('Some Unkown error occured!!'); </script>";
            header("Location: profile_candidate.php");
        }
    }

?>


<?php
    // include("includes/config.php");


    // if(isset($_GET['id'])) {
    //   $user_wid = $_GET['id'];
    // }
    // else {
    //   header("Location: profile_candidate.php");
    // }

    // // `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`) 
    // $deleteQuery ="DELETE from tbl_user_work where user_wid ='$user_wid'";
    // $QryResult = mysqli_query($con, $deleteQuery);
    // if($QryResult)  {
    //     echo "<script> alert('Job experiance deleted successfully...'); </script>";
    //     header("Location: profile_candidate.php");
    // }
    // else{
    //     echo "<script> alert('Some Unkown error occured!!'); </script>";
    //     header("Location: profile_candidate.php");
    // }

?>
