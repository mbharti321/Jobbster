<!DOCTYPE html>
<html lang="en">
    
<?php include "head.php"; ?>
<body>
<?php 
include("Connect.php");
$btn ='';
$btn1 = '<a class="nav-link dropdown-toggle" href="company_listing.php" aria-haspopup="true" aria-expanded="false">Companies Hiring Now</a>';
session_start();
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
<script>
function search()
{

	var city =  document.getElementById("city").value;;
//	var city =  $("#city"). val();
//    window.alert(5 + 6);
	var title =  document.getElementById("job_title").value;
//	var title =  $("#job_title"). val();
	if(city != "")
	{
		if(title == "")
		{
			$(location).attr('href', 'job_listing.php?city='+city);			

		}
		else
		{
			$(location).attr('href', 'job_listing.php?city='+city+'&title='+title);
		}
	
	}
	else
	{      	
       swal({
		  title: "Invalid Request",
		  text: "Please Select City",
		  icon: "error",
		});
                               
	}

}

    </script>
<?php
   include("connecti.php");
    if (isset($_POST['submit'])) 
    {
        if(isset($_POST['job_title']) || isset($_POST['city'])) 
        {
            $title=$_POST['job_title'];
            $city=$_POST['city'];
            header("Location: job_search_result.php?city=$city&title=$title");
            exit();
        } 
    }
?>
<header class="header header-transparent">
  <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
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
<!--
          <li class="nav-item dropdown">
            <a class="nav-link" href="go-to-admin-site.php">Admin Site</a>
          </li>
-->
        </ul>
      </div>
      <div class="add-listing">
          <div class="login d-inline-block mr-4">
              <?php echo $btn; ?>
<!--            <a href="login.html" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-user pr-2"></i>Sign In</a>-->
          </div>
          <a class="btn btn-white btn-md" href="post_a_job.php"> <i class="fas fa-plus-circle"></i>Post a job</a>
          
        </div>
    </div>
  </nav>
</header>

<!--=================================
Banner -->
<section class="banner bg-holder bg-overlay-black-30 text-white" style="background-image: url(images/bg/banner-01.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white mb-3">Drop <span class="text-primary"> Resume & Get </span> Your Desired Job</h1>
        <p class="lead mb-4 mb-lg-5 font-weight-normal">Find Jobs, Employment & Career Opportunities</p>
        <div class="job-search-field">
          <div class="job-search-item">
            <form class="form row" action="" method="post" onsubmit="return check();" name="frm1" id="frm1">
              <div class="col-lg-5">
                <div class="form-group">
                  <div class="d-flex">
                    <label>What</label>
                    <span class="ml-auto">e.g.UI Developer</span>
                  </div>
                  <div class="position-relative left-icon">
                    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job title">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group">
                  <div class="d-flex">
                    <label>Where</label>
                    <span class="ml-auto">e.g. Mumbai</span>
                  </div>
                  <div class="position-relative left-icon">
                    <input type="text" class="form-control location-input" name="city" id="city" placeholder="city">
                    <i class="far fa-compass"></i>
                    <a href="#">
<!--
                      <div class="detect">
                        <span class="d-none d-sm-block">Detect</span>
                        <i class="fas fa-crosshairs"></i>
                      </div>
-->
                     </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-12">
                <div class="form-group form-action">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary btn-lg" value="Find jobs">
<!--                  <button type="button" onclick="search();" id="search" name="search" class="btn btn-primary btn-lg"><i class="fas fa-search"></i> Find Jobs</button>-->
                </div>
              </div>
            </form>
          </div>
        </div>
<!--
        <div class="job-tag mt-4">
          <ul class="justify-content-center">
            <li class="text-primary">Trending Keywords :</li>
            <li><a href="#">Automotive,</a></li>
            <li><a href="#">Education,</a></li>
            <li><a href="#">Health and Care Engineering</a></li>
          </ul>
        </div>
-->
      </div>
    </div>
  </div>
</section>
<!--=================================
Banner -->


<!--=================================
Divider -->
<div class="container ">
  <div class="row">
    <div class="col-12">
      <hr class="m-0">
    </div>
  </div>
</div>
<!--=================================
Divider -->

<!--=================================
Jobs-listing -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2 class="title">Jobs You May be Interested in</h2>
        </div>
      </div>
      <div class="col-12">
        <div class="browse-job d-flex border-0 pb-3">
          <div class="mb-4 mb-md-0">
            <ul class="nav nav-tabs justify-content-center d-flex" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hot Jobs</a>
              </li>
<!--
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recent Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Popular Jobs</a>
              </li>
-->
            </ul>
          </div>
