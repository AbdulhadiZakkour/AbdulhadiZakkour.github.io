<?php
include_once '../includes/connection.php';
include_once '../includes/session.php';



$path1 = "public_uploads/";
if(isset($_POST['submit'])) {

    $name2 = $_POST['name2'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path1 . $name);

    $query    = "select * from client where client_email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['client_email'] == $email) {
        $error = "البريد الالكتروني مستخدم من قبل !";
    } else {
        $query = "insert into client(client_name,client_password,client_mobile,client_email,client_img)
                    values ('$name2' , '$password' , '$phone', '$email' , '$name')";
        if (mysqli_query($conn, $query)) {
            $last_id = mysqli_insert_id($conn);
            $log_in  = "SELECT * FROM client where client_id='$last_id'";
            $res_log_in = mysqli_query($conn, $log_in);
            $get_data_client = mysqli_fetch_assoc($res_log_in);
            $_SESSION['client_name'] = $get_data_client['client_name'];
            $_SESSION['client_id'] = $get_data_client['client_id'];
            header("Location:index.php");
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>انشاء حساب</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="image/logo.jpg"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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

            <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
					<span class="login100-form-title" >
						انشاء <span class="color-b">حساب</span>
					</span>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name2" placeholder="الاسم" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password"   name="password" placeholder="الرمز السري" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="tel"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" name="phone" placeholder="رقم الهاتف" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="البريد الالكتروني" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    <label class="text-danger"><?php if(isset($error)){ echo $error;} ?></label>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="file"  name="image">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submit" type="submit">
                        انشاء
                    </button>
                </div>

                <!--  <div class="text-center p-t-12">
                          <span class="txt1">
                              Forgot
                          </span>
                      <a class="txt2" href="#">
                          Username / Password?
                      </a>
                  </div>-->

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
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>