<?php include 'dashboard-header.php' ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Messages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> Messages
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Notifications and Inbox Messages</h2>
                <div class="table-responsive">
                    <table class="table  table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $messageController->get_messages_by_receiver_id(get_user_uid());
                            $count = 0;
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $count++;
                                    extract($row);
                                    ?>
                                    <tr style="<?php echo $font = ($message_status_id == 13)? 'font-weight:bold;':'' ?>">
                                        <strong>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $userController->get_user_username_by_id($message_sender_id); ?></td>
                                        <td><?php echo $message_subject; ?></td>
                                        <td><?php echo getExcerpt($message_body, 50); ?></td></strong>
                                        <td>
                                            <button type="button" id="view_message" mid="<?php echo $message_id ?>" class="btn btn-info " data-toggle="modal" data-target="#myModal">
                                                view message
                                            </button>

                                        </td>
                                        <td>
                                            <a href="compose.php"><button class="btn btn-primary">reply</button></a>
                                        </td>
                                        <td><a href="inbox.php" id="delete_message" mid="<?php echo $message_id ?>" class="btn btn-danger">delete</a></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<p> No messages or Notifications yet </p>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Inbox Message</h4>
                                </div>
                                <div id="h" class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>


        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php require_once('footer.php');
