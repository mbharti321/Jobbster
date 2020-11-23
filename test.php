<?php
    include("Connect.php");
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
        $user_email_id = $row1['email_id'];
        $user_name = $row1['name'];
    }
    else 
    {
        header("Location: signin_candidate.php");
        exit();
    }
    ?>
<?php
include "Connect.php";
if(isset($_POST) && isset($_POST['tsid']) )
  {
       $tsid = $_POST['tsid'];
       $correct = 0;
       $answer1 = $_POST['answer1'];
       $selected1 = $_POST['selected1'];
      
      if($answer1 == $selected1)
      {
        $correct = $correct + 1;
      }
      $answer2 = $_POST['answer2'];
      $selected2 = $_POST['selected2'];
      if($answer2 == $selected2)
      {
        $correct = $correct + 1;
      }

      $answer3 = $_POST['answer3'];
      $selected3 = $_POST['selected3'];
        if($answer3 == $selected3)
      {
        $correct = $correct + 1;
      }
      $answer4 = $_POST['answer4'];
      $selected4 = $_POST['selected4'];
        if($answer4 == $selected4)
      {
        $correct = $correct + 1;
      }
      $answer5 = $_POST['answer5'];
      $selected5 = $_POST['selected5'];
        if($answer5 == $selected5)
      {
        $correct = $correct + 1;
      }
      $answer6 = $_POST['answer6'];
      $selected6 = $_POST['selected6'];
        if($answer6 == $selected6)
      {
        $correct = $correct + 1;
      }
      $answer7= $_POST['answer7'];
      $selected7 = $_POST['selected7'];
        if($answer7 == $selected7)
      {
        $correct = $correct + 1;
      }
      $answer8 = $_POST['answer8'];
      $selected8 = $_POST['selected8'];
        if($answer8 == $selected8)
      {
        $correct = $correct + 1;
      }
      $answer9 = $_POST['answer9'];
      $selected9 = $_POST['selected9'];
      if($answer9 == $selected9)
      {
        $correct = $correct + 1;
      }
      $answer10 = $_POST['answer10'];
      $selected10 = $_POST['selected10'];
       if($answer10 == $selected10)
      {
        $correct = $correct + 1;
      }
     if($correct > 5 )
     {
      $result = "PASS";
     }
     else
     {
      $result = "FAIL";
     }
     echo "CORRECT -->" . $correct;
      $date = date("Y-m-d");
      
      //insert in Test Conducted Table

      $insert = "insert into test_conducted (tsid,test_date,test_obtain_marks,test_total_marks,test_result) values(".$tsid.",'".$date."',".$correct.",10,'".$result."')";

      echo $insert;    
      if(mysqli_query($con,$insert))
      {
        echo " Test Conducted...!";
      }
      else
      {
        echo " Failed To Conduct Test...!";
        echo("Error description: " . $con -> error);
      }
    }
mysqli_close($con);
?>
<script>
 function CountDown(duration) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $('#countdown').html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#countdown').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
$(document).ready(function() {
          CountDown(600);
          setTimeout(function(){

             var tsid = $("#tsid").val();
             var answer1 = $("#answer1").attr('value');
             var selected1 = $("input[name='options1']:checked").attr('id');
             var answer2 = $("#answer2").val();
             var selected2 = $("input[name='options2']:checked").attr('id');
             var answer3 = $("#answer3").val();
             var selected3 = $("input[name='options3']:checked").attr('id');
             var answer4 = $("#answer4").val();
             var selected4 = $("input[name='options4']:checked").attr('id');
             var answer5 = $("#answer5").val();
             var selected5 = $("input[name='options5']:checked").attr('id');
             var answer6 = $("#answer6").val();
             var selected6 = $("input[name='options6']:checked").attr('id');
             var answer7 = $("#answer7").val();
             var selected7 = $("input[name='options7']:checked").attr('id');
             var answer8 = $("#answer8").val();
             var selected8 = $("input[name='options8']:checked").attr('id');
             var answer9 = $("#answer9").val();
             var selected9 = $("input[name='options9']:checked").attr('id');
             var answer10 = $("#answer10").val();
             var selected10 = $("input[name='options10']:checked").attr('id');

              $.ajax({

                url:"test.php",
                type:"POST",
                data:{
                    tsid:tsid,
                    answer1 : answer1,
                    selected1 : selected1,
                     answer2 : answer2,
                    selected2 : selected2,
                     answer3 : answer3,
                    selected3 : selected3,
                     answer4: answer4,
                    selected4 : selected4,
                     answer5 : answer5,
                    selected5 : selected5,
                     answer6 : answer6,
                    selected6 : selected6,
                     answer7 : answer7,
                    selected7 : selected7,
                     answer8 : answer8,
                    selected8 : selected8,
                     answer9 : answer9,
                    selected9 : selected9,
                     answer10 : answer10,
                    selected10 : selected10

                },
                success:function(data)
                {
//                  window.location.href = 'profile_candidate.php';
                      swal({
                    title: "Test Submited Succesfully",
                    text: "Kindly please check your mail to get your result..!",
                    icon: "success",
                  }).then(function() {
                    window.location = "profile_candidate.php";
                });

                     
                }
              });                  
             

            },600000);

            $(window).blur(function() {
              
                    swal({
                    title: "Test Failed",
                    text: "You Navigated so test will end in 10 seconds..!",
                    icon: "error",
                  });

                    setTimeout(function(){ window.location.href = 'profile_candidate.php'; },10000);

          });
        });

