<?php 
       $filepath=realpath(dirname(__FILE__));
       include_once ($filepath.'/../Database/Session.php');   
       Session::checkLogin();     
       include_once ($filepath.'/../Helpers/Format.php');
       include_once ($filepath.'/../Database/Database.php');  
?>
<?php 
/**
* 
*/
class Admin{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}

    public function AdminLogin( $alName, $alPass){

        $alName=$this->fm->validation($alName);
        $alPass=$this->fm->validation($alPass);

        $alName= mysqli_real_escape_string($this->db->link,$alName);
        $alPass= mysqli_real_escape_string($this->db->link,$alPass);
        if (empty($alName) || empty($alPass)) {
            $logsms="fill up ";
            return $logsms;
        }else{
            $query="SELECT * FROM adminadd WHERE alName='$alName' AND alPass='$alPass'";
            $result=$this->db->select($query);
            if ($result !=false) {
                $value=$result->fetch_assoc();
                Session::set("adminlogin",true);
                Session::set("alName",$value['alName']);
                Session::set("alEmail",$value['alEmail']);
                Session::set("alPass",$value['alPass']);
                header("location:dashboard.php");
            }else{
                $logsms="Name and pass not match";

                return $logsms;
            }
        }
    }
    public function AdminstratorLogin( $alName, $alPass){

        $alName=$this->fm->validation($alName);
        $alPass=$this->fm->validation($alPass);

        $alName= mysqli_real_escape_string($this->db->link,$alName);
        $alPass= mysqli_real_escape_string($this->db->link,$alPass);
        if (empty($alName) || empty($alPass)) {
            $logsms="fill up ";
            return $logsms;
        }else{
            $query="SELECT * FROM adminstrator WHERE alName='$alName' AND alPass='$alPass'";
            $result=$this->db->select($query);
            if ($result !=false) {
                $value=$result->fetch_assoc();
                Session::set("adminlogin",true);
                Session::set("alName",$value['alName']);
                Session::set("alEmail",$value['alEmail']);
                Session::set("alPass",$value['alPass']);
                header("location:dashboard.php");
            }else{
                $logsms="Name and pass not match";

                return $logsms;
            }
        }
    }


    /* second admin */

    public function sellerInser($post){

        $alName=$this->fm->validation($post['alName']);
        $alName= mysqli_real_escape_string($this->db->link, $post['alName']);
        $alEmail=$this->fm->validation($post['alEmail']);
        $alEmail= mysqli_real_escape_string($this->db->link, $post['alEmail']);
        $phone =$this->fm->validation($post['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $post['phone']);
        $alPass =$this->fm->validation($post['alPass']);
        $alPass = mysqli_real_escape_string($this->db->link, $post['alPass']);


        //validation

        if ($alName == "" || $alEmail=="" || $phone=="" || $alPass=="") {

            $csms="<span class='error'>Fields must not be empty </span>";
            return $csms;
        }

        $query="INSERT INTO adminadd(alName,alEmail,phone,alPass) VALUES('$alName','$alEmail','$phone','$alPass')";

        $prinsert=$this->db->insert($query);

        if ($prinsert) {
            $csms = "<span class='success'>Seller Admin Insert successfully</span>";
            return $csms;
        }else{
            $csms = "<span class='error'>Seller Admin not Insert </span>";
            return $csms;

        }



    }

     public function delPrById($id){ 
       

       $query="DELETE  FROM adminadd WHERE adminID ='$id'";
      $deldata=$this->db->delete($query);     

       if($deldata) {
            $csms = "<span class='success'>Product  Deleted successfully</span>";
                  return $csms;
              }else{

                  $csms = "<span class='error'>Product  not Deleted </span>";
                  return $csms;

              }
  }


     public function getallpr(){

      $query="SELECT * FROM adminadd ORDER BY adminID ASC";
      $result=$this->db->select($query);
      return $result;


  }


  /* admin edit*/


    public function prUpdate($post, $id){


        $alName= mysqli_real_escape_string($this->db->link, $post['alName']);

        $alEmail= mysqli_real_escape_string($this->db->link, $post['alEmail']);

        $phone = mysqli_real_escape_string($this->db->link, $post['phone']);

        $alPass = mysqli_real_escape_string($this->db->link, $post['alPass']);


        //validation

        if ($alName == "" || $alEmail=="" || $phone=="" || $alPass=="") {

            $csms="<span class='error'>Fields must not be empty </span>";
            return $csms;
        }


        $query="UPDATE adminadd 
                         SET 
                          alName='$alName',
                          alEmail='$alEmail',
                          phone='$phone',
                          alPass='$alPass'

                          WHERE adminID='$id'";


        $updated_row=$this->db->update($query);

        if ($updated_row) {
            $csms = "<span class='success'>Seller Admin update successfully</span>";
            return $csms;
        }else{
            $csms = "<span class='error'>Seller Admin not update </span>";
            return $csms;

        }




    }

     public function getPrById($id){
    $query="SELECT * FROM adminadd WHERE adminID ='$id'";
      $result=$this->db->select($query);
      return $result;


  }


  

     public function getAdmin(){

      $query="SELECT p.*, c.alName
       FROM adminadd as p,adminlog as c
       WHERE p.alName=c.alName

       ORDER BY p.adminID DESC";
      $result=$this->db->select($query);
      return $result;


  }

}
?>