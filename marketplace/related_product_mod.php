
<div class="shop-module related-module">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="module-header">
                    <h3 class="module-title">Related Products</h3>
                    <div class="module-sep"><div class="decorative-icons"></div><div class="decorative-bars"></div></div>
                    <p class="module-subtitle">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="products-wrap">
              <?php $storeController->display_related_products($userController, $product_school_id, 4);?>
            </div>
        </div>
    </div>
</div>
