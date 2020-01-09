<?php
include_once '../includes/connection.php';

$qurey= "delete from vec where emp_id = {$_GET['emp_id']}";
mysqli_query($conn,$qurey);
$qurey1= "delete from vec_admin where emp_id = {$_GET['emp_id']}";
mysqli_query($conn,$qurey1);
header("location:emp_order.php");