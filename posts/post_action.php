<?php
require_once '../init.php';
$userController->cookie_login();

// if (isset($_POST['id'])) {
// $newsControler->display_latest_post(8, "");
// }

if(isset($_POST['like']) && $_SERVER['REQUEST_METHOD'] == "POST"){
  if($userController->is_authenticated()){
    // if ($_SESSION['like_id'] == $_SESSION['user_id']) {
      // echo $newsControler->get_post_likes($_POST['pid']);
    // }else {
      $newsModel->set_post_id($_POST['pid']);
      $newsModel->set_post_like_count(1);
      $like = $newsControler->incrementLikes($newsModel);
      // if ($like) {
        // $_SESSION['like_id'] = $_SESSION['user_id'];
        echo $like;
      // }
    // }
  }else {
    echo $newsControler->get_post_likes($_POST['pid']);
  }
}

// USE A DATABASE TABLE TO PROCESS LIKES
if(isset($_POST['dislike']) && $_SERVER['REQUEST_METHOD'] == "POST"){
  if($userController->is_authenticated()){
    // if ($_SESSION['dislike_id'] == $_SESSION['user_id']) {
      // echo $newsControler->get_post_dislikes($_POST['pid']);
    // }else {
    $newsModel->set_post_id($_POST['pid']);
    $newsModel->set_post_dislike_count(1);
    $dislike = $newsControler->incrementDislikes($newsModel);
     //if ($dislike) {
       $_SESSION['dislike_id'] = get_user_uid();
      echo $dislike;
     //}
  // }
  }else {
    echo $newsControler->get_post_dislikes($_POST['pid']);
  }
}


if(isset($_POST['comment']) && !empty($_POST['comment_body'])  && $_SERVER['REQUEST_METHOD'] == "POST"){
  echo 'hi';
}
