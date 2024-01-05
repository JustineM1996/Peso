<?php include 'session.php';?>

<?php 

include '../database/database.php';

$id = "";
$old_email = "";
$new_email = "";
$old_email_errors = array();
$old_new_email_errors = array();

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $old_email = $_POST['old_email'];
    $new_email = $_POST['new_email'];

        $check_email = "SELECT * FROM account WHERE email = '$old_email'";
        $pass_email = mysqli_query($con, $check_email);

        if (mysqli_num_rows($pass_email) > 0) {

            $email_required = '/^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/';
            preg_match($email_required, $new_email, $matches, PREG_OFFSET_CAPTURE, 0);

              // CHECK NEW EMAIL 18 OR MORE
              if ($matches == true) {
              } else {
                  $old_new_email_errors['new_email'] = "Use 8 or more characters you can use letters, number & periods.";
              }

              // CHECK OLD AND NEW EMAIL IS SAME
              if ($old_email == $new_email) {
                  $old_new_email_errors['old_email, new_email'] = "Current email and New email is same.";
              } 

        } else {
          $old_email_errors['old_email'] = "Current email is incorrect.";
        }

        if (count($old_email_errors) === 0) {
            if (count($old_new_email_errors) === 0) {

              $id = $_POST['id'];
              $new_email = $_POST['new_email'];

              $change_code = rand(999999, 111111);
              $insert_data = "UPDATE account SET id = '$id',
                                                 change_code = '$change_code',
                                                 login_verify = '0',
                                                 login_verify_code = '0',
                                                 email = '$new_email' WHERE id = '$id'";
              $data_check = mysqli_query($con, $insert_data);

              if ($data_check) {

                  $subject = "Change email aacount for Verification Code";
                  $message = "Your verification code is $change_code";
                  $sender = "From: pesostamariabulacan@gmail.com";

                  if (mail($email, $subject, $message, $sender)) {

                  if (mail($email, $subject, $message, $sender)) {

                      $info = "We've sent a verification code to your email - $email";
                      $_SESSION['info'] = $info;
                      $_SESSION['email'] = $email;

                      echo "<script>alert('Successfull update email address')</script>";
                      echo "<script>window.location = '../login/logout.php?id=$id'</script>";
                   
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

  <!-- LOGO -->
    <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Change Email Address</title>

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
 

<!-- START -->
<section class="my-3 py-3">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">

<?php
    include '../database/database.php';
    $query = mysqli_query($con,"SELECT * FROM account WHERE id = '".$_REQUEST['id']."' ");
    while($row = mysqli_fetch_array($query)){
?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='account-view.php?id=<?php echo $row['id'];?>' style="text-decoration: none;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

  <script type="text/javascript">
      window.history.forward();
      function cancel() {
      return confirm ('Are you sure you want to cancel');
      }
  </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ACCOUNT <p> | Change email address </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->


<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100" style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <?php
                         if ($profile_acc == '') {
                            echo "<img class='w-100 border-radius-md shadow' src='../images/default-avatar.png' style='border-radius: 50%;' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow' src='$profile_acc' style='border-radius: 50%;' alt='image'>";
                         }
                      ?>
                </div>
                </div>

                <!-- information -->
                <div class="col-lg-8 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">
                    
                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['email'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['Contant_Number'];?></span>
                    </h6>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
                    </h6>          


                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-2">
                      <span style="font-weight: normal;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?></span>
                    </h6>

                </div>
                </div>
                

          </div>
          </div>

      </div>
      </div>

</div>
</div>



<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 ">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Information </h4>
        </div>


        <!-- FORM START -->
        <form action="#" method="POST" enctype="multipart/form-data">

        <input type="int" name="id" value="<?php echo $row['id']; ?>" hidden>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" hidden>

            <!-- OLD EMAIL START -->
            <ul class="nav nav-fill">

                <li class="nav-item col-6 col-md-6 col-lg-2">
                 <input type="text" style="color: black; font-size: 13PX; border: none; background: none; font-weight: 500;" value="Current Email :" class="form-control shadow-none mt-2" readonly>
                </li>

                <li class="nav-item col-12 col-md-12 col-lg-4">
                  <input type="email" id="old_email" name="old_email" minlength="18" maxlength="30" placeholder="Enter current email" required="true"
                         style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 15px;" 
                         class="form-control shadow-none mt-2 old_email">

                          <?php if(count($old_email_errors) == 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                  <?php foreach ($old_email_errors as $showerror) { ?>
                                       <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } else if (count($old_email_errors) > 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                  <?php foreach ($old_email_errors as $showerror) { ?>
                                      <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } ?>
                </li>
                <li class="nav-item col-4 col-md-4 col-lg-3 mt-3" style="text-align: left;"><span id='old' class="ms-3"></span></li>

            </ul>

            <!-- NEW EMAIL START -->
            <ul class="nav nav-fill mt-2">

                <li class="nav-item col-12 col-md-12 col-lg-2">
                 <input type="text" style="color: black; font-size: 13PX; border: none; background: none; font-weight: 500;" value="New Email :" class="form-control shadow-none mt-2"readonly>
                </li>

                <li class="nav-item col-12 col-md-12 col-lg-4">
                  <input type="email" id="new_email" name="new_email" minlength="18" maxlength="30" placeholder="Enter new email" required="true" 
                         style="color: black; font-size: 13PX; border-radius: 3px; padding: 6px 15px;" 
                         class="form-control shadow-none mt-2 new_email" disabled>

                          <?php if(count($old_new_email_errors) == 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float:left; background: none">
                                  <?php foreach ($old_new_email_errors as $showerror) { ?>
                                       <i class="bi bi-exclamation-circle-fill "></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } else if (count($old_new_email_errors) > 1) { ?>

                              <span class="mt-2" style="color: red; font-size: 12px; float:left; background: none">
                                  <?php foreach ($old_new_email_errors as $showerror) { ?>
                                      <i class="bi bi-exclamation-circle-fill "></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                  <?php } ?>
                              </span>

                          <?php } ?>

                </li>

                <li class="nav-item col-12 col-md-12 col-lg-3 mt-3" style="text-align: left;"><span id='new' class="ms-3"></span></li>

            </ul>

            <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-20 mt-2 mt-4" style="border: 1px solid lightgray;">
            <div class="col-lg-12 col-md-12 col-12">
            <div class="p-0 pe-md-0">

              <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Email Update </span></h6>
              <h6 style="font-size: 14px; color: black; font-weight: normal;" class="mt2"> 
                Please read the following guidelines below to help you update your email.
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
                      1.  You must need a Google mail or G-mail account that is not bind to any PESO Account.<br><br>
                      2.  Your currently registered G-mail account cannot be set as your new email.<br><br>
                      3.  Please double check the email you have entered so that you won’t have any trouble on logging in your account and receiving emails from PESO Sta. Maria Online Outsourcing System.
                    </h6>
                    </span>
                  </div>
                </div>

              </div>
              </div>

            </div>
            </div>
            </div>    

            <button type="submit" name="submit" class="btn btn-success mt-4" id="submit" style="color: white; font-size: 12px;" onclick='return change()' disabled> Change </button>

              <script type="text/javascript">
                  function change() {
                  return confirm ('Are you sure you want to change email');
                  }
              </script>

</form>
<?php } ?>

<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// OLD PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
var email = /^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/;

$('#old_email, #new_email').on('input', function() {
$('span.error_old').remove();
$('span.valid_old').remove();

// IF EMPTY CURRENT EMAIL INPUT DISABALE NEW EMAIL INPUT
if ($('#old_email').val() === '') {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
    $('#new_email').addClass('.new_email').prop('disabled', 1);


// IF CURRENT EMAIL IS VALID ENABLE NEW EMAIL INPUT
} else if (email.test($('#old_email').val()) == true) {
  $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid old email </span></span>');
  $('#new_email').removeClass('.new_email').prop('disabled', 0);
  return true;

// IF CURRENT EMAIL IS NOT VALID DISABLE NEW EMAIL
} else if (email.test($('#old_email').val().length < 18) == false) {
  $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid old email </span></span>');
  $('#new_email').addClass('.new_email').prop('disabled', 1);
  return false;
} 

});

$('#old_email').trigger('input');

});


// NEW PASSWORD
$(document).ready(function() {
// The strong and weak password Regex pattern checker
var email = /^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/;

$('#new_email, #old_email').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

if ($('#new_email').val() === '') {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);

// IF CURRENT EMAIL AND NEW EMAIL IS SAME IS NOT ALLOWED TO SET NEW EMAIL
} else if ($('#new_email').val() == $('#old_email').val()) {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Current email are not allowed </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);

// IF NEW EMAIL IS VALID ENABLE BUTTON SUBMIT
} else if (email.test($('#new_email').val()) == true) {
  $('#new').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid new email </span></span>');
  $('#submit').removeClass('.btn').prop('disabled', 0);    
  return true;

// IF NEW EMAIL IS NOT VALID BUTTON SUBMIT
} else if (email.test($('#new_email').val().length < 18) == false) {
  $('#new').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid new email </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);    
}

return false;

});

$('#new_email').trigger('input');

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
</div>

</section>
<!-- END -->


</body>
</html>

