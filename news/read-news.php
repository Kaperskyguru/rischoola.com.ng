<?php
require '../init.php';
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require 'member_header.php';
} else {
    require 'header.php';
}

$id1 = $_GET['id'];
$id = intval($id1);

if ($id == 0) {
header("Location: news.php", true, 301);
exit;
} else {
    $row = $newsControler->get_post_by_id($id);
    if (is_null($row) || empty($row)) {
        //Log message here
        header("Location: news.php");
    } else {
        extract($row);
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9" style="background-color:#fff; border-radius:10px">
                        <h2 class="pad-up-50"><?php echo $post_title; ?></h2>
                        <div class="text-left">
                            <div>
                                <img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
                            </div>
                            <div class="pad-up-20">
                                <h6 style="color:#aaa; margin:8px;">
                                    <span class="badge"></span><span style="margin-right:8px">&nbsp;	Posted by <?php echo $newsControler->get_user_username_by_id($post_user_id); ?></span>
                                    <span class="fa fa-folder">&nbsp;	</span><span style="margin-right:8px">In <?php echo $newsControler->get_post_category_by_id($post_category_id); ?></span>
                                    <span class="badge"><?php echo $post_comment_count; ?></span><span style="margin-right:8px">&nbsp;	Comments</span>
                                    <a style="text-decoration:none;" pid="<?php echo $post_id;?>" href="#" id="like_btn"> <span class="badge" id="like_span<?php echo $post_id;?>"><?php echo $post_like_count; ?></span><span style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-up"></i></span></a>
                                    <a style="text-decoration:none; color:red" pid="<?php echo $post_id;?>" href="#" id="dislike_btn<?php echo $s = (isset($_SESSION['dislike_id']) && $_SESSION['dislike_id'] == get_user_uid())?"d":'' ?>"><span class="badge" id="dislike_span<?php echo $post_id;?>"><?php echo $post_dislike_count; ?></span><span style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-down"></i></span></a>
                                    <span class="empty"></span><span style="margin-right:8px"><i class="fa fa-folder">&nbsp;</i><?php echo timeAgo($post_date_created); ?></span>
                                </h6>
                                <hr />
                            </div>
                            <div class="pad-bottom-50">
                                <h5>
                                    <p style="text-align: justify;">
                                        <?php echo $post_content; ?>
                                    </p>
                                </h5>
                            </div>
                        </div>

                        <!-- commentlist here -->
                        <div class="row">
                            <div class="col-md-12 pad-bottom-20">

                                <section>
                                    <h2><?php echo $post_comment_count; ?> Comments</h2>

                                    <!--Leave a reply form-->
                                    <div class="reply-form">
                                        <!-- <h3 class="section-heading">Make a Comment </h3> -->
                                        <!--Third row-->
                                        <div class="row">
                                            <form class="col-md-12" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$post_id; ?>" method="POST" enctype="multipart/form-data">
                                                <!--Content column-->
                                                <!-- <?php if (!$userController->is_authenticated()) { ?>
                                                    <div class="form-group">
                                                        <label for="name">Enter Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" />
                                                    </div>
                                                <?php } ?> -->
                                                <div class="form-group">
                                                    <label for="commentBox">Enter Comment</label>
                                                    <textarea type="text" rows="5" id="commentBox" name="commentBox" class="form-control"></textarea>
                                                    <input type="hidden" id="d" name="d" value="<?php echo $id; ?>"></input>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" class="form" id="file1" name="file1"></input>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" class="form" id="file2" name="file2"></input>
                                                </div>

                                                <div class="form-group">
                                                    <a href="#cc">
                                                        <button class="btn btn-primary" id="comment" pid="<?php echo $id; ?>">Comment</button>
                                                    </a>
                                                </div>
                                                <!--/.Content column-->
                                            </form>
                                        </div>
                                        <!--/.Third row-->
                                    </div>
                                    <!--/.Leave a reply form-->
                                </section>
                                <h2></h2>
                                <?php
                                $stmt = $commentController->get_comments_by_id('posts', $post_id);
                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row);
                                        ?>
                                        <div class="commentlist">
                                            <ul>
                                                <div class="comment-wrap">
                                                    <div class="comment-avatar">
                                                        <img alt="" src="../res/imgs/1.jpg" class="" height="45" width="45">
                                                    </div>
                                                    <div class="author-comment">
                                                        <cite class="fn"><?php echo $userController->get_user_username_by_id($comment_user_id); ?></cite>
                                                        <div class="">
                                                            <a href="">	<?php echo timeAgo($comment_date_inserted); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="comment-content">
                                                        <p><?php echo $comment_body ?>;</p>
                                                    </div>
                                                    <div class="like">
                                                        <a rel="nofollow" class="comment-reply-link" href="http://localhost/kaperskyguru/testing-out-the-newsletter/?replytocom=5#respond" aria-label="Reply to Kap man"><span class="fa fa-thumbs-up"></span> Like <span class="badge">0</span></a>
                                                    </div>
                                                    <div class="dislike">
                                                        <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Kap man"><span class="fa fa-thumbs-down"></span> Dislike <span class="badge badge-danger">0</span></a>
                                                    </div>
                                                    <div class="reply">
                                                        <a rel="nofollow" class="comment-reply-link" pid="<?php echo $comment_id ?>" href="#" id="reply" aria-label="Reply to Kap man"><span class="fa fa-reply"></span> Reply</a>
                                                    </div>
                                                </div>
                                                <!-- Replies -->
                                                <?php
                                                $stmt1 = $replyController->get_replies_by_comment_id($comment_id);
                                                if ($stmt1->rowCount() > 0) {
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                                        extract($row1);
                                                        ?>
                                                        <li class="replies" style="margin-left:15px">
                                                            <div class="comment-wrap ">
                                                                <div class="comment-avatar">
                                                                    <img alt="" src="../res/imgs/1.jpg" class="" height="45" width="45">
                                                                </div>
                                                                <div class="author-comment">
                                                                    <cite class="fn">Posted by: <?php echo $userController->get_user_username_by_id($comment_user_id); ?></cite>
                                                                    <div class="">
                                                                        <a href="">	<?php echo timeAgo($reply_date); ?></a>
                                                                    </div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <div class="comment-content">
                                                                    <p><?php echo $reply_content ?>;</p>
                                                                </div>
                                                                <div class="like">
                                                                    <a rel="nofollow" class="comment-reply-link" href="http://localhost/kaperskyguru/testing-out-the-newsletter/?replytocom=5#respond" aria-label="Reply to Kap man"><span class="fa fa-thumbs-up"></span> Like <span class="badge">0</span></a>
                                                                </div>
                                                                <div class="dislike">
                                                                    <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Kap man"><span class="fa fa-thumbs-down"></span> Dislike <span class="badge badge-danger">0</span></a>
                                                                </div>
                                                                <div class="reply">
                                                                    <a rel="nofollow" class="comment-reply-link" pid="<?php echo $reply_id ?>" href="#" id="reply" aria-label="Reply to Kap man"><span class="fa fa-reply"></span> Reply</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                } else {
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
<script>
    $(document).ready(function () {
        $('#reply').click(function (e) {
            e.preventDefault();
            var pid = $(this).attr('pid');
            alert(pid);
            // $.ajax({
            //   method:"post",
            //   url:"read-news.php"
            //   data:{pid:pid},
            //   success: function(da) {
            //       alert(da);
            //   };
            // });
        });

        $('body').delegate('#comment', 'click', function() {
            //e.preventDefault();
            var pid = $(this).attr('pid');
            var comment_body = $('#commentBox').val();
            var file = $('#file1').val();
            alert(file);
            $.ajax({
              method:'post',
              url:'getNews.php',
              cache:false,
              data:{comment:1, pid:pid, comment_body:comment_body},
              success:function (d) {
                alert(d);
              }
            });
        });


    });
</script>
