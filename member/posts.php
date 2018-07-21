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
            <h2>Available blog post</h2>
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
                            $count =0;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $post_title ?></td>
                                    <td><?php echo $newsControler->get_post_category_by_id($post_category_id); ?></td>
                                    <td><?php echo $newsControler->get_post_status_by_id($post_status_id); ?></td>
                                    <td><?php echo time_ago($post_date_created); ?></td>
                                    <td>
                                        <a href="../posts/<?php echo $post_id ?>" class="btn btn-primary">View</a>
                                         <a href="add_post.php?id=<?php echo $post_id ?>" class="btn btn-info">Edit</a>
                                        <a href="#" pid = "<?php echo $post_id ?>" class="btn btn-danger">Delete</a></td>
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


<!-- Modal for view post-->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Abia Poly Entrance Exam and cut off marks</h4>
      </div>
        <hr>
      <div class="modal-body">
        <p>
            <!--Post Contents and description goes here-->
            Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks
        </p>
          <hr>
        <div>
            <label>Post Category : Talks</label>
        </div>
          <hr>
          <div>
            <label>School : Abia Poly</label>
        </div>
          <hr>
          <div>
            <label>Post Images </label>
            <div class="row">
                <div class="col-md-4">
                    <img src="../res/imgs/8722.gif" class="img-responsive img-thumbnail">
                </div>
                <div class="col-md-4">
                    <img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
                </div>
                <div class="col-md-4">
                    <img src="../res/imgs/admission-101.png" class="img-responsive img-thumbnail">
                </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal for edit post-->
<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Post <small>Please change content of textbox to edit</small></</h4>
      </div>
      <div class="modal-body">
            <?php display_error(); ?>
            <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" value="Abia Poly Entrance Exam and cut off marks" name="title" type="text" />
                </div>
                <div class="form-group">
                    <label for="desc" > Description: </label>
                    <textarea rows="5" id="desc" value="Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks
            Abia Poly Entrance Exam and cut off marks" name="desc" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <label for="post_image">Choose Featured image: </label>
                    <input type="file" id="post_image[]" name="post_image[]" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="cat">Category:</label>
                    <select class="form-control" id="cat" name="cat">
                        <option value="">Select Categories </option>
                        <?php $newsControler->get_post_category(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="school">Select School</label>
                    <select class="form-control" id="school" name="school">
                        <option value="0">All School </option>
                        <?php $schoolController->get_schools(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Save Changes</button>
                </div>
            </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div> -->
<?php require_once('footer.php');
