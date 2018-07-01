<?php include 'inc/headerall.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest Fruits</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    	<div class="section group">
	    	
			<?php
	             $getNpd=$pd->getNPr();

	              if($getNpd) {                     
                     while($result=$getNpd->fetch_assoc()){
                     		

	        ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['pName']; ?></h2>
					<p><span class="price">Tk <?php echo $result['price']; ?></span></p>
				    <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Details</a></span>

				   </div>

				</div>

				 <?php }  } ?>
			    
			</div>
    </div>
 </div>
 <?php include 'inc/footer.php'; ?>
