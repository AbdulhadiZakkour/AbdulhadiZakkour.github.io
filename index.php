<?php include_once '../includes/connection.php';?>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_header.php';}
else
{ include_once '../includes/public_header_in.php';}
?>
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            <div class="carousel-item-a intro-item bg-image" style="background-image: url(image/p1.jpg)">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b"> </span> بلدية باب عمان ترحب بكم</h1>
                                                 <p class="intro-title-top" style="font-size: 25px"><br> تأسست عام 2002</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item-a intro-item bg-image" style="background-image: url(image/p4.jpg) ">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b "> </span>مهمتنا الرئيسية</h1>
                                        <p class="intro-title-top " style="font-size: 25px"><br>تقديم خدمات مباشرة للمجتمع المحلي</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item-a intro-item bg-image" style="background-image: url(image/p3.jpg)">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <h1 class="intro-title mb-4 text-center">
                                        <span class="color-b "></span> موقع البلدية </h1>
                                        <p class="intro-title-top text-left " style="font-size: 25px"><br>شارع عمان جرش بالقرب من جامعة فلادلفيا جسر المصطبة</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="slideUp" id="news-bar">
        <marquee direction="right" scrollamount="3" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()">
            <?php
            $qurey = "select * from news order by news_id DESC ";
            $result = mysqli_query($conn,$qurey);
            while($row = mysqli_fetch_assoc($result)){
                echo "<a> -*- </a><a href=\"show_news.php?id={$row['news_id']}\" class=\"hvr-pop\">{$row['title']}</a>";
            }

            ?>

        </marquee>
    </div>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
?>