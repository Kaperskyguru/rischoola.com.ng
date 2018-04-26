<?php
require_once '../init.php';
$userController->cookie_login();

if(isset($_POST['set_join_group']) && $_SERVER['REQUEST_METHOD'] == "POST"){
  if($userController->is_authenticated()){
    if($groupController->is_group_member($_POST['gid'], get_user_uid())){
      echo "You are already a member";
    }else{
      if($groupController->join_group($_POST['gid'], get_user_uid())){
        // Log message: 'user_name' join 'group name'
        if($groupController->update_member_count($_POST['gid'], TRUE)){
          echo "You are now a member";
        }else{
          echo "";
        }
      }else{
        echo "Sorry, We could not add you to this group";
      }
    }
  }else {
    echo "Please Log in to Join group";
  }
}

if(isset($_POST['leave_group']) && $_SERVER['REQUEST_METHOD'] == "POST"){
  if($groupController->leave_group($_POST['gid'], get_user_uid())){
    // Log message: solomon left 'group name'
    $groupController->update_member_count($_POST['gid'], FALSE);
    echo "You left the group";
  }else {
    echo "Sorry, Could not left group";
  }
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['send_group_admin_message'])){
    if(!empty($_POST['message']) && !empty($_POST['subject'])){
    $messageModel->set_message_sender_id(get_user_uid());
    $messageModel->set_message_receiver_id($_POST['uid']);
    $messageModel->set_message_subject($_POST['subject']);
    $messageModel->set_message_body($_POST['message']);
    $messageModel->set_message_type("groups");
    $last_inserted_message_id = $messageController->send_message($messageModel);

    if($last_inserted_message_id != 0){
      // Log message: 'Sender name' send 'Receiver name'
      echo "Message Sent";
    }else {
      echo "Sorry, We Could not send your message";
    }
  }else {
    echo "No field should be empty.. Please check";
  }
}
