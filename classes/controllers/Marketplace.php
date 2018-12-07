<?php

class Marketplace extends Logger
{

    private static $instance;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function add_product(MarketplaceModel $productModel)
    {
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
        try {
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
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return 0;
        }
    }

    public function insert_product_featured_image_id($image_id, $product_id)
    {
        try {
            $sql = "UPDATE products SET product_featured_image_id = :product_featured_image_id WHERE product_id = :product_id";
            $this->query($sql);
            $this->bind(':product_featured_image_id', $image_id);
            $this->bind(':product_id', $product_id);
            if ($this->executer()) {
                return TRUE;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    public function get_related_products($school_id, $length)
    {
        try {
            $query = "SELECT * FROM products WHERE product_school_id = :school_id AND product_status_id != 2 ORDER BY RAND() LIMIT $length";
            $this->query($query);
            $this->bind(':school_id', $school_id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage(). ' ==>' . __CLASS__ . '=>' . __FUNCTION__." ". get_user_uid();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function is_product_in_cart($product_id, $user_id)
    {
        try {
            $query = "SELECT cart_id FROM cart WHERE cart_product_id = $product_id AND cart_user_id = $user_id";
            $this->query($query);
            $stmt = $this->executer();
            if ($stmt->rowCount() > 0) {
                return TRUE;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    public function get_product_name_by_id($id)
    {
        try {
            $query = "SELECT product_name FROM products WHERE product_id = $id";
            $this->query($query);
            $row = $this->resultset();
            return $row['product_name'];
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_quantity_by_id($product_id)
    {
        try {
            $query = "SELECT product_quantity FROM products WHERE product_id = $product_id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $product_quantity;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_total_amount()
    {
        # code...
    }

    public function get_cart_quantity_by_id($cart_id)
    {
        try {
            $query = "SELECT cart_quantity FROM cart WHERE cart_id = $cart_id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $cart_quantity;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function add_to_cart($product_id, $user_id)
    {
        try {
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
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    public function get_product_price_by_id($product_id)
    {
        try {
            $query = "SELECT product_price FROM products WHERE product_id = $product_id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $product_price;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_cart_products_by_user_id($user_id)
    {
        try {
            $query = "SELECT * FROM cart WHERE cart_user_id = :user_id";
            $this->query($query);
            $this->bind(':user_id', $user_id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_products_by_user_id($user_id)
    {
        try {
            $query = "SELECT * FROM products WHERE product_user_id = :user_id";
            $this->query($query);
            $this->bind(':user_id', $user_id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_category($id = 0)
    {
        try {
            if (!$id == 0) {
                $query = "SELECT * FROM category WHERE category_id != :id";
            } else {
                $query = "SELECT * FROM category";
            }
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
                    <?php
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    public function get_total_number_of_products_by_id($id)
    {
        try {
            $sql = "SELECT product_id FROM products WHERE product_user_id = :id";
            $this->query($sql);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_by_id($id)
    {
        try {
            $query = "SELECT * FROM products WHERE product_id = $id";
            $this->query($query);
            $row = $this->resultset();
            return $row;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_category_by_id($id)
    {
        try {
            $query = "SELECT category_name FROM category WHERE category_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $category_name;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_username_by_id($id)
    {
        try {
            $query = "SELECT user_user_name FROM users WHERE user_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $user_user_name;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_review_count_by_id($id)
    {
        try {
            $query = "SELECT product_review_count FROM products WHERE product_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $product_review_count;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_search_products($term)
    {
        try {
            $query = "SELECT product_id, product_name, product_desc FROM products WHERE product_desc LIKE '%$term%' OR product_name LIKE '%$term%'";
            $this->query($query);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_by_user_id($user_id)
    {
        try {
            $query = "SELECT * FROM products WHERE product_user_id = $user_id";
            $this->query($query);
            $row = $this->resultset();
            return $row;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function getExcerpt($content, $length)
    {
        if (strlen($content) < $length) {
            return $content;
        } else {
            $content = substr($content, 0, $length);
            return $content . ' ...';
        }
    }

    public function display_category()
    {
        try {
            $stmt = $this->get_product_categories();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <a href='#' cid="<?php echo $category_id; ?>"
                       class='list-group-item category'><?php echo $category_name; ?></a>
                    <?php
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    public function get_product_categories()
    {
        try {
            $query = "SELECT * FROM category ORDER BY RAND()";
            $this->query($query);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function display_availabe_products($length, $limit, Resources $res, $category_id)
    {
        if ($category_id == 0) {
            $stmt = $this->get_products($length, $limit);
        } else {
            $stmt = $this->get_products_by_category_id($category_id, $length, $limit);
        }
        try {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <?php $res::display($res->get_image_url($product_id, 'product'), array_merge($res::DETAILS_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                            <div class='caption'>
                                <h4 class="hostelname"><a
                                        href='marketplace/<?php echo $product_id; ?>'><?php echo getExcerpt($product_name, 25); ?></a>
                                </h4>
                                <h5 class='text-danger'>N<?php echo $product_price; ?></h5>

                                <p><?php echo getExcerpt($product_desc, 50); ?></p>
                            </div>
                            <div class="tags">
                                <span
                                    class="label label-danger"><?php echo $this->get_product_school_by_id($product_school_id); ?></span>
                                <span
                                    class="label label-purple"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                                <!-- <span class="label label-default"><?php echo $product_review_count; ?> reviews</span> -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No Item added on this category yet... Add yours";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    public function get_products($length, $limit)
    {
        try {
            $query = "SELECT * FROM products WHERE product_status_id != 2 ORDER BY RAND() LIMIT :length, :limit";
            $this->query($query);
            $this->bind(':length', $length);
            $this->bind(':limit', $limit);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_products_by_category_id($id, $length, $limit)
    {
        try {
            $query = "SELECT * FROM products WHERE product_status_id != 2 AND product_category_id = :id LIMIT :length, :limit";
            $this->query($query);
            $this->bind(':id', $id);
            $this->bind(':length', $length);
            $this->bind(':limit', $limit);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_school_by_id($id)
    {
        try {
            $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $school_abbr;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_product_status_by_id($id)
    {
        try {
            $query = "SELECT status_body FROM statuses WHERE status_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $status_body;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function display_index_products($length, $res)
    {
        try {
            $stmt = $this->get_products($length);
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <div class="col-md-4 col-xs-12 pad-bottom-20">
                        <div class="row img-responsive">
                            <div class="col-md-5 col-sm-4">
                                <?php $res::display($res->get_image_url($product_id, 'product'), array_merge($res::SAMPLE_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                            </div>
                            <div class="col-md-7 col-sm-8">
                                <h5 class="" style="text-align:left"><a
                                        href="marketplace/<?php echo $product_id; ?>"><?php echo getExcerpt($product_name, 50); ?></a>
                                </h5>
                                <span class="label label-default">₦ <?php echo $product_price; ?></span>
                                <span
                                    class="label label-danger"><?php echo $this->get_product_school_by_id($product_school_id); ?></span>
                                <span
                                    class="label label-purple"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    private function __clone()
    {

    }

    public function display_related_products(Users $user, $school_id, $length)
    {
        try {
            $stmt = $this->get_related_products($school_id, $length);
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <div class="product col-lg-3 col-sm-6">
                        <div class="product-thumb">
                            <a href="#" class="thumb-link">
                                <img class="hover-img" src="<?php echo SITEURL; ?>/res/imgs/product/6-hover.jpg"
                                     alt="Product Hover">
                                <img class="front-img" src="<?php echo SITEURL; ?>/res/imgs/product/6.jpg"
                                     alt="Product Front">
                            </a>

                            <div class="attr-group">
                                <span class="new"><?php echo $this->get_product_status_by_id($product_status_id); ?></span>
                            </div>
                            <a class="to-cart" href="#"><i class="fa fa-shopping-cart"></i>
                                Message <?php echo $user->get_user_username_by_id($product_user_id); ?></a>

                            <div class="product-btn">
                                <a class="to-view" data-fancybox-type="iframe"
                                   href="<?php echo $product_slug; ?>--<?php echo $product_id; ?>"><i class="fa fa-eye"></i><span
                                        class="tooltip">Quick View</span></a>
                                <a class="to-wish" href="#"><i class="fa fa-heart"></i><span class="tooltip">Add To Wishlist</span></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name"><a
                                    href="<?php echo $product_slug; ?>--<?php echo $product_id; ?>"><?php echo $product_name; ?></a>
                            </h5>
                            <p class="price">$<?php echo $product_price; ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage(). ' ==>' . __CLASS__ . '=>' . __FUNCTION__." ". get_user_uid();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

}
