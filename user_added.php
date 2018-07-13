<?php
session_start();
include_once('connect_db.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{

	if(isset($_SESSION['username']))	
	{
		echo"hello";
	}
	
	else
	{
	header("location:http://localhost/pharmacy/index.php");
	exit();
	}
	
	$sqlp="INSERT INTO manager(manager_id,first_name,last_name,staff_id,username,password)
	VALUES($id,'$fname','$lname',$sid,'$user','$pass')";
	if(mysqli_query($con,$sqlp))
	{
	echo "hello";
	header('location:http://localhost/pharmacy/admin_manager.php');
	exit();
	}
	else
	{
	echo "not hello";
	
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
<TITLE> STOCK MANAGER </TITLE>
<style>
h1 {
    background-color: #00fff0;
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
<center>

<h1>
	PHARMACY MANGEMENT SYSTEM 
</h1>
<p align="right"> Logged in as <b>Stock MANAGER ADMIN</b></p>WELCOME<?php echo $user;?> 
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body>

<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Stock Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			
</ul>	
</div>
<center>
<font color="red">
User Added Sucessfully!!
</font>

<br><br>
<form action= "admin_manager.php" method= "POST">
	
	<input type="submit" value="Go Back"><br>
	
	</form>
	
</center>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>


</body>
</HTML>
