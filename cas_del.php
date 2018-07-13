<?php
include_once('connect_db.php');
echo $temp1= $_POST['cas_del'];
$date=strtotime('today');

echo $temp2= date('y-m-d',$date);
$spl="DELETE FROM add_stock WHERE medname='$temp1' AND expiry<'$temp2'";
if(mysqli_query($con,$spl))
{  echo"hello";
	header("location:http://localhost/pharmacy/show_stocks.php");
	exit();
}
else{
	echo"query nt run";
}




?>