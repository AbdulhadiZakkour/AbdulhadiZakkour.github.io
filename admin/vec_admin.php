<?php
ob_start();
include '../includes/connection.php';
include_once '../includes/admin_header.php';

$query = "select * from vec where emp_id = {$_GET['emp_id']}";
$result = mysqli_query( $conn,$query);
$empSet   = mysqli_fetch_assoc($result);


if (isset($_POST['acc'])){
    $acc = $_POST['ac'];
    $emp = $_GET['emp_id'];
    $adm = $_SESSION['admin_id'];
    $query1 = "insert into accept (mass,admin_id,emp_id)
                values ('$acc','$adm','$emp')";
    mysqli_query($conn,$query1);
 header("Location:../admin/emp_order.php");

}
if (isset($_POST['rej'])){
    $rej = $_POST['rj'];
    $emp = $_GET['emp_id'];
    $adm = $_SESSION['admin_id'];
    $query2 = "insert into reject (mass,admin_id,emp_id)
                values ('$rej','$adm','$emp')";
    mysqli_query($conn,$query2);
    header("Location:../admin/emp_order.php");
}
?>



<form method="post">
    <div class="my">
        <h3>نموذج طلب اجازة</h3>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">الدائرة</label>
                <input type="text" name="dep" class="form-control" id="inputEmail4" value="<?php echo $empSet['department']?>" placeholder="" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">الوظيفة</label>
                <input type="text" name="job" class="form-control" id="inputEmail4" value="<?php echo $empSet['job']?>" placeholder="" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">اسم الموظف</label>
                <input type="text" name="name_emp" class="form-control" id="inputPassword4" value="<?php echo $empSet['emp_name']?>" placeholder="" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">مدة الاجازة</label>
                <input type="number" name="howlong" class="form-control" value="<?php echo $empSet['duration']?>" id="inputEmail4"  placeholder="" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlTextarea1">سبب الاجازة</label>
                <input type="text" class="form-control height-100" name="reason" value="<?php echo $empSet['reason']?>" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">تاريخ تقديم الاجازة</label>
                <input type="date" class="form-control" name="sub" value="<?php echo $empSet['sub_date']?>" id="inputPassword4" placeholder="" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">تاريخ مباشرة العمل</label>
                <input type="date" class="form-control" name="job_start" value="<?php echo $empSet['job_start']?>" id="inputEmail4" placeholder="" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">الى</label>
                <input type="date" class="form-control" name="too" value="<?php echo $empSet['tto']?>" id="inputEmail4" placeholder="" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">تاريخ ابتداء الاجازة </label>
                <input type="date" class="form-control" name="from" value="<?php echo $empSet['fromm']?>" id="inputPassword4" placeholder="" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPassword">اسم الموظف البديل</label>
                <input type="text" class="form-control" name="replace" value="<?php echo $empSet['replace_emp']?>" id="inputPassword4" placeholder="" readonly>
            </div>
            <div class="form-group col-md-8">
                <label for="exampleFormControlTextarea1">عنوان الموظف اثناء الاجازة</label>
                <input type="text" class="form-control" name="address" value="<?php echo $empSet['address']?>" placeholder="" readonly >
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">تفاصيل الموافقة</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="ac" rows="3"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">تفاصيل الرفض</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="rj" rows="3"></textarea>
            </div>
        </div>
        <div class="form-row text-right">
            <div class="form-group col-md-6 float-right"><button type="submit" name="acc" class="btn btn-success">الموافقة</button></div>
            <div class="form-group col-md-6 float-left"><button class="btn btn-danger" name="rej" value="الرفض" type="submit">الرفض</button></div>
        </div>


    </div>
</form>
<?php include '../includes/admin_footer.php';
ob_end_flush();
?> <!--button type="submit" name="submit"  class="btn btn-primary">حفظ</button-->