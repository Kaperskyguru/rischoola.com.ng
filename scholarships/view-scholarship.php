<?php
require '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}

$id1 = $_GET['id'];
$id = intval($id1);

if ($id == 0) {
header("Location:scholarships.php", true, 301);
exit;
} else {
    $row = $scholarshipController->get_scholarship_by_id($id);
    if (is_null($row)  || empty($row)) {
        //Log message here
        header("Location:scholarships.php");
    } else {
        extract($row);
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
              <span class="empty"></span><span class="marg-rig-10">&nbsp;	Posted by <?php echo $userController->get_user_username_by_id($scholarship_user_id); ?></span>|
              <span class="empty "><?php echo $scholarship_view_count; ?></span><span class="marg-rig-10">&nbsp; Views</span>|
              <span class="empty "><?php echo $scholarship_comment_count; ?></span><span class="marg-rig-10">&nbsp; Comments</span>|
              <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">&nbsp;</i>Posted: <?php echo timeAgo($scholarship_date_created); ?></span>|
              <span class="empty"></span><span class="marg-rig-10"><i class="fa fa-folder">&nbsp;</i>Date Expired: <?php echo ($scholarship_date_expired); ?></span>
          </h6>
          <hr />
      </div>
			<p>
        <h5>
            <p style="text-align: justify;">
                <?php echo getExcerpt($scholarship_desc, 150); ?>
            </p>
        </h5>

			</p>
			<div class="pad-bottom-20 text-center">
				<img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
			</div>
      <h5>
          <p style="text-align: justify;">
              <?php echo get_remain_excerpt($scholarship_desc, 150); ?>
          </p>
      </h5>

        <div class="pad-up-20 pad-bottom-20">
				Website:<a href="../../../<?php echo $scholarship_url; ?>" target="_blank">The Scholarship Webpage</a> For More Information <br>
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
                        <form class="col-md-12" action="<?php echo htmlspecialchars('PHP_SELF'); ?>" method="POST">
                            <!--Content column-->
                            <?php if (!$userController->is_user_logged_in()) { ?>

                            <?php } ?>
                            <div class="form-group">
                                <label for="commentBox">Comment:</label>
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
                                    <button class="btn btn-primary" pid="<?php echo $id; ?>">Comment</button>
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
            $stmt = $commentController->get_comments_by_id('scholarships', $scholarship_id);
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
                                    <cite class="fn"><?php echo $userControler->get_user_username_by_id($comment_user_id); ?></cite>
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



		<div class="col-md-4">
			<div class="pad-bottom-20">
				<img src="../res/imgs/8722.gif" class="img-responsive">
			</div>
			<div class="pad-bottom-20">
				<form>
				  <div class="form-group">
				    <label >Subject : </label>
				    <input type="text" class="form-control" placeholder="Enter Subject of Study">
				  </div>
				  <div class="form-group">
				    <label >Destination of Study :</label>
				    <input type="text" class="form-control"  placeholder="Enter Destination">
				  </div>
				  <div class="form-group">
				  	<label >Study Mode :</label>
				    <select class="form-control">
				    	<option>full</option>
				    	<option>online</option>
				    </select>
				  </div>
				  <div class="form-group">
				  	<label >Qualification :</label>
				    <select class="form-control">
				    	<option>Postgraduate</option>
				    	<option>Undergraduate</option>
				    </select>
				  </div>
				  <button  class="btn btn-lg btn-block btn-success">Find Course</button>
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
	include 'footer.php';
?>
