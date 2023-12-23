<?php include 'session.php' ?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title> Peso - Analysis </title>
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../images/LOGO.png">

<!-- CSS Files -->
<link href="assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />

<!-- Core JQUERY Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

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

.pagination a {
  color: black;
  float: left;
  padding: 4px 10px;
  text-decoration: none;
  transition: background-color .3s;
  text-decoration: none;
}

.pagination a.active {
  background-color: #333;
  color: white;
  text-decoration: none;
}

.pagination li a:hover:not(.active) {background-color: #ddd;}



div.search_icon {
  border: none;
  padding: 0;
}

input.search_icon {
  border: 1px solid lightgray;
  display: block;
  padding: 9px 4px 9px 40px;
  background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
}

div.location_icon {
  border: none;
  padding: 0;
}

input.location_icon {
  border: 1px solid lightgray;
  display: block;
  padding: 9px 4px 9px 40px;
  background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
}

</style>

</head>

<body>
  
<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0" >
  <div class="row">
    <div class="col-12">

<nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow-none position-absolute my-3 py-2 start-0 end-0 mx-4" 
     style="background: none; box-shadow: none; border-radius: 5PX; border: 1px solid none;">

  <div class="container-fluid px-0" >

    <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php" 
        rel="tooltip" title="Designed and Coded by Creative Tim"> P E S O 
    </a>

    <a class="navbar-brand btn btn-primary mt-3 col-lg-1 col-1 col-md-1" href="analysis.php" style="padding: 3px 5px; color: white;"> analysis
    </a>

    <button class="navbar-toggler shadow-none ms-2" 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="#navigation" 
            aria-controls="navigation" 
            aria-expanded="false" 
            aria-label="Toggle navigation">

      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>

    </button>

    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">

          <li class="nav-item ms-lg-auto mt-3">
              <a href="job.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-icons opacity-6 me-2 text-md"> </i> Find Jobs
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="image.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-icons opacity-6 me-2 text-md"> </i> Announcements
              </a>
          </li>
          
          <li class="nav-item ms-lg-auto mt-3">
              <a href="company.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-icons opacity-6 me-2 text-md"> </i>  Companies
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="applicant-all.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-icons opacity-6 me-2 text-md"> </i>  Applicants
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="account.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-icons opacity-6 me-2 text-md"> </i>  Accounts
              </a>
          </li>

        <li class="nav-item ms-lg-auto mt-3">
   
          <a href='#' class='nav-link ps-2 d-flex cursor-pointer align-items-center' 
             id='dropdownMenuBlocks' 
             data-bs-toggle='dropdown' 
             aria-expanded='false' > 

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mt-0" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" 
              aria-labelledby="dropdownMenuBlocks">

              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="job-access.php?add_job">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Post Job </P>
                  </div>
                </a>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="image-add.php">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class=" nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Upload Announcement </P>
                  </div>
                </a>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="company-access.php?add_company">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Add Company  </P>
                  </div>
                </a>
              </li>
              
          </ul>
        </li>



        <li class="nav-item ms-lg-auto mt-3">


        <?php

        include '../database/database.php';
        $query = mysqli_query($con,"SELECT account.id,
                                           applicant.id,
                                           applicant.job_id,
                                           applicant.company_id,
                                           applicant.Account_Id,
                                           applicant.admin_pulled_date,
                                           SUM(applicant.admin_hide) as hide,
                                           SUM(applicant.admin_notify) as click,

                                           job.id,
                                           company.id FROM account JOIN company 
                                                                   JOIN job ON job.company_id = company.id
                                                                   JOIN applicant ON applicant.job_id = job.id and applicant.Account_Id = account.id and applicant.company_id = company.id 
                                                                order by applicant.admin_pulled_date desc ");
        while($row = mysqli_fetch_array($query)) {

        $id = $row['id'];
        $click = $row['click'];

        if($click > '0') {

        echo " <a class='nav-link ps-2 d-flex cursor-pointer align-items-center' 
                  id='dropdownMenuBlocks' 
                  data-bs-toggle='dropdown' 
                  aria-expanded='false'>

                  <svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' fill='currentColor' class='bi bi-bell' viewBox='0 0 16 16'>
                  <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z'>


                    <span class='top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                       $click
                    </span>

                  </svg>
                </a> ";


        } else {

        echo " <a class='nav-link ps-2 d-flex cursor-pointer align-items-center' 
                  id='dropdownMenuBlocks' 
                  data-bs-toggle='dropdown' 
                  aria-expanded='false'>

                  <svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' fill='currentColor' class='bi bi-bell' viewBox='0 0 16 16'>
                  <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z'/>
                  </svg>
                </a> ";

              }

          }

       ?>




          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" 
              aria-labelledby="dropdownMenuBlocks">


 <div class="root-visual_tags flex-tags">
    <div class="lvl2-el2-visual flex-tags tags-scrollable">
        <div class="lvl3-el2-visual scrollable_tags">




            <?php

            include '../database/database.php';
            $query = mysqli_query($con,"SELECT account.id,
                                               applicant.id,
                                               applicant.job_id,
                                               applicant.company_id,
                                               applicant.Account_Id,
                                               SUM(applicant.admin_hide) as hide,

                                           job.id,
                                           company.id FROM account JOIN company 
                                                                      JOIN job ON job.company_id = company.id
                                                                      JOIN applicant ON applicant.job_id = job.id and applicant.Account_Id = account.id  and applicant.company_id = company.id 
                                                                   order by applicant.admin_pulled_date desc ");
            while($row = mysqli_fetch_array($query)) {

            $hide = $row['hide'];

            if($hide > '0') {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <h4 class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0' style='font-weight:bold; font-size: 15px'> Notifications </h4>
                      </div>
                  </li>";


            } else {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <h4 class='dropdown-header d-flex  justify-content-cente align-items-center p-0' style='font-weight:bold; font-size: 15px '> Notifications </h4>
                      </div>
                  </li>";

                 }


              }

           ?>



                    <?php

                    include '../database/database.php';
                    $query = mysqli_query($con,"SELECT * FROM account JOIN company 
                                                                      JOIN job ON job.company_id = company.id
                                                                      JOIN applicant ON applicant.job_id = job.id and applicant.Account_Id = account.id and applicant.company_id = company.id 
                                                                      order by applicant.Date_Posted desc ");
                    while($row = mysqli_fetch_array($query)){

                    date_default_timezone_set('Asia/Manila');
                    $date = date("F d, Y - h:i A", strtotime ($row['Date_Posted']));

                    $admin_notify = $row['admin_notify'];
                    $admin_hide = $row['admin_hide'];
                    $new_applicant = $row['Status'];

                    $id = $row['id'];
                    $profile = $row['image'];
                    $email = $row['email'];

                    $Job_Title = $row['job_title'];
                    $Company_name = $row['company'];

                    $F1 = $row['First_Name'];
                    $M1 = $row['Middel_Name'];
                    $L1 = $row['Last_Name']; 


                    if($admin_hide == '1') {

                        if($admin_notify == '1') {

                           if($new_applicant == '1') {

                                 if ($profile == '') {

                                          echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                  <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/admin_click.php?id=$id'>
                                                    <div class='w-100 d-flex align-items-center justify-content-between'>
                                                        <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                        <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>
                                                          <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                          <span style='color:blue; font-size: 10px'> NEW </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i>  
                                                          <br> 
                                                          <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                          <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/admin_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>

                                                    </div>
                                                  </a>
                                                </li>";


                                  } else {

                                          echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                  <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/admin_click.php?id=$id'>
                                                    <div class='w-100 d-flex align-items-center justify-content-between'>
                                                        <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                        <img src='$profile' style='width: 50px; border-radius: 100%'>
                                                          <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                          <span style='color:blue; font-size: 10px'> NEW </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i>  
                                                          <br> 
                                                          <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                          <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/admin_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>

                                                    </div>
                                                  </a>
                                                </li>";


                                 }
                      

                             }


                         } else if ($admin_notify == '0') {

                                if($new_applicant == '1') {

                                     if ($profile == '') {

                                      echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                              <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/admin_click.php?id=$id'>
                                                <div class='w-100 d-flex align-items-center justify-content-between'>
                                                    <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                     <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>
                                                      <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                      <span style='color:gray; font-size: 10px'> NEW </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 
                                                      <br> 
                                                      <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                      <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                              <div class='dropdown' style='float: right;'>
                                                                                                                <a class='dropdown-item border-radius-md' href='notify/admin_hide.php?id=$id'> 
                                                                                                                <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                </a>
                                                                                                              </div>
                                                </div>
                                              </a>                                
                                            </li>";

                                      } else {

                                      echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                              <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/admin_click.php?id=$id'>
                                                <div class='w-100 d-flex align-items-center justify-content-between'>
                                                    <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                     <img src='$profile' style='width: 50px; border-radius: 100%'>
                                                      <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                      <span style='color:gray; font-size: 10px'> NEW </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 
                                                      <br> 
                                                      <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                      <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                              <div class='dropdown' style='float: right;'>
                                                                                                                <a class='dropdown-item border-radius-md' href='notify/admin_hide.php?id=$id'> 
                                                                                                                <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                </a>
                                                                                                              </div>
                                                </div>
                                              </a>                                
                                            </li>";



                                     }



                              }


                       }


                 } 


           }


    ?>

    </div>
  </div>
</div>
            <?php

            include '../database/database.php';
            $query = mysqli_query($con,"SELECT account.id,
                                               applicant.id,
                                               applicant.job_id,
                                               applicant.company_id,
                                               applicant.Account_Id,
                                               SUM(applicant.admin_hide) as hide,

                                           job.id,
                                           company.id FROM account JOIN company 
                                                                   JOIN job ON job.company_id = company.id
                                                                   JOIN applicant ON applicant.job_id = job.id  and applicant.Account_Id = account.id and applicant.company_id = company.id 
                                                                   order by applicant.admin_pulled_date desc ");
            while($row = mysqli_fetch_array($query)) {

            $hide = $row['hide'];

            if($hide > '0') {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                    <a class='dropdown-item py-2 ps-3 border-radius-md' href='applicant-all.php'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'> See All </P>
                      </div>
                    </a>
                  </li>";


            } else {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <P class='dropdown-header d-flex  justify-content-cente align-items-center p-0'> No Message </P>
                      </div>
                  </li>";

                 }


              }

           ?>

          </ul>
        </li>

            


<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-tags {
  display: flex;
  flex-direction: column;
}

.flex-tags > :not(.scrollable_tags):not(.tags-scrollable) {
  flex-shrink: 0;
}

.flex-tags > .scrollable_tags, .tags-scrollable {
  flex-grow: 1;
}

.tags-scrollable {
  overflow: hidden;
}

.scrollable_tags {
  overflow: auto;
  overflow-x: hidden; /* Hide horizontal scrollbar */

}

.root-visual_tags {
  height: 50vh;
}

.scrollable_tags::-webkit-scrollbar
{
   width: 10px;
   border-radius: 10px;
}

.scrollable_tags::-webkit-scrollbar-thumb
{
   height: 10px;
   background: #333;
   border: 8px solid transparent;
   border-radius: 10px;
}

</style>



        <li class="nav-item dropdown-hover">

          <?php
             if ($profile_acc == '') {
                echo "<a href='account.php?id=$id_acc' class='nav-link ps-2 d-flex cursor-pointer align-items-center' id='dropdownMenuBlocks' data-bs-toggle='dropdown' aria-expanded='false' > 
                          <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>
                      </a>";
              } else {
                echo "<a href='account.php?id=$id_acc' class='nav-link ps-2 d-flex cursor-pointer align-items-center' id='dropdownMenuBlocks' data-bs-toggle='dropdown' aria-expanded='false' > 
                          <img src='$profile_acc' style='width: 50px; border-radius: 100%'>
                      </a>";
             }
          ?>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" 
              aria-labelledby="dropdownMenuBlocks">



              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                     <p class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0">
                      <?php
                         if ($profile_acc == '') {
                            echo "<img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%' >";
                          } else {
                            echo "<img src='$profile_acc' style='width: 50px; border-radius: 100%'>";
                         }
                      ?>
                     <span class="ms-2" style='color:black; font-size: 14px'> <?php echo $F_acc ?> <?php echo $M_acc ?> <?php echo $L_acc ?> <br>
                     <span class="ms-0" style='color:gray; font-size: 12px'> <?php echo $email_acc ?> </span></span> </p>
                  </div>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem mt-2">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="account-view.php?id=<?php echo $id_acc?>">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Manage your Account </P>
                  </div>
                </a>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="../login/logout.php?id=<?php echo $id_acc;?>" onclick='return logout()'>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class=" nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Sign out </P>
                  </div>
                </a>
              </li>

              <script type="text/javascript">
                  window.history.forward();
                  function logout() {
                  return confirm ('Are you sure you want to Logout');
                  }
              </script>
              
          </ul>
        </li>




      </ul>
    </div>
  </div>
</nav>

<!-- End Navbar -->
</div>
</div>
</div>








<!-- START -->
<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-10 ms-lg-7">



















<!-- START -->
<div class="container mt-4"> 
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> JOB ANALYSIS </h5>

<!-- NEW -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.company,
                                     company.status,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.count = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.count = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and company.status = applicant.company_status
                                     WHERE company.status = 'Active' and job.date_ended >= '$date' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $new = ($row['applicant_new']);
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);

  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> New Jobs </h4>
        </div>


  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' and job.date_ended >= '$date' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];
  ?>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $total_new_job;?></span>
                    </h6>   
                    
  <?php } ?>

                    <h6 class="company" style="font-size: 13px; color: black;"> Total  applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 























<!-- PULLED -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,
                                     job.company_status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.count = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.count = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id and company.status = applicant.company_status
                                     WHERE company.status = 'Active' and job.date_ended <= '$date'  order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $new = ($row['applicant_new']);
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);



  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> End Jobs </h4>
        </div>

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' and job.date_ended <= '$date' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];

  ?>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $total_end_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Succsessfull - <?php echo $total_suc_job ;?></span>
                    </h6>   
                    
  <?php } ?>

                    <h6 class="company" style="font-size: 13px; color: black;"> Total  applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 

</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->










<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">


  <?php

  include '../database/database.php';

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,
                                     applicant.company_status,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,
                                      count(case when applicant.count = 1 then 1 end) as applicant_count,

                                     job.id,
                                     job.company_id as com_id,
                                     job.job_category,
                                     job.company_status

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     LEFT JOIN applicant ON  applicant.company_id = company.id and 
                                                             job.id = applicant.job_id and company.status = applicant.company_status
                                                             WHERE company.status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL APPLICANTS
   $applicant_count = $row['applicant_count'];  

  //COUNT GENDER
   $gender_male = $row['male'];
   $gender_female = $row['female'];


  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,
                                     company.status,

                                     job.id,
                                     job.company_id,
                                     job.company_status,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                                     FROM company 
                                     JOIN job ON job.company_id = company.id and company.status = job.company_status
                                     WHERE company.status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];


  ?>     

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $total_new_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $total_end_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Succsessfull - <?php echo $total_suc_job ;?></span>
                    </h6>  
                    
  <?php } ?>

                    <h6 class="company " style="font-size: 13px; color: black;"> Total Applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $applicant_count;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $gender_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $gender_female;?></span>
                    </h6>     

                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="job-all-report.php"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } ?>






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->































