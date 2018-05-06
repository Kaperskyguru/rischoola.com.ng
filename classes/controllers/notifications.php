<?php
class Notifications extends dbmodel{
    private static $instance;

    public function __construct(){

    }

    public function getInstance()
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function add_notification(Nofication $notification)
    {
        try{
            $notification_title = $notification->get_notification_title();
            $notification_content = $notification->get_notification_content();
            $notification_url = $notification->get_notification_url();
            $notification_school_id = $notification->get_notification_school_id();
            $notification_user_id = $notification->get_notification_user_id();
    
            $query = "INSERT INTO notifications(notification_title,notification_content,notification_url,notification_user_id)"
                    . "VALUES(:notification_title,:notification_desc,:notification_url,:notification_user_id)";
            $this->query($query);

            $this->bind(":notification_title", $notification_title);
            $this->bind(":notification_content", $notification_content);
            $this->bind(":notification_url", $notification_url);
            //   $this->bind(":notification_status_id", $notification_status_id);
            //   $this->bind(":notification_school_id", $notification_school_id);
            $this->bind(":notification_user_id", $notification_user_id);
            $this->executer();
            return $this->lastIdInsert();
        }catch(PDOException $e){
            echo $e.getMessage();
            return 0;
        }
    }

    public function get_notifications(Notification $notification)
    {
      $query = "SELECT * FROM notifications WHERE notification_status_id = 5 LIMIT $length";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
  
    }

    public function get_notifications_by_user_id($user_id)
    {
        $query = "SELECT * FROM notifications WHERE notification_receiver_id = $user_id ORDER BY notification_status_id LIMIT 10";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_notification_by_id($id)
    {
        $query = "SELECT * FROM notifications WHERE notification_status_id = 5 AND notification_id = $id";
        $this->query($query);
        $stmt = $this->executer();
        return $stmt;
    }

    public static function Notify(Nofication $notify)
    {
       // Stores the notification into database by calling... add_notification();
       $id = self::add_notification($notify); 

       // Call the get_Notifications_by_user_id() to notify that particular user
       $user_id = $notify->get_notification_user_id();
       self::get_notifications_by_user_id($user_id);

       //Display the Notification and increment the number
       self::get_notifications_by_id($id);
    }

    public static function display_notifications()
    {
        $stmt = self::get_notifications_by_user_id();
    }


}
