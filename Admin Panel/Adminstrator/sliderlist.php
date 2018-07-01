<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../classes/Slider.php';?>
<?php
$cat=new Slider();
if (isset($_GET['delcat'])) {
    $id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['delcat']);
    $delCat=$cat->delSliderById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            <?php
            $getcat=$cat->getallSlider();
            if ($getcat) {
            $i=0;
            while($result=$getcat->fetch_assoc()){
            $i++;

            ?>

				<tr class="odd gradeX" style="height: 72px">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['slName']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" style="margin-bottom: -17px;padding-top: 17px;"/></td>

                    <td><a href="slideredit.php?sld=<?php echo $result['slD']; ?>">Edit</a> ||
                        <a onclick="return confirm('are you want to delete!')" href="?delcat=<?php echo $result['slD']; ?>">Delete</a>
                    </td>
					</tr>
            <?php }}?>
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
