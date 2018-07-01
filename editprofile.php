<?php include 'inc/headerall.php';
if (Session::get("customerlogin") == false) {
	header("Location:login.php");
}
$brand = new Brand();
if (!isset($_GET['customerId']) || $_GET['customerId'] == NULL ) {
    echo "
        <script>
            window.location = 'index.php';
        </script>
    ";
}else{

    $id = $_GET['customerId'];

}



if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update']) ) {

    $editCustomerInfo = $cmr->editCustomerInfo($_POST,$id);
    
}


?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <h2>Profile</h2>
			    	
			        <?php  

			        	if (isset($editCustomerInfo)) {
			        		echo $editCustomerInfo;
			        	}

			            $result = $cmr->getCustomerInfoById($id);
			            if ($result) {
			                while ($value = $result->fetch_assoc()) {   
			        ?> 
			        <form action="" method="post" >
		    		<table class="tblone">
						<tr>
							<th width="50%">Information Name</th>
							<th width="50%">Details</th>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="" name="username" value="<?php echo $value['username']; ?>" ></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="" name="city" value="<?php echo $value['city']; ?>" ></td>
						</tr>
						<tr>
							<td>Zip-Code</td>
							<td><input type="" name="zip" value="<?php echo $value['zip']; ?>" ></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="" name="email" value="<?php echo $value['email']; ?>" ></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="" name="address" value="<?php echo $value['address']; ?>" ></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type="" name="country" value="<?php echo $value['country']; ?>" ></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="" name="phone" value="<?php echo $value['phone']; ?>" ></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Update" name="update" ></td>
						</tr>
					</table>
					</form>
					<?php 
						} 
					} 
					?>
			</div>
    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>