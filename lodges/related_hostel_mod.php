
<div class="shop-module related-module">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="module-header">
                    <h3 class="module-title">Nearby Hostels</h3>
                    <div class="module-sep"><div class="decorative-icons"></div><div class="decorative-bars"></div></div>
                    <p class="module-subtitle">Choose from the newly added and selected lodges near you.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="products-wrap">
              <?php $lodgeController->display_related_lodges($lodge_school_id, 4);?>
            </div>
        </div>
    </div>
</div>
