<!--=================================
header -->
<?php include("admin-header.php"); ?>
<!--=================================
header -->


<?php 
    include("includes/classes/admin-Company.php");

    if(isset($_GET['id'])) {
      $company_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-company.php");
    }

    $company = new Company($con, $company_id);

    include("includes/handlers/admin-company-handler.php");
    

    function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

   // `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`)

?>


<!--=================================
edit company -->
    <!--=================================
    tab -->
    <section class="space-ptb bg-light">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12">
            <div class="section-title text-center">
              <h2 class="text-primary">Edit Company</h2>
            </div>
          </div>

          <div class="col-md-8">
            <div class=" justify-content-center">
              <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex d-block text-center" id="myTab" role="tablist">
                <li class="flex-fill">
                  <a class="nav-item active" href="post_a_job.php" id="Company-detail-tab"  role="tab" aria-controls="Company-detail" aria-selected="false">
                    <div class="feature-info-icon mb-3">
                      <i class="flaticon-suitcase"></i>
                    </div>
                    <!-- <span>Company Detail</span> -->
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
                    
                      <form class="form-row" id="editCompanyForm" name="editCompanyForm" method="post"  
                            action='<?php echo "admin-edit-company.php?id=$company_id" ; ?>' enctype = "multipart/form-data">
                         

                          <div class="form-group col-md-06 select-border">
                                <div class="thumb">
                                  <img class="profilePic" src= "<?php echo   $company->getCompanyLogo() ; ?>" alt="Logo">
                                  <!-- <img class="img-fluid" src= "<?php  ?>" alt="Logo"> -->
                                </div>                             
                            </div>

                            <div class="form-group col-md-06 select-border">
                               <label>Logo : <?php echo  $company->getCompanyLogo() ; ?> </label>
                                

                                <div class="cover-photo-contact">
                                  <div class="upload-file">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="image"/>
                                      <label class="custom-file-label">Change Logo</label>
                                      <input type="submit" id="updateLogoButton" name="updateLogoButton" class="btn btn-primary" value="Update">
                                    </div>
                                  </div>
                                </div>
                            </div>




                          <div class="form-group col-md-12 select-border">
                              <label>Company Name *</label>
                              <input type="text" id="title" name="name" id="name" class="form-control" 
                                  value="<?php echo $company->getCompanyName() ; ?>" placeholder="Enter a name"   required>
                              
                          </div>

                          <div class="form-group col-md-6">
                            <label for="comUsername">Username</label>
                            <?php echo $company->getError(Constants::$usernameCharacters); ?>
                            <?php echo $company->getError(Constants::$usernameTaken); ?>
                            
                            <input class="form-control" id="comUsername" name="comUsername" type="text" placeholder="e.g. bartSimpson" value=" <?php echo  $company->getUsername()  ; ?>" required>
                         </div> 

                          <div class="form-group col-md-6 select-border">
                            <label>Status*</label>
                          
                              <select name="status" id="status" class="form-control"> <!-- value="manish"> -->
                                  <?php 
                                    if($company->getCompanyStatus() == 0){
                                      $status = 0;
                                      echo "<option value='1'>Enable</option>";
                                      echo "<option selected = 'selected' value='$status'>Disabled</option>";
                                    }
                                    else{
                                      $status = 1;
                                      echo "<option value='0'>Disable</option>";
                                      echo "<option selected = 'selected' value='$status'>Enabled</option>";
                                    }  
                                  ?>
                              </select>
                          </div>
                            

                          

                          <div class="form-group col-md-6 select-border">
                            <label>Email Address *</label>
                            <?php echo $company->getError(Constants::$emailInvalid); ?>
                            <input type="email"  class="form-control" id="email" name="email" placeholder="Enter Email Address "  required value="<?php echo  $company->getEmail() ; ?>" >
                          </div>

                          
                         <div class="form-group col-md-6">
                          <label>Phone (+91)</label>
                          <?php echo $company->getError(Constants::$ContctNotNumeric); ?>
                          <?php echo $company->getError(Constants::$contactLength); ?>
                          <input type="text" class="form-control" name="contact" value= " <?php echo $company->getContact()  ; ?>">
                        </div>
                         
                                              
                                               


                          <div class="col-12" >
                            <h5 style="margin-top: 22px; margin-bottom: 5px;">Address/ Location</h5>
                          </div>
                              

                          <div class="form-group col-md-12">
                            <label>Address *</label>
                            <textarea required class="form-control" rows="2" id="address" name="address"><?php echo $company->getAdress() ; ?>
                            </textarea>
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>State</label>
                            <input required class="form-control"  placeholder="State" id="state" name="state" 
                                value="<?php echo  $company->getState() ; ?>">
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>City</label>
                            <input required class="form-control"  placeholder="City" id="city" name="city" 
                                value="<?php echo  $company->getCity() ; ?>">
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
edit company -->
<!--=================================
  
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->



