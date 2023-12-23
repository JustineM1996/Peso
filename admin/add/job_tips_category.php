<?php

include '../database/database.php';

if(ISSET($_POST['SUBMIT'])) {

// Job Details
        $job_tips_category = $_POST['job_tips_category']; 

mysqli_query($con, "INSERT INTO job_tips_category (job_tips_category)
                                 VALUES ('$job_tips_category')");

    }

   echo "<script>alert('Successfull Add Category')</script>";
   echo "<script>window.location = '/peso/admin/image-add.php'</script>"; 

?>