function testsubmit()
{
             var tsid = $("#tsid").val();
             var answer1 = $("#answer1").attr('value');
             var selected1 = $("input[name='options1']:checked").attr('id');
             var answer2 = $("#answer2").val();
             var selected2 = $("input[name='options2']:checked").attr('id');
             var answer3 = $("#answer3").val();
             var selected3 = $("input[name='options3']:checked").attr('id');
             var answer4 = $("#answer4").val();
             var selected4 = $("input[name='options4']:checked").attr('id');
             var answer5 = $("#answer5").val();
             var selected5 = $("input[name='options5']:checked").attr('id');
             var answer6 = $("#answer6").val();
             var selected6 = $("input[name='options6']:checked").attr('id');
             var answer7 = $("#answer7").val();
             var selected7 = $("input[name='options7']:checked").attr('id');
             var answer8 = $("#answer8").val();
             var selected8 = $("input[name='options8']:checked").attr('id');
             var answer9 = $("#answer9").val();
             var selected9 = $("input[name='options9']:checked").attr('id');
             var answer10 = $("#answer10").val();
             var selected10 = $("input[name='options10']:checked").attr('id');

              $.ajax({

                url:"test.php",
                type:"POST",
                data:{                    
                    tsid:tsid,
                    answer1 : answer1,
                    selected1 : selected1,
                     answer2 : answer2,
                    selected2 : selected2,
                     answer3 : answer3,
                    selected3 : selected3,
                     answer4: answer4,
                    selected4 : selected4,
                     answer5 : answer5,
                    selected5 : selected5,
                     answer6 : answer6,
                    selected6 : selected6,
                     answer7 : answer7,
                    selected7 : selected7,
                     answer8 : answer8,
                    selected8 : selected8,
                     answer9 : answer9,
                    selected9 : selected9,
                     answer10 : answer10,
                    selected10 : selected10

                },
                success:function(data)
                {
                  
                  window.location.href = 'profile_candidate.php';


                        swal({
                    title: "Test Submited Succesfully",
                    text: "Kindly please check your result..!",
                    icon: "success",
                  }).then(function() {
                    window.location = "profile_candidate.php";
                });
                     
                }
              });                  
}
</script>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>

<!--=================================
header -->
<?php include "header.php"; ?>
<!--=================================
header -->

 <!-- End banner Area -->  
<!--    <section class="space-ptb bg-light">-->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
              <br><br><br>
            <div class="section-title text-center">
              <h1 class="text-primary">Jobbster</h1>
              <h3 class="text-primary">Test</h3>
            </div>
          </div>
        </div>
      </div>
<!--    </section>-->
<!-- End banner Area -->  
      <!-- Test Area -->
     <section class="post-area section-gap" id="test">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
              <div class="col-md-6">
                 <div id="countdown" style="  font-size: 2.5em;text-align: center; color: black;font-weight: bold;">
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <br>
          <br>
        <?php
                $tsid=0;
                if(isset($_REQUEST) && isset($_REQUEST['tsid']))
                {
                    $tsid = $_REQUEST['tsid'];
//                        echo $tsid;
                }
        ?>
            <input type="hidden" id="tsid" value="<?php echo $tsid;?>">
                        
          <?php
        		 
        		 $getskills = mysqli_query($con,"select * from test_scheduled ts , tbl_job_post j  where ts.job_post_id = j.job_post_id and ts.tsid = $tsid");
        		 	$skills = "";
                      while($result = mysqli_fetch_array($getskills))
                      {
                        $skills = $result['skill_id'];
                       
                      }
                      $skills_ids = explode(',',$skills);
                      $skill1 = $skills_ids[0];
