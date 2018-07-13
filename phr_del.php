<?php
include_once('connect_db.php');
echo $temp1= $_POST['phr_del'];

$spl="DELETE FROM pharmacist WHERE staff_id='$temp1'";
if(mysqli_query($con,$spl))
{  echo"hello";
	header("location:http://localhost/pharmacy/show_all_user.php");
	exit();
}
else{
	echo"query nt run";
}




?>