<!-- START -->
<div class="container mt-7">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> COMPANY ANALYSIS </h5>

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Active' then 1 end) as active

                                     FROM company WHERE status = 'Active' ");

  while($row = mysqli_fetch_array($query)){

  ?>   
 
                    
<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Active </h4>
        </div>     
                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                    </h6>  
          </div>
          </div>

</div>
</div>

<?php }  ?> 



<!-- PULLED -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Inactive' then 1 end) as Inactive

                                     FROM company WHERE status = 'Inactive' ");

  while($row = mysqli_fetch_array($query)){

  ?>  

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Inactive </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $row['Inactive']; ?></span>
                    </h6>  
 
          </div>
          </div>

</div>
</div>

<?php }  ?> 

</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->










<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as company_count,
                                     count(case when status = 'Active' then 1 end) as active,
                                     count(case when status = 'Inactive' then 1 end) as Inactive

                                     FROM company ");

  while($row = mysqli_fetch_array($query)){

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           
                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Companies -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['company_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                       <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $row['Inactive']; ?></span>
                    </h6>   
                    
                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="company-all-report.php"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } ?>






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->



















<!-- START -->
<div class="container mt-7">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> APPLICANT ANALYSIS </h5>

<!-- NEW -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 1 AND applicant.Gender = 'male'  then 1 end) as new_male,
                                      count(case when applicant.Status = 1 AND applicant.Gender = 'female' then 1 end) as new_female,
                                      count(case when applicant.Status = 1 then 1 end) as applicant_new

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                      WHERE applicant.Status = '1' and
                                            applicant.Status_remove = '1' and
                                            applicant.Status_hide = '1' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $new = ($row['applicant_new']);
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);

  ?>   



