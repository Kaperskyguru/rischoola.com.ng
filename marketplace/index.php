<?php
require_once '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require_once '../include/member_header.php';
}else {
  require_once '../include/header.php';
}
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
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
          <div class="row">
						<div id="products">
						<?php
                        $limit = 12; //if you want to dispaly 10 records per page then you have to change here
                        $startpoint = ($page * $limit) - $limit;?>
                        <?php $storeController->display_availabe_products($startpoint, $limit, $resources, 0); ?>
          </div>
				<!--  Pagination starts here -->
				<div class="col-lg-12 pagination text-center">
				<ul class="pagination">
                            <?php echo $paging->pagination("products", $limit, $page);?>
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
