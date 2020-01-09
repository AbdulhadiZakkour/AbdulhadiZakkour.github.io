<?php ob_start();
include'../includes/connection.php' ;
include '../includes/public_header_in.php';
?>
<?php
$query = "select * from serv3 where client_id = {$_SESSION['client_id']}";
$result   = mysqli_query($conn,$query);
$clinetSet = mysqli_fetch_assoc($result);

if($clinetSet['client_id']){

    echo '<script type="text/javascript">';
    echo 'alert("تم طلب هذه الخدمة من قبل يرجى مراجعة صفحة حالة الطلبات لمعرفة حالة الطلب");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}else {
    if (isset($_POST['submit'])) {

        $lic_num = $_POST['license_num'];
        $dateof = $_POST['histroy'];
        $owner = $_POST['name_owner'];
        $add = $_POST['addr'];
        $pob = $_POST['po'];
        $mob = $_POST['mob'];
        $piece = $_POST['piece_num'];
        $h_num = $_POST['Basin_num'];
        $h_name = $_POST['Basin_name'];
        $surve = $_POST['area'];
        $len = $_POST['length_interface'];
        $dep = $_POST['avg_depth_rate'];
        $desc = $_POST['Description'];
        $mat_type = $_POST['building_materials'];
        $eng = $_POST['eng_desgin'];
        $plan_date = $_POST['histroy2'];
        $plan_to = $_POST['year'];
        $rebound_f = $_POST['front'];
        $rebound_b = $_POST['back'];
        $rebound_s = $_POST['side'];
        $cellar_n = $_POST['sellar_num'];
        $cellar_s = $_POST['area2'];
        $cellar_p = $_POST['pers'];
        $sett_n = $_POST['base_num'];
        $sett_s = $_POST['area3'];
        $sett_p = $_POST['pers2'];
        $floors_n = $_POST['floor_num'];
        $floors_h = $_POST['height'];
        $floor_s_n = $_POST['area4'];
        $floor_s_p = $_POST['pers_floor'];
        $flat_s = $_POST['flat'];
        $flat_p = $_POST['pers5'];
        $sub_n = $_POST['sub'];
        $sub_s = $_POST['area5'];
        $sub_p = $_POST['pers6'];
        $park_n = $_POST['park'];
        $park_s = $_POST['area6'];
        $park_p = $_POST['pers7'];
        $serve = $_POST['services'];
        $date = $_POST['date'];
        $cl_id = $_SESSION['client_id'];


        $query = "insert into serv3 (license_num,dateof,owner,address,pobox,mobile,piece_number,h_number,h_name,surv,leng,depth
                                ,descc,material_type,eng,plan_date,plan_to,rebound_front,rebound_back
                                ,rebound_side,cellar_number,cellar_space,cellar_per,settlement_number,settlement_space,settlement_per,floors_number,floors_height,floors_space_number,
                                floors_space_per,flat_space,flat_per,sub_number,sub_space,sub_per,park_number,park_space,park_per,services,submit_date,client_id)
                values ('$lic_num','$dateof','$owner','$add','$pob','$mob','$piece','$h_num','$h_name','$surve','$len','$dep',
                '$desc','$mat_type','$eng','$plan_date','$plan_to','$rebound_f','$rebound_b',
                '$rebound_s','$cellar_n','$cellar_s','$cellar_p','$sett_n','$sett_s','$sett_p','$floors_n','$floors_h','$floor_s_n'
                ,'$floor_s_p','$flat_s','$flat_p','$sub_n','$sub_s','$sub_p','$park_n','$park_s','$park_p','$serve','$date','$cl_id')";

        mysqli_query($conn, $query);
        // echo '<pre>';
        //print_r($query);die();
        header('location:index.php');
    }
}



?>

