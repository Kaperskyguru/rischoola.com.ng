<?php
/**
 *
 */
class Resources extends dbmodel
{

  function __construct()
  {

  }

  public function get_resource_type($id)
  {

  }

  public function get_resource_url($id)
  {

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
