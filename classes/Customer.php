<?php 
      $filepath=realpath(dirname(__FILE__));
      include_once ($filepath.'/../Helpers/Format.php');
      include_once ($filepath.'/../Database/Database.php');  
?>
<?php
/**
* 
*/
class Customer{
	
 	private $db;
    private $fm;
      
      function __construct()
      {
            $this->db=new Database();
            $this->fm=new Format();
    
     }


     public function customerAdd($data)
  {

    $username = $this->fm->validation($data['username']);
    $city     = $this->fm->validation($data['city']);
    $zip      = $this->fm->validation($data['zip']);
    $email    = $this->fm->validation($data['email']);
    $address  = $this->fm->validation($data['address']);
    $country  = $this->fm->validation($data['country']);
    $phone    = $this->fm->validation($data['phone']);
    $password = $this->fm->validation($data['password']);

    $username = mysqli_real_escape_string($this->db->link,$username);
    $zip      = mysqli_real_escape_string($this->db->link,$zip);
    $city     = mysqli_real_escape_string($this->db->link,$city);
    $email    = mysqli_real_escape_string($this->db->link,$email);
    $address  = mysqli_real_escape_string($this->db->link,$address);
    $country  = mysqli_real_escape_string($this->db->link,$country);
    $phone    = mysqli_real_escape_string($this->db->link,$phone);
    $password = mysqli_real_escape_string($this->db->link,$password);

      if (

        $username   == "" ||
      $city       == "" ||
      $zip        == "" ||
      $email      == "" ||
      $address    == "" ||
      $country    == "" ||
      $phone      == "" ||
      $password   == "" 

        ) {
        
      $msg = "<span class='error' >Field Must Not Be Empty !</span>";
      return $msg ;

      } else {


      $mailquery ="SELECT * FROM tb_customer WHERE email = '$email';";
      $mailChk = $this->db->select($mailquery);

        if ($mailChk != false) {

        $msg = "<span class='error' >This Email Already Sign Up !</span>";
        return $msg ;
          
        }else{

        
        $query = "INSERT INTO tb_customer (username,city,zip,email,address,country,phone,password)
          VALUES ('$username','$city','$zip','$email','$address','$country','$phone','$password');";
        $result = $this->db->insert($query);
        if ($result != false) {
          $msg = "<span class='success' >Registration complete Successfully !</span>";
          return $msg ;
        }else{
          $msg = "<span class='error' >Registration Not complete Successfully !</span>";
          return $msg ;
        }

      }
      }
  }

     public function customerLogin($data)
  {

    $email    = $this->fm->validation($data['email']);
    $password = $this->fm->validation($data['password']);

    $email    = mysqli_real_escape_string($this->db->link,$email);
    $password = mysqli_real_escape_string($this->db->link,$password);

    if (

      $email      == "" ||
      $password   == "" 

        ) {
        
      $msg = "<span class='error' >Field Must Not Be Empty !</span>";
      return $msg ;

      }else{

      $query ="SELECT * FROM tb_customer WHERE email = '$email' AND password = '$password' ;";
      $result = $this->db->select($query);

      if ($result != false) {

        $value = $result->fetch_assoc();
        Session::set("customerlogin",true);
        Session::set("customerId",$value["customerId"]);
        Session::set("username",$value["username"]);
        header("Location:payment.php");

      }else{
        $msg = "<span class='error' >Email And Password Not Match Or Invalid!</span>";
        return $msg ;
      }

      }

  }
    
    public function getCustomerInfo($customerId)
  {
    
    $query ="SELECT * FROM tb_customer WHERE customerId = '$customerId' ;";
    $result = $this->db->select($query);
    return $result;

  }
    

