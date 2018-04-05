<?php
class UserModel{

private $user_id;
private $user_name;
private $user_user_name;
private $user_email;
private $user_phone_number;
private $user_school_id;
private $user_type;
private $user_address;
private $user_date_created;
private $user_about;
private $user_password;
private $user_status_id;
private $date_expiry;

private $user_birthday;
private $user_level;
private $user_gender;
private $user_course_of_study;
private $user_display_name;

public function __construct()
{

}

public function set_user_id($user_id)
{
  $this->user_id = $user_id;
}

public function get_user_id()
{
  return $this->user_id;
}

public function set_user_name($user_name)
{
  $this->user_name = $user_name;
}

public function set_user_user_name($user_user_name)
{
  $this->user_user_name = $user_user_name;
}

public function set_user_email($user_email)
{
  $this->user_email = $user_email;
}
public function set_user_phone_number($user_phone_number)
{
  $this->user_phone_number = $user_phone_number;
}
public function set_user_school_id($user_school_id)
{
  $this->user_school_id = $user_school_id;
}

public function set_user_type($user_type)
{
  $this->user_type = $user_type;
}
public function set_user_address($user_address)
{
  $this->user_address = $user_address;
}
public function set_user_date_created($user_date_created)
{
  $this->user_date_created = $user_date_created;
}

public function set_user_about($user_about)
{
  $this->user_about = $user_about;
}

public function set_user_password($user_password)
{
  $this->user_password = $user_password;
}

public function set_user_status_id($user_status_id)
{
  $this->user_status_id = $user_status_id;
}

public function set_user_date_expiry($user_date_expiry)
{
  $this->user_date_expiry = $user_date_expiry;
}

public function get_user_name()
{
  return $this->user_name;
}

public function get_user_user_name()
{
  return $this->user_user_name;
}

public function get_user_email()
{
  return $this->user_email;
}
public function get_user_phone_number()
{
  return $this->user_phone_number;
}
public function get_user_school_id()
{
  return $this->user_school_id;
}

public function get_user_type()
{
  return $this->user_type;
}
public function get_user_address()
{
  return $this->user_address;
}
public function get_user_date_created()
{
  return $this->user_date_created;
}

public function get_user_about()
{
  return $this->user_about;
}

public function get_user_password()
{
  return $this->user_password;
}

public function get_user_status_id()
{
  return $this->user_status_id;
}

public function get_user_date_expiry()
{
  return $this->user_date_expiry;
}

public function set_user_gender($user_gender)
{
   $this->user_gender = $user_gender;
}

public function set_user_level($user_level)
{
   $this->user_level = $user_level;
}

public function set_user_birthday($user_birthday)
{
   $this->user_birthday = $user_birthday;
}

public function set_user_course_of_study($user_course_of_study)
{
   $this->user_course_of_study = $user_course_of_study;
}

public function set_user_display_name($user_display_name){
   $this->user_display_name = $user_display_name;
}

public function get_user_gender()
{
  return $this->user_gender;
}

public function get_user_level()
{
  return $this->user_level;
}
public function get_user_display_name(){
  return $this->user_display_name;
}

public function get_user_birthday(){
  return $this->user_birthday;
}

public function get_user_course_of_study(){
  return $this->user_course_of_study;
}

}
