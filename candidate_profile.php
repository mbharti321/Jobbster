<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
<!--=================================
header -->
<?php include "header.php"; ?>    
<!--=================================
header -->
<?php
    include("Connect.php");
    include("includes/classes/Constants.php");
    include("includes/classes/Candidate.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
        $candidate_name= $_SESSION['username'];
        $qry1="select * from tbl_user where username='$candidate_name'";
        $result1 = mysqli_query($con,$qry1); 
        $row1 = mysqli_fetch_array($result1);
        $user_id = $row1['user_id'];
        // $user_name = $row1['name'];


        $candidate = new Candidate($con, $user_id);

        include("includes/handlers/candidate-handler.php");
    }
    else 
    {
        header("Location: signin_candidate.php");
        exit();
    }
?>


<?php 
    


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
              <h2 class="text-primary">My Profile</h2>
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
                            action='<?php echo "candidate_profile.php" ; ?>'  enctype = "multipart/form-data">
                        
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
Change Password -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box">
          <div class="section-title-02 mb-4">
            <h4>Change Password</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <form class="form-row" id="changePasswordForm" action="candidate_profile.php" method="POST" >

                    <div class="form-group col-md-12">
                     
                      <label>Current Password</label>
                       <?php echo $candidate->getError(Constants::$invalidCurrentPassword); ?>
                      <input type="password" name="currentPassword" class="form-control"   value="" placeholder="Current password" required>
                    </div>
                    <div class="form-group col-md-12">
                      
                      <label>New Password</label>
                      <?php echo $candidate->getError(Constants::$passwordsDoNoMatch); ?>
                      <?php echo $candidate->getError(Constants::$passwordNotAlphanumeric); ?>
                      <?php echo $candidate->getError(Constants::$passwordCharacters); ?>
                      <input type="password" name="password" class="form-control" value="" placeholder="New password" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Confirm Password</label>
                      <input type="password" name="password2" class="form-control" value="" placeholder="Confirm password" required>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit" name="changePasswordButton">Change Password</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Change Password -->






