<?php

class Marketplace extends dbmodel {

    public function __construct() {

    }

    public function add_product(product $productModel) {
        $product_title = $productModel->get_product_title();
        $product_address = $productModel->get_product_address();
        $product_desc = $productModel->get_product_desc();
        $product_status_id = $productModel->get_product_status_id();
        $product_model_id = $productModel->get_product_model_id();
        $product_facilities = $productModel->get_product_facilities();
        $product_rules = $productModel->get_product_rules();
        $product_school_id = $productModel->get_product_school_id();
        $product_featured_image_id = $productModel->get_product_featured_image_id();
        $product_user_id = $productModel->get_product_user_id();
        $product_keyword = $productModel->get_product_keyword();

        $query = "INSERT INTO products(product_title,product_address,product_desc,product_status_id,product_model_id,product_facilities,product_rules,product_school_id,product_user_id)"
                . "VALUES(:product_title,:product_address,:product_desc,:product_status_id,product_model_id,:product_facilities,:product_rules,:product_school_id,:product_user_id)";
        $this->query($query);

        $this->bind(":product_title", $product_title);
        $this->bind(":product_address", $product_address);
        $this->bind(":product_desc", $product_desc);
        $this->bind(":product_status_id", $product_status_id);
        $this->bind(":product_model_id", $product_model_id);
        $this->bind(":product_facilities", $product_facilities);
        $this->bind(":product_rules", $product_rules);
        $this->bind(":product_school_id", $product_school_id);
        $this->bind(":product_user_id", $product_user_id);
        $this->resultset();

        if ($this->lastIdinsert()) {

        }
    }

    public function get_products($length) {
        $query = "SELECT * FROM products WHERE product_status_id != 2 LIMIT $length";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_product_categories() {
        $query = "SELECT * FROM category ORDER BY RAND()";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_product_by_id($id) {
        $query = "SELECT * FROM products WHERE product_status_id != 2 AND product_id = $id";
        $this->query($query);
        $row = $this->resultset();
        return $row;
    }

    public function get_product_category_by_id($id) {
        $query = "SELECT category_name FROM category WHERE category_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $category_name;
    }

    public function get_product_status_by_id($id) {
        $query = "SELECT status_body FROM statuses WHERE status_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $status_body;
    }

    public function get_product_school_by_id($id) {
        $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $school_abbr;
    }

    public function get_product_username_by_id($id) {
        $query = "SELECT user_user_name FROM users WHERE user_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $user_user_name;
    }

    public function get_product_review_count_by_id($id) {
        $query = "SELECT product_review_count FROM products WHERE product_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $product_review_count;
    }

    public function get_product_by_user_id($user_id) {
        $query = "SELECT * FROM products WHERE product_user_id = $user_id";
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

    public function display_category(){
      $stmt = $this->get_product_categories();
      if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
                <a href='#' class='list-group-item category' ><?php echo $category_name; ?></a>
              <?php
            }
          }
        }

    public function display_availabe_products($length, $src) {
        $stmt = $this->get_products($length);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <div class='col-sm-4 col-lg-4 col-md-4'>
                    <div class='row thumbnail'>
                        <img src="<?php echo $src; ?>res/imgs/1.jpg" class="img-responsive img-thumbnail">
                        <div class='caption'>
                            <h4 class='pull-right'>N<?php echo $product_price; ?>.00</h4>
                            <h5><a href='product_details.php?id=<?php echo $product_id; ?>'><?php echo $product_name; ?></a></h5>
                            <p><?php echo getExcerpt($product_desc, 40); ?></p>
                            <button pid='$product_id' id='product' class='btn btn-danger pull-right'>AddToCart</button>
                        </div>
                        <!-- <div class='ratings'>
                            <p>
                                <span class='glyphicon glyphicon-star'></span>
                                <span class='glyphicon glyphicon-star'></span>
                                <span class='glyphicon glyphicon-star'></span>
                                <span class='glyphicon glyphicon-star'></span>
                                <span class='glyphicon glyphicon-star'></span>
                            </p>
                        </div> -->

                        <div class="clearfix" style="position:relative; clear:both">
                            <span class="label label-danger"><?php echo $this->get_product_school_by_id($product_school_id); ?></span>
                            <span class="label label-purple"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                            <span class="label label-default"><?php echo $product_review_count; ?> reviews</span>
                        </div>

                    </div>
                </div>
                <?php
            }
        }
    }

    public function display_index_products($length, $src) {
        $stmt = $this->get_products($length);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <div class="col-md-4 pad-bottom-20">
                 <div class="col-md-6">
                   <img src="<?php echo $src; ?>res/imgs/1.jpg" class="img-responsive img-thumbnail" >
                         </div>
                         <div class="col-md-6">
                             <h5 class="" style="text-align:left"><a href="marketplace/product_details.php?id=<?php echo $product_id; ?>"><?php echo $this->getExcerpt($product_name, 30); ?></a></h5>
                         </div>
                         <div>
                             <span class="label label-default">₦ <?php echo $product_price; ?></span>
                             <span class="label label-danger"><?php echo $this->get_product_school_by_id($product_school_id); ?></span>
                             <span class="label label-purple"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                         </div>
                         <hr />
                     </div>
                     <?php
                   }
                 }
               }

}
