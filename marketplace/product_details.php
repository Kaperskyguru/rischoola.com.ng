<?php
require '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}


$id1 = $_GET['id']; //sanitizer($_GET["id"]);
$id = intval($id1);
if ($id == 0) {
    //logging goes here
    header("Location:../index.php");
} else {
    $row = $storeController->get_product_by_id($id);
    if (is_null($row)) {
        //logging goes here
    } else {
        ?>
        <div class="container marg-to-60">
            <section>
                <!-- Products -->
                <div class="row">
                    <div id="product-wrap" class="list_mode">
                        <div class="product single-product col-lg-12 new featured">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-product-thumb">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#thumb-1" aria-controls="thumb-1" role="tab" data-toggle="tab"><img src="../res/imgs/product/thumb-1.jpg" alt="..."></a></li>
                                            <li role="presentation"><a href="#thumb-2" aria-controls="thumb-2" role="tab" data-toggle="tab"><img src="../res/imgs/product/thumb-2.jpg" alt="..."></a></li>
                                            <li role="presentation"><a href="#thumb-3" aria-controls="thumb-3" role="tab" data-toggle="tab"><img src="../res/imgs/product/thumb-3.jpg" alt="..."></a></li>
                                            <li role="presentation"><a href="#thumb-4" aria-controls="thumb-4" role="tab" data-toggle="tab"><img src="../res/imgs/product/thumb-4.jpg" alt="..."></a></li>
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
                                                    <input class="form-control" type="number" id="quantity_order" name="quantity_order" min="1" max="12" value="1" required>
                                                    <div class="form-group">
                                                        <label style="color:red"> Calculating: 1 X <?php echo $product_price;?> = </label>
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
                                                <button class="to-cart" type="submit" name="to-cart"><i class="fa fa-plus"></i> Message <?php echo $storeController->get_product_username_by_id($product_user_id); ?></button>
                                                <div class="product-btn">
                                                    <button class="to-wish"><i class="fa fa-heart"></i><span class="tooltip">Add To Wishlist</span></button>
                                                </div>
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
        </div>
</div>
<?php //require_once 'related_hostel_mod.php'; ?>
</section>
</div>
<?php
include 'footer.php';
