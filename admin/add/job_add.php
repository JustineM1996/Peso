<?php

include '../../database/database.php';

if(isset($_POST['submit'])) {

// Job Details
        $company = $_POST['company']; 
        $query = mysqli_query($con,"SELECT * FROM company WHERE company = '$company' ");
        while($row = mysqli_fetch_array($query)){
        
        $com_id = $row['id'];

        }

        $job_title = $_POST['job_title'];    
        $job_salary = $_POST['job_salary'];
        $job_type = $_POST['job_type'];
        $job_schedule = $_POST['job_schedule'];
        $job_day = $_POST['job_day'];    
        $job_option = $_POST['job_option'];
        $job_category = $_POST['job_category'];
        $job_schedule_shift = $_POST['job_schedule_shift'];
        $job_gender = $_POST['job_gender'];
        $job_status = $_POST['job_status'];
        $posted_by = $_POST['posted_by'];    
        $date_ended = $_POST['date_ended'];   
    
        $job_description = $_POST['job_description'];    
        $job_requirements = $_POST['job_requirements']; 


        mysqli_query($con, "INSERT INTO job (company_id, job_title, job_salary, job_type, job_schedule, job_schedule_shift, job_day, job_option, job_status, 
                                             job_gender, job_description, job_requirements, posted_by, date_ended, job_category)

                                        VALUES ('$com_id', '$job_title', '$job_salary', '$job_type', '$job_schedule', '$job_schedule_shift', '$job_day', 
                                                '$job_option', '$job_status', '$job_gender', '$job_description', '$job_requirements', 
                                                '$posted_by', '$date_ended', '$job_category')");



                            $check_code = "SELECT * FROM job order by id desc ";
                            $code_res = mysqli_query($con, $check_code);

                            $fetch_data = mysqli_fetch_assoc($code_res);
                            $id_job = $fetch_data['id'];

    }

   echo "<script>alert('Successfull post')</script>";
   echo "<script>window.location = '/peso/admin/job-info.php?id=$id_job'</script>"; 

?>


