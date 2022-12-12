<?php 
	
	session_start();
	unset($_SESSION['status']);
	setcookie('status', 'true', time()-600, '/');
	header('location: ../views/login.php');

?>