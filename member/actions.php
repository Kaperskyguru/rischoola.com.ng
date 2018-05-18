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


if (isset($_POST['send_message']) && isset($_POST['body']) && isset($_POST['subject']) && isset($_POST['receiver']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $receiver_id = $userController->get_user_id_by_username($_POST['receiver']);
    if ($receiver_id == 0) {
        echo "Sorry, We could not find the user";
    } else {
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
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save_draft']) && isset($_POST['body']) && isset($_POST['subject']) && isset($_POST['receiver'])) {
        $receiver_id = $userController->get_user_id_by_username($_POST['receiver']);
        if ($receiver_id == 0) {
            echo "Sorry, We could not find the user";
        } else {
            $messageModel->set_message_sender_id(get_user_uid());
            $messageModel->set_message_receiver_id($receiver_id);
            $messageModel->set_message_subject($_POST['subject']);
            $messageModel->set_message_body($_POST['body']);
            $messageModel->set_message_type("Draft Message");
            $last_inserted_message_id = $messageController->save_draft($messageModel);
            if ($last_inserted_message_id == 0) {
                echo "Sorry, We could not save your message";
                // Log error
            } else {
                // Log message: user name send direct message to 'user name'
                echo "Message save successfully";
                // Notify_user($user_id, $last_inserted_message_id);
            }
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['UpdateProfile'])) {
    $id = get_user_uid();

    // We may decide to check for errors later..
    $username = $_POST['username'];
    $user_name = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_phone_number = $_POST['user_phone_number'];
    $user_address = $_POST['user_address'];
    $user_about = $_POST['user_about'];
    //$user_password = $_POST['password'];
    $user_birthday = $_POST['user_birthday'];
    $user_course_of_study = $_POST['user_course_of_study'];
    $user_level = $_POST['user_level'];
    $user_gender = $_POST['user_gender'];
    $user_school_id = $_POST['user_school_id'];
    $user_display_name = $_POST['user_display_name'];

    $userModel->set_user_name($user_name);
    $userModel->set_user_user_name($username);
    $userModel->set_user_id($id);
    $userModel->set_user_email($user_email);
    $userModel->set_user_level($user_level);
    $userModel->set_user_gender($user_gender);
    $userModel->set_user_address($user_address);
    $userModel->set_user_about($user_about);
    $userModel->set_user_school_id($user_school_id);
    $userModel->set_user_display_name($user_display_name);
    $userModel->set_user_phone_number($user_phone_number);
    $userModel->set_user_birthday($user_birthday);
    $userModel->set_user_course_of_study($user_course_of_study);

    if ($userController->update_user($userModel)) {
        echo "Updated successfully";
    } else {
        echo "Sorry, we could not update your account";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_bank_information']) && isset($_POST['account_number']) && isset($_POST['account_name']) && isset($_POST['bank_name'])) {
    $id = get_user_uid();
    // We may decide to check for errors later..
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['account_name'];
    $account_number = $_POST['account_number'];
    if ($userController->update_user_bank_details($id, $bank_name, $account_name, $account_number)) {
        echo "Updated successfully";
    } else {
        echo "Sorry, we could not update your bank Information";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password']) && isset($_POST['old_password'])) {
    $id = get_user_uid();

    // We may decide to check for errors later..
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $log_all_out = $_POST['log_all_out'];
    $userModel->set_user_id($id);

    if ($new_password == $confirm_password) {
        $userModel->set_user_password($new_password);
        if ($userController->verify_password($old_password, $id)) {
            if ($userController->update_user_password($userModel)) {
                if ($log_all_out) {
                    $userController->logout($id, TRUE);
                }
                echo "Updated successfully";
            } else {
                echo "Sorry, we could not update your account";
            }
        } else {
            echo 'Old password do not match';
        }
    } else {
        echo 'Password do not match';
    }
}
