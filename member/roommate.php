<?php include 'dashboard-header.php' ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Roommate In Need
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> Roommate In Need
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <h2>Available Roommates</h2>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Request for Roommate
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="roommate_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>School</th>
                                <th>Type</th>
                                <th>Have A Rroom?</th>
                                <th>Contact</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stmt = $roommateController->get_roommates_by_user_id(get_user_uid());
                            if($stmt->rowCount() > 0){
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);?>
                            <tr class="active">
                                <td><?php echo $userController->get_user_username_by_id($roommate_user_id); ?></td>
                                <td><?php echo $roommate_location ?></td>
                                <td><?php echo $schoolController->get_school_abbr_by_id($roommate_school_id);?></td>
                                <td><?php echo $lodgeController->get_lodge_model_by_id($roommate_type_id); ?></td>
                                <td>No</td>
                                <td><?php echo $userController->get_user_phone_number_by_id($roommate_user_id);?></td>
                                <td>
                                  <a id="view_roommate" rid="<?php echo $roommate_id; ?>" class="btn btn-success" href="#">View</a>
                                  <a id="delete_roommate" rid="<?php echo $roommate_id; ?>" class="btn btn-danger" href="#">Delete</a>
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
        <div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel"> Request for Roommate</h4>
                            <div class="col-md-12 text-center">
                                <button type="button" id="i_have_a_room" class="btn btn-success">I hava a room</button>
                                <button type="button" id="i_dont_have_a_room" class="btn btn-danger">I dont hava a room</button>
                            </div>
                            <h6 style="margin-bottom:-10px;"> Tell us what you want</h6>
                        </div>
                        <div class="modal-body" id="form_content">
                            <?php $roommateController->display_if_room($schoolController, $lodgeController); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body>

</html>

<script type="text/javascript" src="datatable/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#i_have_a_room').click(function () {
            $.ajax({
                method: "POST",
                url: "actions.php",
                data: {i_have_a_room: 1},
                success: function (d) {
                    $('#form_content').html(d);
                }
            });
        });

        $('#roommate_table').dataTable();


        $('#i_dont_have_a_room').click(function () {
            $.ajax({
                method: "POST",
                url: "actions.php",
                data: {i_dont_have_a_room: 1},
                success: function (s) {
                    $('#form_content').html(s);
                }
            });
        });
    });

</script>
