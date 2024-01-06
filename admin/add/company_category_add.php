<?php

include '../../database/database.php';

if(ISSET($_POST['SUBMIT'])) {

// Job Details
        $category = $_POST['category']; 

mysqli_query($con, "INSERT INTO company_category (category)
                                 VALUES ('$category')");

    }

   echo "<script>alert('Successfull Post')</script>";
   echo "<script>window.location = '/peso/admin/company-add.php'</script>"; 

?>


