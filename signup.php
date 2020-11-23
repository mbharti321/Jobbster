<?php include("Connect.php"); ?>
<?php
   include("Connect.php");
    if (isset($_POST['submit'])) 
    {
        if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['emailid']) && isset($_POST['DOB'])&&  isset($_POST['city']) && isset($_POST['state'])&& isset($_POST['username'])&& isset($_POST['cnfpassword'])) 
        {
          $name=$_POST['name'];
          $add=$_POST['address'];
          $phone=$_POST['phone'];
          $emailid=$_POST['emailid'];
          $DOB=$_POST['DOB'];
          $gender=$_POST['genderRadio'];
          $city=$_POST['city'];
          $state=$_POST['state'];
          $uname=$_POST['username'];

          $pwd=$_POST['cnfpassword'];
          $pwd = md5($pwd);//encrypting password

          $profilePic = "images/avatar/default-profile.png";

  
          $qry="INSERT into tbl_user (name, address, contact_no, email_id, `DOB`, `gender`, state, city, username, password, profile_pic) values ('$name', '$add', '$phone', '$emailid', '$DOB','$gender', '$state','$city', '$uname', '$pwd', '$profilePic')";
          $userQuery = mysqli_query($con, $qry);
          mysqli_close($con);

          if ($userQuery) {
            
            echo "<script> alert('As Candidate, Registered Successfully!!!".'\n'."Please SignIn now..'); </script>";
            header( "refresh: 0; url = signin_candidate.php" );
             

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
<?php include "header.php" ; ?>
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
<script type="text/javascript">
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
  			var pat1=/^[A-Za-z ]+$/;
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
  				document.getElementById('s3').innerHTML="Contact No Is Maximum 10 Character";
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
            else if(!pat1.test(d5))
  			{
  				document.getElementById('s5').innerHTML="Please Enter Valid City";
  				s=false;
  			}
  			
  			var d6=document.frm1.state.value;
  			if(d6==0)
  			{
  				document.getElementById('s6').innerHTML="Please Enter Your State";
  				s=false;
  			}
            else if(!pat1.test(d6))
  			{
  				document.getElementById('s6').innerHTML="Please Enter Valid State";
  				s=false;
  			}
  			
  			var d7=document.frm1.username.value;
  			var pat7=/^[A-Za-z0-9]+$/;
  			if(d7==0)
  			{
  				document.getElementById('s7').innerHTML="Please Enter Name";
  				s=false;
  			}
  			else if(!pat7.test(d7))
  			{
  				document.getElementById('s7').innerHTML="Please Enter Valid UserName";
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
                <a class="nav-link active" href="signup.php" role="tab" >
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
              <li class="nav-item ml-auto">
                <a class="nav-link"  href="signup_company.php" role="tab">
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
            <div class="tab-pane active" id="candidate" role="tabpanel">
                
              <form class="mt-4" action="" method="post" onsubmit="return check();" name="frm1" id="frm1">
                
                  <div class="form-row">
                    <div class="form-group col-12">
                      <label>Full Name *</label>
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

                    <div class="form-group col-md-6 datetimepickers">
                      <label>Date of birth</label>
                      <input type="date" class="form-control" name="DOB" id="DOB" placeholder="dd-mm-yyyy" value="2000-01-01" min="1950-01-01" max="2030-12-31" required>
                    </div>

                    <div class="form-group col-md-6" >
                      <label class="d-block mb-3">Gender</label>
                        <div class="custom-control custom-radio d-inline">
                          <input type="radio" name="genderRadio" id="genderRadio1" class="custom-control-input" checked="checked" value="0">
                          <label class="custom-control-label" for="genderRadio1">Male</label>
                        </div>
                        <div class="custom-control custom-radio d-inline ml-3">
                          <input type="radio" name="genderRadio" id="genderRadio2"  class="custom-control-input" value="1" >
                          <label class="custom-control-label" for="genderRadio2">Female</label>
                        </div>
                        <div class="custom-control custom-radio d-inline ml-3">
                          <input type="radio" name="genderRadio" id="genderRadio3"  class="custom-control-input" value="2" >
                          <label class="custom-control-label" for="genderRadio3">Other</label>
                        </div>
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

                </div>
                <div class="form-row">
                  <div class="col-md-6">
                      <input class="btn btn-primary d-block" type="submit" value="Register As Candidate" name="submit" >
<!--                    <a class="btn btn-primary d-block" href="#">Sign up</a>-->
                  </div>                  
                  <div class="col-md-6 text-md-right mt-2 text-center">
                    <p>Already registered? <a href="#"> Sign in here</a></p>
                  </div>
                </div>
              </form>
            </div>
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

        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->

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
