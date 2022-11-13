<?php 
session_start();
require('../models/loginModel.php');

// function doLogin($username, $password)
// {
//     $con= getConnection();
//     $sql = "select * from user_login where username='{$username}' and password='{$password}'";
//     $result = oci_parse($con, $sql);
//     oci_execute($result);
//     //return $result;
//     if ($result=oci_fetch_assoc($result)) {
//       return $result;
//     } else {
//         return false;
//     }
// }

$username = $_GET['username'];
$password = $_GET['password'];

$statusAc = doLogin($username, $password);
//$statusDeac = loginDeac($username, $password);

		if($statusAc){
				$_SESSION['status'] = "true";
				setcookie('status', 'true', time()+600, '/');
                $row=$statusAc;
                echo 'you logged in as a '.$row['ROLE'];
                //print_r($statusAc);
				//$row = oci_fetch_array($statusAc);
                //print_r($row);
				//echo oci_result($row, 'ROLE');
				//header("location: ../views/home.php?userid=$row[ID]&name=$row[NAME]");
			}
			
			else{
				header("location: ../views/login.php?msg=error");
			}		

	

?>