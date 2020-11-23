
<?php 

    function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    function sanitizeFormStringRemoveSpaces($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
    }

    function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }
    function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      return $inputText;
    }

    // `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`)

    if(isset($_POST['saveChangesButton'])) {
        //saveChangesButton button was pressed
        // echo "<script> alert('saveChangesButton button was pressed'); </script>";
        
        $cname=sanitizeFormString($_POST['name']);
        // $logo=sanitizeFormString($_POST['logo']);
        $email=sanitizeFormEmail($_POST['email']);
        $contact=sanitizeFormStringRemoveSpaces($_POST['contact']);
        $address=sanitizeFormString($_POST['address']);
        $state=sanitizeFormString($_POST['state']);
        $comUsername=sanitizeFormStringRemoveSpaces($_POST['comUsername']);
        $city=sanitizeFormString($_POST['city']);

        $companyId = $company->getCompanyId();

        $wasSuccessful = $company->updateCompany($companyId, $comUsername, $cname, $email, $contact, $address, $state, $city);
         if($wasSuccessful){
            $_SESSION['username'] = $comUsername;
            echo "<script> alert('Great, Company Details updated sucessfully..'); </script>";
            // header("refresh: 0");
         }
         else{
            // echo "<script> alert('sorry!, unsucessful..'); </script>";
         }


    }


    if(isset($_POST['updateLogoButton'])){
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
          $companyId = $company->getCompanyId();

          $wasSuccessful = $company->updateCompanyLogo($companyId, $image);
           if($wasSuccessful){
              // echo "<script> alert('Great, Candidate Avatar updated sucessfully..'); </script>";
              header("refresh: 0");
           }
           else{
              echo "<script> alert('sorry!, unsucessful..'); </script>";
           }
        }  
    }

    if(isset($_POST['changePasswordButton'])) {
      //Register button was pressed
      // echo "<h1>change password pressed<h1>";
      $username = $company->getUsername();
      // var_dump($_POST);
      $currentPassword = sanitizeFormPassword($_POST['currentPassword']);
      $password = sanitizeFormPassword($_POST['password']);
      $password2 = sanitizeFormPassword($_POST['password2']);
      
      $wasSuccessful = $company->changePassword( $username, $currentPassword, $password, $password2);
       if($wasSuccessful){
        echo "<script> alert('Great, Password changed sucessfully..'); </script>";
        header("Refresh:0");
       }
       else{
            echo "<script> alert('sorry!, unsucessful..'); </script>";
        }
    }

?>



