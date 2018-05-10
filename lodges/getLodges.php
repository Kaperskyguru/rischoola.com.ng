<?php
require_once '../init.php';
if (isset($_POST['id'])) {
    $lodgeController->display_availabe_lodges();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['hostel_search'])) {
        $option = [
            'hostel_school' => $_POST['hostel_school'],
            'max_price' => $_POST['max_price'],
            'min_price' => $_POST['min_price'],
            'hostel_name' => $_POST['hostel_name'],
            'hostel_type' => $_POST['hostel_type'],
        ];

        $lodgeController->display_search_lodges(0, "../", $resources, $option);
        
    }
}
