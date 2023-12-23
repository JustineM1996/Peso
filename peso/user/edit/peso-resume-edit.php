<?php 

include '../database/database.php';

if (isset($_GET['submit'])) {

    $Account_id = $_GET['Account_Id'];

    $jquery = "SELECT * FROM account WHERE id = '$Account_id'";
    $result = mysqli_query($con, $jquery);

    while ($row = mysqli_fetch_assoc($result)) {
        $Account_id = $row['id'];
    }

mysqli_query($con,"UPDATE personal_data SET 

  id = '" .  $_GET['id'] . "',
  First_Name = '" .$_GET['First_Name']. "',
  Middel_Name = '" .$_GET['Middel_Name']. "',
  Last_Name = '" .$_GET['Last_Name']. "',

  Month = '" .$_GET['Month']. "',
  Day = '" .$_GET['Day']. "',
  Year = '" .$_GET['Year']. "',
  Gender = '" .$_GET['Gender']. "',
  Birth_Place = '" .$_GET['Birth_Place']. "',
  Age = '" .$_GET['Age']. "',

  Email = '" .$_GET['Email']. "',
  Contact_Number = '" .$_GET['Contact_Number']. "',

  Region = '" .$_GET['Region']. "',
  Province = '" .$_GET['Province']. "',
  City = '" .$_GET['City']. "',
  Barangay = '" .$_GET['Barangay']. "',
  Street = '" .$_GET['Street']. "',

  Job_Title = '" .$_GET['Job_Title']. "',
  Company = '" .$_GET['Company']. "',
  Company_Address = '" .$_GET['Company_Address']. "',
  Work_From_Date = '" .$_GET['Work_From_Date']. "',
  Work_From_To = '" .$_GET['Work_From_To']. "',

  Education = '" .$_GET['Education']. "',   
  Field_Of_Study = '" .$_GET['Field_Of_Study']. "',
  School = '" .$_GET['School']. "',
  School_Address = '" .$_GET['School_Address']. "',
  School_From_Date = '" .$_GET['School_From_Date']. "', 
  School_From_To = '" .$_GET['School_From_To']. "',

  Update_Resume = '" .$_GET['Update_Resume']. "'

  WHERE id = '" . $_GET['id'] . "'");

}

   echo "<script>alert('Successfull update peso resume')</script>";
   echo "<script>window.location = '/peso/user/account.php?id=$Account_id'</script>"; 


?>

