

<!--=================================
Header -->
<?php include("admin-header.php"); ?>
<!--=================================
Header -->


<!--=================================
Manage Candidates -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box table-responsive pb-4 mb-0">
         

          <div class="user-dashboard-info-box pb-0">
            <div class="row mb-4">
              <div class="col-md-7 col-sm-5 d-flex align-items-center">
                <div class="section-title">
                  <h2 class="title">Candidate Details</h2>
                </div>
              </div>
              <div class="col-md-5 col-sm-7 mt-3 mt-sm-0">
               
              </div>
            </div>
          <!--=================================
              show  Candidates -->
             
              <?php

              $user_details = mysqli_query($con,"SELECT * FROM tbl_user");

              if(mysqli_num_rows($user_details) == 0) {
                echo "<span class='emptyRecord'> No details to be shown...</span>";
                return;
              }

              // echo " <div class="employers-list">"

              echo '<table class = "table manage-candidates-top mb-0">
                  
                          <thead class="bg-light" align = "center">
                              <tr >
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Action</th>
                              </tr>
                            </thead> ';

                    while($row = mysqli_fetch_array($user_details))
                    {
                      $picPath = $row['profile_pic'] ;

                      echo '<tr class="candidates-list" align = "center">';
                      // echo "<td>" . $picPath . "</td>";
                          echo ' <td>
                                  <div class="thumb">
                                    <img class="img-fluid" src= "' .$picPath.'" alt="">
                                  </div> 
                                </td>';


                          // echo "<td>" . $row['user_id'] . "</td>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['gender'] . "</td>";
                          echo "<td>" . $row['DOB'] . "</td>";  
                          echo "<td>" . $row['contact_no'] .", ". $row['email_id'] . "</td>";                    
                          echo "<td>" . $row['address'] . ", ". $row['state'] . ", " . $row['city'] . "</td>";
                    
                          echo "<td>" . $row['username'] . "</td>";


                          echo '<td>
                                  <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                    <li><a href="admin-edit-candidate.php?id=' . $row["user_id"] . '"
                                      class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </li>
                                    
                                     <li><a href="admin-delete-candidate.php?id=' . $row["user_id"] . '" onclick = "return checkDelete()" 
                                       class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i>
                                       </a>
                                     </li>
                                  </ul>
                                </td> ';

                       echo "</tr>";
                      
                    }
                    echo ' <thead class="bg-light" align = "center">
                              <tr >
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Action</th>
                              </tr>
                            </thead> ';
              echo "</table>";

              // echo "</div>"
              mysqli_close($con);
              ?>
          <!--=================================
          show  Candidates -->
          </div>
          <br>
          
       
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Manage Candidates -->
<script>
  function checkDelete() {
    return confirm('Are you sure you want to delete the perticular row ?');
}
</script>
<!--=================================
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->