<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> New </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total  New -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 








<!-- PULLED -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 0 AND applicant.Gender = 'male'  then 1 end) as pulled_male,
                                      count(case when applicant.Status = 0 AND applicant.Gender = 'female' then 1 end) as pulled_female,
                                      count(case when applicant.Status = 0 then 1 end) as applicant_pulled

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status = '0' and
                                                        applicant.Status_hide = '1' and
                                                        applicant.Status_remove = '1' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $pulled = ($row['applicant_pulled']);
   $pulled_male = ($row['pulled_male']);
   $pulled_female = ($row['pulled_female']);

  ?>   



<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Pulled </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Pulled -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $pulled;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $pulled_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $pulled_female;?></span>
                    </h6>   

          </div>
          </div>

</div>
</div>

<?php }  ?> 









<!-- REJECT -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status_remove = 0 AND applicant.Gender = 'male' then 1 end) as reject_male,
                                      count(case when applicant.Status_remove = 0 AND applicant.Gender = 'female' then 1 end) as reject_female,
                                      count(case when applicant.Status_remove = 0 then 1 end) as applicant_reject

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status_remove = '0' and 
                                                        applicant.Status_hide = '1' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $reject = $row['applicant_reject'];
   $reject_male = ($row['reject_male']);
   $reject_female = ($row['reject_female']);

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Reject </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Reject -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $reject;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $reject_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $reject_female;?></span>
                    </h6>  

          </div>
          </div>

