<?php

include '../database/database.php';

if(isset($_GET['id'])){

$id = $_GET['id'];

    $query = mysqli_query($con,"SELECT * FROM image WHERE id = '$id'");
    while($row = mysqli_fetch_assoc($query)) {

    $imagess = '../../images/'.$row['image'];;

    if (file_exists($imagess)) {
        unlink($imagess);
    }

    }

    mysqli_query($con,"DELETE FROM image WHERE id = '$id'");

     echo "<script>alert('Successfull delete')</script>";
     echo "<script>window.location = '/peso/admin/image.php'</script>"; 

}

?>


