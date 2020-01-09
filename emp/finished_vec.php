<?php ob_start();
include '../includes/connection.php';
include '../includes/emp_header.php';
$query = "select * from vec where emp_id = {$_GET['emp_id']}";
$result = mysqli_query($conn,$query);
$empSet   = mysqli_fetch_assoc($result);
if (isset($_POST['back']))
{
    header("location: ../emp/vec_result.php");
}
?>

<div>
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
                <textarea class="form-control" name="reason" value="<?php echo $empSet['reason']?>" id="exampleFormControlTextarea1" rows="3" readonly></textarea>
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
        </div>
        <div class="text-center">
            <button class="btn btn-primary" style="margin-bottom: 15px" name="back" >الرجوع</button>
        </div>
         </div>
    </form>




<?php include '../includes/emp_footer.php';
ob_end_flush();
?>