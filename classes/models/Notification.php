<?php
class Notification{
  private $notification_title	;
  private $notification_content;
  private $notification_url	;
  private $notification_receiver_id	;
  private $notification_school_id;
  private $notification_status_id;
  private $notification_user_id	;

  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get_notification_status_id() {
    return $this->notification_status_id;
  }
  public function get_notification_title () {
    return $this->notification_title;
  }
  public function get_notification_content () {
    return $this->notification_content;
  }
  public function get_notification_url() {
    return $this->notification_url;
  }
  public function get_notification_receiver_id () {
    return $this->notification_receiver_id;
  }
  public function get_notification_school_id() {
    return $this->notification_school_id;
  }
  
  public function get_notification_user_id () {
    return $this->notification_user_id;
  }
  
  public function set_notification_status_id(  $notification_status_id  ) {
    $this->notification_status_id = $notification_status_id;
  }
  public function set_notification_title ($notification_title) {
    $this->notification_title = $notification_title;
  }
  public function set_notification_content ($notification_content) {
    $this->notification_content = $notification_content;
  }
  public function set_notification_url($notification_url) {
    $this->notification_url = $notification_url;
  }
  public function set_notification_receiver_id ($notification_receiver_id) {
    $this->notification_receiver_id   = $notification_receiver_id;
  }
  public function set_notification_school_id($notification_school_id) {
  $this->notification_school_id = $notification_school_id;
  }
 
  public function set_notification_user_id ($notification_user_id) {
    $this->notification_user_id  = $notification_user_id;
  }
  
}
