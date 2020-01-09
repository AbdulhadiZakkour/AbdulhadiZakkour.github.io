<?php
ob_start();
include_once '../includes/connection.php';
include_once '../includes/public_header_in.php';
?>
<?php
$query = "select * from serv2 where client_id = {$_SESSION['client_id']}";
$result   = mysqli_query($conn,$query);
$clinetSet = mysqli_fetch_assoc($result);

if($clinetSet['client_id']){

    echo '<script type="text/javascript">';
    echo 'alert("تم طلب هذه الخدمة من قبل يرجى مراجعة صفحة حالة الطلبات لمعرفة حالة الطلب");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}else {
    if (isset($_POST['submit'])) {
        $owner_name = $_POST['owner'];
        $address = $_POST['addr'];
        $mobile = $_POST['mob'];
        $pbox = $_POST['pobox'];
        $loc = $_POST['locc'];
        $ground = $_POST['gnumber'];
        $area = $_POST['area'];
        $hnum = $_POST['hnum'];
        $hname = $_POST['hname'];
        $area1 = $_POST['area2'];
        $type = $_POST['type'];
        $build = $_POST['build'];
        $start = $_POST['sdate'];
        $doc = $_POST['docc'];
        $add = $_POST['addb'];
        $new = $_POST['new'];
        $repair = $_POST['repair'];
        $date = $_POST['date'];
        $cl_id = $_SESSION['client_id'];

        $query = "insert into serv2 (owner,address,mobile,pbox,location,ground_number,area,hnumber,
                            hname,area1,type_req,build,start_date,documents,add_bulding,new,repair,dateof,client_id)
                     values ('$owner_name','$address','$mobile','$pbox','$loc','$ground','$area','$hnum'
                                ,'$hname','$area1','$type','$build','$start','$doc','$add','$new','$repair','$date','$cl_id')";

        mysqli_query($conn, $query);
        header('location:index.php');
    }
}
?>

<form method="post" enctype="multipart/form-data" style="margin: 10px">
    <div class="my">
        <center><h2>نموذج طلب ترخيص بناء</h2></center>
        <p style="float: right;font-size: 20px">البيانات الشخصية</p>
        <hr><br>
    <div class="form-row">

        <div class="form-group col-md-2 col-lg-6">
            <label for="inputAddress2">عنوانه</label>
            <input type="text" name="addr" class="form-control" id="inputAddress2" placeholder="" tabindex="2">
        </div>
        <div class="form-group col-md-2 col-lg-6">
            <label for="inputAddress">إسم طالب الترخيص / المالك </label>
            <input type="text" name="owner" class="form-control" id="inputAddress" placeholder="" tabindex="1">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-4">
            <label for="inputZip" style="float: initial">تاريخ تقديم الطلب</label><br>
            <textarea style="width: 100px;height: 33px" id="demo" name="date"  readonly></textarea>
        </div>
        <div class="form-group col-md-4 col-lg-4">
            <label for="inputState">ص.ب</label>
            <input  type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pobox" class="form-control" id="inputZip" tabindex="4">
        </div>
        <div class="form-group col-md-6 col-lg-4">
            <label for="inputCity">الهاتف</label>
            <input  type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="mob" class="form-control" id="inputCity" tabindex="3">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2 col-lg-12">
            <center><strong><label for="inputAddress" style="font-size: 40px;color:red;float: none;" >تنبيه</label></strong></center>
        </div>
        <div class="form-group col-md-2 col-lg-12">
            <center><strong><label   id="inputAddress" style="font-size: 20px;float: none;" >.تعبأ هذه الصفحة من المهندس المصمم - وهو مسؤول عن صحة البيانا الواردة فيها و المرفقات الملحقة بها </label></strong></center>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <label for="inputAddress" style="text-decoration: underline;font-size: 20px;font-weight: bolder" >: الموقع </label>
            <input type="text" name="locc" class="form-control" id="inputAddress" placeholder="" tabindex="5">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <strong><label for="inputAddress" style="font-size: 30px">: أولا </label></strong><br>
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputAddress2">المنطقة</label>
            <input type="text" name="area2" class="form-control" id="inputAddress2" placeholder="" tabindex="10">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label for="inputAddress">اسم الحوض</label>
            <input type="text" name="hname" class="form-control" id="inputAddress" placeholder="" tabindex="9">
        </div>
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputAddress2">رقم الحوض</label>
            <input  type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="hnum" class="form-control" id="inputAddress2" placeholder="" tabindex="8">
        </div>
        <div class="form-group col-md-2 col-lg-3">
            <label for="inputAddress">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area" class="form-control" id="inputAddress" placeholder="م2" tabindex="7">
        </div>
        <div class="form-group col-md-2 col-lg-3">
            <label for="inputAddress2">رقم قطعة الأرض</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="gnumber" class="form-control" id="inputAddress2" placeholder="" tabindex="6">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <label for="inputAddress" style="text-decoration: underline;font-size: 20px;font-weight: bolder"">: نوع الترخيص المطلوب </label>
            <input type="text" name="type" class="form-control" id="inputAddress" placeholder="" tabindex="11">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <strong><label for="inputAddress" style="font-size: 30px">: ثانيا </label></strong><br>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <input type="text" name="build" class="form-control" id="inputAddress" placeholder="" tabindex="12">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label for="inputAddress"> بناء مقترح </label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-6">
            <label for="inputAddress"> المستندات  الثبوتية </label>
            <input type="text" name="docc" class="form-control" id="inputAddress" placeholder="" tabindex="14">
        </div>
        <div class="form-group col-md-2 col-lg-5">
            <label for="inputAddress"> تاريخ انشائه </label>
            <input type="date" name="sdate" class="form-control" id="inputAddress" placeholder="" tabindex="13">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label for="inputAddress"> بناء قائم </label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <input type="text" class="form-control" name="addb" id="inputAddress" placeholder="" tabindex="15">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label style="text-align: right" for="inputAddress">اضافة لبناء قائم مرخص</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <input type="text" class="form-control" id="inputAddress" placeholder="" tabindex="16" name="new">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label style="text-align: right" for="inputAddress">تجديد رخصة منتهية بتاريخ</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-11">
            <input  type="text" class="form-control" id="inputAddress" placeholder="" tabindex="17" name="repair">
        </div>
        <div class="form-group col-md-2 col-lg-1">
            <label style="text-align: right" for="inputAddress">ترميم بناء قائم مرخص</label>
        </div>
    </div>
    <div class="form-group text-right">
        <div class="form-check">
            <label class="form-check-label" for="gridCheck">
                تأكيد الطلب
            </label>
            <input class="form-check-input" id="check" type="checkbox" >

        </div>
    </div>
    <center><button type="submit" id="submit" name="submit" class="btn btn-primary" >ادخال</button>
    </center>
    </div>
    </div>
</form>


<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var d = new Date();
    document.getElementById("demo").innerHTML =d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate();
</script>
<?php include_once '../includes/public_footer_in.php';
ob_end_flush(); ?>
<script>
    $(document).ready(function() {
        $('#submit').hide();
        $('#check').mouseup(function() {
            $('#submit').toggle();

        });
    });
</script>
