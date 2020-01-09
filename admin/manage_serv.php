<?php

use MongoDB\Driver\Query;

include_once '../includes/connection.php';
$path2 = "admin_uploads/";
if(isset($_POST['submit'])){
       $cat_name     = $_POST['serv_name'];
       $name         = $_FILES['image']['name'];
       $tmp_name     = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, $path2.$name);

    $query = "insert into service (serv_name,serv_img)
                values ('$cat_name','$name')";
    mysqli_query($conn,$query);
    header("location:manage_serv.php");
};
?>


<?php
include_once '../includes/admin_header.php';
?>

<div class="content" xmlns="http://www.w3.org/1999/html">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">ادارة الخدمات</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">اضافة الخدمات</h3>
                                </div>
                                <hr>
                                <form  method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">اسم الخدمة</label>
                                        <input id="in1" name="serv_name" type="text"  class="form-control" required>
                                    </div>
                                       <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">الصورة</label>
                                        <input id="cc-payment" name="image" type="file" class="form-control"  >
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




                 <div class="col-lg-12">
                     <form  method="post" enctype="multipart/form-data">
                    <div class="card">
                    <div class="card-header">
                        <strong class="card-title">الخدمات</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>



                                 <th scope="col">تعديل</th>
                                <th scope="col">صورة الخدمة</th>
                                <th scope="col">اسم الخدمة</th>
                                <th scope="col">الرقم المتسلسل</th>
                            </tr>


                            <tbody>
                            <?php
                            $query = "select * from service";
                            $result = mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                               echo'<tr>';
                                echo "<td><a href='edit_serv.php?serv_id={$row['serv_id']}' class='btn btn-warning'>تعديل</a> </td>";
                                echo "<td><img src='$path2{$row['serv_img']}' width='50' height='50'></td>";
                                echo "<td>{$row['serv_name']}</td>";
                                echo "<td>{$row['serv_id']}</td>";

                               echo '</tr>';
                               }
                               ?>
                            </tbody>
                        </table>
                           </div>
                        </div>
                     </form>
            </div>
        </div>

    </div>
</div>

<?php
include_once '../includes/admin_footer.php';
?>
