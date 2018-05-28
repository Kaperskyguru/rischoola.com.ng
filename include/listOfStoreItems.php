<div class="container">
  <h2>Rischoola Marketplace</h2>
  <?php $storeController->display_index_products(9, $resources);?>
  <div class="text-center col-lg-12 col-xs-12 pad-bottom-20">
    <a href="marketplace" class="btn btn-success">Visit Marketplace</a>
    <a href="<?php echo $url = (get_user_uid() != null)? "member/add_product.php":"users/login.php"; ?>" class="btn btn-success">Sell An Item Now</a>
  </div>
</div>
