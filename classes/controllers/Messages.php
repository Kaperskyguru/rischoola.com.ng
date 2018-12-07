<?php

class Messages extends Logger
{

    private static $instance;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_messages()
    {
        try {
            $query = "SELECT * FROM messages WHERE 1";
            $this->query($query);
            return $this->executer();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function updateMessage(int $int, array $data)
    {
        $paramsArray = [];
        foreach($data as $key => $value) {
            array_push($paramsArray, $key." = :".$key);
        }
        $params = implode(', ', $paramsArray);
        $this->query("UPDATE messages SET {$params} WHERE message_id = :id");
        foreach($data as $column => $value) {
            $this->bind(":".$column, $value);
        }
        $this->bind(":id", $int);
        if(!$this->executer()) {
            return false;
        }
        return true;
    }

    public function get_total_number_of_messages_by_user_id($id)
    {
        try {
            $sql = "SELECT message_id FROM messages WHERE message_receiver_id = :id AND message_status_id != 9";
            $this->query($sql);
            $this->bind(':id', $id);
            $row = $this->executer();
            return $row->rowCount();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_messages_by_id($id)
    {
        try {
            $query = "SELECT * FROM messages WHERE message_id = :id";
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->resultset();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_messages_by_receiver_id($id)
    {
        try {
            $query = "SELECT * FROM messages WHERE message_receiver_id = :id AND message_status_id != 9 AND message_status_id != 6 ORDER BY message_status_id DESC";
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_draft_messages_by_sender_id($id)
    {
        try {
            $query = "SELECT * FROM messages WHERE message_sender_id = :id AND message_status_id = 9";
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function send_message(MessageModel $model)
    {
        try {
            $subject = $model->get_message_subject();
            $body = $model->get_message_body();
            $sender_id = $model->get_message_sender_id();
            $receiver_id = $model->get_message_receiver_id();
            $type = $model->get_message_type();

            $query = "INSERT INTO messages(message_sender_id, message_receiver_id, message_body, message_status_id, message_subject, message_type)
      VALUES (:message_sender_id, :message_receiver_id, :message_body, :message_status_id, :message_subject, :message_type)";
            $this->query($query);
            $this->bind(':message_sender_id', $sender_id);
            $this->bind(':message_receiver_id', $receiver_id);
            $this->bind(':message_body', $body);
            $this->bind(':message_status_id', 4);
            $this->bind(':message_subject', $subject);
            $this->bind(':message_type', $type);
            $this->executer();
            if ($id = $this->lastIdinsert()) {
                return $id;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return 0;
        }
    }

    public function save_draft(MessageModel $model)
    {
        try {
            $subject = $model->get_message_subject();
            $body = $model->get_message_body();
            $sender_id = $model->get_message_sender_id();
            $receiver_id = $model->get_message_receiver_id();
            $type = $model->get_message_type();

            $query = "INSERT INTO messages(message_sender_id, message_receiver_id, message_body, message_status_id, message_subject, message_type)
      VALUES (:message_sender_id, :message_receiver_id, :message_body, :message_status_id, :message_subject, :message_type)";
            $this->query($query);
            $this->bind(':message_sender_id', $sender_id);
            $this->bind(':message_receiver_id', $receiver_id);
            $this->bind(':message_body', $body);
            $this->bind(':message_status_id', 9);
            $this->bind(':message_subject', $subject);
            $this->bind(':message_type', $type);
            $this->executer();
            if ($id = $this->lastIdinsert()) {
                return $id;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return 0;
        }
    }

    public function trash_message($message_id)
    {
        try {
            $query = "UPDATE messages SET message_status_id = 6 WHERE message_id = :message_id";
            $this->query($query);
            $this->bind(':message_id', $message_id);
            $this->executer();
            if ($this->lastIdinsert()) {
                return TRUE;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    public function get_message_notifications($id)
    {
        try {
            $query = "SELECT message_sender_id, message_body, message_date_created FROM messages WHERE message_receiver_id = :id AND message_status_id = 13";
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_messages_by_sender_id($id)
    {
        try {
            $query = "SELECT * FROM messages WHERE message_sender_id = :id AND message_status_id != 9 AND message_status_id != 6";
            $this->query($query);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_message_body_by_message_id($message_id)
    {
        try {
            $query = "SELECT message_body FROM messages WHERE message_id = $message_id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $message_body;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_message_subject_by_message_id($message_id)
    {
        try {
            $query = "SELECT message_subject FROM messages WHERE message_id = $message_id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $message_subject;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    private function __clone()
    {

    }

}
