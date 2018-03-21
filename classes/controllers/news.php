<?php

class News extends dbmodel {

    public function __construct() {

    }

    public function get_all_news($limit )
    {
      $query = "SELECT * FROM posts WHERE post_status_id != 2 ORDER BY post_id DESC LIMIT $limit";
      $this->query($query);
      $stmt = $this->executer();
      return $stmt;
    }

    public function get_user_username_by_id($id) {
        $query = "SELECT user_user_name FROM users WHERE user_id = $id";
        $this->query($query);
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

    public function get_news_by_id( $id)
    {
      $query = "SELECT * FROM posts WHERE post_status_id != 2 AND post_id = $id";
      $this->query($query);
      $stmt = $this->resultset();
      return $stmt;
    }

    public function get_news_comments_by_id($context, $id)
    {
      //echo $id;
      $query = "SELECT * FROM comments WHERE comment_context = '$context' AND comment_context_id = $id";
      //echo $query;
      $this->query($query);
      $stmt = $this->executer();
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

    public function get_schools()
    {
      $query = "SELECT * FROM schools";
      $this->query($query);
      $stmt = $this->executer();
      if($stmt->rowCount()>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          ?>
            <option value="<?php echo $school_id ?>"><?php echo $school_name ?></option>
            <?php
        }
      }
    }

    public function add_images_and_get_last_inserted_id($image, $user_id, $item_id) {
      //echo "string". $user_id;
      $query = "INSERT INTO resources(resource_url, resource_user_id, resource_item_id, resource_table_name, resource_type)
      VALUES(:image, :user_id, :item_id, :table_name,:type)";
      $this->query($query);
      $this->bind(':image',$image);
      $this->bind(':user_id', $user_id);
      $this->bind(':item_id',$item_id);
      $this->bind(':table_name','post');
      $this->bind(':type','image');
      $this->executer();
      if ($id = $this->lastIdinsert()) {
        return $id;
      }
    }

    public function addNews(NewsModel $newsModel) {
        $post_title = $newsModel->get_post_title();
        $post_content = $newsModel->get_post_content();
        $post_user_id = $newsModel->get_post_user_id();
        $post_school_id = $newsModel->get_post_school_id();
        $post_featured_image_id = $newsModel->get_post_featured_image_id();
        $post_status_id = $newsModel->get_post_status_id();
        $post_category_id = $newsModel->get_post_category_id();

        $query = "INSERT INTO posts(post_title,post_content,post_user_id,post_school_id, post_category_id,post_featured_image_id,post_status_id)"
                . "VALUES(:post_title, :post_content, :post_user_id, :post_school_id, :post_category_id, :post_featured_image_id,:post_status_id);";
        $this->query($query);
        $this->bind(':post_title',$post_title);
        $this->bind(':post_content',$post_content);
        $this->bind(':post_user_id',$post_user_id);
        $this->bind(':post_school_id',$post_school_id);
        $this->bind(':post_category_id', $post_category_id);
        $this->bind(':post_featured_image_id',$post_featured_image_id);
        $this->bind(':post_status_id',$post_status_id);
        $this->executer();
        if ($this->lastIdinsert()) {
          return TRUE;
        }else {
          return FALSE;
        }

    }

    public function incrementLikes(news $newsModel) {

    }

    public function incrementDislikes(news $newsModel) {

    }

    public function getNewsDateById(news $newsModel) {

    }

    public function getNewsCommentCount(news $newsModel) {

    }

    public function getExcerpt($content, $length) {
       if (strlen($content) < $length) {
           return $content;
       } else {
           $content = substr($content, 0, $length);
           return $content . ' ...';
       }
   }

    public function get_last_inserted_id()
    {
      return $this->lastIdinsert();
    }

    public function get_last_inserted_post($src, $post_src)
    {
      // Will be activated when i start inserting [post]
        //$id = $this->get_last_inserted_id();
        $row = $this->get_news_by_id(23);
                extract($row);
                ?>
                <div>
                    <a href="<?php echo $post_src; ?>read-news.php?id=<?php echo $post_id ?>"><img src="<?php echo $src; ?>" class="img-responsive img-thumbnail"></a>
                </div>
                <div>
                    <a href="<?php echo $post_src; ?>read-news.php?id=<?php echo $post_id ?>"><h4><?php echo $post_title;?></h4></a>
                </div>
                <?php
      }

      public function display_latest_news($limit, $src)
      {
        $stmt = $this->get_all_news($limit);
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
