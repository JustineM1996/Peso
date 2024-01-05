<?php 

include '../../database/database.php';

if(isset($_GET['id'])) {

$id = $_GET['id'];

	$query = "UPDATE applicant SET admin_hide = '0',
								   admin_notify = '0' WHERE id = '$id'";
	mysqli_query($con, $query);
	
   echo "<script>window.location = '/peso/admin/index.php'</script>"; 

    }
?>

