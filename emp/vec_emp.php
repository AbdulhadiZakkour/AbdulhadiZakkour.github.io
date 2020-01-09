<?php
ob_start();
include_once '../includes/connection.php'; ?>
<?php include_once '../includes/emp_header.php'?>

<?php
$query = "select * from vec where emp_id = {$_SESSION['emp_id']}";
$result   = mysqli_query($conn,$query);
$empSet = mysqli_fetch_assoc($result);

if($empSet['emp_id']){

    echo '<script type="text/javascript">';
    echo 'alert("تم طلب هذه الخدمة من قبل يرجى مراجعة صفحة تفاصيل الطلبات المقدمة لمعرفة حالة الطلب");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}else {
    if (isset($_POST['submit'])) {
        $emp = $_POST['name_emp'];
        $job = $_POST['job'];
        $depart = $_POST['dep'];
        $s_date = $_POST['sub'];
        $res = $_POST['reason'];
        $long = $_POST['howlong'];
        $v_from = $_POST['from'];
        $v_to = $_POST['too'];
        $j_start = $_POST['job_start'];
        $addr = $_POST['address'];
        $rep = $_POST['replace'];
        $em = $_GET['emp_id'];

        $query = "insert into vec (emp_name,job,department,sub_date,reason,duration,fromm,tto,job_start,address,replace_emp,emp_id)
                values ('$emp','$job','$depart','$s_date','$res','$long','$v_from','$v_to','$j_start','$addr','$rep','$em')";
        mysqli_query($conn, $query);
        header("location:index.php");
    }
}
?>

<form method="post">
    <div class="my">
        <h3>نموذج طلب اجازة</h3>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">الدائرة</label>
                <input tabindex="3" type="text" name="dep" class="form-control" id="inputEmail4" required placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">الوظيفة</label>
                <input tabindex="2" type="text" name="job" class="form-control" id="inputEmail4" required placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">اسم الموظف</label>
                <input tabindex="1" type="text" name="name_emp" class="form-control" id="inputPassword4" required placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">مدة الاجازة</label>
                <input tabindex="6" type="number" name="howlong" class="form-control" id="inputEmail4" required placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlTextarea1">سبب الاجازة</label>
                <textarea tabindex="5" class="form-control" name="reason" id="exampleFormControlTextarea1" required rows="3"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">تاريخ تقديم الاجازة</label>
                <input tabindex="4" type="date" class="form-control" name="sub" id="inputPassword4" required placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">تاريخ مباشرة العمل</label>
                <input tabindex="9" type="date" class="form-control" name="job_start" id="inputEmail4" required placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">الى</label>
                <input tabindex="8" type="date" class="form-control" name="too" id="inputEmail4" required placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">تاريخ ابتداء الاجازة </label>
                <input tabindex="7" type="date" class="form-control" name="from" id="inputPassword4" required placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPassword">اسم الموظف البديل</label>
                <input tabindex="11" type="text" class="form-control" name="replace" id="inputPassword4" placeholder="">
            </div>
            <div class="form-group col-md-8">
                <label for="exampleFormControlTextarea1">عنوان الموظف اثناء الاجازة</label>
                <textarea tabindex="10" class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>

        <br>
        <div class="text-center">
            <button type="submit" name="submit"  class="btn btn-primary">حفظ</button>
        </div>
    </div>
</form>
<br>
<br>
<br>

<?php include_once '../includes/emp_footer.php';

ob_end_flush();?>