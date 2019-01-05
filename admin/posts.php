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
            <h1>All Post</h1>
            <small>Post List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <a href="#">
                                <h4>Add Poster</h4>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                                <a class="btn btn-add" href="add-post.php"> <i class="fa fa-plus"></i> Add Post
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
                                                                                        <th>S/N</th>
                                                                                        <th>Post Title</th>
                                                                                        <th>Author</th>
                                                                                        <th>Category</th>
                                                                                        <th>School</th>
                                                                                        <th>Comment Counts</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Create At</th>
                                                                                        <th>Status</th>
                                                                                        <th>Action</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>


        <?php                                                                      $stmt = $newsControler->get_posts();
                                                                                    if ($stmt->rowCount() > 0) {
                                                                                        $count =0;
                                                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                                            extract($row);
                                                                                            $count++; ?>
                                                                                            <tr>
                                                                                                <td><?php echo $count ?></td>
                                                                                                <td><a href="<?php echo SITEURL; ?>/posts/<?php echo $post_id ?>"><?php echo $post_title ?></a></td>
                                                                                                <td><?php echo $newsControler->get_user_username_by_id($post_user_id); ?> </td>
                                                                                                <td><?php echo $newsControler->get_post_category_by_id($post_category_id); ?></td>
                                                                                                <td><?php echo $schoolController->get_school_abbr_by_id($post_school_id); ?></td>
                                                                                                <td><?php echo $post_comment_count ?></td>
                                                                                                <td><?php echo $post_like_count ?></td>
                                                                                                <td><?php echo time_ago($post_date_created); ?></td>
                                                                                                 <td>
                                                                                                     <span class="label-custom label label-default"><?php echo $newsControler->get_post_status_by_id($post_status_id); ?></span>
                                                                                                 </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-lg" data-id="<?php echo $post_id ?>" data-toggle="modal" id="approvePostBox" data-target="#approveModal"><i class="fa fa-check"></i> </button>
                                                                                                </td>
                                                                                            </tr>
                                                                                      <?php }
                                                                                  }?>

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
                                                                        <h3><i class="fa fa-user m-r-5"></i> Update Post Profile</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form class="form-horizontal">
                                                                                    <fieldset>
                                                                                        <!-- Text input-->
                                                                                        <div class="col-md-4 form-group">
                                                                                            <label class="control-label">Post Name:</label>
                                                                                            <input type="text" placeholder="Post Name" class="form-control">
                                                                                        </div>
                                                                                        <!-- Text input-->
                                                                                        <div class="col-md-4 form-group">
                                                                                            <label class="control-label">Email:</label>
                                                                                            <input type="email" placeholder="Email" class="form-control">
                                                                                        </div>
                                                                                        <!-- Text input-->
                                                                                        <div class="col-md-4 form-group">
                                                                                            <label class="control-label">Mobile:</label>
                                                                                            <input type="number" placeholder="Mobile" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Address:</label><br>
                                                                                            <textarea name="address" rows="3"></textarea>
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Post Package:</label>
                                                                                            <input type="text" placeholder="type" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Post Position:</label>
                                                                                            <input type="text" placeholder="Post Position" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Games Played:</label>
                                                                                            <input type="text" placeholder="Games Played" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Minutes Played:</label>
                                                                                            <input type="text" placeholder="Minutes Played" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Starts:</label>
                                                                                            <input type="text" placeholder="Starts" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Substitution on:</label>
                                                                                            <input type="text" placeholder="Substitution on" class="form-control">
                                                                                        </div>
                                                                                        <div class="col-md-6 form-group">
                                                                                            <label class="control-label">Substitution off:</label>
                                                                                            <input type="text" placeholder="Substitution off" class="form-control">
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
                                                                        <h3><i class="fa fa-user m-r-5"></i> Delete Poster</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form class="form-horizontal">
                                                                                    <fieldset>
                                                                                        <div class="col-md-12 form-group user-form-group">
                                                                                            <label class="control-label">Delete Poster</label>
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


                                                        <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header modal-header-primary">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h3><i class="fa fa-user m-r-5"></i> Approve Post</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form class="form-horizontal">
                                                                                    <fieldset>
                                                                                        <div id="approvalBox" class="col-md-12 form-group user-form-group">
                                                                                           
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
                                                    </section>
                                                    <!-- /.content -->
                                                </div>
                                                <?php require_once 'footer.php';
