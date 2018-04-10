<?php

class Roommates extends dbmodel {

  public function __construct() {

  }

  public function add_roommate(roommate $roommateModel) {
      $roommate_name = $roommateModel->get_roommate_name();
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

      $query = "INSERT INTO roommates(roommate_name,roommate_address,roommate_desc,roommate_status_id,roommate_model_id,roommate_facilities,roommate_rules,roommate_school_id,roommate_user_id)"
              . "VALUES(:roommate_name,:roommate_address,:roommate_desc,:roommate_status_id,roommate_model_id,:roommate_facilities,:roommate_rules,:roommate_school_id,:roommate_user_id)";
      $this->query($query);

      $this->bind(":roommate_name", $roommate_name);
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

  public function get_roommate_review_count_by_id($id) {
      $query = "SELECT roommate_review_count FROM roommates WHERE roommate_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $roommate_review_count;
  }

  public function get_roommates_by_user_id($user_id) {
      $query = "SELECT * FROM roommates WHERE roommate_user_id = $user_id AND roommate_status_id != 6";
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
  {?>
    <form class="form-horizontal" role="form">
      <div class="form-group">
       <label class="control-label col-sm-2">Name:</label>
       <div class="col-sm-8">
         <input type="text" name="" class="form-control" placeholder="Enter your name">
       </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Phone Number</label>
       <div class="col-sm-8">
       <input type="number" name="" class="form-control" placeholder="Enter your phone number">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Hostel Name:</label>
       <div class="col-sm-8">
       <input type="text" name="" class="form-control" placeholder="Enter hostel name">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Hostel School:</label>
       <div class="col-sm-8">
       <select class="form-control" placeholder="Select School">
         <?php  $schoolController->get_schools();?>
       </select>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Hostel type:</label>
       <div class="col-sm-8">
         <select class="form-control">
       <?php $lodgeController->get_lodge_models();?>
     </select>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Price:</label>
       <div class="col-sm-8">
       <input type="number" name="" class="form-control" placeholder="Enter price">
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Hostel Description: </label>
       <div class="col-sm-8">
       <textarea rows="2" name="" class="form-control" placeholder="Enter hostel description"></textarea>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">About You: </label>
       <div class="col-sm-8">
       <textarea rows="2" name="" class="form-control" placeholder="Tell your future roommate what you like, dislike or even more"></textarea>
     </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Expectations</label>
       <div class="col-sm-8">
       <textarea rows="2" name="" class="form-control" placeholder="What kind of person do you want?"></textarea>
     </div>
     </div>
       <div class="form-group">
           <div class="col-sm-8">
         <button type="button" class="btn btn-success" data-dismiss="modal">Make Request</button>
         <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
       </div>
     </div>
    </form>
  <?php }


    public function display_no_room_form($schoolController,$lodgeController)
    {?>
      <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="control-label col-sm-2">Hostel School:</label>
        <div class="col-sm-8">
        <select class="form-control" placeholder="Select School">
          <?php $schoolController->get_schools();?>
        </select>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Hostel type:</label>
        <div class="col-sm-8">
          <select class="form-control">
        <?php $lodgeController->get_lodge_models();?>
      </select>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Price:</label>
        <div class="col-sm-8">
        <input type="number" name="" class="form-control" placeholder="Enter price">
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">About You: </label>
        <div class="col-sm-8">
        <textarea rows="2" name="" class="form-control" placeholder="Tell your future roommate what you like, dislike or even more"></textarea>
      </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Expectations</label>
        <div class="col-sm-8">
        <textarea rows="2" name="" class="form-control" placeholder="What kind of person do you want?"></textarea>
      </div>
      </div>
      <div class="form-group">
          <div class="col-sm-8">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Make Request</button>
        <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
      </div>
    </div>
   </form>
   <?php }






  public function display_availabe_roommates($length, $src) {
      $stmt = $this->get_roommates($length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="row">
                  <div class="col-md-3">
                      <img src="<?php echo $src;?>res/imgs/1.jpg" class="img-responsive img-thumbnail">
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
}
