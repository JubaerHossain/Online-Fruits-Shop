<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php include '../../classes/Category.php';?>
<?php include'../../classes/Product.php';?>

<?php
if (!isset($_GET['prtid']) || $_GET['prtid']==NULL) {
 	echo "<script>window.location='productlist.php';</srcipt>";
 }else{
 	
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['prtid']);
 }
  $pd=new Product();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

    $updatePr=$pd->prUpdate($_POST,$_FILES, $id);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
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
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="pName" value="<?php echo $resul['pName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php
                            $cat=new Category();
                                $getcat=$cat->getallcat();
                                if ($getcat) {
                                   while ($result=$getcat->fetch_assoc()) {
                                       
                                 

                            ?>
                            <option 
                            <?php
                            if ($resul['catId']==$result['catId']) { ?>
                            	selected="selected"
                            <?php }
                            ?>
                            value="<?php echo $result['catId'];?>"><?php echo $result['caName'];?></option>

                            <?php   }
                                }
                                ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brId">
                            <option>Select Brand</option>
                            <?php
                            $br=new Brand();
                                $getbr=$br->getallBr();
                                if ($getbr) {
                                   while ($result=$getbr->fetch_assoc()) {
                                       
                                 

                            ?>
                            <option 
                            <?php
                            if ($resul['brId']==$result['brId']) { ?>
                            	selected="selected"
                            <?php }
                            ?>
                            value="<?php echo $result['brId'];?>"><?php echo $result['brName'];?>
                            	
                            </option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" ><?php echo $resul['body'];?> 

                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $resul['price'];?>" class="medium" />
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
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="typ">
                            <option>Select Type</option>
                            <?php
                            if ($resul['typ']==0) {?>

                            <option  selected="selected" value="0">Featured</option>
                            <option value="1">Generel</option>
                            <?php }else{ ?>
                            <option  selected="selected" value="1">Generel</option>
                            <option value="0">Featured</option>
                            
                            <?php } ?>
                            
                        </select>
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


