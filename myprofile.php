<?php
include("Connect.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['loggedin_as_Company']) && $_SESSION['loggedin_as_Company'] == true) 
{
    header("Location: company_profile.php");
    exit();
}
else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    header("Location: profile_candidate.php");
    exit();
}
else 
{
    header("Location: signin_candidate.php");
    exit();
}
?>
