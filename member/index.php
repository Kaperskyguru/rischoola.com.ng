<?php include 'dashboard-header.php'; ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1>
                     <h1>Dashboard <small>Overview</small></h1>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $newsControler->get_total_number_of_post_by_id(get_user_uid()); ?></div>
                                <div>Total Post!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $lodgeController->get_total_number_of_lodges_by_id(get_user_uid()); ?></div>
                                <div>Total Lodges!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $storeController->get_total_number_of_products_by_id(get_user_uid()); ?></div>
                                <div>Total Store Item</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $messageController->get_total_number_of_messages_by_user_id(get_user_uid()); ?></div>
                                <div>Messages</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <div class="row">
        <?php $stmt = $notifier->get_notifications_by_user_id(get_user_uid(), 10);?>
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Notification Panel</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                        <?php if($stmt->rowCount() > 0){
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);?>
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php echo time_ago($notification_date_created);?></span>
                                         <?php echo $notification_content ?>
                                    </a>
                         <?php }
                            }?>

                        </div>
                    </div>
                </div>
            </div>
            <?php $news_stmt = $newsControler->get_posts_by_school_id($userController->get_school_id_by_user_id(get_user_uid()), 10); ?>
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> TRENDING POSTS</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                            <!-- DISPLAY TRENDING POST IN USERS SCHOOL -->
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Post Title</th>
                                        <th>Views</th>
                                        <th>Author</th>
                                        <th>Post Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if($news_stmt->rowCount() > 0){
                                        $count = 0;
                                        while ($row = $news_stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $count++;
                                           extract($row);?>
                                           <tr>
                                                <td><?php echo $count ?></td>
                                                <td><a href="../posts/<?php echo $post_id?>" target="_blank"><?php echo getExcerpt($post_title, 40); ?></a></td>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $userController->get_user_username_by_id($post_user_id); ?></td>
                                                <td><?php echo time_ago($post_date_created) ?></td>
                                            </tr>

                                        <?php }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<!-- <script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script> -->

</body>

</html>
