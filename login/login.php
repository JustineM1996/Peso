<?php 

session_start();

require "../database/database.php";

$email = "";
$password = "";
$errors = array();


//if user click login button
if(isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_SESSION['email'] = $_POST['email']);

//login attempts - 1
$timer = time() - 40;

    //i ccount yung email kung ilan na ang pumasok sa database | account_attempts
    $login_attempts = mysqli_query($con,"SELECT count(*) as total_count, login_time FROM account_attempts WHERE email = '$email' and login_time > '$timer' order by login_time desc ");
    $res = mysqli_fetch_assoc($login_attempts);
    $count = $res['total_count'];
    $login_time = $res['login_time'];

    //Count Attempts - 01
    if ($count == 3) {

    $msg = "Please try again after 30 seconds";

    If ($timer > $login_time){
        echo "<script> SDSD </script>";
    }

    } else {
        
        $email = mysqli_real_escape_string($con, $_SESSION['email'] = $_POST['email']);
        $password = mysqli_real_escape_string($con, $_SESSION['password'] = $_POST['password']);

        $check_email = "SELECT * FROM account WHERE email = '$email' ";
        $res = mysqli_query($con, $check_email);

        if (mysqli_num_rows($res) > 0) {

            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];

            $status = $fetch['status'];
            $email_code = $fetch['email_code'];

            if (password_verify($password, $fetch_pass)) {

                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                
                if ($status == 'verified') {

                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    $email = $fetch['email'];
                    $account_id = $fetch['id'];

                    date_default_timezone_set('Asia/Manila');
                    $login_date = date('Y-m-d');
                    $login_time = date('h:i:s');
                    $report = "INSERT INTO account_report SET account_id = '$account_id',
                                                              email = '$email', 
                                                              login_time = '$login_time',
                                                              login_date = '$login_date' ";
                    $account = mysqli_query($con, $report);

                  if($fetch['user_type'] == 'admin') {

                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                        if ($fetch['login_verify'] == '0') {

                               if($fetch['change_code'] == '0') {

                                // account  
                                $email = $fetch['email'];
                                $account_id = $fetch['id'];
                                $attempts = "DELETE FROM account_attempts WHERE account_id = '$account_id' and email = '$email' ";
                                $account = mysqli_query($con, $attempts);

                                $_SESSION['admin'] = $fetch['user_type'];   
                                $_SESSION['id'] = $fetch['id'];
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
                                echo "<script>alert('Successful Login')</script>";
                                echo "<script>window.location = '../admin/index.php'</script>";

                               } else {

                                $_SESSION['admin'] = $fetch['user_type'];   
                                $_SESSION['id'] = $fetch['id'];
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
                                echo "<script>alert('OTP Verification code')</script>";
                                echo "<script>window.location = 'change_code.php'</script>";

                               }

                            } else {

                                $email = $fetch['email'];
                                $account_id = $fetch['id'];
                                $login_verify_code = rand(999999, 111111);

                                $report = "UPDATE account SET login_verify_code = '$login_verify_code' WHERE email = '$email' and id = '$account_id' ";
                                $account = mysqli_query($con, $report);

                                $subject = "Email Verification Code";
                                $message = "Your verification code is $login_verify_code";
                                $sender = "From: pesostamariabulacan@gmail.com";

                                if (mail($email, $subject, $message, $sender)) {

                                    $info = "We've sent a verification code to your email - $email";
                                    $_SESSION['info'] = $info;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['password'] = $password;
                                    echo "<script>alert('verify your account')</script>";
                                    echo "<script>window.location = 'login-verify.php'</script>";  
                                    exit();

                                } else {

                                    $errors['otp-error'] = "Failed while sending code!";

                                }

                            }


                  } else if ($fetch['user_type'] == 'user') {

                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                        if ($fetch['login_verify'] == '0'){

                               if($fetch['change_code'] == '0') {

                                // account  
                                $email = $fetch['email'];
                                $account_id = $fetch['id'];
                                $attempts = "DELETE FROM account_attempts WHERE account_id = '$account_id' and email = '$email' ";
                                $account = mysqli_query($con, $attempts);

                                $_SESSION['user'] = $fetch['user_type'];
                                $_SESSION['id'] = $fetch['id'];
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
                                echo "<script>alert('Successful Login')</script>";
                                echo "<script>window.location = '../user/index.php'</script>";

                               } else {

                                $_SESSION['user'] = $fetch['user_type'];
                                $_SESSION['id'] = $fetch['id'];
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
                                echo "<script>alert('OTP Verification code')</script>";
                                echo "<script>window.location = 'change_code.php'</script>";

                               }

                            } else {
                                
                                $email = $fetch['email'];
                                $account_id = $fetch['id'];
                                $login_verify_code = rand(999999, 111111);

                                $report = "UPDATE account SET login_verify_code = '$login_verify_code' WHERE  email = '$email' and id = '$account_id' ";
                                $account = mysqli_query($con, $report);

                                $subject = "Email Verification Code";
                                $message = "Your verification code is $login_verify_code";
                                $sender = "From: pesostamariabulacan@gmail.com";

                                if (mail($email, $subject, $message, $sender)) {

                                    $info = "We've sent a verification code to your email - $email";
                                    $_SESSION['info'] = $info;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['password'] = $password;
                                    echo "<script>alert('verify your account')</script>";
                                    echo "<script>window.location = 'login-verify.php'</script>";  
                                    exit();

                                } else {

                                    $errors['otp-error'] = "Failed while sending code!";

                                }


                         }


                  }

                } else if ($status == 'notverified') {

                    $_SESSION['email'] = $email;
                    $info = "Continue your registration - $email";
                    $_SESSION['info'] = $info;
                    header('location: signup/signup_b.php');

                } else {

                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: otp-code.php');
                }

        $email = mysqli_real_escape_string($con, $_SESSION['email'] = $_POST['email']);
        
            if ($email_code > 0) {

                $_SESSION['email'] = $email;
                $info = "Continue your registration - $email";
                $_SESSION['info'] = $info;
                header('location: signup/signup-email-code.php');

            } else if ($status == 'notverified') {

                $_SESSION['email'] = $email;
                $info = "Continue your registration - $email";
                $_SESSION['info'] = $info;
                header('location: signup/signup_b.php');

            }

            }  else {

                $errors['email'] = "Incorrect email or password!";

                $count++;
                $remaining_attempts = 3-$count;

                if ($remaining_attempts == 0) {
 
                    $msg = "Please try after 30 seconds";

                } else {

                    $msg = "Please enter valid details. $remaining_attempts attempts remaining.";

                }

                    $email = $fetch['email'];
                    $account_id = $fetch['id'];

                    date_default_timezone_set('Asia/Manila');
                    $login_date = date('h:i:s');
                    $login_time = time();
                    $report = "INSERT INTO account_attempts SET account_id = '$account_id',
                                                                email = '$email',
                                                                login_time = '$login_time',
                                                                login_date = '$login_date' ";
                    $account = mysqli_query($con, $report);

            }


        } else {

            $errors['email'] = "It's look like you're not yet a member! Click signup";

       }
 
   }

}

