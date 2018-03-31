<?php
require 'dashboard-header.php';

if(isset($_POST['add_facility']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $lodgeController->add_facility($_POST['val']);
  if(!$lodgeController->is_facility_exist($_POST['val'])){
    $lodgeController->add_lodge_facility($_POST['val']);
  }
}

if(isset($_POST['add_rule']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $lodgeController->add_rule($_POST['val']);
  if(!$lodgeController->is_rule_exist($_POST['val'])){
    $lodgeController->add_lodge_rule($_POST['val']);
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = $lodgeController->get_user_id_by_username($userController->get_user_username_by_id($_SESSION['user_id']));
  if(empty($_FILES['lodge_image']['name']) || empty($_FILES['lodge_image']['tmp_name']) || empty($_POST['lodge_image'])){
    $lodgeModel->set_lodge_featured_image_id(NULL);
  }else {
    if(uploadFiles() == 'none'){
      $error_text = "Not Uploaded";
    }else{
      $image_id = $lodgeController->add_images_and_get_last_inserted_id(uploadFiles(), $id, 1);
      $lodgeModel->set_lodge_featured_image_id($image_id);
    }
  }
  if(empty($_POST['lodge_name'])){
    $error_text = 'Please Lodge Name is required';
  }else {
    $lodgeModel->set_lodge_name($_POST['lodge_name']);
  }
  if (empty($_POST['lodge_desc'])) {
    $error_text = 'Please Content is required';
  } else {
    $lodgeModel->set_lodge_desc($_POST['lodge_desc']);
  }
  if (empty($_POST['lodge_model'])) {
    $error_text = 'Please Category is required';
  } else {
    $check = serialize(filter_input(INPUT_POST, 'lodge_model'));
    $lodgeModel->set_lodge_model_id($check);
  }
  if (empty($_POST['lodge_school'])) {
    $error_text = 'Please School is required';
  } else {
    $lodgeModel->set_lodge_school_id($_POST['lodge_school']);
  }
  $lodgeModel->set_lodge_user_id($id);
  $lodgeModel->set_lodge_status_id(2);
  if(!isset($error_text)){
    if($lodgeController->add_lodge($lodgeModel)){
        $error_text = "Your Lodge is pending verifications...";
    }else {
      $error_text = "We could not Post it";
    }
  }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Add a new Lodge<hr /></h2>
        </div>
        <div class="col-md-5">
          <div id="err"><?php display_error(); ?></div>
            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="form-group">
                    <label for="lodge_name">Lodge Name:</label>
                    <input class="form-control" id="lodge_name" name="lodge_name" type="text" />
                </div>
                <div class="form-group">
                    <label for="lodge_price">Price:</label>
                    <input class="form-control" id="lodge_price" name="lodge_price" type="number" />
                </div>
                <div class="form-group">
                    <label for="lodge_desc" > Description: </label>
                    <textarea rows="5" id="lodge_desc" name="lodge_desc" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <label for="lodge_address" > Address: </label>
                    <textarea id="lodge_address" name="lodge_address" class="form-control"> </textarea>
                </div>

        </div>
        <div class="col-md-5">
          <div class="form-group">
              <label for="lodge_image">Choose Featured image: </label>
              <input multiple type="file" id="lodge_image" name="lodge_image" class="form-control" />
          </div>
            <div class="form-group">
                <label for="lodge_school">Select School</label>
                <select class="form-control" id="lodge_school" name="lodge_school">
                    <option value="">All School </option>
                    <?php $schoolController->get_schools(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lodge_model">Select Models</label>
                <div class="checkbox">
                    <label><input id="lodge_model" name="lodge_model[]" type="checkbox" value="">Self Contain</label>
                </div>
                <div class="checkbox">
                    <label><input id="lodge_model" name="lodge_model[]" type="checkbox" value="">Single Room</label>
                </div>
                <div class="checkbox">
                    <label><input id="lodge_model" name="lodge_model[]" type="checkbox" value="">Hostel</label>
                </div>

            </div>
            <div class="form-group">
                <label  for="lodge_facilities">Select Facilities</label>
                <input class="form-control" list="facility" id="lodge_facilities" name="lodge_facilities" />
                  <datalist id="facility">
                    <?php $lodgeController->get_lodge_facilities()?>
                  </datalist>
            </div>

            <div class="form-group">
                <label for="lodge_rules">Select Rules</label>
                <input class="form-control" id="lodge_rules" list="rules" name="lodge_rules" />
                  <datalist id="rules">
                    <script>document.getElementById('rules').innerHTML = "";</script>
                    <?php $lodgeController->get_lodge_rules();?>
                  </datalist>
            </div>


        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button class="text-center btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>

<?php

function uploadFiles(){
  $error_status = 1;
  $image_to_upload = $_FILES['lodge_image'];
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

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  //alert();

  $('#lodge_rules').change(function() {
      var val = this.value;
      $.ajax({
        method:"POST",
        url:'add_lodges.php',
        data:{add_rule:1, val:val},
        success:function(data) {
          //$('#err').html(data);
        }
      });
  });

  $('#lodge_facilities').change(function() {
      var val = this.value;
      $.ajax({
        method:"POST",
        url:'add_lodges.php',
        data:{add_facility:1, val:val},
        success:function(data) {
          //$('#err').html(data);
        }
      });
  });

});


</script>
<!-- <?php require 'footer.php'; ?> -->
