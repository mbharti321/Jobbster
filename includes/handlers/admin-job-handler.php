
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








