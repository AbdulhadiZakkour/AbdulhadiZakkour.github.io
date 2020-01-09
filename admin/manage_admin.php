<?php
$path3 = "admin_uploads/";
include_once '../includes/connection.php';
if(isset($_POST['submit'])){
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_fullname'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path3.$name);

    $query = "insert into admin(admin_name,admin_password,admin_email,admin_img)
                    values ('$fullname' , '$password' , '$email', '$name')";
    mysqli_query($conn,$query);

        header("location:manage_admin.php");
}
?>
<?php include_once '../includes/admin_header.php';?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="float: right">إدارة المسؤولين</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">إضافة المسؤول</h3>
                                </div>
                                <hr>
                                <form  method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">الاسم الكامل</label>
                                        <input id="cc-number" name="admin_fullname" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">الرمز السري</label>
                                        <input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">البريد الالكتروني</label>
                                        <input id="cc-payment" name="admin_email" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">الصورة الشخصية</label>
                                        <input id="cc-payment" name="image" type="file" class="form-control" required>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                        حفظ
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



            <form  method="post" enctype="multipart/form-data" class="col-lg-12">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header">
                        <strong class="card-title">المسؤولين</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">حذف</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">الصورة الشخصية</th>
                                <th scope="col">الاسم الكامل</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">الرقم المتسلسل</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query  = "select * from admin";
                            $result = mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo '<tr>';
                                echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-danger'>حذف</a> </td>";
                                echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-warning'>تعديل</a> </td>";
                                echo "<td><img src='$path3{$row['admin_img']}' width='50' height='50'></td>";
                                echo "<td>{$row['admin_name']}</td>";
                                echo "<td>{$row['admin_email']}</td>";
                                echo "<td>{$row['admin_id']}</td>";


                                echo'</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../includes/admin_footer.php';
?>
