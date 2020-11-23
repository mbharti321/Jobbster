
<?php 

    function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    function sanitizeFormConatact($inputText) {
          $inputText = strip_tags($inputText);
          $inputText = str_replace(" ", "", $inputText);
          return $inputText;
        }

    function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeFormUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      return $inputText;
    }
    // `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, 'profile_pic'


    if(isset($_POST['saveChangesButton'])) {
        //saveChangesButton button was pressed
        // echo "<script> alert('saveChangesButton button was pressed'); </script>";
        // $image=$_POST['image'];
        // $image=$_FILES['image']['name'];
        $CandidateUsername=sanitizeFormUsername($_POST['CandidateUsername']);
        $name=sanitizeFormString($_POST['name']);
        $email=sanitizeFormEmail($_POST['email']);
        $contact=sanitizeFormConatact($_POST['contact']);

        $DOB=$_POST['DOB'];
        $gender=$_POST['genderRadio'];

        $address=sanitizeFormString($_POST['address']);
        $state=sanitizeFormString($_POST['state']);
        $city=sanitizeFormString($_POST['city']);
        
        $userId = $candidate->getCandidateId();

        $wasSuccessful = $candidate->updateCandidate($userId, $CandidateUsername, $name, $email, $DOB, $gender, $contact, $address, $state, $city);
         if($wasSuccessful){
          $_SESSION['username'] = $CandidateUsername;
            echo "<script> alert('Great, Candidate Details updated sucessfully..'); </script>";
            // header("Location: candidate_profile.php");
            echo '<script>window.location="profile_candidate.php"</script>';
         }
         else{
            // echo "<script> alert('sorry!, unsucessful..'); </script>";
         }
    }


    if(isset($_POST['updateAvatarButton'])){
        
        $allowed_image_extension = array("png", "jpg", "jpeg");
    
        // Get image file extension
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
        // Validate file input to check if is not empty
        if (! file_exists($_FILES["image"]["tmp_name"])) {
          echo "<script> alert('Choose image file to upload !!'); </script>";
        }    // Validate file input to check if is with valid extension
        else if (! in_array($file_extension, $allowed_image_extension)) {
          echo "<script> alert('Please, Upload a valid image." .'\n' ." Only PNG, JPG and JPEG are allowed !!'); </script>";
        }
        else if (($_FILES["image"]["size"] > 2097152)) {
          echo "<script> alert('Image size exceeds 2MB !! " .'\n' ."please select image again...'); </script>";
        } 
        else{
          $image=$_FILES['image']['name'];
          $userId = $candidate->getCandidateId();

          $wasSuccessful = $candidate->updateCandidateAvatar($userId, $image);
           if($wasSuccessful){
              echo "<script> alert('Great, Candidate Avatar updated sucessfully..'); </script>";
//              echo '<script>window.location="profile_candidate.php"</script>';
               echo '<script>window.location="profile_candidate.php"</script>';
           }
           else{
              echo "<script> alert('sorry!, unsucessful..'); </script>";
           }
        }
        
    }



    if(isset($_POST['changePasswordButton'])) {
      //Register button was pressed
      // echo "<h1>change password pressed<h1>";
      $username = $candidate->getUsername();
      // var_dump($_POST);
      $currentPassword = sanitizeFormPassword($_POST['currentPassword']);
      $password = sanitizeFormPassword($_POST['password']);
      $password2 = sanitizeFormPassword($_POST['password2']);
      
      $wasSuccessful = $candidate->changePassword( $username, $currentPassword, $password, $password2);
       if($wasSuccessful){
        echo "<script> alert('Great, Password changed sucessfully..'); </script>";
        echo '<script>window.location="profile_candidate.php"</script>';
       }
       else{
            echo "<script> alert('sorry!, unsucessful..'); </script>";
        }
    }




    if(isset($_POST['updateAcademicdButton'])) {
        //updateAcademicdButton button was pressed
        // echo "<script> alert('updateAcademicdButton button was pressed'); </script>";

        // `tbl_user_education` (`user_eid`, `user_id`, `10_percentage`, `10_board`, `12_percentage`, `12_board`, `UG_degree`, `UG_university`, `UG_percentage`, `PG_degree`, `PG_university`, `PG_percentage`)
        $tenthBoard=sanitizeFormString($_POST['tenthBoard']);
        $tenthpercentage=sanitizeFormString($_POST['tenthpercentage']);
       
        $twelfthBoard=sanitizeFormString($_POST['twelfthBoard']);
        $twelfthpercentage=sanitizeFormString($_POST['twelfthpercentage']);
        
        $UGCourseName=sanitizeFormString($_POST['UGCourseName']);
        $UGPercentage=sanitizeFormString($_POST['UGPercentage']);
        $UGUniversityName=sanitizeFormString($_POST['UGUniversityName']);

        $PGCourseName=sanitizeFormString($_POST['PGCourseName']);
        $PGPercentage=sanitizeFormString($_POST['PGPercentage']);
        $PGUniversityName=sanitizeFormString($_POST['PGUniversityName']);
        
        $userId = $candidate->getCandidateId();


        $wasSuccessful = $candidate->updateCandidateAcademic($userId, $tenthBoard, $tenthpercentage, $twelfthBoard, $twelfthpercentage, $UGCourseName, $UGPercentage, $UGUniversityName, $PGCourseName, $PGPercentage, $PGUniversityName);

         if($wasSuccessful){
            echo "<script> alert('Great, Candidate Academic Details updated sucessfully..'); </script>";
            // header("Location: candidate_profile.php");
            echo '<script>window.location="profile_candidate.php"</script>';
         }
         else{
           echo "<script> alert('Sorry, there is some input error !!  please check..'); </script>";
         }
    }


    if(isset($_POST['AddExperienceButton'])) {
        //saveChangesButton button was pressed
      // `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`)
        // echo "<script> alert('AddExperienceButton button was pressed'); </script>";
        
        $exprCompany=sanitizeFormString($_POST['exprCompany']);
        $exprDesignation=sanitizeFormString($_POST['exprDesignation']);
        $exprYear=sanitizeFormEmail($_POST['exprYear']);
        $exprAddress=sanitizeFormConatact($_POST['exprAddress']);

        
        
        $userId = $candidate->getCandidateId();

        $wasSuccessful = $candidate->addCandidateWorkExpr($userId, $exprCompany, $exprDesignation, $exprYear, $exprAddress);
         if($wasSuccessful){
          
            echo "<script> alert('Great, Candidate Work Exprience Details added sucessfully..'); </script>";
            // header("Location: candidate_profile.php");
            echo '<script>window.location="profile_candidate.php"</script>';
         }
         else{
            echo "<script> alert('Sorry, there is some input error !!  please check..'); </script>";
         }
    }
?>




