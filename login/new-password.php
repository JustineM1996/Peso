<?php require_once "access.php"; ?>

<?php 

    $email = $_SESSION['email'];

    if($email == false){

      header('Location: login.php');

    }

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - New Password </title>

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
                    <h4 class="mt-3"> Change Password </h4>

            <form action="new-password.php" method="POST" autocomplete="" class="auth-form login-form mt-5">

            <!-- CURRENT PASSWORD START -->
            <ul class="nav nav-fill mt-lg-2">
                <li class="nav-item col-12 col-md-12 col-lg-12">
                  <div class="input-group">
                    <input type="password" name="old_password" id="old_password" minlength="8" maxlength="30" placeholder="Enter current password" required="true" 
                           style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 10px;" 
                           class="form-control shadow-none mt-2 old_password">
                    <span class="input-group-text mt-2">     
                      <i class="far fa-eye" id="toggle_old_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                    </span> 
                  </div>

                 <?php if(count($old_password_errors) == 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($old_password_errors as $showerror) { ?>
                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } else if (count($old_password_errors) > 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($old_password_errors as $showerror) { ?>
                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } ?>


                </li>
                <li class="nav-item col-1 col-md-1 col-lg-12 mt-3" style="text-align: left;"><span id='old' class="ms-3"></span></li>
            </ul>

            <!-- NEW PASSWORD START -->
            <ul class="nav nav-fill mt-lg-2">
                <li class="nav-item col-12 col-md-12 col-lg-12">
                  <div class="input-group">
                    <input type="password" name="new_password" id="new_password" minlength="8" maxlength="30" placeholder="Enter new password" required="true" 
                           style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 10px;" 
                           class="form-control shadow-none mt-2 new_password" disabled>
                    <span class="input-group-text mt-2">     
                      <i class="far fa-eye" id="toggle_new_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                    </span>      
                  </div>

                  <?php if(count($new_password_errors) == 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($new_password_errors as $showerror) { ?>
                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } else if (count($new_password_errors) > 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($new_password_errors as $showerror) { ?>
                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } ?>

                </li>
                <li class="nav-item col-1 col-md-1 col-lg-12 mt-3" style="text-align: left;"><span id='new' class="ms-3"></span></li>
            </ul>

            <!-- COMFIRM PASSWORD START -->
            <ul class="nav nav-fill mt-lg-2">
                <li class="nav-item col-12 col-md-12 col-lg-12">
                  <div class="input-group">
                    <input type="password" name="com_password" id="com_password" minlength="8" maxlength="30" placeholder="Enter comfirm password" required="true" 
                           style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 10px;"
                           class="form-control shadow-none mt-2 com_password" disabled>
                    <span class="input-group-text mt-2">     
                      <i class="far fa-eye" id="toggle_com_password" style="margin-left: -30px; cursor: pointer; font-size: 13PX;"></i>
                    </span>
                  </div>

                  <?php if(count($com_password_errors) == 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($com_password_errors as $showerror) { ?>
                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } else if (count($com_password_errors) > 1) { ?>

                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                          <?php foreach ($com_password_errors as $showerror) { ?>
                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                          <?php } ?>
                      </span>

                  <?php } ?>
                  
                </li>
                <li class="nav-item col-1 col-md-1 col-lg-12 mt-3" style="text-align: left;"><span id='com' class="ms-3"></span></li>
            </ul>

            <button type="submit" name="change-password" id="submit" class="btn btn-success" style="font-size: 12px"> Change </button>

            </form>
      


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script type="text/javascript">

// OLD PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{14,})');
let mediumPassword = new RegExp('((?=.*[a-z]) (?=.*[A-Z]) (?=.*[0-9]) (?=.*[^A-Za-z0-9]) (?=.{12,}) ) | ((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{14,}))');
let weakPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{12,}))');  

$('#old_password').on('input', function() {
$('span.error_old').remove();
$('span.valid_old').remove();

if ($('#old_password').val() === '') {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
    $('#new_password').addClass('.new_password').prop('disabled', 1);

  } else if (strongPassword.test($('#old_password').val())) {
    $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i></span>');
    $('#new_password').removeClass('.new_password').prop('disabled', 0);

  } else if (mediumPassword.test($('#old_password').val())) {
    $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i></span>');
    $('#new_password').removeClass('.new_password').prop('disabled', 0);

  } else if (weakPassword.test($('#old_password').val())) {
    $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i></span>');
    $('#new_password').removeClass('.new_password').prop('disabled', 0);

  } else if ($('#old_password').val().length < 8) {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i> Use 8 or more characters </span>');
    $('#new_password').addClass('.new_password').prop('disabled', 1);
   
  } else if ($('#old_password').val()) {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i> Use 8 or more characters </span>');
    $('#new_password').addClass('.new_password').prop('disabled', 1);
  }  

});

$('#old_password').trigger('input');

});


// NEW PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{14,})');
let mediumPassword = new RegExp('((?=.*[a-z]) (?=.*[A-Z]) (?=.*[0-9]) (?=.*[^A-Za-z0-9]) (?=.{12,}) ) | ((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{14,}))');
let weakPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{12,}))');  

$('#new_password, #old_password').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

if ($('#new_password').val() === "") {
    $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
    $('#com_password').addClass('.com_password').prop('disabled', 1);

} else if ($('#old_password').val() == $('#new_password').val()) { 
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Current password are not allowed </span></span>');
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

} else if ($('#new_password').val().length < 8) {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Use 8 or more characters </span></span>');
  $('#com_password').addClass('.com_password').prop('disabled', 1);

} else if ($('#new_password').val()) {
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

$('#com_password, #new_password, old_password').on('input', function() {
$('span.error_com').remove();
$('span.valid_com').remove();

if ($('#com_password').val() === '') {
    $('#com').after('<span class="valid_com" style="color: black; font-size: 12px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"></i><span class="ms-2"> Fill </span></span>');
    $('#submit').addClass('.btn').prop('disabled', 1);

} else if ($('#new_password').val() == $('#old_password').val()) { 
  $('#submit').addClass('.btn').prop('disabled', 1);

} else if ($('#com_password').val() == $('#new_password').val()) { 
  $('#com').after('<span class="valid_com" style="color: black; font-size: 12px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left"></i><span class="ms-2"> Match </span></span>');
  $('#submit').removeClass('.btn').prop('disabled', 0);

} else if ($('#com_password').val()){
  $('#com').after('<span class="error_com" style="color: black; font-size: 12px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left"></i><span class="ms-2"> Not match </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);
}

});

  $('#com_password').trigger('input');

});


</script>






</body>
</html> 
