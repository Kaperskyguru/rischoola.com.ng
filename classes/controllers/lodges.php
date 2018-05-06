<?php

class Lodges extends dbmodel {
    private static $instance;
    private function __construct() {}
    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function add_lodge_facility($name) {
        $lodge_facility_name = $name;
        $sql = "INSERT INTO lodge_facilities(lodge_facility_name) VALUES (:lodge_facility_name)";
        $this->query($sql);
        $this->bind(":lodge_facility_name", $lodge_facility_name);
        $this->executer();
        if ($this->lastIdinsert()) {
          return TRUE;
        }else {
          return FALSE;
        }
    }

    public function get_total_number_of_lodges_by_id($id)
    {
      $sql = "SELECT lodge_id FROM lodges WHERE lodge_user_id = :id";
      $this->query($sql);
      $this->bind(':id', $id);
      $row = $this->executer();
      return $row->rowCount();
    }

    public function add_lodge_rule($name) {
        $lodge_rule_name = $name;
        $sql = "INSERT INTO lodge_rules(lodge_rule_name) VALUES (:lodge_rule_name)";
        $this->query($sql);
        $this->bind(":lodge_rule_name", $lodge_rule_name);
        $this->executer();
        if ($id = $this->lastIdinsert()) {

          return TRUE;
        }else {
          return FALSE;
        }
    }
    public function get_lodge_rule_id_by_name($name){
      $query = "SELECT lodge_rule_id FROM lodge_rules WHERE lodge_rule_name = :name";
      $this->query($query);
      $this->bind(':name', $name);
      $row = $this->resultset();
      extract($row);
      return $lodge_rule_id;
    }

    public function get_lodge_facility_id_by_name($name){
      $query = "SELECT lodge_facility_id FROM lodge_facilities WHERE lodge_facility_name = :name";
      $this->query($query);
      $this->bind(':name', $name);
      $row = $this->resultset();
      extract($row);
      return $lodge_facility_id;
    }

    public function add_rule($rule){
      $id = $this->get_lodge_rule_id_by_name($rule);
      $sql = "INSERT INTO lodge_rules_meta(lodge_rules_meta_lodge_rule_id, lodge_rules_meta_user_id) VALUES (:lodge_rule_meta_lodge_rule_id, :lodge_rule_meta_user_id)";
      $this->query($sql);
      $this->bind(":lodge_rule_meta_lodge_rule_id", $id);
      $this->bind(":lodge_rule_meta_user_id", $id);
      $this->executer();
  }

