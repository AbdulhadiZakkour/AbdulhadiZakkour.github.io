<?php
include_once '../includes/connection.php';
include_once '../includes/session.php';
include_once '../includes/emp_header.php';
?>
<?php
$query = "select * from serv2 where client_id = {$_GET['client_id']}";
echo $query;die();
?>







<?php
include_once '../includes/emp_footer.php';
?>