
<?php include 'inc/headerall.php';?>
<?php include 'inc/slider.php';?>


 <div class="main">
  <div class="content">

           <div class="content_top">
    		<div class="heading">
    		<h3>All Desi Fruits</h3>
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
                      <div class="button"><span><a href="details.php?prid=<?php echo $result['pId'];?>" class="details">Add to Cart</a></span>

                      </div>

                  </div>

              <?php } } ?>


       </div>
      <?php



      echo "<span class='pagination' style='padding-left: 532px;'><a href='index.php?page=1'>".'First page'."</a>"?>
	 <a href="index.php">1 2 3 4 ....</a>


      <?php echo "<a href='index.php?page=1'>".'Next'."</a></span>"?>




  </div>

 </div>

 <?php include 'inc/footer.php';?>



