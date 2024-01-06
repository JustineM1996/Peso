<?php

include '../../database/database.php';

// ADD WORK
if(isset($_POST['add_work_experience'])) {

    $work_experience_id = $_POST['work_experience_id']; 
    $Job_Title = $_POST['Job_Title']; 
    $Company = $_POST['Company'];    

    $Work_From_Date_Month = $_POST['Work_From_Date_Month'];
    $Work_From_Date_Year = $_POST['Work_From_Date_Year'];

    if(empty($_POST['currently_employed'])) {
        $currently_employed = 'unchecked';
        $Work_From_To_Month = $_POST['Work_From_To_Month'];
        $Work_From_To_Year = $_POST['Work_From_To_Year']; 
    } else {
        $currently_employed = 'checked'; 
        $Work_From_To_Month = 'Month';
        $Work_From_To_Year = 'Year'; 
    }

    $Region = $_POST['Region'];
    $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];  
    $Street = $_POST['Street'];  

    mysqli_query($con, "INSERT INTO work_experience ( Job_Title, Company, currently_employed,
                                                Work_From_Date_Month, Work_From_Date_Year, Work_From_To_Month, Work_From_To_Year,
                                                Region, Province, City, Barangay, Street,
                                                work_experience_id)

                                    VALUES ('$Job_Title', '$Company', '$currently_employed',
                                            '$Work_From_Date_Month', '$Work_From_Date_Year', '$Work_From_To_Month', '$Work_From_To_Year',
                                            '$Region', '$Province', '$City', '$Barangay', '$Street',
                                            '$work_experience_id')");
    
    echo "<script>alert('Successfull add work experience infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

// EDIT WORK
if(isset($_GET['edit_work_experience'])) {

    $work_id = $_GET['work_id']; 
    $Job_Title = $_GET['Job_Title']; 
    $Company = $_GET['Company'];    

    $Work_From_Date_Month = $_GET['Work_From_Date_Month'];
    $Work_From_Date_Year = $_GET['Work_From_Date_Year'];

    if(empty($_GET['currently_employed'])) {
        $currently_employed = 'unchecked';
        $Work_From_To_Month = $_GET['Work_From_To_Month'];
        $Work_From_To_Year = $_GET['Work_From_To_Year']; 
    } else {
        $currently_employed = 'checked'; 
        $Work_From_To_Month = 'Month';
        $Work_From_To_Year = 'Year'; 
    }

    $Region = $_GET['Region'];
    $Province = $_GET['Province'];
    $City = $_GET['City'];
    $Barangay = $_GET['Barangay'];  
    $Street = $_GET['Street'];  

    mysqli_query($con,"UPDATE work_experience SET 

    work_id = '$work_id',

    Job_Title = '$Job_Title',
    Company = '$Company',

    Work_From_Date_Month = '$Work_From_Date_Month',
    Work_From_Date_Year = '$Work_From_Date_Year',

    currently_employed = '$currently_employed',
    Work_From_To_Month = '$Work_From_To_Month',
    Work_From_To_Year = '$Work_From_To_Year',

    Region = '$Region',
    Province = '$Province',
    City = '$City',
    Barangay = '$Barangay',
    Street = '$Street'

    WHERE work_id = '$work_id' ");

    echo "<script>alert('Successfull edit work experience infomation')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
}

// DELETE WORK
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    mysqli_query($con,"DELETE FROM work_experience WHERE work_id = '$delete'");

    echo "<script>alert('Successfull delete work experience')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

?>