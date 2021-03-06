<?php
require 'dashboard-header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = get_user_uid();
    $error = 0;
    if (empty($_FILES['group_image']['name']) || empty($_FILES['group_image']['tmp_name']) || empty($_FILES['group_image'])) {
        $error_text = "Image is required";
        $error = 1;
        //$groupModel->set_group_featured_image_id(0);
    }

    if (empty($_POST['title'])) {
        $error_text = 'Please title is required';
        $error = 1;
    } else {
        $groupModel->set_group_title($_POST['title']);
    }
    if (empty($_POST['desc'])) {
        $error_text = 'Please Content is required';
        $error = 1;
    } else {
        $groupModel->set_group_desc($_POST['desc']);
    }

    if (empty($_POST['school'])) {
        $error_text = 'Please School is required';
        $error = 1;
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
    $groupModel->set_group_user_id($user_id);
    $groupModel->set_group_status_id(2);
    if (!isset($error_text)) {
        $inserted_id = $groupController->add_group($groupModel);
        if ($inserted_id !== 0) {
            $image_id = uploadFiles($user_id, $inserted_id);
            if($image_id != 0){
                if($groupController->insert_group_featured_image_id($image_id, $inserted_id)){

                    // Notify user
                    $message = 'You created a new Group';
                    $notifier->add_notification(build_notification($notifyModel, get_user_uid(), 'New Group', $message));
                    $succes_text = "Your Group is pending verifications...";
                }
              }else {
                $error_text = "Your Group created without featured Image...";
              }

        } else {
            $error_text = "Sorry, We could not Create the Group";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-10" style="margin-left: 10px;background-color:#fff; border-radius:10px; border:2px solid #eee">
            <h2>Create a New Group<hr /></h2>
            <?php display_error();

            if (!is_null($_GET['id'])) {
                $groupId = $_GET['id'];
                $row = $groupController->get_group_by_id($groupId);
                extract($row); ?>

                <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input value="<?php echo $group_title ?>" class="form-control" id="title" name="title" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="desc" > Description: </label>
                        <textarea rows="10" id="desc" name="desc" class="form-control"><?php echo $group_desc ?> </textarea>
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
                            <option value="<?php echo $group_school_id ?>"><?php echo $schoolController->get_school_name_by_id($group_school_id); ?> </option>
                            <?php $schoolController->get_schools($group_school_id); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="group_image">Group Profile Image:</label>
                        <input type="file" id="group_image[]" name="group_image[]"  />
                    </div>
                    <div class="checkbox">
                        <label><input name="showEmail" <?php echo ($group_show_email == 1) ? "checked" : "" ?> type="checkbox">Show Email Address</label>
                    </div>
                    <div class="checkbox">
                        <label><input name="showPhone" <?php echo ($group_show_phone == 1) ? "checked" : "" ?> type="checkbox">Show Phone Number</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>

            <?php } else {?>

            <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" name="title" type="text" />
                </div>
                <div class="form-group">
                    <label for="desc" > Description: </label>
                    <textarea rows="10" id="desc" name="desc" class="form-control"> </textarea>
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
                    <input type="file" id="group_image[]" name="group_image[]"  />
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
        <?php } ?>
        </div>
    </div>
</div>

<?php
function uploadFiles($user_id, $inserted_id) {
    $files = $_FILES["group_image"];
    return Image::upload_image($files, $user_id, $inserted_id, "groups");
}
require_once('footer.php');