</div>
</div>

<?php }  ?> 








<!-- HIDE -->
  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id as jobid,
                                     job.company_id, 
                                     job.job_title,
                                     job.job_category,
                                     job.date_posted,
                                     job.date_ended,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'male' then 1 end) as hide_male,
                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'female' then 1 end) as hide_female,
                                      count(case when applicant.Status_hide = 0 then 1 end) as applicant_hide

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON applicant.job_id = job.id and applicant.company_id = company.id 
                                                  WHERE applicant.Status_hide = '0' order by applicant.id asc ");

  while($row = mysqli_fetch_array($query)){

  //COUNT PULL
   $hide = $row['applicant_hide'];
   $hide_male = ($row['hide_male']);
   $hide_female = ($row['hide_female']);

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Hide </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Hide -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $hide;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $hide_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $hide_female;?></span>
                    </h6>  

          </div>
          </div>

</div>
</div>

<?php }  ?> 






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->










<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">


  <?php

  include '../database/database.php';

  $query = mysqli_query($con,"SELECT company.id,

                                     applicant.id,
                                     applicant.company_id,
                                     applicant.job_id,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as new_male,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as new_female,


                                      count(case when applicant.Status = 0 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as pulled_male,

                                      count(case when applicant.Status = 0 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as pulled_female,


                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Gender = 'male' AND
                                                      applicant.Status_hide = 1 then 1 end) as reject_male,

                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Gender = 'female' AND
                                                      applicant.Status_hide = 1 then 1 end) as reject_female,


                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'male' then 1 end) as hide_male,
                                      count(case when applicant.Status_hide = 0 AND applicant.Gender = 'female' then 1 end) as hide_female,

                                      count(case when applicant.Gender = 'male' then 1 end) as male,
                                      count(case when applicant.Gender = 'female' then 1 end) as female,

                                      count(case when applicant.Status = 1 AND
                                                      applicant.Status_remove = 1 AND
                                                      applicant.Status_hide = 1 then 1 end) as applicant_new,

                                      count(case when applicant.Status = 0 AND
                                                      applicant.Status_hide = 1 AND
                                                      applicant.Status_remove = 1 then 1 end) as applicant_pulled,

                                      count(case when applicant.Status_remove = 0 AND
                                                      applicant.Status_hide = 1 then 1 end) as applicant_reject,

                                      count(case when applicant.Status_hide = 0 then 1 end) as applicant_hide,

                                      count(case when applicant.count = 1 then 1 end) as applicant_count,

                                     job.id,
                                     job.company_id as com_id,
                                     job.job_category

                                     FROM company 
                                     LEFT JOIN job ON job.company_id = company.id
                                     LEFT JOIN applicant ON  applicant.company_id = company.id and job.id = applicant.job_id ");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL APPLICANTS
   $applicant_count = $row['applicant_count'];  

  //COUNT GENDER
   $gender_male = $row['male'];
   $gender_female = $row['female'];

  //COUNT NEW
   $new = $row['applicant_new'];
   $new_male = ($row['new_male']);
   $new_female = ($row['new_female']);

  //COUNT PULL
   $pulled = ($row['applicant_pulled']);
   $pulled_male = ($row['pulled_male']);
   $pulled_female = ($row['pulled_female']);

  //COUNT PULL
   $reject = $row['applicant_reject'];
   $reject_male = ($row['reject_male']);
   $reject_female = ($row['reject_female']);

  //COUNT HIDE
   $hide = $row['applicant_hide'];
   $hide_male = ($row['hide_male']);
   $hide_female = ($row['hide_female']);

  ?>   

