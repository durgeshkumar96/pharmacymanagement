   <!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<center>
<h1> Invoice </h1>
<style>
body
{
		background-image:URL("8.jpeg");
	background-repeat:no-repeat;
	background-size:50%;
	background-position: center;
}
#sadda
{
	
}
table
{
		border:2px solid black;
		width:auto;
		height:auto;
		margin:50px;
		 border-collapse: collapse;
}
	
th
{
	border:2px solid black;
	text-align:center;
	padding:4px;
}
td
{
	border:2px solid black;
	text-align:center;
	margin:0;
	padding:3px;
}
tr
{
	border:1px solid black;
	margin:1;
}
#space
{
	width:600px;
	border:1px;
}
.id
{
	border-right:2px solid black; 
	border-left:2px; 
	border-top:2px; 
	border-bottom:2px;
	width:150px;	
	
}
.id12
{
	width:150px;
	border:2px;
}
#space12
{
	border:0px;
	width:600px;
}
#last{
	border:2px solid black;
	float:right;
}
.table1{ border:1px;
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
	</head>
	<body>
<?php
	session_start();
	$i=0;
	$j=0;
	include "connect_db.php";
	$total=0;
	$userid=$_POST['customer_id'];
	$ql=("SELECT customer_name FROM prescription  WHERE p.customer_id=$userid ");
	$sq=("SELECT p.customer_name,p.dosage,p.time1,p.med_name,a.price FROM prescription p,add_stock a WHERE p.customer_id=$userid AND p.med_name=a.medname");
	$date=strtotime("today");
	$date1=date("Y-m-d ", $date);
	
   if($sqm=mysqli_query($con,$sq))
   { 
		while($varqm=mysqli_fetch_assoc($sqm))
		{$col1[$i]=$varqm["med_name"];
		$col2[$i]=$varqm["dosage"];
		$col3[$i]=$varqm["price"];
		$col4[$i]=$varqm['time1'];
		$customer_name=$varqm['customer_name'];
		$i++;
		}
		echo"<table>";
		echo"<tr>";
			echo"<th class='id'>";
				echo"Name:".$customer_name;
			echo"</th>";
			echo"<th class='id'>";
				echo"Date:".date("d-m-y",$date);
			echo "</th>";
			echo"<th>";
			echo "Cashier Counter----1";
			echo"</th>";
		
			echo"<th>";
				echo"Medicine name";
			echo"</th>";
			echo"<th>";
				echo"No.of Tables";
			echo"</th>";
			echo"<th>";
				echo"Rate";
			echo"</th>";
			echo"<th>";
				echo"Amount";
			echo"</th>";
		echo"</tr>";
		
			while($j<$i)
			{
			
			
			echo"<tr>";
			
			echo"<td class='id12'>";
				
			echo"</td>";
			echo"<td class='id12'>";
				
			echo "</td>";
			echo"<td id='space12'>";
			echo"</td>";
			echo"<td>";
					echo $col1[$j];
				echo"</td>";
				echo"<td>";
					echo $col2[$j];
				echo"</td>";
				echo"<td>";
					echo $col3[$j];
				echo"</td>";
				echo"<td>";
					echo ($col2[$j]*$col3[$j]);
				echo"</td>";
			echo"</tr>";
			$total=$total+($col2[$j]*$col3[$j]);
			$j++;
			}
		
			echo "<br>";
			echo "<br>";
			echo"<tr>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td class='table1'>";
			echo"</td>";
			echo"<td id='last'>";
			echo "Total Amount:".$total;
			echo"</td>";
			echo"</tr>";
				echo"</table>";
			
			
			
   }
  ?>

	<div id="sadda">
	</div>
	 <button onclick="myFunction()">Print Bill</button>
	 <br></br>
	 <form action="gen_bill.php" METHOD="POST">
    <input type="submit" value="Back" name="back">
	</form>

	<script>
function myFunction() {
    window.print();
}
</script>
	</center>
	<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>
	</body>
	</html>