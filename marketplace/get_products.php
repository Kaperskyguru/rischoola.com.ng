<?php
require '../init.php';
$userController->cookie_login();
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

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
    $limit = 14; //if you want to dispaly 10 records per page then you have to change here
    $startpoint = ($page * $limit) - $limit;
      $storeController->display_availabe_products($startpoint, $limit, $resources, 0);
   }else {
    $limit = 14; //if you want to dispaly 10 records per page then you have to change here
    $startpoint = ($page * $limit) - $limit;
     $id = $_POST['cid'];
      $storeController->display_availabe_products($startpoint, $limit, $resources, $id);
   }
  }



 ?>
