<?php
  require_once '../init.php';
  $userController->logout($_SESSION['user_id'], TRUE);
  unset($_SESSION['user_id']);
  header("Location: ../index.php");
  exit;
 ?>
