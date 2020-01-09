<?php
include_once '../includes/connection.php';
include_once '../includes/session.php';
include_once '../includes/emp_header.php';
?>

    <body>
    <!-- Left Panel -->

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" style="float: right;font-size: 30px">الخدمات</strong>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">طلب تجديد رخص المهن</strong>
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

                                            $query  = "select * from client ";
                                            $result = mysqli_query($conn,$query);
                                            while ($row    = mysqli_fetch_assoc($result)) {
                                                $query2 = "select * from serv1 where client_id={$row['client_id']} and not exists (select client_id from serv1_emp where client_id={$row['client_id']})";
                                                $result2 = mysqli_query($conn, $query2);
                                                while ($row1 = mysqli_fetch_assoc($result2)) {
                                                 /*   */
                                                        echo '<tr>';
                                                        echo "<td><a href='serv1_emp.php?client_id={$row1['client_id']}' class='btn btn-danger'>طلب تجديد رخص مهن</a> </td>";
                                                        echo "<td>{$row['client_name']}</td>";
                                                        echo "<td>{$row1['client_id']}</td>";
                                                        echo '</tr>';
                                                    //}
                                                }

                                            }
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
                                                $query  = "select * from client ";
                                                $result = mysqli_query($conn,$query);
                                                while ($row    = mysqli_fetch_assoc($result)) {
                                                    $query2 = "select * from serv3 where client_id={$row['client_id']} and not exists (select client_id from serv3_emp where client_id={$row['client_id']})";
                                                    $result2 = mysqli_query($conn, $query2);
                                                    while ($row1 = mysqli_fetch_assoc($result2)) {
                                                        {
                                                            echo '<tr>';
                                                            echo "<td><a href='serv3_emp.php?client_id={$row1['client_id']}' class='btn btn-primary'>رخصة أنشاءات</a> </td>";
                                                            echo "<td>{$row['client_name']}</td>";
                                                            echo "<td>{$row1['client_id']}</td>";
                                                            echo '</tr>';
                                                        }
                                                    }
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
include_once '../includes/emp_footer.php';
?>