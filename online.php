<?php include 'inc/headerall.php';

if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}

if ( isset($_GET['orderId']) && $_GET['orderId'] == 'order' ) {
	
	$customerId = Session::get("customerId");
	$insertOrder = $ct->insertOrder($customerId);
	$logoutDeleteCart = $ct->logoutDeleteCart();


	Session::set("total",NULL);
	Session::set("quan",NULL);
	header("Location:success.php");
}

?>
<style type="text/css">
	.order a{
		background-color: red;

		.cartpage h2 {
  font-size: 35px;
width: 179px;
margin-bottom: 65px;}
.content h2 {
    color: #A8138C;
    margin-left: -3px;
    border: 2px solid;
    text-align: center;
    background: #d7d7d6;}
</style>
	
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">
    			
			<div class="cartpage">
		    	<h2 style="width: 100%;" >Product Information</h2>
				<table class="tblone">
					<tr>
						<th width="5%">Serial</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
					</tr>
	    	

			        <?php  
			            $result = $ct->getCart();
			            $i = 0;
			            $total = 0;
			            $quan  = 0;
			            if ($result) {
			                while ($value = $result->fetch_assoc()) {   
			                	$i++;   
							$temp = $value['price']*$value['quantity'];
							$total = $total + $temp ;
							$quan = $quan + $value['quantity'];
			        ?> 

					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['pName']; ?></td>
						<td><img src="Admin Panel/Adminstrator/<?php echo $value['image']; ?>" ></td>
						<td>Tk. <?php echo $value['price']; ?></td>
						<td> 
							<?php 
							echo $value['quantity'];
							?>
							
						</td>
						<td>Tk. 
							<?php 
							echo ($value['price']*$value['quantity']);
							?>
						</td>
						<td></td>
					</tr>
            
				    <?php
				        }
				    }
				    ?>
					
				</table>
				<table style="float:right;text-align:left;" width="40%">
			        <?php
			            $result = $ct->getCart();
			            $total = 0;
			            $quan  = 0;
			            if ($result) {
			                while ($value = $result->fetch_assoc()) {   
							$temp = $value['price']*$value['quantity'];
							$total = $total + $temp ;
				        }
				    } 
			        ?>
					<tr>
						<th>Sub Total : </th>
						<td>TK.  
							<?php
								echo $total;
							?>
						</td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>TK.  
							<?php
								echo (($total/10)+$total);
							?>
						</td>
					</tr>
			    </table>
			</div>
               
               
              

			<div class="cartpage" >
				<h2 style="width: 100%;" >Customer Information</h2>
		    	
		        <?php  
		        	$customerId = Session::get("customerId");
		            $result = $cmr->getCustomerInfo($customerId);
		            if ($result) {
		                while ($value = $result->fetch_assoc()) {   
		        ?> 

	    		<table class="tblone">
					<tr>
						<th width="50%">Information Name</th>
						<th width="50%">Details</th>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo $value['username']; ?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?php echo $value['city']; ?></td>
					</tr>
					<tr>
						<td>Zip-Code</td>
						<td><?php echo $value['zip']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $value['email']; ?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><?php echo $value['address']; ?></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><?php echo $value['country']; ?></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><?php echo $value['phone']; ?></td>
					</tr>

					<tr>
							<td></td>
							<td><a href="editprofile.php?customerId=<?php echo $value['customerId']; ?>">Update Profile</a></td>
						</tr>
				</table>
				<?php 
					} 
				} 
				?>
			</div>
             
             
			    <h2 style="font-size: 35px;margin-left: 7px;">Bkash Payment</h2>
			    	
			        
		    		<table class="tblone">
						<tr>
							<th width="50%">Information</th>
							<th width="50%"></th>
						</tr>
						<tr>
							<td>Bkash no</td>
							<td>01764824777</td>
						</tr>
						<tr>
							<td>Referebce No </td>
							<td>2</td>
						</tr>
						<tr>
							<td>Counter No </td>
							<td>1</td>
						</tr>
						<tr>
							<td>Trasaction ID</td>
							<td><input type="" name="username" placeholder="5BK4YMLDQI" ></td>
						
						
					</table>


    	</div>

<div class="cartpage" ><a href="?orderId=order" style="width: 300px;background-color:#0d7b06;text-align: center;padding: 15px 25px;color: white;margin-left: 600px;  box-shadow: 1px 2px 2px 2px saddlebrown;border-radius: 34px;" >Order Now</a></div>


    </div>
     



 </div>
<?php include 'inc/footer.php'; ?>