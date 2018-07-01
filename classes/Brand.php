<?php 
      $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../Helpers/Format.php');
      include_once ($filepath.'/../Database/Database.php');  
?>
<?php
/**
* 
*/
class Brand{
	
	   private $db;
      private $fm;
      
      function __construct()
      {
            $this->db=new Database();
            $this->fm=new Format();
      }

      public function BrandInsert($brName){

       $brName=$this->fm->validation($brName);
       $brName= mysqli_real_escape_string($this->db->link,$brName);
       if (empty($brName)) {
            $csms="<span class='error'>Brand must not be empty </span>";
            return $csms;
       }else{
            $query="INSERT INTO tb_brand(brName) VALUES('$brName')";
            $brandinsert=$this->db->insert($query);

            if ($brandinsert) {
                  $csms = "<span class='success'>Brand Insert successfully</span>";
                  return $csms;
            }else{
                  $csms = "<span class='error'>Brand not Insert </span>";
                  return $csms;

            }
       }
       
 }
  public function getallBr(){
      $query="SELECT * FROM tb_brand ORDER BY brId DESC";
      $result=$this->db->select($query);
      return $result;


  }

  public function getBrById($id){
    $query="SELECT * FROM tb_brand WHERE brId ='$id'";
      $result=$this->db->select($query);
      return $result;


  }

  public function brandUpdate($brName,$id){

    $brName=$this->fm->validation($brName);
       $brName= mysqli_real_escape_string($this->db->link,$brName);
       $id= mysqli_real_escape_string($this->db->link,$id);
       if (empty($brName)) {
            $csms="<span class='error'>Brand must not be empty </span>";
            return $csms;

     }else{
      $query="UPDATE tb_brand 
              SET 
              brName='$brName'
               WHERE brId='$id'";

      $updated_row=$this->db->update($query);
      if ($updated_row) {
        $csms = "<span class='success'> Brand update successfully</span>";
                  return $csms;
      }else{
        $csms = "<span class='error'>Brand not updated </span>";
                  return $csms;

      }
     }
  }
  public function delBrById($id){ 
       $query="DELETE  FROM tb_brand WHERE brId ='$id'";
      $deldata=$this->db->delete($query);     

       if($deldata) {
            $csms = "<span class='success'>Brand  Deleted successfully</span>";
                  return $csms;
              }else{

                  $csms = "<span class='error'>Brand  not Deleted </span>";
                  return $csms;

              }
  }
}
?>