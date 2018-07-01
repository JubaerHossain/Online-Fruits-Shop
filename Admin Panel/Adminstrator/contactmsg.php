<?php include '../../classes/Customer.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$ct = new Customer();
$fm = new Format();

if (isset($_GET['shiftId'])) {

	$shiftId = $_GET['shiftId'];
	$informShiftProduct = $ct->informShiftProduct($shiftId);

}

if (isset($_GET['removeId'])) {

	$removeId = $_GET['removeId'];
	$deleteOrder = $ct->contactansdelete($removeId);

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
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Messsage</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	    	

				        <?php  
				            $result = $ct->GetContact();
				            if ($result) {
				                while ($value = $result->fetch_assoc()) {   
				        ?> 

						<tr class="odd gradeX">
							<td><?php echo $value['contactId']; ?></td>
							<td><?php echo $fm->formatDate($value['created_time']); ?></td>
							<td><?php echo $value['username']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['topic']; ?></td>
							<td><?php echo $fm->textShorten($value['msg'],25); ?></td>
							<td><a href="contactAnswer.php?cId=<?php echo $value['contactId']; ?>">Show</a></td>

            
					    <?php
					        }
					    }
					    ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
</script>
<?php include 'inc/footer.php';?>
