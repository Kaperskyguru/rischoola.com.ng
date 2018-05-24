<?php

/**
 *
 */
class Replies extends Logger
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

    public function get_replies_by_comment_id($comment_id)
    {
        try {
            $query = "SELECT * FROM replies WHERE reply_type_id = :comment_id AND reply_type = :type";
            $this->query($query);
            $this->bind('comment_id', $comment_id);
            $this->bind(':type', 'comments');
            return $this->executer();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public function get_replies_by_discussion_id($discussion_id)
    {
        try {
            $query = "SELECT * FROM replies WHERE reply_type_id = :type_id AND reply_type = :type";
            $this->query($query);
            $this->bind('type_id', $discussion_id);
            $this->bind(':type', 'group_discussions');
            return $this->executer();
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
