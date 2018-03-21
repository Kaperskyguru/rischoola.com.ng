<?php

class LodgeModel {
  private $lodge_name	;
  private $lodge_address	;
  private $lodge_desc	;
  private $lodge_status_id;
  private $lodge_model_id	;
  private $lodge_review_count;
  private $lodge_facilities	;
  private $lodge_rules	;
  private $lodge_school_id;
  private $lodge_featured_image_id;
  private $lodge_date_created	;
  private $lodge_user_id	;
  private $lodge_keyword;

  public function __construct()
  {

  }

  public function get_lodge_address () {
    return $this->lodge_address;
  }
  public function get_lodge_desc() {
    return $this->lodge_desc;
  }
  public function get_lodge_name () {
    return $this->lodge_name;
  }
  public function get_lodge_status_id() {
    return $this->lodge_status_id;
  }
  public function get_lodge_model_id () {
    return $this->lodge_model_id;
  }
  public function get_lodge_review_count () {
    return $this->lodge_review_count;
  }
  public function get_lodge_facilities() {
    return $this->lodge_facilities;
  }
  public function get_lodge_rules () {
    return $this->lodge_rules;
  }
  public function get_lodge_school_id() {
    return $this->lodge_school_id;
  }
  public function get_lodge_date_created () {
    return $this->lodge_date_created;
  }

  public function get_lodge_user_id () {
    return $this->lodge_user_id;
  }
  public function get_lodge_keyword() {
    return $this->lodge_keyword;
  }

  public function get_lodge_featured_image_id() {
    return $this->lodge_featured_image_id;
  }
  public function set_lodge_address ($lodge_address) {
    $this->lodge_address = $lodge_address;
  }
  public function set_lodge_desc($lodge_desc) {
    $this->lodge_desc = $lodge_desc;
  }
  public function set_lodge_name ($lodge_name) {
    $this->lodge_name = $lodge_name;
  }
  public function set_lodge_status_id(  $lodge_status_id  ) {
    $this->lodge_status_id = $lodge_status_id;
  }
  public function set_lodge_model_id ($lodge_model_id) {
    $this->lodge_model_id = $lodge_model_id;
  }
  public function set_lodge_review_count () {

  }
  public function set_lodge_facilities($lodge_facilities) {
    $this->lodge_facilities = $lodge_facilities;
  }
  public function set_lodge_rules ($lodge_rules) {
    $this->lodge_rules   = $lodge_rules;
  }
  public function set_lodge_school_id($lodge_school_id) {
  $this->lodge_school_id = $lodge_school_id;
  }
  public function set_lodge_date_created ($lodge_date_created) {
    $this->lodge_date_created = $lodge_date_created;
  }

  public function set_lodge_user_id ($lodge_user_id) {
    $this->lodge_user_id  = $lodge_user_id;
  }
  public function set_lodge_keyword($lodge_keyword) {
    $this->lodge_keyword = $lodge_keyword;
  }

  public function set_lodge_featured_image_id($lodge_featured_image_id) {
    $this->lodge_featured_image_id = $lodge_featured_image_id;
  }

}
