<?php

session_start();

require "../../database/database.php";

$password = "";
$email = "";
$email_errors = array();
$new_password_errors = array();
$com_password_errors = array();

//if user signup button
if(isset($_POST['signup'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $com_password = mysqli_real_escape_string($con, $_POST['com_password']);

    $First_Name =  mysqli_real_escape_string($con, $_POST['First_Name']);
    $Middel_Name =  mysqli_real_escape_string($con, $_POST['Middel_Name']);
    $Last_Name =  mysqli_real_escape_string($con, $_POST['Last_Name']);

    $email_check = "SELECT * FROM account WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);

    if (mysqli_num_rows($res) > 0) {
       
        $email_required = '/^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/';
        preg_match($email_required, $email, $matches, PREG_OFFSET_CAPTURE, 0);

          // CHECK NEW EMAIL 18 OR MORE
          if ($matches == true) {
            $email_errors['email'] = "Email that you have entered is already exist";
          } 

          // CHECK NEW PASSWORD 8 OR MORE
          if ($new_password < 8) {
          } else {
              $new_password_errors['new_password'] = "Use 8 or more characters Example(Sample12@gmail.com).";
          }

          // CHECK NEW AND COMFIRM PASSWOR IS MATCH
          if ($new_password == $com_password) {
          } else {
              $com_password_errors['new_password, com_password'] = "Confirm password not matched.";
          }

      } 

      if (count($email_errors) === 0) {
        if (count($new_password_errors) === 0) {
          if (count($com_password_errors) === 0) {

              $encpass = password_hash($new_password, PASSWORD_BCRYPT);
              $email_code = rand(999999, 111111);
              $status = "notverified";

              $insert_data = "INSERT INTO account (email, password, email_code, First_Name, Middel_Name, Last_Name)
                              values('$email','$encpass', '$email_code', '$First_Name', '$Middel_Name', '$Last_Name')";

              $data_check = mysqli_query($con, $insert_data);

              if ($data_check) {

                  $subject = "Email Verification Code";
                  $message = "Your verification code is $email_code";
                  $sender = "From: pesostamariabulacan@gmail.com";

                  if (mail($email, $subject, $message, $sender)) {

                      $_SESSION['email'] = $email;
                      $info = "We've sent a verification code to your email - $email";
                      $_SESSION['info'] = $info;
                      echo "<script>window.location = 'signup-email-code.php'</script>"; 
                      exit();
                  } 

              } 

          }
        }
      }

}

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

<link rel="../assets/icon" type="image/png" href="../../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Signup </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

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

</head>

<body>

<?php include "navbar.php"; ?>

<!-- START -->
<section class="my-0 py-5">

<div class="container">
<div class="row">

<div class="col-lg-2 ms-lg-5 position-relative bg-cover px-0"></div>
<div class="col-lg-7" style="background: none; border: none;">

  <div class="card-body pt-1">

      <div class="row">
      <div class="col-md-12 pe-3 mb-0">

<!-- FORM START -->
<form action="#" method="POST" autocomplete="" class="auth-form login-form">

<?php

if (isset($_POST['signup'])) {

    $_SESSION['First_Name'] = $_POST['First_Name'];
    $_SESSION['Middel_Name'] = $_POST['Middel_Name'];
    $_SESSION['Last_Name'] = $_POST['Last_Name'];

    $_SESSION['email'] = $_POST['email'];
}

?>  

        <!-- TITLE -->
        <h3 class=""> P E S O </h3>
        <h4 class="mt-3"> Sign Up - <span style="font-size: 18px"> It’s quick and easy</span> </h4>


              <!-- FULLNAME -->
              <div class="nav-wrapper position-relative mt-5">
              <label class="text-sm"> Full name </label>
              <ul class="nav nav-pills nav-fill" style="background: none;">

                  <li class="nav-item col-lg-3 col-12 col-md-12">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> First name *
                      <div class="form-label-group">
                        <input type="text" name="First_Name" value="<?php echo isset($_SESSION['First_Name']) ? $_SESSION['First_Name'] : ''; ?>" 
                               class="form-control shadow-none" placeholder="Enter your first name" style="color: black; font-size: 13PX;" required>
                      </div>
                    </p>
                  </li>

                  <li class="nav-item ms-lg-1 ms-1 col-lg-3 col-12 col-md-12">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Middle name *
                      <div class="form-label-group">
                        <input type="text"  name="Middel_Name" value="<?php echo isset($_SESSION['Middel_Name']) ? $_SESSION['Middel_Name'] : ''; ?>" 
                               class="form-control shadow-none" placeholder="Enter your middle name" style="color: black; font-size: 13PX;" required>
                      </div>
                    </p>
                  </li>

                  <li class="nav-item ms-lg-1 ms-1 col-lg-3 col-12 col-md-12">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Last name *
                      <div class="form-label-group">
                        <input type="text"  name="Last_Name" value="<?php echo isset($_SESSION['Last_Name']) ? $_SESSION['Last_Name'] : ''; ?>"
                               class="form-control shadow-none" placeholder="Enter your last name" style="color: black; font-size: 13PX;" required>
                      </div>
                    </p>
                  </li>

              </ul>
              </div>


              <!-- EMAIL -->
              <div class="nav-wrapper position-relative" >
              <label class="text-sm"> Email & Password </label>
              <ul class="nav nav-pills nav-fill" style="background: none;">

                  <li class="nav-item col-lg-5 col-12 col-md-12">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Email *
                      <div class="form-label-group">
                        <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" 
                               class="form-control shadow-none" placeholder="Enter your email" oninput="return validate()" style="color: black; font-size: 13PX;" required>
                      </div>
                    </p>
                  </li>
                  <li class="nav-item col-12 col-md-12 col-lg-5" style="text-align: left; margin-top: 5%"><span id='new_mail' class="ms-3"></span></li>

                  <?php if(count($email_errors) == 1) { ?>

                      <span style="color: red; font-size: 12px; float:left; background: none">
                          <?php foreach ($email_errors as $showerror) { ?>
                               <i class="bi bi-exclamation-circle-fill "></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } else if (count($email_errors) > 1) { ?>

                      <span style="color: red; font-size: 12px; float:left; background: none">
                          <?php foreach ($email_errors as $showerror) { ?>
                              <i class="bi bi-exclamation-circle-fill "></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } ?>                                               
              </ul>
              </div>


              <!-- PASSWORD -->
              <div class="nav-wrapper position-relative mt-3" >
              <ul class="nav nav-pills nav-fill" style="background: none;">

                  <li class="nav-item col-lg-5 col-md-5 col-5">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Password *
                    <div class="input-group">
                      <input type="password" name="new_password" id="new_password" placeholder="Enter your password"
                             style="color: black; font-size: 13PX; padding: 6px 10px;" class="form-control shadow-none new_password" required>
                      <span class="input-group-text">     
                        <i class="far fa-eye" id="toggle_new_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                      </span>
                    </div>
                    </p>
                  </li>
                  <li class="nav-item col-1 col-md-1 col-lg-5" style="text-align: left; margin-top: 5%"><span id='new' class="ms-3"></span></li>

                  <?php if(count($new_password_errors) == 1) { ?>

                      <span style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($new_password_errors as $showerror) { ?>
                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } else if (count($new_password_errors) > 1) { ?>

                      <span style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($new_password_errors as $showerror) { ?>
                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } ?>

              </ul>
              </div>


              <!-- COMFIRM PASSWORD -->
              <div class="nav-wrapper position-relative mt-3" >
              <ul class="nav nav-pills nav-fill" style="background: none;">

                  <li class="nav-item col-lg-5 col-md-5 col-5">
                    <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Confirm your password *
                    <div class="input-group">
                      <input type="password" name="com_password" id="com_password" placeholder="Enter comfirmation password"
                             style="color: black; font-size: 13PX; padding: 6px 10px;" class="form-control shadow-none com_password" required>
                      <span class="input-group-text">     
                        <i class="far fa-eye" id="toggle_com_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                      </span>
                    </div>
                    </p>
                  </li>
                  <li class="nav-item col-1 col-md-1 col-lg-5" style="text-align: left; margin-top: 5%"><span id='com' class="ms-3"></span></li>

                      <?php if(count($com_password_errors) == 1) { ?>

                          <span style="color: red; font-size: 12px; float: left; background: none">
                              <?php foreach ($com_password_errors as $showerror) { ?>
                                   <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                              <?php } ?>
                          </span>

                      <?php } else if (count($com_password_errors) > 1) { ?>

                          <span style="color: red; font-size: 12px; float: left; background: none">
                              <?php foreach ($com_password_errors as $showerror) { ?>
                                  <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                              <?php } ?>
                          </span>

                      <?php } ?>

               </ul>
              </div>


              <!-- REQUIREMENTS -->
            <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-20 mt-2 mt-4" style="border: 1px solid lightgray;">
            <div class="col-lg-12 col-md-12 col-12">
            <div class="p-0 pe-md-0">

              <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> PESO Requirements </span></h6>
              <h6 style="font-size: 14px; color: black; font-weight: normal;"  class="mt-3"> 
              Welcome to PESO Sta. Maria Online Outsourcing System. In order to create your account, please read the following guidelines below;
              </h6>





              <div class='accordion col-12 col-md-12 col-lg-12 mt-3' id='accordionPanelsStayOpenExample'>
              <div class='accordion-item card col-lg-12 col-md-12 col-12 my-auto'  style='box-shadow: none; border: none;'>

                  <button class='accordion-button shadow-none collapsed card-profile' type='button' data-bs-toggle='collapse' 
                          data-bs-target='#panelsStayOpen-collap_1' aria-expanded='false' aria-controls='panelsStayOpen-collap_1'>
                   <h6 style="font-size: 14px; color: black">  Email Guidelines  </h6>
                  </button>

                <div id='panelsStayOpen-collap_1' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingTwo'>
                  <div class='accordion-body' style='color: black'>
                    <span style='font-size: 14px'>
                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                            1. You need to have your own google mail or G-mail that is not bind to any PESO account. <br><br>

                            2. Use 8 or more characters you can use letters, number & periods. Example(Sample12@gmail.com).<br><br>
                            3. Registered email address is not allowed to be used as another account’s email address.
                    </h6>
                    </span>
                  </div>
                </div>




              </div>
              </div>

              <div class='accordion col-12 col-md-12 col-lg-12 mt-3' id='accordionPanelsStayOpenExample'>
              <div class='accordion-item card col-lg-12 col-md-12 col-12 my-auto'  style='box-shadow: none; border: none;'>

                  <button class='accordion-button shadow-none collapsed card-profile' type='button' data-bs-toggle='collapse' 
                          data-bs-target='#panelsStayOpen-collap_2' aria-expanded='false' aria-controls='panelsStayOpen-collap_2'>
                   <h6 style="font-size: 14px; color: black">  Password Guidelines  </h6>
                  </button>

                <div id='panelsStayOpen-collap_2' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingTwo'>
                  <div class='accordion-body' style='color: black'>
                    <span style='font-size: 14px'>
                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                          1. Password should be 8-12 letters long with a combination of small and capital letters, numbers and symbols.<br><br>

                          2. <span style="font-weight: 500;"> Strong </span> : The password has to meet all the requirements.<br>
                          To create a strong level password that has at least one lowercase letter, one uppercase letter, one digit, one special character, and is at least fourteen characters long.<br><br>

                          3. <span style="font-weight: 500;"> Medium </span> : If the password is at least twelve characters long and meets all the other requirements, or has no digit but meets the rest of the requirements.<br>
                          The code is the same as for the Strong level only that shows that we are checking for at least twelve characters. It also has to check for either of the two conditions.<br><br>

                          4. <span style="font-weight: 500;"> Weak </span> : If the password entered does not meet the strong or medium-level requirements, then it is deemed weak.<br><br>

                          5. Do not use your registered password to set as your new password.
                    </h6>
                    </span>
                  </div>
                </div>

              </div>
              </div>

                  <input type="checkbox" id="checking" name="checking" required="true" disabled 
                         style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 15px;" 
                         class="mt-4 checking"> 

                         <span class="ms-2" style="font-weight: 500; font-size: 14px; color: black"> Agreement of Terms </span> : <br><br>     
                         <span style="font-size: 14px"> By clicking the check box above means that you are allowing the staffs of PESO Sta. 
                         Maria Bulacan to gather your personal information such as name, gender, contact, address, educational attainment, work experience, etc.  <br><br>      
                         Any information that PESO Sta. Maria will receive will only be used for Job Placement Programs and will not be used for staff’s personal interest.
                        </span>                                  

            </div>
            </div>
            </div>   


              <button type="submit" name="signup" id="submit" class="btn btn-success mt-3" style="font-size: 12px;" disabled> Next </button> 

              <div style="float: right;" class="mt-3">
                  <a href='../index.php' 
                    class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                     <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Login 
                      <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                    </h5> 
                  </a>
              </div>

</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// NEW PASSWORD
$(document).ready(function() {
// The strong and weak password Regex pattern checker
var email = /^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/;

$('#email').on('input', function() {
$('span.error_new_mail').remove();
$('span.valid_new_mail').remove();

// IF EMPTY NEW EMAIL INPUT DISABALE BUTTON SUBMIT
if ($('#email').val() === '') {
    $('#new_mail').after('<span class="error_new_mail" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');

// IF NEW EMAIL IS VALID ENABLE BUTTON SUBMIT
} else if (email.test($('#email').val()) == true) {
  $('#new_mail').after('<span class="valid_new_mail" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid new email </span></span>');
  return true;


// IF NEW EMAIL IS NOT VALID BUTTON SUBMIT
} else if (email.test($('#email').val().length < 18) == false) {
  $('#new_mail').after('<span class="error_new_mail" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid new email </span></span>'); 
}

return false;

});

$('#email').trigger('input');

});

</script>


<!-- CHECK PASSWORD -->
<script type="text/javascript">

// NEW PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{14,})');
let mediumPassword = new RegExp('((?=.*[a-z]) (?=.*[A-Z]) (?=.*[0-9]) (?=.*[^A-Za-z0-9]) (?=.{12,}) ) | ((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{14,}))');
let weakPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{12,}))');  

$('#new_password').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

if ($('#new_password').val() === '') {
    $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
    $('#com_password').addClass('.com_password').prop('disabled', 1);

} else if (strongPassword.test($('#new_password').val())) {
  $('#new').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="bi bi-battery-full" style=" color:green; font-size: 15px; text-align: left"></i><span class="ms-2"> Strong password </span></span>');
  $('#com_password').removeClass('.com_password').prop('disabled', 0);

} else if (mediumPassword.test($('#new_password').val())) {
  $('#new').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="bi bi-battery-half" style=" color:green; font-size: 15px; text-align: left"></i><span class="ms-2"> Medium password </span></span>');
   $('#com_password').removeClass('.com_password').prop('disabled', 0);

} else if (weakPassword.test($('#new_password').val())) {
  $('#new').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="bi bi-battery" style="color:green; font-size: 15px; text-align: left"></i><span class="ms-2"> Weak password </span></span>');
  $('#com_password').removeClass('.com_password').prop('disabled', 0);

} else if ($('#new_password').val()) {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Use 8 or more characters </span></span>');
  $('#com_password').addClass('.com_password').prop('disabled', 1);

} else if ($('#new_password').val().length < 8) {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Use 8 or more characters </span></span>');
  $('#com_password').addClass('.com_password').prop('disabled', 1);
}    

});

$('#new_password').trigger('input');

});

