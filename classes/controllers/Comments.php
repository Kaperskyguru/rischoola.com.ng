<?php
declare(strict_types=1);
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

    
    public function store_comments(string $comment_body, int $user_id, string $comment_context, int $context_id):int
    {
        try{
            $query = "INSERT INTO comments(comment_body, comment_user_id, comment_context, comment_context_id)VALUES(:comment_body, :user_id, :context, :context_id)";
            $this->query($query);
            $this->bind(':comment_body', $comment_body);
            $this->bind(':user_id', $user_id);
            $this->bind(':context', $comment_context);
            $this->bind(':context_id', $context_id);
            $this->executer();
            return $this->lastIdinsert();
        }catch(Error $e){
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());  
            return 0;          
        }
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
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
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
