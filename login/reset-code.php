<?php require_once "access.php"; ?>

<?php 

    $email = $_SESSION['email'];

    if($email == false){

      header('Location: login.php');

    }

//if user signup button
if(isset($_REQUEST['reset'])) {

$email = $_REQUEST['reset'];

    $email_check = "SELECT * FROM account WHERE email = '$email' ";
    $code_res = mysqli_query($con, $email_check);

    if ($code_res) {

        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];

        $code = rand(999999, 111111);
        $status = "verified";

        $update_data = "UPDATE account SET code = '$code', status = '$status' WHERE email = '$email' ";
        $data_check = mysqli_query($con, $update_data);

        if ($data_check) {

            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: pesostamariabulacan@gmail.com";

            if (mail($email, $subject, $message, $sender)) {

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo "<script>alert('Successful reset OTP')</script>";
                echo "<script>window.location = 'reset-code.php'</script>";
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
  <title> PESO - Reset Code </title>

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
                    <h4 class="mt-3"> Reset OTP Verification </h4>


            <form action="reset-code.php" method="POST" autocomplete="" class="auth-form login-form mt-5">

                <?php if(isset($_SESSION['info'])) { ?>

                    <div class="alert alert-success text-center" style="background: none; border: none; box-shadow: none;">
                        <?php echo $_SESSION['info']; ?>
                    </div>

                <?php } ?>

                <?php if(count($errors) > 0) { ?>

                    <div class="alert alert-danger text-center" style="background: none; border: none; box-shadow: none;"> 
                        <?php foreach ($errors as $showerror){
                                       echo $showerror; } ?>
                    </div>

                <?php } ?>

                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Enter OTP sent to your email. 
                    <div class="form-label-group">
                      <input type="tel" name="otp" maxlength="6" placeholder="Enter 6 digit OTP"  onkeypress="return onlyNumberKey(event)"  style="color: black; font-size: 13PX;" class="form-control shadow-none" required>
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

                <div class="mt-3">
                <button type="submit" name="check-reset-otp" class="btn btn-success" style="font-size: 12px"> Submit </button>

                <div style="float: right; text-align: right;">
                  <a href='reset-code.php?reset=<?php echo $email;?>' onclick='return deletee()' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                     <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Reset OTP 
                      <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                    </h5> 
                  </a>
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
<!-- End -->

</body>
</html> 


