<?php include '../../classes/Customer.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
 
$cmr = new Customer();

if (!isset($_GET['customerId']) || $_GET['customerId'] == NULL ) {
    echo "
        <script>
            window.location = 'inbox.php';
        </script>
    ";
}else{

    $customerId = $_GET['customerId'];

}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Information</h2>
               <div class="block copyblock"> 

                    <?php
                        $result = $cmr->getCustomerInfo($customerId);
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {   
                    ?> 

                    <table class="tblone">
                        <tr>
                            <th>Information Name</th>
                            <th>Details</th>
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
                            <td><a href="inbox.php">Back</a></td>
                        </tr>
                    </table>
                    <?php 
                        } 
                    } 
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>