<!--=================================
Header -->
<?php include("admin-header.php"); ?>
<!--=================================
Header -->
<?php
include("includes/classes/admin-Company.php");
include("includes/classes/admin-Job.php");
include("includes/classes/admin-Candidate.php");
?>



<section>
  <div class="container">

        <!--=================================
        Admin Dashboard -->
        <?php
         // include("admin-dashboard.php"); 
         ?>
        <!-- =================================
        Admin Dashboard -->

                <!-- =================================
        dashboard -->
        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive pb-4 mb-0">
                   <!-- <h1>Dashboard Details</h1> -->
                   <!-- <br> -->
                   <!-- chart -->


                  <center><div class="user-dashboard-info-box pb-0">
                    <div class="wrapper">
                        <br/><br/><br/>
                        <h2>Manage Courses and Certification</h2>
                        <br/><br/><hr></div>
                      <br/>
                      <br/>
       <button type="submit" name="submit" class="btn btn-outline-warning"><a href="courses\foodadd.php" class="box effect">
        <i class="fa fa-upload"></i> &nbsp;Upload
      </a></button> 
       <button type="submit" name="submit" class="btn btn-outline-warning"><a href="courses\foodinfo.php" class="box effect">
        <i class="fa fa-eye"></i> &nbsp;View Uploads
      </a>     </button>   
       <!-- <button type="submit" name="submit" class="btn btn-outline-warning"> <a href="#" class="box effect">
        <i class="fa fa-youtube"></i> &nbsp;Youtube   
      </a></button> --><br/><br/><br/><br/><br/>
    </div></center> <br/><br/>
                    <br>
                   </div>
                   <!-- chart -->

                   <!-- Different Data -->
<br>
                        <table class="table table-bordered">
                            <tr class="bg-light" align = "center">
                              <th>Total Users</th>
                              <th>Job Seekers</th>
                              <th>Companies</th>
                              <th>Job Posted</th>
                            </tr>
                          
                            <tr align = "center" >
                                <?php 
                                    $query = mysqli_query($con, "SELECT company_id FROM tbl_company");
                                    $companyCount = mysqli_num_rows($query);

                                    $query = mysqli_query($con, "SELECT user_id FROM tbl_user");
                                    $userCount =  mysqli_num_rows($query);

                                    $totalUsers = $companyCount + $userCount;
                                        
                                    $query = mysqli_query($con, "SELECT job_post_id FROM tbl_job_post");
                                    $jobCount =  mysqli_num_rows($query);

                                    echo'
                                      <td class="countDisplay">'. $totalUsers.'</td>
                                      <td class="countDisplay">'. $userCount.'</td>
                                      <td class="countDisplay">'. $companyCount.'</td>
                                      <td class="countDisplay">'. $jobCount.'</td> ';
                                ?>
                            </tr>
                        </table>
                    <br>
                   <!-- Different Data -->

                   <!-- Users Reviews -->
                    <div class="user-dashboard-info-box pb-4">
                    <!-- <div class="col-12 col-lg-6 col-xl-8"> -->
                     <div class="card">
                       <div class="card-header"> <h4>Feedback</h4> </div>
                        
                       
                       <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                            <div class="media align-items-center">
                              <img src="images/avatar/user/nancy.jpg" alt="user avatar" class="customer-img rounded-circle">
                            <div class="media-body ml-3">
                              <h6 class="mb-0">Nancy Thomas<small class="ml-4">08.34 AM</small></h6>
                              <p class="mb-0 small-font">Good !!</p>
                            </div>
<!--
                            <div class="star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star text-warning"></i>
                              <i class="fa fa-star text-warning"></i>
                            </div>
-->
                          </div>
                          </li>
                          <li class="list-group-item">
                            <div class="media align-items-center">
                              <img src="images/avatar/user/avatar-2(Abhilash).jpg" alt="user avatar" class="customer-img rounded-circle">
                            <div class="media-body ml-3">
                              <h6 class="mb-0">Abhilash Maddi <small class="ml-4">05.26 PM</small></h6>
                              <p class="mb-0 small-font">Nice !!!</p>
                            </div>
<!--
                            <div class="star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star text-warning"></i>
                              <i class="fa fa-star text-warning"></i>
                            </div>
-->
                          </div>
                          </li>
<!--
                          <li class="list-group-item">
                            <div class="media align-items-center">
                              <img src="images/avatar/avatar-14.png" alt="user avatar" class="customer-img rounded-circle">
                            <div class="media-body ml-3">
                              <h6 class="mb-0">Mackbook Pro <small class="ml-4">06.45 AM</small></h6>
                              <p class="mb-0 small-font">Jhon Doe : Excllent product and awsome quality</p>
                            </div>
                            <div class="star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star text-warning"></i>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                          </li>
                          <li class="list-group-item">
                            <div class="media align-items-center">
                              <img src="images/avatar/avatar-16.png" alt="user avatar" class="customer-img rounded-circle">
                            <div class="media-body ml-3">
                              <h6 class="mb-0">Air Pod <small class="ml-4">08.34 AM</small></h6>
                              <p class="mb-0 small-font">Christine : The brand apple is original !</p>
                            </div>
                            <div class="star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                          </li>
                          <li class="list-group-item">
                            <div class="media align-items-center">
                              <img src="images/avatar/avatar-17.png" alt="user avatar" class="customer-img rounded-circle">
                            <div class="media-body ml-3">
                              <h6 class="mb-0">Mackbook <small class="ml-4">08.34 AM</small></h6>
                              <p class="mb-0 small-font">Michle : The brand apple is original !</p>
                            </div>
                            <div class="star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                          </li>
-->
                        </ul>
                     </div>
                  </div>
                  <!-- Users Reviews -->


                </div>
              </div>
            </div>
          </div>
        </section>


<!--=================================
dashboard 
map -->
    <script src="js/apexcharts/apexcharts.min.js"></script> 

    <!-- Chart Script-->
    <script>
            var options = {
                chart: {
                    height: 350,
                    type: 'area',
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                    name: 'Job Posted',
                    data: [31, 40, 28, 51, 42, 109, 100]
                }, {
                    name: 'Job Claimed',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }],
                colors: ['#ff8a00', '#001935'],

                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#chart"),
                options
            );

            chart.render();
    </script>

<!-- <script src="js/dashboard-chart.js"></script> -->


<!--=================================
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->


   
  
