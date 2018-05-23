<?php
require '../init.php';
$userController->cookie_login();
if (isset($_POST['add_to_cart']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($userController->is_authenticated()) {
    if(!$storeController->is_product_in_cart($_POST['pid'], get_user_uid())){
      if($storeController->add_to_cart($_POST['pid'], get_user_uid())){
        // Notify user of added product
        echo "Product added";
      }else {
        echo "Sorry, We could not add your product to cart, try again";
      }
    }else {
        echo "Sorry, Product already in cart";
    }
  }else {
    $userController->display_log_in_box();
  }
}

if(isset($_POST["cate"]) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['cid'];
   if ($id == 0) {
      $storeController->display_availabe_products(14, $resources, 0);
   }else {
     $id = $_POST['cid'];
      $storeController->display_availabe_products(14, $resources, $id);
   }
  }



 ?>
