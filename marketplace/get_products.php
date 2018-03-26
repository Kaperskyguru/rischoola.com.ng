<?php
require '../init.php';
if(isset($_POST["cate"]) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['cid'];
   if ($id == 0) {
      $storeController->display_availabe_products(14, "../", 0);
   }else {
     $id = $_POST['cid'];
      $storeController->display_availabe_products(14, "../", $id);
   }
 }else {
    $storeController->display_availabe_products(14, "../", 0);
 }
 ?>
