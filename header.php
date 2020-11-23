<!DOCTYPE html>
<html lang="en">
<?php 
include("Connect.php");
$btn1 = '<a class="nav-link dropdown-toggle" href="company_listing.php" aria-haspopup="true" aria-expanded="false">Companies Hiring Now</a>';
$btn   ='';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['loggedin_as_Company']) && $_SESSION['loggedin_as_Company'] == true || isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    $btn = '<a href="logout.php" ><i class="far fa-user pr-2"></i>Log Out</a>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        $btn1 = '<a class="nav-link dropdown-toggle" href="company_listing.php" aria-haspopup="true" aria-expanded="false">
              Companies Hiring Now </a>';
    }
    else
    {
        $btn1 = '<a class="nav-link dropdown-toggle" href="candidate_listing.php" aria-haspopup="true" aria-expanded="false">
              View Candidates </a>';
    }
}
else 
{
    $btn = '<a href="login.html" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-user pr-2"></i>Log In</a>';
}
?>
<!--=================================
header -->
<header class="header bg-dark">
  <nav class="navbar navbar-static-top navbar-expand-lg header-sticky">
   <div class="container-fluid">
      <button id="nav-icon4" type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
          <span></span>
          <span></span>
          <span></span>
      </button>
      <a class="navbar-brand" href="index.php">
       <h1 style="color:white;">Jobbster</h1>
      </a>
      <div class="navbar-collapse collapse justify-content-start">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="index.php" >Home</a>
  <!--          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li  class="active"><a class="dropdown-item" href="index.html">index Default </a></li>
              <li><a class="dropdown-item" href="index-02.html">index 02</a></li>
              <li><a class="dropdown-item" href="index-03.html">index 03</a></li>
              <li><a class="dropdown-item" href="index-map.html">index map</a></li>
              <li><a class="dropdown-item" href="index-slider.html">index Slider</a></li>
              <li><a class="dropdown-item" href="index-bg-video.html">index bg video</a></li>
              <li><a class="dropdown-item" href="index-splash.html">index splash</a></li>
            </ul>-->
          </li>
          <li class="dropdown nav-item">
            <a href="job_listing.php" class="nav-link" >Find Jobs</a>
      <!--      <ul class="dropdown-menu megamenu dropdown-menu-lg">
              <li>
                <div class="row">
                  <div class="col-sm-4 mb-2 mb-sm-0">
                    <h6 class="mb-3 nav-title"></h6>
                    <ul class="list-unstyled mt-lg-3">
                      <li><a href="about.html">About</a></li>
                      <li><a href="services.html">Services</a></li>
                      <li><a href="pricing.html">Pricing</a></li>
                      <li><a href="career.html">Career</a></li>
                      <li><a href="advertising.html">Advertising</a></li>
                      <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                  </div>
                  <div class="col-sm-4 mb-2 mb-sm-0">
                    <h6 class="mb-3 nav-title">Pages</h6>
                    <ul class="list-unstyled mt-lg-3">
                      <li><a href="blog.html">Blog</a></li>
                      <li><a href="blog-detail.html">Blog Detail</a></li>
                      <li><a href="post_a_job.php">Post a Job</a></li>
                      <li><a href="faqs.html">Faq</a></li>
                      <li><a href="browse-categories.html">Browse Categories</a></li>
                      <li><a href="browse-locations.html">Browse Locations</a></li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <h6 class="mb-3 nav-title">Pages</h6>
                    <ul class="list-unstyled mt-lg-3">
                      <li><a href="login.html">Login</a></li>
                      <li><a href="register.html">Register</a></li>
                      <li><a href="coming-soon.html">Coming soon</a></li>
                      <li><a href="404-error.html">404 Error</a></li>
                      <li><a href="terms-and-conditions.html">T&C</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="agency-logo pt-4">
                      <h6 class="mb-3 nav-title">Top Agency</h6>
                      <ul class="list-unstyled">
                        <li>
                          <div class="job-list">
                            <div class="job-list-logo">
                             <a href="#"> <img class="img-fluid" src="images/svg/07.svg" alt=""></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="job-list">
                            <div class="job-list-logo">
                             <a href="#"> <img class="img-fluid" src="images/svg/06.svg" alt=""></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="job-list">
                            <div class="job-list-logo">
                             <a href="#"> <img class="img-fluid" src="images/svg/05.svg" alt=""></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="job-list">
                            <div class="job-list-logo">
                             <a href="#"> <img class="img-fluid" src="images/svg/04.svg" alt=""></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="job-list">
                            <div class="job-list-logo">
                             <a href="#"> <img class="img-fluid" src="images/svg/03.svg" alt=""></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
            </ul> -->
          </li> 
          <li class="nav-item dropdown">
               <?php echo $btn1; ?>
