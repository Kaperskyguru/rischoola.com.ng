<?php

class Users extends dbmodel {
  private static $instance;
  private const COOKIE_NAME = "auth_cookie";
  private const SESSION_TIME = 604800; // 7 days
  private $user_id;
  private $user_name;
  private $is_authenticated;
  private $expiry_date;
  private $session_id;
  private $session_start_time;

private function __construct()
{
  $this->user_id = NULL;
  $this->user_name = NULL;
  $this->is_authenticated = FALSE;
  $this->expiry_date = NULL;
  $this->session_id = NULL;
  $this->session_start_time = NULL;
}

    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }

  public function get_user_username_by_id($id) {
    try{
      $query = "SELECT user_user_name FROM users WHERE user_id = $id";
      $this->query($query);
      $row = $this->resultset();
      if (!is_null($row['user_user_name'])) {
        extract($row);
        return $user_user_name;
      }
    }catch(PDOException $e){
      return 0;
    }
    return 0;
  }

  public function get_user_id_by_username($username) {
    try{
      $query = "SELECT user_id FROM users WHERE user_user_name = :username";
      $this->query($query);
      $this->bind(':username', $username);
      $row = $this->resultset();
      if (!is_null($row['user_id'])) {
        extract($row);
        return $user_id;
      }
    }catch(PDOException $e){
      return 0;
    }
    return 0;
  }

  public function get_user_phone_number_by_id($id)
  {
    try{
      $query = "SELECT user_phone_number FROM users WHERE user_id = :id";
      $this->query($query);
      $this->bind(':id', $id);
      $row = $this->resultset();
      if (!is_null($row['user_phone_number'])) {
        extract($row);
        return $user_phone_number;
      }
    }catch(PDOException $e){
      return 0;
    }
  return 0;
  }

  public function is_user_user_name_exist($user_user_name){
    try{
      $query = "SELECT 1 FROM users WHERE user_user_name = :user_user_name";
      $this->query($query);
      $this->bind(':user_user_name', $user_user_name);
      $stmt = $this->executer();
      $num = $stmt->rowCount();
      if ($num > 0) {
        return TRUE;
      }
    }catch(PDOException $e){
      return TRUE;
    }
  return FALSE;
  }

  public function insert_user_profile_id($image_id, $user_id)
  {
  $sql = "UPDATE users SET user_profile_id = :user_profile_id WHERE user_id = :user_id";
    $this->query($sql);
    $this->bind(':user_profile_id', $image_id);
    $this->bind(':user_id', $user_id);
    if($this->executer()){
      return TRUE;
    }
    return FALSE;
  }

  public function is_user_email_exist($user_email){
    try{
      $query = "SELECT 1 FROM users WHERE user_email = :user_email";
      $this->query($query);
      $this->bind(':user_email', $user_email);
      $stmt = $this->executer();
      if ($stmt->rowCount() > 0) {
        return TRUE;
      }
    }catch(PDOException $e){
      echo $e->getMessage();
      //return FALSE;
    }
  return FALSE;
  }

  public function get_user_detail_by_column_name($name, $id)
  {
    //echo $name;
    $query = "SELECT `$name` FROM users WHERE user_id = :id";
    $this->query($query);
    $this->bind(':id', $id);
    $row = $this->resultset();
    return $row["$name"];
  }

  public function get_user_display_name_by_id($id , $full = false) {
      $query = "SELECT user_name FROM users WHERE user_id = :id";
      $this->query($query);
      $this->bind(':id', $id);
      $row = $this->resultset();
      extract($row);
      if($full){
        return $user_name;
      }else{
        $first_name = explode(" ", $user_name);
        return $first_name[0];
      }
  }

  public function verify_password($password, $id)
  {
    $trim_password = trim($password);
    $query = "SELECT user_password FROM users WHERE user_id = :id";
    $stmt = $this->query($query);
    $this->bind(":id", $id);
    $res = $this->resultset();
    return password_verify($trim_password, $res["user_password"]);
  }

  public function login(UserModel $userModel)
  {
    try{
      $name = $userModel->get_user_user_name();
      $password = trim($userModel->get_user_password());

      $query = "SELECT * FROM users WHERE (user_user_name = :user_user_name) AND (user_status_id = 5) AND ((date_expiry > NOW()) OR (date_expiry < :date_expiry))";
      $stmt = $this->query($query);
      $this->bind(":user_user_name", $name);
      $this->bind(":date_expiry", '2000-01-01');
      $stmt = $this->executer();

      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      if(password_verify($password, $res["user_password"])){
        $_SESSION['user_id'] = $res['user_id'];
         $this->user_id = $res["user_id"];
         $this->user_name = $res['user_name'];
         $this->is_authenticated = TRUE;
         $this->expiry_date = $res['expiry_date'];
         $this->session_start_time = time();

        $this->create_session();
      }else {
        echo "password do not match";
      }
    }catch(PDOException $e){
      echo $e->getMessage();
      return FALSE;
    }
    return TRUE;
  }

  public function is_authenticated()
  {
    return $this->is_authenticated;
  }

  public function display_log_in_box(){

      echo '

            Please Log in

      ';
    }


  public function create_session()
  {
    try {
      $cookie = bin2hex(random_bytes(16));
      $query = "INSERT INTO sessions (session_cookie, session_user_id, session_start) VALUES (:session_cookie, :session_user_id, NOW())";
      $stmt = $this->query($query);
      $this->bind(":session_cookie", md5($cookie));
      $this->bind(':session_user_id', $this->user_id);
      $stmt= $this->executer();
      $this->session_id = $this->lastIdinsert();
    } catch (PDOException $e) {
      echo $e->getMessage();
      return FALSE;
    }
    setcookie(self::COOKIE_NAME, $cookie, time() + self::SESSION_TIME, "/");
    $_COOKIE[self::COOKIE_NAME] = $cookie;
    return TRUE;
  }

  public function cookie_login()
  {
    try {
      if (array_key_exists(self::COOKIE_NAME, $_COOKIE)) {
        $auth_sql = "SELECT *, UNIX_TIMESTAMP(session_start) AS session_start_ts FROM sessions, users
        WHERE (session_cookie = :session_cookie) AND (session_user_id = user_id) AND (user_status_id = 5)
        AND ((date_expiry > NOW()) OR (date_expiry < :date_expiry))";

        $cookie_md5 = md5($_COOKIE[self::COOKIE_NAME]);
         $this->query($auth_sql);
        $this->bind(':session_cookie', $cookie_md5);
        $this->bind(':date_expiry', "2000-01-01");
        $stmt = $this->executer();

        if ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $_SESSION['user_id'] = $res['user_id'];
          $this->user_id = $res['user_id'];
          $this->user_name = $res['user_name'];
          $this->is_authenticated = TRUE;
          $this->expiry_date = $res['date_expiry'];
          $this->session_id = $res['session_id'];
          $this->session_start_time = intval($res['session_start_ts'], 10);

          //echo $this->user_id;
        }else{
          $this->delete_expired_session($this->user_id);
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
      return FALSE;
    }
    return TRUE;
  }

  public function delete_expired_session($user_id)
  {
    try{
    $sql = 'DELETE FROM sessions WHERE session_user_id = :session_user_id';
        $this->query($sql);
        $this->bind(":session_user_id", $user_id);
        $this->executer();
    }catch(Exception $e){
      echo $e->getMessage();
    }
  }

  public function logout($user_id, $close_all_sessions = FALSE)
  {
    try {
      $cookie_md5 = md5($_COOKIE[self::COOKIE_NAME]);
      $sql = "DELETE FROM sessions WHERE (session_cookie = :session_cookie) AND (session_user_id = :session_user_id)";
      $this->query($sql);
      $this->bind(":session_cookie", $cookie_md5);
      $this->bind(":session_user_id", $user_id);
      $stmt = $this->executer();

      if($close_all_sessions){
        $sql = 'DELETE FROM sessions WHERE session_user_id = :session_user_id';
        $this->query($sql);
        $this->bind(":session_user_id", $user_id);
        $this->executer();
      }
    } catch (Exception $e) {
      echo $e->getMessage();
      return FALSE;
    }
     setcookie(self::COOKIE_NAME, '', 0, '/');
	   $_COOKIE[self::COOKIE_NAME] = NULL;
	   /* Clear user-related properties */
	   $this->user_id = NULL;
	   $this->user_name = NULL;
	   $this->is_authenticated = FALSE;
	   $this->expiry_date = NULL;
	   $this->session_id = NULL;
	   $this->session_start_time = NULL;

     return TRUE;
  }

  public function add_temporary_user(UserModel $userModel, $unique_id)
  {
    try {
      $pass = $userModel->get_user_password();
      $name = $userModel->get_user_name();
      $user_name = $userModel->get_user_user_name();
      $phone_number = $userModel->get_user_phone_number();
      $email = $userModel->get_user_email();
      $school_id = $userModel->get_user_school_id();

      //$hash_pass = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO guest (guest_name, guest_username, guest_password, guest_mobile_phone, guest_email, guest_school_id, guest_uid) VALUES
      (:guest_name, :guest_username, :guest_password, :guest_mobile_phone, :guest_email, :guest_school_id, :guest_uid)";
      $stmt = $this->query($sql);
      $this->bind(":guest_name", $name);
      $this->bind(":guest_username", $user_name);
      $this->bind(":guest_password", $pass);
      $this->bind(":guest_mobile_phone", $phone_number);
      $this->bind(":guest_email", $email);
      $this->bind(":guest_school_id", $school_id);
      $this->bind(":guest_uid", $unique_id);
      $stmt = $this->executer();
      return $this->lastIdinsert();
    } catch (Exception $e) {
      echo $e->getMessage();
      return 0;
    }
  }

  public function add_user(UserModel $userModel)
  {
    try {
      // Retrieving all user details to stored
      $pass = $userModel->get_user_password();
      $name = $userModel->get_user_name();
      $user_name = $userModel->get_user_user_name();
      $phone_number = $userModel->get_user_phone_number();
      $email = $userModel->get_user_email();
      $school_id = $userModel->get_user_school_id();

      $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (user_name, user_user_name, user_password, user_phone_number, user_email, user_school_id) VALUES
      (:user_name, :user_user_name, :user_password, :user_phone_number, :user_email, :user_school_id)";
      $stmt = $this->query($sql);
      $this->bind(":user_name", $name);
      $this->bind(":user_user_name", $user_name);
      $this->bind(":user_password", $hash_pass);
      $this->bind(":user_phone_number", $phone_number);
      $this->bind(":user_email", $email);
      $this->bind(":user_school_id", $school_id);
      $stmt = $this->executer();

      // Notify admin
      $Notify->set_notification_user_id($this->lastInInsert());
      $Notify->set_notification_content("A new User Just Registered");
      Notification::Notify($Notify);
    } catch (Exception $e) {
      echo $e->getMessage();
      return FALSE;
    }
    return TRUE;
  }


  public function update_user_password(UserModel $model)
  {
    $user_id = $model->get_user_id();
    $user_password = $model->get_user_password();
    if (!is_null($user_password) || !empty($user_password))
    {
      try{
        $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET user_password = :user_password WHERE user_id = :id';
        $this->query($sql);
        $this->bind(':user_password', $user_password_hash);
        $this->bind(':id', $user_id);
        $this->executer();
      }catch(PDOException $e){
        return FALSE;
      }
      return TRUE;
    }
  }

  public function delete_user($user_id)
  {
    try
	   {
		  /* First, we close any open session the user may have */
		  $sql = "DELETE FROM sessions WHERE (session_user_id = :user_id)";
      $this->query($sql);
      $this->bind(':user_id', $user_id);
		  $this->executer();

		  /* Now we delete the user record */
		  $sql = "DELETE FROM users WHERE (user_id = :user_id)";
      $this->query($sql);
      $this->bind(':user_id',$user_id);
		  $this->executer();
	   }
	   catch (PDOException $e)
	   {
		  /* Exception (SQL error) */
		  echo $e->getMessage();
		  return FALSE;
	   }

	   /* If no exception occurs, return true */
	   return TRUE;
  }

  public function delete_temporary_user($guest_id)
  {
    try
	   {
		  /* Now we delete the temporary user record */
		  $sql = 'DELETE FROM guest WHERE (guest_id = :guest_id)';
      $this->query($sql);
      $this->bind(':guest_id',$guest_id);
		  $this->executer();
	   }
	   catch (PDOException $e)
	   {
		  /* Exception (SQL error) */
		  echo $e->getMessage();
		  return FALSE;
	   }

	   /* If no exception occurs, return true */
	   return TRUE;
  }

  public function is_temporary_user_exist($guest_id, $unique_id){
    $query = "SELECT 1 FROM guest WHERE (guest_id = :guest_id) AND (guest_uid = :guest_uid)"; // AND ((date_expiry > NOW()) OR (date_expiry < :date_expiry))";
    $this->query($query);
    $this->bind(':guest_id', $guest_id);
    $this->bind(':guest_uid', $unique_id);
    $row = $this->resultset();
    if($row){
      return TRUE;
    }else {
      return FALSE;
    }
  }


  public function move_guest_to_member($userModel, $guest_id, $unique_id)
  {
    $query = "SELECT * FROM guest WHERE (guest_id = :guest_id) AND (guest_uid = :guest_uid)";// AND ((date_expiry > NOW()) OR (date_expiry < :date_expiry))";
    $this->query($query);
    $this->bind(':guest_id', $guest_id);
    $this->bind(':guest_uid', $unique_id);
    $row = $this->resultset();
    extract($row);

    $userModel->set_user_password($guest_password);
    $userModel->set_user_name($guest_name);
    $userModel->set_user_user_name($guest_username);
    $userModel->set_user_phone_number($guest_mobile_phone);
    $userModel->set_user_email($guest_email);
    $userModel->set_user_school_id($guest_school_id);

    if($this->delete_temporary_user($guest_id)){
      return $this->add_user($userModel);
    }
  }

  	public function update_user(UserModel $model)
  	{
      $user_id = $model->get_user_id();
      $username = $model->get_user_user_name();
      $user_name = $model->get_user_name();
      $user_email = $model->get_user_email();
      $user_phone_number = $model->get_user_phone_number();
      $user_address = $model->get_user_address();
      $user_about = $model->get_user_about();
      $user_birthday = $model->get_user_birthday();
      $user_course_of_study = $model->get_user_course_of_study();
      $user_level = $model->get_user_level();
      $user_gender = $model->get_user_gender();
      $user_school_id = $model->get_user_school_id();
      $user_display_name = $model->get_user_display_name();
  	   /* Array of values for the PDO statement */
  	   $sql_vars = array();

  	   /* Edit query */
  	   $sql = 'UPDATE users SET ';

  	   /* Now we check which fields need to be updated */
  	   if (!is_null($username) || !empty($username))
  	   {
  		  $sql .= 'user_name = :user_name, ';
  		  $sql_vars[] = $username;
  	   }

       if (!is_null($user_display_name) || !empty($user_display_name))
       {
        $sql .= 'user_display_name = :user_display_name, ';
        $sql_vars[] = $user_display_name;
       }

       if (!is_null($user_school_id) || !empty($user_school_id))
       {
        $sql .= 'user_school_id = :user_school_id, ';
        $sql_vars[] = $user_school_id;
       }

       if (!is_null($user_gender) || !empty($user_gender))
      {
       $sql .= 'user_gender = :user_gender, ';
       $sql_vars[] = $user_gender;
      }

       if (!is_null($user_level) || !empty($user_level))
       {
        $sql .= 'user_level = :user_level, ';
        $sql_vars[] = $user_level;
       }

       if (!is_null($user_course_of_study) || !empty($user_course_of_study))
       {
        $sql .= 'user_course_of_study = :user_course_of_study, ';
        $sql_vars[] = $user_course_of_study;
       }

       if (!is_null($user_birthday) || !empty($user_birthday))
       {
        $sql .= 'user_birthday = :user_birthday, ';
        $sql_vars[] = $user_birthday;
       }

       if (!is_null(trim($user_name)) || !empty(trim($user_name)))
       {
        $sql .= 'user_name = :user_name, ';
        $sql_vars[] = $user_name;
       }

       if (!is_null($user_about) || !empty($user_about))
       {
        $sql .= 'user_about = :user_about, ';
        $sql_vars[] = $user_about;
       }

       if (!is_null($user_address) || !empty($user_address))
       {
        $sql .= 'user_address = :user_address, ';
        $sql_vars[] = $user_address;
       }

  	   if (!is_null($user_email) || !empty($user_email))
  	   {
  		  $sql .= 'user_email = :user_email, ';
  		  $sql_vars[] = strval(intval($user_email, 10));
  	   }

  	   if (!is_null($user_phone_number) || !empty($user_phone_number))
  	   {
  		  $sql .= 'user_phone_number = :user_phone_number, ';
  		  $sql_vars[] = $user_phone_number;
  	   }

  	   if (count($sql_vars) == 0)
  	   {
  		  /* Nothing to change */
  		  return TRUE;
  	   }

  	   $sql = mb_substr($sql, 0, -2) . ' WHERE (user_id = :user_id)';
  	   $sql_vars[] = $user_id;

  	   try
  	   {
  		  /* Execute query */
  		  $this->query($sql);
        $this->bind(':user_name', $username);
        $this->bind(':user_display_name', $user_display_name);
        $this->bind(':user_school_id', $user_school_id);
        $this->bind(':user_gender', $user_gender);
        $this->bind(':user_level', $user_level);
        $this->bind(':user_course_of_study', $user_course_of_study);
        $this->bind(':user_birthday', $user_birthday);
        $this->bind(':user_name', $user_name);
        $this->bind(':user_about', $user_about);
        $this->bind(':user_address', $user_address);
        $this->bind(':user_email', $user_email);
        $this->bind(':user_phone_number', $user_phone_number);
        $this->bind(':user_id', $user_id);
  		 $this->executer($sql_vars);
  	   }
  	   catch (PDOException $e)
  	   {
  		  /* Exception (SQL error) */
  		  echo $e->getMessage();
  		  return FALSE;
  	   }

  	   /* If no exception occurs, return true */
  	   return TRUE;
  	}

    public function update_user_bank_details($user_id, $bank_name, $account_name, $account_number)
    {
      try{
        $sql = 'UPDATE users SET user_bank_name = :bank_name, user_bank_account_name = :account_name, user_bank_account_number = :account_number WHERE user_id = :user_id';
        $this->query($sql);
        $this->bind(':bank_name', $bank_name);
        $this->bind(':account_name', $account_name);
        $this->bind(':account_number', $account_number);
        $this->bind(':user_id', $user_id);
        $this->executer();
      }catch(PDOException $e){
          return FALSE;
      }
      return TRUE;
    }

  }
