<!--=================================
header -->
<?php include("admin-header.php"); ?>
<!--=================================
header -->


<?php 
    include("includes/classes/admin-Job.php");

    if(isset($_GET['id'])) {
      $job_post_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-jobs.php");
    }

    $job = new Job($con, $job_post_id);

    include("includes/handlers/admin-job-handler.php");
    

    function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

   

?>


<!--=================================
edit Job -->
    <!--=================================
    tab -->
    <section class="space-ptb bg-light">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12">
            <div class="section-title text-center">
              <h2 class="text-primary">Edit Job</h2>
            </div>
          </div>

          <div class="col-md-8">
            <div class=" justify-content-center">
              <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex d-block text-center" id="myTab" role="tablist">
                <li class="flex-fill">
                  <a class="nav-item active" href="post_a_job.php" id="Job-detail-tab"  role="tab" aria-controls="Job-detail" aria-selected="false">
                    <div class="feature-info-icon mb-3">
                      <i class="flaticon-suitcase"></i>
                    </div>
                    <!-- <span>Job Detail</span> -->
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    tab ==============================-->





    <section class="space-ptb">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="user-dashboard-info-box">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    
                      <form class="form-row" id="editJobForm" name="editJobForm" method="post"  
                            action='<?php echo "admin-edit-job.php?id=$job_post_id" ; ?>' >
                    
                          <div class="form-group col-md-6 select-border">
                              <label>Job Title *</label>
                              <input type="text" id="title" name="title" class="form-control" 
                                  value="<?php echo $job->getJobTitle() ; ?>" placeholder="Enter a Title" id="title"  required>
                              
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>Job Type*</label>
                          
                              <select name="jobtype" id="jobtype" class="form-control" required> <!-- value="manish"> -->
                                  <option selected = 'selected' value='<?php echo $job->getJobType(); ?>'> 
                                    <?php echo $job->getJobType(); ?>                                    
                                  </option>
                                  <?php 
                                    $qry="select job_type from tbl_job_type";
                                    $results = mysqli_query($con,$qry);
                                    while($rows = mysqli_fetch_assoc($results))
                                    {
                                      $type = $rows['job_type'];

                                      if ($type == $job->getJobType()){
                                        continue;
                                      }
                                      echo "<option  value='$type'>$type</option>";
                                    }
                                   ?>
                                   <!-- <option selected = 'selected' value='$type'></option> -->
                              </select>
                          </div>
                            

                          <div class="form-group col-md-12">
                            <label>Description *</label>
                            <textarea class="form-control" id="description" name="description" required rows="3"><?php echo $job->getJobDescription(); ?></textarea>
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>Email Address *</label>
                            <?php echo $job->getError(Constants::$emailInvalid); ?>
                            <input type="email"  class="form-control" id="email" name="email" placeholder="Enter Email Address "  required value="<?php echo  $job->getEmail() ; ?>" >
                          </div>

                          
                         <div class="form-group col-md-6 select-border">
                            <label>Experience*</label>
                            <?php echo $job->getError(Constants::$negativeExperience); ?>
                            <?php echo $job->getError(Constants::$experienceNotAlphanumeric); ?>
                            <input class="form-control" required placeholder="Experience" id="experience" name="experience" 
                                value="<?php echo  $job->getExperience() ; ?>">
                         </div>
                         
                         <div class="form-group col-md-6 select-border">
                          <label>Minimum Salary*</label>
                          <?php echo $job->getError(Constants::$negativeSalary); ?>
                          <?php echo $job->getError(Constants::$salaryNotNumeric); ?>
                          <?php echo $job->getError(Constants::$minSalaryGreaterThanMaxSalary); ?>
                          <input class="form-control" required placeholder="MinSalary" id="minSalary" name="minSalary" 
                              value="<?php echo $job->getMinSalary() ; ?>">
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>Maximum Salary*</label>
                             <input class="form-control" required  placeholder="MaxSalary" id="maxSalary" name="maxSalary" 
                                value="<?php echo  $job->getMaxSalary() ; ?>">
                          </div>

                          
                                               


                          <div class="col-12" >
                            <h5 style="margin-top: 22px; margin-bottom: 5px;">Address/ Location</h5>
                          </div>
                              

                          <div class="form-group col-md-12">
                            <label>Address *</label>
                            <textarea required class="form-control" rows="2" id="address" name="address"><?php echo $job->getAdress() ; ?>
                            </textarea>
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>State</label>
                            <input required class="form-control"  placeholder="State" id="state" name="state" 
                                value="<?php echo  $job->getState() ; ?>">
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>City</label>
                            <input required class="form-control"  placeholder="City" id="city" name="city" 
                                value="<?php echo  $job->getCity() ; ?>">
                          </div>

                          <div class="col-md-12">
                            <input type="submit" id="saveChangesButton" name="saveChangesButton" class="btn btn-primary" value="Save Changes">
                          </div>

                      </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
  
    </section>
<!--=================================
edit Job -->
<!--=================================
  
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->



