<?php

require '../init.php';

if (isset($_POST['set_reminder_del']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if ($eventController->trash_reminder($_POST['reminder_id'])) {
        // Log message: user_name deleted 'event_reminder name'
        exit(header('Location: event_reminder.php'));
    }
}

if (isset($_POST['set_event_del']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if ($eventController->trash_event($_POST['event_id'])) {
        // Log message: user_name deleted 'event name'
        exit(header('Location: view_event.php'));
    }
}

if (isset($_POST['set_message_del']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if ($messageController->trash_message($_POST['message_id'])) {
        // Log message: user_name deleted 'message name'
        echo "message deleted successfully";
        exit(header('Location: inbox.php'));
    }
}

if (isset($_POST['set_group_del']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if ($groupController->trash_group($_POST['group_id'])) {
        // Log message: user_name deleted 'group name'
        exit(header('Location: groups.php'));
    }
}

if (isset($_POST['leave_group']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if ($groupController->leave_group($_POST['gid'], get_user_uid())) {
        // Log message: solomon left 'group name'
        echo "You left the group";
    } else {
        echo "Sorry, Could not leave group";
    }
}

if (isset($_POST['i_have_a_room'])) {
    $roommateController->display_if_room($schoolController, $lodgeController);
    //display_no_room_form();
}

if (isset($_POST['i_dont_have_a_room'])) {
    $roommateController->display_no_room_form($schoolController, $lodgeController);
}


if (isset($_POST['send_message']) && !isset($_POST['body']) && !isset($_POST['subject']) && !isset($_POST['receiver']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $receiver_id = $userController->get_user_id_by_username($_POST['receiver']);
    $messageModel->set_message_sender_id(get_user_uid());
    $messageModel->set_message_receiver_id($receiver_id);
    $messageModel->set_message_subject($_POST['subject']);
    $messageModel->set_message_body($_POST['body']);
    $messageModel->set_message_type("DM");
    $last_inserted_message_id = $messageController->send_message($messageModel);
    if ($last_inserted_message_id == 0) {
        echo "Sorry, We could not deliver your message";
        // Log error
    } else {
        // Log message: user name send direct message to 'user name'
        echo "Message sent successfully";
        // Notify_user($user_id, $last_inserted_message_id);
    }
} else {
    echo "All fields are required";
}
