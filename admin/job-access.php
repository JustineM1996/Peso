<?php include 'session.php';?>

<?php

// INACTIVE COMPANY
include '../database/database.php';

if(isset($_GET['end_job'])){

$date = date('Y-m-d');
$end_job = $_GET['end_job'];

    mysqli_query($con,"UPDATE job SET job_status = 'Inactive',
                                      date_ended = null,
                                      end_job = '$date' WHERE id = '$end_job'");

     echo "<script>alert('Successfull inactivate job')</script>";
     echo "<script>window.location = '/peso/admin/job.php'</script>"; 

}

?>

<?php

include '../database/database.php';

// ACTIVE COMPANY
if(isset($_GET['start_job'])){

$start_job = $_GET['start_job'];

    mysqli_query($con,"UPDATE job SET job_status = 'Active' WHERE id = '$start_job'");

     echo "<script>alert('Successfull activate job')</script>";
     echo "<script>window.location = '/peso/admin/job.php'</script>"; 

}

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
<!-- LOGO -->
  <!-- LINK -->
  <?php include 'link.php';?>

  <!-- TITLE -->
  <title> PESO - Add Job </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

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

</style>

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

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['add_job'])) {

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='job.php' style="text-decoration: none; background: none" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function cancel() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> JOB <p> | Add job </p></h4>
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

          <style type="text/css">
            #view div
              {
                  display: none;
              }
          </style>

          <div class="col-lg-2 col-md-12 col-12 mt-3">
          <div class="p-0 pe-md-0 ">

                  <div >
                       <img class="form w-100 shadow" src="../images/LOGO.png" alt='image' style="border-radius: 100%">
                  </div>

          </div>
          </div>

                <!-- information -->
                <div class="col-lg-10 col-md-12 col-12 my-auto">
                <div class="card-body ps-lg-0">

                    <h6 style="font-size: 15px; color: black;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                      </svg>
                      <span class="ms-1"><input type="text" class="col-lg-10" id="Job" placeholder="Job Title" style="font-size: 15px; color: black; border: none; font-weight: bold; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Company" placeholder="Company name" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-0" id="Set" placeholder="Set up" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-0" id="Flexible" placeholder="Flexible Time" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <br>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-0" id="Category" placeholder="Category" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Day" placeholder="Day" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <br>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-2" id="Time" placeholder="Time" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shift" viewBox="0 0 16 16">
                        <path d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047zM14.346 9.5 8 2.731 1.654 9.5H4.5a1 1 0 0 1 1 1v3h5v-3a1 1 0 0 1 1-1h2.846z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-2" id="Shift" placeholder="Shift" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <br>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Gender" placeholder="Gender" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Salary" placeholder="Salary" style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>


                      <h6 style="font-size: 14px; color: black; font-weight: normal;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                          <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>

                      <span class="ms-1">
                        <?php   date_default_timezone_set('Asia/Manila');
                                $date = date('F d, Y'); ?>
                        <span style="font-weight: normal;"> Date Post . </span> <?php echo $date ;?> 
                       </span>
                      </h6>

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
                      <form  enctype="multipart/form-data" method="POST" action="add/job_add.php"> 

                        <div class="nav-wrapper position-relative mt-3">
                        <label class="mt-2 text-sm" > Job Information </label>
                        <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-2 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Job *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="job_title"  placeholder=" Enter job title" id="job_input" oninput="handleValueChange()"
                                         class="form-control shadow-none" required>
                                </div>
                               </p>
                              </li>

                              <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Company *
                                <div class="form-label-group">

                                  <select name="company" class="input-group shadow-none" id="company_select" oninput="handleValueChange()"
                                          style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required>

                                          <?php
                                            include '../database/database.php';
                                            $query = mysqli_query($con,"SELECT count(count) as company_count FROM company ");
                                            while($row = mysqli_fetch_array($query)){
                                          ?>

                                          <?php if ($row['company_count'] == 0) { ?>

                                          <option class="peso" style="color: black;" disabled selected > Empty company </option> 

                                          <?php } else { ?>

                                          <option class="peso" style="color: black;" disabled selected > Select </option> 

                                          <?php } } ?>
                                          

                                          <?php
                                            include '../database/database.php';
                                            $query = mysqli_query($con,"SELECT * FROM company WHERE status = 'Active' order by id desc");
                                            while($row = mysqli_fetch_array($query)){
                                          ?>
                                            <option class="peso_all" value="<?php echo $row['company']; ?>" style="color: black;"> <?php echo $row['company']; ?> </option>

                                          <?php } ?>

                                  </select>

                                </div>
                               </p>
                              </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                                <li class="nav-item col-lg-2 col-12 col-md-12"> 
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Set up *
                                    <div class="form-label-group">
                                        <select class="input-group shadow-none" type="int" name="job_type" id="set_input" oninput="handleValueChange()"
                                                style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                        <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                        <option value="On Site">On Site</option>
                                        <option value="Work From Home">Work Form Home</option>
                                      </select>
                                    </div>
                                 </p>
                                </li>


                                <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Flexible Time *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_option" id="flexible_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 

                                      <?php
                                        include '../database/database.php';
                                        $query = mysqli_query($con,"SELECT * FROM job_option order by id desc");
                                        while($row = mysqli_fetch_array($query)){
                                      ?>

                                       <option value="<?php echo $row['job_option'];?>" > <?php echo $row['job_option']; ?> </option>
                                       
                                      <?php } ?>

                                    </select>
                                  </div>
                                </p>
                                </li>


                                <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *                                
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_category" id="category_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 

                                      <?php
                                        include '../database/database.php';
                                        $query = mysqli_query($con,"SELECT * FROM job_category ");
                                        while($row = mysqli_fetch_array($query)){
                                      ?>

                                       <option value="<?php echo $row['job_category'];?>" > <?php echo $row['job_category']; ?> </option>
                                       
                                      <?php } ?>

                                    </select>
                                  </div>
                                </p>
                                </li>


                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Day *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_day" id="day_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                      <option value="Monday to Friday">Monday to Friday</option>
                                      <option value="Monday to Saturday">Monday to Saturday</option>
                                      <option value="Monday to Sunday / 1 Dayoff"> Monday to Sunday / 1 Dayoff </option>
                                    </select>
                                  </div>
                                </p>
                                </li>

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Time *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_schedule" id="time_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                      <option value="8 Hours Shift">  8 Hours Shift</option>
                                      <option value="12 Hours Shift"> 12 Hours Shift</option>
                                      </select>
                                  </div>
                                </p>
                                </li>

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Shift *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_schedule_shift" id="shift_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                      <option value="Day Shift">Day Shift</option>
                                      <option value="Night Shift">Night Shift</option>
                                      <option value="Both">Both</option>
                                    </select>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                              <li class="nav-item col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Gender *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_gender" id="gender_input" oninput="handleValueChange()"
                                              style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;"  required> 
                                      <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                      <option value="Female">Female</option>
                                      <option value="Male">Male</option>
                                      <option value="Both">Both</option>
                                      </select>
                                  </div>
                                </p>
                                </li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>
                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                             <li class="nav-item col-lg-3 col-12 col-md-12">
                              <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Salary <span style="color: gray; font-size: 13px">(Optional)</span>
                                <div class="form-label-group">
                                    <select class="input-group shadow-none" type="int" name="job_salary" id="salary_input" oninput="handleValueChange()"
                                            style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" > 
                                    <option style="color: black;" value="" disabled selected hidden > Select </option> 
                                    <option value="Hide"> Hide Salary </option>
                                    <option value="PHP 10,100 - 15,000 Per Month">10,100 - 15,000 Per Month</option>
                                    <option value="PHP 15,100 - 20,000 Per Month">15,100 - 20,000 Per Month</option>
                                    <option value="PHP 20,100 - 25,000 Per Month">20,100 - 25,000 Per Month</option>
                                    <option value="PHP 25,100 - 30,000 Per Month">25,100 - 30,000 Per Month</option>
                                    <option value="PHP 35,100 - 40,000 Per Month">35,100 - 40,000 Per Month</option>
                                    <option value="PHP 45,100 - 50,000 Per Month">45,100 - 50,000 Per Month</option>
                                  </select>
                                </div>
                              </p>
                            </li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative mt-3">
                          <label class="mt-2 text-sm" > Job Description and Qualifications </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description *
                                  <div class="form-label-group">
                                  <textarea name="job_description" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type description" required
                                            style="color:black; font-size: 13px" ></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Requirements *
                                  <div class="form-label-group">
                                     <textarea name="job_requirements" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type requirements" required
                                               style="color:black; font-size: 13px"></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>




                          <div class="nav-wrapper position-relative mt-3">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Date Ended *
                                  <div class="form-label-group">                                
                                  <input type="date" name="date_ended" id="date_filter" value="" class="form-control shadow-none" 
                                         style="color: black; font-size: 13PX;" required>
                                         <span class="mt-2"  style="color: black; font-size: 13PX;"> Note : Today is not availabe for date ended </span>
                                  </div>
                                </p>
                              </li>  

                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <input type="text" style="color: black; font-size: 13PX;" name="posted_by" 
                                       value="<?php echo $F_acc ?> <?php echo $M_acc?> <?php echo $L_acc?>" 
                                       class="form-control shadow-none" readonly hidden>

                              </li>

                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <input type="text" style="color: black; font-size: 13PX;" name="job_status" 
                                       value="Active" 
                                       class="form-control shadow-none" readonly hidden>
                              </li>

                          </ul>
                          </div>

                            <?php
                              include '../database/database.php';
                              $query = mysqli_query($con,"SELECT count(count) as company_count FROM company ");
                              while($row = mysqli_fetch_array($query)){
                            ?>

                            <?php if ($row['company_count'] == 0) { ?>

                            <button type="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;" disabled > SAVE </button>

                            <?php } else { ?>

                            <button type="submit" name="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;" > SAVE </button>

                            <?php } } ?>

                      </form>

              </div>
              </div>

      </div>
      </div>

</div>
</div>

<!-- UNPUT DATA HIDE/SHOW -->
<script type="text/javascript">
  function handleValueChange() {

    var x = document.getElementById('Job');
    var y = document.getElementById('job_input').value;
    x.value = y;

    var x = document.getElementById('Company');
    var y = document.getElementById('company_select').value;
    x.value = y;  

    var x = document.getElementById('Set');
    var y = document.getElementById('set_input').value;
    x.value = y;

    var x = document.getElementById('Flexible');
    var y = document.getElementById('flexible_input').value;
    x.value = y;

    var x = document.getElementById('Category');
    var y = document.getElementById('category_input').value;
    x.value = y;

    var x = document.getElementById('Day');
    var y = document.getElementById('day_input').value;
    x.value = y;

    var x = document.getElementById('Time');
    var y = document.getElementById('time_input').value;
    x.value = y;

    var x = document.getElementById('Shift');
    var y = document.getElementById('shift_input').value;
    x.value = y;

    var x = document.getElementById('Gender');
    var y = document.getElementById('gender_input').value;
    x.value = y;

    var x = document.getElementById('Salary');
    var y = document.getElementById('salary_input').value;
    x.value = y;    

}
</script>

<!-- DATE FILTER -->
<script type="text/javascript">

// How do I restrict past dates in html5 input type Date // form date
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
       day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#date_filter').attr('min', minDate);
});

