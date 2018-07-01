<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Product.php';?>
<?php include_once'../../Helpers/Format.php';?>
<?php
   $prfm=new Format();
  $prl=new Product();
 if (isset($_GET['delpr'])) {
 	$id=$_GET['delpr'];
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['delpr']);
 	$delPr=$prl->delPrById($id);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">

                <?php

                 if (isset($delPr)) {
                 	echo $delPr;
                 }
                ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL No</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Offers</th>
					<th style="width: 260px">Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
                     $getpr=$prl->getallpr();
                     if ($getpr) {
                     	$i=0;
                     	while($result=$getpr->fetch_assoc()){
                     		$i++;
                     
					?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['pName']; ?></td>
					<td><?php echo $result['caName']; ?></td>
					<td><?php echo $result['brName']; ?></td>
					<td><?php echo $prfm->textShorten($result['body'],50); ?></td>
					<td>Tk<?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="50px"/></td>

					<td>
					<?php 
				        if ($result['typ']==0) {
				        		echo "Featured";
				        	}else{
				        		echo "General"; 
				        	}
					?>
						
					</td>
					<td><a href="productedit.php?prtid=<?php echo $result['pId']; ?>">Edit</a> ||
                        <a onclick="return confirm('are you want to delete!')" href="?delpr=<?php echo $result['pId']; ?>">Delete</a></td>
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
