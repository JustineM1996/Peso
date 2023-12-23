<?php

include '../database/database.php';

if(ISSET($_POST['SUBMIT'])) {

// Job Details
        $job_option = $_POST['job_option']; 

mysqli_query($con, "INSERT INTO job_option (job_option)
                                 VALUES ('$job_option')");

    }

   echo "<script>alert('Successfull Add Job Types')</script>";
   echo "<script>window.location = '/peso/admin/job-add.php'</script>"; 

?>


