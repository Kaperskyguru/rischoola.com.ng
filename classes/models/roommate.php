<?php
class RoommateModel {
  private $roommate_name	;
  private $roommate_address	;
  private $roommate_desc	;
  private $roommate_status_id;
  private $roommate_phone_number	;
  private $roommate_price;
  private $type_of_roommate	;
  private $roommate_hostel_desc	;
  private $roommate_school_id;
  private $roommate_hostel_type_id;
  private $roommate_hostel_name	;
  private $roommate_user_id	;
  private $roommate_expectations;

  public function __construct()
  {

  }

  public function get_roommate_address () {
    return $this->roommate_address;
  }
  public function get_roommate_desc() {
    return $this->roommate_desc;
  }
  public function get_roommate_name () {
    return $this->roommate_name;
  }
  public function get_roommate_status_id() {
    return $this->roommate_status_id;
  }
  public function get_roommate_phone_number () {
    return $this->roommate_phone_number;
  }
  public function get_roommate_price () {
    return $this->roommate_price;
  }
  public function get_type_of_roommate() {
    return $this->type_of_roommate;
  }
  public function get_roommate_hostel_desc () {
    return $this->roommate_hostel_desc;
  }
  public function get_roommate_school_id() {
    return $this->roommate_school_id;
  }
  public function get_roommate_hostel_name () {
    return $this->roommate_hostel_name;
  }

  public function get_roommate_user_id () {
    return $this->roommate_user_id;
  }
  public function get_roommate_expectations() {
    return $this->roommate_expectations;
  }

  public function get_roommate_hostel_type_id() {
    return $this->roommate_hostel_type_id;
  }
  public function set_roommate_address ($roommate_address) {
    $this->roommate_address = $roommate_address;
  }
  public function set_roommate_desc($roommate_desc) {
    $this->roommate_desc = $roommate_desc;
  }
  public function set_roommate_name ($roommate_name) {
    $this->roommate_name = $roommate_name;
  }
  public function set_roommate_status_id(  $roommate_status_id  ) {
    $this->roommate_status_id = $roommate_status_id;
  }
  public function set_roommate_phone_number ($roommate_phone_number) {
    $this->roommate_phone_number = $roommate_phone_number;
  }
  public function set_roommate_price ($roommate_price) {
    $this->roommate_price = $roommate_price;
  }
  public function set_type_of_roommate($type_of_roommate) {
    $this->type_of_roommate = $type_of_roommate;
  }
  public function set_roommate_hostel_desc ($roommate_hostel_desc) {
    $this->roommate_hostel_desc   = $roommate_hostel_desc;
  }
  public function set_roommate_school_id($roommate_school_id) {
  $this->roommate_school_id = $roommate_school_id;
  }
  public function set_roommate_hostel_name ($roommate_hostel_name) {
    $this->roommate_hostel_name = $roommate_hostel_name;
  }

  public function set_roommate_user_id ($roommate_user_id) {
    $this->roommate_user_id  = $roommate_user_id;
  }
  public function set_roommate_expectations($roommate_expectations) {
    $this->roommate_expectations = $roommate_expectations;
  }

  public function set_roommate_hostel_type_id($roommate_hostel_type_id) {
    $this->roommate_hostel_type_id = $roommate_hostel_type_id;
  }

}
