<?php 

include '../../database/database.php';

if (isset($_POST['submit'])) {

mysqli_query($con,"UPDATE image SET 

	id = '" .  $_POST['id'] . "',	
	image_name ='" .  $_POST['image_name'] . "', 
	image_category ='" .  $_POST['image_category'] . "', 
	image_descriptions ='" .  $_POST['image_descriptions'] . "', 
	date_ended ='" . $_POST['date_ended'] . "'  WHERE id = '" . $_POST['id'] . "'");

}

   echo "<script>alert('Successfull update')</script>";
   echo "<script>window.location = '/peso/admin/announcement.php'</script>"; 

?>

