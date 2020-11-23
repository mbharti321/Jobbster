
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
            echo "<script> alert('Great, Candidate Details updated sucessfully..'); </script>";
            header("Location: admin-manage-candidates.php");
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
              header("Location: admin-edit-candidate.php?id=$user_id");
           }
           else{
              echo "<script> alert('sorry!, unsucessful..'); </script>";
           }
        }
    }



    


?>




