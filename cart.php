<?php include 'inc/header.php';

if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}


if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
    $quantity = $_POST['quantity'];
    $cartId = $_POST['cartId'];

    if ($quantity <= 0 ) {
        $ct->deletcartById($cartId);
    }else{
        $updateQuantity = $ct->quantityUpdate($quantity,$cartId);
    }
}


if (isset($_GET['delcartId'])) {
    $id = $_GET['delcartId'];
    $id = mysqli_real_escape_string($db->link,$id);
    $ct->deletcartById($id);
}


?>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2 style="box-shadow: 2px 2px 2px 2px #68AE00;width: 175px">Your Cart</h2>
                    <?php
                    if (isset($updateQuantity)) {
                        echo $updateQuantity;
                    }
                    ?>
                    <table class="tblone">
                        <tr>
                            <th width="5%">Serial</th>
                            <th width="20%">Product Name</th>
                            <th width="10%">Image</th>
                            <th width="15%">Price</th>
                            <th width="25%">Quantity</th>
                            <th width="20%">Total Price</th>
                            <th width="10%">Action</th>
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
                                        <form action="" method="post">
                                            <input type="hidden" name="cartId" value="<?php echo $value['cartId']; ?>"/>
                                            <input type="number" name="quantity" value="<?php echo $value['quantity']; ?>"/>
                                            <input type="submit" name="submit" value="Update"/>
                                        </form>
                                    </td>
                                    <td>Tk.
                                        <?php
                                        echo ($value['price']*$value['quantity']);
                                        ?>
                                    </td>
                                    <td><a onclick = "return confirm('Sir Are you want to sure delete this Brand')"; href="?delcartId=<?php echo $value['cartId']; ?>">X</a></td>
                                </tr>

                                <?php
                            }
                        }

                        Session::set("total",$total);
                        Session::set("quan",$quan);
                        ?>

                    </table>
                    <?php

                    if ($result == null) {
                        header("Location:index.php");
                    }
                    elseif ($result != null) {

                        ?>
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
                    <?php } ?>
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="index.php"> <img style="height: 100px" src="images/shop.png" alt="" /></a>
                    </div>
                    <div class="shopright">
                        <a href="payment.php"> <img style="height: 100px" src="images/check.png" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>