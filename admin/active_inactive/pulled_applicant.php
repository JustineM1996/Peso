<?php

include '../database/database.php';

// PULLED APPLICANT
if(isset($_POST['submit'])) {
	
	$id = $_POST['id'];
    $email = $_POST['email'];
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
 
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d h:i:s A');

	$insert_data = "UPDATE applicant SET status = '0',
                                         Status_remove = '1',
                                         Status_hide = '1',
        								 user_notify = '1',
        								 user_hide = '1',
                                         admin_notify = '0',
                                         admin_hide = '0',
        								 admin_pulled_date = '$date'  WHERE id = '$id'";

$data_check = mysqli_query($con, $insert_data);

if ($data_check) {

$subject = "Job application";
$message = "$job_title - $company

                Thank you for applying for our job opening. We are glad to tell you that your job application is finally pulled.

                Please wait for further emails or text messages regarding your application. Best of luck, future employee.
                
                We wish you success in your chosen career.";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull pulled')</script>";
   echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 

}


?>