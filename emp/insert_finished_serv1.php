<?php
ob_start();
include_once '../includes/connection.php';
?>
<?php

    $query2 = "select * from serv1_emp where client_id={$_GET['client_id']}";
    $result2 = mysqli_query($conn, $query2);
   $row1 = mysqli_fetch_assoc($result2) ;
        $querye = "select * from emp where emp_id = {$row1['emp_id']}";
        $resulte = mysqli_query($conn, $querye);
        $rowe = mysqli_fetch_assoc($resulte);


        $date  = date('Y-m-d');
        $client_id = $_GET['client_id'];
        $emp_id = $rowe['emp_id'];
$query = "insert into finished_serv1 (finished_date,client_id,emp_id)
                values('$date','$client_id','$emp_id')";

            mysqli_query($conn, $query);

header("location:edit_services.php");
?>
