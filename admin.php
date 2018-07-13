<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username']))
{
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}
else
{
header("location:http://localhost/pharmacys/index.php");
exit();
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
<TITLE> ADMIN LOGGED </TITLE>
<style>
h1 {
    background-color: grey ;

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
#content{
	display:inline-block;
}
.images{
	float:left;
	margin-left:150px;
	
}

</style>
<center>

<h1>
	PHARMACY MANGEMENT SYSTEM 
</h1>
<p align="right"> Logged in as <b>ADMIN</b></p><?php echo "WELCOME $user";?> 
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body background="">

<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="show_all_user.php">Manage Users</a></li>
			
		</ul>	
</div>
		</div>
		 <!-- Dashboard icons -->
		 <center>
		 
            <div id="content">
            	<a href="show_all_user.php" class="images">
                	<img src="images/manager_icon1.jpg" width="75" height="75" alt="edit" />
                	<figcaption> Manage Users </figcaption>
                </a>
                <a href="admin_pharmacist.php" class="images">
                	<img src="images/pharmacist_icon.jpg"  width="75" height="75" alt="edit" />
                	<figcaption>Pharmacist</figcaption>
                </a>
                
                <a href="admin_manager.php" class="images">
                	<img src="images/manager_icon.jpg"  width="75" height="75" alt="edit" />
                	<figcaption>Stock Manager</figcaption>
                </a>
                  
                <a href="admin_cashier.php" class="images">
                	<img src="images/cashier_icon.jpg" width="75" height="75" alt="edit" />
                	<figcaption>Cashier</figcaption>
                </a>
					
			</div>
</center>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>



</body>
</HTML>
