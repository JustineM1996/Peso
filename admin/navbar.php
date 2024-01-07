<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  
  <!-- LINK -->
  <?php include 'link.php';?>

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

div.location_../assets/icon {
  border: none;
  padding: 0;
}

input.location_../assets/icon {
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

      <span class="navbar-toggler-../assets/icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>

    </button>

    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">

          <li class="nav-item ms-lg-auto mt-3">
              <a href="job.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i> Find Jobs
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="announcement.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i> Announcements
              </a>
          </li>
          
          <li class="nav-item ms-lg-auto mt-3">
              <a href="company.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i>  Companies
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="applicant-all.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i>  Applicants
              </a>
          </li>

          <li class="nav-item ms-lg-auto mt-3">
              <a href="account.php"  class="nav-link ps-2 d-flex cursor-pointer align-items-center" >
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i>  Accounts
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
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="announcement-add.php">
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

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">


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
                      <P class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Manage Account </P>
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

</body>
</html>
