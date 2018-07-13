<?php
session_start();
include_once('connect_db.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$medname=$_POST['medname'];
	$price=$_POST['price'];
	$stockquan=$_POST['stockquan'];
	$expiry=$_POST['expiry'];
	if(isset($_SESSION['username']))	
	{
		echo"hello";
	}
	
	else
	{
	header("location:http://localhost/pharmacy/index.php");
	exit();
	}
	
	$sqls="INSERT INTO add_stock(medname,price,stockquan,expiry)
	VALUES('$medname',$price,$stockquan,'$expiry')";
	if(mysqli_query($con,$sqls))
	{
	echo "hello con";
	header('location:http://localhost/pharmacy/add_stocks.php');
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
<p align="right"> Logged in as <b>MANAGER</b></p>WELCOME<?php echo $user;?> 
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body>

<div id="left_column">
<div id="button">
<ul>
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="show_stocks.php">Medicines</a></li>
			<li><a href="add_stocks.php">Add New Stocks</a></li>
			<li><a href="update_stocks.php">Update Stocks</a></li>
			
</ul>	
</div>
<center>
<form action= "add_stocks.php" method= "POST">
	
	<label> <b> Medicine Name</b> </label>
	<input type="text" placeholder="MEdicine Name" required="required" name="medname"><br>
	<label> <b> Price Per</b> </label>
	<input type="text" placeholder="Price Per" required="required" name="price"><br>
	<label> <b> Stock Quantity</b> </label>
	<input type="text" placeholder="Stock Quantity" required="required" name="stockquan"><br>
	<label> <b> Expiry Date</b> </label>
	<input type="date" placeholder="Expiry Date" required="required" name="expiry"><br>
	<p class="add_stock"><input type="submit" name="add_stock" value="Add stock">
	<input type="reset" name="reset" value="Reset"></p>
	</form>
	
</center>

	<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>



</body>
</HTML>
