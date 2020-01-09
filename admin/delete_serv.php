<?php
include_once '../includes/connection.php';

$qurey= "delete from service where serv_id = {$_GET['serv_id']}";
mysqli_query($conn,$qurey);
$qurey1= "delete from emp where serv_id = {$_GET['serv_id']}";
mysqli_query($conn,$qurey1);
header("location:manage_serv.php");
