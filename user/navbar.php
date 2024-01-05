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
<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">

<nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow-none position-absolute my-3 py-2 start-0 end-0 mx-4" 
     style="background: none; box-shadow: none; border-radius: 5PX; border: 1px solid none;">

    <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php" 
        rel="tooltip" title="Designed and Coded by Creative Tim"> P E S O
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
                <i class="material-../assets/icons opacity-6 me-2 text-md"> </i> Companies
              </a>
          </li>




        <li class="nav-item dropdown-hover mx-2 ms-lg-auto mt-3">

        <?php

        include '../database/database.php';
        $query = mysqli_query($con,"SELECT account.id,
                                           applicant.id,
                                           applicant.job_id,
                                           applicant.company_id,
                                           applicant.Account_Id,
                                           applicant.admin_pulled_date,
                                           SUM(applicant.user_notify) as click,

                                           job.id,
                                           company.id FROM account JOIN applicant ON applicant.Account_Id = account.id
                                                      JOIN company ON company.id = applicant.company_id
                                                      JOIN job ON job.id = applicant.job_id
                                                      WHERE account.email = '$email' order by applicant.admin_pulled_date desc");
        while($row = mysqli_fetch_array($query)) {

        $id = $row['id'];
        $click = $row['click'];

        if($click > '0') {

        echo " <a class='nav-link ps-2 d-flex cursor-pointer align-items-center' 
                  id='dropdownMenuBlocks' 
                  data-bs-toggle='dropdown' 
                  aria-expanded='false'>

                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bell ms-2' viewBox='0 0 16 16'>
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

                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bell ms-2' viewBox='0 0 16 16'>
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
                                               SUM(applicant.user_hide) as hide,

                                               job.id,
                                               company.id FROM account JOIN applicant ON applicant.Account_Id = account.id
                                                          JOIN company ON company.id = applicant.company_id
                                                          JOIN job ON job.id = applicant.job_id
                                                          WHERE account.email = '$email' order by applicant.admin_pulled_date desc");
            while($row = mysqli_fetch_array($query)) {

            $hide = $row['hide'];

            if($hide > '0') {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0' style='font-weight:bold; font-size: 15px'> Notifications </P>
                      </div>
                  </li>";


            } else {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                      <div class='w-100 d-flex align-items-center justify-content-between'>
                          <P class='dropdown-header d-flex  justify-content-cente align-items-center p-0' style='font-weight:bold; font-size: 15px'> Notifications </P>
                      </div>
                  </li>";

                 }


              }

           ?>

        <?php

        include '../database/database.php';
        $query = mysqli_query($con,"SELECT * FROM account JOIN applicant ON applicant.Account_Id = account.id
                                                          JOIN company ON company.id = applicant.company_id
                                                          JOIN job ON job.id = applicant.job_id
                                                          WHERE account.email = '$email' order by applicant.admin_pulled_date desc");
        while($row = mysqli_fetch_array($query)) {

        date_default_timezone_set('Asia/Manila');
        $date = date("F d, Y - h:i A", strtotime ($row['admin_pulled_date']));

        $user_notify = $row['user_notify'];
        $user_hide = $row['user_hide'];

        $Pulled = $row['Status'];
        $new_applicant = $row['Status'];
        $remove = $row['Status_remove'];

        $id = $row['id'];
        $profile = $row['image'];
        $email = $row['email'];

        $Job_Title = $row['job_title'];
        $Company_name = $row['company'];

        $F1 = $row['First_Name'];
        $M1 = $row['Middel_Name'];
        $L1 = $row['Last_Name']; 

                    if($user_hide == '1') {

                        if($user_notify == '1') {

                           if($Pulled == '0') {

                                 if ($profile == '') {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                      <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:green; font-size: 10px'> Pulled  </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i> 
                                                        <br> 
                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>
                                                  </div>
                                                </a>
                                              </li>";



                                          } else {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                      <img src='$profile' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:green; font-size: 10px'> Pulled  </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i> 
                                                        <br> 
                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>
                                                  </div>
                                                </a>
                                              </li>";


                                         }


                               } else if ($remove == '0') {
 

                                  if ($profile == '') {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                      <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:red; font-size: 10px'> Reject  </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i> 

                                                        <br>
                                                         <span style='color:black; font-size: 12px'> 
                                                         Application rejected. Please make sure that you have all 
                                                         the qualifications of the job offer you applied for. Thank you!
                                                         </span> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>
                                                  </div>
                                                </a>
                                              </li>";



                                                  } else {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                       <img src='$profile' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:red; font-size: 10px'> Reject  </span> <i class='fa fa-circle ms-2' style='color:green; font-size: 7px'> </i> 

                                                        <br>
                                                         <span style='color:black; font-size: 12px'> 
                                                         Application rejected. Please make sure that you have all 
                                                         the qualifications of the job offer you applied for. Thank you!
                                                         </span> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>
                                                  </div>
                                                </a>
                                              </li>";


                                    }



                               }


                         } else if ($user_notify == '0') {

                           if($Pulled == '0') {
         
                                 if ($profile == '') {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                       <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:gray; font-size: 10px'> Pulled </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>

                                                  </div>
                                                </a>
                                              </li>";



                                                  } else {

                 
                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                       <img src='$profile' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:gray; font-size: 10px'> Pulled </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>

                                                  </div>
                                                </a>
                                              </li>";

                                        }


                               } else if ($remove == '0'){
 
                                 if ($profile == '') {

                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                       <img src='../images/default-avatar.png' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:gray; font-size: 10px'> Reject  </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 

                                                        <br>
                                                         <span style='color:black; font-size: 12px'> 
                                                         Application rejected. Please make sure that you have all the qualifications of the job offer you applied for. Thank you!
                                                         </span> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
                                                                                                                    <i class='fa fa-close' style='color:#333; font-size: 15px'></i>
                                                                                                                    </a>
                                                                                                                  </div>
                                                  </div>
                                                </a>
                                              </li>";


                                                          } else {

                         
                                        echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem'>
                                                <a class='dropdown-item py-2 ps-3 border-radius-md' href='notify/user_click.php?id=$id'>
                                                  <div class='w-100 d-flex align-items-center justify-content-between'>
                                                      <P class='nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0'>
                                                       <img src='$profile' style='width: 50px; border-radius: 100%'>

                                                        <span class='ms-2' style='color:black; font-size: 14px' > $F1 $M1 $L1 . 
                                                        <span style='color:gray; font-size: 10px'> Reject  </span> <i class='fa fa-circle ms-2' style='color:gray; font-size: 7px'> </i> 

                                                        <br>
                                                         <span style='color:black; font-size: 12px'> 
                                                         Application rejected. Please make sure that you have all the qualifications of the job offer you applied for. Thank you!
                                                         </span> 
                                                        <br> 

                                                        <span style='color:gray; font-size: 12px'> Apply for $Job_Title - $Company_name </span> <br>
                                                        <span style='color:gray; font-size: 12px'> $date </span> </span> </P>

                                                                                                                  <div class='dropdown' style='float: right;'>
                                                                                                                    <a class='dropdown-item border-radius-md' href='notify/user_hide.php?id=$id'> 
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
                                               SUM(applicant.user_hide) as hide,

                                               job.id,
                                               company.id FROM account JOIN applicant ON applicant.Account_Id = account.id
                                                          JOIN company ON company.id = applicant.company_id
                                                          JOIN job ON job.id = applicant.job_id
                                                          WHERE account.email = '$email' order by applicant.admin_pulled_date desc");
            while($row = mysqli_fetch_array($query)) {

            $hide = $row['hide'];

            if($hide > '0') {

            echo "<li class='nav-item dropdown dropdown-hover dropdown-subitem mt-2'>
                    <a class='dropdown-item py-2 ps-3 border-radius-md' href='my-job.php?id=$id_acc'>
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

        <li class="nav-item dropdown-hover mx-2">

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

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"  aria-labelledby="dropdownMenuBlocks">

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
                     <span class="ms-2" style='color:black; font-size: 14px; position: relative;'> <?php echo $F_acc ?> <?php echo $M_acc ?> <?php echo $L_acc ?> <br>
                     <span class="ms-0" style='color:gray; font-size: 13px'> <?php echo $email_acc ?> </span></span></p>
                  </div>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem mt-2">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="account.php?id=<?php echo $id_acc;?>">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class="nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> Manage your Account </P>
                  </div>
                </a>
              </li>

              <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href="my-job.php">
                  <div class="w-100 d-flex align-items-center justify-content-between">
                      <P class=" nav-link dropdown-header d-flex cursor-pointer justify-content-cente align-items-center p-0"> My Job </P>
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
