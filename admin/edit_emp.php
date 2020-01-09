<?php
include_once '../includes/connection.php';
$path1 = "admin_uploads/";
if(isset($_POST['submit'])) {
    /*echo '<pre>';
    print_r($_FILES);die();*/

    $Ename         = $_POST['emp_name'];
    $password     = $_POST['emp_password'];
    $email        = $_POST['emp_email'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];
    $phone        = $_POST['phone'];
    if($_FILES['image']['error'] == 0) {
        move_uploaded_file($tmp_name, $path1 . $name);

        $query = "update emp set emp_name = '$Ename',
                             emp_password = '$password',
                             emp_email = '$email',
                             emp_img = '$name',
                             emp_phone= '$phone'
			       where emp_id = {$_GET['emp_id']}";

    }else{
        $query = "update emp set emp_name = '$Ename',
                             emp_password = '$password',
                             emp_email = '$email',
                             emp_phone = '$phone'
			       where emp_id = {$_GET['emp_id']}";
    }
    mysqli_query($conn, $query);
    header("location:manage_emp.php");
}
// fetch Old Data
$query     = "select * from emp where emp_id = {$_GET['emp_id']}";
$result    = mysqli_query($conn,$query);
$productSet  = mysqli_fetch_assoc($result);

?>

<?php include '../includes/admin_header.php'?>



<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="float: right">ادارة الموظف</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">تعديل بيانات الموظف</h3>
                                </div>
                                <hr>


                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">اسم الموظف</label>
                                    <input id="cc-payment" name="emp_name" type="text" class="form-control" value="<?php echo $productSet['emp_name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">الرمز السري</label>
                                    <input name="emp_password" type="password" class="form-control"  placeholder=""  value="<?php echo $productSet['emp_password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">رقم الهاتف</label>
                                    <input name="phone" type="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" class="form-control" value="<?php echo $productSet['emp_phone']?>"  placeholder="" required>

                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">البريد الالكتروني</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly name="emp_email" placeholder="" value="<?php echo $productSet['emp_email'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">الصورة الشخصية</label>
                                    <input id="cc-payment" name="image" type="file" class="form-control" value="<?php echo $productSet['name'] ?>">
                                </div>

                                <button id="submit" type="submit" class="btn btn-lg btn-info btn-block" name="submit" >
                                    تحديث
                                </button>
                        </div></form>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php
include_once '../includes/admin_footer.php';
?>
