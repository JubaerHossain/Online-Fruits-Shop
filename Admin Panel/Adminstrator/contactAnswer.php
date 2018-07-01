<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Customer.php';?>
<?php

if (!isset($_GET['cId']) || $_GET['cId']==NULL) {
    echo "<script>window.location='contactmsg.php';</srcipt>";
 }else{
    
    $id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['cId']);
 }
$al=new Customer();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $caName=$_POST['caName'];

    $insertcat=$al->catInsert($caName);
}

?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>New User</h2>
            <div class="block copyblock">
                <?php
                if(isset($insertcat)){
                    echo $insertcat;
                }
                ?>
                <form action="catadd.php" method="post">

                    <?php

                    $getques=$al->GetallQuesPerId($id);

                        if ($getques) {
                            while ($value = $getques->fetch_assoc()) {  



                     ?>
                    <table>
                        <tr>
                            <td>
                               Name : <?php echo $value['username']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Email : <?php echo $value['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Mobile : <?php echo $value['topic']; ?>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                Question: <?php echo $value['msg']; ?>
                            </td>
                        </tr>
                        <tr>
                            

                            <td>  </td>
                            <td>
                                <button><a href="chatt_reply.php?cid=<?php echo $value['contactId']?>">Reply Answer</a></button>
                            </td>
                        </tr>
                    </table>
                    <?php }}?>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>