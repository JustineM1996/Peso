<?php

include '../../database/database.php';

if(isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $date = date('Y-m-d');

    $code = rand(999999, 111111);
    $insert_data = "UPDATE account SET status_account = '1', 
                                       user_type = 'admin',
                                       code = '$code',
                                       date_add_main_admin = '$date' WHERE id = '$id'";

$data_check = mysqli_query($con, $insert_data);

if ($data_check) {

$subject = "PESO Sta. Maria Bulacan - Main Admin";
$message = "Congratulations! Your account got chosen to be a Main Admin”. 

                You can now do the following stated below:

                    1.  Post Companies
                    2.  Post Job vacancies
                    3.  Post Announcements
                    4.  Pull or reject job applicants

                We are looking forward to achieve future goals with you. If you have any questions in mind, 
                feel free to send us an email at pesostamariabulacan@gmail.com.

                Again, congratulations! Do your best and God will do the rest.

                Your OTP - $code and reset password";

$sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;

            } 

       } 

   echo "<script>alert('Successfull add main admin')</script>";
   echo "<script>window.location = '/peso/admin/account.php'</script>"; 

    }
?>

