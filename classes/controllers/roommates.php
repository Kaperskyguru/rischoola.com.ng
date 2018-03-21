<?php

class Roommates extends dbmodel {

  public function __construct() {

  }

  public function add_roommate(roommate $roommateModel) {
      $roommate_title = $roommateModel->get_roommate_title();
      $roommate_address = $roommateModel->get_roommate_address();
      $roommate_desc = $roommateModel->get_roommate_desc();
      $roommate_status_id = $roommateModel->get_roommate_status_id();
      $roommate_model_id = $roommateModel->get_roommate_model_id();
      $roommate_facilities = $roommateModel->get_roommate_facilities();
      $roommate_rules = $roommateModel->get_roommate_rules();
      $roommate_school_id = $roommateModel->get_roommate_school_id();
      $roommate_featured_image_id = $roommateModel->get_roommate_featured_image_id();
      $roommate_user_id = $roommateModel->get_roommate_user_id();
      $roommate_keyword = $roommateModel->get_roommate_keyword();

      $query = "INSERT INTO roommates(roommate_title,roommate_address,roommate_desc,roommate_status_id,roommate_model_id,roommate_facilities,roommate_rules,roommate_school_id,roommate_user_id)"
              . "VALUES(:roommate_title,:roommate_address,:roommate_desc,:roommate_status_id,roommate_model_id,:roommate_facilities,:roommate_rules,:roommate_school_id,:roommate_user_id)";
      $this->query($query);

      $this->bind(":roommate_title", $roommate_title);
      $this->bind(":roommate_address", $roommate_address);
      $this->bind(":roommate_desc", $roommate_desc);
      $this->bind(":roommate_status_id", $roommate_status_id);
      $this->bind(":roommate_model_id", $roommate_model_id);
      $this->bind(":roommate_facilities", $roommate_facilities);
      $this->bind(":roommate_rules", $roommate_rules);
      $this->bind(":roommate_school_id", $roommate_school_id);
      $this->bind(":roommate_user_id", $roommate_user_id);
      $this->resultset();

      if ($this->lastIdinsert()) {

      }
  }

  public function get_roommates($length) {
      $query = "SELECT * FROM roommates LIMIT $length";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }

  public function get_roommate_by_id($id) {
      $query = "SELECT * FROM roommates WHERE roommate_id = $id";
      $this->query($query);
      $row = $this->resultset();
      return $row;
  }

  public function get_roommate_model_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_roommate_status_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_roommate_school_by_id($id) {
      $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $school_abbr;
  }

  public function get_roommate_review_count_by_id($id) {
      $query = "SELECT roommate_review_count FROM roommates WHERE roommate_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $roommate_review_count;
  }

  public function get_roommates_by_user_id($user_id) {
      $query = "SELECT * FROM roommates WHERE roommate_user_id = $user_id";
      $this->query($query);
      $row = $this->resultset();
      return $row;
  }

  public function getExcerpt($content, $length) {
     if (strlen($content) < $length) {
         return $content;
     } else {
         $content = substr($content, 0, $length);
         return $content . ' ...';
     }
 }

  public function display_availabe_roommates($length, $src) {
      $stmt = $this->get_roommates($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="col-md-4 pad-bottom-20">
                  <div class="col-md-5">
                      <img src="<?php echo $src;?>res/imgs/1.jpg" class="img-responsive img-thumbnail">
                  </div>
                  <div class="col-md-7 pad-bottom-20">
                      <a href="#"><h5><?php echo $roommate_title;?></h5></a>
                      <p><?php echo getExcerpt($roommate_desc, 30);?></p>
                  </div>

              </div>
              <?php

          }
      }
  }
}
