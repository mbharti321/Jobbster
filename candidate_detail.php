
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<!--=================================
header -->
<?php include "header.php"; ?>
<!--=================================
header -->

<!--=================================
banner -->
<?php
    $uid=$_GET['user_id'];
    include("connecti.php");  
    $sql = "SELECT * FROM tbl_user_work join tbl_user ON tbl_user_work.user_id = tbl_user.user_id
                      join tbl_user_education ON tbl_user_education.user_id = tbl_user.user_id where tbl_user.user_id=$uid";
//    $sql = "SELECT * FROM tbl_user where user_id=$uid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc()   
?>
<div class="candidate-banner bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="candidate-list bg-light">
          <div class="candidate-list-image">
            <img class="img-fluid" src="<?php echo $row['profile_pic']; ?>" alt="" >
          </div>
          <div class="candidate-list-details">
            <div class="candidate-list-info">
              <div class="candidate-list-title">
                <h5 class="mb-0"><?php echo $row['name']; ?></h5>
              </div>
              <div class="candidate-list-option">
                <ul class="list-unstyled">
<!--                  <li><i class="fas fa-filter pr-1"></i>Construction & Property</li>-->
                  <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $row['state']; ?> , <?php echo $row['city']; ?></li>
                </ul>
              </div>
            </div>
          </div>
<!--
          <div class="widget ml-auto mb-0">
            <div class="company-detail-meta ml-auto">
              <a class="btn btn-primary" href="#">Download CV <i class="fas fa-download ml-1"></i></a>
              <ul class="list-unstyled mt-3 mb-0 ml-2 ml-sm-0">
                <li>
                  <div class="share-box share-dark-bg">
                    <a href="#"> <i class="fas fa-share-alt"></i><span class="pl-2">Share</span></a>
                    <ul class="list-unstyled share-box-social">
                      <li> <a href="#"><i class="fab fa-facebook-f"></i></a></li>
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
        </div>
      </div>
    </div>
  </div>
</div>
<!--=================================
banner -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sticky-top secondary-menu-sticky-top">
          <div class="secondary-menu">
            <ul>
              <li><a href="#about"> About </a></li>
              <li><a href="#education"> Education </a></li>
              <li><a href="#experience"> Work Experience </a></li>
              <li><a href="#portfolio"> Portfolio </a></li>
              <li><a href="#skill"> professional Skill </a></li>
              <li><a href="#awards"> Awards </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="jobber-candidate-detail">
          <div id="about">
            <h5 class="mb-3">About Me</h5>
            <div class="border p-3">
              <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-account"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Name:</label>
                      <span class="d-block font-weight-bold text-dark"><?php echo $row['name']; ?></span>
                    </div>
                  </div>
                </div>
<!--
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-curriculum"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Fax:</label>
                      <span class="d-block font-weight-bold text-dark">(456) 478-2589</span>
                    </div>
                  </div>
                </div>
-->
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-contact"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Phone :</label>
                      <span class="d-block font-weight-bold text-dark"><?php echo $row['contact_no']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-appointment"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Date Of Birth :</label>
                      <span class="d-block font-weight-bold text-dark">22/08/1992</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-map"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Address :</label>
                      <span class="d-block font-weight-bold text-dark"><?php echo $row['address']; ?></span>
                    </div>
                  </div>
                </div>
<!--
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-man"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Sex :</label>
                      <span class="d-block font-weight-bold text-dark">Female</span>
                    </div>
                  </div>
                </div>
