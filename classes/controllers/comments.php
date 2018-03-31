<?php
  class Comments extends dbmodel
  {

    function __construct()
    {

    }

    public function get_user_username_by_id($id) {
        $query = "SELECT user_user_name FROM users WHERE user_id = $id";
        $this->query($query);
        $row = $this->resultset();
        extract($row);
        return $user_user_name;
    }

    public function get_comments_by_id($context, $id)
    {
      $query = "SELECT * FROM comments WHERE comment_context = :context AND comment_context_id = :id";
      $this->query($query);
      $this->bind(':context', $context);
      $this->bind(':id', $id);
      $stmt = $this->executer();
      return $stmt;
    }

  }

 ?>
