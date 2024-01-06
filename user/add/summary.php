<?php

include '../../database/database.php';

// ADD SUMMARY
if(isset($_POST['add_summary'])) {

        $summary_id = $_POST['summary_id']; 
        $summary = $_POST['summary'];    
        
        mysqli_query($con, "INSERT INTO summary ( summary_id, summary)
                            VALUES ('$summary_id', '$summary')");
   
   echo "<script>alert('Successfull add summary')</script>";
   echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
   
 }

// EDIT SUMMARY
if(isset($_GET['edit_summary'])) {
        
        $sum_id = $_GET['sum_id']; 
        $summary = $_GET['summary'];    

        mysqli_query($con, "UPDATE summary SET summary = '$summary'
                            WHERE sum_id = '$sum_id' ");
   
   echo "<script>alert('Successfull edit summary')</script>";
   echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

 }

// DELETE SUMMARY
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    mysqli_query($con,"DELETE FROM summary WHERE sum_id = '$delete'");

    echo "<script>alert('Successfull delete summary')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

?>
