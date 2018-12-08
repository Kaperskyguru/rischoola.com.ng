<?php
require_once '../init.php';
echo set_title('Latest Groups', 'Schooling in rivers state just got easier - '.get_site_name());
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once '../include/member_header.php';
} else {
    require_once '../include/header.php';
}
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
?>

    <section id="groups">
        <div class="container pad-up-50">
            <div class="row">
                <div class="col-md-9">
                    <h2>Groups</h2>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <select id="group_search" class="form-control">
                                    <option disabled="true" selected="">Select a school from here to get latest
                                        information
                                    </option>
                                    <?php $schoolController->get_schools(); ?>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <button class="btn btn-default form-control">Go to Page</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Latest Groups</h2>
                            <div id="group_content">
                            <?php 
                                $limit = 8; //if you want to dispaly 4 records per page then you have to change here
                                $startpoint = ($page * $limit) - $limit;
                                $groupController->display_availabe_groups($startpoint, $limit, $resources); ?>
                            </div>

                            <!--  Pagination starts here -->
                            <div class="margin-btom-20">
                                <ul class="pager">
                                    <?php echo $paging->pager('groups WHERE group_status_id != 2', $limit, $page); ?> 
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h2>Popular Groups</h2>
                            <?php 
                                $P_limit = 4; //if you want to dispaly 4 records per page then you have to change here
                                $startpoint = ($page * $P_limit) - $P_limit;
                                $groupController->display_availabe_groups($startpoint, $P_limit, $resources); ?>

                            <!--  Pagination starts here -->
                            <div class="margin-btom-20">
                                <ul class="pager">
                                    <?php echo $paging->pager('groups WHERE group_status_id != 2', $P_limit, $page); ?> 
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h2>Trending Groups</h2>
                            <?php 
                                $T_limit = 4; //if you want to dispaly 4 records per page then you have to change here
                                $startpoint = ($page * $T_limit) - $T_limit;
                                $groupController->display_availabe_groups($startpoint, $T_limit, $resources); ?>

                            <!--  Pagination starts here -->
                            <div class="margin-btom-20">
                                <ul class="pager">
                                <?php echo $paging->pager('groups WHERE group_status_id != 2', $T_limit, $page); ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pad-up-50">
                    <div class="row">
                        <!-- <?php //require '../include/tabs.php'; ?> -->
                        <div class="pad-bottom-20">
                            <img src="../res/imgs/8722.gif" class="img-responsive">
                        </div>
                        <div class="pad-bottom-20">
                            <img src="../res/imgs/p.gif" class="img-responsive">
                        </div>
                        <div class="pad-bottom-20">
                            <img src="../res/imgs/m.png" class="img-responsive">
                        </div>
                        <div class="pad-bottom-20">
                            <img src="../res/imgs/s.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require_once '../include/footer.php';
?>
