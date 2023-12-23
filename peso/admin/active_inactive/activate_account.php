<?php

include '../database/database.php';

if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];

    $code = rand(999999, 111111);
    $insert_data = "UPDATE account SET status = 'verified', 
                                       code = '$code' WHERE id = '$id'";

$data_check = mysqli_query($con, $insert_data);

if ($data_check) {

$subject = "PESO Sta. Maria Account";
$message = "Good day! We would like to inform your that your account is now activated. 
            
                You can now search and apply for a job that best suits you. 
                
                Please do not forget to be cautious of the following stated below to avoid account deactivation:

                    1.  Upload appropriate files (e.g., profile picture, personal resume, peso resume)
                    2.  Be active. Do not leave your account unattended.
                    3.  Do not apply for job vacancies that does not qualifies you.

                We wish you success in your journey, future employee.

                If you have any questions in mind, feel free to send us an email at pesostamariabulacan@gmail.com.

                Your OTP - $code and reset password";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull activated')</script>";
   echo "<script>window.location = '/peso/admin/account.php'</script>"; 

    }
?>