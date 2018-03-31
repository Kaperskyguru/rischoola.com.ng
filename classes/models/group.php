<?php

class GroupModel {
  private $group_title	;
  private $group_desc	;
  private $group_status_id;
  private $group_school_id;
  private $group_date_created	;
  private $group_user_id	;
  private $group_keyword;
  private $group_featured_image_id;
  private $showEmail, $showPhone, $group_type;
  public function __construct()
  {

  }
  public function get_group_type() {
      return filter_var($this->group_type, FILTER_SANITIZE_NUMBER_INT);
  }

  public function get_show_email() {
      return filter_var($this->showEmail, FILTER_SANITIZE_NUMBER_INT);
  }

  public function get_show_phone() {
      return filter_var($this->showPhone, FILTER_SANITIZE_NUMBER_INT);
  }

  public function get_group_featured_image_id() {
      return filter_var($this->group_featured_image_id, FILTER_SANITIZE_NUMBER_INT);
  }

  public function get_group_desc() {
    return $this->group_desc;
  }
  public function get_group_title () {
    return $this->group_title;
  }
  public function get_group_status_id() {
    return $this->group_status_id;
  }
  public function get_group_school_id() {
    return $this->group_school_id;
  }
  public function get_group_date_created () {
    return $this->group_date_created;
  }

  public function get_group_user_id () {
    return $this->group_user_id;
  }
  public function get_group_keyword() {
    return $this->group_keyword;
  }

  public function set_group_desc($group_desc) {
    $this->group_desc = $group_desc;
  }
  public function set_group_type($group_type) {
    $this->group_type = $group_type;
  }

  public function set_group_title ($group_title) {
    $this->group_title = $group_title;
  }
  public function set_group_status_id(  $group_status_id  ) {
    $this->group_status_id = $group_status_id;
  }
  public function set_group_school_id($group_school_id) {
  $this->group_school_id = $group_school_id;
  }
  public function set_group_date_created($group_date_created) {
    $this->group_date_created = $group_date_created;
  }

  public function set_group_user_id ($group_user_id) {
    $this->group_user_id  = $group_user_id;
  }
  public function set_group_keyword($group_keyword) {
    $this->group_keyword = $group_keyword;
  }

  public function set_group_show_email($group_show_email) {
    $this->showEmail = $group_show_email;
  }

  public function set_group_show_phone($group_show_phone) {
    $this->showPhone = $group_show_phone;
  }

  public function set_group_featured_image_id($group_featured_image_id) {
      $this->group_featured_image_id = $group_featured_image_id;
  }

}
