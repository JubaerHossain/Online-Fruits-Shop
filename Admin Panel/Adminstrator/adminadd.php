<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php include '../../classes/Category.php';?>
<?php include'../../classes/AdminLogin.php';?>

<?php
  $ad =new Admin();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submi'])) {

    $inserPr=$ad->sellerInser($_POST);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Seller</h2>
        <div class="block"> 
        <?php
        if (isset($inserPr)) {
           echo $inserPr;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Seller Name</label>
                    </td>
                    <td>
                        <input type="text" name="alName"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                         <input type="text" name="alEmail"/>
                    </td>
                   
                </tr>
                <tr>
                     <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone"/>
                    </td>
                    
                </tr>
                
                 <tr>

                    <td>
                        <label>Passwaord</label>
                    </td>
                    <td>
                        <input type="password" name="alPass"/>
                    </td>                    
                </tr>
                
            
                
                

                <tr>
                    <td></td>

                    <td>
                        <input type="submit" name="submi" Value="Add Admin" />
                    </td>
                </tr>
            </table>
            </form>
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


