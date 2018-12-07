<?php
 function getExcerpt($content, $length) {
    if (strlen($content) < $length) {
        return $content;
    } else {
        $content = substr($content, 0, $length);
        return $content . ' ...';
    }
}

function get_remain_excerpt($content, $length) {
   if (strlen($content) < $length) {
       return $content;
   } else {
       $content = substr($content, $length, strlen($content));
       return $content;
   }
}

function get_user_uid()
{
  if(isset($_SESSION['user_id'])){
    return $_SESSION['user_id'];
  }else{
    return 0;
  }
}

function set_title($title = "Rischoola", $desc = "schooling in rivers state just got easier")
{
  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
    <title>'. $title .' | ' . $desc .'</title>
    ';
}

function get_site_name()
{
  $site_name = ' Rischoola ';
    return $site_name;
}

function  get_site_meta($page) {
  return $page;
}

function set_url($url)
{
  return (is_null(parse_url($url, PHP_URL_SCHEME)))? 'https://'. $url : $url;
}

function generate_unique_id(){
    return bin2hex(random_bytes(25));
}


function display_error(){
  global $error,$error_text, $succes_text, $warning_text;
  if (!empty($error_text)){
    echo '<div id="alertbox" class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p id="error">'. $error_text. '</p>
          <p id="error"><i>'. $warning_text. '</i></p>
          </div>';
  }elseif (isset($succes_text)) {
    echo '<div id="alertbox" class="alert alert-success fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p id="error">'. $succes_text. '</p>
          </div>';
  }
}

function random_string_gen(){
    $text = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012346789"),0,6);
    $time = substr(time(),6,4);
    $string = $text.$time;
    return $string;
}

function post_image_options(){
    return $options = array(
        "tags" => "My Image",
        "use_filename" => TRUE,
        "unique_filename" => FALSE,
    );
}

function build_notification($notifyModel, $receiver_id, $title, $message){
    // Notify user
    $notifyModel->set_notification_user_id(get_user_uid());
    $notifyModel->set_notification_receiver_id($receiver_id);
    $notifyModel->set_notification_content($message);
    $notifyModel->set_notification_title($title);
    $notifyModel->set_notification_status_id(13);

    return $notifyModel;
}


 function timeAgo($time_ago){
  $cur_time = time();
  $time_elapsed = $cur_time - strtotime($time_ago);
  $seconds = $time_elapsed ;
  $minutes = round($time_elapsed / 60 );
  $hours = round($time_elapsed / 3600);
  $days = round($time_elapsed / 86400 );
  $weeks = round($time_elapsed / 604800);
  $months = round($time_elapsed / 2600640 );
  $years = round($time_elapsed / 31207680 );
    if($seconds <= 60){
        if($seconds <= 5){
            return  "Just now";
        }else{
            return  "$seconds seconds ago";
        }
    }
    else if($minutes <=60){
       if($minutes==1){
       return  "one minute ago";
       }
       else{
       return  "$minutes minutes ago";
       }
    }
    else if($hours <=24){
       if($hours==1){
       return  "an hour ago";
       }else{
       return  "$hours hours ago";
       }
    }
    else if($days <= 7){
       if($days==1){
       return  "yesterday";
       }else{
       return  "$days days ago";
       }
    }
    else if($weeks <= 4.3){
       if($weeks==1){
       return  "a week ago";
       }else{
       return  "$weeks weeks ago";
       }
    }
    else if($months <=12){
       if($months==1){
       return  "a month ago";
       }else{
       return  "$months months ago";
       }
    }
    else{
       if($years==1){
       return  "one year ago";
       }else{
       return  "$years years ago";
       }
    }
}

function get_formatted_date($date)
{
  return date('l jS \of F Y', strtotime($date));
}

function time_elapsed_string($datetime, $full = true)
{
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'second',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';

}

function time_ago($timestamp){

    //date_default_timezone_set("Asia/Kolkata");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60){

      return "Just Now";

    } else if ($minutes <= 60){

      if ($minutes == 1){

        return "one minute ago";

      } else {

        return "$minutes minutes ago";

      }

    } else if ($hours <= 24){

      if ($hours == 1){

        return "an hour ago";

      } else {

        return "$hours hrs ago";

      }

    } else if ($days <= 7){

      if ($days == 1){

        return "yesterday";

      } else {

        return "$days days ago";

      }

    } else if ($weeks <= 4.3){

      if ($weeks == 1){

        return "a week ago";

      } else {

        return "$weeks weeks ago";

      }

    } else if ($months <= 12){

      if ($months == 1){

        return "a month ago";

      } else {

        return "$months months ago";

      }

    } else {

      if ($years == 1){

        return "one year ago";

      } else {

        return "$years years ago";

      }
    }
  }
