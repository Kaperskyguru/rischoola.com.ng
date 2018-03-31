<?php

class Schools extends dbmodel {

  public function __construct() {

  }

  public function get_schools()
  {
    $query = "SELECT * FROM schools";
    $this->query($query);
    $stmt = $this->executer();
    if($stmt->rowCount()>0){
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        ?>
          <option value="<?php echo $school_id ?>"><?php echo $school_name ?></option>
          <?php
      }
    }
  }
  public function get_school_name_by_id($id) {
      $query = "SELECT school_name FROM schools WHERE school_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $school_name;
  }
}
