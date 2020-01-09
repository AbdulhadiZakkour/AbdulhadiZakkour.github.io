<?php
ob_start();
include_once '../includes/connection.php';
include '../includes/emp_header.php';
include_once '../includes/session.php';
?>
<?php
if(isset($_POST['submit'])) {

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
    //$cl_id = $_SESSION['client_id'];

    $lice         = $_POST['lice1'];
    $exec         = $_POST['lice2'];
    $total        = $_POST['total'];
    $recp         = $_POST['rec'];
    $recp_date    = $_POST['rec_da'];
    $insu_val     = $_POST['insu_val'];
    $insu_rec     = $_POST['insu_rec'];
    $insu_date    = $_POST['insu_date'];

    $query = "update serv3 set license_num      = '$lic_num',
                               dateof = '$dateof',
                               owner      = '$owner',
                               address       = '$add',
                               pobox        = '$pob',
                               mobile    = '$mob',
                               piece_number    = '$piece',
                               h_number   = '$h_num',
                               h_name          = '$h_name',
                               surv       = '$surve',
                               leng           = '$len',
                               depth          = '$dep',
                               descc  = '$desc',
                               material_type  = '$mat_type',
                               eng  = '$eng',
                               plan_date  = '$plan_date',
                               plan_to  = '$plan_to',
                               rebound_front  = '$rebound_f',
                               rebound_back  = '$rebound_b',
                               rebound_side  = '$rebound_s',
                               cellar_number  = '$cellar_n',
                               cellar_space  = '$cellar_s',
                               cellar_per  = '$cellar_p',
                               settlement_number  = '$sett_n',
                               settlement_space  = '$sett_s',
                               settlement_per  = '$sett_p',
                               floors_number  = '$floors_n',
                               floors_height  = '$floors_h',
                               floors_space_number  = '$floor_s_n',
                               floors_space_per  = '$floor_s_p',
                               flat_space  = '$flat_s',
                               flat_per  = '$flat_p',
                               sub_number  = '$sub_n',
                               sub_space  = '$sub_s',
                               sub_per  = '$sub_p',
                               park_number  = '$park_n',
                               park_space  = '$park_s',
                               park_per  = '$park_p',
                               services         = '$serve'
			       where client_id = {$_GET['client_id']}";
    mysqli_query($conn,$query);

    // $query = "insert into serv3_emp (lice_fee,exec_fee,total,receipt_num,receipt_date,insurance_value,insurance_rec,insurance_date,client_id,emp_id)
    //                values ('$lice','$exec','$total','$recp','$recp_date','$insu_val','$insu_rec','$insu_date','$cli','$emp')";

    $query2 = "update serv3_emp set lice_fee      = '$lice',
                               exec_fee = '$exec',
                               total      = '$total',
                               receipt_num       = '$recp',
                               receipt_date        = '$recp_date',
                               insurance_value    = '$insu_val',
                               insurance_rec          = '$insu_rec',
                               insurance_date   = '$insu_date'
			       where client_id = {$_GET['client_id']}";
    mysqli_query($conn,$query2);

    header("location:edit_services.php");
}
?>
<?php
$query = "select * from serv3 where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query);
$clientSet   = mysqli_fetch_assoc($result);

