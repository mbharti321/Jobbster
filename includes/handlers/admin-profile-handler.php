<?php
	function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      return $inputText;
    }

    function sanitizeFormUsername($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
    }

    function sanitizeFormString($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      $inputText = ucfirst(strtolower($inputText));
      return $inputText;
    }

    if(isset($_POST['changePasswordButton'])) {
      //Register button was pressed
      // echo "<h1>change password pressed<h1>";
      $username = $admin->getUsername();
      // var_dump($_POST);
      $currentPassword = sanitizeFormPassword($_POST['currentPassword']);
      $password = sanitizeFormPassword($_POST['password']);
      $password2 = sanitizeFormPassword($_POST['password2']);
      
      $wasSuccessful = $account->changePassword( $username, $currentPassword, $password, $password2);
       if($wasSuccessful){
        echo "<script> alert('Great, Password changed sucessfully..'); </script>";
        // header("Location: admin-index.php");
       }
    }



    if(isset($_POST['saveChangesButton'])) {
      //saveChangesButton button was pressed
      // echo "<script> alert('saveChangesButton button was pressed..'); </script>";
      $username = sanitizeFormUsername($_POST['username']);
      $firstName = sanitizeFormString($_POST['firstName']);
      $lastName = sanitizeFormString($_POST['lastName']);
      $email = sanitizeFormString($_POST['email']);
      $email2 = sanitizeFormString($_POST['email2']);
      $contact = sanitizeFormString($_POST['contact']);


      $adminId = $admin->getUserId();
      
      $wasSuccessful = $account->updateUserDetails($adminId, $username, $firstName, $lastName, $email, $email2, $contact);
       if($wasSuccessful){
            //updating admin username after successful admin's detail updation
            $_SESSION['adminLoggedIn'] = $username;
            echo "<script> alert('Great, User's data updated sucessfully..'); </script>";
            header("Location: admin-my-profile.php");
       }
       else{
         // echo "<script> alert('Sorry, Some error occured..'); </script>";
         // header("Location: admin-my-profile.php");
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
          $adminId = $admin->getUserId();

          $wasSuccessful = $admin->updateAdminAvatar($adminId, $image);
           if($wasSuccessful){
              // echo "<script> alert('Great, You have sucessfully updated your avatar  ..'); </script>";
              header("Location: admin-my-profile.php");
           }
           else{
              echo "<script> alert('sorry!, unsucessful..'); </script>";
           }
        }
    }

?>
