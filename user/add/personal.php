<?php

include '../../database/database.php';

// ADD PERSONAL
if(isset($_POST['add_personal'])) {

    $personal_id = $_POST['personal_id']; 

    $First_Name = $_POST['First_Name']; 
    $Middel_Name = $_POST['Middel_Name'];    
    $Last_Name = $_POST['Last_Name'];

    $Month = $_POST['Month'];
    $Day = $_POST['Day'];
    $Year = $_POST['Year'];
    $Age = $_POST['Age']; 

    $Gender = $_POST['Gender'];
    $Birth_Place = $_POST['Birth_Place'];

    $Region = $_POST['Region'];
    $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];  
    $Street = $_POST['Street'];  

    mysqli_query($con, "INSERT INTO personal ( First_Name, Middel_Name, Last_Name, 
                                                    Month, Day, Year, Age, Gender, Birth_Place,
                                                    Region, Province, City, Barangay, Street,
                                                    personal_id)

                                    VALUES ('$First_Name', '$Middel_Name', '$Last_Name', 
                                            '$Month', '$Day', '$Year', '$Age', '$Gender', '$Birth_Place',
                                            '$Region', '$Province', '$City', '$Barangay', '$Street',
                                            '$personal_id')");
    
    echo "<script>alert('Successfull add personal infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

// EDIT PERSONAL
if(isset($_GET['edit_personal'])) {

    mysqli_query($con,"UPDATE personal SET 

    per_id = '" .  $_GET['per_id'] . "',

    First_Name = '" .$_GET['First_Name']. "',
    Middel_Name = '" .$_GET['Middel_Name']. "',
    Last_Name = '" .$_GET['Last_Name']. "',

    Month = '" .$_GET['Month']. "',
    Day = '" .$_GET['Day']. "',
    Year = '" .$_GET['Year']. "',
    Age = '" .$_GET['Age']. "',

    Gender = '" .$_GET['Gender']. "',
    Birth_Place = '" .$_GET['Birth_Place']. "',

    Region = '" .$_GET['Region']. "',
    Province = '" .$_GET['Province']. "',
    City = '" .$_GET['City']. "',
    Barangay = '" .$_GET['Barangay']. "',
    Street = '" .$_GET['Street']. "'

    WHERE per_id = '" . $_GET['per_id'] . "' ");

    echo "<script>alert('Successfull edit personal infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
}

// DELETE PERSONAL
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    mysqli_query($con,"DELETE FROM personal WHERE per_id = '$delete'");

    echo "<script>alert('Successfull delete personal infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

?>