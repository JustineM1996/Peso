<?php

include '../../database/database.php';

// REJECT APPLICANT
if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
 
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d h:i:s A');

    $insert_data = "UPDATE applicant SET Status_remove = '0',
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

                We appreciate your interest in the job position we have opened. We carefully considered your qualifications; however, 
                we feel that there are other applicants who are more closely matched to the needs of the company at this moment.

                We value the time you invested in applying for the job and your interest in the position. Please don't hesitate to apply when we have other job openings in the future.
                
                Again, thank you for considering us as a potential employer. We wish you luck as you pursue your chosen career.";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull remove')</script>";
   echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 

}



// DELETE APPLICANT
if(isset($_GET['delete'])){

$id = $_GET['delete'];

    mysqli_query($con,"DELETE FROM applicant WHERE id = '$id'");

    echo "<script>alert('Successfull delete')</script>";
    echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 

}

?>



