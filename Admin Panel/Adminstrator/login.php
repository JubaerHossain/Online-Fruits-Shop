<?php
include'../../classes/AdminLogin.php';?>
<?php
$al=new Admin();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $alName=$_POST['alName'];
    $alPass=$_POST['alPass'];

    $loginchk=$al->AdminstratorLogin( $alName, $alPass);
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
    <section id="content">
        <form action="login.php" method="post">
            <h1>Administrator Login</h1>
            <span style="color: red;font-size: 18px">
					<?php
                    if(isset($loginchk)){
                        echo $loginchk;
                    }


                    ?>
				</span>
            <div>
                <input type="text" placeholder="Username"  name="alName"/>
            </div>
            <div>
                <input type="password" placeholder="Password"  name="alPass"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="#">Deshi Fruits </a>
        </div><!-- button -->
    </section><!-- content -->
    <div class="clear">
    </div>

</div><!-- container -->
</body>
</html>