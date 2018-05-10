<?php
/**
 *
 */

\Cloudinary::config(array(
  'cloud_name' => 'kaperskydisk',
  'api_key' => '951922678984356',
  'api_secret' => 'KqKF5csK-eW2_rxxZk5-nGAJ-kM'
));

class Resources extends dbmodel
{

  public const SAMPLE_IMAGE_OPTIONS = array(
    "format" => "png", 
    // "height" => "200", 
    // "width" => "200", 
    "class" => "thumpnail inline"
  );

  public const SLIDE_IMAGE_OPTIONS = array(
    "format" => "png", 
     "height" => "85", 
     "width" => "100", 
    "class" => "thumpnail inline"
  );

  public const AVATAR_IMAGE_OPTIONS = array(
    "format" => "png", 
    "height" => "45", 
    "width" => "45`", 
    "class" => "thumpnail inline"
  );


  public const LATEST_IMAGE_OPTIONS = array(
    "format" => "png", 
    "height" => "500", 
    "width" => "300", 
    "class" => "thumpnail inline"
  );

  private static $instance;
  public function __construct() {}
  // private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get_resource_type($id)
  {

  }

  public function get_resource_url($id)
  {

  }

  public function add_images_and_get_last_inserted_id($image, $user_id, $item_id, $type) {
    //echo "string". $user_id;
    $query = "INSERT INTO resources(resource_url, resource_user_id, resource_item_id, resource_table_name, resource_type)
    VALUES(:image, :user_id, :item_id, :table_name,:type)";
    $this->query($query);
    $this->bind(':image',$image);
    $this->bind(':user_id', $user_id);
    $this->bind(':item_id',$item_id);
    $this->bind(':table_name', $type);
    $this->bind(':type','image');
    $this->executer();
    if ($id = $this->lastIdinsert()) {
      return $id;
    }
  }

  public function get_resource_table_name($id)
  {

  }



  public function Upload($file_name, $options){
      $result = \Cloudinary\Uploader::upload($file_name, $options);

      unlink($file_name);
      //save_image_public_id_to_db("", $result['public_id']);
      //echo "Upload result: " .ret_err($result);
      return $result;

  }
  public function get_multiple_image_id($id, $table_name){
    $query = "SELECT resource_url FROM  resources WHERE  resource_type = :resource_type AND resource_table_name = :table_name AND resource_item_id = :id";
    $this->query($query);
    $this->bind(':resource_type', "image");
    $this->bind(':table_name', $table_name);
    $this->bind(':id', $id);
    return $this->executer();
  }

  public function get_image_url($id, $table_name){
    $query = "SELECT resource_url FROM  resources WHERE  resource_type = :resource_type AND resource_table_name = :table_name AND resource_item_id = :id";
    $this->query($query);
    $this->bind(':resource_type', "image");
    $this->bind(':table_name', $table_name);
    $this->bind(':id', $id);
    $row = $this->resultset();

    // extract($row);
    return $row['resource_url'];
  }

  public static function display($public_id, $options){
    // $id = self::get_image_url($public_id);
    echo cl_image_tag($public_id, $options);
  }


  public function save_image_public_id_to_db($sql, $public_id){
      $this->query($sql);
      if($this->executer()){
          return TRUE;
      }
       return FALSE;
  }

  public static function upload_image($files, $user_id, $inserted_id, $resources, $dir)
  {
      $error_status = 1;
      $files = is_array($files) ? $files : array( $files );
      $files_data = array();
      $files_id = array();

      foreach ($files["tmp_name"] as $index => $value) {
          $t = basename($files["name"][$index]);
          $image_file_type = pathinfo($t, PATHINFO_EXTENSION);

          if (getimagesize($files['tmp_name'][$index]) !== FALSE) {
              $error_status = 1;
          }
      
          if ($files['size'][$index] > 10485760) {
              $error_status = 0;
          }
      
          if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
              $error_status = 0;
          }
      
          if ($error_status == 1) {
              $name = $files["name"][$index];
              $options = array_merge(post_image_options(), array(
                  "public_id" => "Rischoola/".$dir."/".random_string_gen()."_"."$name",
              ));
              array_push($files_data, self::upload($value, $options));
              $image_name = $files_data[$index]['public_id'];
              array_push($files_id, $resources->add_images_and_get_last_inserted_id($image_name, $user_id, $inserted_id, "post"));
              
          }
      } 
      return $files_id[0];   
      }    
}