<!--
          <div class="job-found ml-auto mb-0">
            <span class="badge badge-lg badge-primary">24123</span>
            <h6 class="ml-3 mb-0">Job Found</h6>
          </div>
-->
        </div>
        <div class="tab-content" id="myTabContent">
          <!-- Hot jobs -->
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row mt-3">
                  <?php 
                    include("connecti.php");
                $sql = "SELECT * FROM tbl_company join tbl_job_post ON tbl_company.company_id = tbl_job_post.company_id
                                              join tbl_job_type ON tbl_job_type.job_type_id = tbl_job_post.job_type_id LIMIT 6";
                $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                      // output data of each row
                      while($row = $result->fetch_assoc()) 
                      {
                ?>
              <div class="col-lg-6 mb-4 mb-sm-0">
                <!-- Freelance -->
                <div class="job-list">
                  <div class="job-list-logo">
                    <img class="img-fluid" src="<?php echo $row['logo']; ?>" alt="">
                  </div>
                  <div class="job-list-details">
                    <div class="job-list-info">
                      <div class="job-list-title">
                        <h5 class="mb-0"><a href="job_detail.php?pid=<?php echo $row['job_post_id']; ?>"><?php echo $row['job_title']; ?></a></h5>
                      </div>
                      <div class="job-list-option">
                        <ul class="list-unstyled">
                          <li>
                            <span>via</span>
                            <a href="company_detail.php?cid=<?php echo $row['company_id']; ?>"><?php echo $row['cname']; ?></a>
                          </li>
                          <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['city']; ?> , <?php echo $row['state']; ?></li>
                          <li><i class="fas fa-filter pr-1"></i><?php echo $row['min_salary']; ?> - <?php echo $row['max_salary']; ?></li>
                          <li><i class="fas fa-suitcase pr-1"></i><?php echo $row['job_type']; ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="job-list-favourite-time">
                    <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
<!--                    <span class="job-list-time order-1"><i class="far fa-clock pr-1"></i>1H ago</span>-->
                  </div>
                </div>
              </div>
                <?php
                    
                }
                    } else 
                    {
                      echo "0 results";
                    }
                    $conn->close();
        ?>  
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 justify-content-center d-flex mt-md-5 mt-4">
        <a class="btn btn-outline btn-lg" href="job_listing.php">View More Jobs</a>
      </div>
    </div>
  </div>
</section>
<!--=================================
Jobs-listing -->

<!--=================================
Candidates & Companies -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <!-- Featured Candidates -->
      <div class="col-lg-7 mb-4 mb-lg-0">
        <div class="section-title">
          <h2 class="title">Featured Candidates</h2>
          <p>We know this in our gut, but what can we do about it? How can we motivate ourselves?</p>
        </div>
          <?php 
                include("connecti.php");
                $sql = "SELECT * FROM tbl_user LIMIT 4";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
        ?>
        <div class="candidate-list">
          <div class="candidate-list-image">
            <img class="img-fluid" src=" <?php echo $row['profile_pic']; ?>" alt="" >
          </div>
          <div class="candidate-list-details">
            <div class="candidate-list-info">
              <div class="candidate-list-title">
                <h5 class="mb-0"><a href="candidate_detail.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></a></h5>
              </div>
              <div class="candidate-list-option">
                <ul class="list-unstyled">
<!--                  <li><i class="fas fa-filter pr-1"></i>Construction & Property</li>-->
                  <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['city']; ?> , <?php echo $row['state']; ?></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="candidate-list-favourite-time">
            <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
<!--            <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>6D ago</span>-->
          </div>
        </div>
           <?php
                    
                }
                    } else 
                    {
                      echo "0 results";
                    }
                    $conn->close();
        ?>
<!--
-->
      </div>
      <div class="col-lg-1"></div>
     
-->
    </div>
  </div>
</section>
<!--=================================
Candidates & Companies -->

<!--=================================
Easiest Way to Use -->
<section class="space-pb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section-title center">
          <h2 class="title">Easiest Way to Use</h2>
          <p>Give yourself the power of responsibility. Remind yourself the only thing stopping you is yourself.</p>
        </div>
      </div>
    </div>
    <div class="row bg-holder-pattern mt-3 mt-md-4 mr-md-0 ml-md-0" style="background-image: url('images/step/pattern-01.png');">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <i class="flaticon-resume"></i>
          </div>
          <div class="feature-info-content pb-2 pb-md-0">
              <h5><a href="signup.php">Create Account</a></h5>
            <p class="mb-0">Create an account and access your saved settings on any device.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <i class="flaticon-recruitment"></i>
          </div>
          <div class="feature-info-content pb-2 pb-md-0">
              <h5><a href="candidate_listing.php">Find Your Vacancy</a></h5>
            <p class="mb-0">Don't just find. Be found. Put your CV in front of great employers.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <i class="flaticon-position"></i>
          </div>
          <div class="feature-info-content pb-2 pb-md-0">
              <h5><a href="job_listing.php">Get A Job</a></h5>
            <p class="mb-0">Your next career move starts here. Choose Job from thousands of companies</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Easiest Way to Use -->

