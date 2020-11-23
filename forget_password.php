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
        <h2 class="text-primary">Forget Password</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Log In </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Forgot Password </span></li>
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
              <?php
include('Connect.php');
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/autoload.php';
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
   $error .="<p>Invalid email address please type a valid email address!</p>";
   }else{
   $sel_query = "SELECT * FROM tbl_user WHERE email_id='".$email."'";
   $results = mysqli_query($con,$sel_query);
   $row = mysqli_num_rows($results);
    $error='';
   if ($row==""){
   $error .= "<p>No user is registered with this email address!</p>";
   }
  }
    $error='';
   if($error!="")
   {
       echo "<div class='error'>".$error."</div>
       <br /><a href='javascript:history.go(-1)'>Go Back</a>";
   }
   else
   {
       $expFormat = mktime(
       date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
       );
       $expDate = date("Y-m-d H:i:s",$expFormat);
       $key = md5(2418*2);
       $addKey = substr(md5(uniqid(rand(),1)),3,10);
       $key = $key . $addKey;
    // Insert Temp Table
    mysqli_query($con,
    "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
    VALUES ('".$email."', '".$key."', '".$expDate."');");

    $output='<p>Dear user,</p>';
    $output.='<p>Please click on the following link to reset your password.</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="http://localhost/JobPortal/reset-password.php?
    key='.$key.'&email='.$email.'&action=reset" target="_blank">
    https:http://localhost/JobPortal/reset-password.php
    ?key='.$key.'&email='.$email.'&action=reset</a></p>'; 
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Please be sure to copy the entire link into your browser.
    The link will expire after 1 day for security reason.</p>';
    $output.='<p>If you did not request this forgotten password email, no action 
    is needed, your password will not be reset. However, you may want to log into 
    your account and change your security password as someone may have guessed it.</p>';   
    $output.='<p>Thanks,</p>';
    $output.='<p>Jobbster Team</p>';
    $body = $output; 
    $subject = "Password Recovery - Jobbster.com";

    $email_to = $email;
    $fromserver = "noreply@yourwebsite.com"; 
//    require("PHPMailer/PHPMailerAutoload.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; // Enter your host here
    $mail->SMTPAuth = true;
    $mail->Username = "dhb3481@gmail.com"; // Enter your email here
    $mail->Password = "disha3481"; //Enter your password here
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->From = "dhb3481@gmail.com";
    $mail->FromName = "Jobbster";
    $mail->Sender = $fromserver; // indicates ReturnPath header
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email_to);
    if(!$mail->Send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
    echo "<div class='error'>
    <p><centre><h2>An email has been sent to you with instructions on how to reset your password.</centre></h2></p>
    </div><br /><br /><br />";
     }
       }
    }else{
?>
                <legend class="px-2" style="color:black;font-size:20px;">Forgot Password </legend>
          <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
              <form class ="mt-4" method="post" onsubmit="" action="" namr ="reset" id="reset">
                <div class="form-row">
                    <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Username:</label>
                    <input  type="text" required name="email" id="email" class="form-control">
                  </div>
<!--
                  <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Password:</label>
                    <input type="password" required name="password" id="password" class="form-control">
                     
                    </div>
-->
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                      <input type ="submit" class="btn btn-primary btn-block" id = "forgotpwd" name="forgotpwd" value = "Send Email" />  
<!--                    <a class="btn btn-primary btn-block" href="#">Sign In</a>-->
                  </div>
                    <?php } ?>
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