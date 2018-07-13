<?php
session_start();

include_once('connect_db.php');
$customer_id=$_POST['customer_id'];
$customer_name=$_POST['customer_name'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$postal_address=$_POST['postal_address'];
$phone=$_POST['phone'];
$med_name=$_POST['med_name'];
$dosage=$_POST['dosage'];
$time1=$_POST['time1'];
$_SESSION['customer_id']=$_POST['customer_id'];
$_SESSION['customer_name']=$_POST['customer_name'];
$_SESSION['age']=$_POST['age'];
$_SESSION['sex']=$_POST['sex'];
$_SESSION['postal_address']=$_POST['postal_address'];
$_SESSION['phone']=$_POST['phone'];
if(isset($_SESSION['username']))
{
	echo " ";
}else{
header("location:http://localhost/pharmacy/index.php");
exit();}
$sp="SELECT * FROM add_stock WHERE medname='$med_name'";
if($nhe=mysqli_query($con,$sp))
{
	
	$i=0;
	while($udp=mysqli_fetch_assoc($nhe))
	{
		 $count+=$udp["stockquan"];
		 $med[$i]=$udp["stockquan"]; 
		
		$i++;
	}
	for($j=0;$j<=$i-1;$j++)
	{
		if($med[$j]>$dosage)
		{
			
			 $med[$j]-=$dosage;
			
			break;
		}
		else{
			echo" ";
			$count=$count-$med[$j];
			$dosage-=$med[$j];
			$med[$j]=0;
			$j++;
			
		}
	}
	if($count>$dosage)
	{ 
	$sql="INSERT INTO prescription(customer_id,customer_name,age,sex,postal_address,phone,med_name,dosage,time1)
	VALUES($customer_id,'$customer_name',$age,'$sex','$postal_address',$phone,'$med_name',$dosage,$time1)";
	if(mysqli_query($con,$sql))
	{ echo" ";
		for($k=0;$k<=$j;$k++)
		{
			$mb="UPDATE add_stock SET stockquan=$med[$k] WHERE medname='$med_name' AND stockquan!=0";
			if(mysqli_query($con,$mb))
			{
				echo" ";
			}
			//echo $k;
		}
	}
	}
	if(isset($_POST[cnt]))
	{
	header("location:http://localhost/pharmacy/prescription2.php");
	exit();	
	}
}




?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE> <?php echo $user;?> Pharmacist logged</TITLE>
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
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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
<hr>
<center>
<h2> PRESCRIPTION </h2>
<form name="myform" " action="prescription.php" method="post" >
			<table width="200" height="106" border="0" >	
				<tr><td align="left"><input name="customer_id" placeholder="Customer ID" id="customer_id"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"> <input name="customer_name" placeholder="Customer Name" id="customer_name"type="text" style="width:170px" required="required" /></td></tr>
				<tr><td align="left"><input name="age" type="text" style="width:170px" id="age" placeholder="Age"required="required" /></td></tr>
				<tr><td align="left"><input name="sex" type="text" style="width:170px" id="sex" required="required" placeholder="Gender"/></td></tr>  
				<tr><td align="left"><input name="postal_address" type="text" style="width:170px" id="postal_address"placeholder="Address"required="required" /></td></tr>  
				<tr><td align="left"><input name="phone" type="text"placeholder="Phone" id="phone" style="width:170px" required="required" /></td></tr>  
				<tr><td>
				<input name="med_name" placeholder="Medicine name" id="med_name" type="text" multiple>
				<input name="dosage" placeholder="Dosage" id="dosage" type="text">
				<input name="time1" placeholder="Time 1-1-1" id="time1" type="text">
				<input type="submit" value="Continue" name="cnt" >
				
				
		<input name="submit" type="submit" value="Submit"/>
            </table>
	
<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>


</body>
</HTML>
