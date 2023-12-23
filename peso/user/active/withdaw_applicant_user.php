<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];

    mysqli_query($con,"DELETE FROM applicant WHERE id = '$id'");

    echo "<script>alert('Successfull remove')</script>";
    echo "<script>window.location = '/peso/user/my-job.php'</script>"; 

}

?>