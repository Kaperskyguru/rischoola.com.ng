<?php
require_once '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}

?>


<section id="events">
    <div class="container pad-up-50">
        <div class="row">
            <div class="col-md-9">
                <h2>Events</h2>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select class="form-control" id="search_event">
                                <option disabled="true"  selected="">Select a school from here to get latest information</option>
                                <?php $schoolController->get_schools(); ?>
                            </select>
                        </div>
                        <div class="col-sm-2 form-group">
                            <button class="btn btn-default form-control" >Go to Page</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                <h2>Upcoming Events</h2>
                    <div class="col-lg-12" id="event_contnt">
                        <div class="col-lg-12" id="event_content">
                            <?php $eventController->display_availabe_events(6, $resources, ""); ?>
                        </div>
                        <div class="col-lg-12">
                            <ul class="pager">
                                <li class="previous"><a> Previous </a></li>
                                <li class="next"><a href="#"> Next </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h2>Past Events</h2>
                        <?php $eventController->display_availabe_events(6, $resources, ""); ?>
                        
                        <div class="col-lg-12">
                            <ul class="pager">
                                <li class="previous"><a href="#"> Previous </a></li>
                                <li class="next"><a href="#"> Next </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pad-up-50">
                <!-- <div class="col-md-3"> -->
                <div class="row">
                    <!-- <?php //require '../include/tabs.php'; ?> -->
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
                <!-- </div> -->
            </div>
        </div>
</section>
<?php include 'footer.php'; ?>

<script>
$(document).ready(function() {
    $('#search_event').change(function() {
        var sid = $(this).val();
        $.ajax({
            method:'post',
            url:'set_reminder.php',
            data:{search_set:1, sid:sid},
            success: function(data) {
                $('#event_content').empty();
                $('#event_content').html(data);              
            }
        });
    });
});
</script>
