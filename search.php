<?php
require_once 'init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
    require 'member_header.php';
  }else {
    require 'header.php';
  }

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['search_set'])){
        $term = $_POST['term'];
        if ($term != "" || !isset($term) || !empty($term)){

            // Post Search
            $post_stmt = $newsControler->get_search_post($term);
            echo '<div id="se">';
            if($post_stmt->rowCount() > 0){
                echo '<h3> Total Number of Post ('.$post_stmt->rowCount().') </h3>';
                while($post_row = $post_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($post_row);?>
                    <p>
                        <h4><?php echo $post_title ?></h4>
                        <p> <?php echo getExcerpt($post_content, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';

            // Scholarship Search
            $scholarship_stmt = $scholarshipController->get_search_scholarships($term);
            echo '<div id="se">';
            if($scholarship_stmt->rowCount() > 0){
                echo '<h3> Total Number of Scholarships ('.$scholarship_stmt->rowCount().') </h3>';
                while($scholarship_row = $scholarship_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($scholarship_row);?>
                    <p>
                        <h4><?php echo $scholarship_title ?></h4>
                        <p> <?php echo getExcerpt($scholarship_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';

            // Lodge Search
            $lodge_stmt = $lodgeController->get_search_lodge($term);
             echo '<div id="se">';
            if($lodge_stmt->rowCount() > 0){
                echo '<h3> Total Number of Lodges ('.$lodge_stmt->rowCount().') </h3>';
                while($lodge_row = $lodge_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($lodge_row);?>
                    <p>
                        <h4><?php echo $lodge_name ?></h4>
                        <p> <?php echo getExcerpt($lodge_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';


            // Roommates Search
            $roommate_stmt = $roommateController->get_search_roommates($term);
             echo '<div id="se">';
            if($roommate_stmt->rowCount() > 0){
                echo '<h3> Total Number of Roommates ('.$roommate_stmt->rowCount().') </h3>';
                while($roommate_row = $roommate_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($roommate_row);?>
                    <p>
                        <h4><?php echo $roommate_name ?></h4>
                        <p> <?php echo getExcerpt($roommate_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';

            // Store Search
            $store_stmt = $storeController->get_search_products($term);
            echo '<div id="se">';
            if($store_stmt->rowCount() > 0){
                echo '<h3> Total Number of Products ('.$store_stmt->rowCount().') </h3>';
                while($store_row = $store_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($store_row);?>
                    <p>
                        <h4><?php echo $product_name ?></h4>
                        <p> <?php echo getExcerpt($product_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';

            // Group Search
            $group_stmt = $groupController->get_search_groups($term);
            echo '<div id="se">';
            if($group_stmt->rowCount() > 0){
                echo '<h3> Total Number of Groups ('.$group_stmt->rowCount().') </h3>';
                while($group_row = $group_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($group_row);?>
                    <p>
                        <h4><?php echo $group_title ?></h4>
                        <p> <?php echo getExcerpt($group_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';


            // Event Search
            $event_stmt = $eventController->get_search_events($term);
            echo '<div id="se">';
            if($event_stmt->rowCount() > 0){
                echo '<h3> Total Number of Events ('.$event_stmt->rowCount().') </h3>';
                while($event_row = $event_stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($event_row);?>
                    <p>
                        <h4><?php echo $event_title ?></h4>
                        <p> <?php echo getExcerpt($event_desc, 100); ?></p>

                    </p>

                <?php }

            }
            echo '</div>';


        }

    }

}
?>
<div id="sea">


</div>

<?php
// include_once ('footer.php');