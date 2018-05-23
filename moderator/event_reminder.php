<?php require 'dashboard-header.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Event Reminders
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> My Event Reminders
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>Available Events</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="event_reminder_table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Event Title</th>
                            <th>Event Date</th>
                            <th>Remind At </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $eventController->get_event_reminder_by_user_id(get_user_uid());
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <tr>
                                    <td><?php echo $reminder_id ?></td>
                                    <td><?php echo $eventController->get_event_title_by_id($reminder_event_id); ?></td>
                                    <td><?php echo get_formatted_date($eventController->get_event_date_by_id($reminder_id)); ?></td>
                                    <td><?php echo get_formatted_date($reminder_date); ?></td>
                                    <td>
                                        <ul class="nav nav-pills">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="event_reminder_view" pid = "<?php echo $reminder_id ?>" class="">View</a></li>
                                                    <li><a href="#" id="event_reminder_edit" pid = "<?php echo $reminder_id ?>" class="">Edit</a></li>
                                                    <li><a href="#" id="event_reminder_del" pid = "<?php echo $reminder_id ?>" class="">Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                      </td>
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
<script src="js/script.js"></script><!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#event_reminder_table').dataTable();
  });
</script>
