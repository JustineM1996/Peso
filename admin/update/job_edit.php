<?php 

include '../../database/database.php';

if (isset($_POST['submit'])) {

mysqli_query($con,"UPDATE job SET 

	id = '" .  $_POST['id'] . "',	
	job_title = '" .  $_POST['job_title'] . "', 
	job_salary = '" . $_POST['job_salary'] . "' ,	
	job_type = '" . $_POST['job_type'] . "' ,
	job_day = '" . $_POST['job_day'] . "' ,
	job_category = '" . $_POST['job_category'] . "' ,
	job_option = '" . $_POST['job_option'] . "' ,
	job_gender = '" . $_POST['job_gender'] . "' ,
	job_schedule = '" . $_POST['job_schedule'] . "' ,
	job_schedule_shift = '" . $_POST['job_schedule_shift'] . "' ,
	job_schedule_shift = '" . $_POST['job_schedule_shift'] . "' ,
	
	job_description = '" . $_POST['job_description'] . "' ,
	job_requirements = '" . $_POST['job_requirements'] . "' ,

	date_ended = '" . $_POST['date_ended'] . "' 

	WHERE id = '" . $_POST['id'] . "'");


}

   echo "<script> alert('Successfull update') </script>";
   echo "<script> window.location = '/peso/admin/job.php' </script>"; 

?>

