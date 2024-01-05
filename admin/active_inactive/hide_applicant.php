<?php 

include '../../database/database.php';

// HIDE
if(isset($_GET['id'])) {

$id = $_GET['id'];

	$query = "UPDATE applicant SET Status_hide = '0' WHERE id = '$id'";
	mysqli_query($con, $query);
	
    echo "<script>alert('Successfull Hide')</script>";
    echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 


    }

// UNHIDE
if(isset($_GET['unhide'])) {

$id = $_GET['unhide'];

	$query = "UPDATE applicant SET Status_hide = '1' WHERE id = '$id'";
	mysqli_query($con, $query);
	
    echo "<script>alert('Successfull Unhide')</script>";
    echo "<script>window.location = '/peso/admin/applicant-all.php'</script>"; 

    }


?>