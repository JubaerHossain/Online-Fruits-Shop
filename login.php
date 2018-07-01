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
    	 <div class="login_panel">
        	<h3>Sign In Customers</h3>
        	
        	
    		<?php  
    			if (isset($loginCustomer)) {
    				echo $loginCustomer;
    			}
    		?>

        	<form action="" method="post">
                	<input name="email" type="text" placeholder="E-Mail" >
                    <input name="password" type="password" placeholder="Password" >
                    <div class="buttons"><div><button name="login" class="grey">Login</button></div></div>
            </form>

            <p class="note">If you you have no registration please sign up here  <a href="signup.php">Sign up</a></p>
                    
        </div>
    	  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>