<?php require 'dashboard-header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Blog Post
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i> Blog post
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>Available blog post</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="post_table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created At </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $newsControler->get_post_by_user_id(get_user_uid());
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <tr>
                                    <td><?php echo $post_id ?></td>
                                    <td><?php echo $post_title ?></td>
                                    <td><?php echo $newsControler->get_post_category_by_id($post_category_id); ?></td>
                                    <td><?php echo $newsControler->get_post_status_by_id($post_status_id); ?></td>
                                    <td><?php echo timeAgo($post_date_created); ?></td>
                                    <td>
                                        <a href="#" pid = "<?php echo $post_id ?>" class="btn btn-primary">View</a>
                                        <a href="#" pid = "<?php echo $post_id ?>" class="btn btn-info">Edit</a>
                                        <a href="#" pid = "<?php echo $post_id ?>" class="btn btn-danger">Delete</a>
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
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#post_table').dataTable();
  });
</script>
