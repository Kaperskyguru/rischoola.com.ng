<?php
require '../init.php';
include 'header.php';

$id1 = $_GET['id'];
$id = intval($id1);

if($id == 0){
  // Log message here
  header("Location:../index.php");
}else{
  $row = $newsControler->get_news_by_id($id);
  if(is_null($row)){
    //Log message here
    header("Location:../index.php");
  }else{
      extract($row);
    ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2 class="pad-up-50"><?php echo $post_title; ?></h2>
                <div class="text-left">
                    <div>
                        <img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="pad-up-20">
                        <h6 style="color:#aaa; margin:8px;">
                            <span class="badge"></span><span style="margin-right:8px">&nbsp;	Posted by <?php echo $newsControler->get_user_username_by_id($post_user_id); ?></span>
                            <span class="fa fa-folder">&nbsp;	</span><span style="margin-right:8px">In Jamb</span>
                            <span class="badge"><?php echo $post_comment_count;?></span><span style="margin-right:8px">&nbsp;	Comments</span>
                            <span class="badge"><?php echo $post_like_count;?></span><span style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-up"></i></span>
                            <span class="badge"><?php echo $post_dislike_count;?></span><span style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-down"></i></span>
                            <span class="empty"></span><span style="margin-right:8px"><i class="fa fa-folder">&nbsp;</i><?php echo $post_date_created;?></span>
                        </h6>
                        <hr />
                    </div>
                    <div class="pad-bottom-50">
                        <h5>
                            <p style="text-align: justify;">
                                <?php echo $post_content;?>
                            </p>
                        </h5>
                    </div>
                </div>
                <!-- commentlist here -->
                <div class="row">
                    <div class="col-md-12 pad-bottom-20">

                      <section>
                          <!--Leave a reply form-->
                          <div class="reply-form">
                              <!-- <h3 class="section-heading">Make a Comment </h3> -->
                              <!--Third row-->
                              <div class="row">
                                  <form class="col-md-6" action="<?php echo htmlspecialchars('PHP_SELF');?>" method="POST">
                                      <!--Content column-->
                                      <div class="form-group">
                                            <label for="name">Enter Name</label>
                                            <input type="text" id="name" name="name" class="form-control" />
                                      </div>

                                      <div class="form-group">
                                            <label for="commentBox">Enter Comment</label>
                                            <textarea type="text" id="commentBox" name="commentBox" class="form-control"></textarea>
                                            <input type="hidden" id="d" name="d" value="<?php echo $id;?>"></input>
                                      </div>

                                      <div class="form-group">
                                          <a href="#cc">
                                              <button class="btn btn-primary" pid="<?php echo $id;?>">Comment</button>
                                          </a>
                                      </div>
                                      <!--/.Content column-->
                                  </form>
                              </div>
                              <!--/.Third row-->
                          </div>
                          <!--/.Leave a reply form-->
                      </section>

                        <h2><?php echo $post_comment_count; ?> Comments</h2>



                        <?php
                        $stmt = $newsControler->get_news_comments_by_id('posts', $post_id);
                        if($stmt->rowCount() > 0){
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                          ?>
                          <div class="commentlist">
                              <li>
                                  <div class="comment-wrap">
                                      <div class="comment-avatar">
                                          <img alt="" src="../res/imgs/1.jpg" class="" height="45" width="45">
                                      </div>
                                      <div class="author-comment">
                                          <cite class="fn"><?php echo $newsControler->get_user_username_by_id($comment_user_id); ?></cite>
                                          <div class="">
                                              <a href="">	<?php echo $comment_date_inserted; ?></a>
                                          </div>
                                      </div>
                                      <div class="clear"></div>
                                      <div class="comment-content">
                                          <p><?php echo $comment_body ?>;</p>
                                      </div>
                                      <div class="reply">
                                          <a rel="nofollow" class="comment-reply-link" href="http://localhost/kaperskyguru/testing-out-the-newsletter/?replytocom=5#respond" aria-label="Reply to Kap man">Reply</a>
                                      </div>
                                  </div>
                              </li>
                          </div>
                          <?php
                        }
                      }else{
                        echo "<p>No Comments Yet</p>";
                      }
                      ?>
                    </div>
                </div>
            </div>
            <?php
          }
        }
        ?>
            <div class="col-md-3">
                <h2 class="pad-up-50">.</h2>
                <div class="row ">
                    <?php require '../include/tabs.php'; ?>
                </div>
                <div class="col-sm-12">
                    <div class="pad-bottom-20">
                        <img src="../res/imgs/8722.gif" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="../res/imgs/p.gif" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="../res/imgs/m.png" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="../res/imgs/m.png" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- </section> -->
<?php include 'footer.php'; ?>
