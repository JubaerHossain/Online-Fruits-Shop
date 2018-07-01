<?php include 'inc/headerall.php';
if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}


if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {
    $loginCustomer = $cmr->customerLogin($_POST);
}

?>

<style>
	.cartpage h2 {
	text-align: center;
	margin-bottom: 80px;
width: 1180px;
  }
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <h2>Profile</h2>
			    	
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
							<td><a href="editprofile.php?customerId=<?php echo $value['customerId']; ?>">Edit Profile</a></td>
						</tr>
					</table>
					<?php 
						} 
					} 
					?>
			</div>
    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>