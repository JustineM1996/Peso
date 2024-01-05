<?php 

include '../../database/database.php';

if(isset($_GET['id'])) {

$id = $_GET['id'];


    $query = "UPDATE applicant SET Status_remove_user = '0' WHERE id = '$id'";
    mysqli_query($con, $query);
    
   echo "<script>alert('Successfull remove')</script>";
   echo "<script>window.location = '/peso/user/my-job.php'</script>"; 


    }
?>