<?php

class Users extends dbmodel {

  private const COOKIE_NAME = "auth_cookie";
  private const SESSION_TIME = 604800; // 7 days
  private $user_id;
  private $user_name;
  private $is_authenticated;
  private $expiry_date;
  private $session_id;
  private $session_start_time;

public function __construct()
{
  $this->user_id = NULL;
  $this->user_name = NULL;
  $this->is_authenticated = FALSE;
  $this->expiry_date = NULL;
  $this->session_id = NULL;
  $this->session_start_time = NULL;
}

  public function get_user_username_by_id($id) {
      $query = "SELECT user_user_name FROM users WHERE user_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $user_user_name;
  }

  public function get_user_display_name_by_id($id) {
      $query = "SELECT user_name FROM users WHERE user_id = $id";
      $this->query($query);
      $row = $this->resultset();
      extract($row);
      return $user_name;
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
        //echo $password." string";
        $p = $res["user_password"];
        var_dump(password_verify($password, $res["user_password"]));
        echo $p. " hahahah";
        
      if(password_verify($password, $res["user_password"])){
        $_SESSION['user_id'] = $res['user_id'];
         $this->user_id = $res["user_id"];
         $this->user_name = $res['user_name'];
         $this->is_authenticated = TRUE;
         $this->expiry_date = $res['expiry_date'];
         $this->session_start_time = time();

        $this->create_session();
      }else {
        echo "password don not match";
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

  public function is_user_logged_in(){
      if($this->is_authenticated){
        return TRUE;
      }
      return FALSE;
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
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
      return FALSE;
    }
    return TRUE;
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

  public function add_user(UserModel $userModel)
  {
    try {
      $pass = $userModel->get_user_password();
      $name = $userModel->get_user_name();
      $user_name = $userModel->get_user_user_name();
      $phone_number = $userModel->get_user_phone_number();
      $email = $userModel->get_user_email();
      $school_id = $userModel->get_user_school_id();

      $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
     var_dump($hash_pass);
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

    } catch (Exception $e) {
      echo $e->getMessage();
      return FALSE;
    }
    return TRUE;
  }

  public function delete_user($user_id)
  {
    try
	   {
		  /* First, we close any open session the user may have */
		  $sql = 'DELETE FROM sessions WHERE (session_user_id = ?)';
		  $st = $query($sql);
		  $st->execute(array($user_id));

		  /* Now we delete the user record */
		  $sql = 'DELETE FROM users WHERE (user_id = ?)';
		  $st = $query($sql);
		  $st->execute(array($user_id));
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

  	public static function edit_user($user_id, &$db, $username = NULL, $password = NULL, $enabled = NULL, $expiry = NULL)
  	{
  	   /* Array of values for the PDO statement */
  	   $sql_vars = array();

  	   /* Edit query */
  	   $sql = 'UPDATE users SET ';

  	   /* Now we check which fields need to be updated */
  	   if (!is_null($username))
  	   {
  		  $sql .= 'user_name = ?, ';
  		  $sql_vars[] = $username;
  	   }

  	   if (!is_null($password))
  	   {
  		  $sql .= 'user_password = ?, ';
  		  $sql_vars[] = password_hash($password, PASSWORD_DEFAULT);
  	   }

  	   if (!is_null($enabled))
  	   {
  		  $sql .= 'user_enabled = ?, ';
  		  $sql_vars[] = strval(intval($enabled, 10));
  	   }

  	   if (!is_null($expiry))
  	   {
  		  $sql .= 'user_expiry = ?, ';
  		  $sql_vars[] = $expiry;
  	   }

  	   if (count($sql_vars) == 0)
  	   {
  		  /* Nothing to change */
  		  return TRUE;
  	   }

  	   $sql = mb_substr($sql, 0, -2) . ' WHERE (user_id = ?)';
  	   $sql_vars[] = $user_id;

  	   try
  	   {
  		  /* Execute query */
  		  $st = $query($sql);
  		  $st->execute($sql_vars);
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



  }