//                      $skill2 = $skills_ids[1];
                      $counter = 0;
                      
                      
                      //skill 1 -> 5 questions
                 	 $getTestData = mysqli_query($con,"select * from question_answers qa,tbl_skill ts where qa.skill_id = ts.skill_id and qa.skill_id = $skills and qa.is_delete = 0 and qa.is_active = 1 LIMIT 10");
                     while($result = mysqli_fetch_array($getTestData))
                      {
                      	$counter = $counter + 1;
                      	
                      	?>
                          <div class="row">
                      	<table>
                      		<tr>
                      			<td><h3 class="question"><?php echo $counter;?>. <?php echo $result['question'];?></h3></td>
                      		</tr>
                      	</table>
                      	<div class="clearfix"></div>
                      </div>
                        <div class="row">
                      	<table>

                      		<tr>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' style="margin-bottom: 2px; padding:10px 30px;" name='options<?php echo $counter;?>' id='1' value=" <?php echo $result['option1'];?>">  <?php echo $result['option1'];?>
                                    </label>
                                  </div>
                                </row>
                              </div>
                                  </td>
                          
                      			<td>
                               <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                                 <row>
                                   <div class="col-lg-6">
                                    <label class="btn btn-primary"> 
                                      <input type='radio' style="margin-bottom: 2px;padding:10px 30px;" name='options<?php echo $counter;?>' id='2' value=" <?php echo $result['option2'];?>">  <?php echo $result['option2'];?>
                                    </label>
                                  </div>
                                </row>
                              </div>
                          </td>
                      		</tr>
                      		<tr>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons" style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' style="margin-bottom: 2px;padding:10px 30px;"  name='options<?php echo $counter;?>' id='3' value = " <?php echo $result['option3'];?>">  <?php echo $result['option3'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                      			<td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' style="margin-bottom: 2px;padding:10px 30px;" name='options<?php echo $counter;?>' id='4' value = " <?php echo $result['option4'];?>">  <?php echo $result['option4'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                             <input type="hidden" id="answer<?php echo $counter;?>" value="<?php echo $result['answer'];?>" >
                      		</tr>
                      	</table>
                      </div>
                        <div class="clearfix"></div>
                      	<?php 

                      }
                  //skill 2 -> 5 questions
//                   $getTestData = mysqli_query($con,"select * from question_answers qa,tbl_skill ts where qa.skill_id = ts.skill_id and qa.skill_id = $skill2 and qa.is_delete = 0 and qa.is_active = 1  LIMIT 5");
//                   $counter=5;
//                          while($result = mysqli_fetch_array($getTestData))
//                      {
//                        $counter = $counter + 1;
                        
                        ?>
<!--
                          <div class="row">
                        <table>
                          <tr>
                            <td><h1 class="question"><?php echo $counter;?>. <?php echo $result['question'];?></h1></td>
                          </tr>
                        </table>
                        <div class="clearfix"></div>
                      </div>
-->
<!--
                        <div class="row">
                        <table>

                          <tr>
                            <td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' name='options<?php echo $counter;?>' id='1' value=" <?php echo $result['option1'];?>">  <?php echo $result['option1'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                            <td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' name='options<?php echo $counter;?>' id='2' value=" <?php echo $result['option2'];?>">  <?php echo $result['option2'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' name='options<?php echo $counter;?>' id='3' value = " <?php echo $result['option3'];?>">  <?php echo $result['option3'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                          </td>
                            <td>
                              <div class="btn-group-lg btn-group" data-toggle="buttons"  style="margin-bottom: 5px;">
                               <row>
                                 <div class="col-lg-6">
                                  <label class="btn btn-primary">
                                    <input type='radio' name='options<?php echo $counter;?>' id='4' value = " <?php echo $result['option4'];?>">  <?php echo $result['option4'];?>
                                  </label>
                                </div>
                              </row>
                            </div>
                                  </td>
                             <input type="hidden" id="answer<?php echo $counter;?>" value="<?php echo $result['answer'];?>" >
                          </tr>
                        </table>
                      </div>
-->
                        <div class="clearfix"></div>
                        <?php 

//                      }
                
                      ?>

                      <center>
                          <input type="button" class="btn btn-lg btn-primary" id="Submit" value="Submit" onclick="testsubmit();">
                      </center>

        </div>
    </section>
    
<!--=================================
footer -->
<footer class="footer mt-2 mt-md-5 pt-0">
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


    <!-- map -->
    <script src="js/apexcharts/apexcharts.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>
    

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
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
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
      <script src="js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="js/vendor/bootstrap.min.js"></script>      
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="js/easing.min.js"></script>      
      <script src="js/hoverIntent.js"></script>
      <script src="js/superfish.min.js"></script> 
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script>      
      <script src="js/jquery.sticky.js"></script>
      <script src="js/jquery.nice-select.min.js"></script> 
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>      
      <script src="js/parallax.min.js"></script>    
      <script src="js/mail-script.js"></script> 
      <script src="js/main.js"></script>  
      <script src="js/test.js"></script>  
      <script type="text/javascript">  </script>
</body>
</html>
