<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php include '../../classes/Category.php';?>
<?php include'../../classes/AdminLogin.php';?>

<?php
if (!isset($_GET['ptid']) || $_GET['ptid']==NULL) {
 	echo "<script>window.location='adminlist.php';</srcipt>";
 }else{
 	
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['ptid']);
 }
  $pd=new Admin();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

    $updatePr=$pd->prUpdate($_POST, $id);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Admin</h2>
        <div class="block"> 
        <?php
        if (isset($updatePr)) {
           echo $updatePr;
        }

        ?>  
         <?php
                $getPr=$pd->getPrById($id);
                if ($getPr) {
                	 while ($resul=$getPr->fetch_assoc()) {
                	 	

               ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Admin Name</label>
                    </td>
                    <td>
                        <input type="text" name="alName" value="<?php echo $resul['alName'];?>" class="medium" />
                    </td>
                </tr>
				
			
				
				<tr>
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                        <input type="text" name="alEmail" value="<?php echo $resul['alEmail'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $resul['phone'];?>" class="medium" />
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Passwaord</label>
                    </td>
                    <td>
                        <input type="password" name="alPass" value="<?php echo $resul['alPass'];?>" class="medium" />
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
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


