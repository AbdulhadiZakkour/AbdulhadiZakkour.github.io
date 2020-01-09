<?php
ob_start();
include_once '../includes/connection.php';?>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_header.php';}
else
{ include_once '../includes/public_header_in.php';}
if  (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile =$_POST['mobile'];
    $msg    = $_POST['message'];

    $query = "insert into feedback (cname,email,mobile,msg)
                              values ('$name','$email','$mobile','$msg')";
    mysqli_query($conn,$query);
    header("location:index.php");

}

?>
<div class="my">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <center><h2 style="padding-bottom: 40px">للشكوى و الاقتراحات</h2></center>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        الرسالة</label>
                                    <textarea name="message"  id="message" class="form-control" rows="9" cols="25" tabindex="4" required="required"
                                              placeholder=""></textarea>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    الاسم</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="" required="required" tabindex="1" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    البريد الالكتروني</label>
                                <div class="input-group">
                                </span>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="" required="required" tabindex="2" /></div>
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    رقم الهاتف</label>
                                <div class="input-group">
                                    <input type="tel" name="mobile"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" tabindex="3" class="form-control" id="email" placeholder="" required="required" /></div>
                            </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../includes/session.php';
//session_start();
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
ob_end_flush();
?>