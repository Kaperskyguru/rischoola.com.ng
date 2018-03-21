<?php

class Lodges extends dbmodel {

    public function __construct() {

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

    public function add_lodge_rule($name) {
        $lodge_rule_name = $name;
        $sql = "INSERT INTO lodge_rules(lodge_rule_name) VALUES (:lodge_rule_name)";
        $this->query($sql);
        $this->bind(":lodge_rule_name", $lodge_rule_name);
        $this->executer();
        if ($this->lastIdinsert()) {
          return TRUE;
        }else {
          return FALSE;
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
        $lodge_featured_image_id = $LodgeModel->get_lodge_featured_image_id();
        $lodge_user_id = $LodgeModel->get_lodge_user_id();
        $lodge_keyword = $LodgeModel->get_lodge_keyword();

        $query = "INSERT INTO lodges(lodge_name,lodge_address,lodge_desc,lodge_status_id,lodge_model_id,lodge_facilities,lodge_rules,lodge_school_id,lodge_user_id)"
                . "VALUES(:lodge_name,:lodge_address,:lodge_desc,:lodge_status_id,lodge_model_id,:lodge_facilities,:lodge_rules,:lodge_school_id,:lodge_user_id)";
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
        if ($this->lastIdinsert()) {
          return TRUE;
        }else {
          return FALSE;
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
        $query = "SELECT * FROM lodges WHERE lodge_status_id != 2 LIMIT $length";
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
        $query = "SELECT status_body FROM statuses WHERE status_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $status_body;
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

    public function display_availabe_lodges($length, $src) {
        $stmt = $this->get_lodges($length);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div>
                            <img src="<?php echo $src;?>res/imgs/1.jpg" class="img-responsive img-thumbnail">
                        </div>
                        <div>
                            <h3 class="hostelname"><a href="<?php echo $src;?>lodges/hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_name; ?></a></h3>
                            <h5><img src="<?php echo $src;?>res/icons/address.png" /><?php echo $lodge_address; ?></h5>
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
