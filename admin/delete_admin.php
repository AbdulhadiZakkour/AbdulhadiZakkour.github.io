<?php
include_once '../includes/connection.php';
$qurey = "delete from admin where admin_id = {$_GET['admin_id']}";
mysqli_query($conn,$qurey);
header("location:manage_admin.php");
