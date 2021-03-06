<?php
require 'dashboard-header.php';

if (isset($_POST['add_facility']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $lodgeController->add_facility($_POST['val']);
    if (!$lodgeController->is_facility_exist($_POST['val'])) {
        $lodgeController->add_lodge_facility($_POST['val']);
    }
}

if (isset($_POST['add_rule']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $lodgeController->add_rule($_POST['val']);
    if (!$lodgeController->is_rule_exist($_POST['val'])) {
        $lodgeController->add_lodge_rule($_POST['val']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = get_user_uid();
    if (empty($_FILES['lodge_image']['name']) || empty($_FILES['lodge_image']['tmp_name']) || empty($_FILES['lodge_image'])) {
        $error_text = 'Please Lodge Image is required';
    }
    if (empty($_POST['lodge_name'])) {
        $error_text = 'Please Lodge Name is required';
    } else {
        $lodgeModel->set_lodge_name($_POST['lodge_name']);
    }

    if (empty($_POST['lodge_address'])) {
        $error_text = 'Please Lodge Address is required';
    } else {
        $lodgeModel->set_lodge_address($_POST['lodge_address']);
    }

    if (empty($_POST['lodge_desc'])) {
        $error_text = 'Please Content is required';
    } else {
        $lodgeModel->set_lodge_desc($_POST['lodge_desc']);
    }
    if (empty($_POST['lodge_model'])) {
        $error_text = 'Please Model is required';
    } else {
        $lodgeModel->set_lodge_model_id($_POST['lodge_model']);
    }
    if (empty($_POST['lodge_school'])) {
        $error_text = 'Please School is required';
    } else {
        $lodgeModel->set_lodge_school_id($_POST['lodge_school']);
    }
    $lodgeModel->set_lodge_user_id($id);
    $lodgeModel->set_lodge_status_id(2);
    if (!isset($error_text)) {
        $lodge_id = $lodgeController->add_lodge($lodgeModel);
        if ($lodge_id != 0) {
            $image_id = uploadFiles($id, $lodge_id);
            if($image_id != 0){
                if($lodgeController->insert_lodge_featured_image_id($image_id, $lodge_id)){
                    // Log here


                    // Notify user
                    $message = 'You inserted a new lodge';
                    $notifier->add_notification(build_notification($notifyModel, get_user_uid(), 'New Lodge', $message));
                    $succes_text = "Your Lodge is pending verifications...";
                }

            }else {
                $error_text = "Your Lodge inserted without featured Image...";
            }
        } else {
            $error_text = "Sorry, We could not Post your Lodge";
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-11 member_layout">
            <div class="col-md-12">
                <h2>Add a new Lodge<hr /></h2>
            </div>
            <div id="err"><?php display_error();
            if (!is_null($_GET['id'])) {
                $value = explode('--', $_GET['id']);
                $slug = strval($value[0]);
                $id = intval($value[1]);
                $row = $lodgeController->get_lodge_by_id_and_slug($id,$slug);
                extract($row);?></div>
                <div class="col-md-5">
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="lodge_name">Lodge Name:</label>
                            <input class="form-control" value="<?php echo $lodge_name ?>" id="lodge_name" name="lodge_name" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="lodge_price">Price:</label>
                            <input class="form-control" value="<?php echo $lodge_price ?>" id="lodge_price" name="lodge_price" type="number" />
                        </div>
                        <div class="form-group">
                            <label for="lodge_desc" > Description: </label>
                            <textarea rows="10" id="desc" name="lodge_desc" class="form-control"> <?php echo $lodge_desc ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="lodge_address" > Address: </label>
                            <textarea rows="5" id="lodge_address" name="lodge_address" class="form-control"> <?php echo $lodge_address ?> </textarea>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <span><i style="color:red"> leave blank for saved images </i></span>
                        <div class="form-group">
                            <label for="lodge_image">Choose Featured image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
                            <i style="color:red">Featured image </i>
                        </div>
                        <div class="form-group">
                            <label for="lodge_image">Choose image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lodge_image">Choose image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lodge_school">Select School</label>
                            <select class="form-control" id="lodge_school" name="lodge_school">
                                <option value="<?php echo $lodge_school_id ?>"><?php echo $schoolController->get_school_name_by_id($lodge_school_id); ?> </option>
                                <?php $schoolController->get_schools($lodge_school_id); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lodge_model">Select Models</label>
                            <div class="checkbox">
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="3" <?php echo ($lodge_model_id == 3) ? 'checked' : "" ?>>Self Contain</label>
                            </div>
                            <div class="checkbox">
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="1" <?php echo ($lodge_model_id == 1) ? 'checked' : "" ?>>Single Room</label>
                            </div>
                            <div class="checkbox">
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="6" <?php echo ($lodge_model_id == 6) ? 'checked' : "" ?>>Hostel</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label  for="lodge_facilities">Select/Insert Facilities</label>
                            <input class="form-control" list="facility" id="lodge_facilities" placeholder="Type to add a new Facility" name="lodge_facilities" />
                            <datalist id="facility">
                                <?php $lodgeController->get_lodge_facilities() ?>
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="lodge_rules">Select/Insert Rules</label>
                            <input class="form-control" id="lodge_rules" list="rules" placeholder="Type to add a new Rule" name="lodge_rules" />
                            <datalist id="rules">
                                <?php $lodgeController->get_lodge_rules(); ?>
                            </datalist>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="text-center btn btn-primary btn-lg" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="col-md-5">
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
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
                            <textarea rows="10" id="lodge_desc" name="lodge_desc" class="form-control"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="lodge_address" > Address: </label>
                            <textarea rows="5" id="lodge_address" name="lodge_address" class="form-control"> </textarea>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="lodge_image">Choose Featured image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
                            <i>featured image </i>
                        </div>
                        <div class="form-group">
                            <label for="lodge_image">Choose image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lodge_image">Choose image: </label>
                            <input type="file" id="lodge_image" name="lodge_image[]" class="form-control" />
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
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="3">Self Contain</label>
                            </div>
                            <div class="checkbox">
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="1" checked>Single Room</label>
                            </div>
                            <div class="checkbox">
                                <label><input id="lodge_model" name="lodge_model" type="radio" value="6">Hostel</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label  for="lodge_facilities">Select/Insert Facilities</label>
                            <input class="form-control" list="facility" id="lodge_facilities" placeholder="Type to add a new Facility" name="lodge_facilities" />
                            <datalist id="facility">
                                <?php $lodgeController->get_lodge_facilities() ?>
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="lodge_rules">Select/Insert Rules</label>
                            <input class="form-control" id="lodge_rules" list="rules" placeholder="Type to add a new Rule" name="lodge_rules" />
                            <datalist id="rules">
                                <?php $lodgeController->get_lodge_rules(); ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="text-center btn btn-primary btn-lg" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php
function uploadFiles($user_id, $inserted_id) {
    $files = $_FILES["lodge_image"];
    return Resources::upload_image($files, $user_id, $inserted_id, "lodges");
}

require_once('footer.php');
?>
