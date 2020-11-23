
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Jobber - Job Board HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin-Login!</title>

    <!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="css/admin-style.css" />
</head>



<body>



<?php echo(($gender == 0)?'checked="checked"':''); ?>
                              <?php echo ($gender == 0)?'checked':'' ?>




 <div class="tab-pane fade" id="employer" role="tabpanel">
              <form class="mt-4">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Username *</label>
                    <input type="text" class="form-control" id="Username">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email Address *</label>
                    <input type="text" class="form-control" id="email">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Password *</label>
                    <input type="password" class="form-control" id="Password">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="password2">Confirm Password *</label>
                    <input type="password" class="form-control" id="password2">
                  </div>
                  <div class="form-group col-12">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone">
                  </div>
                  <div class="form-group col-12">
                    <label for="sector">Select Sector</label>
                    <input type="text" class="form-control" id="sector">
                  </div>
                  <div class="form-group col-12 mt-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="accepts-02">
                      <label class="custom-control-label" for="accepts-02">you accept our Terms and Conditions and Privacy Policy</label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <a class="btn btn-primary d-block" href="#">Sign up</a>
                  </div>

                  <div class="col-md-6 text-md-right mt-2 text-center">
                    <a href="#">Already have an account?</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
 <!-- <div class="form-group col-md-6">
                        <label >Company Logo *</label>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="logo" value="">
                        <label class="custom-file-label">Choose file</label>
                      </div> -->

                      <!--   <div class="form-group col-md-12 select-border">
                          <label for="sector">Select Sector:</label>
                          <select class="form-control basic-select">
                            <option value="value 01" selected="selected">Accountancy</option>
                            <option value="value 02">Apprenticeships</option>
                            <option value="value 03">Banking</option>
                            <option value="value 04">Education</option>
                            <option value="value 05">Engineering</option>
                            <option value="value 06">Estate Agency</option>
                            <option value="value 07">IT & Telecoms</option>
                            <option value="value 08">Legal</option>
                          </select>
                        </div>


                        <div class="form-group col-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="accepts-01">
                             <label class="custom-control-label" for="accepts-01">you accept our Terms and Conditions and Privacy Policy</label>
                          </div>
                        </div> -->



<!-- // if(isset($_FILES['logo'])){
            //   $errors= array();
            //   $file_name = $_FILES['logo']['name'];
            //   $file_size = $_FILES['logo']['size'];
            //   $file_tmp = $_FILES['logo']['tmp_name'];
            //   $file_type = $_FILES['logo']['type'];
            //   $file_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));

            //   $expensions= array("jpg","jpeg","png");

            //   if(in_array($file_ext,$expensions)=== false){
            //      $errors[]="extension not allowed";
            //   }

            //   if($file_size > 2097152) {
            //      $errors[]='File size must be excately 2 MB';
            //   }

            //   if(empty($errors)==true) {
            //      move_uploaded_file($file_tmp,"img/".$file_name); //The folder where you would like your file to be saved
            //      echo "Success";
            //   }else{
            //      print_r($errors);
            //   }
            // } -->