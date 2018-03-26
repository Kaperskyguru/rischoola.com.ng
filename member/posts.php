<?php
require 'dashboard-header.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
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
            <h2>Available blog post</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Created At </th>
                          <th> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $stmt = $newsControler->get_post_by_user_id($_SESSION['user_id']);
                      if($stmt->rowCount()>0){
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          extract($row);
                          ?>
                          <tr>
                            <td><?php echo $post_id ?></td>
                            <td><?php echo $post_title ?></td>
                            <td><?php echo $newsControler->get_post_category_by_id($post_category_id); ?></td>
                            <td><?php echo $newsControler->get_post_status_by_id($post_status_id); ?></td>
                            <td><?php echo timeAgo($post_date_created); ?></td>
                            <td><a href="#" pid = "<?php echo $post_id ?>" class="btn btn-primary">View</a></td>
                            <td><a href="#" pid = "<?php echo $post_id ?>" class="btn btn-danger">Delete</a></td>
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
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
