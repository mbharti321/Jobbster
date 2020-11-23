<?php
    include("Connect.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
        $candidate_name= $_SESSION['username'];
        $qry1="select * from tbl_user where username='$candidate_name'";
        $result1 = mysqli_query($con,$qry1); 
        $row1 = mysqli_fetch_array($result1);
//        $row1 = mysqli_fetch_array($result1);
        $user_email_id = $row1['email_id'];
        $user_name = $row1['name'];
    }
    else 
    {
        header("Location: signin_candidate.php");
        exit();
    }
    ?>
<?php
    $postid=$_GET['pid'];
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $_SESSION['pid'] = $postid;
    include("connecti.php");
    $sql = "SELECT * FROM tbl_company join tbl_job_post ON tbl_company.company_id = tbl_job_post.company_id
                      join tbl_job_type ON tbl_job_type.job_type_id = tbl_job_post.job_type_id where tbl_job_post.job_post_id=$postid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $title = $row['job_title'];
    $eid_company = $row['email_id'];
?>
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'C:/xampp/htdocs/JobPortal/phpmailer/vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['emailid'];
    $phoneno = $_POST['cno'];
    $attachment = $_POST['resume'];
      
    if(isset($_FILES['resume'])){
      $errors= array();
      $file_name = $_FILES['resume']['name'];
      $file_size = $_FILES['resume']['size'];
      $file_tmp = $_FILES['resume']['tmp_name'];
      $file_type = $_FILES['resume']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['resume']['name'])));
      
      $expensions= array("docx","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name); //The folder where you would like your file to be saved
         echo "Success";
      }else{
         print_r($errors);
      }
   }
      
    $subject = "Application for the Posted job";
    $message = "Application for the job ".$title.".";

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'dhb3481@gmail.com';
      // Gmail Password
      $mail->Password = 'disha3481';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('dhb3481@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress($eid_company);

      $mail->isHTML(true);
      $mail->Subject = 'Candidate Application for Job  (Jobber)';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Contact No : $phoneno <br>Message : $message</h3>";
      $mail->addAttachment("uploads/".$file_name);
      $mail->send();
         header("Location: apply_job_confirm.php");
            exit(); 
//      $output = '<div class="alert alert-success">
//                  <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
//                </div>';
    } catch (Exception $e) {
        echo $e->getMessage();
//      $output = '<div class="alert alert-danger">
//                  <h5>' . $e->getMessage() . '</h5>
//                </div>';
    }
  }

?>

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
        <h2 class="text-primary">Apply For a Job</h2>
<!--
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Log In </span></li>
        </ol>
-->
      </div>
    </div>
  </div>
</div>
<!--=================================
inner banner -->

<!--=================================
Register -->
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
         <div class="section-title">
<!--          <h4 class="text-center">Log In</h4>-->
         </div>
            <fieldset>
                <legend class="px-2" style="color:black;font-size:20px;">Signed In as : <?php echo $user_email_id; ?> </legend>
          <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
                
              <form class ="mt-4" method="post" onsubmit="" action="" enctype = "multipart/form-data" name ="form1" id="form1">
                  
                  <div>
                    <h5 class="mb-3 mb-md-4"><?php echo $row['job_title']; ?></h5>
                  </div>
                  <div>
                    <h5 class="mb-3 mb-md-4" style="color:black;font-size:12px;"><?php echo $row['cname']; ?> , <?php echo $row['address']; ?> , <?php echo $row['state']; ?> , <?php echo $row['city']; ?>. </h5>
                  </div>
                <div class="form-row">
                    <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Name:</label>
                    <input  type="text" required name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Email Id*</label>
                    <input type="text" required name="emailid" id="emailid" class="form-control">
                    <span id="s1" style="color:red"> </span>
                    </div>
                    <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Phone Number *</label>
                    <input  type="text" required name="cno" id="cno" class="form-control">
                  </div>
                       <div class="form-group col-10">
                    <label style="color:black;font-size:18px;">Resume *</label>
                  </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="resume" id="resume">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
                   <div class="row mt-4 mt-lg-5">
                  <div class="col-12">
<!--                    <h5 class="mb-4">File Attachments</h5>-->
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                      <input type ="submit" class="btn btn-primary btn-block" id = "submit" value = "Continue" name="submit" />  
                  </div>
                    <div class="col-md-6">
                    <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                      <a href="job_listing.php">Cancel</a>
                      <p class="mt-1">No Resume?   <a href="">Create One Now</a></p>
                    </div>
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
<!--
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
-->
<!--=================================
feature-info-->

<!--=================================
footer-->
<!--
<?php include "footer.php"; ?>

<footer class="footer bg-light">
<!--  <div class="position-relative">
    <svg class="footer-shape"
      xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      width="100%" height="85px">
      <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
        d="M-0.000,-0.001 L1923.000,-0.001 L1923.000,84.999 C1608.914,41.669 1279.532,19.653 962.500,19.000 C635.773,18.326 323.692,40.344 -0.000,84.999 C-0.000,-83.334 -0.000,168.332 -0.000,-0.001 Z"/>
      </svg>
    </div>
    <div class="container pt-5">
      <div class="row mt-5">
        <div class="col-lg-3 col-md-6">
          <div class="footer-link">
            <h5 class="text-dark mb-4">Trending Job</h5>
            <ul class="list-unstyled">
              <li><a href="#">Browse Jobs</a></li>
              <li><a href="#">Browse Categories</a></li>
              <li><a href="#">Submit Resume</a></li>
              <li><a href="#">Candidate Dashboard</a></li>
              <li><a href="#">Job Alerts</a></li>
              <li><a href="#">My Bookmarks</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="footer-link">
            <h5 class="text-dark mb-4">Trending Companies</h5>
            <ul class="list-unstyled">
              <li><a href="#">Shortcodes</a></li>
              <li><a href="#">Job Page</a></li>
              <li><a href="#">Job Page Alternative</a></li>
              <li><a href="#">Resume Page</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <h5 class="text-dark mb-4">Subscribe Us</h5>
          <div class="footer-subscribe">
            <p>Sign Up to our Newsletter to get the latest news and offers.</p>
            <form>
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <button type="submit" class="btn btn-primary btn-md">Get Notified</button>
            </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <h5 class="text-dark mb-4">Download App</h5>
          <div class="footer-subscribe">
            <p>Download the latest Slick new job apps now</p>
            <div class="d-inline-block">
              <a class="btn btn-white btn-sm btn-app " href="#">
                <i class="fab fa-apple"></i>
                <div class="btn-text text-left">
                  <small>Download on the </small>
                  <span class="mb-0 d-block">App Store</span>
                </div>
              </a>
              <a class="btn btn-white btn-sm btn-app mt-3" href="#">
                <i class="fab fa-google-play"></i>
                <div class="btn-text text-left">
                  <small>Get it on  </small>
                  <span class="mb-0 d-block">Google Play</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-dark mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <div class="d-flex justify-content-md-start justify-content-center">
              <ul class="list-unstyled d-flex mb-0">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 text-center text-md-right mt-4 mt-md-0">
            <p class="mb-0"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> Jobbster </a> All Rights Reserved </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
-->
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