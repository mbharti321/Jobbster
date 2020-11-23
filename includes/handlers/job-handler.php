
<?php 



function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormEmail($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}



if(isset($_POST['saveChangesButton'])) {
    //saveChangesButton button was pressed
    // echo "<script> alert('saveChangesButton button was pressed'); </script>";
    $title=sanitizeFormString($_POST['title']);
    $jobtype=sanitizeFormString($_POST['jobtype']);
    $description=sanitizeFormString($_POST['description']);
    $email=sanitizeFormEmail($_POST['email']);
    $maxSalary=sanitizeFormString($_POST['maxSalary']);
    $minSalary=sanitizeFormString($_POST['minSalary']);
    $address=sanitizeFormString($_POST['address']);
    $state=sanitizeFormString($_POST['state']);
    $city=sanitizeFormString($_POST['city']);
    $experience=sanitizeFormString($_POST['experience']);
    // $companyname=sanitizeFormString($_SESSION['username']);


    $wasSuccessful = $job->updateJob($job_post_id, $title, $jobtype, $description,  $email, $maxSalary, $minSalary, $address, $state, $city, $experience);
     if($wasSuccessful){
        echo "<script> alert('Great, Job Details updated sucessfully..'); </script>";
        header("Location: admin-manage-jobs.php");
     }
     else{
        // echo "<script> alert('sorry!, unsucessful..'); </script>";
     }


}


?>



<?php

// if (isset($_POST['submit'])) 
//     {
//         if(isset($_POST['title']) && isset($_POST['description']) &&
//            isset($_POST['emailid']) && isset($_POST['maxsalary']) &&
//            isset($_POST['minsalary']) && isset($_POST['address']) &&
//            isset($_POST['state']) && isset($_POST['city']))
//         {
//             $title=$_POST['title'];
//             $desc=$_POST['description'];
//             $emailid=$_POST['emailid'];
//             $max=$_POST['maxsalary'];
//             $min=$_POST['minsalary'];
//             $add=$_POST['address'];
//             $jobtype=$_POST['jobtype'];
//             $state=$_POST['state'];
//             $city=$_POST['city'];
//             $exp=$_POST['expr'];
//             $companyname=$_SESSION['username'];

//             $qry1="select * from tbl_company where username='$companyname'";
//             $result1 = mysqli_query($con,$qry1); 
//             $row1 = mysqli_fetch_array($result1);
//             $companyid = $row1['company_id'];
            
//             $qry2 ="select * from tbl_job_type where job_type='$jobtype'";
//             $result2 = mysqli_query($con,$qry2);
//             $row2 = mysqli_fetch_array($result2);
//             $typeid = $row2['job_type_id'];
            
//             $qry3="insert into tbl_job_post (company_id, job_title, job_description, job_type_id, email_id, address, city, state, max_salary, min_salary, experience) values ('$companyid', '$title', '$desc', '$typeid', '$emailid', '$add', '$city', '$state', '$max', '$min', '$exp')";
//             $userQuery = mysqli_query($con, $qry3);
//             mysqli_close($con);
//             if ($userQuery) {
//                 header("Location: post_job_confirm.php");
//                 exit();
//             } 
//             else 
//             {
//                 echo "Something went wrong with the query";
//                 exit();
//             }
//         }
//     }
?>




