<?php

class Scholarships extends dbmodel {
    private static $instance;
    private function __construct() {}
    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }

      public function get_all_scholarship($limit )
      {
        $query = "SELECT * FROM scholarships LIMIT $limit";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
      }

      public function get_scholarship_by_id( $id)
      {
        $query = "SELECT * FROM scholarships WHERE scholarship_id = :id";
        $this->query($query);
        $this->bind(':id', $id);
        $row = $this->resultset();
        return $row;
      }

      public function get_scholarship_by_user_id( $user_id)
      {
        $query = "SELECT * FROM scholarships WHERE scholarship_user_id = $user_id";
        $this->query($query);
        $row = $this->resultset();
        return $row;
      }

      public function addscholarship(scholarship $scholarshipModel) {
          $scholarship_title = $scholarshipModel->get_scholarship_title;
          $scholarship_content = $scholarshipModel->get_scholarship_content;
          $scholarship_user_id = $scholarshipModel->get_scholarship_user_id;
          $scholarship_school_id = $scholarshipModel->get_scholarship_school_id;
          $scholarship_featured_image_id = $scholarshipModel->get_scholarship_featured_image_id;
          // $scholarship_like_count	= $scholarshipModel->get_scholarship_like_count;
          // $scholarship_comment_count	= $scholarshipModel->get_scholarship_comment_count;
          // $scholarship_dislike_count	= $scholarshipModel->get_scholarship_dislike_count;
          $scholarship_date_created = $scholarshipModel->get_scholarship_date_created;
          $scholarship_status_id = $scholarshipModel->get_scholarship_status_id;

          $query = "INSERT INTO scholarships(scholarship_title,scholarship_content,scholarship_user_id,scholarship_school_id,scholarship_featured_image_id,scholarship_status_id)"
                  . "VALUES(:scholarship_title, :scholarship_content, :scholarship_user_id, :scholarship_school_id, :scholarship_featured_image_id,:scholarship_status_id);";
          $this->query($query);
          $this->bind(':scholarship_title',$scholarship_title);
          $this->bind(':scholarship_content',$scholarship_content);
          $this->bind(':scholarship_user_id',$scholarship_user_id);
          $this->bind(':scholarship_school_id',$scholarship_school_id);
          $this->bind(':scholarship_featured_image_id',$scholarship_featured_image_id);
          $this->bind(':scholarship_status_id',$scholarship_status_id);
          $this->executer();
          if ($this->lastIdinsert()) {
            echo "scholarship is pending verifications...";
          }

      }

      public function incrementLikes(scholarship $scholarshipModel) {

      }

      public function incrementDislikes(scholarship $scholarshipModel) {

      }

      public function getscholarshipDateById(scholarship $scholarshipModel) {

      }

      public function getscholarshipCommentCount(scholarship $scholarshipModel) {

      }

      public function getExcerpt($content, $length) {
         if (strlen($content) < $length) {
             return $content;
         } else {
             $content = substr($content, 0, $length);
             return $content . ' ...';
         }
     }

      public function get_last_inserted_id()
      {
        return $this->lastIdinsert();
      }

      public function get_last_inserted_scholarship($src, $scholarship_src)
      {
        // Will be activated when i start inserting [scholarship]
          //$id = $this->get_last_inserted_id();
          $stmt = $this->get_scholarship_by_id(16);
          if ($stmt->rowCount() > 0) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  extract($row);
                  ?>
                  <div>
                      <a href="<?php echo $scholarship_src; ?>read-scholarship.php">
                      <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                    </a>
                  </div>
                  <div>
                      <a href="<?php echo $scholarship_src; ?>read-scholarship.php"><h4><?php echo $scholarship_title;?></h4></a>
                  </div>
                  <?php
              }
          }
        }

        public function display_latest_scholarship($limit, $src, Resources $res)
        {
          $stmt = $this->get_all_scholarship($limit);
          if ($stmt->rowCount() > 0) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  extract($row);
                  ?>
                  <div class="pad-bottom-20">
                      <div class="col-sm-4">
                      <?php 
                      $res::display($res->get_image_url($scholarship_id, 'scholarship'), array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                      </div>
                      <div class="col-sm-8" >
                          <div>
                              <a href="<?php echo $src; ?>scholarships/view-scholarship.php?id=<?php echo $scholarship_id; ?>"><h4><?php echo $scholarship_title; ?></h4></a>
                          </div>
                          <div>
                              <p><?php echo getExcerpt($scholarship_desc, 100); ?></p>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <?php
              }
          }
        }

}
