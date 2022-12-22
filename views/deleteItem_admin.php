<?php 
	require('header.php');
	require_once('../models/itemModel.php');
	$id= $_GET['id'];
	$deleted= deleteItem($id);
	if($deleted)
	{
		header("location: allItems_admin.php");
	}
	else{
		header("location: allItems_admin.php?msg=deleteError");
	}
?>