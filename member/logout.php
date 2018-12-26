<?php require '../init.php';
$userController->logout($_SESSION['user_id']);
unset($_SESSION['user_id']);
header("Location: ../");
exit;
