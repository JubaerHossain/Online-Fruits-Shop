<?php include 'inc/headerall.php';
if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}
?>
<style>
	.cartpage h2{}
	.pag(margin-top: 30px;)
	.pag p{margin-top: 30px;}
	.pag p{
	text-align: center;	color: #17cf5a;font-weight: bold;text-decoration: none;background: #fff;font-size: 20px;border-radius: 10px;}

</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
		    	<h2>Payment</h2>
	    		<table class="tblone">
					<tr>
						<img style="width: 236px;height: 250px;margin-left: 178px;" src="images/offline.png">
						<th width="50%"><a href="offline.php">Offline Pamyment</a></th>
						<img style="width: 236px;height: 250px;margin-left: 393px;" src="images/bk.png">
						<th width="50%"><a href="online.php">Bkash Payment</a></th>
					</tr>
					

				</table>

			</div>

				   <div class="pag">

				   	<a href="cart.php"><p>Back to Cart Page</p></a>
				</div>

    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>