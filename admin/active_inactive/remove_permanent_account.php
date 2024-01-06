<?php

include '../../database/database.php';

if(isset($_POST['submit'])){

$id = $_POST['id'];

    mysqli_query($con,"DELETE FROM account WHERE id = '$id'");

    echo "<script>alert('Successfull remove permanent account')</script>";
    echo "<script>window.location = '/peso/admin/account.php'</script>"; 

}

?>


