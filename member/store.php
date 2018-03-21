<?php include 'dashboard-header.php' ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Store
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Store
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Available Products</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>price</th>
                                        <th>seller</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="success">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="danger">
                                       <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Your Products</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>price</th>
                                        <th>seller</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="success">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr class="danger">
                                       <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                    <tr>
                                        <td>Shoe</td>
                                        <td># 5000</td>
                                        <td>Don Iyke</td>
                                        <td>09939309399</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                      Add an item
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
