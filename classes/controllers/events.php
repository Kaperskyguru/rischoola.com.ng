<?php

class Events extends dbmodel {

  public function __construct() {

  }

  public function add_event(event $eventModel) {
      $event_title = $eventModel->get_event_title();
      $event_address = $eventModel->get_event_address();
      $event_desc = $eventModel->get_event_desc();
      $event_status_id = $eventModel->get_event_status_id();
      $event_model_id = $eventModel->get_event_model_id();
      $event_facilities = $eventModel->get_event_facilities();
      $event_rules = $eventModel->get_event_rules();
      $event_school_id = $eventModel->get_event_school_id();
      $event_featured_image_id = $eventModel->get_event_featured_image_id();
      $event_user_id = $eventModel->get_event_user_id();
      $event_keyword = $eventModel->get_event_keyword();

      $query = "INSERT INTO events(event_title,event_address,event_desc,event_status_id,event_model_id,event_facilities,event_rules,event_school_id,event_user_id)"
              . "VALUES(:event_title,:event_address,:event_desc,:event_status_id,event_model_id,:event_facilities,:event_rules,:event_school_id,:event_user_id)";
      $this->query($query);

      $this->bind(":event_title", $event_title);
      $this->bind(":event_address", $event_address);
      $this->bind(":event_desc", $event_desc);
      $this->bind(":event_status_id", $event_status_id);
      $this->bind(":event_model_id", $event_model_id);
      $this->bind(":event_facilities", $event_facilities);
      $this->bind(":event_rules", $event_rules);
      $this->bind(":event_school_id", $event_school_id);
      $this->bind(":event_user_id", $event_user_id);
      $this->resultset();

      if ($this->lastIdinsert()) {

      }
  }

  public function get_events($length) {
      $query = "SELECT * FROM events LIMIT $length";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }

  public function get_event_by_id($id) {
      $query = "SELECT * FROM events WHERE event_id = $id";
      $this->query($query);
      $row = $this->resultset();
      return $row;
  }

  public function get_event_model_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_event_status_by_id($id) {
      $query = "SELECT status_body FROM statuses WHERE status_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $status_body;
  }

  public function get_event_school_by_id($id) {
      $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $school_abbr;
  }

  public function get_event_review_count_by_id($id) {
      $query = "SELECT event_review_count FROM events WHERE event_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $event_review_count;
  }

  public function get_events_by_user_id($user_id) {
      $query = "SELECT * FROM events WHERE event_user_id = $user_id";
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

  public function display_availabe_events($length, $src) {
      $stmt = $this->get_events($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="col-md-5 pad-bottom-20">
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?php echo $src;?>res/imgs/1.jpg" class="img-responsive img-thumbnail" >
                  </div>
                  <div class="col-md-6 pad-bottom-20">
                    <h5><?php echo $event_title; ?></h5>
                    <h6><?php echo $event_date; ?></h6>
                  </div>
              </div>
              </div>
              <?php

          }
      }
  }



}
