<?php
ob_start();
include_once '../includes/connection.php';?>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_header.php';}
else
{ include_once '../includes/public_header_in.php';}
?>
<div class="my">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image_m/1.png" height="500" width="100%"  class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/2.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/3.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/4.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/5.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/6.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/7.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/8.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/9.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/10.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/11.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/12.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/13.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/14.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/15.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/16.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/17.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/18.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/19.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/20.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/21.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/22.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/23.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/24.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/25.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/26.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/27.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/28.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image_m/29.png" height="500" width="100%" class="d-block w-100" alt="...">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
ob_end_flush();
?>