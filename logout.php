<?php
  require 'init.php';
  $userController->logout(get_user_uid());
  unset($_SESSION['user_id']);
  header("Location: index.php");
  exit;
 ?>
