<?php 

include '../database/database.php';

if (isset($_GET['submit'])) {

    $Account_id = $_GET['id'];

    $jquery = "SELECT * FROM account WHERE id = '$Account_id'";
    $result = mysqli_query($con, $jquery);

    while ($row = mysqli_fetch_assoc($result)) {
        $Account_id = $row['id'];

    }

mysqli_query($con,"UPDATE account SET 

  id = '" .  $_GET['id'] . "',
  email = '" .$_GET['email']. "',
  Contant_Number = '" .$_GET['Contant_Number']. "'
  
  WHERE id = '" . $_GET['id'] . "'");

}

   echo "<script>alert('Successfull update')</script>";
   echo "<script>window.location = '/peso/user/account-view.php?id=$Account_id'</script>"; 


?>


