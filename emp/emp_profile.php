<?php ob_start();
include_once '../includes/emp_header.php';
include_once '../includes/connection.php';
?>

<?php
$path1 = "../admin/admin_uploads/";
if(isset($_POST['submit'])) {
    $Ename        = $_POST['emp_name'];
    $password     = $_POST['emp_password'];
    $phone        = $_POST['emp_phone'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];

    if($_FILES['image']['error'] == 0) {
        move_uploaded_file($tmp_name, $path1 . $name);

        $query = "update emp set emp_name       = '$Ename',
                             emp_password   = '$password',
                             emp_img        = '$name',
                             emp_phone      = '$phone'
			       where emp_id = {$_GET['emp_id']}";

    }else{
        $query = "update emp set emp_name  = '$Ename',
                             emp_password  = '$password',
                             emp_phone     = '$phone'
			       where emp_id = {$_GET['emp_id']}";
    }
    mysqli_query($conn, $query);

    header("location:index.php");
}
$query     = "select * from emp where emp_id = {$_GET['emp_id']}";
$result    = mysqli_query($conn,$query);
$oldSet  = mysqli_fetch_assoc($result);

?>

<div>
    <head>
        <title>الصفحة الشخصية</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../admin/assets/css/mystyle.css" rel="stylesheet">
    </head>

    <div class="container bootstrap snippet">

        <div class="row">
            <div class="col-sm-3">
                <!--left col-->

                <form method="post" enctype="multipart/form-data">
                    <div class="text-center">
                        <?php
                        echo "<img class=\"avatar rounded-circle img-thumbnail\"  src='$path1{$oldSet['emp_img']}'></td>";
                        ?>
                        <hr>
                        <!--<input id="cc-payment" name="image" type="file" class="form-control">-->

                        <!-- <input type="file" class="text-center center-block file-upload">-->

                    </div>
                    </hr>
                    <br>
                </form>
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <div>
                    <strong class="card-title" style="float: right">الصفحة الشخصية</strong>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="good" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <div class="col-xs-6 col-lg-12">
                                    <label for="first_name" >
                                        <h6>الاسم الكامل</h6>
                                    </label>
                                    <input type="text" class="form-control" name="emp_name" id="first_name" value="<?php echo $oldSet['emp_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6 col-lg-12">
                                    <label for="password">
                                        <h6>الرمز السري</h6></label>
                                    <input type="password" class="form-control" name="emp_password" id="phone" value="<?php echo $oldSet['emp_password'] ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6 col-lg-12">
                                    <label for="phone">
                                        <h6>رقم الهاتف</h6>
                                    </label>
                                    <input type="tel" class="form-control" name="emp_phone" id="password" value="<?php echo $oldSet['emp_phone'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 col-lg-12">
                                    <label for="phone">
                                        <h6>الصورة الشخصية</h6></label>
                                    <input id="cc-payment" name="image" type="file" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <br>
                                    <button style="width:100%" class="btn btn-lg btn-success" type="submit" name="submit">حفظ</button>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                        <hr>

                    </div>
                    <!--/tab-pane-->

                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
    </div>
    <!--/row-->
<?php
include_once '../includes/emp_footer.php';
?>