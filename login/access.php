<?php 


session_start();

require "../database/database.php";

$email = "";
$password = "";
$errors = array();

//if user click verification code submit button
if (isset($_POST['check'])) {

        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM account WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);

        if (mysqli_num_rows($code_res) > 0) {

            $fetch_data = mysqli_fetch_assoc($code_res);

            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $phone_code = 0;
            $status = 'verified';
            $update_otp = "UPDATE account SET code = '$code', 
                                              status = '$status', 
                                              phone_code = '$phone_code' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);

            if ($update_res) {

                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                  if($fetch_data['user_type'] == 'admin') {
                            $_SESSION['admin'] = $fetch_data['user_type'];   
                            $_SESSION['id'] = $fetch_data['id'];
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            echo "<script>alert('Successful Login')</script>";
                            echo "<script>window.location = '../admin/index.php'</script>";

                  } elseif ($fetch_data['user_type'] == 'user') {
                            $_SESSION['user'] = $fetch_data['user_type'];
                            $_SESSION['id'] = $fetch_data['id'];
                            $_SESSION['email'] = $email;    
                            $_SESSION['password'] = $password;     
                            echo "<script>alert('Successful Login')</script>";
                            echo "<script>window.location = '../user/index.php'</script>";

                  }  

            } else {

                $errors['otp-error'] = "Failed while updating code!";

            }

        } else {

            $errors['otp-error'] = "You've entered incorrect code!";

        }

}

//if user click continue button in forgot password form
if(isset($_POST['check-email'])) {

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM account WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);

        if (mysqli_num_rows($run_sql) > 0) {

            $code = rand(999999, 111111);
            $insert_code = "UPDATE account SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);

            if ($run_query) {

                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: pesostamariabulacan@gmail.com";

                if(mail($email, $subject, $message, $sender)) {

                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();

                } else {

                    $errors['otp-error'] = "Failed while sending code!";
                }

            } else {

                $errors['db-error'] = "Something went wrong!";
            }

        } else {

            $errors['email'] = "This email address does not exist!";
    }


}


//if user click check reset otp button
if(isset($_POST['check-reset-otp'])) {

        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM account WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);

        if(mysqli_num_rows($code_res) > 0) {

            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();

        } else {

            $errors['otp-error'] = "You've entered incorrect code!";
    }


}







$id = "";
$email = "";
$old_password = "";
$new_password = "";
$com_password = "";
$old_password_errors = array();
$new_password_errors = array();
$com_password_errors = array();

if (isset($_POST['change-password'])) {

    $email = $_SESSION['email']; 
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];    
    $com_password = $_POST['com_password'];

        $check_old_password = "SELECT * FROM account WHERE email = '$email' ";
        $old_pass = mysqli_query($con, $check_old_password);

        if (mysqli_num_rows($old_pass) > 0) {
           
            $fetch = mysqli_fetch_assoc($old_pass);
            $fetch_pass = $fetch['password'];

              // CHECK IF OLD PASSWORD IS CORRECT
              if (password_verify($old_password, $fetch_pass)) {
              } else {
                $old_password_errors['old_password'] = "Current password is incorrect.";
              }

              // CHECK OLD AND NEW PASSWORD IS SAME
              if ($old_password == $new_password) {
                  $new_password_errors['old_password, new_password'] = "Current password and New password is same.";
              } 

              // CHECK NEW COMFIRM 8 OR MORE
              if ($new_password < 8) {
              } else {
                  $new_password_errors['new_password'] = "Use 8 or more characters! Example(12@Sample).";
              }

              // CHECK NEW AND COMFIRM PASSWOR IS MATCH
              if ($new_password == $com_password) {
              } else {
                  $com_password_errors['new_password, com_password'] = "Confirm password not matched.";
              }

          } 

        // IF NO ERROR UPDATE THE NEW PASSWORD AND LOGIN AGAIN
        if (count($old_password_errors) === 0) {
          if (count($new_password_errors) === 0) {
            if (count($com_password_errors) === 0) {


                $code = 0;
                $new_password_encpass = password_hash($new_password, PASSWORD_BCRYPT);
                $insert_data = "UPDATE account SET code = '$code',
                                                   password = '$new_password_encpass' WHERE email = '$email'";
                $data_check = mysqli_query($con, $insert_data);



            if ($data_check) {

                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: changed-password.php');

            } else {

                $old_password_errors['db-error'] = "Failed to change your password!";
            }



              }
            }
          }


       }



//if login now button click
if(isset($_POST['login-now'])){
        header('Location: login.php');
    }


?>