$query2 = "select * from serv3_emp where client_id = {$_GET['client_id']}";
$result = mysqli_query($conn,$query2);
$servSet   = mysqli_fetch_assoc($result);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form method="post" class="my">
    <h3>رخصة انشائات</h3>

    <div class="form-row justify-content-center">
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputPassword4">رقم الترخيص</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحي "  name="license_num" class="form-control" id="inputPassword4" placeholder="" value="<?php echo $clientSet['license_num'];?>">
        </div>
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputEmail4">التاريخ</label>
            <input type="date" name="histroy" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $clientSet['dateof'];?>">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputCity">الهاتف</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح (يجب ان يكون متكون من 10 ارقام)" name="mob" class="form-control" id="inputCity" value="<?php echo $clientSet['mobile'];?>">
        </div>
        <div class="form-group col-md-2 col-lg-12">
            <label for="inputCity">صندوق البريد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="po" class="form-control" id="inputCity" value="<?php echo $clientSet['pobox'];?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputCity">العنوان</label>
            <input type="text" name="addr" class="form-control" id="inputCity" value="<?php echo $clientSet['address'];?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">اسم المالك / طالب الترخيص</label>
            <input type="text" name="name_owner" class="form-control" id="inputState" value="<?php echo $clientSet['owner'];?>">
        </div>
    </div>
    <br>
    <h4>موقع البناء</h4>

    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputState"> معدل عمق القطعة م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="avg_depth_rate" value="<?php echo $clientSet['depth'];?>" class="form-control" id="inputZip" tabindex="12" placeholder="م">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">طول الواجهة م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="length_interface" value="<?php echo $clientSet['leng'];?>" class="form-control" id="inputZip" tabindex="11" placeholder="م">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area" value="<?php echo $clientSet['surv'];?>" class="form-control" id="inputZip" tabindex="10" placeholder="م2">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">اسم الحوض</label>
            <input type="text" name="Basin_name" value="<?php echo $clientSet['h_name'];?>" class="form-control" id="inputZip" tabindex="9">
        </div>
        <div class="form-group col-md-2">
            <label for="inputState">رقم الحوض</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="Basin_num" value="<?php echo $clientSet['h_number'];?>" class="form-control" id="inputZip" tabindex="8">
        </div>
        <div class="form-group col-md-2">
            <label for="inputCity">رقم القطعة</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="piece_num" value="<?php echo $clientSet['piece_number'];?>" class="form-control" id="inputCity" tabindex="7">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputAddress">صفة استعمال موقع البناء</label>
        <input type="text" name="Description" value="<?php echo $clientSet['descc'];?>" class="form-control" id="inputAddress" placeholder="" tabindex="13">
    </div>
    <div class="form-group col-md-12">
        <label for="inputAddress2">نوع مواد البناء</label>
        <input type="text" name="building_materials" value="<?php echo $clientSet['material_type'];?>" class="form-control" id="inputAddress2" placeholder="" tabindex="14">
    </div>
    <br>
    <h4>مخططات الترخيص</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="inputAddress"> التاريخ </label>
            <input type="date" name="histroy2" value="<?php echo $clientSet['plan_date'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="16 ">
        </div>
        <div class="form-group col-8">
            <label for="inputAddress">تصميم المهندس </label>
            <input type="text" name="eng_desgin" value="<?php echo $clientSet['eng'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="15 ">
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
            <input type="tel"  pattern="\d*" title="الرجاء ادخال رقم السنة بالشكل الصحيح" name="year" value="<?php echo $clientSet['plan_to'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="17 ">
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
            <label for="inputAddress ">جانبي م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="side" value="<?php echo $clientSet['rebound_side'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="20 ">
        </div>
        <div class="form-group col-2">
            <label for="inputAddress ">خلفي م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="back" value="<?php echo $clientSet['rebound_back'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="19 ">
        </div>
        <div class="form-group col-2">
            <label for="inputAddress ">ارتداد البناء: امامي م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="front" value="<?php echo $clientSet['rebound_front'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="18 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" name="pers" value="<?php echo $clientSet['cellar_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="23 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area2" value="<?php echo $clientSet['cellar_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="22 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طابق القبو : العدد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="sellar_num" value="<?php echo $clientSet['cellar_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="21 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" name="pers2" value="<?php echo $clientSet['settlement_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="26 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area3" value="<?php echo $clientSet['settlement_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="25 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طابق التسوية : العدد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="base_num" value="<?php echo $clientSet['settlement_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="24 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">الارتفاع م</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="height" value="<?php echo $clientSet['floors_height'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="28 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">طوابق البناء : العدد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="floor_num" value="<?php echo $clientSet['floors_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="27 ">
        </div>
    </div>
    <div class="form-row justify-content-center ">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية الطابقية</label>
            <input type="number" step="any" name="pers_floor" value="<?php echo $clientSet['floors_space_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="30 ">
        </div>
        <div class="form-group col-md-3">
            <label for="inputAddress ">مساحة طوابق اليناء : المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area4" value="<?php echo $clientSet['floors_space_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="29 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" name="pers5" value="<?php echo $clientSet['flat_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="32 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">مسطح البناء : المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="flat"  value="<?php echo $clientSet['flat_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="31 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" name="pers6" value="<?php echo $clientSet['sub_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="35 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area5"  value="<?php echo $clientSet['sub_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="34 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">الابنية الفرعية : العدد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="sub" value="<?php echo $clientSet['sub_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="33 ">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-2">
            <label for="inputAddress ">% النسبة المؤية</label>
            <input type="number" step="any" name="pers7" value="<?php echo $clientSet['park_per'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="38 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">المساحة م<sub>2</sub></label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="area6" value="<?php echo $clientSet['park_space'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="37 ">
        </div>
        <div class="form-group col-md-2">
            <label for="inputAddress ">مواقف السيارات : العدد</label>
            <input type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="park" value="<?php echo $clientSet['park_number'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="36 ">
        </div>
    </div>
    <div class="form-group col-md-12 ">
        <label for="inputAddress ">خدمات اخرى</label>
        <input type="text" name="services" value="<?php echo $clientSet['services'];?>" class="form-control " id="inputAddress " placeholder=" " tabindex="39 ">
    </div>
    <!--
employee side 🙂
-->
    <br>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6">
            <label for="inputEmail4">رسوم التجاوزات</label>
            <input tabindex="41" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" min="0.01" step="0.01" max="2500" onmouseleave="myFunction()" name="lice2" value="<?php echo $servSet['exec_fee'];?>" class="form-control" id="txt1" placeholder="0">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">رسوم الترخيص</label>
            <input tabindex="40" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" min="0.01" step="0.01" max="2500" name="lice1" value="<?php echo $servSet['lice_fee'];?>" class="form-control" id="txt2" placeholder="0">
        </div>
    </div>
    <br>
    <center>
        <div class="from-row text-right">
            <div class="from-group col-md-6 text-right">

                <strong><label class="" >:المجموع</label></strong>
                <div class="from-group col-md-6 text-right">
                    <textarea style="height: 50px; width: 120px" name="total" value="<?php echo $servSet['total'];?>" class="form-control" readonly id="demo"> </textarea>
                </div>

                <br>
    </center>
    <h4>استوفيت الرسوم بموجب</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-3">
            <label for="inputAddress">التاريخ</label>
            <input tabindex="43" type="date" name="rec_da" value="<?php echo $servSet['receipt_date'];?>" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group col-md-3 ">
            <label for="inputAddress">رقم الايصال</label>
            <input tabindex="42" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="rec" value="<?php echo $servSet['receipt_num'];?>" class="form-control" id="inputAddress" placeholder="0">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6 ">
            <label for="inputAddress2">قيمة التأمين</label>
            <input tabindex="44" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="insu_val" value="<?php echo $servSet['insurance_value'];?>" class="form-control" id="inputAddress2" placeholder="">
        </div>
    </div>
    <br>
    <h4>استوفي التأمين بموجب</h4>
    <hr>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="inputAddress">التاريخ</label>
            <input tabindex="46" type="date" name="insu_date" value="<?php echo $servSet['insurance_date'];?>" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCity">رقم الايصال</label>
            <input tabindex="45" type="tel"  pattern="\d*" title="الرجاء ادخال الرقم بالشكل الصحيح" name="insu_rec" value="<?php echo $servSet['insurance_rec'];?>" class="form-control" id="inputCity">
        </div>
    </div>

    <center><button type="submit" id="submit" name="submit" class="btn btn-primary" style="margin-bottom: 15px" >ادخال</button></center>
</form>

<?php
include_once '../includes/emp_footer.php';
ob_end_flush();?>
<script type="text/javascript">
    function myFunction() {
        var y = parseFloat(document.getElementById("txt1").value);
        var z = parseFloat(document.getElementById("txt2").value);
        var x = y + z;
        document.getElementById("demo").innerHTML = (x + " JD");
    }
</script>
