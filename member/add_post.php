<?php require 'dashboard-header.php';

$error=array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = $newsControler->get_user_id_by_username($userController->get_user_username_by_id($_SESSION['user_id']));
  if(empty($_FILES['file']['name']) || empty($_FILES['file']['tmp_name']) || empty($_POST['file'])){
    //$error_text = "Image is required";
    $newsModel->set_post_featured_image_id(NULL);
  }else {
    if(uploadFiles() == 'none'){
      $error_text = "Not Uploaded";
    }else{
      $image_id = $newsControler->add_images_and_get_last_inserted_id(uploadFiles(), $id, 1);
      $newsModel->set_post_featured_image_id($image_id);
    }
  }
  if(empty($_POST['title'])){
    $error_text = 'Please title is required';
  }else {
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
  if(!isset($error_text)){
    if($newsControler->addNews($newsModel)){
        $error_text = "Your Post is pending verifications...";
    }else {
      $error_text = "We could not Post it";
    }
  }
}

 ?>
<div class="container">
  <div class="row">
  <div class="col-md-10">
    <h2>Create a new post<hr /></h2>
    <?php display_error(); ?>
    <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" id="title" name="title" type="text" />
    </div>
    <div class="form-group">
      <label for="desc" > Description: </label>
      <textarea rows="5" id="desc" name="desc" class="form-control"> </textarea>
    </div>
    <div class="form-group">
      <label for="file">Choose Featured image: </label>
      <input type="file" id="file" name="file" class="form-control" />
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
        <?php $newsControler->get_schools(); ?>
      </select>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Submit</button>
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

function uploadFiles(){
  $error_status = 1;
  $image_to_upload = $_FILES['file'];
  $target_dir = "../res/imgs/post/";
  $image_name = $image_to_upload['name'];
  $target_file = $target_dir . basename($image_to_upload['name']);
  $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
if(!empty($target_file)){
    if(getimagesize($image_to_upload['tmp_name']) !== FALSE){
      $error_status = 1;
    }else{
      $error_status = 0;
    }

    if(file_exists($target_file)){
      $error_status = 0;
    }else{
      $error_status = 1;
    }

    if($image_to_upload['size'] > 10485760){
      $error_status = 0;
    }

    if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif"){
      $error_status = 0;
    }else{
      $error_status = 1;
    }

    if($error_status == 1){
      if(move_uploaded_file($image_to_upload['tmp_name'], $target_file)){
        return dirname($target_file)."/".basename($image_to_upload['name']);
      }
    }
  }else {
    return 'none';
  }
}

 ?>
