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
    background-color: #00fff0;

}
#content{
	display:inline-block;
}
.images{
	float:left;
	margin-left:150px;
	
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
<p align="right"> Logged in as <b>ADMIN</b></p>WELCOME<?php echo $user;?> 
<p align="right"><a href ="http://localhost/pharmacy/logout.php">LOGOUT
</a>
 </p>
 <hr>
</center>
<body background="images/admi.jpg">

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
		 <h2>STOCK MANAGER USER DATABASE</h2>
		 <?php $sql="SELECT * FROM manager";
			$pkk=mysqli_query($con,$sql);
			echo "<table class='table'>";
			echo"<tr class='row'>";
			echo"<th class='column'>";
				echo"Staff ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"Manager ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"First Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Last Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Username";
			echo"</th>";
		echo"</tr>";
			while($row=mysqli_fetch_assoc($pkk))
			{
					
				echo"<tr class='row'>";
				echo"<td class='column'>";
					echo $col1[$i]=$row["staff_id"];;
				echo"</td>";
				echo"<td class='column'>";
					echo $col2=$row["manager_id"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col3=$row["first_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["last_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col5=$row["username"];
				echo"</td>";
				echo"<td class='column'>";
				echo "<form method='POST' action='man_del.php'>";
				echo "<input type='hidden' name='man_del' value='{$col1[$i]}'>";
				
			echo "<input type ='submit' value='delete'>";
			echo"</form>";
			echo "</td>";
			echo"</tr>";
			$i++;
			}
			echo "</table>";
		 ?>
		   <h2>CASHIER USER DATABASE</h2>
		   <?php
		  $sql="SELECT * FROM cashier";
			$pkm=mysqli_query($con,$sql);
			echo "<table class='table'>";
			echo"<tr class='row'>";
			echo"<th class='column'>";
				echo"Staff ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"Cashier ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"First Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Last Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Username";
			echo"</th>";
		echo"</tr>";
			while($row=mysqli_fetch_assoc($pkm))
			{
					
					echo"<tr class='row'>";
				echo"<td class='column'>";
					echo $col1[$j]=$row["staff_id"];;
				echo"</td>";
				echo"<td class='column'>";
					echo $col2=$row["cashier_id"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col3=$row["first_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["last_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col5=$row["username"];
				echo"</td>";
				echo"<td class='column'>";
				echo "<form method='POST' action='cashier_del.php'>";
				echo "<input type='hidden' name='cashier_del' value='{$col1[$j]}'>";
				
			echo "<input type ='submit' value='delete'>";
			echo"</form>";
			echo "</td>";
			echo"</tr>";
			$j++;
			}
			echo "</table>";
?>
			<h2>PHARMACIST USER DATABASE</h2>
		   <?php
		  $sql="SELECT * FROM pharmacist";
			$pkp=mysqli_query($con,$sql);
			echo "<table class='table'>";
			echo"<tr class='row'>";
			echo"<th class='column'>";
				echo"Staff ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"Pharmacist ID";
			echo"</th>";
			echo"<th class='column'>";
				echo"First Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Last Name";
			echo"</th>";
			echo"<th class='column'>";
				echo"Username";
			echo"</th>";
		echo"</tr>";
			while($row=mysqli_fetch_assoc($pkp))
			{
					
				echo"<tr class='row'>";
				echo"<td class='column'>";
					echo $col1[$k]=$row["staff_id"];;
				echo"</td>";
				echo"<td class='column'>";
					echo $col2=$row["pharmacist_id"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col3=$row["first_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col4=$row["last_name"];
				echo"</td>";
				echo"<td class='column'>";
					echo $col5=$row["username"];
				echo"</td>";
				echo"<td class='column'>";
				echo "<form method='POST' action='phr_del.php'>";
				echo "<input type='hidden' name='phr_del' value='{$col1[$k]}'>";
				
			echo "<input type ='submit' value='delete'>";
			echo"</form>";
			echo "</td>";
			echo"</tr>";
			$k++;
			}
			echo "</table>";
?>

          
					
			</div>
</center>

<div class="footer">
  <p>All rights reserved @ 2017 Pharmacy Management System</p>
</div>


</body>
</HTML>
