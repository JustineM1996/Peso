<?php include 'session.php';?>
<?php include 'navbar.php';?> 

<!-- ON OTP --> 
<?php

include '../database/database.php';

if(isset($_GET['otp'])) {

$id = $_GET['id'];
$email = $_GET['email'];    

  $code = rand(999999, 111111);
  $query = "UPDATE account SET login_verify_code = '$code',
                               login_verify = '1' WHERE id = '$id'";
  $data_check = mysqli_query($con, $query);

      if ($data_check) {

         $subject = "Login Verification Code";
         $message = "Your verification code is $code";
         $sender = "From: pesostamariabulacan@gmail.com";

         if (mail($email, $subject, $message, $sender)) {

               $info = "We've sent a verification code to your email - $email";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;

               ?>
              
                  <script>
                     let text = 'Stay login! Either ok or cancel.';

                     if (confirm(text) == true) {
                         window.location = '/peso/admin/account-view.php?id=<?php echo $id;?>';
                     } else {
                       window.location = '../login/logout.php?id=<?php echo $id;?>';
                     }
                  </script>

               <?php   

         } 

      } 

   } 

?>



<!-- OFF OTP -->
<?php

include '../database/database.php';

if(isset($_GET['remove'])) {

$id = $_GET['id'];
$email = $_GET['email'];  
  
  $query = "UPDATE account SET login_verify_code = '0',
                               login_verify = '0' WHERE id = '$id'";
  $data_check = mysqli_query($con, $query);

      if ($data_check) {

         $subject = "Login Verification Code";
         $message = "Your verification code is $code";
         $sender = "From: pesostamariabulacan@gmail.com";

         if (mail($email, $subject, $message, $sender)) {

               $info = "We've sent a verification code to your email - $email";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;

               ?>

                  <script>
                     let text = 'Stay login! Either ok or cancel.';

                     if (confirm(text) == true) {
                         window.location = '/peso/admin/account-view.php?id=<?php echo $id;?>';
                     } else {
                       window.location = '../login/logout.php?id=<?php echo $id;?>';
                     }
                  </script>

               <?php   

         } 

      } 

   }  

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
  <!-- TITLE -->
  <title> PESO - Account Details </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>
  
<style type='text/css'>

  .btn-secondary {
    background: none;
    box-shadow: none;
    color: black;
    padding: 2px 10px;
  }                        

  .btn-secondary:hover {
    background-color: darkgray;
    box-shadow: none;
    color: black;
    padding: 2px 10px;
  }

  i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  i:hover {
    background-color: darkgray;
    box-shadow: none;
    color: black;
  }

  a i {
    background: none;
    box-shadow: none;
    color: black;
  }     

  a i:hover {
    background-color: darkgray;
    box-shadow: ;
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

<style>

.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: lightgray;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 3px;
  background-color: gray;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: lightgray;
}

input:focus + .slider {
  box-shadow: 0 0 1px black;
}

