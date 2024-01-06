<?php include 'session.php';?>

<?php

include '../database/database.php';

$com_errors = array();
$mail_errors = array();
$phone_errors = array();

if(isset($_POST['plus_company'])) {

    $ceo = $_POST['ceo']; 
    $category = $_POST['category'];

    $Region = $_POST['Region']; 
    $Province = $_POST['Province'];   
    $City = $_POST['City']; 
    $Barangay = $_POST['Barangay']; 
    $Street = $_POST['Street'];  

    $link = $_POST['link'];

    $company_view = $_POST['company_view'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // COMPANY NAME
    $company = $_POST['company'];
    $company_check = "SELECT * FROM company WHERE company = '$company'";
    $pass_company = mysqli_query($con, $company_check);

    if (mysqli_num_rows($pass_company) > 0) {

        $com_errors['company'] = "Company that you have entered is already exist.";
    }

        // COMPANY EMAIL
        $email = $_POST['email']; 
        $check_email = "SELECT * FROM company WHERE email = '$email'";
        $pass_email = mysqli_query($con, $check_email);

        if (mysqli_num_rows($pass_email) > 0) {

            $mail_errors['email'] = "Email that you have entered is already exist.";

            $email_required = '/^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/';
            preg_match($email_required, $email, $matches, PREG_OFFSET_CAPTURE, 0);

              // CHECK NEW EMAIL 18 OR MORE
              if ($matches == true) {
              } else {
                  $mail_errors['email'] = "Use 8 or more characters you can use letters, number & periods.";
              }

        }

            // COMPANY EMAIL
            $contact_number = $_POST['contact_number']; 
            $phone_number_email = "SELECT * FROM company WHERE contact_number = '$contact_number'";
            $pass_phone_number = mysqli_query($con, $phone_number_email);

            if (mysqli_num_rows($pass_phone_number) > 0) {

                $phone_errors['contact_number'] = "Phone number that you have entered is already exist.";

            }

                // IF NO ERROR
                if (count($com_errors) == 0) {
                    if (count($mail_errors) == 0) {
                        if (count($phone_errors) == 0) {

                           mysqli_query($con, "INSERT INTO company (company, Region, Province, City, Barangay, Street,
                                                                    category, link, description,  status, 
                                                                    ceo, company_view, contact_number, email)

                                               VALUES ('$company', '$Region', '$Province', '$City', '$Barangay', '$Street',
                                                       '$category', '$link', '$description', '$status', 
                                                       '$ceo', '$company_view', '$contact_number', '$email')");


                            $check_code = "SELECT * FROM company order by id desc ";
                            $code_res = mysqli_query($con, $check_code);

                            $fetch_data = mysqli_fetch_assoc($code_res);
                            $id = $fetch_data['id'];
                            
                            echo "<script>alert('Successfull add')</script>";
                            echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

                        }     
                    }
                } 
 
}

?>



<?php

if(isset($_GET['edit_company'])) {
  $edit_company = $_GET['edit_company'];

$company_id = array();
$company_errors = array();
$email_errors = array();
$phone_number_errors = array();

include '../database/database.php';

$company_query = mysqli_query($con,"SELECT * FROM company WHERE id = '$edit_company'");
while($row = mysqli_fetch_assoc($company_query)) {

  $company_id[] = $row['id'];

}

$query = mysqli_query($con, "SELECT * FROM company WHERE id NOT IN ('".implode( "', '" , $company_id)."')");
while($row = mysqli_fetch_array($query)){ 

      $company_name = $row['company'];
      $email_name = $row['email'];
      $phone_number_name = $row['contact_number'];

if(isset($_POST['update_company'])) {

    //CHECK COMPANY NAME
    $company = $_POST['company'];
    $company_check = mysqli_query($con, "SELECT * FROM company WHERE company = '$company' ");
    while($row = mysqli_fetch_array($company_check)) { 
    $company_view = $row['company'];

        if($company_view == $company_name) {

          $company_errors['company'] = "Company that you have entered is already exist.";
         
        }
    
    }

        //CHECK COMPANY NAME
        $email = $_POST['email'];
        $email_check = mysqli_query($con, "SELECT * FROM company WHERE email = '$email' ");
        while($row = mysqli_fetch_array($email_check)) { 
        $email_view = $row['email'];

            if($email_view == $email_name) {

              $email_errors['email'] = "Email that you have entered is already exist.";
             
              $email_required = '/^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/';
              preg_match($email_required, $email, $matches, PREG_OFFSET_CAPTURE, 0);

              // CHECK NEW EMAIL 18 OR MORE
              if ($matches == true) {
              } else {
                  $email_errors['email'] = "Use 8 or more characters you can use letters, number & periods.";
              }

            }
        
        }

                //CHECK COMPANY NAME
                $contact_number = $_POST['contact_number'];
                $contact_number_check = mysqli_query($con, "SELECT * FROM company WHERE contact_number = '$contact_number' ");
                while($row = mysqli_fetch_array($contact_number_check)) { 
                $phone_number_view = $row['contact_number'];

                    if($phone_number_view == $phone_number_name) {

                      $phone_number_errors['contact_number'] = "Phone number that you have entered is already exist.";
                     
                    }
                
                }

                // IF NO ERROR
                if (count($company_errors) == 0) {
                    if (count($email_errors) == 0) {
                        if (count($phone_number_errors) == 0) {

                          $id = $_POST['id'];
                          $ceo = $_POST['ceo'];
                          $company = $_POST['company'];
                          $category = $_POST['category'];

                          $Region = $_POST['Region']; 
                          $Province = $_POST['Province'];   
                          $City = $_POST['City']; 
                          $Barangay = $_POST['Barangay']; 
                          $Street = $_POST['Street'];  
                          
                          $email = $_POST['email'];
                          $contact_number = $_POST['contact_number']; 
                          $link = $_POST['link'];

                          $company_view = $_POST['company_view'];
                          $description = $_POST['description'];    
                          
                          $update =  "UPDATE company SET

                            id = '$id',
                            ceo = '$ceo',
                            company = '$company',
                            category = '$category',

                            Region = '$Region', 
                            Province = '$Province', 
                            City = '$City', 
                            Barangay = '$Barangay', 
                            Street = '$Street', 

                            email = '$email',
                            contact_number = '$contact_number',                            
                            link = '$link',

                            company_view = '$company_view',
                            description = '$description'
                            
                            WHERE id = '$id' ";

                          $data_check = mysqli_query($con, $update);

                            echo "<script>alert('Successfull update')</script>";
                            echo "<script>window.location = '/peso/admin/company-info.php?id=$id'</script>";

                        }     
                    }
                } 
 
}
}
}
?>

<?php

include '../database/database.php';

if(isset($_GET['delete_company'])){

$delete_company = $_GET['delete_company'];

    $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$delete_company'");
    while($row = mysqli_fetch_assoc($query)) {

    $images = '../images/'.$row['images'];;

    if (file_exists($images)) {
        unlink($images);
    }

    }

    mysqli_query($con,"DELETE FROM company WHERE id = '$delete_company'");
    mysqli_query($con,"DELETE FROM job WHERE company_id = '$delete_company'");
    mysqli_query($con,"DELETE FROM applicant WHERE company_id = '$delete_company'");

     echo "<script>alert('Successfull delete')</script>";
     echo "<script>window.location = '/peso/admin/company.php'</script>"; 

}

?>



<?php

// INACTIVE COMPANY
include '../database/database.php';

if(isset($_GET['inactive_company'])){

$inactive_company = $_GET['inactive_company'];

    mysqli_query($con,"UPDATE company SET status = 'Inactive' WHERE id = '$inactive_company'");
    mysqli_query($con,"UPDATE job SET company_status = 'Inactive' WHERE company_id = '$inactive_company'");
    mysqli_query($con,"UPDATE applicant SET company_status = 'Inactive' WHERE company_id = '$inactive_company'");

     echo "<script>alert('Successfull inactivate company')</script>";
     echo "<script>window.location = '/peso/admin/company.php'</script>"; 

}

?>

<?php

include '../database/database.php';

// ACTIVE COMPANY
if(isset($_GET['active_company'])){

$active_company = $_GET['active_company'];

    mysqli_query($con,"UPDATE company SET status = 'Active' WHERE id = '$active_company'");
    mysqli_query($con,"UPDATE job SET company_status = 'Active' WHERE company_id = '$active_company'");
    mysqli_query($con,"UPDATE applicant SET company_status = 'Active' WHERE company_id = '$active_company'");

     echo "<script>alert('Successfull activate company')</script>";
     echo "<script>window.location = '/peso/admin/company.php'</script>"; 

}

?>



<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

  <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Company </title>

<style type="text/css">

.no-result {
  display:none;
}

body::-webkit-scrollbar
{
   width: 10px;
}

body::-webkit-scrollbar-thumb
{
   height: 80px;
   background: #333;
   border: 8px solid transparent;
   border-radius: 5PX;
}

body::-webkit-scrollbar-thumb:active
{
    background: #333;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 4px 10px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: #333;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

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

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['add_company'])) {

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company.php' style="text-decoration: none; background: none ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> COMPANY <p> | Add company  </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- FORM START -->
<form enctype="multipart/form-data" method="POST"> 

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 " style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <img class='w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' alt='image'>
                </div>
                </div>
                
                <!-- information -->
                <div class="col-lg-10 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                    <h6 style="font-size: 15px; color: black;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-1">
                        <input type="text" class="col-lg-10" id="Ceo" placeholder="Ceo name" style="font-size: 15px; color: black; border: none; font-weight: bold; background: none;" disabled>
                      </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Company" placeholder="Company name" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-1"> 

                          <script src="ph-address-selector.js"></script>

                                  <input type="text" class="col-lg-10" name="Region" id="region-text" placeholder="Region" 
                                         style="font-size: 14px; color: black; border: none; background: none;" >

                                  <input type="text" class="col-lg-10 ms-4" name="Province" id="province-text" placeholder="Province" 
                                         style="font-size: 14px; color: black; border: none; background: none;">

                                  <input type="text" class="col-lg-10 ms-4" name="City" id="city-text" placeholder="City" 
                                         style="font-size: 14px; color: black; border: none; background: none;">

                                  <input type="text" class="col-lg-10 ms-4" name="Barangay" id="barangay-text" placeholder="Barangay" 
                                         style="font-size: 14px; color: black; border: none; background: none;">

                                  <input type="text" class="col-lg-10 ms-4" placeholder="Street"
                                         style="font-size: 14px; color: black; border: none; background: none; outline: none;" disabled>

                      </span>
                    </h6> 

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Email" placeholder="Company email address" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>
  
                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Number" placeholder="Company phone number" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                          <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                          <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                        </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Link" placeholder="Website link" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>

                      <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                          <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>

                      <span class="ms-1">
                        <?php   date_default_timezone_set('Asia/Manila');
                                $date = date('F d, Y'); ?>
                        <span style="font-weight: normal;"> Date Create . </span> <?php echo $date ;?> 
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


<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class=" border-radius-xl p-4 h-100 ">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-12 mx-auto">
                  <h4 class="" style="color: black; "> Information </h4>
                </div>

                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Company Details </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Ceo <span style="color: gray; font-size: 13px">(Optional)</span>
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="ceo" id="Ceo_input" oninput="handleValueChange()"
                                         placeholder=" Enter ceo name" class="form-control shadow-none">
                                </div>
                               </p>
                              </li>

                              <li class="nav-item col-lg-5 col-12 col-md-12 ms-1">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Company *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="company" id="Company_input" oninput="handleValueChange()"
                                         placeholder=" Enter company name" class="form-control shadow-none" required>

                                    <?php if(count($com_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($com_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($com_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($com_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>                                         

                                </div>
                               </p>
                              </li>

                                <li class="nav-item col-lg-12 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *
                                  <div class="form-label-group">
                                    <select class="input-group shadow-none" type="int" name="category" 
                                      style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 

                                      <option disabled selected > Choose category </option>

                                      <?php

                                      include '../database/database.php';
                                      if(isset($_GET['add_company'])) {
                                      $query = mysqli_query($con,"SELECT * FROM company_category order by id desc");
                                      while($row = mysqli_fetch_array($query)){

                                      ?>
                                      <option style="color: black;" value="<?php echo $row['category']; ?>"
                                              required > <?php echo $row['category']; ?> </option>

                                      <?php } } ?>    

                                    </select>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <!-- COMPLETE ADDRESS -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Complete Addres </label>
                          
                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Region * </label>
                                  <select class="input-group input-group-md input-group shadow-none " id="region"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                  </select>

                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province * </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="province" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                  </select>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> City / Municipality * </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="city"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                  </select>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Barangay * </label>
                                  <select class="input-group input-group-md input-group shadow-none" id="barangay"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                 </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label for="street-text" class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Street <span style="color: gray; font-size: 13px">(Optional)</span>  </label>
                                  <input type="text" class="form-control form-control-md form-control shadow-none" name="Street" id="street-text" placeholder="Enter street" oninput="handleValueChange()"
                                         style="color: black; text-align: left; font-size: 13PX;">
                              </div>

                            </div>



                          <div class="nav-wrapper position-relative mt-3">
                          <label class="mt-2 text-sm" >  General Information   </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Vision and Mision only *
                                  <div class="form-label-group">
                                  <textarea name="company_view" rows="10" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type description" required
                                            style="color:black; font-size: 13px" ></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description *
                                  <div class="form-label-group">
                                     <textarea name="description" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type requirements" required
                                               style="color:black; font-size: 13px"></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-5">
                          <label class="text-sm"> Contact Information </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-12 col-md-12 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Email *
                                <div class="form-label-group">
                                  <input type="email" style="color: black; font-size: 13PX;" name="email" id="old_email" oninput="handleValueChange()" required 
                                         class="form-control shadow-none old_email"  placeholder="Enter email">
                                    
                                    <?php if(count($mail_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($mail_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($mail_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($mail_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>

                                </div>
                               </p>
                              </li>
                              <li class="nav-item col-12 col-md-12 col-lg-5 mt-lg-4" style="text-align: left;"><span id='old' class="ms-3"></span></li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-2">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                              <li class="nav-item col-12 col-md-12 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Contact Number *
                                <div class="form-label-group">
                                  <input type="tel" style="color: black; font-size: 13PX;" name="contact_number" id="new_number" oninput="handleValueChange()" required
                                         minlength="0" maxlength="13" class="form-control shadow-none new_number"  placeholder="Enter contact number" 
                                         onkeypress="return onlyNumberKey(event)">

                                    <?php if(count($phone_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($phone_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($phone_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($phone_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>

                                </div>
                               </p>
                              </li>
                              <li class="nav-item col-12 col-md-12 col-lg-5 mt-lg-4" style="text-align: left;"><span id='new_phone' class="ms-3"></span></li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-2">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Website Link <span style="color: gray; font-size: 13px">(Optional)</span>
                                <div class="form-label-group">
                                  <input type="url" style="color: black; font-size: 13PX;" name="link" id="Link_input" oninput="handleValueChange()"
                                         class="form-control shadow-none"  placeholder=" Enter website link ">
                                </div>
                               </p>
                              </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                              <li class="nav-item ms-lg-1">
                                <input type="text" style="color: black; font-size: 13PX;" name="posted_by" 
                                       value="<?php echo $F_acc ?> <?php echo $M_acc?> <?php echo $L_acc?>" 
                                       class="form-control shadow-none" readonly hidden>
                              </li>

                              <li class="nav-item ms-lg-1">
                                <input type="text" style="color: black; font-size: 13PX;" name="status" 
                                       value="Active" 
                                       class="form-control shadow-none" readonly hidden>
                              </li>

                          </ul>
                          </div>

                          <!-- DATE FILTER -->
                          <script type="text/javascript">

                          // How do I restrict past dates in html5 input type Date // form date
                          $(function(){
                              var dtToday = new Date();
                              var month = dtToday.getMonth() + 1;
                              var day = dtToday.getDate();
                              var year = dtToday.getFullYear();
                              if(month < 10)
                                  month = '0' + month.toString();
                              if(day < 10)
                                 day = '0' + day.toString();
                              var minDate= year + '-' + month + '-' + day;
                              $('#date_filter').attr('min', minDate);
                          });

                          </script>

                          <button type="submit" name="plus_company" id="submit" class="btn btn-success mt-3 col-lg-1 col-2 col-md-2" style="color: white; font-size: 12px;"> SAVE </button>
  
              </div>
              </div>

      </div>
      </div>

</div>
</div>


<!-- UNPUT DATA -->
<script type="text/javascript">
  function handleValueChange() {

    var y = document.getElementById('Ceo_input').value;
    var x = document.getElementById('Ceo');
    x.value = y;

    var y = document.getElementById('Company_input').value;
    var x = document.getElementById('Company');
    x.value = y;  

    var y = document.getElementById('old_email').value;
    var x = document.getElementById('Email');
    x.value = y;

    var y = document.getElementById('new_number').value;
    var x = document.getElementById('Number');
    x.value = y;

    var y = document.getElementById('Link_input').value;
    var x = document.getElementById('Link');
    x.value = y;

    var y = document.getElementById('street-text').value;
    var x = document.getElementById('Street');
    x.value = y;

}
</script>

<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// OLD PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
var email = /^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/;

$('#old_email').on('input', function() {
$('span.error_old').remove();
$('span.valid_old').remove();

// IF EMPTY CURRENT EMAIL INPUT DISABALE NEW EMAIL INPUT
if ($('#old_email').val() === '') {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');

// IF CURRENT EMAIL IS VALID ENABLE NEW EMAIL INPUT
} else if (email.test($('#old_email').val()) == true) {
  $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid email address </i></span>');
  return true;

// IF CURRENT EMAIL IS NOT VALID DISABLE NEW EMAIL
} else if (email.test($('#old_email').val().length < 18) == false) {
  $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Not valid email address </i></span>');
  return false;
} 
});

$('#old_email').trigger('input');

});

</script>

      
                        
<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// NEW PASSWORD
$(document).ready(function() {
// The strong and weak password Regex pattern checker
var phone_number = /^(\+639)\d{9}$/;


$('#new_number').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

// IF EMPTY NEW EMAIL INPUT DISABALE BUTTON SUBMIT
if ($('#new_number').val() === '') {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);

// IF NEW EMAIL IS VALID ENABLE BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val()) == true) {
  $('#new_phone').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid phone number </span></span>');
  $('#submit').removeClass('.btn').prop('disabled', 0);    
  return true;

// IF NEW EMAIL IS NOT VALID BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val().length < 13) == false) {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid phone number +639xxxxxxxxx </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);    
}

return false;

});

$('#new_number').trigger('input');

});

</script>

 </form>

<?php } ?> 



































<?php

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['edit_company'])) {
  $edit_company = $_GET['edit_company'];

  $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$edit_company'");
  while($row = mysqli_fetch_array($query)) {

$Company_profile = $row['images'];
$ceo_profile = $row['ceo_profile'];
$ceo = $row['ceo'];
$company_size = $row['company_size'];
$email = $row['email'];
$contact_number = $row['contact_number'];
$link = $row['link'];

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company-info.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function apply() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> COMPANY <p> | Update details  </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

<!-- START -->
<div class="container">
<div class="row">

    <div class="col-lg-12">
    <div class="info-horizontal border-radius-xl d-block d-block d-md-flex p-4 h-100 " style="border: 1px solid lightgray;">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

                <div class="col-lg-2 col-md-12 col-12 mt-3">
                <div class="p-0 pe-md-0 ">
                      <?php
                         if ($Company_profile == '') {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='../images/default-avatar.png' alt='image'> ";
                          } else {
                            echo "<img class='w-100 border-radius-md shadow-lg' src='$Company_profile' alt='image'>";
                         }
                      ?>
                </div>
                </div>
                
                <!-- information -->
                <div class="col-lg-10 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">


              <?php if ($ceo == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 15px; color: black; ">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $ceo;?> </span>
                    </h6>

              <?php  } ?>


              <?php if ($ceo == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $row['company'];?> </span>
                    </h6>

              <?php  } ?>


                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                      <span class="ms-2">
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?>, <?php echo $row['Region'];?> </span>
                    </h6>          


              <?php if ($email == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                      <span class="ms-2"><?php echo $email;?></span>
                    </h6>

              <?php  } ?>


              <?php if ($contact_number == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      <span class="ms-2"><?php echo $contact_number;?></span>
                    </h6>

              <?php  } ?>


              <?php if ($link == '') { ?>

              <?php } else { ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                          <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                          <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                        </svg>
                      <span class="ms-2"> 
                        <a  href="<?php echo $row['link'];?>" class='card-profile'>
                         <input type="text" class="col-lg-10" value="<?php echo $row['link'];?>" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                        </a>
                    </h6>

              <?php  } ?>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>

                    <span class="ms-2">
                      <span style="font-weight: normal;"> Date create . </span> <?php echo date("F d, Y", strtotime ($row['date_posted']));?>
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

<!-- START -->
<div class="container mt-3">
<div class="row">

    <div class="col-lg-12">
    <div class=" border-radius-xl p-4 h-100 ">

        <div class="ps-md-0 mt-md-0">
        <div class="row">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Information </h4>
        </div>

                      <!-- FORM START -->
                      <form  enctype="multipart/form-data" method="POST" > 

                      <input name="id" value="<?php echo $row['id']; ?>" readonly hidden >


                          <div class="nav-wrapper position-relative mt-4">
                          <label class="text-sm"> Company Details </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Ceo <span style="color: gray; font-size: 13px">(Optional)</span>
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="ceo" placeholder="Enter ceo name" value="<?php echo $row['ceo']; ?>" 
                                         class="form-control shadow-none" >
                                </div>
                               </p>
                              </li>

                              <li class="nav-item col-lg-5 col-12 col-md-12 ms-1">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Company *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="company" placeholder="Enter company name" value="<?php echo $row['company']; ?>" 
                                         class="form-control shadow-none" required>

                                    <?php if(count($company_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($company_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($company_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($company_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>   

                                </div>
                               </p>
                              </li>


                                <li class="nav-item col-lg-12 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="category" required
                                      style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;">
                                      <option style="color: black;" value="<?php echo $row['category']; ?>" hidden > <?php echo $row['category']; ?> </option> 
                        <?php } } ?> 
                                      <?php

                                      include '../database/database.php';

                                      if(isset($_GET['edit_company'])) {

                                      $query = mysqli_query($con,"SELECT * FROM company_category order by id desc");
                                      while($row = mysqli_fetch_array($query)){

                                      ?>

                                     <option style="color: black;" value="<?php echo $row['category'];?>" > <?php echo $row['category']; ?> </option>

                                     <?php } } ?>    

                                    </select>
                                  </div>
                                </p>
                                </li>
                          </ul>
                          </div>

                        <?php

                        // COMPANY PROFILE
                        include '../database/database.php';

                        if(isset($_GET['edit_company'])) {
                          $edit_company = $_GET['edit_company'];

                          $query = mysqli_query($con,"SELECT * FROM company WHERE id = '$edit_company'");
                          while($row = mysqli_fetch_array($query)) {

                        ?>

                          <!-- COMPLETE ADDRESS -->
                          <div class="nav-wrapper position-relative mt-3">
                          <label class="text-sm"> Complete Addres </label>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Region *</label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="region" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;">
                                          <option disabled selected hidden><?php echo $row['Region']; ?></option>    
                                 </select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Region" id="region-text" value="<?php echo $row['Region']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Province *</label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="province" 
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;">
                                          <option><?php echo $row['Province']; ?></option>    
                                 </select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="Province" id="province-text" value="<?php echo $row['Province']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> City / Municipality *</label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="city"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                          <option><?php echo $row['City']; ?></option>  
                                  </select>
                                  <input type="hidden" class="input-groupl input-groupl-md input-groupl shadow-none" name="City" id="city-text" value="<?php echo $row['City']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-sm-6 mb-3">
                                  <label class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Barangay *</label>
                                  <select class="input-group input-groupl-md input-groupl shadow-none" id="barangay"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;">
                                          <option><?php echo $row['Barangay']; ?></option>      
                                  </select>
                                  <input type="hidden" class="input-groupl input-groupl-md form-control shadow-none" name="Barangay" id="barangay-text" value="<?php echo $row['Barangay']; ?>" 
                                         style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label for="street-text" class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Street <span style="color: gray; font-size: 13px">(Optional)</span>  </label>
                                  <input type="text" class="form-control form-control-md form-control shadow-none" name="Street" id="street-text" value="<?php echo $row['Street']; ?>" 
                                         style="color: black; text-align: left; font-size: 13PX;">
                              </div>

                            </div>



                          <div class="nav-wrapper position-relative mt-3">
                          <label class="mt-2 text-sm" >  General Information   </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Vision and Mision only *
                                  <div class="form-label-group">
                                  <textarea name="company_view" rows="10" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type description" required
                                            style="color:black; font-size: 13px" ><?php echo $row['company_view'];?></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description *
                                  <div class="form-label-group">
                                     <textarea name="description" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type requirements" required
                                               style="color:black; font-size: 13px"><?php echo $row['description'];?></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>


                          <div class="nav-wrapper position-relative mt-5">
                          <label class="text-sm"> Contact Information </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-12 col-md-12 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Email *
                                <div class="form-label-group">
                                  <input type="email" style="color: black; font-size: 13PX;" name="email" id="old_email" required
                                         class="form-control shadow-none old_email"  placeholder="Enter email" 
                                         value="<?php echo $row['email']; ?>">

                                    <?php if(count($email_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($email_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($email_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($email_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>   

                                </div>
                               </p>
                              </li>
                              <li class="nav-item col-12 col-md-12 col-lg-5 mt-4" style="text-align: left;"><span id='old' class="ms-3"></span></li>

                          </ul>
                          </div>


                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                              <li class="nav-item col-12 col-md-12 col-lg-5">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Contact Number *
                                <div class="form-label-group">
                                  <input type="tel" style="color: black; font-size: 13PX;" name="contact_number" id="new_number" required
                                         minlength="0" maxlength="13" class="form-control shadow-none new_number"  placeholder="Enter contact number" 
                                         value="<?php echo $row['contact_number'];?>" onkeypress="return onlyNumberKey(event)">

                                    <?php if(count($phone_number_errors) == 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($phone_number_errors as $showerror) { ?>
                                               <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } else if (count($phone_number_errors) > 1) { ?>

                                      <span class="mt-2" style="color: red; font-size: 12px; float: left; background: none">
                                          <?php foreach ($phone_number_errors as $showerror) { ?>
                                              <i class="bi bi-exclamation-circle-fill"></i> <span class="ms-2"><?php echo $showerror; ?></span>
                                          <?php } ?>
                                      </span>

                                    <?php } ?>   

                                </div>
                               </p>
                              </li>
                              <li class="nav-item col-12 col-md-12 col-lg-5 mt-4" style="text-align: left;"><span id='new_phone' class="ms-3"></span></li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Website Link <span style="color: gray; font-size: 13px">(Optional)</span>
                                <div class="form-label-group">
                                  <input type="url" style="color: black; font-size: 13PX;" name="link" value="<?php echo $row['link']; ?>" class="form-control shadow-none" >
                                </div>
                               </p>
                              </li>

                          </ul>
                          </div>

                          <!-- DATE FILTER -->
                          <script type="text/javascript">

                          // How do I restrict past dates in html5 input type Date // form date
                          $(function(){
                              var dtToday = new Date();
                              var month = dtToday.getMonth() + 1;
                              var day = dtToday.getDate();
                              var year = dtToday.getFullYear();
                              if(month < 10)
                                  month = '0' + month.toString();
                              if(day < 10)
                                 day = '0' + day.toString();
                              var minDate= year + '-' + month + '-' + day;
                              $('#date_filter').attr('min', minDate);
                          });

                          </script>

                          <button type="submit" name="update_company" id="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;" disabled> UPDATE </button>

                      </form>

              </div>
              </div>

      </div>
      </div>

</div>
</div>

<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// OLD PASSWORD
$(document).ready(function() {

// The strong and weak password Regex pattern checker
var email = /^([A-Za-z0-9_\-\.]{8,30})+\@([gmail]{5,5})+\.([com]{3,3})$/;

$('#old_email').on('input', function() {
$('span.error_old').remove();
$('span.valid_old').remove();

// IF EMPTY CURRENT EMAIL INPUT DISABALE NEW EMAIL INPUT
if ($('#old_email').val() === '') {
    $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');

// IF CURRENT EMAIL IS VALID ENABLE NEW EMAIL INPUT
} else if (email.test($('#old_email').val()) == true) {
  $('#old').after('<span class="valid_old" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid email address </i></span>');
  return true;

// IF CURRENT EMAIL IS NOT VALID DISABLE NEW EMAIL
} else if (email.test($('#old_email').val().length < 18) == false) {
  $('#old').after('<span class="error_old" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Not valid email address </i></span>');
  return false;
} 

});

$('#old_email').trigger('input');

});

</script>
                       
                        
<!-- CHECK IF EMAIL IS VALID -->
<script type="text/javascript">

// NEW PASSWORD
$(document).ready(function() {
// The strong and weak password Regex pattern checker
var phone_number = /^(\+639)\d{9}$/;


$('#new_number').on('input', function() {
$('span.error_new').remove();
$('span.valid_new').remove();

// IF EMPTY NEW EMAIL INPUT DISABALE BUTTON SUBMIT
if ($('#new_number').val() === '') {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-pencil" style="color:gray; font-size: 15px; text-align: left;"> </i><span class="ms-2"> Fill </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);

// IF NEW EMAIL IS VALID ENABLE BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val()) == true) {
  $('#new_phone').after('<span class="valid_new" style="color: black; font-size: 13px"><i class="fa fa-check" style="color:green; font-size: 15px; text-align: left;"></i><span class="ms-2"> Valid phone number </span></span>');
  $('#submit').removeClass('.btn').prop('disabled', 0);    
  return true;

// IF NEW EMAIL IS NOT VALID BUTTON SUBMIT
} else if (phone_number.test($('#new_number').val().length < 13) == false) {
  $('#new_phone').after('<span class="error_new" style="color: black; font-size: 13px"><i class="fa fa-close" style="color:red; font-size: 15px; text-align: left;"></i><span class="ms-2"> Invalid phone number +639xxxxxxxxx </span></span>');
  $('#submit').addClass('.btn').prop('disabled', 1);    
}

return false;

});

$('#new_number').trigger('input');

});

</script>

<?php } } ?>































</div>
</div>
</div>

</section>
<!-- END -->

<script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>

</body>
</html>