<!--=================================
Update Academic Details -->

 <!-- `tbl_user_education` (`user_eid`, `user_id`, `10_percentage`, `10_board`, `12_percentage`, `12_board`, `UG_degree`, `UG_university`, `UG_percentage`, `PG_degree`, `PG_university`, `PG_percentage`) VALUES (NULL, '4', '67', 'KSEEB', '76', 'PUC', 'B.Tech in Computer Science and Engineering', 'Presidency University', '69', 'M.Tech in Computer Science and Engineering', 'Christ University', '66'); -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box">
          <div class="section-title-02 mb-4">
            <h4>Academic Details</h4>
          </div>
          <?php 
            $tenthBoard = "";
            $tenthpercentage = "";
            $twelfthBoard = "";
            $twelfthpercentage = "";
            $UGCourseName = "";
            $UGPercentage = ""; 
            $UGUniversityName = "";
            $PGCourseName = "";
            $PGPercentage = "";
            $PGUniversityName = "";

            $userId = $candidate->getCandidateId();
            $checkAcademicExist = mysqli_query($con, "SELECT * from tbl_user_education where user_id='$userId'");
            if(mysqli_num_rows($checkAcademicExist) != 0) {
              $academicDetails = mysqli_fetch_array($checkAcademicExist);

              $tenthBoard = $academicDetails['10_board'];
              $tenthpercentage = $academicDetails['10_percentage'];
              $twelfthBoard = $academicDetails['12_board'];
              $twelfthpercentage = $academicDetails['12_percentage'];
              $UGCourseName = $academicDetails['UG_degree'];
              $UGPercentage = $academicDetails['UG_percentage'];
              $UGUniversityName = $academicDetails['UG_university'];
              $PGCourseName = $academicDetails['PG_degree'];
              $PGPercentage = $academicDetails['PG_percentage'];
              $PGUniversityName = $academicDetails['PG_university'];

            }
            else{
                echo '
                      <div class="col-12" >
                        <h4 style="margin-top: 22px; margin-bottom: 5px;">There is not academic details available.</h4>
                        <h5>Please Update your details</h5>
                      </div> ';
            }

          ?>

          <div class="row">
            <div class="col-12">
              <form class="form-row" id="academicDetailsForm" action="candidate_profile.php" method="POST" >
                    <div class="col-12" >
                      <h5 style="margin-top: 22px; margin-bottom: 5px;">10th Board Details</h5>
                    </div> 
                    <div class="form-group col-md-6 select-border">
                      <label>10th Board Name</label>
                      <?php echo $candidate->getError(Constants::$TenthBoardOrUniversityLength); ?>
                      <?php echo $candidate->getError(Constants::$TenthBoardOrUniversityInvalidName); ?>
                      <input required class="form-control"  placeholder="10th Board name" id="tenthBoard" name="tenthBoard" 
                          value="<?php echo  $tenthBoard ; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>10th Percentage</label>
                      <?php echo $candidate->getError(Constants::$TenthPercentageInvalid); ?>
                      <?php echo $candidate->getError(Constants::$TenthPercentageNotNumeric); ?>
                      <input required class="form-control"  placeholder="10th Percentage" id="tenthpercentage" name="tenthpercentage" 
                          value="<?php echo  $tenthpercentage ; ?>">
                    </div>


                    <div class="col-12" >
                      <h5 style="margin-top: 22px; margin-bottom: 5px;">12th Board Details</h5>
                    </div> 
                    <div class="form-group col-md-6 select-border">
                      <label>12th Board Name</label>
                      <?php echo $candidate->getError(Constants::$TwelfthBoardOrUniversityLength); ?>
                      <?php echo $candidate->getError(Constants::$TwelfthBoardOrUniversityInvalidName); ?>
                      <input required class="form-control"  placeholder="12th Board name" id="twelfthBoard" name="twelfthBoard" 
                          value="<?php echo  $twelfthBoard ; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>12th Percentage</label>
                      <?php echo $candidate->getError(Constants::$TwelfthPercentageInvalid); ?>
                      <?php echo $candidate->getError(Constants::$TwelfthPercentageNotNumeric); ?>
                      <input required class="form-control"  placeholder="10th Percentage" id="twelfthpercentage" name="twelfthpercentage" 
                          value="<?php echo  $twelfthpercentage ; ?>">
                    </div>


                    <div class="col-12" >
                      <h5 style="margin-top: 22px; margin-bottom: 5px;">UG Course Details</h5>
                    </div> 
                    <div class="form-group col-md-6 select-border">
                      <label>UG Course Name</label>
                      <?php echo $candidate->getError(Constants::$UGCourseNameLength); ?>
                      <?php echo $candidate->getError(Constants::$UGCourseNameInvalidName); ?>
                      <input required class="form-control"  placeholder="UG Course Name" id="UGCourseName" name="UGCourseName" 
                          value="<?php echo  $UGCourseName ; ?>">
                    </div>                    
                    <div class="form-group col-md-6">
                      <label>UG Percentage</label>
                      <?php echo $candidate->getError(Constants::$UGPercentageInvalid); ?>
                      <?php echo $candidate->getError(Constants::$UGPercentageNotNumeric); ?>
                      <input required class="form-control"  placeholder="UG Percentage" id="UGPercentage" name="UGPercentage" 
                          value="<?php echo  $UGPercentage ; ?>">
                    </div>
                    <div class="form-group col-md-12 select-border">
                      <label>UG University Name</label>
                      <?php echo $candidate->getError(Constants::$UGBoardOrUniversityLength); ?>
                      <?php echo $candidate->getError(Constants::$UGBoardOrUniversityInvalidName); ?>
                      <input required class="form-control"  placeholder="UG University Name" id="UGUniversityName" name="UGUniversityName" 
                          value="<?php echo  $UGUniversityName ; ?>">
                    </div>


                    <div class="col-12" >
                      <h5 style="margin-top: 22px; margin-bottom: 5px;">PG Course Details</h5>
                    </div> 
                    <div class="form-group col-md-6 select-border">
                      <label>PG Course Name</label>
                      <?php echo $candidate->getError(Constants::$PGCourseNameLength); ?>
                      <?php echo $candidate->getError(Constants::$PGCourseNameInvalidName); ?>
                      <input required class="form-control"  placeholder="PG Course Name" id="PGCourseName" name="PGCourseName" 
                          value="<?php echo  $PGCourseName ; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>PG Percentage</label>
                      <?php echo $candidate->getError(Constants::$PGPercentageInvalid); ?>
                      <?php echo $candidate->getError(Constants::$PGPercentageNotNumeric); ?>
                      <input required class="form-control"  placeholder="PG Percentage" id="PGPercentage" name="PGPercentage" 
                          value="<?php echo  $PGPercentage ; ?>">
                    </div>
                    <div class="form-group col-md-12 select-border" >
                      <label>PG University Name</label>
                      <?php echo $candidate->getError(Constants::$PGBoardOrUniversityLength); ?>
                      <?php echo $candidate->getError(Constants::$PGBoardOrUniversityInvalidName); ?>
                      <input required class="form-control"  placeholder="PG University Name" id="PGUniversityName" name="PGUniversityName" 
                          value="<?php echo  $PGUniversityName ; ?>">
                    </div>
                   
                    
                    <button class="btn btn-lg btn-primary" type="submit" name="updateAcademicdButton">Update Academic Details</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Update Academic Details -->


