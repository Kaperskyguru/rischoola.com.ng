<?php
require_once '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require_once '../include/member_header.php';
}else {
  require_once '../include/header.php';
}


$id1 = $_GET['id']; //sanitizer($_GET["id"]);
$id = intval($id1);
if ($id == 0) {
    $logger->LogFatal("SQLInjection Attempt: code used ==> " . $id1, get_user_uid());
    header("Location: index.php");
} else {
    $row = $storeController->get_product_by_id($id);
    if (is_null($row) || empty($row)) {
        header("Location: index.php");
    } else {
        ?>
        <div class="container-fluid marg-to-50 pad-up-20 margin-btom-20">
            <section>
                <!-- Products -->
                <div class="row">
                    <div id="product-wrap" class="list_mode">
                        <div class="prodct single-product col-lg-9 new featured ">
                            <div class="row group_layout" style="margin-left:5px; margin-right:5px;">
                                <div class="col-md-6">
                                    <div class="single-product-thumb">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <?php 
                                            $image_stmt = $resources->get_multiple_image_id($id, 'product');
                                            $count = 0;
                                                if($image_stmt->rowCount() > 0){
                                                    while($image_row = $image_stmt->fetch(PDO::FETCH_ASSOC)){
                                                        $count++;
                                                        extract($image_row);?>
                                                            <li role="presentation" class="active">
                                                                <a href="#thumb-<?php echo $count?>" aria-controls="thumb-<?php echo $count?>" role="tab" data-toggle="tab">
                                                                    <?php $resources::display($resource_url, array_merge($resources::SLIDE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                                                                </a>
                                                            </li>                                                        
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="thumb-1">
                                                <img src="../res/imgs/product/6.jpg" alt="...">
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="thumb-2">
                                                <img src="../res/imgs/product/6-hover.jpg" alt="...">   
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="thumb-3">
                                                <img src="../res/imgs/product/4.jpg" alt="...">
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="thumb-4">
                                                <img src="../res/imgs/product/2-hover.jpg" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                extract($row);
                                ?>
                                <div class="col-md-6">
                                    <div class="product-info">
                                        <h5 class="product-name"><a><?php echo $product_name; ?></a></h5>
                                        <div class="product-review-wrap">
                                            <div class="rating to-review-item" itemtype="http://schema.org/Offer" itemscope>
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
                                            <div class="to-review-item to-read-review">
                                                <a href="#"><i class="fa fa-comment"></i> Read reviews (<?php echo $storeController->get_product_review_count_by_id($product_id); ?>)</a>
                                            </div>
                                            <div class="to-review-item to-write-review">
                                                <a href="#"><i class="fa fa-pencil-square-o"></i> Write a review</a>
                                            </div>
                                        </div>
                                        <div class="product-attr-table">
                                            <div class="attr-item">
                                                <div class="attr-cell name-cell">Category</div>
                                                <div class="attr-cell value-cell"><?php echo $storeController->get_product_category_by_id($product_category_id); ?></div>
                                            </div>
                                            <div class="attr-item">
                                                <div class="attr-cell name-cell">Condition</div>
                                                <div class="attr-cell value-cell"><?php echo $storeController->get_product_status_by_id($product_status_id); ?></div>
                                            </div>
                                        </div>
                                        <p class="price">#<?php echo $product_price; ?></p>
                                        <div class="product-description">
                                            <p><?php echo getExcerpt($product_desc, 150); ?></p>
                                        </div>
                                        <div class="product-description">
                                            <h5><img src="../res/icons/address.png" /><?php echo $storeController->get_product_school_by_id($product_school_id); ?></h5>
                                        </div>
                                        <form id="orderForm" class="form-inline order-form" role="form" action="#" method="post">
                                            <input type="hidden" name="price_order" value="27">
                                            <input type="hidden" name="currency_order" value="usd">
                                            <div class="order-variations">
                                                <div class="order-variation quantity-variation">
                                                    <label>Quantity:</label>
                                                    <input class="form-control" type="number" id="quantity_order" name="quantity_order" pip="<?php echo $product_price;?>" min="1" max="12" value="1" required>
                                                    <div class="form-group">
                                                        <label style="color:red"> Calculating: 1 X <?php echo $product_price;?> = <span id="amount">N <?php echo (1 * $product_price);?></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-sharing">
                                                <div class="share-to-friend">
                                                    <a class="share-to-email" href="#"><i class="fa fa-envelope"></i> Send to a friend</a>
                                                    <a class="make-it-print" href="#"><i class="fa fa-print"></i> Print</a>
                                                </div>
                                                <div class="share-to-socials">
                                                    <a href="#" class="share-to-twitter share-to-social"><i class="fa fa-twitter"></i> Tweet</a>
                                                    <a href="#" class="share-to-facebook share-to-social"><i class="fa fa-facebook"></i> Share</a>
                                                    <a href="#" class="share-to-googleplus share-to-social"><i class="fa fa-google-plus"></i> Google+</a>
                                                    <a href="#" class="share-to-pinterest share-to-social"><i class="fa fa-pinterest"></i> Pinterest</a>
                                                </div>
                                            </div>
                                            <div class="list_mode_btns">
                                            <?php $username = $storeController->get_product_username_by_id($product_user_id);?>
                                                <a href="../member/compose.php?user_user_name=<?php echo $username?>" class="btn btn-success btn-lg" name="to-cart"><i class="fa fa-plus"></i> Message <?php echo $username; ?></a>
                                                <a class="btn btn-danger btn-lg to-wish"><i class=" fa fa-phone"></i>  <?php echo $retVal = ($product_show_phone == 1) ? $userController->get_user_phone_number_by_id($product_user_id) : "" ;?>
</a>
                                                <!-- <a class="btn btn-purple btn-lg to-wish"><i class=" fa fa-phone"></i>  solomoneseme@gmail.com</a> -->
                                                <!-- </div> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- More Product Information on Tab -->
                                <div class="product-information col-md-12">

                                    <!-- Information tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">More Info</a></li>
                                        <!-- <li role="presentation"><a href="#data-sheet" aria-controls="data-sheet" role="tab" data-toggle="tab">Data Sheet</a></li> -->
                                        <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>

                                    <!-- Content panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="more-info">
                                            <p><?php echo $product_desc; ?> <p> <h3>ADDRESS</h3>  <?php echo $storeController->get_product_school_by_id($product_school_id); ?>  </p></p>
                                        </div>
                                        <!-- <div role="tabpanel" class="tab-pane fade data-sheet" id="data-sheet">
                                            <table class="table-responsive">
                                                <thead>
                                                    <tr>
                                                        <td class="data-attr">Lodge Facilities</td>
                                                        <td class="data-attr">Lodge Rules</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="data-value"><?php echo $product_facilities; ?></td>

                                                        <td class="data-value"><?php echo $product_rules; ?>Girly</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                        <div role="tabpanel" class="tab-pane fade" id="reviews">
                                            <ul class="reviews">
                                                <li class="review tab-pane">
                                                    <div class="review-head">
                                                        <div class="grade">
                                                            <label>Grade </label>
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
                                                        </div>
                                                        <h5 class="reviwer">Code chant</h5>
                                                        <p class="review-date">3/20/2017</p>
                                                    </div>
                                                    <div class="review-body">
                                                        <h5 class="review-title">Test Review</h5>
                                                        <p class="review-content">This is a great product according to usability.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="btn-write-review"><i class="fa fa-pencil-square-o"></i> Write a review</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="row" style="margin-left:2px; margin-right:2px;">
                  <?php require_once '../include/tabs.php'; ?>
                  <div class="col-sm-12">
                      <div class="pad-bottom-20">
                          <img src="../res/imgs/8722.gif" class="img-responsive">
                      </div>
                      <div class="pad-bottom-20">
                          <img src="../res/imgs/p.gif" class="img-responsive">
                      </div>
                      <div class="pad-bottom-20">
                          <img src="../res/imgs/m.png" class="img-responsive">
                      </div>

                  </div>
                </div>
            </div>

        <?php require_once 'related_hostel_mod.php'; ?>
        </div>
</div>

</section>
</div>
<?php
require_once '../include/footer.php';?>
<script>
    $(document).ready(function() {
        
    });
</script>
