<?php
include_once '../includes/connection.php';

$query = "delete from news where news_id = {$_GET['id']}";
mysqli_query($conn,$query);
header("location:news.php");
