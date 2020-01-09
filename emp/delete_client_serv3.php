<?php
include_once '../includes/connection.php';

$qurey= "delete from serv3 where client_id = {$_GET['client_id']}";
mysqli_query($conn,$qurey);
$qurey1= "delete from serv3_emp where client_id = {$_GET['client_id']}";
mysqli_query($conn,$qurey1);
header("location:edit_services.php");