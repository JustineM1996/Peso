<?php

include '../database/database.php';

session_start();
$user_type = $_SESSION['admin'];
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false) {

    $sql = "SELECT * FROM account WHERE email = '$email' and user_type = '$user_type' and id = '$id' ";
    $run_Sql = mysqli_query($con, $sql);

    if ($run_Sql) {

        $fetch_info = mysqli_fetch_assoc($run_Sql);

        $id_acc = $fetch_info['id'];
        $profile_acc = $fetch_info['image'];
        $email_acc = $fetch_info['email'];

        $F_acc = $fetch_info['First_Name'];
        $M_acc = $fetch_info['Middel_Name'];
        $L_acc = $fetch_info['Last_Name']; 

        $status = $fetch_info['status'];
        $code = $fetch_info['code'];

        if($status == "verified") {

            if ($code != 0) {

                header('Location: ../login/reset-code.php');

            }

        } else if ($code < 0) {

            header('Location: ../login/otp-code.php');

        } else {

            header('Location: ../index.php');

        }

    }

} else {

    header('Location: ../index.php');

}

?>