-->
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-approval"></i>
                    <div class="feature-info-content pl-3">
                      <label class="mb-0">Email:</label>
                      <span class="d-block font-weight-bold text-dark"><?php echo $row['email_id']; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-4 mt-sm-5">
              <p>I have more than 9 years of experience in the field of Graphic/ E-Learning/Web Designing. Specialized in Adobe web & graphic designing tools and also in other tools. Professional in Corporate branding, Graphic designing, Web Designing, visualization, GUI, graphics & animations for e-learning, illustrations, web icons, flash web banner, flash intro animations, logos, brochures, posters, etc.</p>
              <p class="mb-0">Creative Solution Provider as a Freelance Graphic Artist and a Dedicated, Team worker to Induce the Creative Juice among the colleagues with a View to deliver the Best and New in the business.</p>
            </div>
          </div>
          <hr class="my-4 my-md-5">
          <div id="education">
            <h5 class="mb-3">Education</h5>
            <div class="jobber-candidate-timeline">
              <div class="jobber-timeline-icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2018 - Pres</span>
                  <h6 class="mb-2">Masters in Software Engineering</h6>
                  <span>- Engineering University</span>
                  <p class="mt-2">This is the beginning of creating the life that you want to live. Know what the future holds for you as a result of the choice you can make today.</p>
                </div>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2014 - 2018</span>
                  <h6 class="mb-2">Diploma in Graphics Design</h6>
                  <span>- Graphic Arts Institute</span>
                  <p class="mt-2">Have some fun and hypnotize yourself to be your very own “Ghost of Christmas future” and see what the future holds for you.</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4 my-md-5">
          <div id="experience">
            <h5 class="mb-3">Work & Experience</h5>
            <div class="jobber-candidate-timeline">
              <div class="jobber-timeline-icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2018-6-01 <b>to</b> 2020-2-01</span>
                  <h6 class="mb-2">Web Designer</h6>
                  <span>- Inwave Studio</span>
                  <p class="mt-2">One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing them with beliefs that will help them to accomplish their desires.</p>
                </div>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2017-6-01 <b>to</b> 2018-6-01</span>
                  <h6 class="mb-2">Secondary School Certificate</h6>
                  <span>- Engineering High School</span>
                  <p class="mt-2">Figure out what you want, put a plan together to achieve it, understand the cost, believe in yourself then go and get it!</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4 my-md-5">
          <div id="skill">
            <h5 class="mb-3">Professional Skill</h5>
            <div class="">
            <blockquote class="blockquote"> So how do we get clarity? Simply by asking ourselves lots of questions: What do I really want? What does success look like to me? How will this achievement change my life? How can I use this success to make a difference for others?</blockquote>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">Photoshop</div>
                  <span class="progress-bar-number">70%</span>
                </div>
              </div>
              <div class="progress mb-md-0">
                <div class="progress-bar" role="progressbar" style="width:80%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">JavaScript</div>
                  <span class="progress-bar-number">80%</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">HTML/CSS</div>
                  <span class="progress-bar-number">55%</span>
                </div>
              </div>
              <div class="progress mb-md-0">
                <div class="progress-bar" role="progressbar" style="width:60%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">PHP</div>
                  <span class="progress-bar-number">60%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--
        <hr class="my-4 my-md-5">
        <div id="portfolio" class=" popup-gallery">
          <h5 class="mb-3">Portfolio</h5>
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
          <p>The sad thing is the majority of people have no clue about what they truly want. They have no clarity. When asked the question, responses will be superficial at best, and at worst, will be what someone else wants for them.</p>
        </div>
-->
        <hr class="my-4 my-md-5">
        <div id="awards">
          <h5 class="mb-3">Awards</h5>
          <div class="jobber-candidate-timeline">
            <div class="jobber-timeline-icon">
              <i class="fas fa-trophy"></i>
            </div>
            <div class="jobber-timeline-item">
              <div class="jobber-timeline-cricle">
                <i class="far fa-circle"></i>
              </div>
              <div class="jobber-timeline-info">
                <span class="jobber-timeline-time">2008 - 2012</span>
                <h6 class="mb-2">Perfect Attendance Programs</h6>
                <span>- Engineering High School</span>
                <p class="mt-2">Having clarity of purpose and a clear picture of what you desire, is probably the single most important factor in achievement. Why is Clarity so important?</p>
              </div>
            </div>
            <div class="jobber-timeline-item mb-0">
              <div class="jobber-timeline-cricle">
                <i class="far fa-circle"></i>
              </div>
              <div class="jobber-timeline-info">
                <span class="jobber-timeline-time">2012 - 2014</span>
                <h6 class="mb-2">Secondary School Certificate</h6>
                <span>- Engineering High School</span>
                <p class="mt-2">So, make the decision to move forward. Commit your decision to paper, just to bring it into focus. Then, go for it!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--=================================
    sidebar -->
    <div class="col-lg-4">
      <div class="sidebar mb-0">
<!--
        <div class="widget pb-3">
          <a href="#">
            <div class="docs-content">
              <div class="docs-text">
                Cover letter
                <span class="d-block text-danger">PDF</span>
              </div>
              <div class="docs-icon">
                <i class="font-xlll text-danger flaticon-pdf"></i>
              </div>
            </div>
          </a>
        </div>
        <div class="widget">
          <a href="#">
            <div class="docs-content">
              <div class="docs-text">
                Contract
                <span class="d-block text-success">DOCS</span>
              </div>
              <div class="docs-icon">
                <i class="font-xlll text-success flaticon-doc"></i>
              </div>
            </div>
          </a>
        </div>
-->
        <div class="widget">
          <div class="widget-title">
            <h5>Contact Candidate</h5>
          </div>
          <div class="company-contact-inner widget-box">
            <form>
              <div class="form-group">
                <label>Full name</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" rows="3" placeholder=""></textarea>
              </div>
              <a class="btn btn-primary btn-outline-primary btn-block" href="#">Send Email</a>
            </form>
          </div>
        </div>
        <div class="widget">
          <div class="widget-add">
          <img class="img-fluid" src="images/add-banner.png" alt=""></div>
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
footer-->
<?php include'footer.php';?>
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

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/owl-carousel/owl-carousel.min.js"></script>
    <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>

</body>
</html>
