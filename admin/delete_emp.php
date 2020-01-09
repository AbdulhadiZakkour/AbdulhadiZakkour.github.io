<?php
include_once '../includes/connection.php';

$qurey= "delete from emp where emp_id = {$_GET['emp_id']}";
mysqli_query($conn,$qurey);
header("location:manage_emp.php");
