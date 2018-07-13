<?php
include_once ('connect_db.php');
$customer_id=$_POST['customer_id'];
$customer_name=$_POST['customer_name'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$postal_address=$_POST['postal_address'];
$phone=$_POST['phone'];
echo $customer_id;
?>
<!DOCTYPE HTML>
<HTML>
<?php
echo $customer_id;
?>
</HTML>