<div class="container">
    <div class="row">
        <h2>Roommate In Need</h2>
        <div class="col-md-9">
            <?php
            $page = 1;
            $limit = 6; //if you want to dispaly 10 records per page then you have to change here
            $startpoint = ($page * $limit) - $limit;
            $roommateController->display_availabe_roommates($startpoint,$limit, $resources); ?>

            <div class="text-center col-lg-12 pad-bottom-20">
                <a href="roommates" class="btn btn-success" style="margin-bottom: 10px;">View All Available Roommates</a>
                <a href="<?php echo $url = (get_user_uid() != null)? "member/roommate.php":"users/login"; ?>" class="btn btn-success" style="margin-bottom: 10px;">Post To Get A Roommate</a>
            </div>
        </div>
        <!-- ADVERT -->
        <!-- <div class="col-md-3">
            <div class="row">
                <div class="pad-bottom-20">
                    <img src="res/imgs/p.gif" class="img-responsive">
                </div>
                <div class="pad-bottom-20">
                    <img src="res/imgs/m.png" class="img-responsive">
                </div>
                <div class="pad-bottom-20">
                    <img src="res/imgs/s.png" class="img-responsive">
                </div>
            </div>
        </div> -->
    </div>
</div>
