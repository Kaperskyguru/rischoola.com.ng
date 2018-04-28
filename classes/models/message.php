<?php

class MessageModel {
  private $message_id	;
  private $message_sender_id	;
  private $message_receiver_id	;
  private $message_status_id;
  private $message_body;
  private $message_subject	;
  private $message_date_created	;
  private $message_type;

  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get_message_id () {
    return $this->message_id;
  }
  public function get_message_sender_id() {
    return $this->message_sender_id;
  }
  public function get_message_receiver_id () {
    return $this->message_receiver_id;
  }
  public function get_message_status_id() {
    return $this->message_status_id;
  }
  public function get_message_body() {
    return $this->message_body;
  }
  public function get_message_date_created () {
    return $this->message_date_created;
  }

  public function get_message_subject () {
    return $this->message_subject;
  }
  public function get_message_type() {
    return $this->message_type;
  }

  public function set_message_id ($message_id) {
    $this->message_id = $message_id;
  }
  public function set_message_sender_id($message_sender_id) {
    $this->message_sender_id = $message_sender_id;
  }
  public function set_message_receiver_id ($message_receiver_id) {
    $this->message_receiver_id = $message_receiver_id;
  }
  public function set_message_status_id(  $message_status_id  ) {
    $this->message_status_id = $message_status_id;
  }
  public function set_message_body($message_body) {
  $this->message_body = $message_body;
  }
  public function set_message_date_created($message_date_created) {
    $this->message_date_created = $message_date_created;
  }

  public function set_message_subject ($message_subject) {
    $this->message_subject  = $message_subject;
  }
  public function set_message_type($message_type) {
    $this->message_type = $message_type;
  }

}
