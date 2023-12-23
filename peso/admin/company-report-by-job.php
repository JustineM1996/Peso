<?php include 'session.php' ?>
<?php include 'navbar.php' ?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - Jobs Reports </title>

  <!-- NO BACK -->
  <script type="text/javascript">
      window.history.forward();
  </script>

    <!-- Table JS -->
    <script src="table/vendors/simple-datatables/table1.js"></script>
    <link rel="stylesheet" href="table/css/table.css">
    <link rel="stylesheet" href="table/vendors/simple-datatables/datatable.css">

<style type="text/css">

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

</style>

</head>

<body>

<!-- DATA -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") { 

   $date = date('Y-m-d');
   $query =  "SELECT company.id,
                     company.company,

                     job.id,
                     job.job_title,
                     job.job_category,
                     
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted as job_date_posted,
                     job.date_ended as job_date_ended,
                     job.job_status,

                     applicant.id,
                     applicant.company_id,
                     applicant.job_id,
                     applicant.First_Name,
                     applicant.Last_Name,
                     applicant.Middel_Name,
                     applicant.Contact_Number,
                     applicant.Email,
                     applicant.Province,
                     applicant.City,
                     applicant.Status,
                     applicant.Gender,

                     applicant.Date_Posted,
                     applicant.admin_pulled_date,
                     applicant.Status_remove,
                     applicant.Status_hide,

                     resume.resume_id,
                     resume.Resume,

                     peso_resume.peso_resume_id,
                     peso_resume.Peso_Resume

                     FROM company 
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     JOIN resume ON resume.resume_id = applicant.Account_id
                     JOIN peso_resume ON peso_resume.peso_resume_id = applicant.Account_id
                     WHERE applicant.Date_Posted BETWEEN '$startdate' AND '$enddate' AND job.id = '".$_REQUEST['id']."' order by applicant.id desc";

   } else {
          
   $date = date('Y-m-d');
   $query =  "SELECT company.id,
                     company.company,

                     job.id,
                     job.job_title,
                     job.job_category,
                     
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted as job_date_posted,
                     job.date_ended as job_date_ended,
                     job.job_status,

                     applicant.id,
                     applicant.company_id,
                     applicant.job_id,
                     applicant.First_Name,
                     applicant.Last_Name,
                     applicant.Middel_Name,
                     applicant.Contact_Number,
                     applicant.Email,
                     applicant.Province,
                     applicant.City,
                     applicant.Status,
                     applicant.Gender,

                     applicant.Date_Posted,
                     applicant.admin_pulled_date,
                     applicant.Status_remove,
                     applicant.Status_hide,

                     resume.resume_id,
                     resume.Resume,

                     peso_resume.peso_resume_id,
                     peso_resume.Peso_Resume

                     FROM company 
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     JOIN resume ON resume.resume_id = applicant.Account_id
                     JOIN peso_resume ON peso_resume.peso_resume_id = applicant.Account_id
                     WHERE applicant.Date_Posted BETWEEN '$startdate' AND '$enddate' AND job.id = '".$_REQUEST['id']."' order by applicant.id desc";
                     $searchResult = date_time($query);

        }     

   } else {

   $date = date('Y-m-d');
   $query =  "SELECT company.id,
                     company.company,

                     job.id,
                     job.job_title,
                     job.job_category,
                     
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted as job_date_posted,
                     job.date_ended as job_date_ended,
                     job.job_status,

                     applicant.id,
                     applicant.company_id,
                     applicant.job_id,
                     applicant.First_Name,
                     applicant.Last_Name,
                     applicant.Middel_Name,
                     applicant.Contact_Number,
                     applicant.Email,
                     applicant.Province,
                     applicant.City,
                     applicant.Status,
                     applicant.Gender,

                     applicant.Date_Posted,
                     applicant.admin_pulled_date,
                     applicant.Status_remove,
                     applicant.Status_hide,

                     resume.resume_id,
                     resume.Resume,

                     peso_resume.peso_resume_id,
                     peso_resume.Peso_Resume

                     FROM company  
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     JOIN resume ON resume.resume_id = applicant.Account_id
                     JOIN peso_resume ON peso_resume.peso_resume_id = applicant.Account_id
                     WHERE job.id = '".$_REQUEST['id']."' order by applicant.id desc ";
                     $searchResult = date_time($query);
    }

    function date_time($query) {
        include '../database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>










<!-- TOTAL COUNT -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") { 

   $count_query =  "SELECT

                     company.id,
                     job.id,

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

                                      count(case when applicant.count = 1 then 1 end) as applicant_count

                     FROM company 
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE applicant.Date_Posted BETWEEN '$startdate' AND '$enddate' AND  job.id = '".$_REQUEST['id']."'  ";

   } else {
          
   $count_query =  "SELECT 

                     company.id,
                     job.id,

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

                                      count(case when applicant.count = 1 then 1 end) as applicant_count

                     FROM company
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE applicant.Date_Posted BETWEEN '$startdate' AND '$enddate' AND job.id = '".$_REQUEST['id']."'  ";
                     $Count_Result = count_data($count_query);

        }     

   } else {

   $count_query =  "SELECT 

                     company.id,
                     job.id,

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

                                      count(case when applicant.count = 1 then 1 end) as applicant_count

                     FROM company 
                     JOIN job ON job.company_id = company.id
                     JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE job.id = '".$_REQUEST['id']."' ";
                     $Count_Result = count_data($count_query);
    }

    function count_data($count_query) {
        include '../database/database.php';

        $filterCount = mysqli_query($con, $count_query);
        return $filterCount;
    }

