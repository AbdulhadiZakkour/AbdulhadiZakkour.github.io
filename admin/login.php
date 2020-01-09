<?php
session_start();
include_once '../includes/connection.php';
if(isset($_POST['submit'])){
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from admin where admin_email = '$email' AND admin_password = '$password'";
    $result   = mysqli_query($conn,$query);
    $adminSet = mysqli_fetch_assoc($result);

    if($adminSet['admin_id']){
        $_SESSION['admin_id'] = $adminSet['admin_id'];
        header("location:index.php");
    }else{
        $error =  "البريد الالكتروني/الرمز السري خطأ";

    }
}

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>بوابة المسؤولين</title>
    <meta name="description" content="EStore Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../admin/images/mba.jpg">
    <link rel="shortcut icon" href="../admin/images/mba.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="login.php">
                    <a style="padding-right: 10px" href="login.php"><img width="60px" src="../public/image/h1m.png">
                        <div><span class="color-b" style="font-size: 35px">بلدية باب عمان</span><br>
                            <span style="color: white;font-size: 25px">بوابة المسؤولين</span> </a></div>
                </a>
            </div>
            <div class="login-form">
                <form method="post">
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <input type="email" class="form-control" name="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>الرمز السري</label>
                        <input type="password" class="form-control" name="password" placeholder="">
                    </div>
                    <label class="text-danger"><?php if(isset($error)){ echo $error;} ?></label><br>
                    <button type="submit" name ="submit" class="btn btn-success btn-flat m-b-30 m-t-30">تسجيل الدخول</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
