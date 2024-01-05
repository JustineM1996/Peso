<?php

include '../../database/database.php';

if (isset($_GET['submit'])) {

    $Account_id = $_GET['id'];

    $jquery = "SELECT * FROM account WHERE id = '$Account_id'";
    $result = mysqli_query($con, $jquery);

    while ($row = mysqli_fetch_assoc($result)) {
        $Account_id = $row['id'];

    }

mysqli_query($con,"UPDATE account SET 

  id = '" .  $_GET['id'] . "',
  First_Name = '" .$_GET['First_Name']. "',
  Middel_Name = '" .$_GET['Middel_Name']. "',
  Last_Name = '" .$_GET['Last_Name']. "',

  Month = '" .$_GET['Month']. "',
  Day = '" .$_GET['Day']. "',
  Year = '" .$_GET['Year']. "',
  Gender = '" .$_GET['Gender']. "',

  Region = '" .$_GET['Region']. "',
  Province = '" .$_GET['Province']. "',
  City = '" .$_GET['City']. "',
  Barangay = '" .$_GET['Barangay']. "',
  Street = '" .$_GET['Street']. "'
  
  WHERE id = '" . $_GET['id'] . "'");

}

   echo "<script>alert('Successfull update')</script>";
   echo "<script>window.location = '/peso/admin/account-view.php?id=$Account_id'</script>"; 


?>


