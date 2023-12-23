<?php

include '../database/database.php';

if(ISSET($_POST['SUBMIT'])) {

// Job Details
        $job_category = $_POST['job_category']; 

mysqli_query($con, "INSERT INTO job_category (job_category)
                                 VALUES ('$job_category')");

    }

   echo "<script>alert('Successfull Add Category')</script>";
   echo "<script>window.location = '/peso/admin/job-add.php'</script>"; 

?>


