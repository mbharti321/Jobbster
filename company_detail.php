
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
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url(images/bg/banner-01.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="job-search-field">
          <div class="job-search-item">
            <form class="form row">
              <div class="col-lg-5 col-md-4">
                <div class="form-group left-icon mb-md-0">
                  <input type="text" class="form-control" name="job_title" placeholder="What?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group left-icon mb-md-0">
                  <input type="text" class="form-control" name="job_title" placeholder="Where?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="form-group form-action mb-0">
                  <button type="submit" class="btn btn-primary mt-0"><i class="fas fa-search-location"></i> Find Employer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
banner -->
<?php
    $cid=$_GET['cid'];
    include("connecti.php");
//    $qry = " SELECT * , COUNT(*) FROM tbl_job_post GROUP BY company_id;"
//    $result1 = $conn->query($qry);
//    $row1 = $result1->fetch_assoc();
//    $total_job = $row1['COUNT(*)'];
    
    
    $sql = "SELECT * FROM tbl_company where company_id=$cid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc()
//    $eid_company = $row['email_id'];
?>
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="employers-list border">
          <div class="employers-list-logo">
            <img class="img-fluid" src="<?php echo $row['logo']; ?>" alt="">
          </div>
          <div class="employers-list-details">
            <div class="employers-list-info">
              <div class="employers-list-title">
                <h5 class="mb-0"><?php echo $row['cname']; ?></h5>
              </div>
              <div class="employers-list-option">
                <ul class="list-unstyled">
                  <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['address']; ?></li>
                  <li><i class="fa fa-phone fa-flip-horizontal pl-1"></i><?php echo $row['contact_no']; ?></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="employers-list-position">
            <a class="btn btn-sm btn-dark" href="job_listing_byCompany.php?cid=<?php echo $row['company_id']; ?>">View All positions</a>
          </div>
        </div>
        <div class="border p-4 mt-4 mt-md-5">
          <div class="row">
<!--
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-binoculars"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Viewed</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">164</span>
                </div>
              </div>
            </div>
-->
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-placeholder"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Locations</label>
                  <span class="mb-0 font-weight-bold d-block text-dark"><?php echo $row['city']; ?> , <?php echo $row['state']; ?></span>
                </div>
              </div>
            </div>
<!--
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-list"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Categories</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">Arts, Design, Media</span>
                </div>
              </div>
            </div>
-->
            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-time"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Since</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">2001</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-users"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Team Size</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">15</span>
                </div>
              </div>
            </div>
<!--
            <div class="col-md-4 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-add-user"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Followers</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">50</span>
                </div>
              </div>
            </div>
-->
          </div>
        </div>
        <div class="mt-4 mt-md-5 mb-4 mb-md-5">
          <h5 class="mb-3 mb-md-4">About Us</h5>
          <p>A company recognized globally for its comprehensive portfolio of services, strong commitment to sustainability and good corporate citizenship, we have over 180,000 dedicated employees serving clients across six continents. Together, we discover ideas and connect the dots to build a better and a bold new future. </p>
          <p class="font-italic mb-0">Focus is having the unwavering attention to complete what you set out to do. There are a million distractions in every facet of our lives. Telephones and e-mail, clients and managers, spouses and kids, TV, newspapers and radio – the distractions are everywhere and endless. Everyone wants a piece of us and the result can be totally overwhelming.</p>
        </div>
<!--
        <hr>
        <div class="mt-4 mt-md-5 mb-4 mb-md-5">
          <h5 class="mb-4">Intro Video</h5>
          <a class="popup-icon popup-youtube bg-holder bg-overlay-black-30" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
            <i class="flaticon-play-button"></i>
            <img class="img-fluid w-100" src="images/bg/img-04.png" alt="">
          </a>
        </div>
        <hr>
        <div class="mt-4 mt-md-5">
          <div id="portfolio" class=" popup-gallery">
            <h5 class="mb-3">Image Gallery</h5>
            <div class="owl-carousel mb-lg-5 mb-4" data-nav-arrow="false" data-items="3" data-md-items="3" data-sm-items="3" data-xs-items="2" data-space="15">
              <div class="item">
                <a class="portfolio-img" href="images/gallery/01.jpg"><img class="img-fluid" src="images/gallery/01.jpg" alt=""></a>
              </div>
              <div class="item">
                <a class="portfolio-img" href="images/gallery/02.jpg"><img class="img-fluid" src="images/gallery/02.jpg" alt=""></a>
              </div>
              <div class="item">
                <a class="portfolio-img" href="images/gallery/03.jpg"><img class="img-fluid" src="images/gallery/03.jpg" alt=""></a>
              </div>
            </div>
            <p class="mb-0">The price is something not necessarily defined as financial. It could be time, effort, sacrifice, money or perhaps, something else. The point is that we must be fully aware of the price and be willing to pay it, if we want to have success.</p>
          </div>
        </div>
-->
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="sidebar mb-0">
<!--
          <div class="widget">
            <div class="company-detail-meta justify-content-start">
              <ul class="list-unstyled">
                <li>
                  <div class="share-box">
                    <a href="#"> <i class="fas fa-share-alt"></i><span class="pl-2">Share</span></a>
                    <ul class="list-unstyled share-box-social">
                      <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                      <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                      <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                      <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                      <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a href="#"><i class="fas fa-print"></i><span class="pl-2">Print</span></a>
                </li>
              </ul>
            </div>
          </div>
-->
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

      
    $subject =$_POST['subject'];
    $message = $_POST['msg'];

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
      $mail->addAddress($row['email_id']);

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";
      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
  }

