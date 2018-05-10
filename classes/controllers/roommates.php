<?php

class Roommates extends dbmodel {
  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function add_roommate(RoommateModel $roommateModel) {
      $roommate_user_id = $roommateModel->get_roommate_user_id();
      $roommate_name = $roommateModel->get_roommate_name();
      $roommate_status_id = $roommateModel->get_roommate_status_id();
      $roommate_user_id = $roommateModel->get_roommate_user_id();
      $type_of_roommate = $roommateModel->get_type_of_roommate();
      $roommate_phone_number = $roommateModel->get_roommate_phone_number();
      $roommate_hostel_name = $roommateModel->get_roommate_hostel_name();
      $roommate_school_id = $roommateModel->get_roommate_school_id();
      $roommate_hostel_type_id = $roommateModel->get_roommate_hostel_type_id();
      $roommate_price = $roommateModel->get_roommate_price();
      $roommate_hostel_desc = $roommateModel->get_roommate_hostel_desc();
      $roommate_desc = $roommateModel->get_roommate_desc();
      $roommate_expectations = $roommateModel->get_roommate_expectations();

      $query = "INSERT INTO roommates(roommate_name,type_of_roommate,roommate_phone_number,roommate_status_id,roommate_hostel_name,
        roommate_school_id,roommate_hostel_type_id,roommate_price, roommate_desc, roommate_expectations, roommate_hostel_desc,
        roommate_user_id) VALUES (:roommate_name,:type_of_roommate,:roommate_phone_number,:roommate_status_id,
          :roommate_hostel_name,:roommate_school_id,:roommate_hostel_type_id,:roommate_price,:roommate_desc, :roommate_expectations, :roommate_hostel_desc,:roommate_user_id)";
      $this->query($query);
      $this->bind(":roommate_name", $roommate_name);
      $this->bind(":type_of_roommate", $type_of_roommate);
      $this->bind(":roommate_phone_number", $roommate_phone_number);
      $this->bind(":roommate_status_id", $roommate_status_id);
      $this->bind(":roommate_hostel_name", $roommate_hostel_name);
      $this->bind(":roommate_school_id", $roommate_school_id);
      $this->bind(":roommate_hostel_type_id", $roommate_hostel_type_id);
      $this->bind(":roommate_price", $roommate_price);
      $this->bind(":roommate_desc", $roommate_desc);
      $this->bind(":roommate_expectations", $roommate_expectations);
      $this->bind(":roommate_hostel_desc", $roommate_hostel_desc);
      $this->bind(":roommate_user_id", $roommate_user_id);
      $this->executer();
      if ($this->lastIdinsert()) {
        return TRUE;
      }
      return FALSE;
  }

  public function get_roommates($length) {
      $query = "SELECT * FROM roommates WHERE roommate_status_id != 2 AND roommate_status_id != 6 LIMIT $length";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }

  public function get_roommate_by_id($id) {
      $query = "SELECT * FROM roommates WHERE roommate_id = $id AND roommate_status_id != 6 ";
      $this->query($query);
      $row = $this->resultset();
      return $row;
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

  public function trash_roommate($roommate_id)
  {
    $query = "UPDATE roommates SET roommate_status_id = 6 WHERE roommate_id = :roommate_id";
    $this->query($query);
    $this->bind(':roommate_id', $roommate_id);
    $this->executer();
    if($this->lastIdinsert()){
      return TRUE;
    }
    return FALSE;
  }

  public function get_roommate_review_count_by_id($id) {
      $query = "SELECT roommate_review_count FROM roommates WHERE roommate_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $roommate_review_count;
  }

  public function get_roommates_by_user_id($user_id) {
      $query = "SELECT * FROM roommates WHERE roommate_user_id = $user_id AND roommate_status_id != 6 ORDER BY roommate_status_id";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  }


  public function get_roommates_by_search($school_id, $gender, $type) {
    $query = "SELECT * FROM roommates WHERE roommate_status_id != 2 AND roommate_status_id != 6";

    if(!is_null($gender) && !empty($gender)){
        $query .= " AND roommate_gender = $gender";
    }

    if (!is_null($school_id) && !empty($school_id)) {
        $query .= " AND roommate_school_id = $school_id";
    }
    
    if (!is_null($type) && !empty($type)) {
        $query .= " AND type_of_roommate = $type";
    }

    $this->query($query);
    $stmt = $this->executer();
    return $stmt;
}

  public function get_roommate_location_by_id($id)
  {
    $query = "SELECT roommate_location FROM roommates WHERE roommate_id = $id";
    $this->query($query);
    $row = $this->resultset();
    extract($row);
    return $roommate_location;
  }


   public function display_if_room($schoolController, $lodgeController)
  { global $data;$error_text_name = $data['error_text_name'];?>

    <div class="form-horizontal" role="form">
      <div class="form-group <?php (isset($error_text_name))? ' has-error has-feedback':'' ?> ">
       <label class="control-label col-sm-2" for="name">Name: <sup>*</sup></label>
       <div class="col-sm-8">
         <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
         <span class="form-control-feedback"><?php echo $error_text_name; ?></span>
       </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="phone">Phone Number</label>
       <div class="col-sm-8">
       <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter your phone number">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="hostel_name">Hostel Name:</label>
       <div class="col-sm-8">
       <input type="text" name="hostel_name" id="hostel_name" class="form-control" placeholder="Enter hostel name">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="school">Hostel School:</label>
       <div class="col-sm-8">
       <select class="form-control" id="school" name="school" placeholder="Select School">
         <?php  $schoolController->get_schools();?>
       </select>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="hostel_type">Hostel type:</label>
       <div class="col-sm-8">
         <select class="form-control" id="hostel_type" name="hostel_type">
       <?php $lodgeController->get_lodge_models();?>
     </select>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="price">Price:</label>
       <div class="col-sm-8">
       <input type="number" name="price" id="price" class="form-control" placeholder="Enter price">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="hostel_desc">Hostel Description: </label>
       <div class="col-sm-8">
       <textarea rows="2" name="hostel_desc" id="hostel_desc" class="form-control" placeholder="Enter hostel description"></textarea>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="about_you" >About You: </label>
       <div class="col-sm-8">
       <textarea rows="2" id="about_you" name="about_you" class="form-control" placeholder="Tell your future roommate what you like, dislike or even more"></textarea>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="expectation">Expectations</label>
       <div class="col-sm-8">
       <textarea rows="2" name="expectation" id="expectation" class="form-control" placeholder="What kind of person do you want?"></textarea>
     </div>
     </div>
       <div class="form-group">
           <div class="col-sm-8">
         <button type="button" id="submit_i_have_a_room" class="btn btn-success">Make Request</button>
         <button type="button" id="" class="btn btn-defualt" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  <?php }


    public function display_no_room_form($schoolController,$lodgeController)
    {?>
      <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="school">Hostel School:</label>
        <div class="col-sm-8">
        <select class="form-control" id="school" name="school" placeholder="Select School">
          <?php $schoolController->get_schools();?>
        </select>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="hostel_type">Hostel type:</label>
        <div class="col-sm-8">
          <select class="form-control" id="hostel_type">
        <?php $lodgeController->get_lodge_models();?>
      </select>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="price">Price:</label>
        <div class="col-sm-8">
        <input type="number" id="price" name="" class="form-control" placeholder="Enter price">
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="about_you">About You: </label>
        <div class="col-sm-8">
        <textarea rows="2" name="about_you" id="about_you" class="form-control" placeholder="Tell your future roommate what you like, dislike or even more"></textarea>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="expectation">Expectations</label>
        <div class="col-sm-8">
        <textarea rows="2" name="expectation" id="expectation" class="form-control" placeholder="What kind of person do you want?"></textarea>
      </div>
      </div>
      <div class="form-group">
          <div class="col-sm-8">
        <button type="button" id="submit_i_dont_have_a_room" name="submit_i_dont_have_a_room"  class="btn btn-danger">Make Request</button>
        <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
      </div>
    </div>
   </form>
   <?php }

  public function display_availabe_roommates($length, $res) {
      $stmt = $this->get_roommates($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="row">
                  <div class="col-md-3">
                  <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                  </div>
                  <div class="col-md-9 pad-bottom-20">
                      <a href="#"><h5><?php echo $roommate_name;?></h5></a>
                      <p><?php echo getExcerpt($roommate_desc, 100);?></p>
                  </div>

              </div>
              <hr >
              <?php

          }
      }
  }

  public function display_search_roommates($length = 0, $res, $options) {
    $school_id = $options['school_id'];
    $gender = $options['gender'];
    $type= $options['type'];

    $stmt = $this->get_roommates_by_search($school_id, $gender, $type);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
            <div class="row">
                <div class="col-md-3">
                <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                </div>
                <div class="col-md-9 pad-bottom-20">
                    <a href="#"><h5><?php echo $roommate_name;?></h5></a>
                    <p><?php echo getExcerpt($roommate_desc, 100);?></p>
                </div>

            </div>
            <hr >
            <?php

        }
    }else{
      echo '<div> <h2> No Record was found in our database </h2></div>';
    }
}
}
