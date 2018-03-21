<?php
require_once '../init.php';
if (isset($_POST['id'])) {
    $lodgeController->display_availabe_lodges();
}
