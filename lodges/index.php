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

<section id="hostel">
    <div class="container pad-up-50">
        <div class="row">
            <div class="searchHostel col-md-4  margin-btom-20 pad-bottom-20">
                <div class="form-group">
                    <label for="school">Enter School</label>
                    <select class="form-control" id="list_of_schools">
                        <?php $schoolController->get_schools(); ?>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-xs-6">
                        <label for="">Max Price</label>
                        <input id="max_price" type="text" class="form-control"></input>
                    </div>
                    <div class="col-xs-6">
                        <label for="">Min Price</label>
                        <input id="min_price" type="text" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="school">Hostel Name</label>
                    <input type="text" id="hostel_name" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="school">Hostel type</label>
                    <select class="form-control" id="hostel_type">
                        <?php $lodgeController->get_lodge_models();?>
                    </select>
                </div>
                <?php // echo  __DIR__?>
                <!--changes made-->
                <div class="form-group">
                    <div class="">
                        <button id="hostel_search" type="submit" class="btn btn-block btn-success">Search</button>
                    </div>
                </div>
                <!--changes finished here-->

                <br />
                <h5 class="side-header">Hostel Facilities </h5>
                <div class="checkbox-items">
                    <div class="checkbox">
                        <label><input type="checkbox">24/7 Power Supply</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Constant water</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Security</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Free Gym</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Tilled Floor</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Internet WiFi</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Cable TV</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Common Room</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Share Kitchen</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Nearby Carteen</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Air Condition</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Furnished Rooms</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Parking Space</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Nearby Worship Center</label>
                    </div>

                </div>
                <br />
                <h5 class="side-header">Hostel Rules </h5>
                <div class="checkbox-items">
                    <div class="checkbox">
                        <label><input type="checkbox">24/7 Power Supply</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Constant water</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Security</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Free Gym</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Tilled Floor</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Internet WiFi</label>
                    </div>
                </div>
                <div>
                </div>
            </div>


            <div class="col-md-8">
                <h2>Available Hostels For Rent</h2>
                <div class="row">
                    <div id="lodge_content">
                    <?php
                        $limit = 12; //if you want to dispaly 10 records per page then you have to change here
                        $startpoint = ($page * $limit) - $limit;?>
                        <?php $lodgeController->display_availabe_lodges($startpoint, $limit, $resources); ?>
                    </div>

                    <!--  Pagination starts here -->
                    <div class="col-lg-12 pagination text-center">
                        <ul class="pagination">
                            <?php echo $paging->pagination("lodges", $limit, $page);?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
require_once '../include/footer.php';
