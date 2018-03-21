<?php

class Groups extends dbmodel {
  public function __construct() {

  }

  public function add_group(group $groupModel) {
      $group_title = $groupModel->get_group_title();
      $group_address = $groupModel->get_group_address();
      $group_desc = $groupModel->get_group_desc();
      $group_status_id = $groupModel->get_group_status_id();
      $group_model_id = $groupModel->get_group_model_id();
      $group_facilities = $groupModel->get_group_facilities();
      $group_rules = $groupModel->get_group_rules();
      $group_school_id = $groupModel->get_group_school_id();
      $group_featured_image_id = $groupModel->get_group_featured_image_id();
      $group_user_id = $groupModel->get_group_user_id();
      $group_keyword = $groupModel->get_group_keyword();

      $query = "INSERT INTO groups(group_title,group_address,group_desc,group_status_id,group_model_id,group_facilities,group_rules,group_school_id,group_user_id)"
              . "VALUES(:group_title,:group_address,:group_desc,:group_status_id,group_model_id,:group_facilities,:group_rules,:group_school_id,:group_user_id)";
      $this->query($query);

      $this->bind(":group_title", $group_title);
      $this->bind(":group_address", $group_address);
      $this->bind(":group_desc", $group_desc);
      $this->bind(":group_status_id", $group_status_id);
      $this->bind(":group_model_id", $group_model_id);
      $this->bind(":group_facilities", $group_facilities);
      $this->bind(":group_rules", $group_rules);
      $this->bind(":group_school_id", $group_school_id);
      $this->bind(":group_user_id", $group_user_id);
      $this->resultset();

      if ($this->lastIdinsert()) {

      }
  }

  public function get_groups($length) {
      $query = "SELECT * FROM groups LIMIT $length";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }

  public function get_group_by_id($id) {
      $query = "SELECT * FROM groups WHERE group_id = $id";
      $this->query($query);
      $row = $this->resultset();
      return $row;
  }

  public function get_group_model_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_group_status_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_group_school_by_id($id) {
      $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $school_abbr;
  }

  public function get_group_review_count_by_id($id) {
      $query = "SELECT group_review_count FROM groups WHERE group_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $group_review_count;
  }

  public function get_groups_by_user_id($user_id) {
      $query = "SELECT * FROM groups WHERE group_user_id = $user_id";
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

  public function display_availabe_groups($length, $src) {
      $stmt = $this->get_groups($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>

              <div class="col-sm-3 pad-bottom-20">
                <div>
                  <img src="<?php echo $src; ?>res/imgs/1.jpg" class="img-responsive img-thumbnail">
                </div>
                <div>
                  <h4><?php echo $group_title; ?></h4>
                  <a href="#" class="btn btn-primary">Join Group</a>
                </div>
              </div>
              <?php

          }
      }
  }


}
