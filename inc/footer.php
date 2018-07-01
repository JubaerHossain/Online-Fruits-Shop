</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4" style="width: 13.5%; padding: 2.5%; padding-left: 0px;border-right: 0px groove #555;">
						<h4>Information</h4>
						<ul>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="vision.php">Our Vision</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4" style="width: 16.5%; padding: 2.5%; padding-left: 0px;border-right: 0px groove #555;">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="orderdetails.php">Order History</a></li>
						<li><a href="privacy.php">Privacy Policy</a></li>
						<li><a href="return.php">Return Policy</a></li>
						<li><a href="delivery.php">Delivery Policy</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4" style="width: 13.5%; padding: 2.5%; padding-left: 0px;border-right: 0px groove #555;">
					<h4>My account</h4>
						<ul>
                            <li><a href="profile.php">My Account</a></li>
							<li><a href="signup.php">Sign In</a></li>
							<li><a href="contact.php">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4" style="width: 13.5%; padding: 2.5%; padding-left: 0px;border-right: 0px groove #555;">
					<h4>Contact</h4>
						<ul>
                            <h6>Mohammadpur</h6>
                            <li>Dhaka,1207</li><br>
							<li>+88-01764824777</li>
							<li>+88-01967352209</li>
                            <li><a href="">OnlineFruitshops@gmail.com</a></li>
						</ul>
                </div>
						<div class="social-icons col_1_of_4 span_1_of_4" style="width: 16%; padding: 2.5%; padding-left: 62px;border-right: 0px groove #555;">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://www.facebook.com/Online-fruit-shop-1680045815412182/" target="_blank"> </a></li>
							      <li class="twitter"><a href="https://twitter.com/OnlineFruitShop" target="_blank"> </a></li>
							      <li class="googleplus"><a href="https://plus.google.com/111698292920507088043" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>

				</div>
			</div>
			<div class="copy_right">
				<p>Online Fruits &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
