<?php 
      $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../Helpers/Format.php');
      include_once ($filepath.'/../Database/Database.php');  
?>
<?php
/**
* 
*/
class Cartb{
	
 	 private $db;
    private $fm;  
      
      function __construct()
      {
            $this->db=new Database();
            $this->fm=new Format();
    
     }

     public function addToCart($quantity,$id){

      $quantity=$this->fm->validation($quantity);
      $pId=$this->fm->validation($pId);
      $quantity= mysqli_real_escape_string($this->db->link,$quantity);
      $pId= mysqli_real_escape_string($this->db->link,$pId);
      $seId=session_id();

      $squery="SELECT * FROM tb_product WHERE pId='$pId'";
      $result=$this->db->select($squery)->fetch_assoc(); 
         
      $pName=$result['pName'];
      $price=$result['price'];
      $image=$result['image'];

      $chquery = " SELECT * FROM tbl_cart WHERE pId = '$pId' AND seId = '$seId' ;";
      $getpiresult=$this->db->select($chquery);

      if ($getpiresult != false) {
        
          $t="This Product Already Added To The Cart ";
           return $t;
        
      }else{

       $query="INSERT INTO tb_cart(seId,pId,pName,quantity,price,image) VALUES('$seId','$pId','$pName','$quantity','$price','$image')";

        $insert_row=$this->db->insert($query);

            if ($insert_row) {
                  header("Location:cart.php");
                  
            }else{
                 header("Location:index.php");
            }
        }
     }

     public function getBuytoCt(){
           
         $seId=session_id();
         $squery="SELECT * FROM tb_cart WHERE seId='$seId'";
         $result=$this->db->select($squery);
         return $result;


     }

    public function updateCartandquan($cartId,$quantity){

      $cartId= mysqli_real_escape_string($this->db->link,$cartId);
      $quantity= mysqli_real_escape_string($this->db->link,$quantity);


      $query="UPDATE tb_cart 
              SET 
              quantity='$quantity'
               WHERE cartId='$cartId'";

      $updated_row=$this->db->update($query);
      if ($updated_row) {
        $csms = "<span class='success'> quantity update successfully</span>";
                  return $csms;
      }else{
        $csms = "<span class='error'>quantity not updated </span>";
                  return $csms;

      }

     }

}
?>