<?php include_once '../includes/connection.php';?>
<?php
$query = "select * from service";
$result = mysqli_query($conn,$query);
$servSet = array();
while($row=mysqli_fetch_assoc($result)) {
    $servSet[] = $row;
}
?>
<section class="section-footer" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="widget-a">
                    <div class="w-header-a" style="text-align: center ">
                        <a  href="../public/index.php"><img width="60px" src="../public/image/h1m.png">
                            <h3 class="w-title-a text-brand " >بلدية باب عمان</h3></a>

                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                بلدية باب عمان تأسست عام 2001 هدفها خدمة المجتمع المحلي و تقديم خدمات مباشرة وهي مؤسسة اهلية ذات استقلال مالي واداري                        </p>
                        </div></div>

                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3 col-lg-6" style="text-align: center">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 style="margin-left: 180px" class="w-title-a text-brand">تواصل معنا</h3>
                    </div>
                    <div class="w-body-a justify-content-center">
                    <div class="w-body-a justify-content-center">
                        <div class="w-body-a">
                            <div class="footer-center text-right">
                                <a href="../public/location.php"><i  class="fa fa-map-marker" ondblclick="" > </i>
                                    <p><span>شارع عمان جرش بالقرب من جامعة فلادلفيا جسر المصطبة</span> جرش, الأردن</p></a>
                                <div>
                                    <i class="fa fa-phone"></i><br>
                                    <a href="tel:0772265677">0772265677 : تواصلو معنا من هنا</a>
                                </div>

                                <div>
                                    <a href="mailto:adnankawaldah@yahoo.com"><i class="fa fa-envelope"></i>
                                        <p>adnankawaldah@yahoo.com : راسلونا على هذا البريد</a></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="nav-link" href="../public/login.php">تسجيل الدخول</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link" href="../public/msg.php">مهام البلدية</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link" href="../public/location.php">موقع البلدية الجغرافي</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                الخدمات الالكترونية
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                foreach ($servSet as $serv){
                                    echo "<a class=\"dropdown-item\" href='../public/login.php?serv_id={$serv['serv_id']}''>{$serv['serv_name']}</a>";
                                }
                                ?>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <a href="../public/index.php">الصفحة الرئيسية</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="https://web.facebook.com/babsamman70" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a  href="mailto:adnankawaldah@yahoo.com" >
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="../public/lib/jquery/jquery.min.js"></script>
<script src="../public/lib/jquery/jquery-migrate.min.js"></script>
<script src="../public/lib/popper/popper.min.js"></script>
<script src="../public/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/lib/easing/easing.min.js"></script>
<script src="../public/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../public/lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="../public/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="../public/js/main.js"></script>

</body>
</html>
