<?php
session_start();
include_once('connect_db.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_SESSION['username']))	
	{
		echo" ";
	}
	
	else
	{
	header("location:http://localhost/pharmacy/index.php");
	exit();
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
<p align="right"> Logged in as <b>CASHIER</b></p><?php echo "WELCOME $fname";?> 
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body>

<div id="left_column">
<div id="button">
<ul>
			<li><a href="cashier.php">Dashboard</a></li>
		
			<li><a href="gen_bill.php">Generate Bill</a></li>
			
			
</ul>	
</div>
<center>
	<form action= "final_bill.php" method= "POST">
	<input type="text" placeholder="Customer ID" required="required" name="customer_id">
	<input type="submit" value="Submit">
	<input type="reset" name="reset" value="Reset">
	
	</form>
	

	
</center>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>

</body>
</HTML>