?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- TITLE -->
  <title> PESO - Login or Signup </title>

</head>

<body>

<?php include 'navbar.php' ?>

<section class="my-0 py-7">

<style type='text/css'>

  a i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  a i:hover {
    background-color: darkgray;
    box-shadow: none ;
    color: black;
  } 

  .card-profile {
    background: none;
    box-shadow: none;
    color: black;
    
  } 

  .card-profile:hover {
    background-color: whitesmoke;
    box-shadow: none;
    color: black;
    transition: 0.2s;
  }

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<!-- FORM START -->
<form action="login.php" method="POST" autocomplete="" class="auth-form login-form">

    <div class="container ">
    <div class="row ms-lg-12">

          <div class="col-lg-2 col-md-5 col-5 position-relative bg-cover px-0" style="background: none;"></div>
          <div class="col-lg-5 col-md-12 col-12" style="background: none">

                <div class="card-body">
                <div class="row">

                <a class="col-lg-1" href='../index.php' style="text-decoration: none;">
                    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
                </a>

                    <h3 class="mt-2"> P E S O </h3>
                    <h4 class="mt-3"> Login </h4>

                    <?php if(count($errors) > 0) { ?>

                        <div class="alert alert-danger text-center" style="background: none; border: none; box-shadow: none;">
                            <?php foreach ($errors as $showerror) {
                                           echo $showerror; } ?>
                        </div>

                    <?php } ?>

                    <div class="mt-2">

                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Email 
                        <div class="form-label-group">
                          <input type="email" name="email" class="form-control shadow-none" placeholder="Enter your email"
                                 style="color: black; font-size: 13PX;" required>
                        </div>
                    </p>

                     <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Password 
                        <div class="input-group">
                          <input type="password" name="password" id="old_password" 
                                 class="form-control shadow-none mt-2 old_password" placeholder="Enter your password" style="color: black; font-size: 13PX;" required>
                            <span class="input-group-text mt-2">     
                              <i class="far fa-eye" id="toggle_old_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                            </span> 
                        </div>
                    </p>

                    </div>  

                    <script>
                        // Show current password
                        const toggle_old_password = document.querySelector('#toggle_old_password');
                        const old_password = document.querySelector('#old_password');

                        toggle_old_password.addEventListener('click', function (e) {
                        const type = old_password.getAttribute('type') === 'password' ? 'text' : 'password';
                        old_password.setAttribute('type', type);
                        this.classList.toggle('fa-eye-slash');
                        });
                    </script>

                    </div>

                    <div class="alert alert-danger text-center" style="background: none; border: none; box-shadow: none;"> <?php if(!empty($msg)) { echo "$msg";  } ?></div>

                    <button type="submit" name="login" value="login" id="login" class="btn btn-success" style="font-size: 13px"> Login </button>   

                      <div style="float: right;">
                          <a href='forgot-password.php' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                             <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Forgot password 
                              <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                            </h5> 
                          </a>
                      </div>

                      <div class="text-sm ms-lg-7 ms-7 mb-2" style="text-align: center;"> Don't have an account? </div>

                      <div style="text-align: center;">
                          <a href='signup/signup.php' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                             <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Sign Up now 
                              <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                            </h5> 
                          </a>
                      </div>
                  </div>
              </div>
      </div>
    </div>
    
</form>

</section>

    
</body>
</html> 
