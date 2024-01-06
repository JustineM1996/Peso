<?php

include '../../database/database.php';

// ADD EDUCATION
if(isset($_POST['add_education'])) {

    $education_id = $_POST['education_id']; 

    $Education = $_POST['Education']; 
    $Field_Of_Study = $_POST['Field_Of_Study'];    
    $School_Name = $_POST['School_Name'];

    $School_From_Date_Month = $_POST['School_From_Date_Month'];
    $School_From_Date_Year = $_POST['School_From_Date_Year'];

    if(empty($_POST['currently_enrolled'])) {
        $currently_enrolled = 'unchecked';
        $School_From_To_Month = $_POST['School_From_To_Month'];
        $School_From_To_Year = $_POST['School_From_To_Year']; 
    } else {
        $currently_enrolled = 'checked'; 
        $School_From_To_Month = 'Month';
        $School_From_To_Year = 'Year'; 
    }

    $Region = $_POST['Region'];
    $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];  
    $Street = $_POST['Street'];  

    mysqli_query($con, "INSERT INTO education ( Education, Field_Of_Study, School_Name, currently_enrolled,
                                                School_From_Date_Month, School_From_Date_Year, School_From_To_Month, School_From_To_Year,
                                                Region, Province, City, Barangay, Street,
                                                education_id)

                                    VALUES ('$Education', '$Field_Of_Study', '$School_Name', '$currently_enrolled',
                                            '$School_From_Date_Month', '$School_From_Date_Year', '$School_From_To_Month', '$School_From_To_Year',
                                            '$Region', '$Province', '$City', '$Barangay', '$Street',
                                            '$education_id')");
    
    echo "<script>alert('Successfull add education infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
}

// EDIT EDUCATION
if(isset($_GET['edit_education'])) {

    $edu_id = $_GET['edu_id']; 
    $Education = $_GET['Education']; 
    $Field_Of_Study = $_GET['Field_Of_Study'];    
    $School_Name = $_GET['School_Name'];

    $School_From_Date_Month = $_GET['School_From_Date_Month'];
    $School_From_Date_Year = $_GET['School_From_Date_Year'];

    if(empty($_GET['currently_enrolled'])) {
        $currently_enrolled = 'unchecked';
        $School_From_To_Month = $_GET['School_From_To_Month'];
        $School_From_To_Year = $_GET['School_From_To_Year']; 
    } else {
        $currently_enrolled = 'checked'; 
        $School_From_To_Month = 'Month';
        $School_From_To_Year = 'Year'; 
    }

    $Region = $_GET['Region'];
    $Province = $_GET['Province'];
    $City = $_GET['City'];
    $Barangay = $_GET['Barangay'];  
    $Street = $_GET['Street'];  

    mysqli_query($con,"UPDATE education SET 

    edu_id = '$edu_id',
    Education = '$Education',
    Field_Of_Study = '$Field_Of_Study',
    School_Name = '$School_Name',


    School_From_Date_Month = '$School_From_Date_Month',
    School_From_Date_Year = '$School_From_Date_Year',

    currently_enrolled = '$currently_enrolled',
    School_From_To_Month = '$School_From_To_Month',
    School_From_To_Year = '$School_From_To_Year',

    Region = '$Region',
    Province = '$Province',
    City = '$City',
    Barangay = '$Barangay',
    Street = '$Street'

    WHERE edu_id = '$edu_id' ");

    echo "<script>alert('Successfull edit education infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
}

// DELETE EDUCATION
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    mysqli_query($con,"DELETE FROM education WHERE edu_id = '$delete'");

    echo "<script>alert('Successfull delete education infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

?>