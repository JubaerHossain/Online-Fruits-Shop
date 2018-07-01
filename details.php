<?php include 'inc/headerall.php';?>
<?php  

if (!isset($_GET['prid']) || $_GET['prid'] == NULL ) {
     header('Location:index.php');
}else{

    $id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['prid']);

}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
	$quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity,$id);
}

?>
 <div class="main">
    <div class="content">
	    <?php  
			if (isset($addCart)) {
				echo $addCart;
			}
	    ?>
    	<div class="section group">
				<?php
				    $result = $pd->getSinlgepro($id);
				    if ($result) {
				        while ($productValue = $result->fetch_assoc()) {   
				?> 
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="Admin Panel/Adminstrator/<?php echo $productValue['image']; ?>" >
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $productValue['pName']; ?></h2>
										
						<div class="price">
							<p>Price: <span>Tk <?php echo $productValue['price']; ?></span></p>
							<p>Category: <span><?php echo $productValue['caName']; ?></span></p>
							<p>Discount:<span><?php echo $productValue['brName']; ?></span></p>
						</div>
						<div class="add-cart">
							<form action="" method="post">
								<input type="number" class="buyfield" name="quantity" value="1"/>
								<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
							</form>				
						</div>
					</div>
					<div class="product-desc">
						<h2>Product Details</h2>
						<p><?php echo $productValue['body']; ?></p>
			    	</div>		
			</div>
                    
		    <?php
		        }
		    }
		    ?>

 		</div>
 	</div>
</div>
<?php include 'inc/footer.php'; ?>

