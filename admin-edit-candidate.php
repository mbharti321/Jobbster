<!--=================================
header -->
<?php include("admin-header.php"); ?>
<!--=================================
header -->


<?php 
    include("includes/classes/admin-Candidate.php");

    if(isset($_GET['id'])) {
      $user_id = $_GET['id'];
    }
    else {
      header("Location: admin-manage-candidates.php");
    }

    $candidate = new candidate($con, $user_id);

    include("includes/handlers/admin-candidate-handler.php");
    

    function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

   // `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, 'profile_pic'

?>


<!--=================================
edit candidate -->
    <!--=================================
    tab -->
    <section class="space-ptb bg-light">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12">
            <div class="section-title text-center">
              <h2 class="text-primary">Edit candidate</h2>
            </div>
          </div>

          <div class="col-md-8">
            <div class=" justify-content-center">
              <ul class="nav nav-tabs nav-tabs-03 justify-content-center d-sm-flex d-block text-center" id="myTab" role="tablist">
                <li class="flex-fill">
                  <a class="nav-item active" href="post_a_job.php" id="candidate-detail-tab"  role="tab" aria-controls="candidate-detail" aria-selected="false">
                    <div class="feature-info-icon mb-3">
                      <i class="flaticon-suitcase"></i>
                    </div>
                    <!-- <span>candidate Detail</span> -->
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
                    
                      <form class="form-row" id="editcandidateForm" name="editcandidateForm" method="post"  
                            action='<?php echo "admin-edit-candidate.php?id=$user_id" ; ?>'  enctype = "multipart/form-data">
                        
                            <div class="form-group col-md-06 select-border">
                                <div class="thumb">
                                  <img class="profilePic" src= "<?php echo  $candidate->getCandidateAvatar() ; ?>" alt="Logo">
                                  <!-- <img class="img-fluid" src= "<?php  ?>" alt="Logo"> -->
                                </div>                             
                            </div>

                            <div class="form-group col-md-6 select-border">
                               <label>Profile Picture : <?php echo  $candidate->getCandidateAvatar() ; ?> </label>
                                

                                <div class="cover-photo-contact">
                                  <div class="upload-file">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="image"/>
                                      <label class="custom-file-label">Choose Avatar</label>
                                       <input type="submit" id="updateAvatarButton" name="updateAvatarButton" class="btn btn-primary" value="Update">
                                    </div>
                                  </div>
                                </div>
                            </div>

                          

                          <div class="form-group col-md-6 select-border">
                              <label>Candidate Name *</label>
                              <input type="text" id="title" name="name" id="name" class="form-control" 
                                  value="<?php echo $candidate->getCandidateName() ; ?>" placeholder="Enter a name"   required>
                              
                          </div>

                          <div class="form-group col-md-6">
                            <label for="CandidateUsername">Username</label>
                            <?php echo $candidate->getError(Constants::$usernameCharacters); ?>
                            <?php echo $candidate->getError(Constants::$usernameTaken); ?>
                            
                            <input class="form-control" id="CandidateUsername" name="CandidateUsername" type="text" placeholder="e.g. bartSimpson" value=" <?php echo  $candidate->getUsername()  ; ?>" required>
                         </div> 

                                                

                          

                          <div class="form-group col-md-6 select-border">
                            <label>Email Address *</label>
                            <?php echo $candidate->getError(Constants::$emailInvalid); ?>
                            <input type="email"  class="form-control" id="email" name="email" placeholder="Enter Email Address "  required value="<?php echo  $candidate->getEmail() ; ?>" >
                          </div>

                          
                           <div class="form-group col-md-6">
                            <label>Phone (+91)</label>
                            <?php echo $candidate->getError(Constants::$ContctNotNumeric); ?>
                            <?php echo $candidate->getError(Constants::$contactLength); ?>
                            <input type="text" class="form-control" name="contact" value= " <?php echo $candidate->getContact()  ; ?>">
                           </div>

                            <div class="form-group col-md-6 datetimepickers">
                              <label>Date of birth</label>
                              <input type="date" class="form-control" name="DOB" id="DOB" placeholder="dd-mm-yyyy" value="<?php echo $candidate->getDOB()  ; ?>" min="1950-01-01" max="2030-12-31" required>
                            </div>

                            <div class="form-group col-md-6" >
                              <label class="d-block mb-3">Gender</label>
                                <?php $gender = $candidate->getgender() ; ?>
                                <div class="custom-control custom-radio d-inline">                              
                                  <input type="radio" name="genderRadio" id="genderRadio1" class="custom-control-input" value="0" <?php echo(($gender == 0)?'checked="checked"':''); ?> >
                                  <label class="custom-control-label" for="genderRadio1">Male</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                  <input type="radio" name="genderRadio" id="genderRadio2"  class="custom-control-input" value="1" <?php echo(($gender == 1)?'checked="checked"':''); ?> >
                                  <label class="custom-control-label" for="genderRadio2">Female</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                  <input type="radio" name="genderRadio" id="genderRadio3"  class="custom-control-input" value="2" <?php echo(($gender == 2)?'checked="checked"':''); ?> >
                                  <label class="custom-control-label" for="genderRadio3">Other</label>
                                </div>
                            </div>
                         
                                              
                                               


                          <div class="col-12" >
                            <h5 style="margin-top: 22px; margin-bottom: 5px;">Address/ Location</h5>
                          </div>
                              

                          <div class="form-group col-md-12">
                            <label>Address *</label>
                            <textarea required class="form-control" rows="2" id="address" name="address"><?php echo $candidate->getAdress() ; ?>
                            </textarea>
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>State</label>
                            <input required class="form-control"  placeholder="State" id="state" name="state" 
                                value="<?php echo  $candidate->getState() ; ?>">
                          </div>

                          <div class="form-group col-md-6 select-border">
                            <label>City</label>
                            <input required class="form-control"  placeholder="City" id="city" name="city" 
                                value="<?php echo  $candidate->getCity() ; ?>">
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
edit candidate -->
<!--=================================
  
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->