    public function editCustomerInfo($data,$id)
  {   

    $username = $this->fm->validation($data['username']);
    $city     = $this->fm->validation($data['city']);
    $zip      = $this->fm->validation($data['zip']);
    $email    = $this->fm->validation($data['email']);
    $address  = $this->fm->validation($data['address']);
    $country  = $this->fm->validation($data['country']);
    $phone    = $this->fm->validation($data['phone']);


    $username = mysqli_real_escape_string($this->db->link,$username);
    $zip      = mysqli_real_escape_string($this->db->link,$zip);
    $city     = mysqli_real_escape_string($this->db->link,$city);
    $email    = mysqli_real_escape_string($this->db->link,$email);
    $address  = mysqli_real_escape_string($this->db->link,$address);
    $country  = mysqli_real_escape_string($this->db->link,$country);
    $phone    = mysqli_real_escape_string($this->db->link,$phone);


      if (

        $username   == "" ||
      $city       == "" ||
      $zip        == "" ||
      $email      == "" ||
      $address    == "" ||
      $country    == "" ||
      $phone      == "" 

        ) {
        
      $msg = "<span class='error' >Field Must Not Be Empty !</span>";
      return $msg ;

      } else {
        
      $query = "

        UPDATE tb_customer SET 
        username = '$username',
        city     = '$city',
        zip      = '$zip',
        email    = '$email',
        address  = '$address',
        country  = '$country',
        phone    = '$phone'
        WHERE customerId = '$id';

      ";
      $result = $this->db->update($query);
      if ($result != false) {
        $msg = "<span class='success' >Data Updated Successfully !</span>";
        return $msg ;
      }else{
        $msg = "<span class='error' >Data Not Updated Successfully !</span>";
        return $msg ;
      }

      
      }
    
  }


  public function getCustomerInfoById($id)
  {
    
    $query ="SELECT * FROM tb_customer WHERE customerId = '$id' ;";
    $result = $this->db->select($query);
    return $result;

  }

    public function Coninsert($data){
        $CoName = $this->fm->validation($data['name']);
        $ConEmail     = $this->fm->validation($data['email']);
        $ConMobile      = $this->fm->validation($data['mobile']);
        $ConPass    = $this->fm->validation($data['text']);

        $CoName = mysqli_real_escape_string($this->db->link,$CoName);
        $ConEmail      = mysqli_real_escape_string($this->db->link,$ConEmail);
        $ConMobile     = mysqli_real_escape_string($this->db->link,$ConMobile);
        $ConPass    = mysqli_real_escape_string($this->db->link,$ConPass);

        if (

            $CoName   == "" ||
            $ConEmail       == "" ||
            $ConMobile        == "" ||
            $ConPass      == ""
        ) {

            $msg = "<span class='error' >Field Must Not Be Empty !</span>";
            return $msg ;

        } else {


            $mailquery ="SELECT * FROM tb_contact WHERE email = '$ConEmail';";
            $mailChk = $this->db->select($mailquery);

            if ($mailChk != false) {

                $msg = "<span class='error' >This Email Already Sign Up !</span>";
                return $msg ;

            }else{


                $query = "INSERT INTO tb_contact (username,email,topic,msg)
          VALUES ('$CoName','$ConEmail','$ConMobile','$ConPass');";
                $result = $this->db->insert($query);
                if ($result != false) {
                    $msg = "<span class='success' >Message Sent Successfully !</span>";
                    return $msg ;
                }else{
                    $msg = "<span class='error' >Message Not Sent Successfully !</span>";
                    return $msg ;
                }

            }
        }

    }

    public function GetContact(){


        $query ="SELECT * FROM tb_contact ORDER BY contactId DESC ;";
        $result = $this->db->select($query);
        return $result;

    }

    public function GetallQues($id){

        $query ="SELECT * FROM tb_contact WHERE contactId='$id' ;";
        $result = $this->db->select($query);
        return $result;
    }

    
    public function GetQuesEmail($id){

        $query ="SELECT * FROM tb_contact WHERE contactId='$id' ;";
        $result = $this->db->select($query);
        return $result;
    }


    public function GetallQuesPerId($id){

        $query ="SELECT * FROM tb_contact WHERE contactId='$id' ;";
        $result = $this->db->select($query);
        return $result;
    }

    public function contactansdelete($removeId){

    $query  = "DELETE FROM tb_contact WHERE contactId = '$removeId' ";
    $result = $this->db->delete($query);
    if ($result != false) {
      $msg = "<span class='error' >Answer deleted !</span>";
      return $msg ;
    }else{
      $msg = "<span class='error' >Answer not deleted !</span>";
      return $msg ;
    }
    }


}
?>