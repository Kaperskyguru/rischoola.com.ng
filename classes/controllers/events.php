<?php

class Events extends dbmodel {

  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function add_event(EventModel $eventModel) {
      $event_title = $eventModel->get_event_name();
      $event_desc = $eventModel->get_event_desc();
      $event_status_id = $eventModel->get_event_status_id();
      $event_school_id = $eventModel->get_event_school_id();
      $event_user_id = $eventModel->get_event_user_id();

      $query = "INSERT INTO events(event_title,event_desc,event_status_id,event_school_id,event_user_id)"
              . "VALUES(:event_title,:event_desc,:event_status_id,:event_school_id,:event_user_id)";
      $this->query($query);

      $this->bind(":event_title", $event_title);
      $this->bind(":event_desc", $event_desc);
      $this->bind(":event_status_id", $event_status_id);
      $this->bind(":event_school_id", $event_school_id);
      $this->bind(":event_user_id", $event_user_id);
      $this->executer();
      if ($this->lastIdinsert()) {
        return TRUE;
      }else {
        return FALSE;
      }

  }

  public function get_events($length) {
      $query = "SELECT * FROM events WHERE event_status_id = 5 LIMIT $length";
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

  public function get_event_reminder_by_user_id($id) {
      $query = "SELECT * FROM event_reminders WHERE reminder_user_id = :id AND reminder_status_id != 6";
      $this->query($query);
      $this->bind(':id', $id);
      $stmt = $this->executer();
      return $stmt;

  }

  public function trash_event($event_id)
  {
    $query = "UPDATE events SET event_status_id = 6 WHERE event_id = :event_id";
    $this->query($query);
    $this->bind(':event_id', $event_id);
    $this->executer();
    if($this->lastIdinsert()){
      return TRUE;
    }
    return FALSE;
  }

  public function trash_reminder($reminder_id)
  {
    $query = "UPDATE event_reminders SET reminder_status_id = 6 WHERE reminder_id = :reminder_id";
    $this->query($query);
    $this->bind(':reminder_id', $reminder_id);
    $this->executer();
    if($this->lastIdinsert()){
      return TRUE;
    }
    return FALSE;
  }

  public function is_reminder_set($event_id, $user_id)
  {
    $sql = "SELECT reminder_id FROM event_reminders WHERE reminder_user_id = :user_id AND  reminder_event_id = :event_id";
    $this->query($sql);
    $this->bind(':user_id', $user_id);
    $this->bind(':event_id', $event_id);
    $row = $this->executer();
    if($row->rowCount() > 0){
      return TRUE;
    }else {
      return FALSE;
    }
  }
  public function get_event_school_by_id($id) {
      $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $school_abbr;
  }

  public function get_event_title_by_id($id) {
      $query = "SELECT event_title FROM events WHERE event_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $event_title;
  }

  public function get_search_events($term)
  {
    $query =  "SELECT event_id, event_title, event_location, event_desc FROM events WHERE event_desc LIKE '%$term%' OR event_location LIKE '%$term%' OR event_title LIKE '%$term%'";
    $this->query($query);
    $stmt = $this->executer();
    return $stmt;
  }

  public function set_event_reminder($event_id, $user_id, $reminder_date)
  {
    $query = "INSERT INTO event_reminders(reminder_event_id, reminder_user_id, reminder_date)
    VALUES(:reminder_event_id, :reminder_user_id, :reminder_date)";
    $this->query($query);
    $this->bind(':reminder_event_id', $event_id);
    $this->bind(':reminder_user_id', $user_id);
    $this->bind(':reminder_date', $reminder_date);
    $this->executer();
    if ($id = $this->lastIdinsert()) {
      return TRUE;
    }
    return FALSE;
  }


  public function get_event_date_by_id($id) {
      $query = "SELECT event_date FROM events WHERE event_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $event_date;
  }

  public function get_event_review_count_by_id($id) {
      $query = "SELECT event_review_count FROM events WHERE event_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $event_review_count;
  }

  public function get_events_by_user_id($user_id) {
      $query = "SELECT * FROM events WHERE event_status_id = 5 AND event_user_id = $user_id";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }

  public function get_events_by_school_id($school_id) 
  {
    $query = "SELECT * FROM events WHERE event_status_id = 5 AND event_school_id = $school_id";
    $this->query($query);
    $stmt = $this->executer();
    return $stmt;
  }


  public function display_availabe_events($length, $res, $link) {
      $stmt = $this->get_events($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="col-md-5 pad-bottom-20">
                <div class="row">
                  <div class="col-md-4">
                    <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>                   
                  </div>
                  <div class="col-md-7 pad-bottom-20">
                    <a href="<?php echo $link;?>view_event.php?id=<?php echo $event_id; ?>"><h5><?php echo $event_title; ?></h5></a>
                    <h6><?php echo date('l jS \of F Y h:i:s A', strtotime($event_date)); ?></h6>
                  </div>
                </div>
              </div>
              <?php
          }
      }
  }

  public function display_search_events($res,$event_school_id) 
  {
    $stmt = $this->get_events_by_school_id($event_school_id);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
            <div class="col-md-5 pad-bottom-20">
              <div class="row">
                <div class="col-md-6">
                  <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>                   
                </div>
                <div class="col-md-6 pad-bottom-20">
                  <a href="view_event.php?id=<?php echo $event_id; ?>"><h5><?php echo $event_title; ?></h5></a>
                  <h6><?php echo date('l jS \of F Y h:i:s A', strtotime($event_date)); ?></h6>
                </div>
              </div>
            </div>
            <?php

        }
    }else {
      echo '<div> <h2> No Record was found in our database </h2></div>';
    }
}



}
