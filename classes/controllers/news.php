<?php

class News extends dbmodel {
private static $instance;
    private function __construct() {}
    private function __clone(){}

    public static function getInstance(){
      if(!self::$instance){
        self::$instance = new self();
      }
      return self::$instance;
    }
    


    public function get_all_post($limit )
    {
      $query = "SELECT * FROM posts WHERE post_status_id != 2 ORDER BY post_id DESC LIMIT $limit";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
    }

    public function get_total_number_of_post_by_id($id)
    {
      $sql = "SELECT post_id FROM posts WHERE post_user_id = :id";
      $this->query($sql);
      $this->bind(':id', $id);
      $row = $this->executer();
      return $row->rowCount();
    }

    public function get_user_username_by_id($id) {
        $query = "SELECT user_user_name FROM users WHERE user_id = :id";
        $this->query($query);
        $this->bind(':id', $id);
        $row = $this->resultset();
        extract($row);
        return $user_user_name;
    }
    public function get_user_id_by_username($name) {
        $query = "SELECT user_id FROM users WHERE user_user_name = :name";
        $this->query($query);
        $this->bind(':name', $name);
        $row = $this->resultset();
        extract($row);
        return $user_id;

    }

    public function get_post_status_by_id($id) {
        $query = "SELECT status_body FROM statuses WHERE status_id = :id";
        $this->query($query);
        $this->bind(':id', $id);
        $row = $this->resultset();
        extract($row);
        return $status_body;
    }

    public function get_post_category_by_id($id) {
        $query = "SELECT post_category_name FROM post_category WHERE post_category_id = :id";
        $this->query($query);
        $this->bind(':id', $id);
        $row = $this->resultset();
        extract($row);
        return $post_category_name;
    }

    public function get_post_by_id( $id)
    {
      $query = "SELECT * FROM posts WHERE post_status_id != 2 AND post_id = :id";
      $this->query($query);
      $this->bind('id', $id);
      $stmt = $this->resultset();
      return $stmt;
    }

    public function get_post_by_user_id( $user_id)
    {
      $query = "SELECT * FROM posts WHERE post_user_id = $user_id";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
    }

    public function get_post_category()
    {
      $query = "SELECT * FROM post_category";
      $this->query($query);
      $stmt = $this->executer();
      if($stmt->rowCount()>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          ?>
            <option value="<?php echo $post_category_id ?>"><?php echo $post_category_name ?></option>
            <?php
        }
      }
    }

    public function get_search_post($term)
    {
      $query =  "SELECT post_id, post_title, post_content FROM posts WHERE post_title LIKE '%$term%' OR post_content LIKE '%$term%'";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
    }


    public function addNews(NewsModel $postModel) {
        $post_title = $postModel->get_post_title();
        $post_content = $postModel->get_post_content();
        $post_user_id = $postModel->get_post_user_id();
        $post_school_id = $postModel->get_post_school_id();
        $post_status_id = $postModel->get_post_status_id();
        $post_category_id = $postModel->get_post_category_id();

        $query = "INSERT INTO posts(post_title,post_content,post_user_id,post_school_id, post_category_id,post_status_id)"
                . "VALUES(:post_title, :post_content, :post_user_id, :post_school_id, :post_category_id, :post_status_id);";
        try{
          $this->query($query);
          $this->bind(':post_title',$post_title);
          $this->bind(':post_content',$post_content);
          $this->bind(':post_user_id',$post_user_id);
          $this->bind(':post_school_id',$post_school_id);
          $this->bind(':post_category_id', $post_category_id);
          $this->bind(':post_status_id',$post_status_id);
          $this->executer();
          return $this->lastIdinsert();
        }catch(PDOException $e){
          echo $e->getMessage();
          return 0;
        }
      }

    public function get_post_likes($id)
    {
      $query = 'SELECT post_like_count FROM posts WHERE post_id = :id';
      $this->query($query);
      $this->bind(':id', $id);
      $row = $this->resultset();
      extract($row);
      return $post_like_count;
    }

    public function get_post_dislikes($id)
    {
      $query = 'SELECT post_dislike_count FROM posts WHERE post_id = :id';
      $this->query($query);
      $this->bind(':id', $id);
      $row = $this->resultset();
      extract($row);
      return $post_dislike_count;
    }

    public function incrementLikes(NewsModel $postModel) {
      $id = $postModel->get_post_id();
      $post_like = $postModel->get_post_like_count();
      $previous_likes = intval($this->get_post_likes($id));

      if (!is_null($previous_likes) && !is_null($post_like)) {
          $previous_likes = $previous_likes + $post_like;
          $insertSql = "UPDATE posts SET post_like_count = :previous_likes WHERE post_id = $id";
          $this->query($insertSql);
          $this->bind(':previous_likes', $previous_likes);
          $this->executer();
          return $previous_likes;
      }
    }

    public function incrementDislikes(NewsModel $postModel) {
      $id = $postModel->get_post_id();
      $post_like = $postModel->get_post_dislike_count();
      $previous_likes = intval($this->get_post_dislikes($id));

      if (!is_null($previous_likes) && !is_null($post_like)) {
          $previous_likes = $previous_likes + $post_like;
          $insertSql = "UPDATE posts SET post_dislike_count = :previous_likes WHERE post_id = $id";
          $this->query($insertSql);
          $this->bind(':previous_likes', $previous_likes);
          $this->executer();
          return $previous_likes;
      }
    }

    public function getNewsDateById(news $postModel) {

    }

    public function getNewsCommentCount(news $postModel) {

    }

    public function getExcerpt($content, $length) {
       if (strlen($content) < $length) {
           return $content;
       } else {
           $content = substr($content, 0, $length);
           return $content . ' ...';
       }
   }

   public function insert_post_featured_image_id($image_id, $post_id)
   {
     $sql = "UPDATE posts SET post_featured_image_id = :post_featured_image_id WHERE post_id = :post_id";
     $this->query($sql);
     $this->bind(':post_featured_image_id', $image_id);
     $this->bind(':post_id', $post_id);
     if($this->executer()){
       return TRUE;
     }
     return FALSE;
   }

    public function get_last_inserted_id()
    {
      $query = "SELECT post_id FROM posts WHERE post_status_id != 2 ORDER BY post_id DESC  LIMIT 1";
      $this->query($query);
      $row = $this->resultset();
      return $row['post_id'];
    }

    public function get_last_inserted_post($src, $post_src, Resources $res)
    {
        $row = $this->get_post_by_id($this->get_last_inserted_id());
                extract($row);
                ?>
                <div>
                    <a href="<?php echo $post_src; ?>read-news.php?id=<?php echo $post_id ?>">
                    <?php 
                    $res::display($res->get_image_url(68, 'post'), array_merge($res::LATEST_IMAGE_OPTIONS, array( "crop" => "fill" )));?>
                  </a>
                </div>
                <div>
                    <a href="<?php echo $post_src; ?>read-news.php?id=<?php echo $post_id ?>"><h4><?php echo $post_title;?></h4></a>
                </div>
                <?php
      }

      public function display_latest_post($limit, $src)
      {
        $stmt = $this->get_all_post($limit);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <div>
                    <h4><a href="<?php echo $src; ?>read-news.php?id=<?php echo $post_id ?>"><?php echo $post_title; ?></a></h4>
                </div>
                <div>
                    <p><?php echo getExcerpt($post_content, 100);?></p>
                </div>
                <?php
            }
        }
      }
}