?>

<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-12">

<?php
  include '../database/database.php';
  $query = mysqli_query($con,"SELECT * FROM company LEFT JOIN job ON job.company_id = company.id WHERE job.id = '".$_REQUEST['id']."' ");
  while($row = mysqli_fetch_array($query)){

    $Company_profile = $row['images'];
?>
<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company-info.php?id=<?php echo $row['company_id'];?>' style="text-decoration: none; background: ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> JOB <p> | Reports </p></h4>
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
                      <span style="font-weight: normal;"> Posted on .</span> <?php echo date("F d, Y", strtotime ($row['date_posted']));?> 
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
<div id="new_jobs">
<div class="container">
<div class="row">


<form method="POST" class="mt-3">

  <div class="nav-wrapper position-relative ">
  <ul class="nav nav-pills nav-fill" style="background: none;">

      <li class="nav-item col-lg-5 col-12 col-md-12">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> From date
        <div class="form-label-group">
          <input type="date" style="color: black; font-size: 13PX;" name="txtStartdate" 
                 class="form-control shadow-none" required>
        </div>
       </p>
      </li>

      <li class="nav-item ms-lg-1 col-lg-5 col-12 col-md-12">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX;"> To date
        <div class="form-label-group">
          <input type="date" style="color: black; font-size: 13PX;" name="txtEnddate" 
                 class="form-control shadow-none" required>
        </div>
       </p>
      </li>

      <li class="nav-item col-lg-1 col-12 col-md-12 mt-1">
        <p class="form-label" style="color: black; text-align: left; font-size: 13PX; color: white;" > a
        <div class="location_icon form-label-group my-2">
              <button type="submit" name="search" class="btn btn-secondary" style="box-shadow: none; font-size: 14px"> <i class="fa fa-filter"></i><span class="ms-2" style="color:black;">Filter</span></button>
        </div>
      </p>
      </li>    


  </ul>
  </div>

</form>

</div>
</div>
<!-- END -->

<!-- START -->
<div class="container">
<div class="row">

<div class="col-lg-12 col-12" style="background: none;">
<div class="card card-profile" style="background: none;  box-shadow: none; border: none;">
<div class="list">

<table id="table1" class="table app-table-hover mb-0 text-left" style="background: none; box-shadow: none; border-radius: 5PX;">

  <thead style="font-weight: normal; font-size: 14px" >
    <tr>
      <th class="cell" >Company</th>
      <th class="cell" >Job</th>

      <th class="cell" >Applicant Name</th>
      <th class="cell" >Gender</th>
      <th class="cell" >Gmail</th>
      <th class="cell" >Contact No.</th>
      <th class="cell" >Address</th>
      <th class="cell" >Date Apply</th>

      <th class="cell" >Status</th>
      <th class="cell" >Date Status</th>
      <th class="cell" >PESO Requirement</th>
      <th class="cell" >Personal Resume</th>

    </tr>
  </thead>

  <tbody style="font-weight: normal; font-size: 13px">


<?php while($row = mysqli_fetch_assoc($searchResult)) { 

  $date_apply = date("F d, Y", strtotime ($row['Date_Posted']));
  $date_pulled = date("F d, Y", strtotime ($row['admin_pulled_date']));

?>

    <tr>

      <td><?php echo $row['company'];?></td>
      <td><?php echo $row['job_title'];?>

          <?php

          date_default_timezone_set('Asia/Manila');
          $date = date('Y-m-d');
          $date_ended = $row['job_date_ended'];
          $job_status = $row['job_status'];

          if ($job_status == 'Active' and $date_ended >= $date) {

            echo "<span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> $job_status </span>";

          } else if ($job_status == 'Inactive' and $date_ended == '0000-00-00') {

            echo "<span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> $job_status </span>";

          } else if ($job_status == 'Active' and $date_ended <= $date)  {

            echo "<span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> Successfull </span>";

          }

          ?>     

      </td>

      <td><?php echo $row['First_Name'];?> <?php echo $row['Middel_Name'];?> <?php echo $row['Last_Name'];?></td>
      <td><?php echo $row['Gender'];?></td>
      <td><?php echo $row['Email'];?></td>
      <td><?php echo $row['Contact_Number'];?></td>
      <td><?php echo $row['City'];?>, <?php echo $row['Province'];?></td>
      <td><?php echo $date_apply;?></td>

        <?php 

            if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

             echo "<td> <span class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> Pulled </span> </td>";

            } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

             echo "<td> <span class='ms-2' style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> New </span> </td>";

            } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

              echo "<td> <span class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> Reject </span> </td>";

            } else {

              echo "<td> <span class='ms-2' style='background: #333; color: white; padding: 3Px 8px; border-radius: 5px'> Hide </span> </td>";

            }

        ?>

        <?php 

            if ($row['Status'] == '0' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

             echo" <td> P - $date_pulled </td>";

            } else if ($row['Status'] == '1' && $row['Status_hide'] == '1' && $row['Status_remove'] == '1') {

             echo" <td> N - Not Updated </td>";

            } else if ($row['Status_remove'] == '0' && $row['Status_hide'] == '1') {

              echo" <td> R - $date_pulled </td>";

            } else {

              echo" <td> H - $date_pulled </td>";

            }

        ?>

        <td><a href="../files/<?php echo $row['Peso_Resume'];?>" download="<?php echo $row['Peso_Resume'];?>"> <?php echo $row['Peso_Resume'];?></a>

          <script type="text/javascript">
          function download_file() {
            document.getElementById("my_download").click()
          }
          </script>

        </td>

        <td><a href="../files/<?php echo $row['Resume'];?>" download="<?php echo $row['Resume'];?>"> <?php echo $row['Resume'];?></a>

          <script type="text/javascript">
          function download_file() {
            document.getElementById("my_download").click()
          }
          </script>

        </td>

    </tr>

  <?php   }   ?>


