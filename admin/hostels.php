<?php
require_once 'head.php';
require_once 'header.php';
require_once 'sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="header-title">
                    <h1>All Hostels</h1>
                    <small>Hostel List</small>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group" id="buttonexport">
                                    <a href="add-Hostel.html">
                                        <h4>Add Hostel</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="btn-group">
                                    <div class="buttonexport" id="buttonlist">
                                        <a class="btn btn-add" href="add-Hostel.html"> <i class="fa fa-plus"></i> Add Hostel
                                        </a>
                                    </div>
                                    <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                                    <ul class="dropdown-menu exp-drop" role="menu">
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});">
                                                <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                                <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                                <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                                <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});">
                                                <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});">
                                                <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});">
                                                <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});">
                                                <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                                <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});">
                                                <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});">
                                                <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                                                <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th>Photo</th>
                                                <th>Hostel Name</th>
                                                <th>Price</th>
                                                <th>Contact Mobile</th>
                                                <th>School</th>
                                                <th>Model</th>
                                                <th>Address</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="assets/dist/img/w1.png" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                                <td>MD. Alimul Alrazy</td>
                                                <td>+8801674688663</td>
                                                <td><a href="http://iPlayfootball.com.ng/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="74151806150e0d34001c111911191d1a1d070011065a171b19">[email&#160;protected]</a></td>
                                                <td>98 Green Rd, Dhaka 1215, Bangladesh</td>
                                                <td>V.I.P</td>
                                                <td>27th April,2017</td>
                                                <td>27th April,2017</td>
                                                <td><span class="label-custom label label-default">Active</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/dist/img/w2.png" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                                <td>MD. Alrazy</td>
                                                <td>+8801674688663</td>
                                                <td><a href="http://iPlayfootball.com.ng/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8eefe2fceff4f7cefae6ebe3ebe3e7e0e7fdfaebfca0ede1e3">[email&#160;protected]</a></td>
                                                <td>98 Green Rd, Dhaka 1215, Bangladesh</td>
                                                <td>V.I.P</td>
                                                <td>27th April,2017</td>
                                                <td>27th April,2017</td>
                                                <td><span class="label-danger label label-default">Inctive</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/dist/img/w3.png" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                                <td>Mrs. Jorina Begum</td>
                                                <td>+8801674688663</td>
                                                <td><a href="http://iPlayfootball.com.ng/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4a2b26382b30330a3e222f272f27232423393e2f3864292527">[email&#160;protected]</a></td>
                                                <td>98 Green Rd, Dhaka 1215, Bangladesh</td>
                                                <td>V.I.P</td>
                                                <td>27th April,2017</td>
                                                <td>27th April,2017</td>
                                                <td><span class="label-danger label label-default">Inctive</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/dist/img/w4.png" class="img-circle" alt="User Image" width="50" height="50"> </td>
                                                <td>Mrs. Rabeya Begum</td>
                                                <td>+8801674688663</td>
                                                <td><a href="http://iPlayfootball.com.ng/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="23424f5142595a63574b464e464e4a4d4a505746510d404c4e">[email&#160;protected]</a></td>

                                                <td>98 Green Rd, Dhaka 1215, Bangladesh</td>
                                                <td>V.I.P</td>
                                                <td>27th April,2017</td>
                                                <td>27th April,2017</td>
                                                <td><span class="label-custom label label-default">Active</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customer Modal1 -->
                <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5"></i> Update Hostel Profile</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">Hostel Name:</label>
                                                    <input type="text" placeholder="Player Name" class="form-control">
                                                </div>
                                                <!-- Text input-->
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">Email:</label>
                                                    <input type="email" placeholder="Email" class="form-control">
                                                </div>
                                                <!-- Text input-->
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">Mobile</label>
                                                    <input type="number" placeholder="Mobile" class="form-control">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Address</label><br>
                                                    <textarea name="address" rows="3"></textarea>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="control-label">Profile Package</label>
                                                    <input type="text" placeholder="type" class="form-control">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="control-label">type</label>
                                                    <input type="text" placeholder="type" class="form-control">
                                                </div>
                                                <div class="col-md-12 form-group user-form-group">
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                        <button type="submit" class="btn btn-add btn-sm">Save</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- Modal -->
                <!-- Customer Modal2 -->
                <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5"></i> Delete Playerer</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <div class="col-md-12 form-group user-form-group">
                                                    <label class="control-label">Delete Playerer</label>
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-danger btn-sm">NO</button>
                                                        <button type="submit" class="btn btn-add btn-sm">YES</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once 'footer.php';
