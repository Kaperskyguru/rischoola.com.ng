<?php
require_once '../init.php';
include 'header.php';
?>
<section id="store">
	<div class="container pad-up-50">
		<h2>Welcome To Our Store</h2>
		<div class="row">
			<div class="col-md-3">
			    <div id="get_category">
			        <div class='list-group'>
								<a href='#' class='list-group-item category active'>Category</a>
                <a href='#' class='list-group-item category' >All Categories</a>
									<?php $storeController->display_category(); ?>
			        </div>
			    </div>
				</div>
			<!-- <div class="col-sm-9"> -->
				<div class="col-sm-9">
				<?php $storeController->display_availabe_products(14, "../");?>
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
		<!-- </div> -->

		</div>

	</section>

<?php
include 'footer.php';
?>
