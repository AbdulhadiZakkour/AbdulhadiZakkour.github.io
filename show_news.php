<?php include_once '../includes/connection.php';?>
<?php
include_once '../includes/session.php';
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_header.php';}
else
{ include_once '../includes/public_header_in.php';}
$path1 = "../admin/news_uploads/";
$query ="select * from news where news_id={$_GET['id']}";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>
<div class="my text-center">
    <figure class="figure " >
        <?php
        echo "<img  src='$path1{$row['news_image']}'></td>";
        ?>
        <br><hr>
        <P>تاريخ النشر</P>
      <center> <input style="width:15%;text-align: center" value="<?php echo $row['publish_date'];?>" readonly></center>
        <br>
        <br>
      <center>  <figcaption class="figure-caption" style="text-decoration:none  ;text-align: right;font-size: 20px;width: 60%"><b><?php echo $row['object'];?></b></figcaption></center>
    </figure>
</div>
<?php
include_once '../includes/session.php';
if(!isset($_SESSION['client_id']))
{include_once '../includes/public_footer.php';}
else
{ include_once '../includes/public_footer_in.php';}
?>
<script type="text/javascript">
    $(document).ready(function() {
        function createFaction() {
            var name = document.getElementById('msg').value;
            document.getElementById('test1').innerHTML = name;
        }
    }
</script>
