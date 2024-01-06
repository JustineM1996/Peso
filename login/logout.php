<?php

session_start();

if (isset($_GET['id'])) {

	if ($_SESSION['admin'] = 'admin') {
		
		unset($_SESSION['admin']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		session_destroy();
		header('location: ../index.php');

		} else if ($_SESSION['user'] = 'user') {

			unset($_SESSION['user']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			session_destroy();
			header('location: ../index.php');

		} 

}

?>