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
                     let point = 'Stay login! Either ok or cancel.';

                     if (confirm(point) == true) {
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

  <a class="col-lg-1" href='account.php?id=<?php echo $row['acc_id'];?>' style="text-decoration: none; background: none ;" >
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

                        <a href='account-pic-edit.php?id=<?php echo $row['id'];?>'>
                          <div class="profilepic shadow">
                            <img class="profilepic__image w-100 shadow" src='../images/default-avatar.png' alt='image'>
                            <div class="profilepic__content">
                              <span><i class="fas fa-camera" style="color: white;"></i></span>
                              <span style="font-size: 10px;">Edit Profile</span>
                            </div>
                          </div>
                        </a>

                     <?php  } else { ?>

                        <a href='account-pic-edit.php?id=<?php echo $row['id'];?>'>
                          <div class="profilepic shadow">
                            <img class="profilepic__image w-100 shadow" src='<?php echo $profile_acc ;?>' alt='image'>
                            <div class="profilepic__content">
                              <span><i class="fas fa-camera" style="color: white;"></i></span>
                              <span style="font-size: 10px;">Edit Profile</span>
                            </div>
                          </div>
                        </a>

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
                <a href="account-info-edit.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" >

                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Birth Day </span>: 
                       <?php echo $row['Month'];?> <?php echo $row['Day'];?> <?php echo $row['Year'];?>
                    </h6>
                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Gender </span>: <?php echo $row['Gender'];?></h6> 
                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Address </span>: 
                      <?php echo $row['Street'];?>, <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?>, <?php echo $row['Region'];?> </span>
                    </h6>    
                    <h6 style="font-weight: normal; font-size: 13px; color: black;"><span style="font-weight: 500;"> Date Create </span>: <?php echo date("F d, Y", strtotime ($row['date_time']));?>
                      <span style="float: right; font-weight: 500; font-size: 13px;"> Edit Info <i class='fas fa-angle-right ms-2'></i></span> 
                    </h6>

                  </a>
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
                    <a href="account-email-edit.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" >
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Email </span>: <?php echo $row['email'];?> 
                        <span style="float: right; font-weight: 500; font-size: 13px;"> Change Email <i class='fas fa-angle-right ms-2'></i></span>   
                      </h6>
                    </a>
             
                    </div>
                    </div>
                    </div>

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2 card-profile" >
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                    <a href="account-pass-edit.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" >
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Password </span>: ••••••••
                        <span style="float: right; font-weight: 500; font-size: 13px;"> Change Password <i class='fas fa-angle-right ms-2'></i></span>   
                      </h6>
                    </a>
             
                    </div>
                    </div>
                    </div>

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2 card-profile" >
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                    <a href="account-no-edit.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" >
                      <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Phone number </span>: <?php echo $row['Contant_Number'];?>
                         <span style="float: right; font-weight: 500; font-size: 13px;"> Change Phone Number <i class='fas fa-angle-right ms-2'></i></span> 
                      </h6>
                     </a>
                    </div>
                    </div>
                    </div>

                    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 mt-2 card-profile" style="border: 1px solid lightgray;">
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                    <div class="p-0 pe-md-0 ">
                    <h6 style="font-size: 14px; color: black; font-weight: normal;"><span style="font-weight: 500;"> Two-factor authentication</span>

                        <?php 

                         $id = $row['id'];
                         $email = $row['email'];
                         $verify = $row['login_verify'];
                         $otp = $row['login_verify_code'];

                         if($otp == '0' && $verify == '0') { ?>

                            <label class='switch mt-0'>
                              <form action='#' method='GET'>
                                <div hidden>
                                <input type='email' value='<?php echo $email ;?>' name='email'>
                                <input type='int' value='<?php echo $id; ?>' name='id'>
                                </div>

                                <button type='submit' name='otp' style="background: none; border: none;" onclick='return on()'>
                                <input type='checkbox' >                          
                                <span class='slider round'></span>                                          
                                </button>

                              </form>
                            </label> off 

                        <?php } else { ?>

                            <label class='switch mt-0'>
                              <form action='#' method='GET'>
                                <div hidden>
                                <input type='email' value='<?php echo $email ;?>' name='email'>
                                <input type='int' value='<?php echo $id; ?>' name='id'>
                                </div>

                                <button type='submit' name='remove' style="background: none; border: none;" onclick='return off()'>
                                <input type='checkbox' checked>                          
                                <span class='slider round'></span>                                          
                                </button>

                              </form>
                            </label> on 

                        <?php  } ?>

                     </h6>

                          <script type="text/javascript">
                              function on() {
                              return confirm ('Are you sure you want to on otp');
                              }
                          </script>

                           <script type="text/javascript">
                              function off() {
                              return confirm ('Are you sure you want to off otp');
                              }
                          </script>
                                                   
                     <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                     Two-factor authentication is a security feature that requires individuals to enter a special security code each time they try to access account from a browser or mobile device we don't recognize.
                    </h6>


                    </div>
                    </div>
                    </div>   


                      <a href="close-account.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" hidden>
                        <h6 style="font-size: 14px; color: darkred; font-weight: normal;"><span style="font-weight: 500;"> Delete my account </span>: 
                           <span style="float: right; font-weight: 500; font-size: 13px; color: black;"> Delete <i class='fas fa-angle-right ms-2'></i></span> 
                        </h6>
                       </a>


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