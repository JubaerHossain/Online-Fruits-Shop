<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../Helpers/Format.php');
include_once ($filepath.'/../Database/Database.php');
?>
<?php
/**
 *
 */
class Slider{

    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function SliderInsert($post,$file){

        $pName=$this->fm->validation($post['title']);
        $pName= mysqli_real_escape_string($this->db->link, $post['title']);

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

        if ($pName == "" || $file_name=="") {

            $csms="<span class='error'>Fields must not be empty </span>";
            return $csms;
        }
        if (empty($file_name)) {
            echo "<span class='error'>Please Select any Image !</span>";
        }elseif ($file_size >10048567) {
            echo "<span class='error'>Image Size should be less then 10MB!
     </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-"
                .implode(', ', $permited)."</span>";
        }
        else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query="INSERT INTO slider(slName,image) VALUES('$pName','$uploaded_image')";

            $prinsert=$this->db->insert($query);

            if ($prinsert) {
                $csms = "<span class='success'>Slider Insert successfully</span>";
                return $csms;
            }else{
                $csms = "<span class='error'>Slider not Insert </span>";
                return $csms;

            }

        }

    }

    public function getallSlider(){

        $query="SELECT * FROM slider ORDER BY slD DESC";
        $result=$this->db->select($query);
        return $result;
    }
    public function getSlfrontpage(){

        $query="SELECT * FROM slider ORDER BY slD DESC";
        $result=$this->db->select($query);
        return $result;
    }
    public function getSlById($id){

        $query="SELECT * FROM slider WHERE slD='$id' ORDER BY slD DESC";
        $result=$this->db->select($query);
        return $result;
    }
public function sliderupdate($post,$file,$id)
{
    $pName = mysqli_real_escape_string($this->db->link, $post['pName']);

    // image
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 20) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;

    //validation

    if ($pName == "") {

        $csms = "<span class='error'>Fields must not be empty </span>";
        return $csms;
    } else {
        if (!empty($file_name)) {

            if (empty($file_name)) {
                echo "<span class='error'>Please Select any Image !</span>";
            } elseif ($file_size > 10048567) {
                echo "<span class='error'>Image Size should be less then 10MB!
     		</span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-"
                    . implode(', ', $permited) . "</span>";
            } else {
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE slider 
                         SET 
                          slName='$pName',
                          image='$uploaded_image'                          
                         WHERE slD='$id'";

                $updated_row = $this->db->update($query);

                if ($updated_row) {
                    $csms = "<span class='success'>Product update successfully</span>";
                    return $csms;
                } else {
                    $csms = "<span class='error'>Product not update </span>";
                    return $csms;

                }

            }
        } else {
            $query = "UPDATE slider 
                         SET 
                          slName='$pName'

                         WHERE slD='$id'";

            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $csms = "<span class='success'>Slider update successfully</span>";
                return $csms;
            } else {
                $csms = "<span class='error'>Slider not update </span>";
                return $csms;

            }


        }

    }
}

    public function delSliderById($id){
        $imgquery="SELECT * FROM slider WHERE slD='$id'";
        $delimg=$this->db->delete($imgquery);
        if  ($delimg) {
            while($delimage=$delimg->fetch_assoc()) {
                $dellin=$delimage['image'];
                unlink($dellin);
            }
        }

        $query="DELETE  FROM slider WHERE slD ='$id'";
        $deldata=$this->db->delete($query);

        if($deldata) {
            $csms = "<span class='success'>Slider  Deleted successfully</span>";
            return $csms;
        }else{

            $csms = "<span class='error'>Slider  not Deleted </span>";
            return $csms;

        }
    }
}
?>