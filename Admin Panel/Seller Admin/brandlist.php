<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Brand.php';?>
<?php
$Br=new Brand();
 if (isset($_GET['delbr'])) {
 	$id=$_GET['delbr'];
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['delbr']);
 	$delBr=$Br->delBrById($id);
 }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">   

                <?php

                 if (isset($delBr)) {
                 	echo $delBr;
                 }
                ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
                     $getbr=$Br->getallBr();
                     if ($getbr) {
                     	$i=0;
                     	while($result=$getbr->fetch_assoc()){
                     		$i++;
                     
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brName']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brId']; ?>">Edit</a> || <a onclick="return confirm('are you want to delete!')" href="?delbr=<?php echo $result['brId']; ?>">Delete</a></td>
						</tr>
						
					<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

