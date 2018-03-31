<?php
require 'dashboard-header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['user_id'];
    if (empty($_FILES['group_image']['name']) || empty($_FILES['group_image']['tmp_name']) || empty($_POST['group_image'])) {
        $error_text = "Image is required";
        $groupModel->set_group_featured_image_id(0);
    } else {
        if (uploadFiles() == 'none') {
            $error_text = "Not Uploaded";
        } else {
            // id of last inserted = that 1.... will be changed
            $image_id = $resources->add_images_and_get_last_inserted_id(uploadFiles(), $id, 1, "group");
            $groupModel->set_group_featured_image_id($image_id);
        }
    }
    if (empty($_POST['title'])) {
        $error_text = 'Please title is required';
    } else {
        $groupModel->set_group_title($_POST['title']);
    }
    if (empty($_POST['desc'])) {
        $error_text = 'Please Content is required';
    } else {
        $groupModel->set_group_desc($_POST['desc']);
    }

    if (empty($_POST['school'])) {
        $error_text = 'Please School is required';
    } else {
        $groupModel->set_group_school_id($_POST['school']);
    }

    if (!isset($_POST['showEmail'])) {
        $groupModel->set_group_show_email(0);
    } else {
        $groupModel->set_group_show_email(1);
    }

    if (!isset($_POST['showPhone'])) {
        $groupModel->set_group_show_phone(0);
    } else {
        $groupModel->set_group_show_phone(1);
    }
    $groupModel->set_group_type($_POST['type']);
    $groupModel->set_group_user_id($id);
    $groupModel->set_group_status_id(2);
    if (!isset($error_text)) {
        if ($groupController->add_group($groupModel)) {
            $error_text = "Your Event is pending verifications...";
        } else {
            $error_text = "Sorry, We could not Post the Event";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>Create a New Group<hr /></h2>
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
                    <label for="type">Group Type: </label>
                    <select class="form-control" id="type" name="type">
                        <option value="1">Open </option>
                        <option value="2">Close </option>
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
                    <label for="group_image">Group Profile Image:</label>
                    <input type="file" id="group_image" name="group_image"  />
                </div>
                <div class="checkbox">
                    <label><input name="showEmail"type="checkbox">Show Email Address</label>
                </div>
                <div class="checkbox">
                    <label><input name="showPhone" type="checkbox">Show Phone Number</label>
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

function uploadFiles() {
    $error_status = 1;
    $image_to_upload = $_FILES['group_image'];
    $target_dir = "../res/imgs/group/";
    $image_name = $image_to_upload['name'];
    $target_file = $target_dir . basename($image_to_upload['name']);
    $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    if (!empty($target_file)) {
        if (getimagesize($image_to_upload['tmp_name']) !== FALSE) {
            $error_status = 1;
        } else {
            $error_status = 0;
        }

        if (file_exists($target_file)) {
            $error_status = 0;
        } else {
            $error_status = 1;
        }

        if ($image_to_upload['size'] > 10485760) {
            $error_status = 0;
        }

        if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
            $error_status = 0;
        } else {
            $error_status = 1;
        }

        if ($error_status == 1) {
            if (move_uploaded_file($image_to_upload['tmp_name'], $target_file)) {
                return dirname($target_file) . "/" . basename($image_to_upload['name']);
            }
        }
    } else {
        return 'none';
    }
}
?>