<!--
            <a class="nav-link dropdown-toggle" href="company_listing.php" aria-haspopup="true" aria-expanded="false">
              Companies Hiring Now </a>
-->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Resume Services <i class="fas fa-chevron-down fa-xs"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Resume Builder\index.php">Resume Builder</a></li>
<!--               <li><a class="dropdown-item" href="my-resume.html">My Resume <span class="badge badge-danger ml-2">CV</span></a></li>-->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Job Search <i class="fas fa-chevron-down fa-xs"></i>
            </a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="search_job_bycity.php">Jobs By Location</a></li>
              <li><a class="dropdown-item" href="search_job_bycompany.php">Jobs By Company</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              More <i class="fas fa-chevron-down fa-xs"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="myprofile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="courses/index.php">Courses and Certification</a></li>
                <li><a class="dropdown-item" href="post_a_job.php">Post a Job</a></li>             
            </ul>
          </li>
        </ul>
      </div>
      <div class="add-listing">
          <div class="login d-inline-block mr-4">
              <?php  echo $btn; ?>
<!--            <a href="login.html" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-user pr-2"></i>Log In</a>-->
          </div>
          <a class="btn btn-white btn-md" href="post_a_job.php"> <i class="fas fa-plus-circle"></i>Post a job</a>
        </div>
    </div>
    </nav>
</header>
<!--=================================
header -->
    <!--=================================
Signin Modal Popup -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="mb-0 text-center">Login to Your Account</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="login-register">
          <fieldset>
            <legend class="px-2">Choose your Account Type</legend>
            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
              <li class="nav-item mr-4">
                <a href="signin_candidate.php" class="nav-link active"  >
                  <div class="d-flex">
                    <div class="tab-icon">
                      <i class="flaticon-users"></i>
                    </div>
                    <div class="ml-3">
                      <h6 class="mb-0">Candidate</h6>
                      <p class="mb-0">Log in as Candidate</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="signin_company.php" >
                  <div class="d-flex">
                    <div class="tab-icon">
                      <i class="flaticon-suitcase"></i>
                    </div>
                    <div class="ml-3">
                      <h6 class="mb-0">Employer</h6>
                      <p class="mb-0">Log in as Employer</p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
                            <ul><li><div><p class="mt-1">Don't have account? <a href="signup.php">Sign Up here</a></p></div></li></ul>

          </fieldset>
<!--
          <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
              <form class="mt-4">
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="Email2">Username / Email Address:</label>
                    <input type="text" class="form-control" id="Email22">
                  </div>
                  <div class="form-group col-12">
                    <label for="password2">Password*</label>
                    <input type="password" class="form-control" id="password32">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="#">Sign In</a>
                  </div>
                  <div class="col-md-6">
                    <div class="ml-md-3 mt-3 mt-md-0 forgot-pass">
                      <a href="#">Forgot Password?</a>
                      <p class="mt-1">Don't have account? <a href="register.html">Sign Up here</a></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="employer" role="tabpanel">
              <form class="mt-4">
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="Email2">Username / Email Address:</label>
                    <input type="text" class="form-control" id="Email2">
                  </div>
                  <div class="form-group col-12">
                    <label for="password2">Password *</label>
                    <input type="password" class="form-control" id="password2">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="#">Sign In</a>
                  </div>
                  <div class="col-md-6">
                    <div class="ml-md-3 mt-3 mt-md-0">
                      <a href="#">Forgot Password?</a>
                      <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" class="custom-control-input" id="Remember-02">
                        <label class="custom-control-label" for="Remember-02">Remember Password</label>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
-->
<!--
          <div class="mt-4">
            <fieldset>
              <legend class="px-2">Login or Sign up with</legend>
              <div class="social-login">
                <ul class="list-unstyled d-flex mb-0">
                  <li class="facebook text-center">
                    <a href="#"> <i class="fab fa-facebook-f mr-3 mr-md-4"></i>Login with Facebook</a>
                  </li>
                  <li class="twitter text-center">
                    <a href="#"> <i class="fab fa-twitter mr-3 mr-md-4"></i>Login with Twitter</a>
                  </li>
                  <li class="google text-center">
                    <a href="#"> <i class="fab fa-google mr-3 mr-md-4"></i>Login with Google</a>
                  </li>
                  <li class="linkedin text-center">
                    <a href="#"> <i class="fab fa-linkedin-in mr-3 mr-md-4"></i>Login with Linkedin</a>
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
</div>
<!--=================================
Signin Modal Popup -->
</html>
