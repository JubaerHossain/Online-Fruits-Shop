<?php include 'inc/headerall.php';
if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}

if (isset($_GET['confirmId'])) {

	$confirmId = $_GET['confirmId'];
	$customerConfirm = $ct->customerConfirm($confirmId);

}

if (isset($_GET['removeId'])) {

	$removeId = $_GET['removeId'];
	$deleteOrder = $ct->deleteOrder($removeId);

}


?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">
    		<div class="cartpage">
    			<h2 style="width: 100%;" >Order Details</h2>
    			<?php  
    				if (isset($customerConfirm)) {
			        	echo $customerConfirm;
			        }  
    				if (isset($deleteOrder)) {
			        	echo $deleteOrder;
			        }
    			?>
				<table class="tblone">
					<tr>
						<th width="5%">Serial</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="25%">Quantity</th>
						<th width="15%">Price</th>
						<th width="20%">Date</th>
						<th width="20%">Status</th>
						<th width="10%">Action</th>
					</tr>
	    	

			        <?php  
			        	$customerId = Session::get("customerId");
			            $result = $ct->getOrderAll($customerId);
			            $i = 0;
			            if ($result) {
			                while ($value = $result->fetch_assoc()) {   
			                	$i++;  
			        ?> 

					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['pName']; ?></td>
						<td><img src="Admin Panel/Adminstrator/<?php echo $value['image']; ?>" ></td>

						<td><?php echo $value['quantity']; ?></td>
						<td>Tk. <?php echo $value['price']; ?></td>
						<td><?php echo $fm->formatDate($value['date']); ?></td>
						<td>
							<?php  
								$status = $value['status'];
								if ($status == 0) {
									echo "Panding";
								}elseif ($status == 1) {
									echo "Shifted";
								}elseif ($status == 2) {
									echo "Delete";
								}
							?>
						</td>
						<?php  
							if ($status == 0) {
						?>
						<td><a onclick = "return confirm('This product have not Shifted yet')"; href="">N\A</a></td>
						<?php 
							}
							elseif ($status == 1) {
						?>
						<td><a href="?confirmId=<?php echo $value['orderId']; ?>">Confirm</a></td>
						<?php 
							}
							elseif ($status == 2) {
						?>
						<td><a onclick = "return confirm('Sir Are you want to sure delete this Brand')"; href="?removeId=<?php echo $value['orderId']; ?>">X</a></td>
						<?php 
							}
						?>
					</tr>
            
				    <?php
				        }
				    }
				    ?>
				</table>
    		</div>
    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>

<a onclick = "return confirm('This product not Shifting yet !')"; href="">N/A</a>