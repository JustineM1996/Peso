<?php 

include '../../database/database.php';

if(isset($_GET['id'])) {

$id = $_GET['id'];

   $sql = "SELECT * FROM job JOIN applicant ON applicant.job_id = job.id WHERE job.id = '$id'";

	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$personal_id = $row['id'];
	}

	$query = "UPDATE applicant SET user_hide = '0',
											 user_notify = '0' WHERE id = '$personal_id'";
	mysqli_query($con, $query);

	 
	echo "<script>window.location = '/peso/user/index.php'</script>"; 

   }

?>

