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
tab -->
<section class="space-ptb bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="section-title text-center">
        <h2 class="text-primary">Post a New Job</h2>
       </div>
      </div>
      <div class="col-md-8">
        <div class=" justify-content-center">
          <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex d-block text-center" id="myTab" role="tablist">
            <li class="flex-fill">
              <a class="nav-item" href="post_a_job.php" id="Job-detail-tab"  role="tab" aria-controls="Job-detail" aria-selected="false">
                <div class="feature-info-icon mb-3">
                  <i class="flaticon-suitcase"></i>
                </div>
                <span>Job Detail</span>
              </a>
            </li>
            <li class="flex-fill">
              <a class="nav-item active" id="Package-tab"  href="post_job_package.php" role="tab" aria-controls="Package" aria-selected="false">
                <div class="feature-info-icon mb-3">
                  <i class="flaticon-debit-card"></i>
                </div>
                <span>Package &amp; Payments</span>
              </a>
            </li>
            <li class="flex-fill">
              <a class="nav-item" id="Confirm-tab"  href="post_job_confirm.php" role="tab" aria-controls="Confirm" aria-selected="false">
                <div class="feature-info-icon mb-3">
                  <i class="flaticon-tick"></i>
                </div>
                <span>Confirmation</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade active show" id="Job-detail" role="tabpanel" aria-labelledby="Job-detail-tab">
      <section class="space-ptb">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5 class="mb-4">Buy New Package</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead class="bg-light">
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">Title</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total Jobs</th>
                  <th scope="col">Job Expiry</th>
                  <th scope="col">Package Expiry</th>
                </tr>
              </thead>
              <tbody>
<!--
                <tr>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="pachage-01">
                      <label class="custom-control-label" for="pachage-01"></label>
                    </div>
                  </td>
                  <th>Golden</th>
                  <td>$90.00</td>
                  <td>15</td>
                  <td>30 Days</td>
                  <td>30 Days</td>
                </tr>
-->
                <tr>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="pachage-02">
                      <label class="custom-control-label" for="pachage-02"></label>
                    </div>
                  </td>
                  <th>Premium</th>
                  <td>₹1000.00</td>
                  <td>25</td>
                  <td>60 Days</td>
                  <td>60 Days</td>
                </tr>
<!--
                <tr>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="pachage-03">
                      <label class="custom-control-label" for="pachage-03"></label>
                    </div>
                  </td>
                  <th>Silver</th>
                  <td>$50.00</td>
                  <td>10</td>
                  <td>20 Days</td>
                  <td>20 Days</td>
                </tr>
-->
                <tr>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="pachage-04">
                      <label class="custom-control-label" for="pachage-04"></label>
                    </div>
                  </td>
                  <th>Standard</th>
                  <td>Free</td>
                  <td>1</td>
                  <td>15 Days</td>
                  <td>15 Days</td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          <div class="col-md-12 mt-4">
            <a class="btn btn-primary" href="#">Update Package</a>
          </div>
        </div>
      </div>
    </section>
  </div>
  
</div>
<!--=================================
feature-info-->

<!--=================================
feature-info-->
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
<!--=================================
Signin Modal Popup -->

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
