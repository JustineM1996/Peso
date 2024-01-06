<?php

include '../../database/database.php';

if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];

    $insert_data = "UPDATE account SET status = 'deactivated' WHERE id = '$id'";

$data_check = mysqli_query($con, $insert_data);

if ($data_check) {

$subject = "PESO Sta. Maria Account";

$message = "Good day! We would like to inform your that your account got deactivated by the admin.

                To avoid account deactivation please be cautious of the following stated below:

                    1.  Upload appropriate files (e.g., profile picture, personal resume, peso resume)
                    2.  Be active. Do not leave your account unattended.
                    3.  Do not apply for job vacancies that does not qualifies you.

            If you want to appeal for your account’s deactivation, please send an email to pesostamariabulacan@gmail.com and state the reasons why we should activate your account. 

            Please be reminded that if you will not file an appeal within 7 days upon receiving this email, the admin will delete your account permanently.
            We are looking forward to not face the same struggle in the future. Thank you.";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull deactivated')</script>";
   echo "<script>window.location = '/peso/admin/account.php'</script>"; 

    }
?>