<tr style="background-color: whitesmoke;">

<?php while($row = mysqli_fetch_assoc($Count_Result)) { 

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

  <td colspan="1" style="background: lightgray; color: black; font-weight: 500"> Total Applicant - <?php echo $applicant_count ;?>
                   | Male - <?php echo $gender_male ;?>
                   | Female - <?php echo $gender_female ;?></td>

  <td colspan="1" style="background: whitesmoke; color: black; font-weight: 500"> Total New - <?php echo $new ;?>
                   | Male - <?php echo $new_male ;?>
                   | Female - <?php echo $new_female ;?></td>

  <td colspan="1" style="background: lightgray; color: black; font-weight: 500"> Total Pulled - <?php echo $pulled ;?>
                   | Male - <?php echo $pulled_male ;?>
                   | Female - <?php echo $pulled_female ;?></td>

  <td colspan="1" style="background: whitesmoke; color: black; font-weight: 500"> Total Reject - <?php echo $reject ;?>
                   | Male - <?php echo $reject_male ;?>
                   | Female - <?php echo $reject_female ;?></td>

  <td colspan="1" style="background: lightgray; color: black; font-weight: 500"> Total Hide - <?php echo $hide ;?>
                   | Male - <?php echo $hide_male ;?>
                   | Female - <?php echo $hide_female ;?></td>


<?php   }   ?>

</tr>












  </tbody>

</table>

</div>

<div class="app-card-footer mt-auto" style="float: right; font-size: 10px; padding: 20px 8px;">
        <button  type="button" onclick="tableToExcel('table1', 'W3C Example Table')" class="btn app-btn-secondary"
         style="font-size: 12px; font-family: sans-serif; background: #006600; font-weight: normal; color: white;"> Download to excel </button>
</div>

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
    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>

    <script type="text/javascript">

    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
      }
    })()

    </script>

</body>
</html> 

