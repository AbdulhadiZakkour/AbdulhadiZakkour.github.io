<?php
ob_start();
include_once '../includes/connection.php';
include_once '../includes/public_header_in.php';
?>
<?php
$query = "select * from serv1 where client_id = {$_SESSION['client_id']}";
$result   = mysqli_query($conn,$query);
$clinetSet = mysqli_fetch_assoc($result);

if($clinetSet['client_id']){

    echo '<script type="text/javascript">';
    echo 'alert("تم طلب هذه الخدمة من قبل يرجى مراجعة صفحة حالة الطلبات لمعرفة حالة الطلب");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}else{
    if(isset($_POST['submit'])) {
        $oname    = $_POST['owner'];
        $national = $_POST['national'];
        $tname    = $_POST['trade'];
        $job      = $_POST['job_title'];
        $loc      = $_POST['location'];
        $neighbor = $_POST['neighborhood'];
        $street   = $_POST['street'];
        $owner    = $_POST['name_owner'];
        $mob      = $_POST['mobile'];
        $tele     = $_POST['telephone'];
        $pbox     = $_POST['pop'];
        $pcode    = $_POST['zip'];
        $part     = $_POST['partners'];
        $cap      = $_POST['capital'];
        $date     = $_POST['date'];
        $cl_id    = $_SESSION['client_id'];

        $query = "insert into serv1 (owner_name,national_number,trade_name,job_title,location,neighborhood,street,license_owner,mobile,
                                    telephone,pobox,pocode,partners_names,capital,submit_date,client_id)
values ('$oname','$national','$tname','$job','$loc','$neighbor','$street','$owner','$mob','$tele','$pbox','$pcode','$part','$cap','$date','$cl_id')";
        mysqli_query($conn,$query);
        header("location:index.php");
    }


}
?>


<?php

?>



<form id = "serv-1" method="post" class="my" enctype="multipart/form-data" >
    <center><h2>طلب تجديد رخص مهن</h2></center>
    <br>
    <p style="float: right;font-style: initial;font-size: 23px"><b>  البيانات الشخصية</b></p>
    <hr><br>
    <div class="form-row" >
        <div class="form-group col-md-3">
            <label for="inputPassword4">الاسم التجاري</label>
            <input type="text" name="trade" class="form-control" id="name" tabindex="3" >
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">الرقم الوطني</label>
            <input type="tel"  minlength="10" title="الرجاء ادخال الرقم الوطني بشكل صحيح (يجب ان يكون متكون من 10 ارقام)" name="national" class="form-control" id="nanumber" tabindex="2">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">صاحب الترخيص</label>
            <input type="text" name="owner" class="form-control" id="name" tabindex="1">
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-2">
            <label for="inputPassword4">الشارع</label>
            <input type="text" name="street" class="form-control" id="name" tabindex="7">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">الحي</label>
            <input type="text" name="neighborhood" class="form-control" id="name" tabindex="6">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">عنوان المحل الرئيسي</label>
            <input type="text" name="location" class="form-control" id="name" tabindex="5">
        </div>
        <div class="form-group col-md-5">
            <label for="inputPassword4">نوع المهنة بالتفصيل</label>
            <input type="text" name="job_title" class="form-control" id="name" tabindex="4" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputPassword4">الرمز البريدي</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="zip" class="form-control" id="name" tabindex="12">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">صندوق البريد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="pop" class="form-control" id="name" tabindex="11">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">خلوي</label>
            <input type="tel" maxlength="10"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" title="الرجاء ادخال الرقم بالشكل الصحيح (يجب ان يكون متكون من 8 ارقام او اكثر)" name="telephone" class="form-control" id="name" tabindex="10">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">الهاتف</label>
            <input type="tel"  maxlength="10" pattern="\d*.{8,}" title="الرجاء ادخال الرقم بالشكل الصحيح (يجب ان يكون متكون من 8 ارقام او اكثر)"  name="mobile" class="form-control" id="name" tabindex="9">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCity">اسم صاحب الملك</label>
            <input type="text" name="name_owner" class="form-control" id="name" tabindex="8" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">رأس المال المسجل بالدينار</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال رأس المال بالشكل الصحيح"  name="capital" class="form-control" id="inputCity" tabindex="14">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCity">اسماء الشركاء</label>
            <input type="text" name="partners" class="form-control" id="inputCity" tabindex="13">
        </div>
        <div class="form-group col-md-2 col-lg-4" style="display: none;">
            <label for="inputZip" style="float: initial">تاريخ تقديم الطلب</label><br>
            <textarea style="width: 80px;height: 30px" id="demo" name="date"   readonly></textarea>
        </div>
    </div>
    <div class="form-group text-right">
        <div class="form-check">
            <label class="form-check-label" for="gridCheck">
                تأكيد الطلب            </label>
            <input class="form-check-input" id="check" type="checkbox" >
        </div>
    </div>
    <center>
        <button type="submit" id="submit" name="submit" class="btn btn-primary " >ادخال</button>
    </center>
</form>


<?php include_once '../includes/public_footer_in.php';
ob_end_flush();?>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var d = new Date();
    document.getElementById("demo").innerHTML =d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate();
</script>
<script>
    $(document).ready(function() {
        $('#submit').hide();
        $('#check').mouseup(function() {
            $('#submit').toggle();

        });


    });
</script>
