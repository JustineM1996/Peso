<?php include 'session.php' ?>
<?php include 'navbar.php' ?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>

  <!-- LOGO -->
  <link rel="shortcut icon" type="image/png" href="../images/LOGO.png">

  <!-- TITLE -->
  <title> PESO - All Company Reports </title>

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
                     company.category,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,

                     job.id,
                     job.job_title,
                     job.job_description,
                     job.job_salary,
                     job.job_day,
                     job.job_schedule,
                     job.job_schedule_shift,
                     job.job_type,
                     job.job_option,
                     job.job_gender,
                     job.date_posted,
                     job.date_ended,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

                       count(case when company.id = job.company_id and job.count then 1 end) as total_jobs,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when company.id = job.company_id and job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

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
                     LEFT JOIN job ON job.company_id = company.id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' group BY company.id order by company.id desc  ";

        } else {
          
          $date = date('Y-m-d');
          $query =  "SELECT company.id,
                     company.category,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,

                     job.id,
                     job.job_title,
                     job.job_description,
                     job.job_salary,
                     job.job_day,
                     job.job_schedule,
                     job.job_schedule_shift,
                     job.job_type,
                     job.job_option,
                     job.job_gender,
                     job.date_posted,
                     job.date_ended,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

                       count(case when company.id = job.company_id and job.count then 1 end) as total_jobs,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when company.id = job.company_id and job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,


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
                     LEFT JOIN job ON job.company_id = company.id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' group BY company.id order by company.id desc ";
                     $searchResult = date_time($query);

        }     

         } else {

          $date = date('Y-m-d');
          $query =  "SELECT company.id,
                     company.category,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,

                     job.id,
                     job.job_title,
                     job.job_description,
                     job.job_salary,
                     job.job_day,
                     job.job_schedule,
                     job.job_schedule_shift,
                     job.job_type,
                     job.job_option,
                     job.job_gender,
                     job.date_posted,
                     job.date_ended,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

                       count(case when company.id = job.company_id and job.count then 1 end)  as total_jobs,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when company.id = job.company_id and job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when company.id = job.company_id and job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

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
                     LEFT JOIN job ON job.company_id = company.id and company.id = job.company_id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id  group BY company.id  order by company.id desc";
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
                     job.company_id,
                     job.date_posted,

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
                     LEFT JOIN job ON job.company_id = company.id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' ";

   } else {
          
   $count_query =  "SELECT
                     company.id,

                     job.id,
                     job.company_id,
                     job.date_posted,

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
                     LEFT JOIN job ON job.company_id = company.id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' ";
                     $Count_Result = count_data($count_query);

        }     

   } else {

   $count_query =  "SELECT
                     company.id,

                     job.id,
                     job.company_id,
                     job.date_posted,

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
                     LEFT JOIN job ON job.company_id = company.id
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id ";
                     $Count_Result = count_data($count_query);
    }

    function count_data($count_query) {
        include '../database/database.php';

        $filterCount = mysqli_query($con, $count_query);
        return $filterCount;
    }

?>











<!-- TOTAL COUNT -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

  if ($startdate == "" || $enddate == "") { 

  include '../database/database.php';


  $count_company = "SELECT 

                       count(case when id = 1 then 1 end) as count_company,
                       count(case when status = 'Active' then 1 end) as count_company_active,
                       count(case when status = 'Inactive' then 1 end) as count_company_inactive

                       FROM company WHERE date_posted BETWEEN '$startdate' AND '$enddate'";

  } else {

  $count_company = "SELECT

                       count(case when id = 1 then 1 end) as count_company,
                       count(case when status = 'Active' then 1 end) as count_company_active,
                       count(case when status = 'Inactive' then 1 end) as count_company_inactive

                       FROM company WHERE date_posted BETWEEN '$startdate' AND '$enddate'";
                       $Count_Result_companay = count_data_company($count_company);

        }     

  } else {

  $count_company = "SELECT

                       count(id) as count_company,
                       count(case when status = 'Active' then 1 end) as count_company_active,
                       count(case when status = 'Inactive' then 1 end) as count_company_inactive

                       FROM company ";
                       $Count_Result_companay = count_data_company($count_company);
    }

    function count_data_company($count_company) {
        include '../database/database.php';

        $filterCount = mysqli_query($con, $count_company);
        return $filterCount;
    }

?>







<!-- TOTAL COUNT -->
<?php

    if (isset($_POST['search'])) {
        include '../database/database.php';
        
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

  if ($startdate == "" || $enddate == "") { 

  include '../database/database.php';

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' order by job.id desc";

  } else {

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       WHERE company.date_posted BETWEEN '$startdate' AND '$enddate' order by job.id desc";
                       $Count_Result_job = count_data_job($count_job_query);

        }     

  } else {

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id order by job.id desc";
                       $Count_Result_job = count_data_job($count_job_query);
    }

    function count_data_job($count_job_query) {
        include '../database/database.php';

        $filterCount = mysqli_query($con, $count_job_query);
        return $filterCount;
    }

?>










<section class="my-0 py-8">

<div class="container">
<div class="row">

<!-- HEAD A -->
<div class="tab-content col-lg-12">

<!-- START -->
<div class="container">
    <div class="row">

  <a class="col-lg-1" href='company.php' style="text-decoration: none; background: ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> ALL COMPANIES <p> | Records </p></h4>
        </div>
      </div>
    </div>
  </div>
