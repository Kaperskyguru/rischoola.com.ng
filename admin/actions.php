<?php
require '../init.php';

if (isset($_POST['approveBox']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        $newsControler->view_delete_confirmation($_POST['id']);
        return;
        // Log message: user_name deleted 'event_reminder name'
        // exit(header('Location: event_reminder.php'));
    }
}

if (isset($_POST['approvePost']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        $newsControler->view_delete_confirmation($_POST['id']);
        return;
        // Log message: user_name deleted 'event_reminder name'
        // exit(header('Location: event_reminder.php'));
    }
}