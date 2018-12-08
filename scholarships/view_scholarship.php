<?php
require_once '../init.php';
$id1 = $_GET['id'];
$id = intval($id1);
echo set_title($scholarshipController->get_scholarship_title_by_id($id), get_site_name());
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once '../include/member_header.php';
} else {
    require_once '../include/header.php';
}

if ($id == 0) {
    $logger->LogFatal("SQLInjection Attempt: code used ==> " . $id1, get_user_uid());
    header("Location: ../posts/");
    exit;
} else {
$row = $scholarshipController->get_scholarship_by_id($id);
if (is_null($row) || empty($row)) {
    //Log message here
    header("Location: ../posts/");
} else {
extract($row);
$stmt = $commentController->get_comments_by_id('scholarships', $scholarship_id);
?>

<section id="view-scholarship" class="pad-bottom-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pad-up-50">
                    <h1><?php echo $scholarship_title; ?></h1>
                </div>
            </div>
            <div class="col-md-8" style="background-color:#fff; border-radius:10px; border:2px solid #eee">
                <div class="">
                    <h6 style="color:#aaa;">
                        <span class="empty"></span><span
                            class="marg-rig-10">&nbsp;	Posted by <?php echo $userController->get_user_username_by_id($scholarship_user_id); ?></span>|
                        <span class="empty "><?php echo $scholarship_view_count; ?></span><span class="marg-rig-10">&nbsp; Views</span>|
                        <span class="empty "><?php echo $scholarship_comment_count; ?></span><span class="marg-rig-10">&nbsp; Comments</span>|
                        <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">
                                &nbsp;</i>Posted: <?php echo time_ago($scholarship_date_created); ?></span>|
                        <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">&nbsp;</i>Date Expired: <?php echo($scholarship_date_expired); ?></span>
                    </h6>
                    <hr/>
                </div>
                <p>
                <h5>
                    <p style="text-align: justify;">
                        <?php echo getExcerpt($scholarship_desc, 150); ?>
                    </p>
                </h5>

                </p>
                <div class="pad-bottom-20 text-center">
                    <?php if ($resources->get_image_url($id, 'scholarship') != null)
                        $resources::display($resources->get_image_url($id, 'scholarship'), array_merge($resources::SAMPLE_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                </div>
                <h5>
                    <p style="text-align: justify;">
                        <?php echo get_remain_excerpt($scholarship_desc, 150); ?>
                    </p>
                </h5>

                <div class="pad-up-20 pad-bottom-20">
                    Website:<a href="<?php echo set_url(urldecode($scholarship_url)); ?>" target="_blank">The Scholarship
                        Webpage</a> For More Information <br>
                </div>


                <!-- commentlist here -->
                <div class="row">
                    <div class="col-md-12 pad-bottom-20">

                        <section>
                            <h2><?php echo $scholarship_comment_count; ?> Comments</h2>

                            <!--Leave a reply form-->
                            <div class="reply-form">
                                <!-- <h3 class="section-heading">Make a Comment </h3> -->
                                <!--Third row-->
                                <div class="row">
                                    <form class="col-md-12" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                                        <!--Content column-->
                                        <div class="form-group">
                                            <label for="commentBox">Comment:</label>
                                            <textarea type="text" rows="5" id="commentBox" name="commentBox"
                                                      class="form-control"></textarea>
                                            <input type="hidden" id="d" name="d" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form" id="file1" name="file1">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form" id="file2" name="file2">
                                        </div>
                                        <div class="form-group">
                                            <a href="#cc">
                                                <button class="btn btn-primary" pid="<?php echo $id; ?>"  name="comment" id="comment">Comment
                                                </button>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <h2></h2>
                        <?php
                        
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                ?>
                                <div class="commentlist">
                                    <ul>
                                        <div class="comment-wrap">
                                            <div class="comment-avatar">
                                            <?php $resources::display($resources->get_image_url($comment_user_id, 'profiles'), array_merge($resources::AVATAR_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                                            </div>
                                            <div class="author-comment">
                                                <cite
                                                    class="fn"><?php echo $userController->get_user_username_by_id($comment_user_id); ?></cite>

                                                <div class="">
                                                    <a href=""><?php echo time_ago($comment_date_inserted); ?></a>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="comment-content">
                                                <p><?php echo $comment_body ?></p>
                                            </div>
                                            <div class="like">
                                                <a class="comment-reply-link" href="#!"><span class="fa fa-thumbs-up"></span>
                                                    Like <span class="badge">0</span>
                                                </a>
                                            </div>
                                            <div class="dislike">
                                                <a class="comment-reply-link" href="#"><span class="fa fa-thumbs-down"></span>
                                                    Dislike <span class="badge badge-danger">0</span>
                                                </a>
                                            </div>
                                            <!-- <div class="reply">
                                                <a class="comment-reply-link"
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
                <div class="pad-bottom-20">
                    <img src="../res/imgs/8722.gif" class="img-responsive">
                </div>
                <div class="pad-bottom-20">
                    <form>
                        <div class="form-group">
                            <label>Subject : </label>
                            <input type="text" class="form-control" placeholder="Enter Subject of Study">
                        </div>
                        <div class="form-group">
                            <label>Destination of Study :</label>
                            <input type="text" class="form-control" placeholder="Enter Destination">
                        </div>
                        <div class="form-group">
                            <label>Study Mode :</label>
                            <select class="form-control">
                                <option>full</option>
                                <option>online</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Qualification :</label>
                            <select class="form-control">
                                <option>Postgraduate</option>
                                <option>Undergraduate</option>
                            </select>
                        </div>
                        <button class="btn btn-lg btn-block btn-success">Find Course</button>
                    </form>
                </div>
                <div class="pad-bottom-20">
                    <img src="../res/imgs/p.gif" class="img-responsive">
                </div>
                <div class="pad-bottom-20">
                    <img src="../res/imgs/m.png" class="img-responsive">
                </div>
                <div class="pad-bottom-20">
                    <img src="../res/imgs/s.png" class="img-responsive">
                </div>
            </div>
        </div>
    </div>

</section>
<?php
require_once '../include/footer.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["comment"])){
    if(get_user_uid() != null) {
        $comment_body = filter_var($_POST['commentBox'], FILTER_SANITIZE_STRING);
        if(!empty($comment_body) && strlen($comment_body) != 0 && !empty($_FILES['file']['name'])){
            if($id= $commentController->store_comments($comment_body, get_user_uid(), "scholarships", $scholarship_id)){
                uploadFiles(get_user_uid(), $id);
                unset($_POST);
            }
        }else if(empty($comment_body) && !empty($_FILES['file']['name'])){
            if($id= $commentController->store_comments('picture only', get_user_uid(), "scholarships", $scholarship_id)){
                uploadFiles(get_user_uid(), $id);
                unset($_POST);
            }
    
        }else if(!empty($comment_body) && empty($_FILES['file']['name'])){
        $id= $commentController->store_comments($comment_body, get_user_uid(), "scholarships", $scholarship_id);
        unset($_POST);
        }else{
            $error_text = "Please enter a comment";
        }
    } else{
      header('Location: ../users/login.php');
    }
}


function uploadFiles($user_id, $inserted_id) {
echo $files = $_FILES["file"];
return Resources::upload_image($files, $user_id, $inserted_id, "comments");
}
