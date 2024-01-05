<?php include 'session.php' ?>
<?php include 'navbar.php' ?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>



  <!-- TITLE -->
  <title> PESO - Company Reports </title>

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
    box-shadow: none ;
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

          $query =  "SELECT company.id,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,
                     company.category,

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
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted,
                     job.date_ended,
                     job.end_job,
                     job.job_status,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' AND company.id = '".$_REQUEST['id']."' group BY job.id order by job.id desc  ";

        } else {
          
          $query =  "SELECT company.id,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,
                     company.category,

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
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted,
                     job.date_ended,
                     job.end_job,
                     job.job_status,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' AND company.id = '".$_REQUEST['id']."' group BY job.id order by job.id desc  ";
                     $searchResult = date_time($query);

        }     

    } else {


          $query =  "SELECT company.id,
                     company.company,
                     company.Region,
                     company.Province,
                     company.City,
                     company.Barangay,
                     company.status,
                     company.category,

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
                     (case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                     (case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                     (case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job,

                     job.date_posted,
                     job.date_ended,
                     job.end_job,
                     job.job_status,
                     job.company_id,
                     job.job_status,
                     job.job_requirements,
                     job.job_category,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.id = '".$_REQUEST['id']."' group BY job.id order by job.id desc ";
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

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.date_posted >= date('Y-m-d') then 1 end) as total_new_job,
                     count(case when job.date_ended <= date('Y-m-d') then 1 end) as total_end_job,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' AND 
                           company.id = '".$_REQUEST['id']."' group by job.company_id ";

        } else {
          
   $count_query =  "SELECT

                     company.id,
                     job.id,
                     job.company_id,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.date_posted >= date('Y-m-d') then 1 end) as total_new_job,
                     count(case when job.date_ended <= date('Y-m-d') then 1 end) as total_end_job,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' AND 
                           company.id = '".$_REQUEST['id']."' group by job.company_id ";
                     $Count_Result = count_data($count_query);

        }     

    } else {

   $count_query =  "SELECT

                     company.id,
                     job.id,
                     job.company_id,

                     count(case when job.count = 1 then 1 end) as total_jobs,
                     count(case when job.date_posted >= date('Y-m-d') then 1 end) as total_new_job,
                     count(case when job.date_ended <= date('Y-m-d') then 1 end) as total_end_job,

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
                     LEFT JOIN applicant ON applicant.company_id = company.id and applicant.job_id = job.id
                     WHERE company.id = '".$_REQUEST['id']."' group by job.company_id ";
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

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.company_id = company.id then 1 end) as count_company,
                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' WHERE company.id = '".$_REQUEST['id']."' order by job.id desc";

  } else {

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.company_id = company.id then 1 end) as count_company,
                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id
                       WHERE job.date_posted BETWEEN '$startdate' AND '$enddate' WHERE company.id = '".$_REQUEST['id']."'  order by job.id desc";
                       $Count_Result_job = count_data_job($count_job_query);

        }     

  } else {

   date_default_timezone_set('Asia/Manila');
   $date = date('Y-m-d');

  $count_job_query = "SELECT company.id,
                       job.id,
                       job.company_id,

                       count(case when job.company_id = company.id then 1 end) as count_company,
                       count(case when job.count = 1 then 1 end) as total_jobs,
                       count(case when job.job_status = 'Active' and job.date_ended >= '$date' then 1 end) as total_new_job,
                       count(case when job.job_status = 'Inactive' and job.date_ended = 0000-00-00 then 1 end) as total_end_job,
                       count(case when job.job_status = 'Active' and job.date_ended <= '$date' then 1 end) as total_suc_job

                       FROM company 
                       JOIN job ON job.company_id = company.id WHERE company.id = '".$_REQUEST['id']."'  order by job.id desc";
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


<?php
  include '../database/database.php';
  $query = mysqli_query($con,"SELECT * FROM company WHERE id = '".$_REQUEST['id']."' ");
  while($row = mysqli_fetch_array($query)){

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

  <a class="col-lg-1" href='company-info.php?id=<?php echo $row['id'];?>' style="text-decoration: none; background: none ;" onclick='return apply()'>
    <i class='fas fa-angle-left' style="font-size: 15px; color: black; border-radius: 100%; padding: 10px 15px; transition: 0.3s;"></i>
  </a>

      <div class="row my-sm-3">
        <div class="col-lg-12 mx-auto">
          <h4 class="mb-0" style="color: black;"> COMPANY <p> | Records </p></h4>
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
                      <?php echo $row['Barangay'];?>, <?php echo $row['City'];?>, <?php echo $row['Province'];?> </span>
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
                      <span class="ms-2"><?php echo $row['link'];?></span>
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
        <div class="location_../assets/icon form-label-group my-2">
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
      <th class="cell" >Company Category</th>
      <th class="cell" >Location</th>
      <th class="cell" >Company Status</th>
      <th class="cell" >Job</th>
      <th class="cell" >Job Category</th>

      <th class="cell" >Date Posted</th>
      <th class="cell" >Date Ended</th>


      <th class="cell" >Applicant</th>
      <th class="cell" >New Applicant</th>
      <th class="cell" >Pulled Applicant</th>
      <th class="cell" >Reject Applicant</th>
      <th class="cell" >Hide Applicant</th>

    </tr>
  </thead>

  <tbody style="font-weight: normal; font-size: 13px">


<?php while($row = mysqli_fetch_assoc($searchResult)) { 

?>

    <tr>

      <td><?php echo $row['company'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['City'];?>, <?php echo $row['Province'];?></td>

          <?php

          $status = $row['status'];

          if ($status == 'Active') {

            echo "<td style='text-align: center;'> <span style='background: darkgreen; color: white; padding: 3Px 8px; border-radius: 5px'> $status </span></td>";

          } else {

            echo "<td style='text-align: center;'> <span style='background: darkred; color: white; padding: 3Px 8px; border-radius: 5px'> $status </span></td>";
          }
          
          ?>   

      <td><?php echo $row['job_title'];?>

          <?php

          date_default_timezone_set('Asia/Manila');
          $date = date('Y-m-d');
          $date_ended = $row['date_ended'];
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


      <td><?php echo $row['job_category'];?></td>
      <td><?php echo date("F d, Y", strtotime ($row['date_posted']));;?></td>

          <?php

          $end_job = date("F d, Y", strtotime ($row['end_job']));
          $date = date("F d, Y", strtotime ($row['date_ended']));
          $date_ended = $row['date_ended'];

          if ($date_ended == '0000-00-00') {

             echo "<td> End job - $end_job </td>";

          } else {

             echo "<td>  $date </td>";

          }
          
          ?>
      <td colspan="1" style="background: whitesmoke; color: black;" >Applicant - <?php echo $row['applicant_count'];?> | Male - <?php echo $row['male'];?> | Female - <?php echo $row['female'];?></td>
      <td colspan="1" style="background: lightgray; color: black;">New - <?php echo $row['applicant_new'];?> | Male - <?php echo $row['new_male'];?> | Female - <?php echo $row['new_female'];?> </td>
      <td colspan="1" style="background: whitesmoke; color: black;">Pull - <?php echo $row['applicant_pulled'];?> | Male - <?php echo $row['pulled_male'];?> | Female - <?php echo $row['pulled_female'];?> </td>
      <td colspan="1" style="background: lightgray; color: black;">Reject - <?php echo $row['applicant_reject'];?> | Male - <?php echo $row['reject_male'];?> | Female - <?php echo $row['reject_male'];?></td>
      <td colspan="1" style="background: whitesmoke; color: black;">Hide - <?php echo $row['applicant_hide'];?> | Male - <?php echo $row['hide_male'];?> | Female - <?php echo $row['hide_male'];?></td>

    </tr>

  <?php   }   ?>


<tr style="background-color: whitesmoke;">

  <td colspan="4"> </td>

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

    $total_jobs = $row['total_jobs'];
    $total_new_job = $row['total_new_job'];
    $total_end_job = $row['total_end_job'];

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

  <td colspan="1" style="background: whitesmoke; color: black; font-weight: 500"> Total Applicant - <?php echo $applicant_count ;?> 
                   Male - <?php echo $gender_male ;?> 
                   Female - <?php echo $gender_female ;?></td>

  <td colspan="1" style="background: lightgray; color: black; font-weight: 500"> Total New - <?php echo $new ;?> 
                   Male - <?php echo $new_male ;?> 
                   Female - <?php echo $new_female ;?></td>

  <td colspan="1" style="background: whitesmoke; color: black; font-weight: 500"> Total Pulled - <?php echo $pulled ;?> 
                   Male - <?php echo $pulled_male ;?> 
                   Female - <?php echo $pulled_female ;?></td>

  <td colspan="1" style="background: lightgray; color: black; font-weight: 500"> Total Reject - <?php echo $reject ;?> 
                   Male - <?php echo $reject_male ;?> 
                   Female - <?php echo $reject_female ;?></td>

  <td colspan="1" style="background: whitesmoke; color: black; font-weight: 500"> Total Hide - <?php echo $hide ;?> 
                   Male - <?php echo $hide_male ;?> 
                   Female - <?php echo $hide_female ;?></td>


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

