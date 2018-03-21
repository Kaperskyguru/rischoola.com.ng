<?php
require '../init.php';
require 'dashboard-header.php'; ?>
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h1> Blog Post <hr /></h1>
    </div>
    <div class="col-md-10">
      <div class="jumbotron">

      <table class="table table-hover">
        <thead>
          <tr>
            <td>S/N</td>
            <td>Title</td>
            <td>Category</td>
            <td>Status</td>
            <td>Created At </td>
            <td> Actions</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $stmt = $newsControler->get_post_by_user_id($newsControler->get_user_id_by_username('kapersky'));
          if($stmt->rowCount()>0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              ?>
              <tr>
                <td><?php echo $post_id ?></td>
                <td><?php echo $post_title ?></td>
                <td><?php echo $newsControler->get_post_category_by_id($post_category_id); ?></td>
                <td><?php echo $newsControler->get_post_status_by_id($post_status_id); ?></td>
                <td><?php echo $post_date_created ?></td>
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








<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
