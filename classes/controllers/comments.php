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
  }

 ?>
