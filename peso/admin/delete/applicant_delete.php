<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];

    $query = mysqli_query($con,"SELECT * FROM applicant WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    }

    mysqli_query($con,"DELETE FROM applicant WHERE id = '$id'");

     echo "<script>alert('Successfull delete')</script>";
     echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 

}

?>