<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           

  <?php

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d, h:i:s');

  $query = mysqli_query($con,"SELECT company.id,

                                     job.id,
                                     job.company_id,

                                       count(case when job.company_id = company.id then 1 end) as count_company,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id 
                       JOIN resume ON resume.resume_id = applicant.Account_id
                       JOIN peso_resume ON peso_resume.peso_resume_id = applicant.Account_id order by applicant.id desc");

  while($row = mysqli_fetch_array($query)){

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];

  ?>   


                    <h6 class="company" style="font-size: 13px; color: black;"> Total Jobs -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $total_jobs;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $total_new_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Inactive - <?php echo $total_end_job ;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px"> Succsessfull - <?php echo $total_suc_job ;?></span>
                    </h6>   
                    
  <?php } ?>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total  New -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $new;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $new_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $new_female;?></span>
                    </h6>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Pulled -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $pulled;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $pulled_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $pulled_female;?></span>
                    </h6>   

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Reject -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $reject;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $reject_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $reject_female;?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Hide -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $hide;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $hide_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $hide_female;?></span>
                    </h6>  

                    <h6 class="company " style="font-size: 13px; color: black;"> Total Applicant -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $applicant_count;?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px">Male - <?php echo $gender_male;?></span>
                      <span class="Province" style="font-weight: normal; font-size: 13px">Female - <?php echo $gender_female;?></span>
                    </h6>     

                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="applicant-report.php"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } ?>






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->

























