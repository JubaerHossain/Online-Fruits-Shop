
<?php include 'inc/headerall.php';?>





 <div class="main">
  <div class="content">



  <?php  
			if (isset($searchOutput)) {
				echo $searchOutput;
			}
	    ?>

           
			
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Searching Result :</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
                  if (isset($_GET['submit']) && $_GET['search']){
	                 $search=$_GET['search'];

	                 $searchOutput=$pd->SearchAndOutput($search);
	                     //echo $searchOutput;

                         
	              if($searchOutput) {  

                     while($result=$searchOutput->fetch_assoc()){
                     		

	        ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="details.php?prid=<?php echo $result['pId'];?>"><img src="Admin Panel/Adminstrator/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['pName']; ?></h2>
					<p><span class="price">Tk <?php echo $result['price']; ?></span></p>
				    <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Add To Cart</a></span>

				   </div>

				</div>

				 <?php } }  }?>
			</div>
			
    </div>

 </div>

 <?php include 'inc/footer.php';?>



