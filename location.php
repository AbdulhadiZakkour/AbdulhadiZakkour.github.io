<?php include_once '../includes/connection.php';?>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_header.php';}
else
{ include_once '../includes/public_header_in.php';}
?>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="800" id="gmap_canvas" src="https://maps.google.com/maps?q=32.179349%2C%2035.852899&t=k&z=13&ie=UTF8&iwloc=&output=embed"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <div id="homepage">

<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
?>