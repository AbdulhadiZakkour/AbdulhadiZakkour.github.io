<?php
include_once '../includes/connection.php';
include_once '../includes/admin_header.php';
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="float: right;font-size: 30px">الطلبات</strong>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">طلب اجازة</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">موافقة</th>
                                            <th scope="col">رفض</th>
                                            <th scope="col">اسم الموظف</th>
                                            <th scope="col">رقم الموظف</th>
                                            <th scope="col">اسم المسؤول</th>
                                            <th scope="col">رقم المسؤول</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query  = "select * from emp";
                                        $result = mysqli_query($conn,$query);
                                        while ($row    = mysqli_fetch_assoc($result)){
                                            $query2 = "select * from vec where emp_id={$row['emp_id']}";
                                            $result2 = mysqli_query($conn,$query2);
                                            while($row1=mysqli_fetch_assoc($result2))
                                            {
                                                $query3 = "select * from admin where admin_id={$_SESSION['admin_id']}";
                                                $result3 = mysqli_query($conn,$query3);
                                                while ($row3 = mysqli_fetch_assoc($result3))
                                                {
                                                echo '<tr>';
                                                echo "<td><label class='btn btn-success'>الموافقة على الطلب</label> </td>\"";
                                                echo "<td><label class='btn btn-danger'>رفض الطلب</label> </td>\"";
                                                echo "<td>{$row['emp_name']}</td>";
                                                echo "<td>{$row1['emp_id']}</td>";
                                                echo "<td>{$row3['admin_name']}</td>";
                                                echo "<td>{$row3['admin_id']}</td>";
                                                echo'</tr>';
                                            }}}
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