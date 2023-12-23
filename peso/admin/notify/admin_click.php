<?php include '../database/database.php';

if(isset($_GET['id'])) {

$id = $_GET['id'];

	$query = "UPDATE applicant SET admin_notify = '0' WHERE id = '$id'";
	$check = mysqli_query($con, $query);
	
    $query = mysqli_query($con,"SELECT * FROM applicant WHERE id = '$id' ");
    while($row = mysqli_fetch_array($query)) {

    $Account_Id = $row['Account_Id'];

    }

    echo "<script>window.location = '/peso/admin/peso-resume-view.php?id=$Account_Id'</script>"; 

  }

?>

