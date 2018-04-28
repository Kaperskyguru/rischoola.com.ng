<?php
/**
 *
 */
class Resources extends dbmodel
{

  private static $instance;
  private function __construct() {}
  private function __clone(){}

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

  public function get_image_url($id)
  {
    $query = "SELECT resource_url FROM resources WHERE resource_type = :resource_type AND resource_item_id = :id";
    $this->query($query);
    $this->bind(':resource_type', "image");
    $this->bind(':resource_item_id', $id);
    $row = $this->resultset();
    extract($row);
    return $resource_url;
  }

  public function get_resource_table_name($id)
  {

  }

}

 ?>
