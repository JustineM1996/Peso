<?php

include '../database/database.php';

if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];

    $insert_data = "UPDATE account SET status = 'deactivated',
                                       user_type = 'user',
                                       status_account = '0' WHERE id = '$id'";

$data_check = mysqli_query($con, $insert_data);

if ($data_check) {

$subject = "PESO Sta. Maria Bulacan - Main Admin";
$message = "Good day! We would like to inform you that your account is no longer a main admin.

                We appreciate the time and effort you invested in working with us and We thank you for considering us to be a part of your journey.
                We wish you success in your future opportunities.
            
                If you wish to activate your account as a job seeker, please us an email at pesostamariabulacan@gmail.com.
                Please be reminded that after 7 days of no inquiry upon receiving this email will result to permanently account deletion.";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull remove as main admin')</script>";
   echo "<script>window.location = '/peso/admin/account.php'</script>"; 

    }
?>