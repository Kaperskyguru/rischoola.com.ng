<?php

class MarketplaceModel {
  private $product_title	;
  private $product_address	;
  private $product_desc	;
  private $product_status_id;
  private $product_avail_status_id	;
  private $product_review_count;
  private $product_condition	;
  private $product_price	;
  private $product_school_id;
  private $product_featured_image_id;
  private $product_date_created	;
  private $product_user_id	;
  private $product_keyword;
  private $showEmail, $showPhone;
  private $category;

  public function __construct()
  {

  }

  public function get_product_show_email() {
      return filter_var($this->showEmail, FILTER_SANITIZE_NUMBER_INT);
  }

  public function get_product_show_phone() {
      return filter_var($this->showPhone, FILTER_SANITIZE_NUMBER_INT);
  }

  public function set_product_show_email($product_show_email) {
    $this->showEmail = $product_show_email;
  }

  public function set_product_show_phone($product_show_phone) {
    $this->showPhone = $product_show_phone;
  }

  public function set_product_category_id($product_category_i) {
    $this->category = $product_category_i;
  }

  public function get_product_address () {
    return $this->product_address;
  }
  public function get_product_category_id () {
    return $this->category;
  }
  public function get_product_desc() {
    return $this->product_desc;
  }
  public function get_product_title () {
    return $this->product_title;
  }
  public function get_product_status_id() {
    return $this->product_status_id;
  }
  public function get_product_avail_status_id () {
    return $this->product_avail_status_id;
  }
  public function get_product_review_count () {
    return $this->product_review_count;
  }
  public function get_product_condition() {
    return $this->product_condition;
  }
  public function get_product_price () {
    return $this->product_price;
  }
  public function get_product_school_id() {
    return $this->product_school_id;
  }
  public function get_product_date_created () {
    return $this->product_date_created;
  }

  public function get_product_user_id () {
    return $this->product_user_id;
  }
  public function get_product_keyword() {
    return $this->product_keyword;
  }

  public function get_product_featured_image_id() {
    return $this->product_featured_image_id;
  }
  public function set_product_address ($product_address) {
    $this->product_address = $product_address;
  }
  public function set_product_desc($product_desc) {
    $this->product_desc = $product_desc;
  }
  public function set_product_title ($product_title) {
    $this->product_title = $product_title;
  }
  public function set_product_status_id(  $product_status_id  ) {
    $this->product_status_id = $product_status_id;
  }
  public function set_product_avail_status_id ($product_avail_status_id) {
    $this->product_avail_status_id = $product_avail_status_id;
  }
  public function set_product_review_count () {

  }
  public function set_product_condition($product_condition) {
    $this->product_condition = $product_condition;
  }
  public function set_product_price ($product_price) {
    $this->product_price   = $product_price;
  }
  public function set_product_school_id($product_school_id) {
  $this->product_school_id = $product_school_id;
  }
  public function set_product_date_created ($product_date_created) {
    $this->product_date_created = $product_date_created;
  }

  public function set_product_user_id ($product_user_id) {
    $this->product_user_id  = $product_user_id;
  }
  public function set_product_keyword($product_keyword) {
    $this->product_keyword = $product_keyword;
  }

  public function set_product_featured_image_id($product_featured_image_id) {
    $this->product_featured_image_id = $product_featured_image_id;
  }

}
