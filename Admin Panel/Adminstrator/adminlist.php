<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/AdminLogin.php';?>
<?php include_once'../../Helpers/Format.php';?>
<?php
   $prfm=new Format();
  $prl=new Admin();
 if (isset($_GET['delpr'])) {
 	$id=$_GET['delpr'];
 	$id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['delpr']);
 	$delPr=$prl->delPrById($id);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Seller List</h2>
        <div class="block">

                <?php

                 if (isset($delPr)) {
                 	echo $delPr;
                 }
                ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Admin No</th>
					<th>Admin Name</th>
					<th>E-mail</th>
					<th>Phone</th>
					<th>Passwaord</th>
					
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
					<td style="padding: 11px"><?php echo $i; ?></td>
					<td style="padding: 11px"><?php echo $result['alName']; ?></td>
					<td style="padding: 11px"><?php echo $result['alEmail']; ?></td>
					<td style="padding: 11px"><?php echo $result['phone']; ?></td>
					<td style="padding: 11px"><?php echo $result['alPass']; ?></td>

					<td style="padding: 11px"><a href="adminedit.php?ptid=<?php echo $result['adminID']; ?>"><i style="font-size: 27px;color: #28c78d" class="fas fa-edit"></i></a> || <a onclick="return confirm('are you want to delete!')" href="?delpr=<?php echo $result['adminID']; ?>"><i style="color: #28c78d;font-size: 27px;" class="fas fa-trash-alt"></i>

                        </a></td>
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
