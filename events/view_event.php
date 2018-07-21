<?php
require '../init.php';
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
    header("Location:../index.php", true, 301);
    exit;
} else {
    $row = $eventController->get_event_by_id($id);
    if (is_null($row) || empty($row)) {
        //Log message here
        header("Location:events.php");
    } else {
        extract($row);
        ?>
        <section>
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="pad-up-50">
                <h1 class=""><?php echo $event_title; ?></h1>
            </div>
        </div>
        <div class="col-md-8" style="background-color:#fff; border-radius:10px; border:2px solid #eee">
            <!-- <h2 class=""><?php echo $event_title; ?></h2> -->
            <div class="text-left">
                <!-- <div>
                    <img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
                </div> -->
                <div class="pad-up-20">
                    <h6 style="color:#aaa;">
                        <span class="empty badge"></span><span
                            class="marg-rig-10">&nbsp;	Posted by <?php echo $userController->get_user_username_by_id($event_user_id); ?></span>|
                        <span class="empty badge"><?php echo $event_comment_count; ?></span><span class="marg-rig-10">&nbsp; Views</span>|
                        <span class="empty badge"><?php echo $event_comment_count; ?></span><span class="marg-rig-10">&nbsp; Comments</span>|
                        <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">
                                &nbsp;</i>Posted: <?php echo time_ago($event_date_created); ?></span>|
                        <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">&nbsp;</i>Event Date: <?php echo($event_date); ?></span>
                    </h6>
                    <hr/>
                </div>
                <div class="">
                    <h5>
                        <p style="text-align: justify;">
                            <?php echo $event_desc; ?>
                        </p>
                    </h5>
                </div>
                <div class="pad-bottom-50">
                    <ul class="pager">
                        <li class="previous"><a><< Previous </a></li>
                        <li class="next"><a href="#">Next >></a></li>
                    </ul>
                    <?php
                    if ($eventController->is_reminder_set($event_id, get_user_uid())) { ?>
                        <a id="reminder-set" disabled class="fa fa-clock-o btn btn-lg btn-success"> Reminder Set</a>
                        <?php
                    } else {
                        ?>
                        <a id="reminder" pid="<?php echo $event_id; ?>" class="fa fa-clock-o btn btn-lg btn-success">
                            Set Reminder</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- commentlist here -->
            <div class="row">
                <div class="col-md-12 pad-bottom-20">

                    <section>
                        <h2><?php echo $event_comment_count; ?> Comments</h2>

                        <!--Leave a reply form-->
                        <div class="reply-form">
                            <!-- <h3 class="section-heading">Make a Comment </h3> -->
                            <!--Third row-->
                            <div class="row">
                                <form class="col-md-12" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                    <!--Content column-->
                                    <div class="form-group">
                                        <label for="commentBox">Comment:</label>
                                        <textarea type="text" rows="5" id="commentBox" name="commentBox" class="form-control"></textarea>
                                        <input type="hidden" id="d" name="d" value="<?php echo $id; ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form" id="file" name="file[]"></input>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form" id="file" name="file[]"></input>
                                    </div>

                                    <div class="form-group">
                                        <a href="#cc">
                                            <button type="submit" class="btn btn-primary" id="comment" name="comment" pid="<?php echo $id; ?>">Comment</button>
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
                    $stmt = $commentController->get_comments_by_id('events', $event_id);
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
                                               aria-label="Reply to Kap man"><span class="fa fa-thumbs-up"></span> Like
                                                <span class="badge">0</span></a>
                                        </div>
                                        <div class="dislike">
                                            <a rel="nofollow" class="comment-reply-link" href="#"
                                               aria-label="Reply to Kap man"><span class="fa fa-thumbs-down"></span>
                                                Dislike <span class="badge badge-danger">0</span></a>
                                        </div>
                                        <!-- <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" pid="<?php echo $comment_id ?>"
                                               href="#" id="reply" aria-label="Reply to Kap man"><span
                                                    class="fa fa-reply"></span> Reply</a>
                                        </div> -->
                                    </div>
                                    <!-- Replies -->
                                    <!-- <?php
                                    $stmt1 = $replyController->get_replies_by_comment_id($comment_id);
                                    if ($stmt1->rowCount() > 0) {
                                        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                            extract($row1);
                                            ?>
                                            <li class="replies" style="margin-left:15px">
                                                <div class="comment-wrap ">
                                                    <div class="comment-avatar">
                                                        <img alt="" src="../res/imgs/1.jpg" class="" height="45"
                                                             width="45">
                                                    </div>
                                                    <div class="author-comment">
                                                        <cite class="fn">Posted
                                                            by: <?php echo $userController->get_user_username_by_id($comment_user_id); ?></cite>

                                                        <div class="">
                                                            <a href="">    <?php echo time_ago($reply_date); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="comment-content">
                                                        <p><?php echo $reply_content ?>;</p>
                                                    </div>
                                                    <div class="like">
                                                        <a rel="nofollow" class="comment-reply-link"
                                                           href="http://localhost/kaperskyguru/testing-out-the-newsletter/?replytocom=5#respond"
                                                           aria-label="Reply to Kap man"><span
                                                                class="fa fa-thumbs-up"></span> Like <span
                                                                class="badge">0</span></a>
                                                    </div>
                                                    <div class="dislike">
                                                        <a rel="nofollow" class="comment-reply-link" href="#"
                                                           aria-label="Reply to Kap man"><span
                                                                class="fa fa-thumbs-down"></span> Dislike <span
                                                                class="badge badge-danger">0</span></a>
                                                    </div>
                                                    <div class="reply">
                                                        <a rel="nofollow" class="comment-reply-link"
                                                           pid="<?php echo $reply_id ?>" href="#" id="reply"
                                                           aria-label="Reply to Kap man"><span
                                                                class="fa fa-reply"></span> Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?> -->
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
        <div class="col-sm-12">
            <?php //require '../include/tabs.php'; ?>
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
<?php require_once '../include/footer.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["comment"])){
    $comment_body = filter_var($_POST['commentBox'], FILTER_SANITIZE_STRING);
    if(!empty($comment_body) && strlen($comment_body) != 0 && !empty($_FILES['file']['name'])){
        if($id= $commentController->store_comments($comment_body, get_user_uid(), "events", $event_id)){
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }
    }else if(empty($comment_body) && !empty($_FILES['file']['name'])){
        if($id= $commentController->store_comments('picture only', get_user_uid(), "events", $event_id)){
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }

    }else if(!empty($comment_body) && empty($_FILES['file']['name'])){
       echo $id= $commentController->store_comments($comment_body, get_user_uid(), "events", $event_id);
       unset($_POST);
    }else{
        $error_text = "Please enter a comment";
    }

  }
function uploadFiles($user_id, $inserted_id) {
    echo $files = $_FILES["file"];
    return Resources::upload_image($files, $user_id, $inserted_id, "events");
  }?>
