<div class="container">
  <h2>Upcoming Events</h2>
    <?php $eventController->display_availabe_events(4, $resources);?>
  <div class="col-lg-12 text-center pad-bottom-20">
  <a href="events" class="btn btn-success" style="margin-bottom: 10px;">View All Events</a>
    <a href="<?php echo $url = (get_user_uid() != null)? "member/create_event.php":"users/login.php"; ?>" class="btn btn-success" style="margin-bottom: 10px;">Upload an Events</a>  </div>
</div>


