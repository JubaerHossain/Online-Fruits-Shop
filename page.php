<?php include 'inc/headerall.php'; ?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL ) {
header('Location:index.php');
}else{

$iid = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['id']);


}
?>

<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">

                <?php
                $getNpd=$pd->getAllProdName($iid);

                if($result=$getNpd->fetch_assoc()){


                ?>
                <h3><?php echo $result['caName']; ?></h3>
                <?php }?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

            <?php
            $getNpd=$pd->getAllProd($iid);

            if($getNpd) {
                while($result=$getNpd->fetch_assoc()){


                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
                        <h2><?php echo $result['pName']; ?></h2>
                        <p><span class="price">Tk <?php echo $result['price']; ?></span></p>
                        <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Add to Cart</a></span>

                        </div>

                    </div>

                <?php }  } ?>

        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