input:checked + .slider:before {
  -webkit-transform: translateX(18px);
  -ms-transform: translateX(18px);
  transform: translateX(18px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 35px;
}

.slider.round:before {
  border-radius: 50%;
}

.profilepic {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 100%;
  overflow: hidden;}

.profilepic:hover .profilepic__content {
  opacity: .8;
  background: #111;

}

.profilepic:hover .profilepic__image {
  opacity: .8;
  background: #111;

}

.profilepic__image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.profilepic__content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

</style>

</head>

<body>


<!-- START -->
<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-8 ms-lg-11">

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT account.id as acc_id,
                                   personal.per_id,
                                   personal.per_id

                                   FROM account LEFT JOIN personal ON personal.per_id = account.id WHERE account.id =  '".$_REQUEST['id']."'  ");

while($row = mysqli_fetch_array($query)){
?>


<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='account-info.php?id=<?php echo $row['acc_id'];?>' style="text-decoration: none; background: ;" >
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ACCOUNT <p> | Details </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<?php } ?>







<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM account WHERE id =  '".$_REQUEST['id']."'  ");
while($row = mysqli_fetch_array($query)){

$profile_acc = $row['image'];

?>

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 " style="background: none ; border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">

                      <?php if ($profile_acc == '') { ?>
                            <img class="profilepic__image w-100 border-radius-md shadow-lg" src='../images/default-avatar.png' alt='image' style="border-radius: 100%">

                     <?php  } else { ?>

                            <img class="profilepic__image w-100 border-radius-md shadow-lg" src='<?php echo $profile_acc ;?>' alt='image' style="border-radius: 100%">

                     <?php } ?>

                </div>
                </div>


                <!-- information -->
                <div class="col-lg-8 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">
                    
                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?>
                       <?php
                          
                        $verified = ($row['status']);
                        $account = ($row['Status_account']);
                         
                        if ($account > '0') {

                            if ($verified == 'verified') {

                                  echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> Main admin </span>";

                                } else {

                                  echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> Main admin </span>";
                                }

                            } else {

                                if ($verified == 'verified') {

                                  echo "<i class='fa fa-circle' style='color:green; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:green;'> User </span>";

                                } else {

                                  echo "<i class='fa fa-circle' style='color:#333; font-size: 6px; margin-left: 1%'></i> <span class='ms-2' style='font-size: 12px; color:#333;'> User </span>";
                                }

                            }

                        ?>
                      </span>
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



<div class="container mt-4">
<div class="row">

      <div class="col-lg-12 position-relative bg-cover px-0" >
      <div class="p-1 ps-sm-4 position-relative">

                <div class="col-lg-12 mx-auto">
                  <h4 class="" style="color: black; "> Information </h4>
                </div>


                <div class="col-lg-12 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" >
                <div class="col-lg-12 col-md-12 col-12">
                <div class="p-0 pe-md-0 ">

                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Birth Day </span>: <?php echo $row['Month'];?> <?php echo $row['Day'];?> <?php echo $row['Year'];?> </h6>
                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Gender </span>: <?php echo $row['Gender'];?></h6> 
                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Address </span>: 
                      <?php echo $row['Street'];?>, <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?>, <?php echo $row['Region'];?> </span> </h6>    
                    <h6 style="font-weight: normal; font-size: 13px; color: black;"><span style="font-weight: 500;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?></h6>

                  </div>
                  </div>
                  </div>

                </div>
                </div>


                <!-- Education -->
                <div class="col-lg-12 col-md-12 col-12 my-auto">             
                <div class="card-body ps-lg-0">

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 card-profile" >
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Email </span>: <?php echo $row['email'];?>  </h6>
                    </div>
                    </div>
                    </div>

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2 card-profile" >
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Password </span>: •••••••• </h6>
                    </div>
                    </div>
                    </div>

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2 card-profile" >
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Phone number </span>: <?php echo $row['Contant_Number'];?> </h6>
                    </div>
                    </div>
                    </div>
    
                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2">
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                        <h6 style="font-size: 14px; color: darkred; font-weight: normal;"><span style="font-weight: 500;"> Account permition </span>
                           <span style="float: right; font-weight: 500; font-size: 13px; color: black;">


                    <?php
                    
                    $verified = ($row['status']);
                    $account = ($row['Status_account']);

                    $id = ($row['id']);
                    $emails = ($row['email']);          

                     if ($account > '0'){

                      if ($verified == 'verified'){

                                  echo "<div class='app-card-actions'>
                                          <div class='dropdown' style='float: right; text-align: center;'>
                                            <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                              <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                            </svg>

                                            </div>

                                              <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                                  <li>
                                                  <form  action='active_inactive/deactivate_account.php' method='POST'>
                                                  <div hidden>
                                                  <input type='text' value='$emails' name='email'>
                                                  <input type='int' value='$id' name='id'>
                                                  </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                       <span>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                                          <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                                            <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                                            <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                                        </svg> 
                                                      </span>
                                                      <span class='ms-2'> Deactivate this account </span> 
                                                    </form>
                                                  </li>  

                                                  <li>
                                                  <form  action='active_inactive/remove_temporary_account.php' method='POST'>
                                                    <div hidden>
                                                    <input type='text' value='$emails' name='email'>
                                                    <input type='int' value='$id' name='id'>
                                                    </div>

                                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-x' viewBox='0 0 20 20'>
                                                          <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                                        </svg>
                                                      <span class='ms-2'> Remove as main admin this account </span> 
                                                  </form>
                                                  </li>  

                                                    <li>
                                                      <a class='dropdown-item' href='account-report.php?id=$id' >
                                                         <span>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                                            <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                                            <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                                          </svg>
                                                        </span>
                                                        <span class='ms-2'> Account Record </span> 
                                                      </a>
                                                    </li>  

                                              </ul>

                                          </div>
                                        </div>";


                                  } else {

                                    echo "<div class='app-card-actions'>
                                            <div class='dropdown' style='float: right; text-align: center;'>
                                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                              </svg>

                                              </div>

                                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>

                                                   <li>
                                                    <form  action='active_inactive/activate_account.php' method='POST'>
                                                      <div hidden>
                                                      <input type='text' value='$emails' name='email'>
                                                      <input type='int' value='$id' name='id'>
                                                      </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                         <span>
                                                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                              <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                              <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                              </svg>  
                                                        </span>
                                                        <span class='ms-2'> Activate this account </span> 
                                                    </form>
                                                    </li>   

                                                    <li>
                                                    <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                                      <div hidden>
                                                      <input type='text' value='$emails' name='email'>
                                                      <input type='int' value='$id' name='id'>
                                                      </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                                          <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                                        </svg>
                                                         <span class='ms-2'> Remove permanent this account </span> 
                                                    </form>
                                                    </li>  


                                                    <li>
                                                      <a class='dropdown-item' href='account-report.php?id=$id' >
                                                         <span>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                                            <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                                            <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                                          </svg>
                                                        </span>
                                                        <span class='ms-2'> Account Record </span> 
                                                      </a>
                                                    </li>  


                                                </ul>

                                              </div>
                                            </div>";


                                  }
                                  

                   
                         } else {

                      if ($verified == 'verified'){

                                  echo "<div class='app-card-actions'>
                                          <div class='dropdown' style='float: right; text-align: center;'>
                                            <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                              <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                            </svg>

                                            </div>

                                              <ul class='dropdown-menu' style='font-size: 13px; color: black;'> 
                                                  
                                                  <li>
                                                    <form  action='active_inactive/add_admin_account.php' method='POST'>
                                                      <div hidden>
                                                      <input type='text' value='$emails' name='email'>
                                                      <input type='int' value='$id' name='id'>
                                                      </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' fill='currentColor' class='bi bi-person-check' viewBox='0 0 16 16'>
                                                            <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
                                                            <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
                                                          </svg>
                                                      </span>
                                                      <span class='ms-2'> add main admin this account </span> 
                                                      </form>
                                                  </li> 

                                                  <li>
                                                    <form  action='active_inactive/deactivate_account.php' method='POST'>
                                                      <div hidden>
                                                      <input type='text' value='$emails' name='email'>
                                                      <input type='int' value='$id' name='id'>
                                                      </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                       <span>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                                          <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                                          <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                                          <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                                        </svg> 
                                                      </span>
                                                      <span class='ms-2'> Deactivate this account </span> 
                                                    </form>
                                                  </li>  


                                                    <li>
                                                      <a class='dropdown-item' href='account-report.php?id=$id' >
                                                         <span>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                                            <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                                            <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                                          </svg>
                                                        </span>
                                                        <span class='ms-2'> Account Record </span> 
                                                      </a>
                                                    </li>  


                                              </ul>


                                            </div>
                                          </div>";


                                  } else {

                                    echo "<div class='app-card-actions'>
                                            <div class='dropdown' style='float: right; text-align: center;'>
                                              <div class='dropdown-toggle no-toggle-arrow btn btn-secondary' data-bs-toggle='dropdown' aria-expanded='false'>

                                              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                                              </svg>

                                              </div>

                                                <ul class='dropdown-menu' style='font-size: 13px; color: black;'>                       

                                                    <li>
                                                    <form  action='active_inactive/activate_account.php' method='POST'>
                                                      <div hidden>
                                                      <input type='text' value='$emails' name='email'>
                                                      <input type='int' value='$id' name='id'>
                                                      </div>
                                                    <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                         <span>
                                                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                              <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                              <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                              </svg>  
                                                        </span>
                                                        <span class='ms-2'> Activate this account </span> 
                                                      </form>
                                                    </li>   

                                                    <li>
                                                      <form  action='active_inactive/remove_permanent_account.php' method='POST'>
                                                        <div hidden>
                                                        <input type='text' value='$emails' name='email'>
                                                        <input type='int' value='$id' name='id'>
                                                        </div>
                                                      <button type='submit' name='submit' class='dropdown-item' style='background: none; border: none'>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                                          </svg>
                                                           <span class='ms-2'> Remove permanent this account </span> 
                                                        </form>
                                                    </li>  

                                                    <li>
                                                      <a class='dropdown-item' href='account-report.php?id=$id' >
                                                         <span>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                                            <path d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z'/>
                                                            <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z'/>
                                                          </svg>
                                                        </span>
                                                        <span class='ms-2'> Account Record </span> 
                                                      </a>
                                                    </li>  

                                                </ul>

                                              </div>
                                            </div>";


                                      }
                                  

                               }


                       ?>

                  <script>
                      function temporary() {
                        return confirm ('Are you sure you want to temporary as admin this account');
                      }
                  </script>
                  <script>
                      function temporary_remove() {
                        return confirm ('Are you sure you want to remove temporary as admin this account');
                      }
                  </script>
                  <script>
                      function activate() {
                        return confirm ('Are you sure you want to activate this account');
                      }
                  </script>
                  <script>
                      function deactivate() {
                        return confirm ('Are you sure you want to deactivate this account');
                      }
                  </script>
                  <script>
                      function remove() {
                        return confirm ('Are you sure you want to remove permanently this account');
                      }
                  </script>  

                           </span> 
                        </h6>
                    </div>
                    </div>
                    </div>


                </div>
                </div>

          </div>
          </div>

      </div>
      </div>

</div>
</div>

<?php } ?>

</div>
</div>
</div>

</section>
<!-- END -->






</body>
</html>