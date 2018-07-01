<?php include 'inc/headerall.php';

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

    $insertPr=$cmr->Coninsert($_POST);
}
?>


 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Online Service</h3>
  					<?php  
    			if (isset($insertPr)) {
    				echo $insertPr;
    			}
    		?>
  				</div>

  			
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form action="" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE NO</label></span>
						    	<span><input type="text" name="mobile" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea type="text" name="text"> </textarea></span>
						    </div>
						   <div>
						   		<span><input name="submit" type="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>R-01,H-01,Mohammadpur,</p>
						   		<p>1207,Dhaka</p>
						   		<p>Bangladesh</p>
				   		<p>Phone:01764824777</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>OnlineFruitshops@.com</span></p>
				   		<p>Follow on: <a href="https://www.facebook.com/Online-fruit-shop-1680045815412182/" target="_blank"><span>Facebook</span></a>, <a href="https://twitter.com/OnlineFruitShop" target="_blank"><span>Twitter</span><a></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php';?>