<!--=================================
Feature-info -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="feature-info feature-info-02 p-4 p-md-5 bg-primary">
          <div class="feature-info-icon mb-3 text-dark">
            <i class="flaticon-team"></i>
          </div>
          <div class="feature-info-content pl-sm-4 pl-0">
            <h5 class="text-white">Looking For Job?</h5>
            <p class="text-white">Your next role could be with one of these top leading organizations.</p>
            <a href="job_listing.php">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="feature-info feature-info-02 p-4 p-md-5 bg-dark">
          <div class="feature-info-icon mb-3 text-primary">
            <i class="flaticon-job-3"></i>
          </div>
          <div class="feature-info-content pl-sm-4 pl-0">
            <h5 class="text-white">Are You Recruiting?</h5>
            <p class="text-white">Five million searchable CVs in one place with our linked CV database.</p>
            <a href="post_a_job.php">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Feature-info -->


<!--=================================
Why You Choose Job Among Other Job Site -->
<section class="space-pb">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-md-5 mb-lg-0 pr-lg-5">
        <div class="row">
          <div class="col-sm-7">
            <img class="img-fluid w-100" src="images/about/01.png" alt="">
          </div>
          <div class="col-sm-5 mt-sm-5 mt-4">
            <img class="img-fluid mb-sm-2 w-100" src="images/about/02.png" alt="">
            <div class=" mt-4">
              <a class="popup-icon popup-youtube bg-holder bg-overlay-black-80" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                <i class="flaticon-play-button"></i>
                <img class="img-fluid w-100" src="images/about/03.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 pt-2 pt-sm-3 pt-md-0">
        <div class="section-title">
          <h2 class="title">Why You Choose Job Among Other Job Site?</h2>
          <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with amazing talents. who realize only a small percentage of their potential. We all know people who live this truth.</p>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="d-flex mb-lg-5 mb-4">
              <i class="font-xlll text-primary flaticon-team"></i>
              <h6 class="pl-3 align-self-center mb-0">Best talented people</h6>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex mb-lg-5 mb-4">
              <i class="font-xlll text-primary flaticon-job-3"></i>
              <h6 class="pl-3 align-self-center mb-0">Easy to find candidate</h6>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="d-flex mb-md-0 mb-4">
              <i class="font-xlll text-primary flaticon-chat"></i>
              <h6 class="pl-3 align-self-center mb-0">Easy to communicate</h6>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex">
              <i class="font-xlll text-primary flaticon-job-2"></i>
              <h6 class="pl-3 align-self-center mb-0">Global recruitment option</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Why You Choose Job Among Other Job Site -->

    <!-- Team info-->
<section class="page-section bg-light" id="team">
    <style>.team-member {
  margin-bottom: 3rem;
  text-align: center;
}

.team-member img {
  width: 14rem;
  height: 14rem;
  border: 0.5rem solid rgba(0, 0, 0, 0.1);
}

.team-member h4 {
  margin-top: 1.5rem;
  margin-bottom: 0;
}   
</style>
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase">The Team</h2>
      <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="images/avatar/team/disha.jpg" alt="" />
          <h4>Disha Bundela</h4>
          <p class="text-muted">Developer</p>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="images/avatar/team/abhilash.jpg" alt="" />
          <h4>Maddi Abhilash</h4>
          <p class="text-muted">Developer</p>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/maddi-abhilash-1b4b77177"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="images/avatar/team/manish.jpg" alt="" />
          <h4>Manish Bharti</h4>
          <p class="text-muted">Developer</p>
          <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/Manish__Bharti"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/manish-bharti"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam
          veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
      </div>
    </div>
  </div>
</section>
<!--=================================
team info

   --> 
<?php include "footer.php"; ?>

<!--=================================
Back To Top-->
   <div id="back-to-top" class="back-to-top">
     <i class="fas fa-angle-up"></i>
   </div>
<!--=================================
Back To Top-->

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

        </div>
      </div>
    </div>
  </div>
</div>
<!--=================================
Signin Modal Popup -->

<!--=================================
Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    			<script src="js/index-js.js"></script>
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/jquery.appear.js"></script>
    <script src="js/counter/jquery.countTo.js"></script>
    <script src="js/owl-carousel/owl-carousel.min.js"></script>
    <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>
    <script src="js/index-js.js"></script>

</body>
</html>
