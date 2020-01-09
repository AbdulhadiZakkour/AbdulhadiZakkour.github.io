<?php
ob_start();
include_once '../includes/connection.php';
include '../includes/emp_header.php';
include_once '../includes/session.php';
?>

<?php
if(isset($_POST['submit']))
{
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

    $des    = $_POST['des'];
    $des_n  = $_POST['des_num'];
    $des_d  = $_POST['des_date'];
    $new_f  = $_POST['new_form'];
    $form   = $_POST['from'];
    $too    = $_POST['to'];


    $query = "update serv1 set owner_name      = '$oname',
                               national_number = '$national',
                               trade_name      = '$tname',
                               job_title       = '$job',
                               location        = '$loc',
                               neighborhood    = '$neighbor',
                               street          = '$street',
                               license_owner   = '$owner',
                               mobile          = '$mob',
                               telephone       = '$tele',
                               pobox           = '$pbox',
                               pocode          = '$pcode',
                               partners_names  = '$part',
                               capital         = '$cap'
			       where client_id = {$_GET['client_id']}";
    mysqli_query($conn,$query);

    $query1 = "update serv1_emp set decsion    = '$des',
                               decsion_num = '$des_n',
                               desc_date = '$des_d',
                               new_form = '$new_f',
                               a_from = '$form',
                               a_to = '$too'
			       where client_id = {$_GET['client_id']}";
    mysqli_query($conn,$query1);
    header("location:edit_services.php");
}
?>
<?php
$query = "select * from serv1 where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query);
$clientSet   = mysqli_fetch_assoc($result);

$query1 = "select * from serv1_emp where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query1);
$servSet   = mysqli_fetch_assoc($result);
?>

<form method="post"  enctype="multipart/form-data" class="my">

    <div class="my">
        <center><h2>تعديل طلب تجديد رخص مهن</h2></center>
        <p style="float: right;font-size: 20px">البيانات الشخصية</p>
        <hr><br>

        <div class="form-row" >
            <div class="form-group col-md-3">
                <label for="inputPassword4">الاسم التجاري</label>
                <input type="text" name="trade" class="form-control" id="name" tabindex="3"  value="<?php echo $clientSet['trade_name'];?>" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">الرقم الوطني</label>
                <input type="tel"  pattern="\d*" minlength="10" maxlength="10" title="الرجاء ادخال الرقم الوطني بشكل صحيح (يجب ان يكون متكون من 10 ارقام)" name="national" class="form-control" id="nanumber" tabindex="2"  value="<?php echo $clientSet['national_number'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">صاحب الترخيص</label>
                <input type="text" name="owner" class="form-control" id="name" tabindex="1"  value="<?php echo $clientSet['owner_name'];?>">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="inputPassword4">الشارع</label>
                <input type="text" name="street" class="form-control" id="name" tabindex="7"  value="<?php echo $clientSet['street'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الحي</label>
                <input type="text" name="neighborhood" class="form-control" id="name" tabindex="6"  value="<?php echo $clientSet['neighborhood'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">عنوان المحل الرئيسي</label>
                <input type="text" name="location" class="form-control" id="name" tabindex="5" value="<?php echo $clientSet['location'];?>">
            </div>
            <div class="form-group col-md-5">
                <label for="inputPassword4">نوع المهنة بالتفصيل</label>
                <input type="text" name="job_title" class="form-control" id="name" tabindex="4"  value="<?php echo $clientSet['job_title'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputPassword4">الرمز البريدي</label>
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح"  name="zip" class="form-control" id="name" tabindex="12"  value="<?php echo $clientSet['pocode'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">صندوق البريد</label>
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="pop" class="form-control" id="name" tabindex="11"  value="<?php echo $clientSet['pobox'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">خلوي</label>
                <input type="tel"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" maxlength="10" title="الرجاء ادخال الرقم بالشكل الصحيح (يجب ان يكون متكون من 8 ارقام او اكثر)" name="telephone" class="form-control" id="name" tabindex="10"  value="<?php echo $clientSet['telephone'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الهاتف</label>
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح (يجب ان يكون متكون من 8 ارقام او اكثر)" name="mobile" class="form-control" id="name" tabindex="9"  value="<?php echo $clientSet['mobile'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">اسم صاحب الملك</label>
                <input type="text" name="name_owner" class="form-control" id="name" tabindex="8"  value="<?php echo $clientSet['license_owner'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">رأس المال المسجل بالدينار</label>
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحي " name="capital" class="form-control" id="inputCity" tabindex="14"  value="<?php echo $clientSet['capital'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">اسماء الشركاء</label>
                <input type="text" name="partners" class="form-control" id="inputCity" tabindex="13"  value="<?php echo $clientSet['partners_names'];?>">
            </div>

        </div>


        <div class="form-group" >
            <label for="exampleInputEmail1">لا مانع من تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية</label>
        </div>
        <br>
        <hr>
        <div class="form-group">
            <label for="exampleInputPassword1">قرار المجلس المحلي</label>
            <input tabindex="15" type="text" name="des" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $servSet['decsion'];?>">
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">التاريخ</label>
                <input tabindex="17" type="date" name="des_date" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $servSet['desc_date'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">رقم القرار</label>
                <input tabindex="16" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصححي "  name="des_num" class="form-control"  placeholder="" value="<?php echo $servSet['decsion_num'];?>">
            </div>
        </div>
        <div class="form-row justify-content-center" >
            <div class="form-group col-md-4">
                <input tabindex="18" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحي "  name="new_form" class="form-control" placeholder="" value="<?php echo $servSet['new_form'];?>">
            </div>
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">تم تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية رقم</label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label>الى تاريخ</label>
                <input tabindex="20" type="date" name="to" class="form-control" placeholder="" value="<?php echo $servSet['a_to'];?>">
            </div>
            <div class="form-group col-md-4">
                <label>ويعمل بها من تاريخ </label>
                <input tabindex="19" type="date" name="from" class="form-control" placeholder="" value="<?php echo $servSet['a_from'];?>">
            </div>
        </div>
        <center><button type="submit" id="submit" name="submit" class="btn btn-primary" style="margin-bottom: 15px" >ادخال</button></center>
</form>
<?php
include '../includes/emp_footer.php';
ob_end_flush();
?>
<script type="text/javascript"  src="js/jquery.js">
    $(document).ready(function() {
        $('#submit').hide();
        $('#check').mouseup(function() {
            $('#submit').toggle();

        });
    });
</script>