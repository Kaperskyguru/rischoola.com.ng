<?php
require 'dashboard-header.php';

$error = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['user_id'];
    if (empty($_FILES['product_image']['name']) || empty($_FILES['product_image']['tmp_name']) || empty($_FILES['product_image'])) {
        $error_text = "Image is required";
        //$storeModel->set_product_featured_image_id(NULL);
    }
    if (empty($_POST['title'])) {
        $error_text = 'Please title is required';
    } else {
        $storeModel->set_product_title($_POST['title']);
    }
    if (empty($_POST['desc'])) {
        $error_text = 'Please Content is required';
    } else {
        $storeModel->set_product_desc($_POST['desc']);
    }
    if (empty($_POST['product_price'])) {
        $error_text = 'Please Product is required';
    } else {
        $storeModel->set_product_price($_POST['product_price']);
    }
    if (empty($_POST['avail_status'])) {
        $error_text = 'Please Availability is required';
    } else {
        $storeModel->set_product_avail_status_id($_POST['avail_status']);
    }
    if (empty($_POST['condition'])) {
        $error_text = 'Please Condition is required';
    } else {
        $storeModel->set_product_condition($_POST['condition']);
    }
    if (empty($_POST['location'])) {
        $error_text = 'Please Location is required';
    } else {
        $storeModel->set_product_address($_POST['location']);
    }
    if (empty($_POST['cat'])) {
        $error_text = 'Please Category is required';
    } else {
        $storeModel->set_product_category_id($_POST['cat']);
    }
    if (empty($_POST['school'])) {
        $error_text = 'Please School is required';
    } else {
        $storeModel->set_product_school_id($_POST['school']);
    }
    if (!isset($_POST['showPhone'])) {
        $storeModel->set_product_show_phone(0);
    } else {
        $storeModel->set_product_show_phone(1);
    }

    if (!isset($_POST['showEmail'])) {
        $storeModel->set_product_show_email(0);
    } else {
        $storeModel->set_product_show_email(1);
    }
    $storeModel->set_product_user_id($id);
    $storeModel->set_product_status_id(2);
    if (!isset($error_text)) {
      $product_id = $storeController->add_product($storeModel);
        if ($product_id != 0) {
            $image_id = uploadFiles($id, $product_id, $resources);
            // if ($image_src == 'none') {
            //     $error_text = "Not Uploaded";
            // } else {
              //$image_id = $resources->add_images_and_get_last_inserted_id($image_src, $id, $product_id, "product");
              if($storeController->insert_product_featured_image_id($image_id, $product_id)){
                $error_text = "Your product is pending verifications...";
              }else {
                $error_text = "Your product inserted without featured Image...";
              }
            // }
        } else {
            $error_text = "Sorry, We could not publish your product.";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-10" style="margin-left: 10px;background-color:#fff; border-radius:10px; border:2px solid #eee">
            <h2>Add a New Product<hr /></h2>
            <?php display_error(); ?>
            <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Product Title:</label>
                    <input class="form-control" id="title" name="title" type="text" />
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price: </label>
                    <input type="number" id="product_price" name="product_price" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="desc">Description: </label>
                    <p>Take your time to describe the features of your item and why the buyer should get it.</p>
                    <textarea rows="5" id="desc" name="desc" class="form-control"> </textarea>
                </div>

                <div class="form-group row">
                    <div class="col-xs-3">
                        <label for="product_image">Choose Featured image:</label>
                        <input type="file"id="product_image" name="product_image[]" class="form-control"></input>
                    </div>
                    <div class="col-xs-3">
                        <label for="">Product Image 2</label>
                        <input type="file" id="product_image2" name="product_image[]" class="form-control"></input>
                    </div>
                    <div class="col-xs-3">
                        <label for="product_image3">Product image 3: </label>
                        <input type="file" id="product_image3" name="product_image[]" class="form-control" />
                    </div>
                    <div class="col-xs-3">
                        <label for="product_image3">Product image 4: </label>
                        <input type="file" id="product_image3" name="product_image[]" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="avail_status">Availability Status: </label>
                    <select id="avail_status" name="avail_status" class="form-control">
                      <option value="10">In Stock</option>
                      <option value="11">Out of Stock </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location: </label>
                    <input type="text" id="location" name="location" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="condition">Condition: </label>
                    <select id="condition" name="condition" class="form-control">
                      <option value="12">Used</option>
                      <option value="4">New </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cat">Category:</label>
                    <select class="form-control" id="cat" name="cat">
                        <option value="0">Select Categories </option>
                        <?php $storeController->get_product_category(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="school">Select School</label>
                    <select class="form-control" id="school" name="school">
                        <option value="0">All School </option>
                        <?php $schoolController->get_schools(); ?>
                    </select>
                </div>
                <div class="checkbox">
                    <label><input id="showEmail" name="showEmail" type="checkbox" />Show Email Address</label>
                </div>
                <div class="checkbox">
                    <label><input id="showPhone" name="showPhone" type="checkbox" />Show Phone Number</label>
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

function uploadFiles($user_id, $inserted_id, $resources) {
    $files = $_FILES["product_image"];
    return Image::upload_image($files, $user_id, $inserted_id, $resources, 'products');  
}

// function uploadFiles() {
//     $error_status = 1;
//     $image_to_upload = $_FILES['product_image'];
//     $target_dir = "../res/imgs/product/";
//     $image_name = $image_to_upload['name'];
//     $target_file = $target_dir . basename($image_to_upload['name']);
//     $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
//     if (!empty($target_file)) {
//         if (getimagesize($image_to_upload['tmp_name']) !== FALSE) {
//             $error_status = 1;
//         } else {
//             $error_status = 0;
//         }

//         if (file_exists($target_file)) {
//             $error_status = 0;
//         } else {
//             $error_status = 1;
//         }

//         if ($image_to_upload['size'] > 10485760) {
//             $error_status = 0;
//         }

//         if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
//             $error_status = 0;
//         } else {
//             $error_status = 1;
//         }

//         if ($error_status == 1) {
//             if (move_uploaded_file($image_to_upload['tmp_name'], $target_file)) {
//                 return dirname($target_file) . "/" . basename($image_to_upload['name']);
//             }
//         }
//     } else {
//         return 'none';
//     }
// }
?>