<?php
include_once '../includes/connection.php';
$path2 = "admin_uploads/";
if(isset($_POST['submit'])) {
    $serv_name = $_POST['serv_name'];
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path2.$name);
    if($_FILES['image']['error'] == 0) {
        $query = "update service set serv_name = '$serv_name',
                                  serv_img = '$name'
			       where serv_id = {$_GET['serv_id']}";
    }else{
        $query = "update service set serv_name = '$serv_name'
			       where serv_id = {$_GET['serv_id']}";
    }
    mysqli_query($conn,$query);
    header("location:manage_serv.php");
}
$query     = "select * from service where serv_id = {$_GET['serv_id']}";
$result    = mysqli_query($conn,$query);
$catSet  = mysqli_fetch_assoc($result);
?>
<?php include '../includes/admin_header.php'; ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Manage Category</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">Edit Category</h3>
                                </div>
                                <hr>
                                <form  method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                        <input id="cc-payment" name="serv_name" type="text" class="form-control" value="<?php echo $catSet['serv_name']  ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                        <input id="cc-payment" name="image" type="file" class="form-control" value="<?php echo $catSet['name'] ?>">
                                    </div>
                                    <!--<div class="input-group" style="padding-bottom:10px">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                        </div>
                                    </div>-->
                                    <button  id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                        تحديث
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/admin_footer.php'; ?>