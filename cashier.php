<?php
session_start();
include_once('connect_db.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$sid=$_POST['sid'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	if(isset($_SESSION['username']))	
	{
		echo"hello";
	}
	
	else
	{
	header("location:http://localhost/pharmacy/index.php");
	exit();
	}
	
	$sqlp="INSERT INTO cashier(manager_id,first_name,last_name,staff_id,username,password)
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
#content{
	display:inline-block;
}
.images{
	float:left;
	margin-left:150px;
	
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
<div id="content">
            	<a href="cashier.php" class="images">
                	<img src="images/cashier_icon.jpg" width="75" height="75" alt="edit" />
                	<figcaption> Dashboard </figcaption>
                </a>
                
                <a href="gen_bill.php" class="images">
                	<img src="images/bill_icon.png"  width="75" height="75" alt="edit" />
                	<figcaption>Generate Bill</figcaption>
                </a>
                  
                
					
			</div>
	
</center>


<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>
</body>
</HTML>
