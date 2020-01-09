<?php ob_start();
include_once '../includes/connection.php';
include_once '../includes/admin_header.php';
$path1 = "news_uploads/";

$query ="select * from news where news_id={$_GET['id']}";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
    header("location:news.php");
}
?>

<div class="my text-center">
    <figure class="figure" >
        <?php
        echo "<img  src='$path1{$row['news_image']}'></td>";
        ?>
        <br><hr>
        <P>تاريخ النشر</P>
        <center> <input style="width:25%;text-align: center" value="<?php echo $row['publish_date'];?>" readonly></center>
        <br>
        <br>
        <center>  <figcaption class="figure-caption" style="text-decoration: none;text-align: center;font-size: 20px;width: 60%"><b><?php echo $row['object'];?></b></figcaption></center>
    </figure>
    <center><a href="news.php" type="submit" id="submit" name="submit"  style="margin-top: 15px" class="btn btn-primary"><span>الرجوع لصفحة الاخبار</span></a></center>

</div>
<?php include_once '../includes/admin_footer.php';
ob_end_flush();
?>
<script type="text/javascript">
    $try= $("textarea").data('value');
    alert($try);
</script>