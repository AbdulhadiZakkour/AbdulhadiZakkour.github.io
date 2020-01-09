<?php
session_start();
include_once '../includes/connection.php';
if(isset($_POST['submit'])){
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from client where  client_email = '$email' AND client_password = '$password'";
    $result   = mysqli_query($conn,$query);
    $clinetSet = mysqli_fetch_assoc($result);

    if($clinetSet['client_id']){
        $_SESSION['client_id'] = $clinetSet['client_id'];
        header("location:index.php");
    }else{
        $error =  "البريد الالكتروني/الرمز السري خطأ";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>تسجيل الدخول</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="image/logo.jpg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../public/css/mystyle.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="col-lg-12" style="padding-bottom: 70px">
                <center>
                    <a class="navbar-brand text-brand" href="../public/index.php"><span style="font-size: 50px">بلدية </span><span style="font-size: 50px" class="color-b">باب عمان</span></a>
                </center>
            </div>
            <div class="login100-pic js-tilt" data-tilt>
                <img src="image/p2.jpg" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post">
                        <span class="login100-form-title">
                        تسجيل <span class="color-b">الدخول</span>
                        </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="البريد الالكتروني">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="الرمز السري">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submit" id="submit">
                        تسجيل الدخول
                    </button>
                    <label class="text-danger">
                        <?php if(isset($error)){ echo $error;} ?>
                    </label>
                </div>

                <!--  <div class="text-center p-t-12">
                  <span class="txt1">
                      Forgot
                  </span>
              <a class="txt2" href="#">
                  Username / Password?
              </a>
          </div>-->

                <div class="text-center p-t-136">
                    <a class="txt2" href="singup.php">
                        <strong style="font-size: 20px">انشاء حساب
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></strong>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>