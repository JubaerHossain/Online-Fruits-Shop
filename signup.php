<?php include 'inc/headerall.php'; 

if (Session::get("customerlogin") == true) {
	header("Location:orderdetails.php");
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {
    $loginCustomer = $cmr->customerLogin($_POST);
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
    $addCustomer = $cmr->customerAdd($_POST);
}

?>
 <div class="main">
    <div class="content">
    	 
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php  
    			if (isset($addCustomer)) {
    				echo $addCustomer;
    			}
    		?>
    		<form action="" method="post" >
		   		<table>
		   			<tbody>
						<tr>
							<td>
								<div>
								<input type="text" placeholder="username" name="username" >
								</div>
								
								<div>
								   <input type="text" placeholder="City" name="city" >
								</div>
								
								<div>
									<input type="text" placeholder="Zip-Code" name="zip" >
								</div>
								<div>
									<input type="text" placeholder="E-Mail" name="email" >
								</div>
			    			</td>
			    			<td>
								<div>
									<input type="text" placeholder="Address" name="address" >
								</div>
					    		<div>
									<select id="country" name="country" class="frm-field required">

										<option value="null">Select a City</option>         
										<option value="AF">Dhaka</option>
										<option value="AL">Rajshahi</option>
										<option value="DZ">Chittagong</option>
										<option value="AR">Khulna</option>
										<option value="AM">Barishal</option>
										<option value="AW">Syhlet</option>
										<option value="AU">Rangpur</option>

					         		</select>
							    </div>		        
			
					            <div>
					          		<input type="text" placeholder="Phone" name="phone" >
					            </div>
								  
								<div>
									<input style="width: 96.5%;height: 27px; margin-top: 5px;padding-left: 8px" type="password" placeholder="Password" name="password" >
								</div>

			    			</td>
		    			</tr> 
		    		</tbody>
		    	</table> 
		   		<div class="search"><div><button name="submit" class="grey">Create Account</button></div></div>
		    	<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    	<div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>