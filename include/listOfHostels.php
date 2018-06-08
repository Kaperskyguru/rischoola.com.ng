<div class="container">
    <h2>Lodges For Rent</h2>
    <?php 
    $page = 1;
    $limit = 6; //if you want to dispaly 10 records per page then you have to change here
    $startpoint = ($page * $limit) - $limit;?>
    <?php $lodgeController->display_availabe_lodges($startpoint, $limit, $resources); ?>
    <div class="row">
        <div class="text-center col-lg-12 pad-bottom-20">
            <a href="lodges" class="btn btn-success" style="margin-bottom: 10px;">View All Available
                Hostels</a>

            <a href="<?php echo $url = (get_user_uid() != null)? "member/add_lodges.php":"users/login.php"; ?>" class="btn btn-success " style="margin-bottom: 10px;">Post An Hostel
                Now</a>
        </div>
    </div>
</div>
