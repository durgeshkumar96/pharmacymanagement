<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://localhost/pharamcy/pharmacist/index.php");
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
<TITLE> <?php echo $user;?> Pharmacist logged</TITLE>
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
<p align="right"> Logged in as <b>Pharmacist</b></p> 
<?php echo "WELCOME $user";?>
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body>

<div id="left_column">
<div id="button">
<ul>
			<li><a href="pharmacist.php">Dashboard</a></li>
			<li><a href="prescription.php">Prescription</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="search.php">Search Patient</a></li>
			
		</ul>	
</div>
</div>
<center>
<div id="content">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="pharmacist.php" class="images">
                	<img src="images/pharmacist_icon.jpg" width="100" height="100" alt="edit" />
                	<figcaption>Dashboard</figcaption>
                </a>
                             
                <a href="prescription.php" class="images">
                	<img src="images/priscription_icon.png"  width="100" height="100" alt="edit" />
                	<figcaption>Prescription</figcaption>
                </a>
	            <a href="stock_pharmacist.php" class="images">
                	<img src="images/stock_icon.png" width="100" height="100" alt="edit" />
                	<figcaption>Stock</figcaption>
                </a>
				<a href="search.php" class="images">
                	<img src="images/search_icon.ico"  width="100" height="100" alt="edit" />
                	<figcaption>Patient Search</figcaption>
                </a>
              </div>
</div>
		 

</center>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>
</body>
</HTML>
