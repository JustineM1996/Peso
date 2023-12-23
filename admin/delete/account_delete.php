<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];

    $query = mysqli_query($con,"SELECT * FROM account WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    }

    mysqli_query($con,"DELETE FROM account WHERE id = '$id'");


     echo "<script>alert('Successfull delete')</script>";
     echo "<script>window.location = '/peso/admin/account.php'</script>"; 

}

?>


