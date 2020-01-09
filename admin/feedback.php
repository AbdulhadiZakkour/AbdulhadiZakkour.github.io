<?php
ob_start();
include_once '../includes/admin_header.php';
include_once '../includes/connection.php';
$qurey = "select * from feedback";
$result = mysqli_query($conn,$qurey);

?>
<br><hr>
<form class="my" method="post">
<table class="table" style="text-align: right">
    <thead>
    <h4>شكاوي و اقتراحات المستخدمين</h4>
    <br>
    <tr>

        <th scope="col">حذف</th>
        <th scope="col">عرض الطلب</th>
        <th scope="col">اسم المقدم</th>
        <th scope="col">رقم الطلب</th>


    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='delete_feedback.php?id={$row['id']}' class='btn btn-danger'>حذف</a> </td>";
            echo "<td><a href='view_feedback.php?id={$row['id']}' class='btn btn-info'>عرض</a> </td>";
            echo "<td>{$row['cname']}</td>";
            echo "<td>{$row['id']}</td>";
            echo "</tr>";
        }
        ?>
    </tr>
    </tbody>
</table>
</form>
<br><br><hr>

<?php include_once '../includes/admin_footer.php';

ob_end_flush();?>