<!-- END -->

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
      <th class="cell" colspan="2">Company</th>
      <th class="cell" ></th>
      <th class="cell" >Category</th>
      <th class="cell" >Location</th>
      <th class="cell" colspan="3">Total Jobs</th>      
      <th class="cell" colspan="2">Date Created</th>
      <th class="cell" colspan="2">Total Applicants</th>
      <th class="cell" colspan="2">Total New Applicants</th>
      <th class="cell" colspan="2">Total Pulled Applicants</th>
      <th class="cell" colspan="2">Total Reject Applicants</th>
      <th class="cell" colspan="2">Total Hide Applicants</th>
    </tr>
  </thead>

  <tbody style="font-weight: normal; font-size: 13px">

<?php while($row = mysqli_fetch_assoc($searchResult)) { 

    $date_posted = date("F d, Y", strtotime ($row['date_posted']));

  //COUNT TOTAL JOBS
    $total_jobs_Q = $row['total_jobs'];
    $total_new_job_A = $row['total_new_job'];
    $total_end_job_B = $row['total_end_job'];
    $total_suc_job_C = $row['total_suc_job'];

?>

<tr>  

      <td colspan="2" ><?php echo $row['company'];?></td>
     
      <?php

      $status = $row['status'];

      if ($status == 'Active') {

        echo "<td> <span  class='ms-2' style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px;'> $status </span></td>";

      } else {

        echo "<td><span  class='ms-2' style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px;'> $status </span></td>";
      }
      
      ?>

      
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['City'];?>, <?php echo $row['Province'];?></td>

      <td colspan="3" style="background: lightgray; font-weight: 500"> Jobs - <?php echo $total_jobs_Q ;?> 
      <span class="ms-2" style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> Active - <?php echo $total_new_job_A ;?> </span>
      <span class="ms-2" style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> Inactive - <?php echo $total_end_job_B ;?> </span> 
      <span class="ms-2" style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> Successfull - <?php echo $total_suc_job_C ;?> </span>
      </td>

      <td colspan="2" ><?php echo $date_posted;?></td>

      <td colspan="2" style="background: whitesmoke; color: black;" >Applicant - <?php echo $row['applicant_count'];?> | Male - <?php echo $row['male'];?> | Female - <?php echo $row['female'];?></td>
      <td colspan="2" style="background: lightgray; color: black;">New - <?php echo $row['applicant_new'];?> | Male - <?php echo $row['new_male'];?> | Female - <?php echo $row['new_female'];?> </td>
      <td colspan="2" style="background: whitesmoke; color: black;">Pull - <?php echo $row['applicant_pulled'];?> | Male - <?php echo $row['pulled_male'];?> | Female - <?php echo $row['pulled_female'];?> </td>
      <td colspan="2" style="background: lightgray; color: black;">Reject - <?php echo $row['applicant_reject'];?> | Male - <?php echo $row['reject_male'];?> | Female - <?php echo $row['reject_male'];?></td>
      <td colspan="2" style="background: whitesmoke; color: black;">Hide - <?php echo $row['applicant_hide'];?> | Male - <?php echo $row['hide_male'];?> | Female - <?php echo $row['hide_male'];?></td>
      

</tr>

<?php   }   ?>





<tr>

  <?php while($row = mysqli_fetch_assoc($Count_Result_companay)) {

  //COUNT TOTAL JOBS
    $count_company = $row['count_company'];
    $count_company_active = $row['count_company_active'];
    $count_company_inactive = $row['count_company_inactive'];


   ?> 


  <td colspan="4" style="background: lightgray; font-weight: 500"> Total Company - <?php echo $count_company ;?> 
  <span class="ms-2" style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> Active - <?php echo $count_company_active ;?> </span>
  <span class="ms-2" style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> Inactive - <?php echo $count_company_inactive ;?> </span> 
  </td>

  <td colspan="" style="background: lightgray; font-weight: 500"> </td>

  <?php } ?>



    <?php while($row = mysqli_fetch_assoc($Count_Result_job)) {

  //COUNT TOTAL JOBS
    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];
    $total_suc_job = $row['total_suc_job'];

   ?> 

  <td colspan="4" style="background: lightgray; font-weight: 500"> Total Jobs - <?php echo $total_jobs ;?> 
  <span class="ms-2" style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> Active - <?php echo $total_new_job ;?> </span>
  <span class="ms-2" style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> Inactive - <?php echo $total_end_job ;?> </span> 
  <span class="ms-2" style='background: darkblue; color: white; padding: 3Px 8px; border-radius: 5px'> Successfull - <?php echo $total_suc_job ;?> </span>
  </td>

  <?php } ?>






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

  <td colspan="2" style="background: whitesmoke; color: black; font-weight: 500"> Total Applicant - <?php echo $applicant_count ;?> | Male - <?php echo $gender_male ;?> | Female - <?php echo $gender_female ;?></td>
  <td colspan="2" style="background: lightgray; color: black; font-weight: 500"> Total New - <?php echo $new ;?> | Male - <?php echo $new_male ;?> | Female - <?php echo $new_female ;?></td>
  <td colspan="2" style="background: whitesmoke; color: black; font-weight: 500"> Total Pulled - <?php echo $pulled ;?> | Male - <?php echo $pulled_male ;?> | Female - <?php echo $pulled_female ;?></td>
  <td colspan="2" style="background: lightgray; color: black; font-weight: 500"> Total Reject - <?php echo $reject ;?> | Male - <?php echo $reject_male ;?> | Female - <?php echo $reject_female ;?></td>
  <td colspan="2" style="background: whitesmoke; color: black; font-weight: 500"> Total Hide - <?php echo $hide ;?> | Male - <?php echo $hide_male ;?> | Female - <?php echo $hide_female ;?></td>


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

