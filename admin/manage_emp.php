<?php
include_once '../includes/connection.php';
$path1 = "../admin/admin_uploads/";
if(isset($_POST['submit'])) {


    $Ename         = $_POST['emp_name'];
    $password     = $_POST['emp_password'];
    $email        = $_POST['emp_email'];
    $phone        =$_POST['phone'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];

     move_uploaded_file($tmp_name, $path1.$name);

     $query = " insert into emp (emp_name,emp_password,emp_email,emp_img,emp_phone)
                     values ('$Ename' , '$password' , '$email' , '$name','$phone')";

    mysqli_query($conn,$query);


        header("location:manage_emp.php");


 }

?>
<?php include '../includes/admin_header.php'?>
<body>
<!-- Left Panel -->

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
                                    <h3 class="text-center">اضافة موظف</h3>
                                </div>
                                <hr>
                            </div>
                            <form  method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">اسم الموظف</label>
                                        <input id="cc-payment   " name="emp_name" type="text" class="form-control"  placeholder="" required>
                                    </div>
                             <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">الرمز السري</label>
                                <input name="emp_password" type="password" class="form-control"  placeholder="" required>

                                </div>
                                <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">رقم الهاتف</label>
                                <input name="phone" type="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" class="form-control"  placeholder="" required>

                                </div>
                                <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">البريد الالكتروني</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="emp_email" placeholder="" required>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">الصورة الشخصية</label>
                                    <input id="cc-payment" name="image" type="file" class="form-control" required>
                                </div>

                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                حفظ
                            </button>
                            </form>
                                 </div>
                        </div>
                    </div>

                </div>
            </div>



        <form  method="post" enctype="multipart/form-data">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">الموظفيين</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                              <!--  <th scope="col">CAt ID</th>-->
                                <th scope="col">حذف</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">الصورة الشخصية</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col">الرمز السري</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">الرقم المتسلسل</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query  = "select * from emp";
                            $result = mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                             echo '<tr>';
                                echo "<td><a href='delete_emp.php?emp_id={$row['emp_id']}' class='btn btn-danger'>حذف</a> </td>";
                                echo "<td><a href='edit_emp.php?emp_id={$row['emp_id']}' class='btn btn-warning'>تعديل</a> </td>";
                                echo "<td><img  src='$path1{$row['emp_img']}' width='50' height='50'></td>";
                                echo "<td>{$row['emp_email']}</td>";
                                echo "<td>{$row['emp_phone']}</td>";
                                echo "<td>{$row['emp_password']}</td>";
                                echo "<td>{$row['emp_name']}</td>";
                                echo "<td>{$row['emp_id']}</td>";
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



<?php
include_once '../includes/admin_footer.php';
?>
