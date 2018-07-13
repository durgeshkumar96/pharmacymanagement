<?php
session_start();

include_once('connect_db.php');
$customer_id=$_SESSION['customer_id'];
$customer_name=$_SESSION['customer_name'];
$age=$_SESSION['age'];
$sex=$_SESSION['sex'];
$postal_address=$_SESSION['postal_address'];
$phone=$_SESSION['phone'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$med_name=$_POST['med_name'];
	$dosage=$_POST['dosage'];
	$time1=$_POST['time1'];
}
if(isset($_SESSION['username']))
{
	echo " ";
}else{
header("location:http://localhost/pharmacy/index.php");
exit();}
$sp="SELECT * FROM add_stock WHERE medname='$med_name'";
if($nhe=mysqli_query($con,$sp))
{
	echo" ";
	$i=0;
	while($udp=mysqli_fetch_assoc($nhe))
	{
		 $count+=$udp["stockquan"];
		 $med[$i]=$udp["stockquan"]; 
		//echo"<br><br><br>";
		$i++;
	}
	for($j=0;$j<=$i-1;$j++)
	{
		if($med[$j]>$dosage)
		{
			//echo" med is greater";
			echo $med[$j]-=$dosage;
			//echo"<br><br><br>";
			break;
		}
		else{
			//echo" med is smaller";
			 $count=$count-$med[$j];
			$dosage-=$med[$j];
			$med[$j]=0;
			$j++;
			//echo"<br><br><br>";
		}
	}
	if($count>$dosage)
	{
	$sql="INSERT INTO prescription(customer_id,customer_name,age,sex,postal_address,phone,med_name,dosage,time1)
	VALUES($customer_id,'$customer_name',$age,'$sex','$postal_address',$phone,'$med_name',$dosage,$time1)";
	if(mysqli_query($con,$sql))
	{ 
		for($k=0;$k<=$j;$k++)
		{
			$mb="UPDATE add_stock SET stockquan=$med[$k] WHERE medname='$med_name' AND stockquan!=0";
			if(mysqli_query($con,$mb))
			{
				//echo"run";
			}
			 $k;
		}
	}
	}
	if(isset($_POST['cnt']))
	{
	header("location:http://localhost/pharmacy/prescription2.php");
	exit();	
	}
	else if(isset($_POST['cnt']))
	{
	header("location:http://localhost/pharmacy/prescription.php");
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
<TITLE> <?php echo $user;?> Pharmacist logged</TITLE>
<style>
h1 {
    background-color: #00fff0;
}
form{
	
	background-color:grey;
	border: 3px solid #f1f1f1;
}
</style>
<center>

<h1>
	PHARMACY MANGEMENT SYSTEM 
</h1>
<p align="right"> Logged in as <b>Pharmacist</b></p>
WELCOME<?php echo $user;?>
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
<hr>
<center>
<h2> PRESCRIPTION </h2>
<form name="myform"  action="prescription2.php" method="post" >
			<table width="200" height="106" border="2" >	
				<input name="med_name" placeholder="Medicine name" id="med_name" type="text" multiple>
				<input name="dosage" placeholder="Dosage" id="dosage" type="text">
				<input name="time1" placeholder="Time 1-1-1" id="time1" type="text">
				<input type="submit" value="Continue" name="cnt" >
				
		<tr><td><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
	



</body>
</HTML>
