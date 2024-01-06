<?php 

require "../database/database.php";

session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$errors = array();

//if user click verification code submit button
if (isset($_POST['submit'])) {

        $login_verify_code = mysqli_real_escape_string($con, $_POST['login_verify_code']);
        $check_code = "SELECT * FROM account WHERE login_verify_code = '$login_verify_code'  ";
        $code_res = mysqli_query($con, $check_code);

        if (mysqli_num_rows($code_res) > 0) {

            $fetch_data = mysqli_fetch_assoc($code_res);

            $fetch_code = $fetch_data['login_verify_code'];
            $email = $fetch_data['email'];
            $login_verify_code = 0;
            $update_otp = "UPDATE account SET login_verify_code = '$login_verify_code' WHERE login_verify_code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);

            if ($update_res) {

                $_SESSION['email'] = $email;

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


//if user signup button
if(isset($_REQUEST['reset'])) {

$email = $_REQUEST['reset'];

    $email_check = "SELECT * FROM account WHERE email = '$email' ";
    $code_res = mysqli_query($con, $email_check);

    if ($code_res) {

        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];

        $login_verify_code = rand(999999, 111111);
        $update_data = "UPDATE account SET login_verify_code = '$login_verify_code' WHERE email = '$email' ";
        $data_check = mysqli_query($con, $update_data);

        if ($data_check) {

            $subject = "Email Verification Code";
            $message = "Your verification code is $login_verify_code";
            $sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $login_verify_code";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo "<script>alert('Successful reset OTP')</script>";
                echo "<script>window.location = 'login-verify.php'</script>";
                exit();

            } else {

                $errors['otp-error'] = "Failed while sending code!";

            }

        } else {

            $errors['db-error'] = "Failed while inserting data into database!";
        }


    }

}


?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - OTP </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

</head>

<body>

<?php include "navbar.php"; ?>

<div class="page-header align-items-start min-vh-100">

    <div class="container my-auto">
      <div class="row">

        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom" style="background: none; border: none; box-shadow: none;">

            <!-- start -->
            <div class="card-body">

                    <h3 class=""> P E S O </h3>
                    <h4 class="mt-3"> OTP Verification </h4>

            <form action="login-verify.php" method="POST" autocomplete="" class="auth-form login-form mt-5">

                    <div class="alert alert-success text-center" style="background: none; border: none; box-shadow: none; padding: 3px 2px"> <?php echo $_SESSION['email']; ?></div>

                    <?php if(count($errors) > 0) { ?>

                        <div class="alert alert-danger text-center" style="background: none; border: none; box-shadow: none; padding: 3px 2px">
                            <?php foreach ($errors as $showerror){
                                          echo $showerror; } ?>
                        </div>

                    <?php } ?>

                    <div style="margin-top: 5%">

                        <div style="text-align: right;">

                        </div>

                        <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Enter OTP sent to your email. 
                            <div class="form-label-group">
                              <input type="tel" name="login_verify_code" class="form-control shadow-none" maxlength="6" placeholder="Enter 6 digit OTP" 
                                     onkeypress="return onlyNumberKey(event)" style="color: black; font-size: 13PX;" required>
                                     <span id="timer" style="color: black; text-align: left; font-size: 13PX; float: right;">
                                          <a href='login-verify.php?reset=<?php echo $email;?>' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                                             <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Reset OTP 
                                              <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-md-3'></i>
                                            </h5> 
                                          </a>
                                     </span>
                            </div>
                        </p>

                          <!-- NUMBER ONLY -->
                          <script>
                              function onlyNumberKey(evt) {
                                  // Only ASCII character in that range allowed
                                  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                      return false;
                                  return true;
                              }
                          </script>

                        <div class="mt-6">
                        <button type="submit" name="submit" class="btn btn-success mt-2" style="font-size: 12px" > Submit </button>

                        <div style="float: right; text-align: right;">
                          <a href='index.php' onclick='return deletee()' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                             <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Back 
                              <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                            </h5> 
                          </a>
                        </div> 

                        </div>

                    </div>


            </form>      
            </div>
            <!-- End -->


          </div>
        </div>
      </div>
    </div>


</div>

</body>
</html> 


