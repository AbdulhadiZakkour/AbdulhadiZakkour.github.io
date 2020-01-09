<?php ob_start();
include_once '../includes/connection.php';
include '../includes/emp_header.php';
include_once '../includes/session.php';

?>

<?php
$query = "select * from serv3 where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query);
$clientSet   = mysqli_fetch_assoc($result);

$query2 = "select * from serv3_emp where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query2);
$servSet   = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    header("location:complete_order.php");
}

?>

<form method="post" >
    <div class="my">

    <h3>رخصة انشائات</h3>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputEmail4">التاريخ</label>
            <input type="date" name="histroy" class="form-control" id="inputEmail4" placeholder="" readonly value="<?php echo $clientSet['dateof'];?>">
        </div>
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputPassword4">رقم الترخيص</label>
            <input type="number" name="license_num" class="form-control" id="inputPassword4" placeholder="" readonly value="<?php echo $clientSet['license_num'];?>">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputCity">الهاتف</label>
            <input type="text" name="mob" class="form-control" id="inputCity" readonly value="<?php echo $clientSet['mobile'];?>">
        </div>
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputCity">صندوق البريد</label>
            <input type="text" name="po" class="form-control" id="inputCity" readonly value="<?php echo $clientSet['pobox'];?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputCity">العنوان</label>
            <input type="text" name="addr" class="form-control" id="inputCity" readonly value="<?php echo $clientSet['address'];?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">اسم المالك / طالب الترخيص</label>
            <input type="text" name="name_owner" class="form-control" id="inputState" readonly value="<?php echo $clientSet['owner'];?>">
        </div>
    </div>
    <br>
    <h4>موقع البناء</h4>

    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputState"> معدل عمق القطعة</label>
            <input type="text" name="avg_depth_rate" readonly value="<?php echo $clientSet['depth'];?>" class="form-control" id="inputZip" tabindex="12" placeholder="م">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState"> طول الواجهة</label>
            <input type="text" name="length_interface" readonly value="<?php echo $clientSet['leng'];?>" class="form-control" id="inputZip" tabindex="11" placeholder="م">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">المساحة</label>
            <input type="text" name="area" readonly value="<?php echo $clientSet['surv'];?>" class="form-control" id="inputZip" tabindex="10" placeholder="م2">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">اسم الحوض</label>
            <input type="text" name="Basin_name" readonly value="<?php echo $clientSet['h_name'];?>" class="form-control" id="inputZip" tabindex="9">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">رقم الحوض</label>
            <input type="text" name="Basin_num" readonly value="<?php echo $clientSet['h_number'];?>" class="form-control" id="inputZip" tabindex="8">
        </div>
        <div class="form-group col-md-2">
            <label for="inputCity">رقم القطعة</label>
            <input type="tel" name="piece_num" readonly value="<?php echo $clientSet['piece_number'];?>" class="form-control" id="inputCity" tabindex="7">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputAddress">صفة استعمال موقع البناء</label>
        <input type="text" name="Description" readonly value="<?php echo $clientSet['descc'];?>" class="form-control" id="inputAddress" placeholder="" tabindex="13">
    </div>
    <div class="form-group col-md-12">
        <label for="inputAddress2">نوع مواد البناء</label>
        <input type="text" name="building_materials" readonly value="<?php echo $clientSet['material_type'];?>" class="form-control" id="inputAddress2" placeholder="" tabindex="14">
    </div>
    <br>
    <h4>مخططات الترخيص</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="inputAddress"> التاريخ </label>
            <input type="date" name="histroy2" readonly value="<?php echo $clientSet['plan_date'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="16 ">
        </div>
        <div class="form-group col-8">
            <label for="inputAddress">تصميم المهندس </label>
            <input type="text" name="eng_desgin" readonly value="<?php echo $clientSet['eng'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="15 ">
        </div>
    </div>
    <br>
    <h4>مدة الترخيص</h4>
    <hr>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">سنة/سنوات لانهاء البناء</label>
        </div>
        <div class="form-group col-md-2 ">
            <input type="number" name="year" readonly value="<?php echo $clientSet['plan_to'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="17 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">سنة كاملة للمباشرة بالبناء من تاريخ الترخيص و</label>
        </div>
    </div>
    <br>
    <h4>احكام مخططات الترخيص</h4>
    <hr>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">جانبي</label>
            <input type="number" name="side" readonly value="<?php echo $clientSet['rebound_side'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="20 ">
        </div>
        <div class="form-group col-2">
            <label for="inputAddress ">خلفي</label>
            <input type="number" name="back" readonly value="<?php echo $clientSet['rebound_back'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="19 ">
        </div>
        <div class="form-group col-2">
            <label for="inputAddress ">ارتداد البناء: امامي </label>
            <input type="number" name="front" readonly value="<?php echo $clientSet['rebound_front'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="18 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية</label>
            <input type="number" name="pers" readonly value="<?php echo $clientSet['cellar_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="23 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة</label>
            <input type="number" name="area2" readonly value="<?php echo $clientSet['cellar_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="22 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طابق القبو : العدد</label>
            <input type="number" name="sellar_num" readonly value="<?php echo $clientSet['cellar_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="21 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية</label>
            <input type="number" name="pers2" readonly value="<?php echo $clientSet['settlement_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="26 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة</label>
            <input type="number" name="area3" readonly value="<?php echo $clientSet['settlement_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="25 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طابق التسوية : العدد</label>
            <input type="number" name="base_num" readonly value="<?php echo $clientSet['settlement_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="24 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">الارتفاع</label>
            <input type="number" name="height" readonly value="<?php echo $clientSet['floors_height'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="28 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طوابق البناء : العدد</label>
            <input type="number" name="floor_num" readonly value="<?php echo $clientSet['floors_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="27 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية الطابقية</label>
            <input type="number" name="pers_floor" readonly value="<?php echo $clientSet['floors_space_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="30 ">
        </div>
        <div class="form-group col-md-3">
            <label for="inputAddress ">مساحة طوابق اليناء : المساحة</label>
            <input type="number" name="area4" readonly value="<?php echo $clientSet['floors_space_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="29 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية</label>
            <input type="number" name="pers5" readonly value="<?php echo $clientSet['flat_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="32 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">مسطح البناء : المساحة</label>
            <input type="number" name="flat" readonly readonly value="<?php echo $clientSet['flat_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="31 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية</label>
            <input type="number" name="pers6" readonly value="<?php echo $clientSet['sub_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="35 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة</label>
            <input type="number" name="area5" readonly value="<?php echo $clientSet['sub_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="34 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">الابنية الفرعية : العدد</label>
            <input type="number" name="sub" readonly value="<?php echo $clientSet['sub_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="33 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">النسبة المؤية</label>
            <input type="number" name="pers7" readonly value="<?php echo $clientSet['park_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="38 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة</label>
            <input type="number" name="area6" readonly value="<?php echo $clientSet['park_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="37 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">مواقف السيارات : العدد</label>
            <input type="number" name="park" readonly value="<?php echo $clientSet['park_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="36 ">
        </div>
    </div>
    <div class="form-group col-md-12 ">
        <label for="inputAddress ">خدمات اخرى</label>
        <input type="text" name="services" readonly value="<?php echo $clientSet['services'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="39 ">
    </div>
    <!--
