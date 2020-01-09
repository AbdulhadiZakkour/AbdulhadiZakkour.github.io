<?php
include_once '../includes/connection.php';
include_once '../includes/session.php';
$qurey= "delete from reject where emp_id = {$_SESSION['emp_id']}";
mysqli_query($conn,$qurey);
header("location:vec_result.php");