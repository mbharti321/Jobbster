<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
  <body>

<!--=================================
header -->
<?php include "header.php"; ?>
<!--=================================
header -->

<!--=================================
inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Reset Password</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Log In </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Reset Password </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
Register -->
<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
         <div class="section-title">
<!--          <h4 class="text-center">Log In</h4>-->
         </div>
            <fieldset>
                <legend class="px-2" style="color:black;font-size:20px;">Reset Password </legend>
          <div class="tab-content">
              <div class="tab-pane active" id="candidate" role="tabpanel">
              <form class ="mt-4" method="post" onsubmit="" action="" namr ="update" id="update">
                  <input type="hidden" name="action" value="update" />
                <div class="form-row">
<!--
                    <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Username:</label>
                    <input  type="text" required name="username" id="username" class="form-control">
                  </div>
-->
                  <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Password:</label>
                    <input type="password" required name="pass1" id="pass1" class="form-control">
                    
                    </div>
                     <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Confirm Password:</label>
                    <input type="password" required name="pass2" id="pass2" class="form-control">
                    </div>
                     <input type="hidden" name="email" value="<?php echo $email;?>"/>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                      <input type ="submit" class="btn btn-primary btn-block" id = "reset-btn"  name="reset-btn"  value = "Submit" />  
<!--                    <a class="btn btn-primary btn-block" href="#">Sign In</a>-->
                  </div>
                    <div class="col-md-6">
<!--
                    <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                      <a href="#">Forgot Password?</a>
                      <p class="mt-1">Don't have account? <a href="signup.php">Sign Up here</a></p>
                    </div>
-->
                  </div>
                </div>
              </form>
              <?php
            include('Connect.php');
            if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
            && ($_GET["action"]=="reset") && !isset($_POST["action"])){
              $key = $_GET["key"];
              $email = $_GET["email"];
              $curDate = date("Y-m-d H:i:s");
              $query = mysqli_query($con,
              "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
              );
              $row = mysqli_num_rows($query);
              if ($row==""){
              $error .= '<h2>Invalid Link</h2>
            <p>The link is invalid/expired. Either you did not copy the correct link
            from the email, or you have already used the key in which case it is 
            deactivated.</p>
            <p><a href="forget_password.php">
            Click here</a> to reset password.</p>';
             }else{
              $row = mysqli_fetch_assoc($query);
              $expDate = $row['expDate'];
              if ($expDate >= $curDate){
              ?>
            
                <?php
            }else{
            $error .= "<h2>Link Expired</h2>
            <p>The link is expired. You are trying to use the expired link which 
            as valid only 24 hours (1 days after request).<br /><br /></p>";
                        }
                  }
            if($error!=""){
              echo "<div class='error'>".$error."</div><br />";
              }			
            } // isset email key validate end


            if(isset($_POST["email"]) && isset($_POST["action"]) &&
             ($_POST["action"]=="update")){
            $error="";
            $pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
            $pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
            $email = $_POST["email"];
            $curDate = date("Y-m-d H:i:s");
            if ($pass1!=$pass2){
            $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
              }
              if($error!=""){
            echo "<div class='error'>".$error."</div><br />";
            }else{
            $pass1 = md5($pass1);
            mysqli_query($con, "UPDATE `tbl_user` SET `password`='".$pass1."' WHERE `email_id`='".$email."';"
            );

            mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
            <p><a href="signin_candidate.php">
            Click here</a> to Login.</p></div><br />';
                  }		
            }
            ?>
            </div>
          </div>
            </fieldset>
<!--
          <div class="mt-4">
            <fieldset>
              <legend class="px-2">Login or Sign up with</legend>
              <div class="social-login">
                <ul class="list-unstyled d-flex mb-0">
                  <li class="facebook text-center">
                    <a href="#"> <i class="fab fa-facebook-f mr-4"></i>Login with Facebook</a>
                  </li>
                  <li class="twitter text-center">
                    <a href="#"> <i class="fab fa-twitter mr-4"></i>Login with Twitter</a>
                  </li>
                  <li class="google text-center">
                    <a href="#"> <i class="fab fa-google mr-4"></i>Login with Google</a>
                  </li>
                  <li class="linkedin text-center">
                    <a href="#"> <i class="fab fa-linkedin-in mr-4"></i>Login with Linkedin</a>
                  </li>
                </ul>
              </div>
            </fieldset>
          </div>
-->
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->

<!--=================================
feature-info -->
<section class="feature-info-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="feature-info feature-info-02 p-4 p-lg-5 bg-primary">
          <div class="feature-info-icon mb-3 mb-sm-0 text-dark">
            <i class="flaticon-team"></i>
          </div>
          <div class="feature-info-content text-white pl-sm-4 pl-0">
            <p>Jobseeker</p>
            <h5 class="text-white">Looking For Job?</h5>
          </div>
          <a class="ml-auto align-self-center" href="#">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
          <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
            <i class="flaticon-job-3"></i>
          </div>
          <div class="feature-info-content text-white pl-sm-4 pl-0">
            <p>Recruiter</p>
            <h5 class="text-white">Are You Recruiting?</h5>
          </div>
          <a class="ml-auto align-self-center" href="#">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
feature-info-->

<!--=================================
footer-->
<?php include "footer.php"; ?>
    <!--=================================
footer-->

<!--=================================
Back To Top-->
   <div id="back-to-top" class="back-to-top">
     <i class="fas fa-angle-up"></i>
   </div>
<!--=================================
Back To Top-->

<!--=================================
Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/select2/select2.full.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>

</body>
</html>