<div class="container mt-7">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <h5 class='text-black' style="color: black; font-size: 18px;"> AACOUNT ANALYSIS </h5>


  <?php
  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user

                                     FROM account WHERE status = 'verified' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   

       


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Active </h4>
        </div>     

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_admin']; ?></span>
                    </h6>  

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                    </h6>  
          </div>
          </div>

</div>
</div>

<?php }  ?> 



  <?php

  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                                     FROM account WHERE status = 'deactivated' and id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   


<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Deactivate </h4>
        </div>

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_admin']; ?></span>
                    </h6> 

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['Inactive']; ?></span>
                    </h6>  
 
          </div>
          </div>

</div>
</div>

<?php }  ?> 

</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->










<!-- START -->
<div class="container mt-4">
<div class="row">

<div class="col-lg-12 col-12 col-md-12">
<div class="info-horizontal border-radius-xl d-block d-block h-100 ">

<div class="ps-0 ps-md-0 mt-md-0">
<div class="row">

  <?php

  $account_id = array();

  include '../database/database.php';

  $q = mysqli_query($con,"SELECT * FROM account WHERE id = '$id_acc' ");
  while($row = mysqli_fetch_assoc($q)) {
  $account_id[] = $row['id'];
  }


  $query = mysqli_query($con,"SELECT 

                                     count(case when count = 1 then 1 end) as account_count,
                                     count(case when status = 'verified' then 1 end) as active,
                                     count(case when status = 'deactivated' then 1 end) as Inactive,

                                     count(case when user_type = 'admin' and status_account = '1' then 1 end) as account_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'verified' then 1 end) as account_active_admin,
                                     count(case when user_type = 'admin' and status_account = '1' and status = 'deactivated' then 1 end) as account_inactive_admin,

                                     count(case when user_type = 'user' and status_account = '0' then 1 end) as account_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'verified' then 1 end) as account_active_user,
                                     count(case when user_type = 'user' and status_account = '0' and status = 'deactivated' then 1 end) as account_inactive_user

                                     FROM account WHERE id NOT IN ( '" . implode( "', '" , $account_id ) . "' ) order by id desc ");

  while($row = mysqli_fetch_array($query)){

  ?>   




<div class="col-lg-6 col-12 col-md-12">
<div class="p-0 pe-md">

        <div class="card card-profile col-lg-12 col-md-12 col-12  mt-3" style="box-shadow: none; border-radius: 5PX; ">
        <div class="card-body ps-lg-0 ms-4">

        <div class="col-lg-12 mx-auto">
          <h4 class="" style="color: black; "> Overall Total Report  </h4>
        </div>
           

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total User -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_user']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_user']; ?></span>
                    </h6>  

                    <h6 class="company" style="font-size: 13px; color: black;"> Total Admin -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['account_active_admin']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['account_inactive_admin']; ?></span>
                    </h6> 

                    <h6 class="company mt-3" style="font-size: 13px; color: black;"> Total Account -    
                      <span class="Province" style="font-weight: normal; font-size: 13px"><?php echo $row['account_count']; ?></span>
                      <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Active - <?php echo $row['active']; ?></span>
                       <span class="Province ms-3" style="font-weight: normal; font-size: 13px"> Deactivate - <?php echo $row['Inactive']; ?></span>
                    </h6>   
                    
                    <a class="userinfo btn btn-primary mt-2" style="box-shadow: none; font-size: 12px; text-decoration: none; float: right;"  
                       href="account-all-report.php"> Info </a>

          </div>
          </div>

</div>
</div>

<?php } ?>






</div>
</div>   

</div>
</div>

</div>
</div>
<!-- END  -->





</div>
</div>
</div>

</section>





<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="assets/js/plugins/countup.min.js"></script>
<script src="assets/js/plugins/choices.min.js"></script>
<script src="assets/js/plugins/prism.min.js"></script>
<script src="assets/js/plugins/highlight.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="assets/js/plugins/choices.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="assets/js/plugins/parallax.min.js"></script>



</body>
</html>
