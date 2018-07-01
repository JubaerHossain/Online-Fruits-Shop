<?php include 'inc/headerall.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<a href=""><img style="width: 69px;height: 76px;box-shadow: 0px 2px 9px 5px red;" src="images/20.png" ></a>
    		</div>
    		<div class="clear"></div>
    	</div>

	      <div class="section group">



	       <?php
	             $getOpd=$pd->getOfPr1();

	              if($getOpd) {                     
                     while($result=$getOpd->fetch_assoc()){
                     		

	        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['pName']; ?></h2>
					 <p><span class="price">Tk <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
				
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<a href=""><img style="width: 69px;height: 76px;box-shadow: 0px 2px 9px 5px red;" src="images/50.png" ></a>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

               <?php
	             $getOpd=$pd->getOfPr2();

	              if($getOpd) {                     
                     while($result=$getOpd->fetch_assoc()){
                     		

	        ?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['pName']; ?></h2>
					 <p><span class="price">Tk <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Details</a></span></div>
				</div>
				
				<?php } } ?>
				
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<a href=""><img style="width: 69px;height: 76px;box-shadow: 0px 2px 9px 5px red;" src="images/10.png" ></a>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
	             $getOpd=$pd->getOfPr3();

	              if($getOpd) {                     
                     while($result=$getOpd->fetch_assoc()){
                     		

	        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['pName']; ?></h2>
					 <p><span class="price">Tk <?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
    </div>
 </div>
<?php include 'inc/footer.php';?>