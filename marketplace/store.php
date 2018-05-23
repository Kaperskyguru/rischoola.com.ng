<?php
require_once '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require_once '../include/member_header.php';
}else {
  require_once '../include/header.php';
}



?>
<section id="store">
	<div class="container pad-up-50">
		<h2>Welcome To Our Store</h2>
		<div class="row">
			<div class="col-md-3">
			    <div id="get_category">
			        <div class='list-group'>
								<a href='#' class='list-group-item category active'>Category</a>
                <a href='#' cid = "0" class='list-group-item category' >All Categories</a>
									<?php $storeController->display_category();?>
			        </div>
			    </div>
				</div>
				<div class="col-md-9 col-sm-9">
          <div class="row" id="products">
              <?php $storeController->display_availabe_products(15, $resources, 0);?>
          <!-- </div> -->
				<!--  Pagination starts here -->
				<div class="col-lg-12 pagination text-center">
						<ul class="pagination">
								<li class="active"><a>1</a></li>
								<li class=""><a href="#">2</a></li>
								<li class=""><a href="#">3</a></li>
								<li class=""><a href="#">4</a></li>
								<li class=""><a href="#">5</a></li>
								<li class=""><a href="#">6</a></li>
								<li class=""><a href="#">7</a></li>
								<li class=""><a href="#">8</a></li>
								<li class=""><a href="#">9</a></li>
								<li class=""><a href="#">10</a></li>
								<li class=""><a href="#">11</a></li>
								<li><a href="#">Next »</a></li>
								<li class="last-child"><a href="#">last »»</a></li>
						</ul>
				</div>
      </div>
		</div>
</div>
			</div>
		<!-- </div> -->

		</div>

	</section>

<?php
require_once '../include/footer.php';
?>
<script>
  $(document).ready(function() {

    $("body").delegate('.category','click', function(e) {
      var cid = $(this).attr('cid');
      e.preventDefault();
      $.ajax({
        method:'post',
        url:'get_products.php',
        data: {cate:1, cid:cid},
        success: function(data) {
          $('#products').html(data);
        }
      });
    });

    $('body').delegate('#product', 'click', function(e) {
      var pid = $(this).attr('pid');
      $.ajax({
        method: "post",
        url: 'get_products.php',
        data: {add_to_cart:1, pid:pid},
        success: function(d) {
        }
      });
    });
  });
</script>
