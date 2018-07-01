
<?php include'classes/Slider.php';?>

	<div class="header_bottom" style="margin-bottom: -20px">

		
			 <div class="header_bottom_right_images" style="width: 1212px;margin-left: 0px">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">

					<ul class="slides">
                        <?php
                        $p=new Slider();
                        $getPr=$p->getSlfrontpage();
                        if ($getPr) {
                        while ($resul=$getPr->fetch_assoc()) {


                        ?>
						<li><img style="height: 250px" src="Admin Panel/Adminstrator/<?php echo $resul['image']; ?>" alt=""/></li>
                        <?php }}?>
				    </ul>

				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>