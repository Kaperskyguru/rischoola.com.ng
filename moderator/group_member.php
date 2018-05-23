<?php require 'dashboard-header.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Membership
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> My groups
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="group_member_table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Group Title</th>
                            <th>Date Joined</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $groupController->get_group_membership_by_user_id(get_user_uid());
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <tr>
                                    <td><?php echo $membership_id ?></td>
                                    <td><?php echo $groupController->get_group_title_by_id($membership_group_id); ?></td>
                                    <td><?php echo date('l jS \of F Y', strtotime($membership_date_joined)); ?></td>
                                    <td>
                                        <!-- <ul class="nav nav-pills">
                                        <li class="dropdown">
                                         <a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
                                         <ul class="dropdown-menu"> -->
                                        <a href="../groups/group_page.php?id=<?php echo $membership_group_id ?>" class="btn btn-success">Goto group</a>
                                        <a href="group_member.php" id="leave_group" gid = "<?php echo $membership_group_id ?>" class="btn btn-danger">Leave group</a>
                                        <!-- <li><a href="#" pid = "<?php echo $group_id ?>" class="">Add</a></li> -->
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
    </div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#group_member_table').dataTable();
  });
</script>