  public function add_facility($facility){
    $id = $this->get_lodge_facility_id_by_name($facility);
    $sql = "INSERT INTO lodge_facilities_meta(lodge_facilities_meta_facility_id, lodge_facilities_meta_user_id) VALUES (:lodge_facilities_meta_facility_id, :lodge_facility_meta_user_id)";
    $this->query($sql);
    $this->bind(":lodge_facilities_meta_facility_id", $id);
    $this->bind(":lodge_facility_meta_user_id", $id);
    $this->executer();
}

public function get_lodge_models()
{
  $query = "SELECT * FROM lodges_model";
  $this->query($query);
  $stmt = $this->executer();
  if($stmt->rowCount()>0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      ?>
        <option value="<?php echo $model_id ?>"><?php echo $model_body ?></option>
        <?php
    }
  }
}

    public function add_lodge(LodgeModel $LodgeModel) {
        $lodge_name = $LodgeModel->get_lodge_name();
        $lodge_address = $LodgeModel->get_lodge_address();
        $lodge_desc = $LodgeModel->get_lodge_desc();
        $lodge_status_id = $LodgeModel->get_lodge_status_id();
        $lodge_model_id = $LodgeModel->get_lodge_model_id();
        $lodge_facilities = $LodgeModel->get_lodge_facilities();
        $lodge_rules = $LodgeModel->get_lodge_rules();
        $lodge_school_id = $LodgeModel->get_lodge_school_id();
        $lodge_user_id = $LodgeModel->get_lodge_user_id();

        $query = "INSERT INTO lodges(lodge_name,lodge_address,lodge_desc,lodge_status_id,lodge_model_id,lodge_facilities,lodge_rules,lodge_school_id,lodge_user_id)"
                . "VALUES(:lodge_name,:lodge_address,:lodge_desc,:lodge_status_id, :lodge_model_id,:lodge_facilities,:lodge_rules,:lodge_school_id,:lodge_user_id)";
        try{
          $this->query($query);
          $this->bind(":lodge_name", $lodge_name);
          $this->bind(":lodge_address", $lodge_address);
          $this->bind(":lodge_desc", $lodge_desc);
          $this->bind(":lodge_status_id", $lodge_status_id);
          $this->bind(":lodge_model_id", $lodge_model_id);
          $this->bind(":lodge_facilities", $lodge_facilities);
          $this->bind(":lodge_rules", $lodge_rules);
          $this->bind(":lodge_school_id", $lodge_school_id);
          $this->bind(":lodge_user_id", $lodge_user_id);
          $this->executer();
          return $this->lastIdinsert();
      }catch(PDOException $e){
        echo $e->getMessage();
        return 0;
      }
    }

    public function insert_lodge_featured_image_id($image_id, $lodge_id)
    {
      $sql = "UPDATE lodges SET lodge_featured_image_id = :lodge_featured_image_id WHERE lodge_id = :lodge_id";
      $this->query($sql);
      $this->bind(':lodge_featured_image_id', $image_id);
      $this->bind(':lodge_id', $lodge_id);
      if($this->executer()){
        return TRUE;
      }
      return FALSE;
    }


    // public function get_lodge_category_by_id($id) {
    //     $query = "SELECT post_category_name FROM post_category WHERE post_category_id = :id";
    //     $this->query($query);
    //     $this->bind(':id', $id);
    //     $row = $this->resultset();
    //     extract($row);
    //     return $post_category_name;
    // }

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


    public function get_user_id_by_username($name) {
        $query = "SELECT user_id FROM users WHERE user_user_name = :name";
        $this->query($query);
        $this->bind(':name', $name);
        $row = $this->resultset();
        extract($row);
        return $user_id;

    }

    public function get_lodge_by_user_id($user_id)
    {
      $query = "SELECT * FROM lodges WHERE lodge_user_id = $user_id";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
    }

    public function is_facility_exist($name)
    {
      $sql = "SELECT 1 FROM lodge_facilities WHERE lodge_facility_name = :lodge_facility_name";
      $this->query($sql);
      $this->bind(':lodge_facility_name', $name);
      $row = $this->resultset();
      if($row){
        return TRUE;
      }else {
        return FALSE;
      }
    }

    public function is_rule_exist($name)
    {
      $sql = "SELECT 1 FROM lodge_rules WHERE lodge_rule_name = :lodge_rule_name";
      $this->query($sql);
      $this->bind(':lodge_rule_name', $name);
      $row = $this->resultset();
      if($row){
        return TRUE;
      }else {
        return FALSE;
      }
    }

    public function add_images_and_get_last_inserted_id($image, $user_id, $item_id) {
      //echo "string". $user_id;
      $query = "INSERT INTO resources(resource_url, resource_user_id, resource_item_id, resource_table_name, resource_type)
      VALUES(:image, :user_id, :item_id, :table_name,:type)";
      $this->query($query);
      $this->bind(':image',$image);
      $this->bind(':user_id', $user_id);
      $this->bind(':item_id',$item_id);
      $this->bind(':table_name','lodge');
      $this->bind(':type','image');
      $this->executer();
      if ($id = $this->lastIdinsert()) {
        return $id;
      }
    }

    public function get_lodges($length) {
        $query = "SELECT * FROM lodges WHERE lodge_status_id != 2 ORDER BY RAND() LIMIT $length";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_related_lodges($school_id, $length) {
        $query = "SELECT * FROM lodges WHERE lodge_school_id = $school_id AND lodge_status_id != 2 ORDER BY RAND() LIMIT $length";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_lodge_by_id($id) {
        $query = "SELECT * FROM lodges WHERE lodge_id = $id";
        $this->query($query);
        $row = $this->resultset();
        return $row;
    }

    public function get_lodge_model_by_id($id) {
        $query = "SELECT model_body FROM lodges_model WHERE model_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $model_body;
    }

    public function get_lodge_status_by_id($id) {
        $query = "SELECT status_body FROM statuses WHERE status_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $status_body;
    }

    public function get_lodge_rules() {
        $query = "SELECT * FROM lodge_rules";
        $this->query($query);
        $stmt = $this->executer();
        if($stmt->rowCount()>0){
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
                <option pid = "<?php echo $lodge_rule_id;?>" value="<?php echo $lodge_rule_name; ?>">
            <?php
          }
        }
    }

    public function get_lodge_facilities() {
        $query = "SELECT * FROM lodge_facilities";
        $this->query($query);
        $stmt = $this->executer();
        if($stmt->rowCount()>0){
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
                <option pid = "<?php echo $lodge_facility_id;?>" value="<?php echo $lodge_facility_name; ?>">
            <?php
          }
        }
    }

    public function get_lodge_school_by_id($id) {
        $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $school_abbr;
    }


    public function get_user_username_by_id($id) {
        $query = "SELECT user_user_name FROM users WHERE user_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $user_user_name;
    }

    public function get_lodge_review_count_by_id($id) {
        $query = "SELECT lodge_review_count FROM lodges WHERE lodge_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $lodge_review_count;
    }

    public function get_lodges_by_user_id($user_id) {
        $query = "SELECT * FROM lodges WHERE lodge_user_id = $user_id";
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

    public function display_availabe_lodges($length, $src, Resources $res) {
        $stmt = $this->get_lodges($length);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <div class="col-sm-4 col-lg-4 col-md-3">
                    <div class="thumbnail">
                        <div>

                            <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                        
                        </div>
                        <div>
                            <h3 class="hostelname"><a href="<?php echo $src;?>lodges/hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_name; ?></a></h3>
                            <h5><img /><?php echo $lodge_address; ?></h5>
                            <p><?php echo $this->getExcerpt($lodge_desc, 60); ?></p>
                            <h3 class="hostelname text-danger"># <?php echo $lodge_price; ?> / year</h3>
                        </div>
                        <div class="tags">
                            <span class="label label-default"><?php echo $this->get_lodge_review_count_by_id($lodge_id) ?></span>
                            <span class="label label-danger"><?php echo $this->get_lodge_model_by_id($lodge_model_id) ?></span>
                            <span class="label label-purple"><?php echo $this->get_lodge_status_by_id($lodge_status_id) ?></span>
                            <span class="label label-primary"><?php echo $this->get_lodge_school_by_id($lodge_school_id) ?></span>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }

    public function display_related_lodges($school_id, $length, $src){
      $stmt = $this->get_related_lodges($school_id,$length);
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <div class="product col-lg-3 col-sm-6">
                  <div class="product-thumb">
                      <a href="#" class="thumb-link">
                          <img class="hover-img" src="<?php echo $src;?>/imgs/product/6-hover.jpg" alt="Product Hover">
                          <img class="front-img" src="<?php echo $src;?>/imgs/product/6.jpg" alt="Product Front">
                      </a>
                      <div class="attr-group">
                          <span class="new"><?php echo $this->get_lodge_status_by_id($lodge_status_id);?></span>
                      </div>
                      <a class="to-cart" href="#"><i class="fa fa-shopping-cart"></i>  Message <?php echo $this->get_user_username_by_id($lodge_user_id);?></a>
                      <div class="product-btn">
                          <a class="to-view" data-fancybox-type="iframe" href="hostel_detail.php?id=<?php echo $lodge_id; ?>"><i class="fa fa-eye"></i><span class="tooltip">Quick View</span></a>
                          <a class="to-wish" href="#"><i class="fa fa-heart"></i><span class="tooltip">Add To Wishlist</span></a>
                      </div>
                  </div>
                  <div class="product-info">
                      <h5 class="product-name"><a href="hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_name; ?></a></h5>
                      <div class="rating" itemtype="http://schema.org/Offer" itemscope>
                          <div class="star_rating" itemtype="http://schema.org/AggregateRating" itemscope itemprop="aggregateRating">
                              <span class="star star_full"></span>
                              <span class="star star_full"></span>
                              <span class="star star_full"></span>
                              <span class="star star_full"></span>
                              <span class="star"></span>
                              <meta itemprop="worstRating" content="0">
                              <meta itemprop="ratingValue" content="4">
                              <meta itemprop="bestRating" content="5">
                          </div>
                      </div>
                      <p class="price">$<?php echo $lodge_price; ?></p>
                  </div>
              </div>
              <?php
            }
          }
    }

}
