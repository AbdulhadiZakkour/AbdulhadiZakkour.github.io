<?php
ob_start();
include_once '../includes/connection.php';
include_once '../includes/public_header_in.php';
include_once '../includes/session.php';
?>

    <div class="my">
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header col-lg-12">
                                    <strong class="card-title" style="float: right;font-size: 30px">حالة الطلبات</strong>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group col-md-12">
                                        <select name="serv" class="form-control col-md-6" style='direction: rtl;float: right;'>
                                            <option style='text-align: right' value="-1">اختار الخدمة</option>
                                            <?php

                                            $query  = "select * from service";
                                            $result = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option class='form-control col-md-6' style='clear: both;' value='{$row['serv_id']}' name='{$row['serv_name']}'>{$row['serv_name']}</option>" ;
                                                mysqli_query($conn,$query);

                                            }

                                            ?>
                                        </select>

                                        <button type="submit" name="submit" style="width: 35%;float: right;margin: 10px" class="btn btn-primary col-lg-6" >بحث</button>
                                        <br>
                                </form>
                                <br>
                                <hr>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">حالة الطلب</th>
                                                    <th scope="col">تاريخ التقديم</th>
                                                    <th scope="col">الخدمة</th>
                                                    <th scope="col">اسم العميل</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (isset($_POST['submit'])) {
                                                    $select_val = $_POST['serv'];

                                                    $queryr1 = "select serv1_id from serv1";
                                                    $result1 = mysqli_query($conn, $queryr1);
                                                    $row1 = mysqli_fetch_assoc($result1);

                                                    $queryr2= "select serv2_id from serv2";
                                                    $result2 = mysqli_query($conn, $queryr2);
                                                    $row2 = mysqli_fetch_assoc($result2);

                                                    $queryr3= "select serv3_id from serv3";
                                                    $result3 = mysqli_query($conn, $queryr3);
                                                    $row3 = mysqli_fetch_assoc($result3);

                                                    if($select_val == $row1['serv1_id']) {

                                                        $queryf = "select * from serv1 WHERE client_id = {$_SESSION['client_id']} and exists (select client_id from finished_serv1 where client_id = {$_SESSION['client_id']} )";
                                                        $result = mysqli_query($conn, $queryf);

                                                        $querye = "select * from serv1 WHERE client_id = {$_SESSION['client_id']} and exists (select client_id from serv1_emp where client_id = {$_SESSION['client_id']} )";
                                                        $resulte = mysqli_query($conn, $querye);

                                                        $querye1 = "select * from serv1 WHERE client_id = {$_SESSION['client_id']} and not exists (select client_id from serv1_emp where client_id = {$_SESSION['client_id']} )";
                                                        $resulte1 = mysqli_query($conn, $querye1);

                                                        if (mysqli_num_rows($result)!=0) {
                                                            while ($rowf = mysqli_fetch_assoc($result)) {

                                                                $query1 = "select * from client where client_id = {$rowf['client_id']}";
                                                                $resultc = mysqli_query($conn, $query1);
                                                                $rowc = mysqli_fetch_assoc($resultc);

                                                                $query2 = "select * from serv1 where client_id= {$rowc['client_id']}";
                                                                $result2 = mysqli_query($conn, $query2);
                                                                $rowz = mysqli_fetch_assoc($result2);

                                                                $queryn1 = "select serv_name from service where serv_id = {$rowf['serv1_id']}";
                                                                $resultn1 = mysqli_query($conn, $queryn1);
                                                                $rown1 = mysqli_fetch_assoc($resultn1);

                                                                echo '<tr>';
                                                                echo "<td><a href='view_serv1.php?client_id={$rowc['client_id']}' class='btn btn-warning'>عرض الطلب</a> </td>";
                                                                echo "<td>{$rowz['submit_date']}</td>";
                                                                echo "<td><p style='clear: both' class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                                echo "<td>{$rowc['client_name']}</td>";
                                                                echo '</tr>';
                                                            }
                                                        } elseif (mysqli_num_rows($resulte)!=0 && mysqli_num_rows($result)==0) {

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            $query2 = "select * from serv1 where client_id= {$rowc['client_id']}";
                                                            $result2 = mysqli_query($conn, $query2);
                                                            $rowz = mysqli_fetch_assoc($result2);

                                                            $queryn1 = "select serv_name from service where serv_id = {$row1['serv1_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-warning'>الطلب قيد التفيذ</p> </td>";
                                                            echo "<td>{$rowz['submit_date']}</td>";
                                                            echo "<td><p class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';

                                                        }elseif (mysqli_num_rows($resulte1)!=0 && mysqli_num_rows($resulte)==0 && mysqli_num_rows($result)==0){

                                                            $queryn1 = "select serv_name from service where serv_id = {$row1['serv1_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            $query2 = "select * from serv1 where client_id= {$rowc['client_id']}";
                                                            $result2 = mysqli_query($conn, $query2);
                                                            $rowz = mysqli_fetch_assoc($result2);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-warning'>الطلب غير جاهز</p> </td>";
                                                            echo "<td>{$rowz['submit_date']}</td>";
                                                            echo "<td><p class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';

                                                        }
                                                        else{

                                                            $queryn1 = "select serv_name from service where serv_id = {$row1['serv1_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-danger'>لم يتم طلب هذه الخدمة</p> </td>";
                                                            echo "<td><p class='btn btn-danger'>غير متوفر</p> </td>";
                                                            echo "<td><p class='btn btn-danger'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';
                                                        }
                                                    }

                                                    elseif($select_val == $row3['serv3_id']) {

                                                        $queryf = "select * from serv3 WHERE client_id = {$_SESSION['client_id']} and exists (select client_id from finished_serv3 where client_id = {$_SESSION['client_id']} )";
                                                        $result = mysqli_query($conn, $queryf);

                                                        $querye = "select * from serv3 WHERE client_id = {$_SESSION['client_id']} and exists (select client_id from serv3_emp where client_id = {$_SESSION['client_id']} )";
                                                        $resulte = mysqli_query($conn, $querye);

                                                        $querye1 = "select * from serv3 WHERE client_id = {$_SESSION['client_id']} and not exists (select client_id from serv3_emp where client_id = {$_SESSION['client_id']} )";
                                                        $resulte1 = mysqli_query($conn, $querye1);

                                                        if (mysqli_num_rows($result)!=0) {
                                                            while ($rowf = mysqli_fetch_assoc($result)) {

                                                                $query1 = "select * from client where client_id = {$rowf['client_id']}";
                                                                $resultc = mysqli_query($conn, $query1);
                                                                $rowc = mysqli_fetch_assoc($resultc);

                                                                $query2 = "select * from serv3 where client_id= {$rowc['client_id']}";
                                                                $result2 = mysqli_query($conn, $query2);
                                                                $rowz = mysqli_fetch_assoc($result2);

                                                                $queryn1 = "select serv_name from service where serv_id = {$rowf['serv3_id']}";
                                                                $resultn1 = mysqli_query($conn, $queryn1);
                                                                $rown1 = mysqli_fetch_assoc($resultn1);

                                                                echo '<tr>';
                                                                echo "<td><a href='view_serv3.php?client_id={$rowc['client_id']}' class='btn btn-warning'>عرض الطلب</a> </td>";
                                                                echo "<td>{$rowz['submit_date']}</td>";
                                                                echo "<td><p class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                                echo "<td>{$rowc['client_name']}</td>";
                                                                echo '</tr>';
                                                            }
                                                        } elseif (mysqli_num_rows($resulte)!=0 && mysqli_num_rows($result)==0) {

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            $query2 = "select * from serv3 where client_id= {$rowc['client_id']}";
                                                            $result2 = mysqli_query($conn, $query2);
                                                            $rowz = mysqli_fetch_assoc($result2);

                                                            $queryn1 = "select serv_name from service where serv_id = {$row3['serv3_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-warning'>الطلب قيد التفيذ</p> </td>";
                                                            echo "<td>{$rowz['submit_date']}</td>";
                                                            echo "<td><p class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';

                                                        }elseif (mysqli_num_rows($resulte1)!=0 && mysqli_num_rows($resulte)==0 && mysqli_num_rows($result)==0){

                                                            $queryn1 = "select serv_name from service where serv_id = {$row3['serv3_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            $query2 = "select * from serv3 where client_id= {$rowc['client_id']}";
                                                            $result2 = mysqli_query($conn, $query2);
                                                            $rowz = mysqli_fetch_assoc($result2);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-warning'>الطلب غير جاهز</p> </td>";
                                                            echo "<td>{$rowz['submit_date']}</td>";
                                                            echo "<td><p class='btn btn-info'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';

                                                        }
                                                        else{

                                                            $queryn1 = "select serv_name from service where serv_id = {$row3['serv3_id']}";
                                                            $resultn1 = mysqli_query($conn, $queryn1);
                                                            $rown1 = mysqli_fetch_assoc($resultn1);

                                                            $query1 = "select * from client where client_id = {$_SESSION['client_id']}";
                                                            $resultc = mysqli_query($conn, $query1);
                                                            $rowc = mysqli_fetch_assoc($resultc);

                                                            echo '<tr>';
                                                            echo "<td><p class='btn btn-danger'>لم يتم طلب هذه الخدمة</p> </td>";
                                                            echo "<td><p class='btn btn-danger'>غير متوفر</p> </td>";
                                                            echo "<td><p class='btn btn-danger'>{$rown1['serv_name']}</p> </td>";
                                                            echo "<td>{$rowc['client_name']}</td>";
                                                            echo '</tr>';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>



<?php include_once '../includes/public_footer_in.php';
ob_end_flush();?>