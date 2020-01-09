<?php ob_start();
include_once '../includes/connection.php';
include_once '../includes/admin_header.php';

$query ="select * from feedback where id={$_GET['id']}";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
    header("location:feedback.php");
}
?>

<form class="my" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <figure class="figure" >
                                <center>
                                    <figcaption type="text" class="figure-caption" style="text-decoration: none;text-align: center;font-size: 20px;width: 60%"><b><?php echo $row['msg'];?></b>
                                    </figcaption></center>
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        الاسم</label>
                                    <input type="text" name="name" class="form-control" id="name" value=<?php echo "{$row['cname']}"?> placeholder="" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        البريد الالكتروني</label>
                                    <div class="input-group">

                                        <input type="email" name="email" class="form-control" id="email" value=<?php echo "{$row['email']}"?> placeholder=""  readonly /></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        رقم الهاتف</label>
                                    <div class="input-group">

                                        <input type="tel" name="mobile"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value=<?php echo "{$row['mobile']}"?> class="form-control" id="email" placeholder="" readonly/></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    عودة </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once '../includes/admin_footer.php';
ob_end_flush();
?>
<script type="text/javascript">
    $try= $("textarea").data('value');
    alert($try);
</script>