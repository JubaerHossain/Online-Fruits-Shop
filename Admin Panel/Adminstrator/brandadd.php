<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php
$al=new Brand();
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $brName=$_POST['brName'];

    $insertBrand=$al->BrandInsert($brName);
 }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
               <?php
               if(isset($insertBrand)){
                echo $insertBrand;
            }
               ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>