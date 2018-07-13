<?php
session_start();
include_once 'connect_db.php';
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position)
{
	case 'Admin':
	$result=mysqli_query($con,"SELECT admin_id, username FROM admin WHERE username='$username' && password='$password'");
	$row=mysqli_num_rows($result);
	if($row>0)
	{
	$_SESSION['admin_id']=$admin_id;
	$_SESSION['username']=$username;
	header("location:http://localhost/pharmacy/admin.php");
	exit();
	}else
	{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Pharmacist':
	$result=mysqli_query($con,"SELECT pharmacist_id,first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username'&& password='$password'");
	$row=mysqli_num_rows($result);
	if($row>0)
	{
		$_SESSION['pharmacist_id']=$pharmacist_id;
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['staff_id']=$staff_id;
		$_SESSION['username']=$username;
	header("location:http://localhost/pharmacy/pharmacist.php");
	exit();
	}
	else
	{
		$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Manager':
	$result=mysqli_query($con,"SELECT manager_id,first_name,last_name,staff_id,username FROM manager WHERE username='$username'&& password='$password'");
	$row=mysqli_num_rows($result);
	if($row>0)
	{
		$_SESSION['manager_id']=$pharmacist_id;
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['staff_id']=$staff_id;
		$_SESSION['username']=$username;
	header("location:http://localhost/pharmacy/manager.php");
	exit();
	}
	else
	{
		$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Cashier':
	$result=mysqli_query($con,"SELECT cashier_id,first_name,last_name,staff_id,username FROM cashier WHERE username='$username'&& password='$password'");
	$row=mysqli_num_rows($result);
	if($row>0)
	{
		$_SESSION['cashier_id']=$cashier_id;
		$_SESSION['first_name']=$first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['staff_id']=$staff_id;
		$_SESSION['username']=$username;
	header("location:http://localhost/pharmacy/cashier.php");
	exit();
	}
	else
	{
		$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
}

}

?>

<!DOCTYPE HTML>
<HTML>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<TITLE> PHARMACY LOGIN </TITLE>
<style>
H1 {
    background-color:;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: grey
   ;
   color: white;
   text-align: center;
}

</style>

</HEAD>
<body background ="images/back.png" >
<H1 align = "center"> PHARMACY MANAGEMENT SYSTEM </H2><hr>
<h2 align= "center"> LOGIN </h2>
	<CENTER>
	<form action = "index.php" method="post" >
	
	<p>
	<label><b>Username</b></label>
	<input type ="text" placeholder="Enter Username" required="required" name="username">
	</p>
	<p>
	<label><b>Password</b></label>
	<input type ="password" placeholder="Enter Password" required="required"name="password">
	</p>
	<p>
	<p><select name="position">
		<option>--Select User--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>Manager</option>
			<option>Cashier</option>
			</select></p>
	<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{	
		if($_POST["username"]!='admin'|| $_POST["password"]!='admin') 
			{
				 echo" password and username is not valid"; 
			}
	}
	?>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>


	</form>
	
	</CENTER>
	<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>
</body>
</HTML>