<?php 
      $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../Helpers/Format.php');
      include_once ($filepath.'/../Database/Database.php');  
?>
<?php
 /**
 * Category class
 */
 class Category{


      private $db;
      private $fm;
      
      function __construct()
      {
            $this->db=new Database();
            $this->fm=new Format();
      }

      public function catInsert($caName){

       $caName=$this->fm->validation($caName);
       $caName= mysqli_real_escape_string($this->db->link,$caName);
       if (empty($caName)) {
            $csms="<span class='error'>Categoty must not be empty </span>";
            return $csms;
       }else{
            $query="INSERT INTO tb_cat(caName) VALUES('$caName')";
            $catinsert=$this->db->insert($query);

            if ($catinsert) {
                  $csms = "<span class='success'>Categoty Insert successfully</span>";
                  return $csms;
            }else{
                  $csms = "<span class='error'>Categoty not Insert </span>";
                  return $csms;

            }
       }
       
 }

  public function getallcat(){
      $query="SELECT * FROM tb_cat ORDER BY catId DESC";
      $result=$this->db->select($query);
      return $result;


  }
  public function getallcatForFront(){
      $query="SELECT * FROM tb_cat ORDER BY catId ASC";
      $result=$this->db->select($query);
      return $result;


  }

  public function getCatById($id){
    $query="SELECT * FROM tb_cat WHERE catId ='$id'";
      $result=$this->db->select($query);
      return $result;


  }

  public function catUpdate($caName,$id){

    $caName=$this->fm->validation($caName);
       $caName= mysqli_real_escape_string($this->db->link,$caName);
       $id= mysqli_real_escape_string($this->db->link,$id);
       if (empty($caName)) {
            $csms="<span class='error'>Categoty must not be empty </span>";
            return $csms;

     }else{
      $query="UPDATE tb_cat 
              SET 
              caName='$caName'
               WHERE catId='$id'";

      $updated_row=$this->db->update($query);
      if ($updated_row) {
        $csms = "<span class='success'> Categoty update successfully</span>";
                  return $csms;
      }else{
        $csms = "<span class='error'>Categoty not updated </span>";
                  return $csms;

      }
     }
  }
  public function delCatById($id){ 
       $query="DELETE  FROM tb_cat WHERE catId ='$id'";
      $deldata=$this->db->delete($query);     

       if($deldata) {
            $csms = "<span class='success'>Categoty  Deleted successfully</span>";
                  return $csms;
              }else{

                  $csms = "<span class='error'>Categoty  not Deleted </span>";
                  return $csms;

              }
  }


    public function getProductByCategory($id)
  {
    
    $query ="SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY pId ASC ;";
    $result = $this->db->select($query);
    return $result;
  }
}
?>