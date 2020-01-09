<?php
ob_start();
include_once '../includes/connection.php';
include '../includes/emp_header.php';
include_once '../includes/session.php';
?>

<?php
if(isset($_POST['submit']))
{
    $des    = $_POST['des'];
    $des_n  = $_POST['des_num'];
    $des_d  = $_POST['des_date'];
    $new_f  = $_POST['new_form'];
    $form   = $_POST['from'];
    $too    = $_POST['to'];
    $date          = $_POST['date'];
    $cli    = $_GET['client_id'];
    $emp    = $_SESSION['emp_id'];
    $query = "insert into serv1_emp (decsion,decsion_num,desc_date,new_form,a_from,a_to,submit_date,client_id,emp_id)
                            values ('$des','$des_n','$des_d','$new_f','$form','$too','$date','$cli','$emp')";
    mysqli_query($conn,$query);
    header("location:client_order.php");
}
$query = "select * from serv1 where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query);
$clientSet   = mysqli_fetch_assoc($result);

?>

<form method="post"  enctype="multipart/form-data" class="my">

    <div class="my">
        <center><h2>طلب تجديد رخص مهن</h2></center>
        <p style="float: right;font-size: 20px">البيانات الشخصية</p>
        <hr><br>

        <div class="form-row" >
            <div class="form-group col-md-3">
                <label for="inputPassword4">الاسم التجاري</label>
                <input type="text" name="trade" class="form-control" id="name"  readonly value="<?php echo $clientSet['trade_name'];?>" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">الرقم الوطني</label>
                <input type="tel" maxlength="10" minlength="10" name="national" class="form-control" id="nanumber"  readonly value="<?php echo $clientSet['national_number'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">صاحب الترخيص</label>
                <input type="text" name="owner" class="form-control" id="name"  readonly value="<?php echo $clientSet['owner_name'];?>">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="inputPassword4">الشارع</label>
                <input type="text" name="street" class="form-control" id="name"  readonly value="<?php echo $clientSet['street'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الحي</label>
                <input type="text" name="neighborhood" class="form-control" id="name"  readonly value="<?php echo $clientSet['neighborhood'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">عنوان المحل الرئيسي</label>
                <input type="text" name="location" class="form-control" id="name"  readonly value="<?php echo $clientSet['location'];?>">
            </div>
            <div class="form-group col-md-5">
                <label for="inputPassword4">نوع المهنة بالتفصيل</label>
                <input type="text" name="job_title" class="form-control" id="name"  readonly value="<?php echo $clientSet['job_title'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputPassword4">الرمز البريدي</label>
                <input type="tel" pattern="\d*" name="zip" class="form-control" id="name"  readonly value="<?php echo $clientSet['pocode'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">صندوق البريد</label>
                <input type="tel" pattern="\d*"  name="pop" class="form-control" id="name"  readonly value="<?php echo $clientSet['pobox'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">خلوي</label>
                <input type="tel"  name="telephone" class="form-control" id="name"  readonly value="<?php echo $clientSet['telephone'];?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">الهاتف</label>
                <input type="tel" name="mobile" class="form-control" id="name"  readonly value="<?php echo $clientSet['mobile'];?>">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">اسم صاحب الملك</label>
                <input type="text" name="name_owner" class="form-control" id="name"  readonly value="<?php echo $clientSet['license_owner'];?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">رأس المال المسجل بالدينار</label>
                <input type="text" name="capital" class="form-control" id="inputCity"  readonly value="<?php echo $clientSet['capital'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">اسماء الشركاء</label>
                <input type="text" name="partners" class="form-control" id="inputCity"  readonly value="<?php echo $clientSet['partners_names'];?>">
            </div>

        </div>


        <div class="form-group" >
            <label for="exampleInputEmail1">لا مانع من تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية</label>
        </div>
        <br>
        <hr>
        <div class="form-group">
            <label for="exampleInputPassword1">قرار المجلس المحلي</label>
            <input type="text" name="des" class="form-control" id="exampleInputPassword1" placeholder="" tabindex="1">
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">التاريخ</label>
                <input type="date" name="des_date" class="form-control" id="exampleInputPassword1" tabindex="3" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">رقم القرار</label>
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="des_num" tabindex="2" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
        </div>
        <div class="form-row justify-content-center" >
            <div class="form-group col-md-4">
                <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح"  name="new_form" tabindex="4" class="form-control" placeholder="">
            </div>
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">تم تجديد رخصة المهن و الحرف و الصناعات / المكاتب المهنية رقم</label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label>الى تاريخ</label>
                <input type="date" name="to" tabindex="6" class="form-control" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label>ويعمل بها من تاريخ </label>
                <input type="date" name="from" tabindex="5" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group col-md-2 col-lg-4" style="display: none;">
            <label for="inputZip" style="float: initial">تاريخ تقديم الطلب</label><br>
            <textarea style="width: 80px;height: 30px" id="demo" name="date"   readonly></textarea>
        </div>

        <center><button type="submit" id="submit" name="submit" class="btn btn-primary" style="margin-bottom: 15px" >ادخال</button></center>


</form>
<?php include '../includes/emp_footer.php';
ob_end_flush();?>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var d = new Date();
    document.getElementById("demo").innerHTML =d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate();
</script>

