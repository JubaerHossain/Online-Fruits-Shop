<?php include 'inc/headerall.php';

if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}

?>
<style>

.de{

	margin-top: 30px;
}
	
.de a{color: red;margin-left: 508px;box-shadow: 0px 0px 2px 2px #33c50f;padding: 6px}

.sho{margin-top: 40px;}
.sho img{margin-left: 450px;}

.cartpage h2 {
	text-align: center;
  }
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
		    	<h2 style="width: 100%; text-align: center;" >Order Successful</h2>
		    	<p style=" color: green;margin-left: 467px;">Thank you for purchasing !!</p>
		    	<p style="color: #ea0e0e;margin-left: 467px;margin-top: 15px;">Total amount including vat = 
		        <?php
		        	$customerId = Session::get("customerId");
		            $result = $ct->getOrderTotalPaymaent($customerId);
		            $total = 0;
		            $quan  = 0;
		            if ($result) {
		                while ($value = $result->fetch_assoc()) {   
						$temp = $value['price']*$value['quantity'];
						$total = $total + $temp ;
			        }
			    } 
			    echo (($total/10)+$total);
		        ?>
		    	</p>
		    	<div class="de">
		    	<a href="orderdetails.php">View Details</a>
		        </div>
			</div>
			<div class="sho">
							<a href="index.php"> <img src="images/conti.png" alt="" /></a>
						</div>
    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>