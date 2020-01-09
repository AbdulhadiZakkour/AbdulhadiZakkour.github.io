<?php
ob_start();
include_once '../includes/connection.php';
$path = "admin_uploads/";
if(isset($_POST['submit'])){
    // get data from form
    $email    = $_POST['admin_email'];
    $password = $_POST['password'];
    $fullname = $_POST['admin_fullname'];

    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path.$name);
if($_FILES['image']['error'] == 0) {
    $query = "update admin set admin_email    = '$email',
                               admin_password = '$password',
                               admin_name = '$fullname',
                               admin_img   = '$name'
			       where admin_id = {$_GET['admin_id']}";
}else{
    $query = "update admin set admin_email    = '$email',
                               admin_password = '$password',
                               admin_name = '$fullname'
			       where admin_id = {$_GET['admin_id']}";
}
    mysqli_query($conn,$query);
    header("location:manage_admin.php");
}

// fetch Old Data
$query     = "select * from admin where admin_id = {$_GET['admin_id']}";
$result    = mysqli_query($conn,$query);
$adminSet1  = mysqli_fetch_assoc($result);


?>
<?php include '../includes/admin_header.php'; ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="float: right">إدارة المسؤول</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">تعديل المسؤول</h3>
                                </div>
                                <hr>
                                <form method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">الاسم الكامل</label>
                                        <input id="cc-number" name="admin_fullname" type="text" class="form-control" value="<?php echo $adminSet1['admin_name']; ?>" required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">الرمز السري</label>
                                        <input id="cc-name" name="password" type="password" class="form-control cc-name valid"
                                               value="<?php echo $adminSet1['admin_password']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">البريد الالكتروني</label>
                                        <input id="cc-payment" name="admin_email" type="text" class="form-control" readonly value="<?php echo $adminSet1['admin_email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">الصورة الشخصية</label>
                                        <input id="cc-payment" name="image" type="file" class="form-control" value="<?php echo $adminSet1['name']; ?>">
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                            تحديث
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/admin_footer.php';
ob_end_flush();
?>

