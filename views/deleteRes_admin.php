<?php 
	require('header.php');
	require_once('../models/restaurantModel.php');
	$id= $_GET['id'];
	$deleted= deleteRes($id);
	if($deleted)
	{
		header("location: restaurants_admin.php?msg=delSucc");
	}
	else{
		header("location: restaurants_admin.php?msg=deleteError");
	}
?>