<!--=================================
Update Experience Details -->
<!-- `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`) VALUES (NULL, '3', 'Sun Technologies', 'Hosur Road, Bangalore', 'UI developer', '2'); -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box">
          <div class="section-title-02 mb-4" >
            <h4>Experience Details</h4>
          </div>

          <div>
            <!--=================================
                printing Experience -->
  
              <?php
                  $userId = $candidate->getCandidateId();
                  $exprienceDetails = mysqli_query($con,"SELECT * FROM tbl_user_work where user_id = '$userId'");

                  if(mysqli_num_rows($exprienceDetails) == 0) {
                   echo "<span class='emptyRecord'> No exprience details to be shown...</span>";
                  }
                  else{

                      echo '<table class = "table manage-candidates-top mb-2">
                      
                              <thead class="bg-light" align = "center">
                                <tr>                              
                                    <th scope="col">CompanyName</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Exprience(Years)</th>
                                    <th scope="col">Address</th>    
                                    <th scope="col">Action</th>                              
                                </tr>
                              </thead> ';

                              while($row = mysqli_fetch_array($exprienceDetails))
                              {
                                 
                                echo '<tr class="candidates-list" align = "center">';
                                      echo "<td style='display: none;'>" . $row['user_wid'] . "</td>"; 
                                      echo "<td>" . $row['company_name'] . "</td>";                                      
                                      echo "<td>" . $row['designation'] . "</td>";
                                      echo "<td>" . $row['experiance_year'] . "</td>";                                     
                                      echo "<td>" . $row['address'] . "</td>";
                        
                                      echo '<td>                                              
                                             <button type="button" class="btn btn-success editbtn"> <i class="fas fa-pencil-alt"></i> </button>
                                             <button type="button" class="btn btn-danger deletebtn"> <i class="far fa-trash-alt"></i> </button>
                                            </td> ';
                                echo "</tr>";
                              }

                      echo "</table>";

                  }

                  // echo "</div>"
                  mysqli_close($con);
              ?>
             
          <!--=================================
          printing Experience -->
          </div>

          <div class="row">
            <div class="col-12">
              <form class="form-row" id="addExperienceDetailsForm" action="candidate_profile.php" method="POST">
                    <div class="col-12" >
                      <h5 style="margin-top: 22px; margin-bottom: 5px;">Add New Experience</h5>
                    </div> 
                    <div class="form-group col-md-6 select-border">
                      <label>Company Name *</label>
                      <?php echo $candidate->getError(Constants::$ExprCompanyLength); ?>
                      <?php echo $candidate->getError(Constants::$ExprCompanyInvalidName); ?>
                      <input required class="form-control"  placeholder="Exprience Company Name" id="exprCompany" name="exprCompany" 
                          value="">
                    </div>
                    <div class="form-group col-md-6 select-border">
                      <label>Designation</label>
                      <?php echo $candidate->getError(Constants::$ExprDesignationLength); ?>
                      <?php echo $candidate->getError(Constants::$ExprDesignationInvalidName); ?>
                      <input required class="form-control"  placeholder="Designation" id="exprDesignation" name="exprDesignation" 
                          value="">
                    </div>
                    <div class="form-group col-md-6 select-border">
                      <label>Experience Year</label>
                      <?php echo $candidate->getError(Constants::$ExprYearInvalid); ?>
                      <?php echo $candidate->getError(Constants::$ExprYearNotNumeric); ?>
                      <input required class="form-control"  placeholder="Experience in Year" id="exprYear" name="exprYear" 
                          value="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address *</label>
                      <?php echo $candidate->getError(Constants::$ExprAddressLength); ?>
                      <?php echo $candidate->getError(Constants::$ExprAddressInvalidName); ?>
                      <textarea required class="form-control" rows="1" id="exprAddress" name="exprAddress" placeholder="Company Address"></textarea>
                    </div>

                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button class="btn btn-lg btn-primary" type="submit" name="AddExperienceButton">Add New Experience</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Update Experience Details -->

<!-- ####################################################################################################################### -->

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 30%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Experience Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="candidate-expr-updatecode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

                <div class="form-group">
                     <label>Company Name *</label>                  
                     <input required class="form-control"  placeholder="Exprience Company Name" id="edit_exprCompany" name="edit_exprCompany" 
                          value="">
                </div>

                <div class="form-group">
                    <label>Designation</label>                      
                    <input required class="form-control"  placeholder="Designation" id="edit_exprDesignation" name="edit_exprDesignation" 
                        value="">
                </div>

                <div class="form-group">
                    <label>Experience Year</label>                      
                    <input required class="form-control"  placeholder="Experience in Year" id="edit_exprYear" name="edit_exprYear" 
                          value="">
                </div>

                <div class="form-group">
                   <label>Address *</label>                     
                   <textarea required class="form-control" rows="1" id="edit_exprAddress" name="edit_exprAddress" placeholder="Company Address"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->

<!-- ####################################################################################################################### -->

<!-- DELETE POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 30%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Experience Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="candidate-expr-deletecode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>

<script>

    $(document).ready(function () {

        $('.deletebtn').on('click', function() {
            
            $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
          
        });
    });

    $(document).ready(function () {
        $('.editbtn').on('click', function() {
            
            $('#editmodal').modal('show');

            
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#edit_exprCompany').val(data[1]);
                $('#edit_exprDesignation').val(data[2]);
                $('#edit_exprYear').val(data[3]);
                $('#edit_exprAddress').val(data[4]);
        });
    });

</script>


<!--=================================
edit candidate -->

















<!--=================================
footer -->
<footer class="footer mt-5 mt-md-5 pt-0">
    <div class="footer-bottom bg-light">
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
footer -->

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
    <script src="js/datetimepicker/moment.min.js"></script>
    <script src="js/datetimepicker/datetimepicker.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>

</body>
</html>
