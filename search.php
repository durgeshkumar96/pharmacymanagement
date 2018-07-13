<?php
session_start();

include_once('connect_db.php');
$std=$_POST['std'];

if(isset($_SESSION['username']))
{
	//echo "hello";
}else{
header("location:http://localhost/pharmacy/index.php");
exit();}



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

table{
	 border-collapse: collapse;
	border:2px solid black;

}
th
{
	border:2px solid black;
	text-align:center;
}
td
{
	border-right:2px solid black;
	border-bottom:2px solid black;
	border-left:2px solid black;
	text-align:center;
	margin:0;
}
tr
{
	border:2px solid black;
	height:2px;
	margin:0;
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
<h2> PATIENT RECORD </h2>

          <form name="search" action="search.php" method="post" >
		   <input type="text" name ="std" placeholder="Enter Customer Id">
		   <input type="submit" value="search">
		
			</form>
		<?php
		$sql="SELECT * FROM prescription WHERE customer_id=$std";
if($pkk=mysqli_query($con,$sql))
{
	
	
			echo "<table class='table'>";
			echo"<tr class='row'>";
			echo"<th class='column'>";
				echo"Customer Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Age";
			echo"</th>";
			echo"<th class='column'>";
				echo"Sex";
			echo"</th>";
			echo"<th class='column'>";
				echo"Postal Address";
			echo"</th>";
			echo"<th class='column'>";
				echo"Phone";
			echo"</th>";
			echo"<th class='column'>";
				echo"Medicine";
			echo"</th>";
			echo"<th class='column'>";
				echo"Dosage";
			echo"</th>";
			echo"<th class='column'>";
				echo"Time";
			echo"</th>";
		echo"</tr>";
			
		 
		 while($row=mysqli_fetch_assoc($pkk))
		{
			
			echo"<tr class='row'>";
				echo"<td class='column'>";
					echo $col1=$row["customer_name"];;
				echo"</td>";
				echo"<td class='column'>";
					echo $col2=$row["age"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col3=$row["sex"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["postal_address"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["phone"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["med_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["dosage"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["time1"];
				echo"</td>";
			echo"</tr>";
		}
echo"</table>";
}


		?>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>

</body>
</HTML>