</script>

<?php } ?> 































<?php

// COMPANY PROFILE
include '../database/database.php';

if(isset($_GET['edit_job'])) {

  $query = mysqli_query($con,"SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE job.id = '".$_REQUEST['edit_job']."' ");
  while($row = mysqli_fetch_array($query)) {

$Company_profile = $row['images'];

?>

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='job.php' style="text-decoration: none; background: none ;" onclick='return cancel()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <script type="text/javascript">
          function cancel() {
          return confirm ('Are you sure you want to cancel');
          }
      </script>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> JOB <p> | Edit job </p></h4>
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

                    <h6 style="font-size: 15px; color: black;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                      </svg>
                      <span class="ms-1"><input type="text" class="col-lg-10" id="Job" placeholder="Job Title" value="<?php echo $row['job_title'];?>" 
                                                style="font-size: 15px; color: black; border: none; font-weight: bold; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-10" id="Company" placeholder="Company name" value="<?php echo $row['company'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>
                    </h6>

                    <h6 style="font-size: 14px; color: black; font-weight: normal;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-0" id="Set" placeholder="Set up" value="<?php echo $row['job_type'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-0" id="Flexible" placeholder="Flexible Time" value="<?php echo $row['job_option'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <br>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-0" id="Category" placeholder="Category" value="<?php echo $row['job_category'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Day" placeholder="Day" value="<?php echo $row['job_day'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <br>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-2" id="Time" placeholder="Time" value="<?php echo $row['job_schedule'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>


                      <!-- Shift -->
                      <?php if ($row['job_schedule_shift'] == 'Both') { ?>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shift" viewBox="0 0 16 16">
                        <path d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047zM14.346 9.5 8 2.731 1.654 9.5H4.5a1 1 0 0 1 1 1v3h5v-3a1 1 0 0 1 1-1h2.846z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-2" id="Shift" placeholder="Shift" value="Day / Night Shift" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php } else { ?>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shift" viewBox="0 0 16 16">
                        <path d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047zM14.346 9.5 8 2.731 1.654 9.5H4.5a1 1 0 0 1 1 1v3h5v-3a1 1 0 0 1 1-1h2.846z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-7 col-12 mt-2" id="Shift" placeholder="Shift" value="<?php echo $row['job_schedule_shift'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php  } ?>

                      <br>

                      <!-- GENDER -->
                      <?php if ($row['job_gender'] == 'Both') { ?>


                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Gender" placeholder="Gender" value="Male / Female" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php } else { ?>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                      </svg>
                      <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Gender" placeholder="Gender" value="<?php echo $row['job_gender'];?>" 
                                                 style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php  } ?>


                      <!-- SALARY -->
                      <?php if ($row['job_salary'] == 'Hide') { ?>

                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                              </svg>
                              <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Salary" placeholder="Salary" value="Hide Salary" 
                                                         style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php } else { ?>

                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                              </svg>
                              <span class="ms-1"> <input type="text" class="col-lg-5 col-md-5 col-12 mt-2" id="Salary" placeholder="Salary" value="<?php echo $row['job_salary'];?>" 
                                                         style="font-size: 14px; color: black; border: none; background: none;" disabled> </span>

                      <?php  } ?>
                    </h6>

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

<?php } ?>

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
                    <form  enctype="multipart/form-data" method="POST" action="update/job_edit.php"> 

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE job.id = '".$_REQUEST['edit_job']."' ");
while($row = mysqli_fetch_array($query)){

?>

                          <div class="nav-wrapper position-relative">
                          <label class="mt-2 text-sm" > Job Information </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-2 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Job *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="job_title" placeholder=" Enter job title" required
                                  value="<?php echo $row['job_title']; ?>" class="form-control shadow-none">
                                </div>
                               </p>
                              </li>

                              <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Company *
                                <div class="form-label-group">
                                  <input type="text" style="color: black; font-size: 13PX;" name="company" value="<?php echo $row['company']; ?>" class="form-control shadow-none" readonly>
                                </div>
                               </p>
                              </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                                <li class="nav-item col-lg-2 col-12 col-md-12"> 
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Set up *
                                    <div class="form-label-group">
                                        <select class="input-group shadow-none" type="int" name="job_type"  style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                        <option value="<?php echo $row['job_type']; ?>" hidden> <?php echo $row['job_type']; ?> </option>
                                        <option value="On Site">On Site</option>
                                        <option value="Work Form Home">Work Form Home</option>
                                      </select>
                                    </div>
                                 </p>
                                </li>

                                <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Flexible Time *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_option" style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_option']; ?>"hidden > <?php echo $row['job_option']; ?></option>

<?php } ?>
                                      <?php
                                        include '../database/database.php';
                                        $query = mysqli_query($con,"SELECT * FROM job_option order by id desc");
                                        while($row = mysqli_fetch_array($query)){
                                      ?>

                                       <option value="<?php echo $row['job_option'];?>"  > <?php echo $row['job_option']; ?> </option>
                                       
                                      <?php } ?>

                                    </select>
                                  </div>
                                </p>
                                </li>

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE job.id = '".$_REQUEST['edit_job']."' ");
while($row = mysqli_fetch_array($query)){

?>

                                <li class="nav-item ms-lg-1 col-lg-2 col-12 col-md-12">
                                  <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Category *                              
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_category" style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_category']; ?>" hidden> <?php echo $row['job_category']; ?></option>

<?php } ?>

                                      <?php
                                        include '../database/database.php';
                                        $query = mysqli_query($con,"SELECT * FROM job_category order by id desc");
                                        while($row = mysqli_fetch_array($query)){
                                      ?>

                                       <option value="<?php echo $row['job_category'];?>" > <?php echo $row['job_category']; ?> </option>
                                       
                                      <?php } ?>

                                    </select>
                                  </div>
                                </p>
                                </li>


                          </ul>
                          </div>

<?php

include '../database/database.php';
$query = mysqli_query($con,"SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE job.id = '".$_REQUEST['edit_job']."' ");
while($row = mysqli_fetch_array($query)){

?>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Day *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_day"  style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_day']; ?>" hidden> <?php echo $row['job_day']; ?> </option>
                                      <option value="Monday to Friday"> Monday to Friday </option>
                                      <option value="Monday to Saturday"> Monday to Saturday </option>
                                      <option value="Monday to Sunday / 1 Dayoff"> Monday to Sunday / 1 Dayoff </option>
                                    </select>
                                  </div>
                                </p>
                                </li>

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Time *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_schedule"  style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_schedule']; ?>" hidden> <?php echo $row['job_schedule']; ?> </option>
                                      <option value="8 Hours Shift">  8 Hours Shift</option>
                                      <option value="12 Hours Shift"> 12 Hours Shift</option>
                                      </select>
                                  </div>
                                </p>
                                </li>

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Shift *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_schedule_shift"style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_schedule_shift']; ?>" hidden> <?php echo $row['job_schedule_shift']; ?> </option>
                                      <option value="Day Shift">Day Shift</option>
                                      <option value="Night Shift">Night Shift</option>
                                      <option value="Both">Both</option>                                      
                                    </select>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                            <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Salary <span style="color: gray; font-size: 13px">(Optional)</span>
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_salary" style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_salary']; ?>" hidden> <?php echo $row['job_salary']; ?></option>
                                      <option value="Hide"> Hide Salary </option>
                                      <option value="PHP 10,100 - 15,000 Per Month">10,100 - 15,000 Per Month</option>
                                      <option value="PHP 15,100 - 20,000 Per Month">15,100 - 20,000 Per Month</option>
                                      <option value="PHP 20,100 - 25,000 Per Month">20,100 - 25,000 Per Month</option>
                                      <option value="PHP 25,100 - 30,000 Per Month">25,100 - 30,000 Per Month</option>
                                      <option value="PHP 35,100 - 40,000 Per Month">35,100 - 40,000 Per Month</option>
                                      <option value="PHP 45,100 - 50,000 Per Month">45,100 - 50,000 Per Month</option>
                                    </select>
                                  </div>
                                </p>
                              </li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Gender *
                                  <div class="form-label-group">
                                      <select class="input-group shadow-none" type="int" name="job_gender"  style="color: black; font-size: 13PX; border-radius: 3px; border: 1px solid lightgray; padding: 6px;" required> 
                                      <option value="<?php echo $row['job_gender']; ?>" hidden> <?php echo $row['job_gender']; ?> </option>
                                      <option value="Female">Female</option>
                                      <option value="Male">Male</option>
                                      <option value="Both">Both</option>
                                      </select>
                                  </div>
                                </p>
                                </li>

                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>
                              <li class="nav-item ms-lg-1 col-lg-3 col-12 col-md-12"></li>

                          </ul>
                          </div>

                            <style type="text/css">
                                 .scroll_A::-webkit-scrollbar
                              {
                                 width: 10px;
                              }

                              .scroll_A::-webkit-scrollbar-thumb
                              {
                                 height: 80px;
                                 background: #333;
                                 border: 8px solid transparent;
                                 border-radius: 5PX;
                              }

                              .scroll_A::-webkit-scrollbar-thumb:active
                              {
                                  background: #333;
                              }
                                    
                            </style>

                          <div class="nav-wrapper position-relative mt-3">
                          <label class="mt-2 text-sm" > Job Description and Qualifications </label>
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Description *
                                  <div class="form-label-group">
                                  <textarea name="job_description" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type description" required
                                            style="color:black; font-size: 13px" ><?php echo $row['job_description'];?></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                
                              <li class="nav-item">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Requirements *
                                  <div class="form-label-group">
                                     <textarea name="job_requirements" rows="15" cols="108"  class="scroll_A form-control shadow-none" placeholder="Type requirements" required
                                               style="color:black; font-size: 13px"><?php echo $row['job_requirements'];?></textarea>
                                  </div>
                                </p>
                                </li>

                          </ul>
                          </div>

                          <div class="nav-wrapper position-relative">
                          <ul class="nav nav-pills nav-fill" style="background: none;">
                    
                              <li class="nav-item col-lg-5 col-12 col-md-12">
                                <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> Date Ended
                                  <div class="form-label-group">                                
                                  <input type="date" name="date_ended" id="date_filter" value="<?php echo $row['date_ended'];?>" class="form-control shadow-none" 
                                         style="color: black; font-size: 13PX;" required>
                                  <span class="mt-2"  style="color: black; font-size: 13PX;"> Note : Today is not availabe for date ended </span>
                                  </div>
                                </p>
                              </li>  

                              <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12"></li>

                          </ul>
                          </div>

                          <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly hidden>
                          <button type="submit" name="submit" class="btn btn-success mt-3" style="color: white; font-size: 12px;"> UPDATE </button>

                   
                      </form>

              </div>
              </div>

      </div>
      </div>

</div>
</div>


<!-- DATE FILTER -->
<script type="text/javascript">

// How do I restrict past dates in html5 input type Date // form date
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
       day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#date_filter').attr('min', minDate);
});

</script>

<?php } } ?>



</div>
</div>
</div>

</section>
<!-- END -->




<!-- START -->
<section class="my-0 py-5">

  <script language="javascript" type="text/javascript">
      //this code disables F5/Ctrl+F5/Ctrl+R and mouse in Chrome, Firefox and Explorer
      document.onkeydown = disableF5
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
      function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && e.ctrlKey)) e.preventDefault(); };
      $(document).on("keydown", disableF5);
</script>



</body>
</html>

