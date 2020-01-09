<?php
ob_start();
include_once '../includes/connection.php';
include '../includes/emp_header.php'; ?>

<?php

$query = "select * from serv1 ";
$result = mysqli_query($conn,$query);
$servSet = array();
while($row=mysqli_fetch_assoc($result)) {
    $servSet[] = $row;
}
if (isset($_POST['acc'])) {

    $query = "select * from client";
    $resultc = mysqli_query($conn, $query);
    while($rowc = mysqli_fetch_assoc($resultc)) {
        $query = "select * from serv1 where client_id = {$rowc['client_id']}";
        $result = mysqli_query($conn, $query);
        while ($rowz = mysqli_fetch_assoc($result)) {
            $query2 = "select * from serv1_emp where client_id={$rowz['client_id']}";
            $result2 = mysqli_query($conn, $query2);
            while ($row1 = mysqli_fetch_assoc($result2)) {
                $querye = "select * from emp where emp_id = {$row1['emp_id']}";
                $resulte = mysqli_query($conn, $querye);
                while ($rowe = mysqli_fetch_assoc($resulte)) {


                    $emp_id = $rowe['emp_id'];
                    $client_id = $row1['client_id'];
                    $date = $_POST['date'];
                    $query = "insert into finished_serv1 (finished_date,client_id,emp_id)
                values('$date','$client_id','$emp_id')";
                    mysqli_query($conn, $query);


                }
            }
        }
    }
    header("location:edit_services.php");
}
?>

