<!--=================================
header -->
<?php include("admin-header.php"); ?>
<!--=================================
header -->



<!--=================================
Manage Jobs -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box table-responsive pb-4 mb-0">
         

          <div class="user-dashboard-info-box pb-0">
            <div class="row mb-4">
              <div class="col-md-7 col-sm-5 d-flex align-items-center">
                <div class="section-title">
                  <h2 class="title">Jobs Details</h2>
                </div>
              </div>
              <div class="col-md-5 col-sm-7 mt-3 mt-sm-0">
                
              </div>
            </div>
              <!--=================================
                printing Jobs -->
  
              <?php

                  $job_detalis = mysqli_query($con,"SELECT * FROM tbl_job_post");
                    if(mysqli_num_rows($job_detalis) == 0) {
                      echo "<span class='emptyRecord'> No details to be shown...</span>";
                      return;
                    }

                  

                  echo '<table class = "table manage-candidates-top mb-0">
                  
                          <thead class="bg-light" align = "center">
                            <tr >
                              <th scope="col">JobId</th>
                              <th scope="col">CompanyId</th>
                              <th scope="col">JobDescription</th>
                              <th scope="col">Salary(₹)</th>
                              <th scope="col">JobType</th>
                              <th scope="col">JobTitle</th>
                              <th scope="col">Location</th>
                              <th scope="col">Experience</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead> ';

                          while($row = mysqli_fetch_array($job_detalis))
                          {
                            

                            echo '<tr class="candidates-list" align = "center">';
                            
                                  echo "<td>" . $row['job_post_id'] . "</td>";
                                  echo "<td>" . $row['company_id'] . "</td>";
                                  echo "<td>" . $row['job_description'] . "</td>";
                                  echo "<td>" . $row['min_salary'] . "-" . $row['max_salary'] . "</td>";
                                  echo "<td>" . $row['job_type_id'] . "</td>";
                                  echo "<td>" . $row['job_title'] . "</td>";
                                  echo "<td>". $row['city'] . ", " . $row['state'] . "</td>";
                                  echo "<td>" . $row['experience'] . "</td>";
                    
                                  echo '<td>
                                          <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                            <li><a href="admin-edit-job.php?id=' . $row["job_post_id"] . '"
                                              class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </li>
                                            
                                            <li><a href="admin-delete-job.php?id=' . $row["job_post_id"] . '" onclick = "return checkDelete()" 
                                               class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i>
                                               </a>
                                            </li>
                                          </ul>
                                        </td> ';

                            echo "</tr>";
                          }

                          echo ' <thead class="bg-light" align = "center">
                                    <tr >
                                      <th scope="col">JobId</th>
                                      <th scope="col">CompanyId</th>
                                      <th scope="col">JobDescription</th>
                                      <th scope="col">Salary(₹)</th>
                                      <th scope="col">JobType</th>
                                      <th scope="col">JobTitle</th>
                                      <th scope="col">Location</th>
                                      <th scope="col">Experience</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead> ';
                  echo "</table>";

                  // echo "</div>"
                  mysqli_close($con);
              ?>
          <!--=================================
          printing Jobs -->
          </div>
       


         
          
      
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Manage Jobs -->

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



