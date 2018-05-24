<?php

class Comments extends Logger
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

    public function get_user_username_by_id($id)
    {
        try {
            $query = "SELECT user_user_name FROM users WHERE user_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $user_user_name;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());;
        }
    }

    public function get_comments_by_id($context, $id)
    {
        try {
            $query = "SELECT * FROM comments WHERE comment_context = :context AND comment_context_id = :id";
            $this->query($query);
            $this->bind(':context', $context);
            $this->bind(':id', $id);
            $stmt = $this->executer();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());;
        }
    }

    private function __clone()
    {
    }

}

?>
