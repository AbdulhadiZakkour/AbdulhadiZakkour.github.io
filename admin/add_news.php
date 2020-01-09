<?php
ob_start();
include_once '../includes/admin_header.php';
include_once '../includes/connection.php';

$path1 = "news_uploads/";

if  (isset($_POST['submit'])){
    $title = $_POST['title'];
    $msg    = $_POST['message'];
    $name         = $_FILES['image']['name'];
    $tmp_name     = $_FILES['image']['tmp_name'];
    $date = $_POST['date'];
        move_uploaded_file($tmp_name, $path1 . $name);

        $query = "insert into news (title,object,news_image,publish_date)
                              values ('$title','$msg','$name','$date')";
        mysqli_query($conn, $query);
        header("location:news.php");

}
?>

<form method="post"  enctype="multipart/form-data" class="my">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <center><h2 style="padding-bottom: 40px">اضافة الاخبار</h2></center>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        الموضوع</label>
                                    <textarea name="message"  id="message" class="form-control" rows="9" cols="25" tabindex="4" required="required"
                                              placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        العنوان</label>
                                    <input type="text" name="title" class="form-control" id="name" placeholder="" required="required" tabindex="1" />
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">صورة الخبر</label>
                                    <input id="cc-payment" name="image" type="file" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputZip">تاريخ نشر الخبر</label><br>
                                    <textarea style="width: 100px;height: 30px" id="demo" name="date"   readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    نشر</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include_once '../includes/emp_footer.php';
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var d = new Date();
    document.getElementById("demo").innerHTML =d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate();
</script>
