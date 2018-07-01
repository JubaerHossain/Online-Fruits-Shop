<?php include '../../classes/cartb.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

$ct = new Cartb();
$fm = new Format();

if (isset($_GET['shiftId'])) {

    $shiftId = $_GET['shiftId'];
    $informShiftProduct = $ct->informShiftProduct($shiftId);

}

if (isset($_GET['removeId'])) {

    $removeId = $_GET['removeId'];
    $deleteOrder = $ct->deleteOrder($removeId);

}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php

                if (isset($informShiftProduct)) {
                    echo $informShiftProduct;
                }

                if (isset($deleteOrder)) {
                    echo $deleteOrder;
                }

                ?>
                <div class="block">
                    <table class="data display datatable" id="example">
                        <thead>
                        <tr>
                            <th>orderId</th>
                            <th>Date & Time</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>CustomerId</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        $result = $ct->getOrderAllforAdminPane();
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $value['orderId']; ?></td>
                                    <td><?php echo $fm->formatDate($value['date']); ?></td>
                                    <td><?php echo $value['pName']; ?></td>
                                    <td><?php echo $value['quantity']; ?></td>
                                    <td><?php echo $value['price']; ?></td>
                                    <td><?php echo $value['customerId']; ?></td>
                                    <td><a href="customerinfo.php?customerId=<?php echo $value['customerId']; ?>">Show Address</a></td>

                                    <?php
                                    if ($value['status'] == 0 ) {
                                        ?>
                                        <td>Pending</td>
                                        <?php
                                    }
                                    elseif ($value['status'] == 1 ) {
                                        ?>
                                        <td>Shifted</td>
                                        <?php
                                    }
                                    elseif ($value['status'] == 2 ) {
                                        ?>
                                        <td>Confirmed</td>
                                        <?php
                                    }
                                    ?>







                                    <?php
                                    if ($value['status'] == 0 ) {
                                        ?>
                                        <td><a href="?shiftId=<?php echo $value['orderId']; ?>">Shift</a></td>
                                        <?php
                                    }
                                    elseif ($value['status'] == 1 ) {
                                        ?>
                                        <td>N/A</td>
                                        <?php
                                    }
                                    elseif ($value['status'] == 2 ) {
                                        ?>
                                        <td><a href="?removeId=<?php echo $value['orderId']; ?>">X</a></td>
                                        <?php
                                    }
                                    ?>


                                </tr>

                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>