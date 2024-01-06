<?php

include '../../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];

    $query = mysqli_query($con,"SELECT * FROM job WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    }

    mysqli_query($con,"DELETE FROM job WHERE id = '$id'");
    mysqli_query($con,"DELETE FROM applicant WHERE job_id = '$id'");


     echo "<script>alert('Successfull delete')</script>";
     echo "<script>window.location = '/peso/admin/job.php'</script>"; 

}

?>


