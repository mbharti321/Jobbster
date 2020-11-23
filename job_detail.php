<?php
   include("connecti.php");
    if (isset($_POST['submit'])) 
    {
        if(isset($_POST['job_title']) || isset($_POST['city'])) 
        {
            $title=$_POST['job_title'];
            $city=$_POST['city'];
            header("Location: job_search_result.php?city=$city&title=$title");
            exit(0);
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
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url(images/bg/banner-01.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="job-search-field">
          <div class="job-search-item">
<!--            <form class="form row">-->
              <form class="form-row" action="" method="post" onsubmit="return check();" name="frm1" id="frm1">
              <div class="col-lg-5">
                <div class="form-group left-icon">
                  <input type="text" class="form-control" name="job_title" id="job_title" placeholder="What?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group left-icon">
                  <input type="text" class="form-control" name="city" id="city" placeholder="Where?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-2 col-sm-12">
                <div class="form-group form-action">
<!--                  <button type="submit" class="btn btn-primary mt-0"><i class="fas fa-search-location"></i> Find Job</button>-->
<input type="submit" style="padding:10px 40px" id="submit" name="submit" class="btn btn-primary mt-0" value="Find jobs">
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

<!--=================================
job list -->
<?php
    $postid=$_GET['pid'];
    include("connecti.php");
    $sql = "SELECT * FROM tbl_company join tbl_job_post ON tbl_company.company_id = tbl_job_post.company_id
                      join tbl_job_type ON tbl_job_type.job_type_id = tbl_job_post.job_type_id where tbl_job_post.job_post_id=$postid";
    $result = $conn->query($sql);
//    if ($result->num_rows > 0) 
//    {
      $row = $result->fetch_assoc()
        
//    }
?>
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-12">
            <div class="job-list border">
              <div class=" job-list-logo">
                <img class="img-fluid" src="<?php echo $row['logo']; ?>" alt="">
              </div>
              <div class="job-list-details">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <h5 class="mb-0"><?php echo $row['job_title']; ?></h5>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['address']; ?> , <?php echo $row['city']; ?>, <?php echo $row['state']; ?></li>
                      <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="pl-2"><?php echo $row['contact_no']; ?></span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-list-favourite-time">
                <a  class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="job-list-time order-1"><i class="far fa-clock pr-1"></i>2W ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="border p-4 mt-4 mt-lg-5">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-debit-card"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Offered Salary</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">₹<?php echo $row['max_salary']; ?> - ₹<?php echo $row['min_salary']; ?></span>
                </div>
              </div>
            </div>
<!--
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-love"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Gender</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">Female</span>
                </div>
              </div>
            </div>
-->
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-bar-chart"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Career Level</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">Executive</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-apartment"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Industry</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">Management</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-medal"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Experience</label>
                  <span class="mb-0 font-weight-bold d-block text-dark"><?php echo $row['experience']; ?></span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-mortarboard"></i>
                <div class="feature-info-content pl-3">
                  <label class="mb-1">Qualification</label>
                  <span class="mb-0 font-weight-bold d-block text-dark">Bachelor Degree</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-4 my-lg-5">
          <h5 class="mb-3 mb-md-4">Job Description</h5>
          <p><?php echo $row['job_description']; ?></p>
<!--          <p class="font-italic">It is truly amazing the damage that we, as parents, can inflict on our children. So why do we do it? For the most part, we don’t do it intentionally or with malice. In the majority of cases, the cause is a well-meaning but unskilled or un-thinking parent, who says the wrong thing at the wrong time, and the message sticks – as simple as that!</p>-->
        </div>
        <hr>
        <div class="my-4 my-lg-5">
          <h5 class="mb-3 mb-md-4">Required Knowledge, Skills, and Abilities</h5>
          <ul class="list-unstyled list-style">
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Commitment – understanding the price and having the willingness to pay that price</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Belief – believing in yourself and those around you</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Taking action – practice Ready, Fire, Aim…</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>You will drift aimlessly until you arrive back at the original dock</li>
            <li class="mb-0"><i class="far fa-check-circle font-md text-primary mr-2"></i>You will run aground and become hopelessly stuck in the mud</li>
          </ul>
        </div>
        <hr>
        <div class="mt-4 mt-lg-5">
          <h5 class="mb-3 mb-md-4">Education + Experience</h5>
          <ul class="list-unstyled list-style mb-4 mb-lg-0">
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>You will sail along until you collide with an immovable object, after which you will sink to the bottom</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Clarity – developing the Vision</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Focus – having a plan</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Give yourself the power of responsibility. Remind yourself the only thing stopping you is yourself.</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Do it today. Remind yourself of someone you know who died suddenly and the fact that there is no guarantee that tomorrow will come.</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Now go push your own limits and succeed!</li>
<!--
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Let success motivate you. Find a picture of what epitomizes success to you and then pull it out when you are in need of motivation.</li>
            <li><i class="far fa-check-circle font-md text-primary mr-2"></i>Belief – believing in yourself and those around you</li>
            <li class="mb-0"><i class="far fa-check-circle font-md text-primary mr-2"></i>So, make the decision to move forward. Commit your decision to paper, just to bring it into focus. Then, go for it!</li>
-->
          </ul>
        </div>
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-4">
        <div class="sidebar mb-0">
          <div class="widget">
            <a class="btn btn-primary btn-block" href="apply_job_form.php?pid=<?php echo $row['job_post_id']; ?>"><i class="far fa-paper-plane"></i>Apply for job</a>
          </div>
          <!--<div class="widget">
            <div class="company-detail-meta">
              <ul class="list-unstyled">
                <li class="linkedin"><a href="#"><i class="fab fa-linkedin-in"></i><span class="pl-2">Apply with Linkedin</span></a></li>
                <li><div class="share-box share-dark-bg">
                  <a href="#"> <i class="fas fa-share-alt"></i><span class="pl-2">Share</span></a>
                  <ul class="list-unstyled share-box-social">
                    <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                  </ul>
                </div></li>
                <li><a href="#"><i class="fas fa-print"></i><span class="pl-2">Print</span></a></li>
              </ul>
            </div>
          </div>-->
          <div class="widget">
            <div class="company-address widget-box">
              <div class="company-address-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.95373531590414!3d-37.817323442021134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1559039794237!5m2!1sen!2sin"  height="230" allowfullscreen></iframe>
              </div>
              <ul class="list-unstyled mt-3">
                <li><a href="#"><i class="fas fa-link fa-fw"></i><span class="pl-2">www.infojob.com</span></a></li>
                <li><a href="tel:+905389635487"><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="pl-2">+(456) 478-2589</span></a></li>
                <li><a href="mailto:ali.potenza@job.com"><i class="fas fa-envelope fa-fw"></i><span class="pl-2">support@jobber.demo</span></a></li>
              </ul>
            </div>
          </div>
<!--
          <div class="widget">
            <div class="jobber-company-view">
              <ul class="list-unstyled">
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-clock fa-2x fa-fw text-primary"></i>
                      <span class="pl-3">35 Days</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-loupe fa-2x fa-fw text-primary"></i>
                      <span class="pl-3">35697 Displayed</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="widget-box">
                    <div class="d-flex">
                      <i class="flaticon-personal-profile fa-2x fa-fw text-primary"></i>
                      <span class="pl-3">300-500 Application</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
-->
           
          <div class="widget">
            <div class="widget-title">
              <h5>Similar Jobs</h5>
            </div>
            <div class="similar-jobs-item widget-box">
                 <?php 
                include("connecti.php");
                $sql = "SELECT * FROM tbl_company join tbl_job_post ON tbl_company.company_id = tbl_job_post.company_id
                                  join tbl_job_type ON tbl_job_type.job_type_id = tbl_job_post.job_type_id";
                $result = $conn->query($sql);
                $count=0;
                if ($result->num_rows > 0 ) 
                {
                  // output data of each row
                  while($row = $result->fetch_assoc() and $count<4) 
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
                      <h6><a href="job_detail.php?pid=<?php echo $row['job_post_id']; ?>"><?php echo $row['job_title']; ?></a></h6>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li>
                          <span>via</span>
                          <a href="employer-detail.html">Trout Design Ltd</a>
                        </li>
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pr-1"></i>Freelance</a></li>
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
job list -->

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
Signin Modal Popup -->

<!--=================================
Signin Modal Popup -->

<!--=================================
Javascript -->

      <!-- JS Global Compulsory (Do not remove)-->
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/popper/popper.min.js"></script>
      <script src="js/bootstrap/bootstrap.min.js"></script>

      <!-- Template Scripts (Do not remove)-->
      <script src="js/custom.js"></script>

</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/jobber/job-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:53:43 GMT -->
</html>
