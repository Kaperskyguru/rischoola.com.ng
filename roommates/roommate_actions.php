<?php
require_once '../init.php';
$userController->cookie_login();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $options = [
        'school_id' =>$_POST['roommate_school'],
        'gender' => $_POST['roommate_gender'],
        'type' => $_POST['roommate_type']
    ];
    
    if (isset($_POST['roommate_search_set'])){
        $roommateController->display_search_roommates(0, $resources,$options);
    }

}