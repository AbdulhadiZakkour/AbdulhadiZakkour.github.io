<?php include_once '../includes/connection.php';?>

<?php
include_once '../includes/session.php';
if(!isset($_SESSION['client_id']))
{header("location:login.php");
    exit();}
else{ $query = "select * from service";
    $result     = mysqli_query($conn,$query);
    $servSet = array();
    while($row=mysqli_fetch_assoc($result)) {
        $servSet[] = $row;
    }

    $query2 = "select * from client where client_id = {$_SESSION['client_id']}";
    $result = mysqli_query($conn,$query2);
    $row=  mysqli_fetch_assoc($result);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>بلدية باب عمان</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../public/image/logo.jpg" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Main Stylesheet File -->
    <link href="../public/css/mystyle.css" rel="stylesheet">
    <link href="../public/css/news.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<div class="feedback">
    <a href="feedback.php" ><img id="mybutton" src="image/feedback_button.png"></a>
</div>
<div class="click-closed"></div>
<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container col-lg-12">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a style="margin-left: 40px" href="../public/index.php"><img width="60px" src="../public/image/h1m.png"></a>
        <a class="navbar-brand text-brand" href="../public/index.php">بلدية <span class="color-b">باب عمان</span></a>
        <div class="navbar-collapse collapse justify-content-right" id="navbarDefault">
            <ul class="navbar-nav col-lg-12" style="margin-left: 180px;margin-top: 6px">
                <li class="nav-item">
                    <a class="nav-link" href="../public/logout.php">تسجيل الخروج</a>
                </li>
                <li class="nav-item" id="login">
                    <?php
                    echo "<a class=\"nav-link\" href='../public/services_status.php'><i class=\"fa fa- user\"></i>حالة الطلبات</a>"
                    ?>
                </li><li class="nav-item" id="login">
                    <?php
                    echo "<a class=\"nav-link\" href='../public/client_profile.php'><i class=\"fa fa- user\"></i>الصفحة الشخصية</a>"
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/msg.php">مهام البلدية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/location.php">موقع البلدية الجغرافي</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        الخدمات الالكترونية
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        foreach ($servSet as $serv){
                            if ($serv['serv_id']==7){
                                echo "<a class=\"dropdown-item\" href='../public/serv1.php'>{$serv['serv_name']}</a>";

                            }

                            elseif($serv['serv_id']==8)
                                echo "<a class=\"dropdown-item\" href='../public/serv2.php?serv_id={$serv['serv_id']}''>{$serv['serv_name']}</a>";
                            elseif($serv['serv_id']==9)
                                echo "<a class=\"dropdown-item\" href='../public/serv3.php?serv_id={$serv['serv_id']}''>{$serv['serv_name']}</a>";

                        }
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php">الصفحة الرئيسية</a>
                </li>
            </ul>
            <div class="feedback">
                <a href="../public/feedback.php" ><img id="mybutton" src="../public/image/feedback_button.png"></a>
            </div>
        </div>

    </div>
</nav>
<!--/ Nav End /-->
