<?php

class EventModel {
  private $event_name	;
  private $event_address	;
  private $event_desc	;
  private $event_status_id;
  private $event_school_id;
  private $event_date_created	;
  private $event_user_id	;
  private $event_keyword;

  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get_event_address () {
    return $this->event_address;
  }
  public function get_event_desc() {
    return $this->event_desc;
  }
  public function get_event_name () {
    return $this->event_name;
  }
  public function get_event_status_id() {
    return $this->event_status_id;
  }
  public function get_event_school_id() {
    return $this->event_school_id;
  }
  public function get_event_date_created () {
    return $this->event_date_created;
  }

  public function get_event_user_id () {
    return $this->event_user_id;
  }
  public function get_event_keyword() {
    return $this->event_keyword;
  }

  public function set_event_address ($event_address) {
    $this->event_address = $event_address;
  }
  public function set_event_desc($event_desc) {
    $this->event_desc = $event_desc;
  }
  public function set_event_name ($event_name) {
    $this->event_name = $event_name;
  }
  public function set_event_status_id(  $event_status_id  ) {
    $this->event_status_id = $event_status_id;
  }
  public function set_event_school_id($event_school_id) {
  $this->event_school_id = $event_school_id;
  }
  public function set_event_date_created($event_date_created) {
    $this->event_date_created = $event_date_created;
  }

  public function set_event_user_id ($event_user_id) {
    $this->event_user_id  = $event_user_id;
  }
  public function set_event_keyword($event_keyword) {
    $this->event_keyword = $event_keyword;
  }

}
