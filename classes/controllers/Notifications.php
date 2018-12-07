<?php

class Notifications extends Logger
{
    private static $instance;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function Notify(Nofication $notify)
    {
        try {
            // Stores the notification into database by calling... add_notification();
            $id = self::add_notification($notify);

            // Call the get_Notifications_by_user_id() to notify that particular user
            $user_id = $notify->get_notification_user_id();
            self::get_notifications_by_user_id($user_id);

            //Display the Notification and increment the number
            self::get_notifications_by_id($id);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            parent::logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());

        }
    }

    public function add_notification($notification)
    {
        try {
            $notification_title = $notification->get_notification_title();
            $notification_content = $notification->get_notification_content();
            $notification_user_id = $notification->get_notification_user_id();
            $notification_receiver_id = $notification->get_notification_receiver_id();

            $query = "INSERT INTO notifications(notification_title,notification_content,notification_receiver_id,notification_user_id)"
                . "VALUES(:notification_title,:notification_content, :notification_receiver_id, :notification_user_id)";
            $this->query($query);

            $this->bind(":notification_title", $notification_title);
            $this->bind(":notification_content", $notification_content);
            //$this->bind(":notification_url", $notification_url);
            $this->bind(":notification_receiver_id", $notification_receiver_id);
            $this->bind(":notification_user_id", $notification_user_id);
            $this->executer();
            return $this->lastIdInsert();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return 0;
        }
    }

    public function get_notifications_by_user_id($user_id, $length)
    {
        try {
            $query = "SELECT * FROM notifications WHERE notification_receiver_id = :user_id ORDER BY notification_date_created DESC LIMIT $length";
            $this->query($query);
            $this->bind(":user_id", $user_id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public static function display_notifications()
    {
        $stmt = self::get_notifications_by_user_id();
    }

    public function get_notifications($length)
    {
        try {
            $query = "SELECT * FROM notifications WHERE notification_status_id = 5 LIMIT $length";
            $this->query($query);
            $stmt = $this->resultset();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }

    }

    public function get_notification_by_id($id)
    {
        try {
            $query = "SELECT * FROM notifications WHERE notification_status_id = 5 AND notification_id = $id";
            $this->query($query);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }


}