employee side 🙂
-->
    <br>
   <hr>
   <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6">
            <label for="inputEmail4">رسوم التجاوزات</label>
            <input type="number" min="0.01" step="0.01" max="2500" onmouseleave="myFunction()" name="lice2" readonly value="<?php echo $servSet['exec_fee'];?>" class="form-control" id="txt1" placeholder="0">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">رسوم الترخيص</label>
            <input type="number" min="0.01" step="0.01" max="2500" name="lice1" readonly value="<?php echo $servSet['lice_fee'];?>" class="form-control" id="txt2" placeholder="0">
        </div>
    </div>
    <br>
    <center>
        <div class="from-row text-right">
            <div class="from-group col-md-6 text-right">

                <strong><label class="" >:المجموع</label></strong>
                <div class="from-group col-md-6 text-right">
                    <textarea style="height: 50px; width: 120px" name="total" readonly value="<?php echo $servSet['total'];?>" class="form-control" readonly id="demo"> </textarea>
                </div>

                <br>
    </center>
    <h4>استوفيت الرسوم بموجب</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-3">
            <label for="inputAddress">التاريخ</label>
            <input type="date" name="rec_da" readonly value="<?php echo $servSet['receipt_date'];?>" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group col-md-3 ">
            <label for="inputAddress">رقم الايصال</label>
            <input type="text" name="rec" readonly value="<?php echo $servSet['receipt_num'];?>" class="form-control" id="inputAddress" placeholder="0">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6 ">
            <label for="inputAddress2">قيمة التأمين</label>
            <input type="text" name="insu_val" readonly value="<?php echo $servSet['insurance_value'];?>" class="form-control" id="inputAddress2" placeholder="">
        </div>
    </div>
    <br>
    <h4>استوفي التأمين بموجب</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="inputAddress">التاريخ</label>
            <input type="date" name="insu_date" readonly value="<?php echo $servSet['insurance_date'];?>" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCity">رقم الايصال</label>
            <input type="text" name="insu_rec" readonly value="<?php echo $servSet['insurance_rec'];?>" class="form-control" id="inputCity">
        </div>
    </div>
    </div>

<center>    <a href="complete_order.php" type="submit" id="submit" name="submit" class="btn btn-primary " >الرجوع لصفحة الطلبات الجاهزة</a>
</center>
</form>


<?php
include_once '../includes/emp_footer.php'; ?>
<script type="text/javascript">
    function myFunction() {
        var y = parseFloat(document.getElementById("txt1").value);
        var z = parseFloat(document.getElementById("txt2").value);
        var x = y + z;
        document.getElementById("demo").innerHTML = (x + " JD");
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
