<div class="container">
    <h2>Rischoola Marketplace</h2>

<!--    <div class="col-md-12">-->
        <?php           $page = 1;
                        $limit = 6; //if you want to dispaly 10 records per page then you have to change here
                        $startpoint = ($page * $limit) - $limit;?>
                        <?php $storeController->display_availabe_products($startpoint, $limit, $resources, 0); ?>
        <div class="text-center col-lg-12 pad-bottom-20">
            <a href="marketplace" class="btn btn-success" style="margin-bottom: 10px;">Visit Marketplace</a>
            <a href="<?php echo $url = (get_user_uid() != null) ? "member/add_product.php" : "users/login"; ?>"
               class="btn btn-success" style="margin-bottom: 10px;">Sell An Item Now</a>
        </div>
<!--    </div>-->
</div>