// COMFIRM PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{14,})');
let mediumPassword = new RegExp('((?=.*[a-z]) (?=.*[A-Z]) (?=.*[0-9]) (?=.*[^A-Za-z0-9]) (?=.{12,}) ) | ((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{14,}))');
let weakPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{12,}))');  

$('#com_password, #new_password').on('input', function() {
$('span.error_com').remove();
$('span.valid_com').remove();

if (($('#new_password').val().length < 8)) {
$('#checking').addClass('.checking').prop('disabled', 1);
$('#submit').addClass('.btn').prop('disabled', 1);
  
  } else if ($('#com_password').val() === '') {
    $('#com').after('<span class="valid_com" style="color: black; font-size: 12px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"></i><span class="ms-2"> Fill </span></span>');
    $('#checking').addClass('.checking').prop('disabled', 1);
    $('#submit').addClass('.btn').prop('disabled', 1);

  } else if ($('#com_password').val() == $('#new_password').val()) { 
    $('#com').after('<span class="valid_com" style="color: black; font-size: 12px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left"></i><span class="ms-2"> Match </span></span>');
    $('#checking').removeClass('.checking').prop('disabled', 0);
    $('#submit').removeClass('.btn').prop('disabled', 0);

  } else if ($('#com_password').val()){
    $('#com').after('<span class="error_com" style="color: black; font-size: 12px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left"></i><span class="ms-2"> Not match </span></span>');
    $('#checking').addClass('.checking').prop('disabled', 1);
    $('#submit').addClass('.btn').prop('disabled', 1);
  }

});

  $('#com_password').trigger('input');

});

// Show new password
const toggle_new_password = document.querySelector('#toggle_new_password');
const new_password = document.querySelector('#new_password');

toggle_new_password.addEventListener('click', function (e) {
const type = new_password.getAttribute('type') === 'password' ? 'text' : 'password';
new_password.setAttribute('type', type);
this.classList.toggle('fa-eye-slash');
});

// Show new comfirm password
const toggle_com_password = document.querySelector('#toggle_com_password');
const com_password = document.querySelector('#com_password');

toggle_com_password.addEventListener('click', function (e) {
const type = com_password.getAttribute('type') === 'password' ? 'text' : 'password';
com_password.setAttribute('type', type);
this.classList.toggle('fa-eye-slash');
});

</script>

<!-- DISABLE KEY BUTTON FOR REFRESH -->
<script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>


          </div>
          </div>

    </div>
    </div>

</div>
</div>

</div>
</div>

</section>

</body>
</html>


