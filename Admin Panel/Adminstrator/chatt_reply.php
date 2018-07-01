<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../../classes/Customer.php';?>
<?php
if (!isset($_GET['cid']) || $_GET['cid']==NULL) {
    echo "<script>window.location='contactmsg.php';</srcipt>";
 }else{
    
    $id = preg_replace('/[^A-Za-z0-9_-]+/', '-', $_GET['cid']);
 }
$al=new Customer();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    

$to = 'jubaer0001@gmail.com';
$name="Online Fruits";

$mail_from = $_POST['email'];
   $subject = 'Message sent from website';
   $message = $_POST['text'];

$header = "From: $name <$mail_from>";

   // Send it
   $sent = mail($to, $subject, $message, $header);
   if($sent) {
   echo 'Your message has been sent successfully!';
   } else {
   echo 'Sorry, your message could not send.';
   }
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
                <form action="" method="post">
                    <table>
                        <tr>

                    <?php

                    $getques=$al->GetQuesEmail($id);

                        if ($getques) {
                            while ($value = $getques->fetch_assoc()) {  



                     ?>
                            <td>
                                From: <input type="email" readonly="" name="email" Value="<?php echo $value['email']; ?>" />
                            </td>
                            <?php }}?>
                        </tr>
                        <tr>
                            <td>
                                <textarea style="width: 344%;height: 200px" type="text" name="text" placeholder="Enter Category Name..." class="medium" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="reset" name="reset" Value="reset" />
                            </td>

                            <td>  </td>
                            <td>
                                <input type="submit" name="submit" Value="Sent" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>