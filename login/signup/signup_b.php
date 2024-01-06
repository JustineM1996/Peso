<?php 

require "../../database/database.php";

session_start();
$info = $_SESSION['info'];
$email = $_SESSION['email'];
$new_number = "";
$new_phone_errors = array();

//if user signup button
if(isset($_POST['signup'])) {

    $new_number =  mysqli_real_escape_string($con, $_POST['new_number']);

    $Gender =  mysqli_real_escape_string($con, $_POST['Gender']);   
    $Month =  mysqli_real_escape_string($con, $_POST['Month']);
    $Day =  mysqli_real_escape_string($con, $_POST['Day']);
    $Year =  mysqli_real_escape_string($con, $_POST['Year']);

    $Region =  mysqli_real_escape_string($con, $_POST['Region']);
    $Province =  mysqli_real_escape_string($con, $_POST['Province']);
    $City =  mysqli_real_escape_string($con, $_POST['City']);
    $Barangay =  mysqli_real_escape_string($con, $_POST['Barangay']);
    $Street =  mysqli_real_escape_string($con, $_POST['Street']);

    $phone_check = "SELECT * FROM account WHERE Contant_Number = '$new_number'";
    $code_res = mysqli_query($con, $phone_check);

    // CHECK IF OLD NUMBER IS CORRECT
    if (mysqli_num_rows($code_res) > 0) {
        $new_phone_errors['new_number'] = "Phone number that you have entered is already exist";
    } 

    if (count($new_phone_errors) === 0) {

            $update_data = "UPDATE account SET phone_code = '0', status = 'verified', Contant_Number = '$new_number', Gender = '$Gender',
                                               Month = '$Month', Day = '$Day', Year = '$Year',
                                               Region = '$Region', Province = '$Province', City = '$City', Barangay = '$Barangay', Street = '$Street' WHERE email = '$email' ";

            $data_check = mysqli_query($con, $update_data);
            echo "<script>alert('Successful Sign Up')</script>";
            echo "<script>window.location = '../login.php'</script>";
        
    }

}

