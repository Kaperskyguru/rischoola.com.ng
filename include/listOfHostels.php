<div class="container">
    <h2>Lodges For Rent</h2>
    <?php $lodgeController->display_availabe_lodges(6, $resources); ?>

    <div class="row">
        <div class="col-md-5">
            <a href="lodges/hostels.php" class="btn btn-success" style="margin-bottom: 10px;">View All Available
                Hostels</a>

            <div class="col-md-7">
                <a href="<?php echo $url = (get_user_uid() != null)? "member/add_lodges.php":"users/login.php"; ?>" class="btn btn-success " style="margin-bottom: 10px;">Post An Hostel
                    Now</a>
            </div>
        </div>
    </div>
