<?php include 'dashboard-header.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1>
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
        <div class="col-md-12">
            <h2>Your Groups</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-responsive table-hover table-striped" id="group_table">
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
                        $stmt = $groupController->get_groups_by_user_id(get_user_uid());
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
                                        <a href="../groups/<?php echo $group_id ?>" class="btn btn-success" pid = "<?php echo $group_id ?>">Goto</a>
                                        <a href="create_group.php?id=<?php echo $group_id ?>" class="btn btn-primary" pid = "<?php echo $group_id ?>" class="">Edit</a>
                                        <a href="groups.php" id="group_del" class="btn btn-danger" gid = "<?php echo $group_id ?>">Delete</a>
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
<?php require_once('footer.php');