//if user click dalete register
if(isset($_REQUEST['delete'])) {

$email = $_REQUEST['delete'];

    mysqli_query($con,"DELETE FROM account WHERE email = '$email' ");
    echo "<script>alert('Sucessful cancel registration')</script>";
    echo "<script>window.location = '../login.php'</script>";
    exit();


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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-../assets/icons@1.10.4/font/bootstrap-../assets/icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body >

<?php include "navbar.php"; ?>

<!-- START -->
<section class="my-0 py-5">

<div class="container">
<div class="row">

<div class="col-lg-3 position-relative bg-cover px-0"></div>
<div class="col-lg-6" style="background: none; border: none;">

    <div class="card-body pt-1">

      <div class="row">
      <div class="col-md-12 pe-3 mb-0">

            <h3 class=""> P E S O </h3>
            <h4 class="mt-3"> Sign Up - <span style="font-size: 18px"> It’s quick and easy</span> </h4>

            <!-- FORM START -->
            <form action="signup_b.php" method="POST" autocomplete="" class="auth-form login-form">

                        <?php if(isset($_SESSION['info'])) { ?>

                            <div class="alert alert-success text-center" style="background: none; border: none; box-shadow: none;">
                                <?php echo $_SESSION['info']; ?>
                            </div>

                        <?php } ?>

                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Contact Information. </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                              <li class="nav-item col-lg-2 col-2 col-md-2">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> <span style="color: black; cursor: none;"> Phone Number * </span>
                                  <div class="form-label-group">
                                  <input type="tel" name="new_number" id="new_number" minlength="0" maxlength="13" class="form-control shadow-none new_number" required
                                           onkeypress="return onlyNumberKey(event)" style="color: black; font-size: 13PX;" >
                                  </div>
                               </p>
                              </li>
                              <li class="nav-item col-1 col-md-1 col-lg-5" style="text-align: left; margin-top: 5%"><span id='new_phone' class="ms-3"></span></li>
       
                              <?php if(count($new_phone_errors) == 1) { ?>

                                  <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                      <?php foreach ($new_phone_errors as $showerror) { ?>
                                           <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } else if (count($new_phone_errors) > 1) { ?>

                                  <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                      <?php foreach ($new_phone_errors as $showerror) { ?>
                                          <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                      <?php } ?>
                                  </span>

                              <?php } ?>

                          </ul>
                          </div>

                          <!-- -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Birthday & Gender </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                                <li class="nav-item col-lg-2 col-2 col-md-2">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Day *
                                  <div class="form-label-group">
                                      <select class="form-control shadow-none" type="int" name="Day" required
                                              style="color: black; font-size: 13PX;"> 
                                      <option value="01" style="color: black;" >01 </option>
                                      <option value="02" style="color: black;" >02 </option>
                                      <option value="03" style="color: black;" >03 </option>
                                      <option value="04" style="color: black;" >04 </option>
                                      <option value="05" style="color: black;" >05 </option>
                                      <option value="06" style="color: black;" >06 </option>
                                      <option value="07" style="color: black;" >07 </option>
                                      <option value="08" style="color: black;" >08 </option>
                                      <option value="09" style="color: black;" >09 </option>
                                      <option value="10" style="color: black;" >10 </option>
                                      <option value="11" style="color: black;" >11 </option>
                                      <option value="12" style="color: black;" >12 </option>
                                      <option value="13" style="color: black;" >13 </option>
                                      <option value="14" style="color: black;" >14 </option>
                                      <option value="15" style="color: black;" >15 </option>
                                      <option value="16" style="color: black;" >16 </option>
                                      <option value="17" style="color: black;" >17 </option>
                                      <option value="18" style="color: black;" >18 </option>
                                      <option value="19" style="color: black;" >19 </option>
                                      <option value="20" style="color: black;" >20 </option>
                                      <option value="21" style="color: black;" >21 </option>
                                      <option value="22" style="color: black;" >22 </option>
                                      <option value="23" style="color: black;" >23 </option>
                                      <option value="24" style="color: black;" >24 </option>
                                      <option value="25" style="color: black;" >25 </option>
                                      <option value="26" style="color: black;" >26 </option>
                                      <option value="27" style="color: black;" >27 </option>
                                      <option value="28" style="color: black;" >28 </option>
                                      <option value="29" style="color: black;" >29 </option>
                                      <option value="30" style="color: black;" >30 </option>
                                      <option value="31" style="color: black;" >31 </option>
                                    </select>
                                  </div>
                                </p>
                                </li>

                                <li class="nav-item ms-lg-1 ms-1 col-lg-2 col-2 col-md-2">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Month *
                                  <div class="form-label-group">
                                    <select class="form-control shadow-none" type="int" name="Month" required
                                            style="color: black; font-size: 13PX;"> 
                                      <option value="January" style="color: black;" >January </option>
                                      <option value="February" style="color: black;" >February </option>
                                      <option value="March" style="color: black;" >March </option>
                                      <option value="April" style="color: black;" >April </option>
                                      <option value="May" style="color: black;" >May </option>
                                      <option value="June" style="color: black;" >June </option>
                                      <option value="July" style="color: black;" >July </option>
                                      <option value="August" style="color: black;" >August </option>
                                      <option value="September" style="color: black;" >September </option>
                                      <option value="October" style="color: black;" >October </option>
                                      <option value="November" style="color: black;" >November </option>
                                      <option value="December" style="color: black;" >December </option>
                                    </select>
                                  </div>
                                </p>
                                </li>

                                <li class="nav-item ms-lg-1 ms-1 col-lg-2 col-2 col-md-2">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Year *
                                  <div class="form-label-group">
                                    <select class="form-control shadow-none" type="int" name="Year" id="yearpicker" required
                                            style="color: black; font-size: 13PX;"> 
                                    </select>
                                  </div>
                                </p>
                                </li>
                                
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                            <script type="text/javascript">
                            let startYear = 1979;
                            let endYear = new Date().getFullYear();
                            for (i = endYear; i > startYear; i--)
                            {
                              $('#yearpicker').append($('<option />').val(i).html(i));
                            }
                            </script>

                              <li class="nav-item ms-lg-1 ms-1 col-lg-2 col-2 col-md-2">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Gender *
                                  <div class="form-label-group">
                                 <select type="text" name="Gender" class="form-control shadow-none" required
                                         style="color: black; font-size: 13PX;">
                                      <option value="Female">Female</option>
                                      <option value="Male">Male</option>
                                  </select>
                                  </div>
                               </p>
                              </li>

                          </ul>
                          </div>

                         <!-- COMPLETE ADDRESS -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Complete Addres </label>
                          <script src="ph-address-selector.js"></script>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Region  </label>

                                  <select class="input-group input-group-md input-group shadow-none " id="region" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-group input-group-md input-group shadow-none" name="Region" id="region-text" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province  </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="province" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-group input-group-md input-group shadow-none" name="Province" id="province-text" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> City / Municipality  </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="city"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-group input-group-md input-group shadow-none" name="City" id="city-text"
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Barangay  </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="barangay"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"></select>
                                  <input type="hidden" class="input-group input-group-md input-group shadow-none" name="Barangay" id="barangay-text" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label for="street-text" class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Street <span style="color: gray; font-size: 13px">(Optional)</span>  </label>
                                  <input type="text" class="form-control form-control-md form-control shadow-none" name="Street" id="street-text"
                                         style="color: black; text-align: left; font-size: 13PX;">
                              </div>

                            </div>

                            <button type="submit" name="signup" class="btn btn-success mt-3" id="submit"  style="font-size: 12px;" disabled> Sign up </button>   

                            <div style="float: right;" class="mt-3">
                                <a href='signup_b.php?delete=<?php echo $email;?>' onclick='return deletee()' class="text-secondary ../assets/icon-move-right" style="text-decoration: none;" > 
                                   <h5 style='font-size: 12px; font-weight: normal; color: #000066;'> Cancel 
                                    <i style='color: #000066;' class='fas fa-arrow-right ms-2 mb-3 me-1 mt-3 mt-md-3'></i>
                                  </h5> 
                                </a>
                            </div>

                            <script type="text/javascript">
                                window.history.forward();
                                function deletee() {
                                return confirm ('All of the details you input will be deleted, are you sure you want to cancel your registration?');
                                }
                            </script>

                      </form>                         
                        
<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// NEW PASSWORD
$(document).ready(function() {
// The strong and weak password Regex pattern checker
var phone_number = /^(\+[639]{3,3})\d{9}$/;

$('#new_number').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

// IF EMPTY NEW EMAIL INPUT DISABALE BUTTON SUBMIT
if ($('#new_number').val() === '') {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);

// IF NEW EMAIL IS VALID ENABLE BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val()) == true) {
  $('#new_phone').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid new phone number </span></span>');
  $('#submit').removeClass('.btn').prop('disabled', 0);    
  return true;

// IF NEW EMAIL IS NOT VALID BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val().length < 13) == false) {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid new phone number +639xxxxxxxxx  </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);    
}

return false;

});

$('#new_number').trigger('input');

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

</section>

</body>
</html>

