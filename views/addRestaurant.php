<?php 
$uerror = "";
$passerror = "";
$errormsg="";
if (isset($_GET['msg']))
{
	if($_GET['msg']=="error")
	{
		$errormsg="Invalid Username/Password !";
	}
	
}

if(isset($_POST['submit']))
{
$username= $_POST['username'];
$password= $_POST['password'];
$usernamelength= strlen($username);
$passwordlength= strlen($password);

if ($usernamelength !=null  and $passwordlength != null)
{
	$query = array(
    'username' => $username, 
    'password' => $password,
    );
$query = http_build_query($query);
header("location: ../controllers/loginCheck.php?$query");
}
}

?>

<html>
<head>
	<title>Add Restaurants</title>
</head>
<body>
	<form method="POST" action="../controllers/createCheck.php">
		<table>
			<tr>
				<td>Registration no</td>
				<td>
					<input type="text" name="reg" value="">
				</td>
				<td>
					<?=$uerror?>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="">
				</td>
				<td>
					<?=$passerror?>
				</td>
			</tr>
			<tr>
				<td>Branch</td>
				<td>
					<input type="text" name="branch" value="">
				</td>
				<td>
					<?=$uerror?>
				</td>
			</tr>
			<tr>
				<td>Contact</td>
				<td>
					<input type="text" name="contact" value="">
				</td>
				<td>
					<?=$uerror?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" name="email" value="">
				</td>
				<td>
					<?=$uerror?>
				</td>
			</tr>
			<tr>
				<td>Manager ID</td>
				<td>
					<input type="text" name="managerID" value="">
				</td>
				<td>
					<?=$uerror?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Save">
				</td>
			</tr>
		</table>
		<?=$errormsg?>
	</form>
	
</body>
</html>