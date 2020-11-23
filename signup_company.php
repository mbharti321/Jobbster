<?php include("Connect.php"); ?>
<?php
    // $attachment='';
    if (isset($_POST['submit'])) 
    {
        if(isset($_POST['name'])   && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['emailid']) &&  isset($_POST['city']) && isset($_POST['state'])&& isset($_POST['username'])&& isset($_POST['cnfpassword'])) 
        {
            $name=$_POST['name'];
            $add=$_POST['address'];
            $phone=$_POST['phone'];
            $emailid=$_POST['emailid'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $uname=$_POST['username'];

            $pwd=$_POST['cnfpassword'];
            $pwd = md5($pwd);//encrypting password
            
            $logo = "images/avatar/default-logo.png";
            
    

            $qry="INSERT into tbl_company (cname, logo, address, contact_no, email_id, state, city, username, password , status) values ('$name', '$logo', '$add', '$phone', '$emailid', '$state','$city', '$uname', '$pwd' , '0')";
            $userQuery = mysqli_query($con, $qry);
            mysqli_close($con);

            if ($userQuery) {
              echo "<script> alert('As Company, Registered Successfully!!!".'\n'."Please SignIn now..'); </script>";
              header( "refresh: 0; url = signin_company.php" );
              // header( "Location: signin_company.php" );
            } 
            else {
              echo "<script> alert('Something went wrong with the query'); </script>";
              exit();
            }

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
        <h2 class="text-primary">Register</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index.html"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Register </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>  
<!--=================================
inner banner -->

<!--=================================
Register -->
<script>
    function check()
    {
        var s=true;
  			
  			document.getElementById('s1').innerHTML="";
  			document.getElementById('s2').innerHTML="";
  			document.getElementById('s3').innerHTML="";
  			document.getElementById('s4').innerHTML="";
  			document.getElementById('s5').innerHTML="";
  			document.getElementById('s6').innerHTML="";
  			document.getElementById('s7').innerHTML="";
  			document.getElementById('s8').innerHTML="";
  			document.getElementById('s9').innerHTML="";
  				
  			var d1=document.frm1.name.value;
  			var pat1=/^[A-Z a-z]+$/;
  			if(d1==0)
  			{
  				document.getElementById('s1').innerHTML="Please Enter Name";
  				s=false;
  			}
  			else if(!pat1.test(d1))
  			{
  				document.getElementById('s1').innerHTML="Please Enter Valid name";
  				s=false;
  			}
  			
  			var d2=document.frm1.address.value;
  			var pat3=/^[a-zA-Z0-9\s,'-]*$/;
  			if(d2==0)
  			{
  				document.getElementById('s2').innerHTML="Please Enter Your Address";
  				s=false;
  			}
  			if(!pat3.test(d2))
  			{
  				document.getElementById('s2').innerHTML="Please Enter Valid Address";
  				s=false;
  			}
  			
              var d3=document.frm1.phone.value;
  			var pat3=/^[0]?[789]\d{9}$/;
  			if(d3==0)
  			{
  				document.getElementById('s3').innerHTML="Please Enter Contact no";
  				s=false;
  			}
  			if(!pat3.test(d3))
  			{
  				document.getElementById('s3').innerHTML="Contact No Is Maximum 10 digits";
  				s=false;
  			}
          
  			var d4=document.frm1.emailid.value;
  			var pat4=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
  			if(d4==0)
  			{
  				document.getElementById('s4').innerHTML="Please Enter Email Address";
  				s=false;
  			}
  			else if(!pat4.test(d4))
  			{
  				document.getElementById('s4').innerHTML="Enter Valid Email Address";
  				s=false;
  			}
          
  			var d5=document.frm1.city.value;
  			if(d5==0)
  			{
  				document.getElementById('s5').innerHTML="Please Enter Your City";
  				s=false;
  			}
  			
  			var d6=document.frm1.state.value;
  			if(d6==0)
  			{
  				document.getElementById('s6').innerHTML="Please Enter Your State";
  				s=false;
  			}
  			
  			var d7=document.frm1.username.value;
  			var pat7=/^[A-Za-z0-9]+$/;
  			if(d7==0)
  			{
  				document.getElementById('s7').innerHTML="Please Enter UserName";
  				s=false;
  			}
  			else if(!pat7.test(d7))
  			{
  				document.getElementById('s7').innerHTML="Please Enter Valid UserName(Only AlphaNumeric)";
  				s=false;
  			}
  			
  			var d8=document.frm1.password.value;
  			if(d8==null)
  			{
  				document.getElementById('s8').innerHTML="Please Enter Your Password";
  				s=false;
  			}
  			if((d8.length < 8) || (d8.length > 16))
  			{
  				document.getElementById('s8').innerHTML="Enter Password Between 8 to 16 Character";
  				f=false
  			}
  			
  			var d9=document.frm1.cnfpassword.value;
  			if(d8 != d9)
  			{
  				document.getElementById('s9').innerHTML="Password Dosen't Match";
  				s=false;
  			}

  			return s;
		}	
    
</script>   
     
<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
             <div class="section-title">
              <h4 class="text-center">Create Your Account</h4>
             </div>
            <fieldset>
              <legend class="px-2">Choose your Account Type</legend>
              <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                <li class="nav-item mr-4">
                  <a class="nav-link" href="signup.php" role="tab" >
                    <div class="d-flex">
                      <div class="tab-icon">
                        <i class="flaticon-users"></i>
                      </div>
                      <div class="ml-3">
                        <h6 class="mb-0">Candidate</h6>
                        <p class="mb-0">I want to discover companies.</p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item ml-auto"  >
                  <a class="nav-link active"  href="signup_company.php" role="tab">
                    <div class="d-flex">
                      <div class="tab-icon">
                        <i class="flaticon-suitcase"></i>
                      </div>
                      <div class="ml-3">
                        <h6 class="mb-0">Employer</h6>
                        <p class="mb-0">I want to attract the best talent.</p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </fieldset>

            <div class="tab-content">
              <div class="tab-pane active" id="employer" role="tabpanel">
                  
                <form class="mt-4" action="" method="post" onsubmit="return check();" name="frm1" id="frm1">
                  
                    <div class="form-row">
                      <div class="form-group col-12">
                        <label>Company Name *</label>
                        <input type="text" name="name" id="name" required class="form-control">
                        <span id="s1" style="color:red"> </span>
                      </div>
                        <div class="form-group col-12">
                        <label>Address *</label>
                        <input type="text" name="address" id="address" required class="form-control">
                        <span id="s2" style="color:red"> </span>
                      </div>
                        <div class="form-group col-12">
                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" id="phone" required class="form-control">
                        <span id="s3" style="color:red"> </span>
                      </div>
                      <div class="form-group col-12">
                        <label>Email Address *</label>
                        <input type="text" name="emailid" id="emailid" required class="form-control">
                        <span id="s4" style="color:red"> </span>
                      </div>
                      <div class="form-group col-12">
                        <label>City *</label>
                        <input type="text" name="city" id="city" required class="form-control">
                        <span id="s5" style="color:red"> </span>
                      </div>
                      <div class="form-group col-12">
                        <label>State *</label>
                        <input type="text" name="state" id="state" required class="form-control">
                        <span id="s6" style="color:red"> </span>
                      </div>
                      <div class="form-group col-12">
                        <label for="Username">Username *</label>
                        <input type="text" name="username" id="username" required class="form-control">
                        <span id="s7" style="color:red"> </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password *</label>
                        <input type="password" name="password" id="password" required class="form-control">
                        <span id="s8" style="color:red"> </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password2">Confirm Password *</label>
                        <input type="password" name="cnfpassword" id="cnfpassword" required class="form-control">
                        <span id="s9" style="color:red"> </span>
                      </div>
                        <label>Letter of Declaration *</label>
                       <div class="custom-file">
<!--                        <label>Letter of Declaration  *</label>-->
                        <input type="file" class="custom-file-input" name="resume" id="resume">
                      <label class="custom-file-label">Choose file</label>
                      </div>
                   
                        <br><br><br><br>

                      <div class="col-md-6">
                          <input class="btn btn-primary d-block" type="submit" value="Register As Company" name="submit" >
                      </div>

                      <div class="col-md-6 text-md-right mt-2 text-center">
                        <p>Already registered? <a href="#"> Sign in here</a></p>
                      </div>

                    </div>
                  </form>


                </div>
              </div>
                                 
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
</html>
