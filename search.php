<?php
require_once 'init.php';
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once 'include/member_header.php';
} else {
    require_once 'include/header.php';
} ?>

<section id="search-results" class="marg-to-50 margin-btom-20">
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['search_set'])) {
                $term = $_POST['term'];
                if ($term != "" || !isset($term) || !empty($term)) {

                    $post_stmt = $newsControler->get_search_post($term);
                    $scholarship_stmt = $scholarshipController->get_search_scholarships($term);
                    $lodge_stmt = $lodgeController->get_search_lodge($term);
                    $store_stmt = $storeController->get_search_products($term);
                    $group_stmt = $groupController->get_search_groups($term);
                    $event_stmt = $eventController->get_search_events($term);

                    $total = $post_stmt->rowCount() + $scholarship_stmt->rowCount() + $lodge_stmt->rowCount() + $store_stmt->rowCount() + $group_stmt->rowCount() + $event_stmt->rowCount(); ?>
                    <h2 class="marg-to-60">(<?php echo $total ?>) Search Results for "<?php echo $term ?>"</h2>

                    <?php

                    // Post Search
                    if ($post_stmt->rowCount() > 0) {
                        echo '
							<div class="col-md-6">
								<h3>News (' . $post_stmt->rowCount() . ' results found)</h3>
								<hr>';
                        while ($post_row = $post_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($post_row); ?>


                            <div class="search-results">
                                <h4><a href="news/read-news.php?id=<?php echo $post_id ?>"><?php echo $post_title ?></a></h4>

                                <p> <?php echo getExcerpt($post_content, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }


                    // Scholarship Search

                    echo '<div class="col-md-6">';
                    if ($scholarship_stmt->rowCount() > 0) {
                        echo '
						<h3>Scholarships (' . $scholarship_stmt->rowCount() . ' results found)</h3>
						<hr>';
                        while ($scholarship_row = $scholarship_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($scholarship_row); ?>
                            <div class="search-results">
                                <h4><a href="scholarships/view-scholarship.php?id=<?php echo $scholarship_id;?>"><?php echo $scholarship_title ?></a></h4>

                                <p> <?php echo getExcerpt($scholarship_desc, 100); ?></p>
                            </div>
                        <?php }
                        echo '</div>';
                    }


                    // Lodge Search

                    if ($lodge_stmt->rowCount() > 0) {
                        echo '
						<div class="col-md-6">
							<h3>Lodges (' . $lodge_stmt->rowCount() . ' results found)</h3>
							<hr>';
                        while ($lodge_row = $lodge_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($lodge_row); ?>
                            <div class="search-results">
                                <h4><a href="lodges/hostel_detail.php?id=<?php echo $lodge_id; ?>"><?php echo $lodge_name ?></a></h4>

                                <p> <?php echo getExcerpt($lodge_desc, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }


                    // Roommates Search
                    $roommate_stmt = $roommateController->get_search_roommates($term);
                    if ($roommate_stmt->rowCount() > 0) {
                        echo '
						<div class="col-md-6">
							<h3>Roommates (' . $roommate_stmt->rowCount() . ' results found)</h3>
							<hr>';
                        while ($roommate_row = $roommate_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($roommate_row); ?>
                            <div class="search-results">
                                <h4><a href="#"><?php echo $roommate_name ?></a></h4>

                                <p> <?php echo getExcerpt($roommate_desc, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }


                    // Store Search

                    if ($store_stmt->rowCount() > 0) {
                        echo '
						<div class="col-md-6">
							<h3>Products (' . $store_stmt->rowCount() . ' results found)</h3>
							<hr>';
                        while ($store_row = $store_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($store_row); ?>
                            <div class="search-results">
                                <h4><a href="marketplace/product_details.php?id=<?php echo $product_id; ?>"><?php echo $product_name ?></a></h4>

                                <p> <?php echo getExcerpt($product_desc, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }


                    // Group Search

                    if ($group_stmt->rowCount() > 0) {
                        echo '
						<div class="col-md-6">
							<h3>Groups (' . $group_stmt->rowCount() . ' results found)</h3>
							<hr>';
                        while ($group_row = $group_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($group_row); ?>
                            <div class="search-results">
                                <h4><a href="groups/group_page.php?id=<?php echo $group_id; ?>"><?php echo $group_title ?></a></h4>

                                <p> <?php echo getExcerpt($group_desc, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }

                    // Event Search

                    if ($event_stmt->rowCount() > 0) {
                        echo '
							<div class="col-md-6">
								<h3>Events (' . $event_stmt->rowCount() . ' results found)</h3>
								<hr>';
                        while ($event_row = $event_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($event_row); ?>
                            <div class="search-results">
                                <h4><a href="events/view_event.php?id=<?php echo $event_id; ?>"><?php echo $event_title ?></a></h4>

                                <p> <?php echo getExcerpt($event_desc, 100); ?></p>
                            </div>

                        <?php }
                        echo '</div>';
                    }

                }
            }
        }
        ?>
    </div>
</section>