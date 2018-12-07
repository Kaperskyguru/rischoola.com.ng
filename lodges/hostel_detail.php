<?php
require_once '../init.php';

$value = explode('--', $_GET['id']);
$slug = strval($value[0]);
$id = intval($value[1]);

echo set_title($lodgeController->get_lodge_name_by_id($id), get_site_name());
$userController->cookie_login();
if($userController->is_authenticated()){
  require_once '../include/member_header.php';
}else {
  require_once '../include/header.php';
}

if ($id == 0) {
  //logging goes here
    $logger->LogFatal("SQLInjection Attempt: code used ==> " . $_GET['id'], get_user_uid());
    exit(header("Location: index.php"));
} else {
    $row = $lodgeController->get_lodge_by_id_and_slug($id,$slug);
    if (is_null($row) || empty($row)) {
        //logging goes here
        exit(header("Location: index.php"));
    } else {
        ?>
        <div class="container marg-to-50 pad-up-50">
            <section id="hostel">
                <!-- Products -->
                <div class="row">
                    <div id="product-wrap" class="list_mode">
                        <div class="product single-product col-lg-12 new featured">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-product-thumb">
                                        <ul class="nav nav-tabs" role="tablist">
                                        <?php
                                            $image_stmt = $resources->get_multiple_image_id($id, 'lodge');
                                            $count = 0;
                                            if($image_stmt->rowCount() > 0){
                                                while($image_row = $image_stmt->fetch(PDO::FETCH_ASSOC)){
                                                    $count++;?>
                                                    <li role="presentation">
                                                        <a href="#thumb-<?php echo $count?>" aria-controls="thumb-<?php echo $count?>" role="tab" data-toggle="tab">
                                                            <?php $resources::display($image_row['resource_url'], array_merge($resources::SLIDE_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                            ?>
                                        </ul>

                                        <div class="tab-content">
                                        <?php
                                        $image_stmt = $resources->get_multiple_image_id($id, 'lodge');
                                            $count = 0;
                                            while($image_row_content = $image_stmt->fetch(PDO::FETCH_ASSOC)){
                                                $count++;?>
                                                <div role="tabpanel" class="tab-pane fade <?php echo $count == 1? 'in active':''?>" id="thumb-<?php echo $count?>">
                                                    <?php $resources::display($image_row_content['resource_url'], array_merge($resources::PRODUCT_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                                                </div>
                                        <?php }?>
                                        </div>
                                    <?php } else {?>
                                           Remove Kiss Daniel Imane and put NOT FOUND IMAGE HERE
                                            <li role="presentation">
                                                <a href="#thumb-1" aria-controls="thumb-1" role="tab" data-toggle="tab">
                                                    <img src="../res/imgs/product/thumb-3.jpg" alt="..." />
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="thumb-1">
                                                <?php $resources::display("Rischoola/products/38lTdM0317_Kiss-Daniel-Good-Time-Hg2ArtWork-psd1-640x340_c.jpg", array_merge($resources::PRODUCT_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                                            </div>
                                        </div>
                                    <?php }?>
                                    </div>
                                </div>
                                <?php
                                extract($row);
                                ?>
                                <div class="col-md-6">
                                    <div class="product-info">
                                        <h5 class="product-name"><a><?php echo $lodge_name; ?></a></h5>
                                        <!-- <div class="product-review-wrap">
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
                                                <a href="#"><i class="fa fa-comment"></i> Read reviews (<?php echo $lodgeController->get_lodge_review_count_by_id($lodge_id); ?>)</a>
                                            </div>
                                            <div class="to-review-item to-write-review">
                                                <a href="#"><i class="fa fa-pencil-square-o"></i> Write a review</a>
                                            </div>
                                        </div> -->
                                        <div class="product-attr-table">
                                            <div class="attr-item">
                                                <div class="attr-cell name-cell">Model</div>
                                                <div class="attr-cell value-cell"><?php echo $lodgeController->get_lodge_model_by_id($lodge_model_id); ?></div>
                                            </div>
                                            <div class="attr-item">
                                                <div class="attr-cell name-cell">Condition</div>
                                                <div class="attr-cell value-cell"><?php echo $lodgeController->get_lodge_status_by_id($lodge_status_id); ?></div>
                                            </div>
                                        </div>
                                        <p class="price">#<?php echo $lodge_price; ?></p>
                                        <div class="product-description">
                                            <p><?php echo getExcerpt($lodge_desc, 150); ?></p>
                                        </div>
                                        <div class="product-description">
                                            <h5><img src="../res/icons/address.png" /><?php echo $lodge_address; ?></h5>
                                        </div>
                                        <form id="orderForm" class="order-form" action="#" method="post">
                                            <input type="hidden" name="price_order" value="27">
                                            <input type="hidden" name="currency_order" value="usd">

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
                                            <?php $username = $userController->get_user_username_by_id($lodge_user_id)?>
                                                <a href="../member/compose.php?user_user_name=<?php echo $username?>" style="text-decoration:none" class="to-cart" type="submit" name="to-cart"><i class="fa fa-plus"></i> Message <?php echo $username;?></a>
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
                                        <li role="presentation"><a href="#data-sheet" aria-controls="data-sheet" role="tab" data-toggle="tab">Data Sheet</a></li>
                                        <!-- <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li> -->
                                    </ul>

                                    <!-- Content panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="more-info">
                                            <p><?php echo $lodge_desc . '<p> <h3>ADDRESS</h3>' . $lodge_address . '</p>'; ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade data-sheet" id="data-sheet">
                                            <table class="table-responsive">
                                                <thead>
                                                    <tr>
                                                        <td class="data-attr">Lodge Facilities</td>
                                                        <td class="data-attr">Lodge Rules</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="data-value"><?php echo $lodge_facilities; ?></td>

                                                        <td class="data-value"><?php echo $lodge_rules; ?>Girly</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
<?php require_once 'related_hostel_mod.php';  ?>
</section>
</div>
<?php
require_once '../include/footer.php';
