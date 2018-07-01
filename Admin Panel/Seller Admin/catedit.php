<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Category.php';?>
<?php
 if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
 	echo "<script>window.location='catlist.php';</srcipt>";
 }else{
 	
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['catid']);
 }
 $al=new Category();
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $caName   =$_POST['caName'];

    $Updatecat=$al->catUpdate($caName,$id);
 }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
               <?php
               if(isset($Updatecat)){
                echo $Updatecat;
            }

               ?>
               <?php
                $getCat=$al->getCatById($id);
                if ($getCat) {
                	 while ($result=$getCat->fetch_assoc()) {
                	 	

               ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="caName" value="<?php echo $result['caName'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>