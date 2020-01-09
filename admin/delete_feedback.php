<?php
include_once '../includes/connection.php';

$query = "delete from feedback where id = {$_GET['id']}";
mysqli_query($conn,$query);
header("location:feedback.php");
