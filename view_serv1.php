<?php
include_once '../includes/connection.php';
include '../includes/public_header_in.php';
include_once '../includes/session.php';
?>
<?php
$query1 = "select * from serv1_emp where client_id = {$_GET['client_id']}";
$result1 = mysqli_query($conn,$query1);
$servSet  = mysqli_fetch_assoc($result1);

$query = "select * from serv1 where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query);
$clientSet   = mysqli_fetch_assoc($result);


?>

<form method="post" enctype="multipart/form-data" class="my1">

    <div class="my1">
        <center>
            <h2>تعديل طلب تجديد رخص مهن</h2></center>
        <p style="float: right;font-size: 20px">البيانات الشخصية</p>
        <hr>
        <br>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputPassword4">الاسم التجاري</label>
                <input type="text" name="trade" class="form-control" id="name" tabindex="3" readonly value="<?php echo $clientSet['trade_name'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">الرقم الوطني</label>
                <input type="text" name="national" class="form-control" id="nanumber" tabindex="2" readonly value="<?php echo $clientSet['national_number'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">صاحب الترخيص</label>
                <input type="text" name="owner" class="form-control" id="name" tabindex="1" readonly value="<?php echo $clientSet['owner_name'];?>">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="inputPassword4">الشارع</label>
                <input type="text" name="street" class="form-control" id="name" tabindex="7" readonly value="<?php echo $clientSet['street'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الحي</label>
                <input type="text" name="neighborhood" class="form-control" id="name" tabindex="6" readonly value="<?php echo $clientSet['neighborhood'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">عنوان المحل الرئيسي</label>
                <input type="text" name="location" class="form-control" id="name" tabindex="5" readonly value="<?php echo $clientSet['location'];?>">
            </div>
            <div class="form-group col-md-5">
                <label for="inputPassword4">نوع المهنة بالتفصيل</label>
                <input type="text" name="job_title" class="form-control" id="name" tabindex="4" readonly value="<?php echo $clientSet['job_title'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputPassword4">الرمز البريدي</label>
                <input type="text" name="zip" class="form-control" id="name" tabindex="12" readonly value="<?php echo $clientSet['pocode'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">صندوق البريد</label>
                <input type="text" name="pop" class="form-control" id="name" tabindex="11" readonly value="<?php echo $clientSet['pobox'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">خلوي</label>
                <input type="text" name="telephone" class="form-control" id="name" tabindex="10" readonly value="<?php echo $clientSet['telephone'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الهاتف</label>
                <input type="tel" name="mobile" class="form-control" id="name" tabindex="9" readonly value="<?php echo $clientSet['mobile'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">اسم صاحب الملك</label>
                <input type="text" name="name_owner" class="form-control" id="name" tabindex="8" readonly value="<?php echo $clientSet['license_owner'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">رأس المال المسجل بالدينار</label>
                <input type="text" name="capital" class="form-control" id="inputCity" tabindex="14" readonly value="<?php echo $clientSet['capital'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">اسماء الشركاء</label>
                <input type="text" name="partners" class="form-control" id="inputCity" tabindex="13" readonly value="<?php echo $clientSet['partners_names'];?>">
            </div>

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">لا مانع من تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية</label>
        </div>
        <br>
        <hr>
        <div class="form-group">
            <label for="exampleInputPassword1">قرار المجلس المحلي</label>
            <input type="text" name="des" class="form-control" id="exampleInputPassword1" placeholder="" readonly value="<?php echo $servSet['decsion'];?>">
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">التاريخ</label>
                <input type="date" name="des_date" class="form-control" id="exampleInputPassword1" placeholder="" readonly value="<?php echo $servSet['desc_date'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">رقم القرار</label>
                <input type="number" name="des_num" class="form-control" id="exampleInputPassword1" placeholder="" readonly value="<?php echo $servSet['decsion_num'];?>">
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <input type="number" name="new_form" class="form-control" placeholder="" readonly value="<?php echo $servSet['new_form'];?>">
            </div>
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">تم تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية رقم</label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label>الى تاريخ</label>
                <input type="date" name="to" class="form-control" placeholder="" readonly value="<?php echo $servSet['a_to'];?>">
            </div>
            <div class="form-group col-md-4">
                <label>ويعمل بها من تاريخ </label>
                <input type="date" name="from" class="form-control" placeholder="" readonly value="<?php echo $servSet['a_from'];?>">
            </div>
        </div>
       <center><a href="index.php" type="submit" id="submit" name="submit"  style="margin-top: 15px" class="btn btn-primary"><span>الرجوع لصفحة الرئيسية</span></a></center>
</form>
<?php
include '../includes/public_footer_in.php';
?>
