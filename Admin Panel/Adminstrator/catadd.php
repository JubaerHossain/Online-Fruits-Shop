﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Category.php';?>
<?php
$al=new Category();
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $caName=$_POST['caName'];

    $insertcat=$al->catInsert($caName);
 }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php
               if(isset($insertcat)){
                echo $insertcat;
            }
               ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="caName" placeholder="Enter Category Name..." class="medium" />
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