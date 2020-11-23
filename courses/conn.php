<?php
$servername="localhost";
$username="root";
$password="";
$co_name="jobportal";
$con=mysqli_connect($servername,$username,$password,$co_name);
if(mysqli_connect_errno())
{
	echo "failed to connect to mysql:" .mysqli_connect_error();
}
?>