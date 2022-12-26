<?php 
	require('header.php');
	require_once('../models/employeeModel.php');
	$id= $_GET['id'];
	$deleted= deleteEmp($id);
	if($deleted)
	{
		header("location: employees_admin.php?msg=delSucc");
	}
	else{
		header("location: employees_admin.php?msg=deleteError");
	}
?>