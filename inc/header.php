<?php
include 'Database/Session.php';
Session::init();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");

include 'Database/Database.php';
include 'Helpers/Format.php'; 

spl_autoload_register(function($class)
{
	include_once "classes/".$class.".php";
});

$db  = new Database();
$fm  = new Format();
$pd  = new Product();
$ct  = new Cartb();
$cat = new Category();
$cmr = new Customer();


               
if (isset($_GET['action']) && $_GET['action'] == 'customerlogout' ) {
	$ct->logoutDeleteCart();
	Session::customerdestroy();
	header("Location:index.php");
}



                 

?>
<!DOCTYPE HTML>
<head>
<title>Deshi-Fruits</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/sld.css" rel="stylesheet" type="text/css" media="all"/>


<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/fpt.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="get">
				    	<input type="text" placeholder="Search The Products" name="search">
				    	<input type="submit" value="SEARCH" name="submit">
				    </form>
			    </div>

                    	<div class="login">

		   		<?php  
		   			if (Session::get("customerlogin") == false) {
		   				
		   		?>
		   		<a href="login.php">Login</a>
		   		<?php  
		   			}elseif(Session::get("customerlogin") == true){
		   		?>
				<a href="?action=customerlogout">Logout</a>
		   		<?php  
		   			}
		   		?>

		    </div>  

			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title"></span>
								<span class="no_product">

									<?php  

										if (Session::get("total") != false && Session::get("quan") != false) {
											echo "$" .Session::get("total"). ",Qty = " . Session::get("quan");
										}else {
											echo "(empty)";
										}	

									?>

								</span>
							</a>
						</div>
			      </div>
		    
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">



 

	  <li><a href="index.php">Home</a></li>
	  <li><a href="productbycat.php">Products</a> </li>
	  <li><a href="topbrands.php">Offers</a></li>
	  <?php
	  	$checkCart = $ct->getCart();
	  	if ($checkCart) {
	  ?>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="payment.php">Payment</a></li>
	  <?php } ?>
	  <?php
	  	$customerId = Session::get("customerId");
	  	$getOrderAll = $ct->getOrderAll($customerId);
	  	if ($getOrderAll) {
	  ?>
	  <li><a href="orderdetails.php">Order Details</a></li>
	  <?php } ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <?php
	  	if (Session::get("customerlogin") == true) {
	  ?>
	  <li><a href="profile.php">Profile</a> </li>
	  <?php } ?>
	  <div class="clear"></div>
	</ul>
</div>