<?php include 'dashboard-header.php' ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Store
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> Store
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="row">
              <div class="col-lg-9">
                  <h2>Available Products</h2>
              </div>
              <div class="col-lg-3">
                  <a type="button" class="btn btn-primary btn-lg" href="add_product.php">
                    Sell A Product
                  </a>
              </div>
          </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="store_table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>Quantity</th>
                                <th>Date Inserted</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $stmt = $storeController->get_products_by_user_id(get_user_uid());
                            if($stmt->rowCount() >0){
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);?>
                                <tr>
                                    <td><?php echo $product_id ?></td>
                                    <td><?php echo $product_name ?></td>
                                    <td><?php echo $storeController->get_product_category_by_id($product_category_id); ?></td>
                                    <td>N<?php echo $product_price ?></td>
                                    <td><?php echo $product_quantity ?></td>
                                    <td><?php echo get_formatted_date($product_date_created) ?></td>
                                    <td><?php echo $storeController->get_product_status_by_id($product_status_id); ?></td>
                                    <td>
                                      <ul class="nav nav-pills">
                                        <li class="dropdown">
                                          <a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
                                          <ul class="dropdown-menu">
                                            <li><a href="#" id="product_del" gid = "<?php echo $product_id ?>">Delete</a></li>
                                            <li><a href="#"  pid = "<?php echo $product_id ?>" class="">View</a></li>
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
            <!-- </div> -->
        </div>
        <div>
            <!-- Modal -->
            <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Item</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label>Enter Item Name</label>
                                <input type="text" name="" class="form-control">
                                <label>Enter Item Price</label>
                                <input type="number" name="" class="form-control">
                                <label>Enter Seller Name</label>
                                <input type="text" name="" class="form-control">
                                <label>Enter Phone Number</label>
                                <input type="number" name="" class="form-control">
                                <label>Upload image</label>
                                <input type="file" name="">
                                <div style="padding-top: 20px;">
                                    <button type="button" class="btn btn-lg btn-success">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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

<script type="text/javascript" src="datatable/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#store_table').dataTable();
  });
</script>

</body>

</html>
