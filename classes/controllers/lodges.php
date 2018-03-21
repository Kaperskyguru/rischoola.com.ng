<?php

class Lodges extends dbmodel {

    public function __construct() {

    }

    public function add_lodge(lodge $LodgeModel) {
        $lodge_title = $LodgeModel->get_lodge_title();
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

        $query = "INSERT INTO lodges(lodge_title,lodge_address,lodge_desc,lodge_status_id,lodge_model_id,lodge_facilities,lodge_rules,lodge_school_id,lodge_user_id)"
                . "VALUES(:lodge_title,:lodge_address,:lodge_desc,:lodge_status_id,lodge_model_id,:lodge_facilities,:lodge_rules,:lodge_school_id,:lodge_user_id)";
        $this->query($query);

        $this->bind(":lodge_title", $lodge_title);
        $this->bind(":lodge_address", $lodge_address);
        $this->bind(":lodge_desc", $lodge_desc);
        $this->bind(":lodge_status_id", $lodge_status_id);
        $this->bind(":lodge_model_id", $lodge_model_id);
        $this->bind(":lodge_facilities", $lodge_facilities);
        $this->bind(":lodge_rules", $lodge_rules);
        $this->bind(":lodge_school_id", $lodge_school_id);
        $this->bind(":lodge_user_id", $lodge_user_id);
        $this->resultset();
        if ($this->lastIdinsert()) {

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
                            <h3 class="hosteltitle"><a href="<?php echo $src;?>lodges/hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_title; ?></a></h3>
                            <h5><img src="<?php echo $src;?>res/icons/address.png" /><?php echo $lodge_address; ?></h5>
                            <p><?php echo $this->getExcerpt($lodge_desc, 60); ?></p>
                            <h3 class="hosteltitle text-danger"># <?php echo $lodge_price; ?> / year</h3>
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
                      <h5 class="product-name"><a href="hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_title; ?></a></h5>
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
