<?php
require_once '../init.php';
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once '../include/member_header.php';
} else {
    require_once '../include/header.php';
}

$id1 = $_GET['id'];
$id = intval($id1);

if ($id == 0) {
    $logger->LogFatal("SQLInjection Attempt: code used ==> " . $id1, get_user_uid());
    exit(header("Location: index.php"));
} else {
$row = $newsControler->get_post_by_id($id);
if (is_null($row) || empty($row)) {
    //Log message here
    $logger->logWarn("Row is null or empty in ".__FILE__, get_user_uid());
    header("Location: index.php");
    exit;
} else {
extract($row);
$comment_stmt = $commentController->get_comments_by_id('posts', $post_id);
?>
<section class="marg-to-50 pad-up-50">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="background-color:#fff; border-radius:10px">
                <h2 class=""><?php echo $post_title; ?></h2>

                <div class="text-left">
                    <div>
                        <?php
                        if ($resources->get_image_url($id, 'post') != null)
                            $resources::display($resources->get_image_url($id, 'post'), array_merge($resources::DEFAULT_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                    </div>
                    <div class="pad-up-20">
                        <h6 style="color:#aaa; margin:8px;">
                            <span class="badge"></span><span
                                style="margin-right:8px">&nbsp;	Posted by <?php echo $newsControler->get_user_username_by_id($post_user_id); ?></span>
                            <span class="fa fa-folder">&nbsp;	</span><span
                                style="margin-right:8px">In <?php echo $newsControler->get_post_category_by_id($post_category_id); ?></span>
                            <span class="badge"><?php echo $comment_stmt->rowCount(); ?></span><span style="margin-right:8px">&nbsp;	Comments</span>
                            <a style="text-decoration:none;" pid="<?php echo $post_id; ?>" href="#" id="like_btn"> <span
                                    class="badge"
                                    id="like_span<?php echo $post_id; ?>"><?php echo $post_like_count; ?></span><span
                                    style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-up"></i></span></a>
                            <a style="text-decoration:none; color:red" pid="<?php echo $post_id; ?>" href="#"
                               id="dislike_btn<?php echo $s = (isset($_SESSION['dislike_id']) && $_SESSION['dislike_id'] == get_user_uid()) ? "d" : '' ?>"><span
                                    class="badge"
                                    id="dislike_span<?php echo $post_id; ?>"><?php echo $post_dislike_count; ?></span><span
                                    style="margin-right:8px">&nbsp;	<i class="fa fa-thumbs-down"></i></span></a>
                            <span class="empty"></span><span style="margin-right:8px"><i class="fa fa-folder">
                                    &nbsp;</i><?php echo time_ago($post_date_created); ?></span>
                        </h6>
                        <hr>
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
                            <h2><?php echo $comment_stmt->rowCount(); ?> Comments</h2>

                            <!--Leave a reply form-->
                            <div class="reply-form">
                                <!-- <h3 class="section-heading">Make a Comment </h3> -->
                                <!--Third row-->
                                <div class="row">
                                <div class="col-md-12">
                                <form id="sub" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="commentBox">Enter Comment</label>
                                            <textarea type="text" rows="5" id="commentBox" name="commentBox"
                                                      class="form-control"></textarea>
                                            <input type="hidden" id="d" name="d" value="<?php echo $id; ?>"></input>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form" id="file" name="file"></input>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form" id="file" name="file"></input>
                                        </div>

                                        <div class="form-group">
                                            <a href="#cc">
                                                <button type="submit" class="btn btn-primary" name="comment" id="comment"
                                                        pid="<?php echo $id; ?>">Comment
                                                </button>
                                            </a>
                                        </div>
                                        <!--/.Content column-->
                                    </form>
                                    </div>
                                </div>
                                <!--/.Third row-->
                            </div>
                            <!--/.Leave a reply form-->
                        </section>
                        <h2></h2>
                        <?php

                        if ($comment_stmt->rowCount() > 0) {
                            while ($row = $comment_stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <div class="commentlist">
                                    <ul>
                                        <div class="comment-wrap">
                                            <div class="comment-avatar">
                                                <img alt="" src="../res/imgs/1.jpg" class="" height="45" width="45">
                                            </div>
                                            <div class="author-comment">
                                                <cite
                                                    class="fn"><?php echo $userController->get_user_username_by_id($comment_user_id); ?></cite>

                                                <div class="">
                                                    <a href="">    <?php echo time_ago($comment_date_inserted); ?></a>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="comment-content">
                                                <p><?php echo $comment_body ?>;</p>
                                            </div>
                                            <div class="like">
                                                <a rel="nofollow" class="comment-reply-link"
                                                   href="http://localhost/kaperskyguru/testing-out-the-newsletter/?replytocom=5#respond"
                                                   aria-label="Reply to Kap man"><span class="fa fa-thumbs-up"></span>
                                                    Like <span class="badge">0</span></a>
                                            </div>
                                            <div class="dislike">
                                                <a rel="nofollow" class="comment-reply-link" href="#"
                                                   aria-label="Reply to Kap man"><span class="fa fa-thumbs-down"></span>
                                                    Dislike <span class="badge badge-danger">0</span></a>
                                            </div>
                                            <!-- <div class="reply">
                                                <a rel="nofollow" class="comment-reply-link"
                                                   pid="<?php echo $comment_id ?>" href="#" id="reply"
                                                   aria-label="Reply to Kap man"><span class="fa fa-reply"></span> Reply</a>
                                            </div> -->
                                        </div>

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
            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="pad-bottom-20">
                        <?php //require_once  SITEURL .'/include/tabs.php'; ?>
                    </div>
                    <div class="pad-bottom-20">
                        <img src="<?php echo SITEURL; ?>/res/imgs/8722.gif" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="<?php echo SITEURL; ?>/res/imgs/p.gif" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="<?php echo SITEURL; ?>/res/imgs/m.png" class="img-responsive">
                    </div>
                    <div class="pad-bottom-20">
                        <img src="<?php echo SITEURL; ?>/res/imgs/m.png" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- </section> -->
<?php require_once '../include/footer.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["comment"])){
    $comment_body = filter_var($_POST['commentBox'], FILTER_SANITIZE_STRING);
    if(!empty($comment_body) && strlen($comment_body) != 0 && !empty($_FILES['file']['name'])){
        if($id= $commentController->store_comments($comment_body, get_user_uid(), "posts", $post_id)){
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }
    }else if(empty($comment_body) && !empty($_FILES['file']['name'])){
        if($id= $commentController->store_comments('picture only', get_user_uid(), "posts", $post_id)){
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }

    }else if(!empty($comment_body) && empty($_FILES['file']['name'])){
       echo $id= $commentController->store_comments($comment_body, get_user_uid(), "posts", $post_id);
       unset($_POST);
    }else{
        $error_text = "Please enter a comment";
    }

  }
function uploadFiles($user_id, $inserted_id) {
    echo $files = $_FILES["file"];
    return Resources::upload_image($files, $user_id, $inserted_id, "comments");
  }?>
