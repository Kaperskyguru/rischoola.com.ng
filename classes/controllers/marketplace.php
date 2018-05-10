<?php

class Marketplace extends dbmodel {
    private static $instance;
    private function __construct() {}
    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }
    public function add_product(MarketplaceModel $productModel) {
        $product_name = $productModel->get_product_title();
        $product_address = $productModel->get_product_address();
        $product_desc = $productModel->get_product_desc();
        $product_status_id = $productModel->get_product_status_id();
        $product_avail_status_id = $productModel->get_product_avail_status_id();
        $product_condition = $productModel->get_product_condition();
        $product_price = $productModel->get_product_price();
        $product_school_id = $productModel->get_product_school_id();
        $product_user_id = $productModel->get_product_user_id();
        $product_category_id = $productModel->get_product_category_id();
        $product_show_email = $productModel->get_product_show_email();
        $product_show_phone = $productModel->get_product_show_phone();

        $query = "INSERT INTO products(product_name,product_location,product_desc,product_status_id,
          product_avail_status_id,product_condition,product_price,product_school_id,product_user_id,
          product_category_id, product_show_email, product_show_phone)
          VALUES(:product_name,:product_location,:product_desc,:product_status_id,:product_avail_status_id,
            :product_condition,:product_price,:product_school_id,:product_user_id, :product_category_id,
            :product_show_email, :product_show_phone)";
      try{
          $this->query($query);
          $this->bind(":product_name", $product_name);
          $this->bind(":product_location", $product_address);
          $this->bind(":product_desc", $product_desc);
          $this->bind(":product_status_id", $product_status_id);
          $this->bind(":product_avail_status_id", $product_avail_status_id);
          $this->bind(":product_condition", $product_condition);
          $this->bind(":product_price", $product_price);
          $this->bind(":product_school_id", $product_school_id);
          $this->bind(":product_user_id", $product_user_id);
          $this->bind(":product_category_id", $product_category_id);
          $this->bind(":product_show_email", $product_show_email);
          $this->bind(":product_show_phone", $product_show_phone);
          $this->executer();
          return $this->lastIdinsert();
        }catch(PDOException $e){
          echo $e->getMessage();
          return 0;
        }
    }

    public function insert_product_featured_image_id($image_id, $product_id)
    {
      $sql = "UPDATE products SET product_featured_image_id = :product_featured_image_id WHERE product_id = :product_id";
      $this->query($sql);
      $this->bind(':product_featured_image_id', $image_id);
      $this->bind(':product_id', $product_id);
      if($this->executer()){
        return TRUE;
      }
      return FALSE;
    }

    public function get_product_price_by_id($product_id)
    {
      $query = "SELECT product_price FROM products WHERE product_id = $product_id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $product_price;
    }

    public function is_product_in_cart($product_id, $user_id)
    {
      $query = "SELECT cart_id FROM cart WHERE cart_product_id = $product_id AND cart_user_id = $user_id";
      $this->query($query);
      $stmt = $this->executer();
      if($stmt->rowCount() > 0){
        return TRUE;
      }
      return FALSE;
    }

    public function get_product_name_by_id($id)
    {
      $query = "SELECT product_name FROM products WHERE product_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $product_name;
    }

    public function get_product_quantity_by_id($product_id)
    {
      $query = "SELECT product_quantity FROM products WHERE product_id = $product_id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $product_quantity;
    }

    public function get_total_amount()
    {
      # code...
    }

    public function get_cart_quantity_by_id($cart_id)
    {
      $query = "SELECT cart_quantity FROM cart WHERE cart_id = $cart_id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $cart_quantity;
    }

    public function add_to_cart($product_id, $user_id)
    {
      $product_price = $this->get_product_price_by_id($product_id);
      $sql = 'INSERT INTO cart(cart_product_id, cart_total_price, cart_user_id, cart_quantity)VALUES(:cart_product_id, :cart_total_price, :cart_user_id, :cart_quantity)';
      $this->query($sql);
      $this->bind(':cart_product_id', $product_id);
      $this->bind(':cart_total_price', $product_price);
      $this->bind(':cart_user_id', $user_id);
      $this->bind(':cart_quantity', 1);
      $this->executer();
      if ($this->lastIdinsert()) {
        return TRUE;
      }else {
        return FALSE;
      }
    }

    public function get_products($length) {
        $query = "SELECT * FROM products WHERE product_status_id != 2 ORDER BY RAND() LIMIT $length";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_cart_products_by_user_id($user_id) {
        $query = "SELECT * FROM cart WHERE cart_user_id = :user_id";
        $this->query($query);
        $this->bind(':user_id', $user_id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_products_by_user_id($user_id)
    {
      $query = "SELECT * FROM products WHERE product_user_id = :user_id";
      $this->query($query);
      $this->bind(':user_id', $user_id);
      $stmt = $this->executer();
      return $stmt;
    }

    public function get_products_by_category_id($id, $length) {
        $query = "SELECT * FROM products WHERE product_status_id != 2 AND product_category_id = :id LIMIT $length";
        $this->query($query);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_product_categories() {
        $query = "SELECT * FROM category ORDER BY RAND()";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_product_category() {
        $query = "SELECT * FROM category";
        $this->query($query);
        $stmt = $this->executer();
        if($stmt->rowCount()>0){
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
              <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
              <?php
          }
        }
    }

    public function get_total_number_of_products_by_id($id)
    {
      $sql = "SELECT product_id FROM products WHERE product_user_id = :id";
      $this->query($sql);
      $this->bind(':id', $id);
      $stmt = $this->executer();
      return $stmt->rowCount();
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
                <a href='#' cid = "<?php echo $category_id;?>" class='list-group-item category' ><?php echo $category_name; ?></a>
              <?php
            }
          }
        }

    public function display_availabe_products($length, $res, $category_id) {
      if($category_id == 0){
        $stmt = $this->get_products($length);
      }else{
        $stmt = $this->get_products_by_category_id($category_id, $length);
      }
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <div class='col-sm-4 col-lg-4 col-md-4'>
                    <div class='thumbnail'>
                      <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>                      
                          <div class='caption'>
                              <h4 class="hostelname"><a href='product_details.php?id=<?php echo $product_id; ?>'><?php echo $product_name; ?></a></h4>
                              <h5 class='text-danger'>N<?php echo $product_price; ?></h5>
                              <p><?php echo getExcerpt($product_desc, 100); ?></p>
                          </div>
                          <div class="tags">
                              <span class="label label-danger"><?php echo $this->get_product_school_by_id($product_school_id); ?></span>
                              <span class="label label-purple"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                              <span class="label label-default"><?php echo $product_review_count; ?> reviews</span>
                          </div>
                    </div>
                </div>
                <?php
            }
        }else{
          echo "No Item added on this category yet... Add yours";
        }
    }

    public function display_index_products($length, $res) {
        $stmt = $this->get_products($length);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <div class="col-md-5 pad-bottom-20">
                 <div class="col-md-6">
                 <?php $res::display("Rischoola/profiles/tn8YZk4247_C360_2015-03-30-16-37-19-188.jpg", array_merge($res::SAMPLE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>                   
                         </div>
                         <div class="col-md-6">
                             <h5 class="" style="text-align:left"><a href="marketplace/product_details.php?id=<?php echo $product_id; ?>"><?php echo $product_name; ?></a></h5>
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
