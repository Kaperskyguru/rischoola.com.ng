<?php
require '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}
?>
?>
<section id="roomate" class="container">
    <div class="container pad-up-50">
        <div class="row margin-btom-20">
          <div class="col-md-9 group_layout">
            <h2>Available Roommates</h2>
            <div class="row" style="padding-top: 20px;margin: 10px;background-color:#eee">
              <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>School:</label>
                            <select class="form-control">
                                <option disabled="true" selected="">Select a school from here to get latest information</option>
                                <?php $schoolController->get_schools(); ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <label>Gender:</label>
                                <select class="form-control" id="roommate_gender">
                                    <option disabled="true" selected="">Select gender information</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Type:</label>
                                <select class="form-control">
                                    <option disabled="true" selected="">Select Roommate Type</option>
                                    <option value ="0">I Have A Room</option>
                                    <option value="1">I Dont Have A Room</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                        <button type="submit" class="fa fa-search btn-lg btn-block btn-success"> Search</button>                        </div>
                    </div>

              </div>
            </div>
            <div class="pad-up-20">
            <?php $roommateController->display_availabe_roommates(12, $resources); ?>
            </div>
            <!--  Pagination starts here -->
            <div class="margin-btom-20 pagination">
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
                    <li class="last-child"><a href="#">last</a></li>
                </ul>
            </div>
            </div>

            <div class="col-md-3">
              <div class="container">
                <!-- <div class="col-md-3"> -->
                <div class="row">
                    <!-- <?php require '../include/tabs.php'; ?> -->
                    <!-- <div class="col-sm-12"> -->
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
                    <!-- </div> -->
                </div>
              </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
