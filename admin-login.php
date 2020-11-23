<?php
	
	if(!isset($_SESSION['userLoggedIn'])) {//if session is not started yet
        session_start();//starting session
    }
	session_destroy();

	
	include("includes/config.php");

	include("includes/classes/admin-Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/admin-login-handler.php");

	//if logoutButton clicked
	if(isset($_POST['logoutButton'])) {
      // echo "<h1> hi,logout button clicked</h1>";
         session_destroy();//destroy the session
        // header("Location: login.php");
    }

	function getInputValue($value){
		if(isset($_POST[$value])){
			echo "$_POST[$value]";
		}
	}
?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <!-- <meta name="keywords" content="HTML5 Template" /> -->
    <meta name="description" content="Jobbster - Job Portal" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jobbster - Admin</title>

    <!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- map -->
    <link rel="stylesheet" href="css/apexcharts/apexcharts.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="css/admin-style.css" />

</head>

<body>

<!--=================================
ADmin Nav -->
<header class="header header-transparent">
  <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
    <div class="container-fluid">
      <button id="nav-icon4" type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
          <span></span>
          <span></span>
          <span></span>

      </button>
<!-- 
      <a class="navbar-brand" href="admin-index.php">
        <img class="img-fluid" src="images/logo.svg" alt="logo">
      </a> -->
      <a class="navbar-brand" href="admin-index.php">
       <h2 style="color:white;">Jobbster</h2>
      </a>

      <div class="navbar-collapse collapse justify-content-start">
        <ul class="nav navbar-nav">

          <li >
            
<!--
            <a class="nav-link" href="admin-index.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
            <a class="nav-link" href="admin-manage-company.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Company</a>
            <a class="nav-link" href="admin-manage-candidates.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Candidates</a>
            <a class="nav-link" href="admin-manage-jobs.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Jobs</a>
            <a class="nav-link" href="admin-go-to-main-website.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Go to Website</a>
-->
            <!-- <a class="nav-link" href="admin-index.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Add Fields</a> -->
            <!-- <a class="nav-link" href="admin-index.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Services</a> -->
           
          </li>

     
        
        </ul>
<!--
          
        <div class="add-listing"  >
           
            <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              More <i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="admin-my-profile.php">My Profile</a></li>
                 <form id="adminHeader" action="admin-login.php" method="POST">
              <li><button type="submit" class="dropdown-item" name="logoutButton">Log Out</button></li>
                </form>
            </ul>
          </div>
       
            <div class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-user pr-2"></i> More <i class="fas fa-chevron-down fa-xs"></i></a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="admin-my-profile.php">My Profile</a></li>
                    <form id="adminHeader" action="admin-login.php" method="POST">
                      <li><button type="submit" name="logoutButton">Log Out</button></li>
                    </form>
                  </ul>
            </div>
        </div>
-->
      </div>
      </div>
  </nav>
</header>

<!--=================================
main container padding from header -->

<div style="padding-top: 82px;"> </div>
<!-- <div class="header-inner bg-light"> </div> -->

<!--=================================
main container padding from header -->



<?php //include("admin-navigation.php"); ?>
<!--=================================
admin Nav -->







<section class="space-ptb">
  <div class="container">
    <!-- <div class="row"> -->
      <div class="col-md-12">
        <div class="user-dashboard-info-box">
		    <!-- <div class="col-md-7 col-sm-5 d-flex align-items-center"> -->
		    	
		    	<form id="loginForm" action="admin-login.php" method="POST">
		          <div class="loginForm">
			          <div class="section-title-02 mb-0 ">
			            <h4 >Login To Your admin-Account</h4>
			          </div>

			          <h2></h2>
			          <br>
						<p>
							<div style="display: block; margin-bottom: 10px;">
								<?php echo $account->getError(Constants::$loginFailed); ?>
							</div>
							<label for="loginUsername">Username: </label>
							<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
						</p>
						<p>
							<label for="loginPassword">Password: </label>
							<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
						</p>

						<button type="submit" name="loginButton">LOG IN</button>
					</div>
				</form>

		    <!-- </div> -->
    	</div>
   	  </div>
   	<!-- </div> -->
  </div>
</section>


<!--=================================
footer -->
<?php include("admin-footer.php"); ?>
<!--=================================
footer -->



