<?php include 'dashboard-header.php'; ?>
<div class="container-fluid">
    <div class="row ">
      <div class="col-md-11 member_layout">
        <div class="col-lg-12 col-md-12">
            <h1>
                Cart
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> Cart
                </li>
            </ol>
        </div>

            <table class="table table-bordered table-responsive table-hover table-striped" id="cart_table">
                <thead>
                    <tr>
                        <th >Action</th>
                        <th >Product Image</th>
                        <th >Product Price</th>
                        <th >Quantity</th>
                        <th >Price (N)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $storeController->get_cart_products_by_user_id(get_user_uid());
                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                    </div>
                                </td>
                                <td ><?php echo $storeController->get_product_name_by_id($cart_product_id); ?></td>
                                <td ><input type="text" id="price<?php echo $cart_id ?>" class="form-control" value="<?php echo $storeController->get_product_price_by_id($cart_product_id); ?>" disabled /></td>
                                <td ><input type="number" id="qty" min="1" pid="<?php echo $cart_id ?>" class="form-control" value="<?php echo $storeController->get_cart_quantity_by_id($cart_id); ?>" /></td>
                                <td ><input type="text" id="total_price<?php echo $cart_id ?>" class="form-control" value="<?php echo $storeController->get_product_price_by_id($cart_product_id); ?>" disabled /></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <h1>Total: N10000</h1>
                </div>
            </div>
            <a href="customerOrder.php" style="float:right; margin-right:50px;" class="btn btn-warning btn-lg">Checkout</a>
        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="datatable/datatables.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#cart_table').dataTable();

            $("body").delegate("#qty", "click", function () {
                var pid = $(this).attr("pid");
                var qty = $(this).val();
                var price = $("#price" + pid).val();
                var total = qty * price;
                $("#total_price" + pid).val(total);
            });

        });
    </script>
</body>
</html>