<form method="post" class="my" enctype="multipart/form-data" style="margin: 10px">
    <center>
        <h1>رخصة انشائات</h1></center>
    <hr>
    <div class="form-row justify-content-center" >

        <div class="form-group col-md-2 col-md-4">
            <label for="inputAddress2" >التاريخ</label>
            <input type="date" name="histroy" class="form-control" id="inputAddress2" placeholder="" tabindex="2">
        </div>
        <div class="form-group col-md-2 col-md-4">
            <label for="inputAddress">رقم الرتخيص</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="license_num" class="form-control" id="inputAddress" placeholder="0" tabindex="1">
        </div>
    </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputAddress">الهاتف</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="mob" class="form-control" id="" placeholder="" tabindex="6">
        </div>
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputAddress">صندوق البريد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="po" class="form-control" id="inputAddress" placeholder="" tabindex="5">
        </div>
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputAddress2">العنوان</label>
            <input type="text" name="addr" class="form-control" id="inputAddress2" placeholder="" tabindex="4">
        </div>
        <div class="form-group col-md-2 col-md-6">
            <label for="inputAddress">إسم المالك/طالب الترخيص</label>
            <input type="text" name="name_owner" class="form-control" id="inputAddress" placeholder="" tabindex="3">
        </div>
    </div>
    <hr>
    <p style="text-align: center;font-style: initial;font-size: 23px"><b>موقع البناء</b></p>
    <hr>
    <br>
    <div class="form-row">

        <div class="form-group col-md-2 col-lg-2">
            <label for="inputState"> معدل عمق القطعة م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="avg_depth_rate" class="form-control" id="inputZip" tabindex="12" placeholder="م">
        </div>

        <div class="form-group col-md-2 col-lg-2">
            <label for="inputState">طول الواجهة م</label>
            <input type="tel" name="length_interface" class="form-control" id="inputZip" tabindex="11" placeholder="م" value="م">
        </div>

        <div class="form-group col-md-2 col-lg-2">
            <label for="inputState">المساحة م<sub>2</sub></label>
            <input type="tel" name="area" class="form-control" id="inputZip" tabindex="10" placeholder="م م" value="">
        </div>

        <div class="form-group col-md-2 col-lg-2">
            <label for="inputState">اسم الحوض</label>
            <input type="tel" name="Basin_name" class="form-control" id="inputZip" tabindex="9">
        </div>

        <div class="form-group col-md-2 col-lg-2">
            <label for="inputState">رقم الحوض</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="Basin_num" class="form-control" id="inputZip" tabindex="8">
        </div>
        <div class="form-group col-md-2 col-lg-2">
            <label for="inputCity">رقم القطعة</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="piece_num" class="form-control" id="inputCity" tabindex="7">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-12">
            <label class="right" for="inputAddress">صفة استعمال موقع البناء</label>
            <input type="text" name="Description" class="form-control" id="inputAddress" placeholder="" tabindex="13">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2 col-lg-12">
            <label class="right" for="inputAddress2">نوع مواد البناء</label>
            <input type="text" name="building_materials" class="form-control" id="inputAddress2" placeholder="" tabindex="14">
        </div>
    </div>
    <hr>
    <p style="text-align: center;font-style: initial;font-size: 23px"><b>مخططات الترخيص</b></p>
    <hr>
    <br>
    <div class="form-row">


        <div class="form-group col-md-2 col-lg-5">
            <label for="inputAddress" > التاريخ </label>
            <input type="date" name="histroy2" class="form-control " id="inputAddress " placeholder=" " tabindex="16 ">
        </div>
        <div class="form-group col-md-2 col-lg-7">
            <label for="inputAddress" >تصميم المهندس </label>
            <input type="text" name="eng_desgin" class="form-control " id="inputAddress " placeholder=" " tabindex="15 ">
        </div>
    </div>
    <hr>
    <p style="text-align: center;font-style: initial;font-size: 23px"><b>مدة الترخيص</b></p>
    <hr>
    <br>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2 col-lg-1 ">
            <label for="inputAddress ">سنة/سنوات لانهاء البناء</label>
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="year" class="form-control " id="inputAddress " placeholder=" " tabindex="17 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">سنة كاملة للمباشرة بالبناء من تاريخ الترخيص و</label>
        </div>

    </div>
    <hr>
    <p style="text-align: center;font-style: initial;font-size: 23px"><b>احكام مخططات الترخيص</b></p>
    <hr>
    <br>
    <div class="form-row justify-content-center ">

        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">جانبي م</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="side" class="form-control " id="inputAddress " placeholder="م " tabindex="20 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">خلفي م</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="back" class="form-control " id="inputAddress " placeholder=" م" tabindex="19 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">ارتداد البناء: امامي م</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="front" class="form-control " id="inputAddress " placeholder=" " tabindex="18 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">

        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية </label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers" class="form-control " id="inputAddress " placeholder=" " tabindex="23 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area2" class="form-control " id="inputAddress " placeholder=" " tabindex="22 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">طابق القبو : العدد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="sellar_num" class="form-control " id="inputAddress " placeholder=" " tabindex="21 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">

        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية </label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers2" class="form-control " id="inputAddress " placeholder=" " tabindex="26 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area3" class="form-control " id="inputAddress " placeholder=" " tabindex="25 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">طابق التسوية : العدد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="base_num" class="form-control " id="inputAddress " placeholder=" " tabindex="24 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">الارتفاع م</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="height" class="form-control " id="inputAddress " placeholder=" " tabindex="28 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">طوابق البناء : العدد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="floor_num" class="form-control " id="inputAddress " placeholder=" " tabindex="27 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية الطابقية</label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers_floor" class="form-control " id="inputAddress " placeholder=" " tabindex="30 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">مساحة طوابق اليناء : المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area4" class="form-control " id="inputAddress " placeholder=" " tabindex="29 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">

        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers5" class="form-control " id="inputAddress " placeholder=" " tabindex="32 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">مسطح البناء : المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="flat" class="form-control " id="inputAddress " placeholder=" " tabindex="31 ">
        </div>
    </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers6" class="form-control " id="inputAddress " placeholder=" " tabindex="35 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area5" class="form-control " id="inputAddress " placeholder=" " tabindex="34 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">الابنية الفرعية : العدد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="sub" class="form-control " id="inputAddress " placeholder=" " tabindex="33 ">
        </div>
    </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="pers7" class="form-control " id="inputAddress " placeholder=" " tabindex="38 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="area6" class="form-control " id="inputAddress " placeholder=" " tabindex="37 ">
        </div>
        <div class="form-group col-md-2 col-lg-2 ">
            <label for="inputAddress ">مواقف السيارات : العدد</label>
            <input type="tel" pattern="\d*" title="الرجاء ادخال الرقم بشكل صحيح" name="park" class="form-control " id="inputAddress " placeholder=" " tabindex="36 ">
        </div>
    </div>
    </div>
    <div class="form-row justify-content-center ">

        <div class="form-group col-md-2 col-lg-6 ">
            <label for="inputAddress ">خدمات اخرى</label>
            <input type="text" name="services" class="form-control " id="inputAddress " placeholder=" " tabindex="39 ">
        </div>
    </div>
    <div class="form-group col-md-2 col-lg-4" style="display: none;">
        <label for="inputZip" style="float: initial">تاريخ تقديم الطلب</label><br>
        <textarea style="width: 80px;height: 30px" id="demo" name="date"   readonly></textarea>
    </div>
    <div class="form-group text-right">
        <div class="form-check">
            <label class="form-check-label" for="gridCheck">
                تأكيد الطلب
            </label>
            <input class="form-check-input" id="check" type="checkbox" >

        </div>
    </div>
    <center><button type="submit" id="submit" name="submit" class="btn btn-primary" >ادخال</button></center>
</form>
</body>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
ob_end_flush();
?>
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