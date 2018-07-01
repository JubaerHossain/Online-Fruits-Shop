<?php 
      $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../Helpers/Format.php');
      include_once ($filepath.'/../Database/Database.php');  
?>
<?php
 /**
 * 
 */
 class Product{
 	
 	    private $db;
      private $fm;
      
      function __construct()
      {
            $this->db=new Database();
            $this->fm=new Format();
    
     }

     public function prInsert($post,$file){

     	$pName=$this->fm->validation($post['pName']);
        $pName= mysqli_real_escape_string($this->db->link, $post['pName']);
        $catId=$this->fm->validation($post['catId']);
        $catId= mysqli_real_escape_string($this->db->link, $post['catId']);
        $brId =$this->fm->validation($post['brId']);
        $brId = mysqli_real_escape_string($this->db->link, $post['brId']);
        $body =$this->fm->validation($post['body']);
        $body = mysqli_real_escape_string($this->db->link, $post['body']);
        $price=$this->fm->validation($post['price']);
        $price= mysqli_real_escape_string($this->db->link, $post['price']);
        $typ  =$this->fm->validation($post['typ']);
        $typ  = mysqli_real_escape_string($this->db->link, $post['typ']);

        // image 
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;

    //validation 

    if ($pName == "" || $catId=="" || $brId=="" || $body=="" || $price=="" ||  $typ=="" || $file_name=="") {

    	 $csms="<span class='error'>Fields must not be empty </span>";
            return $csms;
    }
     if (empty($file_name)) {
     echo "<span class='error'>Please Select any Image !</span>";
    }elseif ($file_size >10048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    else{
    	move_uploaded_file($file_temp, $uploaded_image);
        $query="INSERT INTO tb_product(pName,catId,brId,body,price,image,typ) VALUES('$pName','$catId','$brId','$body','$price','$uploaded_image','$typ')";

        $prinsert=$this->db->insert($query);

            if ($prinsert) {
                  $csms = "<span class='success'>Product Insert successfully</span>";
                  return $csms;
            }else{
                  $csms = "<span class='error'>Product not Insert </span>";
                  return $csms;

            }

    }

     }

     public function getallpr(){

      $query="SELECT p.*, c.caName, b.brName
       FROM tb_product as p,tb_cat as c, tb_brand as b
       WHERE p.catId=c.catId AND p.brId=b.brId

       ORDER BY p.pId DESC";
      $result=$this->db->select($query);
      return $result;


  }
  public function getPrById($id){
    $query="SELECT * FROM tb_product WHERE pId ='$id'";
      $result=$this->db->select($query);
      return $result;


  }
   

  public function delPrById($id){ 
       $imgquery="SELECT * FROM tb_product WHERE pId='$id'";
         $delimg=$this->db->delete($imgquery); 
         if  ($delimg) {         	
         while($delimage=$delimg->fetch_assoc()) {
         	$dellin=$delimage['image'];
          	unlink($dellin);
          } 
      }

       $query="DELETE  FROM tb_product WHERE pId ='$id'";
      $deldata=$this->db->delete($query);     

       if($deldata) {
            $csms = "<span class='success'>Product  Deleted successfully</span>";
                  return $csms;
              }else{

                  $csms = "<span class='error'>Product  not Deleted </span>";
                  return $csms;

              }
  }

  public function prUpdate($post,$file, $id){

    
        $pName= mysqli_real_escape_string($this->db->link, $post['pName']);
        
        $catId= mysqli_real_escape_string($this->db->link, $post['catId']);
       
        $brId = mysqli_real_escape_string($this->db->link, $post['brId']);
        
        $body = mysqli_real_escape_string($this->db->link, $post['body']);
       
        $price= mysqli_real_escape_string($this->db->link, $post['price']);
      
        $typ  = mysqli_real_escape_string($this->db->link, $post['typ']);

        // image 
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 20).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;

    //validation 

     if ($pName == "" || $catId=="" || $brId=="" || $body=="" || $price=="" ||  $typ=="") {

    	 $csms="<span class='error'>Fields must not be empty </span>";
            return $csms;
    }else{
    	if (!empty($file_name)) {
    	
            if (empty($file_name)) {
     			echo "<span class='error'>Please Select any Image !</span>";
   		    }elseif ($file_size >1048567) {
   		       echo "<span class='error'>Image Size should be less then 1MB!
     		</span>";
    		} elseif (in_array($file_ext, $permited) === false) {
     			echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    		else{
    			move_uploaded_file($file_temp, $uploaded_image);      			 

       			 $query="UPDATE tb_product 
                         SET 
                          pName='$pName',
                          catId='$catId',
                          brId='$brId',
                          body='$body',
                          price='$price',
                          image='$uploaded_image',
                          typ='$typ'
                         WHERE pId='$id'";

       			 $updated_row=$this->db->update($query);

            if ($updated_row) {
                  $csms = "<span class='success'>Product update successfully</span>";
                  return $csms;
            }else{
                  $csms = "<span class='error'>Product not update </span>";
                  return $csms;

            }

         }
       }else{
       		 $query="UPDATE tb_product 
                         SET 
                          pName='$pName',
                          catId='$catId',
                          brId='$brId',
                          body='$body',
                          price='$price',                         
                          typ='$typ'

                         WHERE pId='$id'";

       			 $updated_row=$this->db->update($query);

            if ($updated_row) {
                  $csms = "<span class='success'>Product update successfully</span>";
                  return $csms;
            }else{
                  $csms = "<span class='error'>Product not update </span>";
                  return $csms;

            }


       }
      }

     }


     // it will go idex of front view

     public function getFrPr(){


      $query="SELECT * FROM tb_product WHERE typ='0' ORDER BY pId DESC LIMIT 34";
      $result=$this->db->select($query);
      return $result;
    }

    // pages fruits strating

   public function getAllProd($id){
         $query="SELECT b.*,s.caName
       FROM tb_product  as b,tb_cat as s
       WHERE b.catId=s.catId AND s.catId='$id' ORDER BY b.pId DESC";
         $result=$this->db->select($query);
         return $result;


     }
     public function getAllProdName($id){
         $query="SELECT b.*,s.caName
       FROM tb_product  as b,tb_cat as s
       WHERE b.catId=s.catId AND s.catId='$id' ORDER BY b.pId DESC";
         $result=$this->db->select($query);
         return $result;


     }

    public function getFFrPr(){


      $query="SELECT * FROM tb_product WHERE typ='1' ORDER BY pId DESC LIMIT 34";
      $result=$this->db->select($query);
      return $result;
    }

    public function getNPr(){

      $query="SELECT * FROM tb_product ORDER BY pId DESC LIMIT 80";
      $result=$this->db->select($query);
      return $result;

       }
       public function Getpage(){

      $query="SELECT * FROM tb_product";
      $result=$this->db->select($query);
      $total=mysqli_num_rows($result);
      $row=30;
      //$page=$_REQUEST['p'];
      //$page=$page-1;
      //$p=$page * $row;
      //$q="SELECT * FROM tb_product LIMIT ".$p.",";
      //return $q;

       }

       //details single product 
       public function getSinlgepro($id){

        $query="SELECT p.*, c.caName, b.brName
       FROM tb_product as p,tb_cat as c, tb_brand as b
       WHERE p.catId=c.catId AND p.brId=b.brId AND p.pId='$id'";
       
      $result=$this->db->select($query);
      return $result;

       }  



       public function getOfPr1(){


      $query="SELECT * FROM tb_product WHERE brId='6' ORDER BY pId DESC LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
     
     public function getOfPr2(){


      $query="SELECT * FROM tb_product WHERE brId='1' ORDER BY pId DESC LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }

    public function getOfPr3(){


      $query="SELECT * FROM tb_product WHERE brId='7' ORDER BY pId DESC LIMIT 4";
      $result=$this->db->select($query);
      return $result;

    }


    public function getProductByCategory($id)
  {
    
    $query ="SELECT * FROM tb_product WHERE catId = '$id' ORDER BY pId ASC ;";
    $result = $this->db->select($query);
    return $result;
  }

  public function SearchAndOutput($search){
    // $search= mysqli_real_escape_string($this->db->link,$search);
     $query ="SELECT * FROM tb_product WHERE pName LIKE '%$search%' ORDER BY pId ASC ;";
    $result = $this->db->select($query);
    
    return $result;
  }


  

     
     
 }
?>