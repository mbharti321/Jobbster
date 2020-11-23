function search()
{

	var city =  $("#city"). val();
	var title =  $("#job_title"). val();
	if(city != "")
	{
		if(title == "")
		{
			$(location).attr('href', 'job_listing.php?city='+city);			

		}
		else
		{
			$(location).attr('href', 'job_listing.php?city='+city+'&title='+title);
		}
	
	}
	else
	{      	
       swal({
		  title: "Invalid Request",
		  text: "Please Select City",
		  icon: "error",
		});
                               
	}

}
