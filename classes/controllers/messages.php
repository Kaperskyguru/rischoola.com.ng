<?php

class Messages extends dbmodel
{

    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
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
        $query = "SELECT * FROM messages WHERE 1";
        $this->query($query);
        return $this->executer();
    }

    public function get_total_number_of_messages_by_user_id($id)
    {
        $sql = "SELECT message_id FROM messages WHERE message_receiver_id = :id AND message_status_id != 9";
        $this->query($sql);
        $this->bind(':id', $id);
        $row = $this->executer();
        return $row->rowCount();
    }

    public function get_messages_by_id($type, $id)
    {
        $query = "SELECT * FROM messages WHERE message_type = :type AND message_id = :id";
        $this->query($query);
        $this->bind(':type', $type);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_messages_by_receiver_id($id)
    {
        $query = "SELECT * FROM messages WHERE message_receiver_id = :id AND message_status_id != 9 AND message_status_id != 6";
        $this->query($query);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_draft_messages_by_sender_id($id)
    {
        $query = "SELECT * FROM messages WHERE message_sender_id = :id AND message_status_id = 9";
        $this->query($query);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function send_message(MessageModel $model)
    {
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
        return 0;
    }

    public function save_draft(MessageModel $model)
    {
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
        return 0;
    }

    public function trash_message($message_id)
    {
        $query = "UPDATE messages SET message_status_id = 6 WHERE message_id = :message_id";
        $this->query($query);
        $this->bind(':message_id', $message_id);
        $this->executer();
        if ($this->lastIdinsert()) {
            return TRUE;
        }
        return FALSE;
    }


    public function get_message_notifications($id)
    {
        $query = "SELECT message_sender_id, message_body, message_date_created FROM messages WHERE message_receiver_id = :id AND message_status_id = 13";
        $this->query($query);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_messages_by_sender_id($id)
    {
        $query = "SELECT * FROM messages WHERE message_sender_id = :id AND message_status_id != 9 AND message_status_id != 6";
        $this->query($query);
        $this->bind(':id', $id);
        $stmt = $this->executer();
        return $stmt;
    }

    public function get_message_body_by_message_id($message_id)
    {
        $query = "SELECT message_body FROM messages WHERE message_id = $message_id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $message_body;
    }

    public function get_message_subject_by_message_id($message_id)
    {
        $query = "SELECT message_subject FROM messages WHERE message_id = $message_id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $message_subject;
    }

}
