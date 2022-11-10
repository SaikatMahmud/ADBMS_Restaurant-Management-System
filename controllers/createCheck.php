<?php 
session_start();
require('../models/restaurantsModel.php');

if(isset($_REQUEST['submit'])){
	
	$reg=$_REQUEST['reg'];
	$name = $_REQUEST['name'];
	$branch = $_REQUEST['branch'];
	$email = $_REQUEST['email'];
	$contact = $_REQUEST['contact'];
	$managerID = $_REQUEST['managerID'] ? $_REQUEST['managerID'] : "";

	if($reg != null && $name != null && $branch != null && $contact!=null && $email!=null){
		
		$addRes= addRestaurant($reg,$name,$branch,$contact,$email,$managerID);
		if($addRes)
		{
			
			echo 'Restaurant added';
			//header('location: ../views/login.php');
		}
		else
		{
			print_r($addRes);
		//header('location: ../views/reg.php?msg=error');
		}
	}
	
}
else{
	echo "null submission ....";
}

?>