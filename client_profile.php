<?php
include_once '../includes/public_header_in.php';
include_once '../includes/connection.php';

?>

<?php
$path1 = "public_uploads/";
if(isset($_POST['submit'])) {
    $Ename = $_POST['client_name'];
    $password = $_POST['client_password'];
    $client_phone = $_POST['client_phone'];
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if ($_FILES['image']['error'] == 0) {
        move_uploaded_file($tmp_name, $path1 . $name);

        $query = "update client set client_name  = '$Ename',
                             client_password     = '$password',
                             client_mobile       = '$client_phone',
                             client_img          = '$name'
			                    where client_id = {$_SESSION['client_id']}";

    } else {
        $query = "update client set client_name  = '$Ename',
                             client_password     = '$password',
                             client_mobile       = '$client_phone'
			                     where client_id = {$_SESSION['client_id']}";
    }
    mysqli_query($conn, $query);

}

$query2     = "select * from client where client_id = {$_SESSION['client_id']}";
$result    = mysqli_query($conn,$query2);
$oldSet  = mysqli_fetch_assoc($result);
?>
    <div class="my">
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <?php
                            echo "<img class=\"avatar rounded-circle img-thumbnail\"  src='$path1{$oldSet['client_img']}'></td>";
                            ?>
                            <hr>
                        </div>
                        </hr>
                        <br>
                    </form>
                </div>
                <div class="col-sm-9">
                    <div>
                        <strong class="card-title" style="float: right;padding-top: 10px">الصفحة الشخصية</strong>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-xs-6 col-lg-12">
                                        <label for="first_name">
                                            <h5>الاسم الكامل</h5></label>
                                        <input type="text" class="form-control" name="client_name" id="first_name" value="<?php echo $oldSet['client_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 col-lg-12">
                                        <label for="password">
                                            <h5>الرمز السري</h5></label>
                                        <input type="password" class="form-control" name="client_password" id="phone" value="<?php echo $oldSet['client_password'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6 col-lg-12">
                                        <label for="phone">
                                            <h5>رقم الهاتف</h5></label>
                                        <input type="tel" class="form-control" name="client_phone" id="password"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value="<?php echo $oldSet['client_mobile'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 col-lg-12">
                                        <label for="phone">
                                            <h5>الصورة الشخصية</h5></label>
                                        <input id="cc-payment" name="image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <br>
                                        <button style="width:100%" class="btn btn-lg btn-success" type="submit" name="submit">حفظ</button>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                        <div class="tab-pane" id="messages">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once '../includes/public_footer_in.php';
?>