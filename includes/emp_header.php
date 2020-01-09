    <?php
include_once 'connection.php';
$path = "../admin/admin_uploads/";
include_once 'session.php';
if(!isset($_SESSION['emp_id'])){
    header("location:login.php");
    exit();
}else{
    $query     = "select * from emp where emp_id = {$_SESSION['emp_id']}";
    $result    = mysqli_query($conn,$query);
    $empSet  = mysqli_fetch_assoc($result);

}
$query = "select * from service";
$result = mysqli_query($conn, $query);
$ervSet = array();
while ($row = mysqli_fetch_assoc($result)) {
    $servSet[] = $row;
}
/*$query     = "select admin_image from admin where admin_id = {$_GET['admin_id']}";
$result    = mysqli_query($conn,$query);
$adminSet  = mysqli_fetch_assoc($result);*/
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../admin/images/mba.jpg" type="image/icon type">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../emp/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../emp/assets/css/style.css">
    <link rel="stylesheet" href="../emp/assets/css/mystyle.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../admin/assets/css/mystyle.css" rel="stylesheet">
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="../emp/index.php"><i class="menu-icon fa fa-laptop"></i>القائمة</a>
                </li>
                <li class="menu-title text-right"><strong>ادارة الخدمات</strong></li><!-- /.menu-title -->

             <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>طلبات العملاء</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="../emp/client_order.php">الطلبات</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>تعديل الطلبات</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="../emp/edit_services.php">الطلبات</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>الطلبات الجاهزة</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="../emp/complete_order.php">الطلبات</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>الطلبات الشخصية</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php
                            $query     = "select * from emp where emp_id = {$_SESSION['emp_id']}";
                            $result = mysqli_query($conn,$query);
                            $row=mysqli_fetch_assoc($result);
                            echo " <li><i class=\"fa fa-puzzle-piece\"></i><a href=\"../emp/vec_emp.php?emp_id={$row['emp_id']}\">طلب اجازة</a></li>";
                            ?>
                            <li><i class="fa fa-puzzle-piece" ></i><a href="../emp/vec_result.php">تفاصيل الطلبات المقدمة</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="../admin/images/h1m.png" style="width: 33px;height: 40px" alt="Logo"><b > بلدية باب عمان</b></a>
                <a class="navbar-brand hidden" href="./"><img src="../admin/images/logo21.png" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <!--button class="search-trigger"><i class="fa fa-search"></i></button -->
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">

                    </div>

                    <div class="dropdown for-message">

                    </div>
                </div>

                <form  method="post" enctype="multipart/form-data">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php

                            echo "<img class='user-avatar rounded-circle' width='50px' height='45px' src='$path{$empSet['emp_img']}'/>";
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i><?php echo $empSet['emp_name'] ?></a>
                            <?php
                            $query     = "select * from emp where emp_id = {$_SESSION['emp_id']}";
                            $result = mysqli_query($conn,$query);
                            $row=mysqli_fetch_assoc($result);
                            echo "<a class=\"nav-link\" href='../emp/emp_profile.php?emp_id={$row['emp_id']}'><i class=\"fa fa- user\"></i>الصفحة الشخصية</a>"
                            ?>
                            <form method="post">
                                <a class="nav-link" href="../emp/logout.php" name="logout"><i class="fa fa-power -off"></i>تسجيل الخروج</a>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!-- /#header -->
    <script>
        var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
        ];
    </script>
