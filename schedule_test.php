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
        $user_email_id = $row1['email_id'];
        $user_name = $row1['name'];
        $user_id = $row1['user_id'];
    }
    else 
    {
        header("Location: signin_candidate.php");
        exit();
    }
    ?>
<?php
    $postid=$_GET['pid'];
    include("connecti.php");
    $sql = "SELECT * FROM tbl_company join tbl_job_post ON tbl_company.company_id = tbl_job_post.company_id
                      join tbl_job_type ON tbl_job_type.job_type_id = tbl_job_post.job_type_id where tbl_job_post.job_post_id=$postid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $title = $row['job_title'];
    $eid_company = $row['email_id'];
?>
<?php 
        $test_date = "";
             if (isset($_POST['submit'])) 
            {
//					$client_pid = $_REQUEST['$user_id'];
					$test_date = $_REQUEST['test_date'];
//					$jobpost_id = $_REQUEST['jobpost_id'];
					//insert in clientpersonal

			$qry = "insert into test_scheduled (user_id, job_post_id ,test_date, status) values('$user_id', '$postid', '$test_date', '1')";		
            $userQuery = mysqli_query($con, $qry);
            mysqli_close($con);

            if ($userQuery) {
                $_SESSION['status']='scheduled';
//                echo "<script>swal({
//                    title: 'Success',
//                    text: 'Test Scheduled Succesfully',
//                    icon: 'success',
//                  });</script>";
//                header("Location: index.php");
//                if(!isset($_SESSION)) 
//                { 
//                        session_start(); 
//                } 
//                $_SESSION['loggedin'] = true;
//                $_SESSION['username'] = $username;
//                exit();
            } 
            else {
                echo "Something went wrong with the query";
                exit();
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
        <h2 class="text-primary">Schedule Test</h2>
          <hr>
        <h4 class="text-primary"><?php echo $row['job_title']; ?></h4>
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
         </div>
            <fieldset>
                <legend class="px-2" style="color:black;font-size:20px;">Signed In as : <?php echo $user_name; ?> </legend>
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
                    <label style="color:black;font-size:18px;">Email Id*</label>
                    <input type="text" required name="emailid" id="emailid" class="form-control">
                    <span id="s1" style="color:red"> </span>
                    </div>
                    <?php
                  $min = date("Y-m-d");
                  $max = date('Y-m-d', strtotime('+2 months'));
                  ?>
                    <div class="form-group col-10">
                   <div class="input-group-icon mt-10">
                        <label style="color:black;font-size:18px;"><i class="fa fa-calendar" aria-hidden="true"></i> Select Date *</label>
                       <br>
                       <br>
                    <input type="date" style="font-size:18px;" name="test_date" placeholder="Test Date" id="test_date" onfocus="this.placeholder = ''" value="<?=$client_name;?>" onblur="this.placeholder = 'Test Date'" required class="single-input" min="<?php echo $min;?>" max="<?php echo $max;?>">
                       <input type="hidden" name="client_pid" id="client_pid" value="<?=$user_id;?>">
                  <input type="hidden" name="jobpost_id" id="jobpost_id" value="<?=$postid;?>" >
                    
                  </div>
                  </div>
                </div>
                   <div class="row mt-4 mt-lg-5">
                  <div class="col-12">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                      <input type ="submit" class="btn btn-primary btn-block" id = "submit" value = "Continue" name="submit" onclick="schedule_test();" />  
                  </div>
                    <div class="col-md-6">
                    <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                      <a href="job_listing.php" style="font-size:20px;">Cancel</a>
<!--                      <p class="mt-1">No Resume?   <a href="">Create One Now</a></p>-->
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
<?php include"footer.php";?>
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php 
            if(isset($_SESSION['status'])) 
            { 
                ?>
      
            <script>
                swal({
                    title: 'Success',
                    text: 'Test Scheduled Succesfully',
                    icon: 'success',
                }).then(function() {
                    window.location = "index.php";
                });
                     </script>  
      <?php
                unset($_SESSION['status']);
            } 
      ?>
      
     
</body>
</html>