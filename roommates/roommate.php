<?php
require_once '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require_once '../include/member_header.php';
}else {
  require_once '../include/header.php';
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
                            <select id="roommate_school" class="form-control">
                                <option disabled="true" selected="">Select a school from here to get latest information</option>
                                <?php $schoolController->get_schools(); ?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <label>Gender:</label>
                                <select id="roommate_gender" class="form-control" id="roommate_gender">
                                    <option value= 0 selected="">Select gender information</option>
                                    <option value= 1>Male</option>
                                    <option value= 2 >Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Type:</label>
                                <select id="roommate_type" class="form-control">
                                    <option value= 0 selected="">Select Roommate Type</option>
                                    <option value = 1>I Have A Room</option>
                                    <option value= 2>I Dont Have A Room</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                        <button id="roommate_search_submit" type="submit" class="fa fa-search btn-lg btn-block btn-success"> Search</button>                        </div>
                    </div>

              </div>
            </div>
            <div class="pad-up-20">
            <div id="roommate_content">
                <?php $roommateController->display_availabe_roommates(12, $resources); ?>
            </div>
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
                    <!-- <?php require_once '../include/tabs.php'; ?> -->
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
require_once '../include/footer.php';
?>

<script>
    $(document).ready(function() {
        
        $('body').delegate('#roommate_search_submit', 'click', function () {
            
            var roommate_school = $('#roommate_school').val();
            var roommate_gender = $('#roommate_gender').val();
            var roommate_type = $('#roommate_type').val();

            $.ajax({
                method : 'POST',
                url : 'roommate_actions.php',
                data : {roommate_search_set:1, roommate_school:roommate_school, roommate_gender:roommate_gender, roommate_type:roommate_type},
                success : function(data) {
                    $('#roommate_content').html(data)
                },
                onerror : function(data) {
                    alert(data);
                }
            });

        });

    });

</script>