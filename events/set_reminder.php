<?php
require '../init.php';
$userController->cookie_login();

if (isset($_POST['set_reminder']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  if ($userController->is_authenticated()) {
    if($eventController->is_reminder_set($_POST['event_id'], $_SESSION['user_id'])){
      echo 'TRUE';
    }else{
      $bool = $eventController->set_event_reminder($_POST['event_id'], $_SESSION['user_id'], $eventController->get_event_date_by_id($_POST['event_id']));
      if($bool){
        echo 'TRUE';
      }
      else{
          echo $event_id;
      echo 'FALSE';
      }
    }
  }else{
    echo 'Please log in' ;
  }
}
if(isset($_SERVER['REQUEST_METHOD']) == "post"){
    if (isset($_POST['search_set'])){
     $eventController->display_search_events($resources, $_POST['sid']);
    }
}