<body>
<!-- Left Panel -->

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="float: right;font-size: 30px">تعديل الطلبات</strong>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">طلب تجديد رخص المهن</strong>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="inputEmail">حتى فترة</label>
                                        <input type="date" class="form-control" name="too" id="inputEmail4" placeholder="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="inputPassword">من الفترة</label>
                                        <input type="date" class="form-control" name="from" id="inputPassword4" placeholder="">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                    </form>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">حذف</th>
                                            <th scope="col">تعديل</th>
                                            <th scope="col">الموافقة على الطلب</th>
                                            <th scope="col">اسم الموظف</th>
                                            <th scope="col">رقم الموظف المتسلسل</th>
                                            <th scope="col">تاريخ التقديم</th>
                                            <th scope="col">الخدمة</th>
                                            <th scope="col">اسم العميل</th>
                                            <th scope="col">رقم العميل المتسلسل</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        if (isset($_POST['submit'])) {
                                            $from=($_POST['from']) ;
                                            $too =($_POST['too']) ;
                                            $query = "select * from serv1";
                                            $result = mysqli_query($conn, $query);
                                            while ($rowz = mysqli_fetch_assoc($result)) {
                                                $query = "select * from client where client_id = {$rowz['client_id']}";
                                                $resultc = mysqli_query($conn, $query);
                                                $rowc  = mysqli_fetch_assoc($resultc);

                                                $query2 = "select * from serv1_emp where client_id={$rowc['client_id']} and not exists (select client_id from finished_serv1 where client_id={$rowc['client_id']})";
                                                $result2 = mysqli_query($conn, $query2);
                                                while ($row1 = mysqli_fetch_assoc($result2)) {
                                                    $querye = "select emp_name from emp where emp_id = {$row1['emp_id']}";
                                                    $resulte = mysqli_query($conn, $querye);
                                                    $rowe  = mysqli_fetch_assoc($resulte);
                                                    if (($rowz['submit_date'] >= $from) && ($too >= $rowz['submit_date'])) {

                                                        echo '<tr>';
                                                        echo "<td><a href='delete_client_serv1.php?client_id={$rowc['client_id']}' class='btn btn-danger'>حذف</a> </td>";
                                                        echo "<td><a href='edit_client_serv1.php?client_id={$rowc['client_id']}' class='btn btn-warning'>تعديل</a> </td>";
                                                        echo "<td><a href='insert_finished_serv1.php?client_id={$rowc['client_id']}'  class='btn btn-info'>الموافقة على الطلب</a> </td>";
                                                        echo "<td>{$rowe['emp_name']}</td>";
                                                        echo "<td>{$row1['emp_id']}</td>";
                                                        echo "<td>{$rowz['submit_date']}</td>";
                                                        echo "<td><label class='btn btn-danger'>طلب تجديد رخص مهن</label> </td>";
                                                        echo "<td>{$rowc['client_name']}</td>";
                                                        echo "<td>{$rowz['client_id']}</td>";
                                                        echo '</tr>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 col-lg-4" style="display: none;">
                            <label for="inputZip" style="float: initial">تاريخ تقديم الطلب</label><br>
                            <textarea style="width: 80px;height: 30px" id="demo" name="date"   readonly></textarea>
                        </div>
                    </form>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">طلب ترخيص البناء</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <!--  <th scope="col">CAt ID</th>-->
                                            <!-- <th scope="col">تعديل</th>
 <th scope="col">حذف</th>-->
                                            <th scope="col">الخدمة المطلوبة</th>
                                            <th scope="col">اسم العميل</th>
                                            <th scope="col">الرقم المتسلسل</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query  = "select * from client";
                                        $result = mysqli_query($conn,$query);
                                        while ($row    = mysqli_fetch_assoc($result)){
                                            $query2 = "select * from serv2 where client_id={$row['client_id']}";
                                            $result2 = mysqli_query($conn,$query2);
                                            while($row1=mysqli_fetch_assoc($result2))
                                            {
                                                echo '<tr>';
                                                echo "<td><a href='serv2_emp.php?client_id={$row1['client_id']}' class='btn btn-warning'>طلب ترخيص بناء</a> </td>";
                                                //echo "<td><a href='delete_emp.php?emp_id={$row['emp_id']}' class='btn btn-danger'>حذف</a> </td>";
                                                //echo "<td><img  src='$path1{$row['emp_img']}' width='50' height='50'></td>";
                                                /* echo "<td>{$row['emp_email']}</td>";
                                                 echo "<td>{$row['emp_password']}</td>";*/
                                                echo "<td>{$row['client_name']}</td>";
                                                echo "<td>{$row1['client_id']}</td>";
                                                echo'</tr>';
                                            }}
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">رخصة أنشاءات</strong>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">طلب رخصة أنشاءات</strong>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="inputEmail">حتى فترة</label>
                                                    <input type="date" class="form-control" name="too3" id="inputEmail4" placeholder="">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="inputPassword">من الفترة</label>
                                                    <input type="date" class="form-control" name="from3" id="inputPassword4" placeholder="">
                                                </div>
                                            </div>
                                            <button type="submit" name="submit3" class="btn btn-primary">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <!--  <th scope="col">CAt ID</th>-->
                                            <!-- <th scope="col">تعديل</th>
 <th scope="col">حذف</th>-->
                                            <th scope="col">حذف</th>
                                            <th scope="col">تعديل</th>
                                            <th scope="col">الموافقة على الطلب</th>
                                            <th scope="col">اسم الموظف</th>
                                            <th scope="col">رقم الموظف المتسلسل</th>
                                            <th scope="col">تاريخ التقديم</th>
                                            <th scope="col">الخدمة</th>
                                            <th scope="col">اسم العميل</th>
                                            <th scope="col">رقم العميل المتسلسل</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if (isset($_POST['submit3'])) {
                                            $from=($_POST['from3']) ;
                                            $too =($_POST['too3']) ;
                                            $query = "select * from serv3";
                                            $result = mysqli_query($conn, $query);
                                            while ($rowz = mysqli_fetch_assoc($result)) {
                                                $query = "select * from client where client_id = {$rowz['client_id']}";
                                                $resultc = mysqli_query($conn, $query);
                                                $rowc  = mysqli_fetch_assoc($resultc);

                                                $query2 = "select * from serv3_emp where client_id={$rowc['client_id']} and not exists (select client_id from finished_serv3 where client_id={$rowc['client_id']})";
                                                $result2 = mysqli_query($conn, $query2);
                                                while ($row1 = mysqli_fetch_assoc($result2)) {
                                                    $querye = "select * from emp where emp_id = {$row1['emp_id']}";
                                                    $resulte = mysqli_query($conn, $querye);
                                                    $rowe  = mysqli_fetch_assoc($resulte);
                                                    if (($rowz['submit_date'] >= $from) && ($too >= $rowz['submit_date'])) {

                                                        echo '<tr>';
                                                        echo "<td><a href='delete_client_serv3.php?client_id={$rowc['client_id']}' class='btn btn-danger'>حذف</a> </td>";
                                                        echo "<td><a href='edit_client_serv3.php?client_id={$rowc['client_id']}' class='btn btn-warning'>تعديل</a> </td>";
                                                        echo "<td><a href='insert_finished_serv3.php?client_id={$rowc['client_id']}'  class='btn btn-info'>الموافقة على الطلب</a> </td>";
                                                        echo "<td>{$rowe['emp_name']}</td>";
                                                        echo "<td>{$rowe['emp_id']}</td>";
                                                        echo "<td>{$rowz['submit_date']}</td>";
                                                        echo "<td><label class='btn btn-danger'>طلب رخصة أنشاءات</label> </td>";
                                                        echo "<td>{$rowc['client_name']}</td>";
                                                        echo "<td>{$rowz['client_id']}</td>";
                                                        echo '</tr>';
                                                    }
                                                }
                                            }

                                            //}
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php
include '../includes/emp_footer.php';
ob_end_flush();?>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var d = new Date();
    document.getElementById("demo").innerHTML =d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate();
</script>
