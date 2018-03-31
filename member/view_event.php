<?php
require 'dashboard-header.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                All My Events
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> My Events
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>Available Events</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Event Title</th>
                          <th>Event Date</th>
                          <th>Status</th>
                          <th>Created At </th>
                          <th> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $stmt = $eventController->get_events_by_user_id($_SESSION['user_id']);
                      if($stmt->rowCount()>0){
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          extract($row);
                          ?>
                          <tr>
                            <td><?php echo $event_id ?></td>
                            <td><?php echo $event_title ?></td>
                            <td><?php echo get_formatted_date($event_date); ?></td>
                            <td><?php echo $eventController->get_event_status_by_id($event_status_id); ?></td>
                            <td><?php echo timeAgo($event_date_created); ?></td>
                            <td><a href="#" pid = "<?php echo $event_id ?>" class="btn btn-primary">View</a>
                          <a href="#" id="event_del" pid = "<?php echo $event_id ?>" class="btn btn-danger">Delete</a></td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
