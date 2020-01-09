<?php
ob_start();
include '../includes/connection.php';
include '../includes/emp_header.php';
?>
<br><hr>
<form class="my">
<table class="table">
    <div class="form-group col-md-12">
        <h3>الطلب الموافق عليه</h3>
            <thead>
            <tr>

                <th scope="col">حذف الطلب</th>
                <th scope="col">تفاصيل القبول</th>
                <th scope="col">الطلب</th>
                <th scope="col">عرض الطلب المقدم</th>
                <th scope="col">رقم الموظف</th>
                <th scope="col">اسم الموظف</th>
            </tr>
            </thead>
            <tbody>
                  <?php
                      $query = "select * from emp where emp_id={$_SESSION['emp_id']}";
                      $result = mysqli_query($conn,$query);
                      while ( $row = mysqli_fetch_assoc($result)){
                      $query1 = "select * from accept where emp_id={$_SESSION['emp_id']}";
                      $result1 = mysqli_query($conn,$query1);
                      while ($row1 = mysqli_fetch_assoc($result1)){
                              echo "<tr>";
                          echo "<td><a href='delete_emp_vec_a.php?emp_id={$row1['emp_id']}' class='btn btn-danger'>حذف</a> </td>";
                              echo "<td><div style=\"white-space:pre-wrap\">{$row1['mass']}</div></td>";
                              echo "<td><p class='btn btn-success'>الطلب مقبول</p></td>";
                          echo "<td><a class='btn btn-info' href='finished_vec.php?emp_id={$row1['emp_id']}'> عرض </a></td>";
                              echo "<td>{$row['emp_name']}</td>";
                              echo "<td>{$row1['emp_id']}</td>";
                              echo "</tr>";
                      }}
                  ?>
            </tr>
            </tbody>
    </div>
</table>
</form>
<form class="my">
<table class="table">
    <div class="form-group col-md-12">
    <h3>الطلب المرفوض </h3>
        <thead>
        <tr>
            <th scope="col">حذف الطلب</th>
            <th scope="col">سبب الرفض</th>
            <th scope="col">الطلب</th>
            <th scope="col">عرض الطلب المقدم</th>
            <th scope="col">رقم الموظف</th>
            <th scope="col">اسم الموظف</th>
        </tr>
        </thead>
        <tbody>
              <?php
                    $query = "select * from emp where emp_id={$_SESSION['emp_id']}";
                    $result = mysqli_query($conn,$query);
                   while ( $row = mysqli_fetch_assoc($result)){
                       $query1 = "select * from reject where emp_id={$_SESSION['emp_id']}";
                       $result1 = mysqli_query($conn,$query1);
                       while ($row1 = mysqli_fetch_assoc($result1)){
                        echo "<tr>";
                           echo "<td><a href='delete_emp_vec_r.php?emp_id={$row1['emp_id']}' class='btn btn-danger'>حذف</a> </td>";
                           echo "<td>{$row1['mass']}</td>";
                        echo "<td><p class='btn btn-danger'>الطلب مرفوض</p></td>";
                        echo "<td><a class='btn btn-info' href='finished_vec.php?emp_id={$row1['emp_id']}'> عرض </a></td>";
                        echo "<td>{$row['emp_name']}</td>";
                        echo "<td>{$row1['emp_id']}</td>";
                        echo "</tr>";
                   }}

              ?>
</table>
</form>
<br><br><hr>


<?php include '../includes/emp_footer.php';

ob_end_flush();
?>
