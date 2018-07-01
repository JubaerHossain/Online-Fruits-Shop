<?php  
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../Database/Database.php');
include_once ($filepath.'/../helpers/Format.php'); 
/**
* Cart class
*/
class Cartb{
  private $db;
  private $fm;
  
  function __construct()
  {
    $this ->db = new Database();
    $this ->fm = new Format();
  }

  public function addToCart($quantity,$id)
  {
    
    $quantity  = $this->fm->validation($quantity);
    $pId = $this->fm->validation($id);

    $quantity  = mysqli_real_escape_string($this->db->link,$quantity);
    $productId = mysqli_real_escape_string($this->db->link,$pId);

    $seId     = session_id();

    $query     = " SELECT * FROM tb_product WHERE pId = '$productId' ;";
    $result    = $this->db->select($query);
    $value     = $result->fetch_assoc();

    $pName = $value['pName'];
    $price       = $value['price'];
    $image       = $value['image']; 

    $checkDuplicateProduct     = " SELECT * FROM tb_cart WHERE pId = '$productId' AND seId = '$seId' ;";
    $result    = $this->db->select($checkDuplicateProduct);

    if ($result != false) {

      $msg = "<span class='error' >This Product Already Added To The Cart !</span>";
      return $msg ;
      
    } else {
      
      $query = "INSERT INTO tb_cart (seId,pId,pName,price,quantity,image)
          VALUES ('$seId','$pId','$pName','$price','$quantity','$image');";
      $result = $this->db->insert($query);
      if ($result != false) {
        header("Location:cart.php");
      }else{
        header("Location:index.php");
      }

    }

  }

  public function getBuytoCt()
  {
    $seId      = session_id();
    $query     = " SELECT * FROM tb_cart WHERE seId = '$seId'  ;";
    $result    = $this->db->select($query);
    return $result;
  }



  public function getCart()
  {
    $seId     = session_id();
    $query     = " SELECT * FROM tb_cart WHERE seId = '$seId'  ;";
    $result    = $this->db->select($query);
    return $result;
  }


  public function getOrderAll($customerId)
  {
    $query     = " SELECT * FROM tb_order WHERE customerId = '$customerId';";
    $result    = $this->db->select($query);
    return $result;
  }


  public function deletcartById($id)
  {
    
    $query  = "DELETE FROM tb_cart WHERE cartId = '$id' ";
    $result = $this->db->delete($query);
    return $result;
  }

  public function updateCartandquan($quantity,$cartId)
  {
    
    $quantity  = $this->fm->validation($quantity);
    $cartId    = $this->fm->validation($cartId);

    $quantity  = mysqli_real_escape_string($this->db->link,$quantity);
    $cartId    = mysqli_real_escape_string($this->db->link,$cartId);

    $query  = "UPDATE tb_cart SET quantity='$quantity' WHERE cartId = '$cartId';";
    $result = $this->db->update($query);
    if ($result != false) {
      header("Location:cart.php");
    }else{
      $msg = "<span class='error' >Quantity Not Updated Successfully !</span>";
      return $msg ;
    }

  }

  public function logoutDeleteCart()
  {
    $seId  = session_id();
    $query  = "DELETE FROM tb_cart WHERE seId = '$seId' ";
    $this->db->delete($query);
  }

  public function insertOrder($customerId)
  {

    $cId       = $customerId;


    $seId     = session_id();
    $query     = " SELECT * FROM tb_cart WHERE seId = '$seId' ;";
    $result    = $this->db->select($query);


    if ($result) {
      while ($value = $result->fetch_assoc()) {

        $pId   = $value['pId'];
        $pName = $value['pName']; 
        $price       = $value['price'];
        $image       = $value['image']; 
        $quantity    = $value['quantity'];





        $query = "INSERT INTO tb_order (customerId,pId,pName,price,quantity,image)
        VALUES ('$cId','$pId','$pName','$price','$quantity','$image')";
        $this->db->insert($query);

      }

    }
  }

  public function getOrderTotalPaymaent($customerId)
  {
    
    $query     = " SELECT * FROM tb_order WHERE customerId = '$customerId' AND date = now() ;";
    $result    = $this->db->select($query);
    return $result;
  }

  

  public function pdfInsert($file)
  {

    $permited  = array('pdf');
      $file_name = $file['pdf']['name'];
      $file_size = $file['pdf']['size'];
      $file_temp = $file['pdf']['tmp_name'];

      //$div = explode('.', $file_name);
      // $file_ext = strtolower(end($div));
      // $unique_pdf = substr(md5(time()), 0, 10).'.'.$file_ext;
      $uploaded_pdf = "pdf/".$file_name;



      move_uploaded_file($file_temp, $uploaded_pdf);
    $query = "INSERT INTO tb_pdf (path)
          VALUES ('$uploaded_pdf');";
    $result = $this->db->insert($query);
    if ($result != false) {
      $msg = "<span class='success' >Data Inserted Successfully !</span>";
      return $msg ;
    }else{
      $msg = "<span class='error' >Data Not Inserted Successfully !</span>";
      return $msg ;
    }


  }

  public function getPdfAll()
  {
    
    $query     = " SELECT * FROM tb_pdf;";
    $result    = $this->db->select($query);
    return $result;
  }



  public function getOrderAllforAdminPane()
  {
    $query     = " SELECT * FROM tb_order ORDER BY date DESC";
    $result    = $this->db->select($query);
    return $result;
  }

  public function informShiftProduct($shiftId)
  {

    $shiftId  = $this->fm->validation($shiftId);
    $shiftId = mysqli_real_escape_string($this->db->link,$shiftId);



    $query  = "UPDATE tb_order SET status ='1' WHERE orderId = '$shiftId'";
    $result = $this->db->update($query);
    if ($result != false) {
      $msg = "<span class='error' >Product has been shifted !</span>";
      return $msg ;
    }
  }

  public function customerConfirm($confirmId)
  {
    

    $confirmId  = $this->fm->validation($confirmId);
    $confirmId = mysqli_real_escape_string($this->db->link,$confirmId);



    $query  = "UPDATE tb_order SET status ='2' WHERE orderId = '$confirmId';";
    $result = $this->db->update($query);
    if ($result != false) {
      $msg = "<span class='error' >Confirmation send !</span>";
      return $msg ;
    }


  }

  public function deleteOrder($removeId)
  {
    
    $query  = "DELETE FROM tb_order WHERE orderId = '$removeId' ";
    $result = $this->db->delete($query);
    if ($result != false) {
      $msg = "<span class='error' >Order deleted !</span>";
      return $msg ;
    }else{
      $msg = "<span class='error' >Order not deleted !</span>";
      return $msg ;
    }
  }

  public function quantityUpdate($quantity,$cartId)
  {
    
    $quantity  = $this->fm->validation($quantity);
    $cartId    = $this->fm->validation($cartId);

    $quantity  = mysqli_real_escape_string($this->db->link,$quantity);
    $cartId    = mysqli_real_escape_string($this->db->link,$cartId);

    $query  = "UPDATE tb_cart SET quantity='$quantity' WHERE cartId = '$cartId';";
    $result = $this->db->update($query);
    if ($result != false) {
      header("Location:cart.php");
    }else{
      $msg = "<span class='error' >Quantity Not Updated Successfully !</span>";
      return $msg ;
    }

  }


}
?>