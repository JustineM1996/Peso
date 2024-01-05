<?php

include '../../database/database.php';

// ADD SKILL
if(isset($_POST['add_skill'])) {

        $skill_id = $_POST['skill_id']; 
        $skill_name = $_POST['skill_name'];
        $year_of_experience = $_POST['year_of_experience'];
        
        mysqli_query($con, "INSERT INTO skills ( skill_id, skill_name, year_of_experience)
                            VALUES ('$skill_id', '$skill_name', '$year_of_experience')");
   
   echo "<script>alert('Successfull add skill')</script>";
   echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 
   
 }

// EDIT SKILL
if(isset($_GET['edit_skill'])) {
        
        $sk_id = $_GET['sk_id'];
        $skill_name = $_GET['skill_name'];
        $year_of_experience = $_GET['year_of_experience'];     
        
        mysqli_query($con, "UPDATE skills SET year_of_experience = '$year_of_experience', skill_name = '$skill_name'
                            WHERE sk_id = '$sk_id' ");
   
   echo "<script>alert('Successfull edit skill')</script>";
   echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

 }

// DELETE SKILL
if(isset($_GET['delete'])) {

$delete = $_GET['delete'];

    mysqli_query($con,"DELETE FROM skills WHERE sk_id = '$delete'");

    echo "<script>alert('Successfull delete skill')</script>";
    echo "<script>window.location = '/peso/user/peso-resume-view.php'</script>"; 

}

?>
