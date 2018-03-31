<?php include 'dashboard-header.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1 class="page-header">
                Groups
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> Groups
                </li>
            </ol>
        </div>
        <div class="col-md-8">
            <h2>Your Groups</h2>
            <div class="table-responsive">
                <table class="table  table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th># Members</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $groupController->get_groups_by_user_id($_SESSION['user_id']);
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <tr class="active">
                                    <td><?php echo $group_title ?></td>
                                    <td><?php echo $group_member_count ?></td>
                                    <td>Close</td>
                                    <td><?php echo $groupController->get_group_status_by_id($group_status_id); ?></td>
                                    <td><?php echo $group_date_created ?></td>
                                    <td>
                                        <!-- <ul class="nav nav-pills">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
                                                <ul class="dropdown-menu"> -->
                                                    <a href="groups.php" id="group_del" class="btn btn-danger" gid = "<?php echo $group_id ?>">Delete</a>
                                                    <a href="../groups/group_page.php?id=<?php echo $group_id ?>" class="btn btn-success" pid = "<?php echo $group_id ?>">Goto</a>
                                                    <a href="#" class="btn btn-primary" pid = "<?php echo $group_id ?>" class="">View</a>
                                                <!-- </ul>
                                            </li>
                                        </ul> -->
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
        <div class="col-md-4">
            <h2>Popular Groups</h2>
            <div class="table-responsive">
                <table class="table  table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th># Members</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>

                        </tr>
                        <tr class="success">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr class="warning">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr class="danger">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Popular Groups Around You</h2>
            <div class="table-responsive">
                <table class="table  table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th># Members</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>

                        </tr>
                        <tr class="success">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr class="warning">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr class="danger">
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                        <tr>
                            <td>Aspoly Network</td>
                            <td>20</td>
                            <td>23/3/2018</td>
                            <td><button class="btn btn-primary">Join group</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