?>

          <div class="widget">
            <div class="widget-title">
              <h5>Contact <?php echo $row['cname']; ?></h5>
            </div>
            <div class="company-contact-inner widget-box">
                 <form class ="mt-4" method="post" onsubmit="" action="" enctype = "multipart/form-data" name ="form1" id="form1">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Full name" name="name" id="name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email address" name="emailid" id="emailid">
                </div>
                <div class="form-group"> 
                  <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Message" name="msg" id="msg"></textarea>
                </div>
                     <input type ="submit" class="btn btn-primary btn-outline-primary btn-block" id = "submit" value = "Send Email" name="submit" />  
<!--                <a class="btn btn-primary btn-outline-primary btn-block" href="#">Send Email</a>-->
                <div>
                    <br>
                  <?= $output; ?>
                  </div>
              </form>
            </div>
          </div>
<!--
          <div class="widget">
            <div class="company-address widget-box">
              <div class="company-address-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.95373531590414!3d-37.817323442021134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1559039794237!5m2!1sen!2sin"  height="230" allowfullscreen></iframe>
              </div>
              <ul class="list-unstyled mt-3">
                <li><a href="#"><i class="fas fa-link fa-fw"></i><span class="pl-2">www.infojob.com</span></a></li>
                <li><a href="tel:+905389635487"><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="pl-2">+(456) 478-2589</span></a></li>
                <li><a href="mailto:ali.potenza@job.com"><i class="fas fa-envelope fa-fw"></i><span class="pl-2">support@Jobbster.demo</span></a></li>
              </ul>
            </div>
          </div>
-->
          <div class="widget">
            <div class="widget-title">
              <h5>Other Companies</h5>
            </div>
            <div class="similar-jobs-item widget-box">
                  <?php 
                include("connecti.php");
                $sql = "SELECT * FROM tbl_company";
                $result = $conn->query($sql);
                $count=0;
                if ($result->num_rows > 0 ) 
                {
                  while($row = $result->fetch_assoc() and $count<3) 
                  {
                      $count++;
        ?>
              <div class="job-list">
                <div class="job-list-logo">
                  <img class="img-fluid" src="<?php echo $row['logo']; ?>" alt="">
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                      <h6><a href="job-detail.html"><?php echo $row['cname']; ?></a></h6>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
<!--
                        <li>
                          <span>via</span>
                          <a href="employer-detail.html">Trout Design Ltd</a>
                        </li>
-->
                        <li><a class="freelance" href="#"><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['city']; ?> ,<?php echo $row['state']; ?></a></li>
                      </ul>
                    </div>
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
      <!--=================================
      sidebar -->
    </div>
  </div>
</section>

<!--=================================
feature -->
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
feature -->

<!--=================================
footer -->
<footer class="footer bg-light">
  <div class="position-relative">
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
Signin Modal Popup -->
<!--
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
                <a class="nav-link active"  data-toggle="tab" href="#candidate" role="tab" aria-selected="false">
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
                <a class="nav-link"  data-toggle="tab" href="#employer" role="tab" aria-selected="false">
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
          </fieldset>
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
                    <a class="btn btn-primary btn-block" href="#">Sign up</a>
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
        </div>
      </div>
    </div>
  </div>
</div>
-->
<!--=================================
Signin Modal Popup -->

<!--=================================
Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/owl-carousel/owl-carousel.min.js"></script>
    <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>

</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/Jobbster/employer-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:53:53 GMT -->
</html>
