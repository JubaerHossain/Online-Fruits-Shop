<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php include '../../classes/Category.php';?>
<?php include'../../classes/Slider.php';?>

<?php
if (!isset($_GET['sld']) || $_GET['sld']==NULL) {
    echo "<script>window.location='sliderlist.php';</srcipt>";
}else{

    $id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['sld']);
}
$pd=new Slider();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

    $updatePr=$pd->sliderupdate($_POST,$_FILES, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Slider</h2>
        <div class="block">
            <?php
            if (isset($updatePr)) {
                echo $updatePr;
            }

            ?>
            <?php
            $getPr=$pd->getSlById($id);
            if ($getPr) {
                while ($resul=$getPr->fetch_assoc()) {


                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Slider title</label>
                                </td>
                                <td>
                                    <input type="text" name="pName" value="<?php echo $resul['slName'];?>" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="<?php echo $resul['image']; ?>" height="80px" width="200px"/><br/ >
                                    <input type="file" name="image" />
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }}?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>

<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


