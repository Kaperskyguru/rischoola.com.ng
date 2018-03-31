<?php
/**
 *
 */
class Replies extends dbmodel
{

  function __construct()
  {

  }

  public function get_replies_by_comment_id($comment_id)
  {
    $query = "SELECT * FROM replies WHERE reply_type_id = :comment_id AND reply_type = :type";
    $this->query($query);
    $this->bind('comment_id', $comment_id);
    $this->bind(':type', 'comments');
    return $this->executer();
  }

  public function get_replies_by_discussion_id($discussion_id)
  {
    $query = "SELECT * FROM replies WHERE reply_type_id = :type_id AND reply_type = :type";
    $this->query($query);
    $this->bind('type_id', $discussion_id);
    $this->bind(':type', 'group_discussions');
    return $this->executer();
  }
}
