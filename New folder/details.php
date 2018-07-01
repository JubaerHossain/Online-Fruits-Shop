<?php include 'inc/header.php';?>

<?php

 if (!isset($_GET['prid']) || $_GET['prid']==NULL) {
 	 //echo "<script>window.location.href = 'index.php';</script>";
 	 header('Location:index.php');
 	//echo "<script>window.location='index.php';</srcipt>";
 }else{
 	
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['prid']);
 }

     if ($_SERVER['REQUEST_METHOD']=='POST') {
        $quantity   =$_POST['quantity'];

         $addCart=$ct->addToCart($quantity,$id);
 } 
 
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	

				<?php
                   $getp=$pd->getSinlgepro($id);
                   if ($getp) {
                   	while ($result=$getp->fetch_assoc()) {
                   	
				?>			
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['pName']?> </h2>
									
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']?></span></p>
						<p>Category: <span><?php echo $result['caName']?></span></p>
						<p>Brand:<span><?php echo $result['brName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>

							
				</div>
				<span style="color: red;font-size: 18px;">
						<?php
						if (isset($addCart)) {
							echo $addCart;
						}

						?>
					</span>	
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body']?>
	    </div>
			
			<?php }} ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>

   <?php include 'inc/footer.php';?>