<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['pharmacist_id']);
unset($_SESSION['manager_id']);
unset($_SESSION['cashier_id']);
header("location:http://localhost/pharmacy/index.php");
?>
