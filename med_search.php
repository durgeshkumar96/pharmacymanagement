<?php
session_start();
include_once('connect_db.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$std=$_POST['std'];
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
			<li><a href="med_search.php">Medicine search</a></li>
			
</ul>	
</div>
<center>
<h2> MEDICINE RECORD/SEARCH </h2>

          <form name="med_search" action="med_search.php" method="post" >
		   <input type="text" name="std" placeholder="Enter Medicine name">
		   <input type="submit" value="search">
		   
		
			</form>
			<br>
		<?php
		$sql="SELECT * FROM add_stock WHERE medname='$std'";
		 $pkk=mysqli_query($con,$sql);
			echo "<table class='table'>";
			echo"<tr class='row'>";
			echo"<th class='column'>";
				echo"Medicine name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Stock Quantity";
			echo"</th>";
			echo"<th class='column'>";
				echo"Rate";
			echo"</th>";
			echo"<th class='column'>";
				echo"Expiry date";
			echo"</th>";
		echo"</tr>";
			
		 
		 while($row=mysqli_fetch_assoc($pkk))
		{
			
			echo"<tr class='row'>";
				echo"<td class='column'>";
					echo $col1=$row["medname"];;
				echo"</td>";
				echo"<td class='column'>";
					echo $col2=$row["stockquan"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col3=$row["price"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["expiry"];
				echo"</td>";
			echo"</tr>";
		}
echo"</table>";

		?>
	
</center>

	
<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>


</body>
</HTML>
