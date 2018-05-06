<?php
require 'dashboard-header.php';

$error = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['user_id'];
    if (empty($_FILES['post_image']['name']) || empty($_FILES['post_image']['tmp_name']) || empty($_FILES['post_image'])) {
        $error_text = "Image is required";
    }
    if (empty($_POST['title'])) {
        $error_text = 'Please title is required';
    } else {
        $newsModel->set_post_title($_POST['title']);
    }
    if (empty($_POST['desc'])) {
        $error_text = 'Please Content is required';
    } else {
        $newsModel->set_post_content($_POST['desc']);
    }
    if (empty($_POST['cat'])) {
        $error_text = 'Please Category is required';
    } else {
        $newsModel->set_post_category_id($_POST['cat']);
    }
    if (empty($_POST['school'])) {
        $error_text = 'Please School is required';
    } else {
        $newsModel->set_post_school_id($_POST['school']);
    }
    $newsModel->set_post_user_id($id);
    $newsModel->set_post_status_id(2);
    if (!isset($error_text)) {
      $new_id = $newsControler->addNews($newsModel);
        if ($new_id != 0) {
           $image_id = uploadFiles($id, $new_id, $resources);
        //   if ($image_src == 'none') {
        //       $error_text = "Not Uploaded";
        //   } else {
            //$image_id = $resources->add_images_and_get_last_inserted_id($image_src, $id, $new_id, "post");
            if($newsControler->insert_post_featured_image_id($image_id, $new_id)){
              $success_text = "Your Post is pending verifications...";
            }else {
              $error_text = "Your Post inserted without featured Image...";
            }
          //}

        } else {
            $error_text = "We could not Post it";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 member_layout">
            <h2>Create a new post<hr /></h2>
            <?php display_error(); ?>
            <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" name="title" type="text" />
                </div>
                <div class="form-group">
                    <label for="desc" > Description: </label>
                    <textarea  id="editor" name="desc" class="form-control"> </textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .then( editor => {
                                console.log( editor );
                            } )
                            .catch( error => {
                                console.error( error );
				            } );
                    </script>
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
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<?php

function uploadFiles($user_id, $inserted_id, $resources) {
    $files = $_FILES["post_image"];
    return Resources::upload_image($files, $user_id, $inserted_id, $resources, "posts");  
}