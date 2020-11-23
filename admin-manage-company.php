

<!--=================================
Header -->
<?php include("admin-header.php"); ?>
<!--=================================
Header -->


<!--=================================
Manage Company -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box table-responsive pb-4 mb-0">
         

          <div class="user-dashboard-info-box pb-0">
            <div class="row mb-4">
              <div class="col-md-7 col-sm-5 d-flex align-items-center">
                <div class="section-title">
                  <h2 class="title">Company Details</h2>
                </div>
                <!-- <div class="section-title-02 mb-0 ">
                  <h4 class="mb-0">Company Details</h4>
                </div> -->
              </div>
              <div class="col-md-5 col-sm-7 mt-3 mt-sm-0">
                
              </div>
            </div>
              <!--=================================
                printing Company -->
  
              <?php

                  $companyDetails = mysqli_query($con,"SELECT * FROM tbl_company");
                    if(mysqli_num_rows($companyDetails) == 0) {
                     echo "<span class='emptyRecord'> No details to be shown...</span>";
                      return;
                    }

                  
// <th scope="col">Email</th>
// <th scope="col">Address</th>
                  echo '<table class = "table manage-candidates-top mb-0">
                  
                          <thead class="bg-light" align = "center">
                            <tr >
                             
                                <th scope="col">Id</th>
                                <th scope="col">Logo</th>
                                <th scope="col">CompanyName</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Location</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                              
                            </tr>
                          </thead> ';

                          while($row = mysqli_fetch_array($companyDetails))
                          {
                             $logoPath = $row['logo'] ;

                            echo '<tr class="candidates-list" align = "center">';
                            
                                  echo "<td>" . $row['company_id'] . "</td>";
                                  echo '<td> 
                                         <div class="thumb">
                                            <img class="img-fluid" src= "' .$logoPath.'" alt="logo">
                                         </div> 
                                       </td>';
                                  echo "<td>" . $row['cname'] . "</td>";
                                  echo "<td>" . $row['contact_no'] . ", " . $row['email_id'] . "</td>";
                                  // echo "<td>" . $row['email_id'] ."</td>";
                                  // echo "<td>" . $row['address'] . "</td>";
                                  echo "<td>". $row['address'] . ", " . $row['city'] . ", " . $row['state'] . "</td>";
                                  echo "<td>" . $row['status'] . "</td>";
                    
                                  echo '<td>
                                          <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                            <li><a href="admin-edit-company.php?id=' . $row["company_id"] . '"
                                              class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </li>
                                            
                                            <li><a href="admin-delete-company.php?id=' . $row["company_id"] . '" onclick = "return checkDelete()" 
                                               class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i>
                                               </a>
                                            </li>
                                          </ul>
                                        </td> ';
                            echo "</tr>";
                          }

                          echo ' <thead class="bg-light" align = "center">
                                    <tr >
                                      <th scope="col">Id</th>
                                      <th scope="col">Logo</th>
                                      <th scope="col">CompanyName</th>
                                      <th scope="col">Contact</th>
                                      <th scope="col">Location</th>
                                      <th scope="col">status</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead> ';
                  echo "</table>";

                  // echo "</div>"
                  mysqli_close($con);
              ?>
          <!--=================================
          printing Company -->
          </div>
         
          
       
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Manage Company -->


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


