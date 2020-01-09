<?php
include_once '../includes/connection.php';

$qurey= "delete from serv1 where client_id = {$_GET['client_id']}";
mysqli_query($conn,$qurey);
$qurey1= "delete from serv1_emp where client_id = {$_GET['client_id']}";
mysqli_query($conn,$qurey1);
header("location:edit_services.php");