<?php
include_once '../includes/admin_header.php';
include_once '../includes/connection.php';
?>

<?php
$path1 = "../admin/admin_uploads/";
if(isset($_POST['submit'])) {
    $Ename        = $_POST['admin_name'];
    $password     = $_POST['admin_password'];
    $email        = $_POST['admin_email'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];

    if($_FILES['image']['error'] == 0) {
        move_uploaded_file($tmp_name, $path1 . $name);

        $query = "update admin set admin_name       = '$Ename',
                             admin_password   = '$password',
                             admin_img        = '$name',
                             admin_email      = '$email'
			       where admin_id = {$_GET['admin_id']}";

    }else{
        $query = "update admin set admin_name  = '$Ename',
                             admin_password  = '$password',
                             admin_email     = '$email'
			       where admin_id = {$_GET['admin_id']}";
    }
    mysqli_query($conn, $query);


}
$query     = "select * from admin where admin_id = {$_GET['admin_id']}";
$result    = mysqli_query($conn,$query);
$oldSet  = mysqli_fetch_assoc($result);
//header("location:index.php");
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
                        echo "<img class=\"avatar rounded-circle img-thumbnail\"  src='$path1{$oldSet['admin_img']}'></td>";
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
                                    <input type="text" class="form-control" name="admin_name" id="first_name" value="<?php echo $oldSet['admin_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6 col-lg-12">
                                    <label for="password">
                                        <h6>الرمز السري</h6></label>
                                    <input type="password" class="form-control" name="admin_password" id="phone" value="<?php echo $oldSet['admin_password'] ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6 col-lg-12">
                                    <label for="email">
                                        <h6>البريد الالكتروني</h6>
                                    </label>
                                    <input type="email" class="form-control" name="admin_email" id="password" value="<?php echo $oldSet['admin_email'] ?>">
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