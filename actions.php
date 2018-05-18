<?php
require_once 'init.php';
$userController->cookie_login();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['id'])){
        $schoolController->get_schools_by_category($_POST['cat_id']);
    }
}

