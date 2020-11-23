<?php
    include("Connect.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
        unset($_SESSION);
        session_destroy();
        session_write_close();
    }
?>
<?php      
    function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }
    $output = '';
    if(isset($_POST['loginAsCompany']) && isset($_POST['username']) && isset($_POST['password']) ) 
    {
        $username = sanitizeFormEmail($_POST['username']);  
        $password = sanitizeFormEmail($_POST['password']);
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 
        $password = md5($password);//encrypting password

        $sql = "select * from tbl_company where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count == 1){  
            header("Location:index.php");
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            $_SESSION['loggedin_as_Company'] = true;
            $_SESSION['username'] = $username;
            exit(); 
        }  
        else
        {  
             $output = '<div >
                    <h6></h6>
                  <h6 style="color:red;font-size:14px;">Invalid Username or Password.</h6>
                </div>';
        }     


    //     if(isset($_POST['username']) && isset($_POST['password']) ) 
    // {
    //     $username = $_POST['username'];  
    //     $password = $_POST['password'];
    //     $username = stripcslashes($username);  
    //     $password = stripcslashes($password);  
    //     // $username = mysqli_real_escape_string($con, $username);  
    //     // $password = mysqli_real_escape_string($con, $password); 


    //     $query = "SELECT * from tbl_company where username = '$username' and password = '$password'"; 
    //     $checkLoginQuery = mysqli_query($con, $query);
    //     if(mysqli_num_rows($checkLoginQuery) == 1) {
    //       header("Location:index.php");
    //         if(!isset($_SESSION)) 
    //         { 
    //             session_start(); 
    //         } 
    //         $_SESSION['loggedin_as_Company'] = true;
    //         $_SESSION['username'] = $username;
    //         exit(); 
    //     }
    //     else {
    //       $output = '<div >
    //                 <h6></h6>
    //               <h6 style="color:red;font-size:14px;">Invalid Username and Password.</h6>
    //             </div>';
    //     }
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
        <h2 class="text-primary">Log In As Employer</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Log In </span></li>
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
                <legend class="px-2" style="color:black;font-size:20px;">Log In </legend>
                <div class="tab-content">
                  <div class="tab-pane active" id="candidate" role="tabpanel">
                    


                    <form class ="mt-4" method="post" onsubmit="" action="signin_company.php" namr ="f1" id="f1">
                      <div class="form-row">
                          <div class="form-group col-10">
                          <label style="color:black;font-size:18px;">Username:</label>
                          <input  type="text" required name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group col-10">
                          <label style="color:black;font-size:18px;">Password:</label>
                          <input type="password" required name="password" id="password" class="form-control">
                          <?= $output; ?>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6">
                            <input type ="submit" class="btn btn-primary btn-block" id = "loginAsCompany" name="loginAsCompany" value = "Login" />  
                        </div>
                          <div class="col-md-6">
                          <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                            <a href="#">Forgot Password?</a>
                            <p class="mt-1">Don't have account? <a href="signup_company.php">Sign Up here</a></p>
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
          <a class="ml-auto align-self-center" href="job_listing.php">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
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
          <a class="ml-auto align-self-center" href="post_a_job.php">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
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

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/jobber/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:53:38 GMT -->
</html>