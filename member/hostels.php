<?php include 'dashboard-header.php'
 ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hostels for Rent
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Hostels for Rent
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Available Hostels</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>School</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php
                                  $stmt = $lodgeController->get_lodge_by_user_id($_SESSION['user_id']);
                                  if($stmt->rowCount()>0){
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      extract($row);
                                      ?>
                                      <tr>
                                        <td><?php echo $lodge_id ?></td>
                                        <td><?php echo $lodge_name ?></td>
                                        <td><?php echo $lodgeController->get_lodge_school_by_id($lodge_school_id); ?></td>
                                        <td># <?php echo $lodge_price ?></td>
                                        <td><?php echo $lodgeController->get_lodge_status_by_id($lodge_status_id); ?></td>
                                        <td><?php echo $lodge_date_created ?></td>
                                        <td>
                                          <a href="#" pid = "<?php echo $lodge_id ?>" class="btn btn-primary">View</a>
                                          <a href="#" pid = "<?php echo $lodge_id ?>" class="btn btn-danger">Delete</a>
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
