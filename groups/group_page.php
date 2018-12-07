<?php
require_once '../init.php';

$id1 = $_GET['id'];
$id = intval($id1);

echo set_title($groupController->get_group_title_by_id($id), get_site_name());
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once '../include/member_header.php';
} else {
    require_once '../include/header.php';
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    // GROUP DISCUSSION CODE HERE
}


if ($id == 0) {
    $logger->LogFatal("SQLInjection Attempt: code used ==> " . $id1, get_user_uid());
    header("Location: index.php");
    exit;
} else {
    $row = $groupController->get_group_by_id($id);
    if (is_null($row) || empty($row)) {
        //Log message here
        $logger->logWarn("Row is null or empty in " . __FILE__, get_user_uid());
        header("Location: index.php");
        exit;
    } else {
        extract($row);
        ?>
        <section>
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="pad-up-50">
                <h1 class=""><?php echo $group_title; ?></h1>
            </div>
        </div>
        <div class="col-md-8 group_layout">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#discussion">Discussions</a></li>
                <li><a data-toggle="tab" href="#member">Members</a></li>
                <li><a data-toggle="tab" href="#about">About</a></li>
                <li><a data-toggle="tab" href="#details">Admin Details</a></li>
            </ul>

            <div class="tab-content">
                <div id="discussion" class="tab-pane fade in active">
                    <?php if ($groupController->is_group_member($group_id, get_user_uid()) && $userController->is_authenticated()) { ?>
                        <!--Leave a reply form-->
                        <div class="reply-form">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="section-heading">Start A Discussion </h3>
                                </div>
                                <div class="col-md-2">
                                    <a href='<?php echo SITEURL . "/groups/" . $group_id; ?>' id='leave_group'
                                       gid='<?php echo $group_id; ?>' class='btn btn-danger'>Leave Group</a>
                                </div>
                            </div>
                            <!--Third row-->
                            <div class="row">
                                <form class="col-md-12" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                      method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="commentBox">Type your topic in the box below:</label>
                                        <textarea type="text" rows="5" id="commentBox" name="commentBox"
                                                  class="form-control"></textarea>
                                        <input type="hidden" id="d" name="d" value="<?php echo $id; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form" name="file[]"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form" name="file[]"/>
                                    </div>

                                    <div class="form-group">
                                        <a href="#cc">
                                            <button class="btn btn-primary" type="submit" name="submit" id="submit"
                                               gid="<?php echo $id; ?>">Post Topic</button>
                                        </a>
                                    </div>
                                    <!--/.Content column-->
                                </form>
                            </div>
                            <!--/.Third row-->
                        </div>
                        <?php
                    } else {
                        echo "<p>Not yet a member, Join group to start discussing </p><br />"; ?>
                        <a href="<?php echo $url = get_user_uid() != null ? SITEURL . "/groups/" . $group_id : "../users/login.php"; ?>"
                           id="join_group" gid="<?php echo $group_id ?>" class="btn btn-primary">Join Group</a>
                    <?php }
                    ?>
                    <!--/.Leave a reply form-->
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Group Discussions (<?php echo $group_comment_count; ?>)</h3>
                        </div>
                        <div class="col-md-2">
                            <ul class="nav nav-pills">
                                <li class="dropdown">
                                    <a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#">Sort By
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" pid="<?php echo $group_id ?>" class="">Newest</a></li>
                                        <li><a href="#" pid="<?php echo $group_id ?>" class="">Best</a></li>
                                        <li><a href="#" pid="<?php echo $group_id ?>" class="">Oldest</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr/>
                    <!-- commentlist here -->
                    <div class="row">
                        <div class="col-md-12 pad-bottom-20">
                            <?php
                            $dis_stmt = $groupController->get_group_discussions_by_group_id($group_id);
                            if ($dis_stmt->rowCount() > 0) {
                                while ($dis_row = $dis_stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($dis_row);
                                    ?>
                                    <div class="commentlist">
                                        <ul>
                                            <div class="comment-wrap">
                                                <div class="comment-avatar">
                                                    <?php $resources::display($resources->get_image_url($discussion_user_id, 'profiles'), array_merge($resources::AVATAR_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                                                </div>
                                                <div class="author-comment">
                                                    <cite
                                                        class="fn"><?php echo $userController->get_user_username_by_id($discussion_user_id); ?></cite>

                                                    <div class="">
                                                        <a href="">    <?php echo time_ago($discussion_date); ?></a>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="comment-content">
                                                    <p><?php echo $discussion_body ?>;</p>
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
                                                <!-- <div class="reply">
                                                    <a rel="nofollow" class="comment-reply-link"
                                                       pid="<?php echo $discussion_id ?>" href="#" id="reply"
                                                       aria-label="Reply to Kap man"><span class="fa fa-reply"></span>
                                                        Reply</a>
                                                </div> -->
                                            </div>
                                            <!-- Replies -->
                                            <!-- <?php
                                            $stmt1 = $replyController->get_replies_by_discussion_id($discussion_id);
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
                                echo "<p>No Discussions Yet</p>";
                            }
                            ?>
                        </div>
                    </div>

                </div>

                <div id="member" class="tab-pane fade">
                    <h2>All Group members</h2>

                    <div class="row">
                        <!--  //echo $n = ($groupController->is_group_admin($membership_user_id, $group_user_id))?"Leave":" -->
                        <?php
                        $stmt = $groupController->get_group_members($group_id);
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row); ?>
                                <div class="col-md-4" style="border-right:1px solid #eee">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="../res/imgs/1.jpg" style="margin-bottom:5px"
                                                 class="img-responsive img-thumbnail"/>

                                            <?php if (get_user_uid() == $group_user_id): ?>
                                                <a href="#" id="leave_group" gid="<?php echo $group_id; ?>"
                                                   class="btn btn-xs btn-danger">
                                                    <?php echo $n = ($groupController->is_group_admin($membership_user_id, $group_user_id)) ? "Leave" : "Remove" ?>
                                                </a>
                                            <?php elseif (get_user_uid() == $membership_user_id): ?>
                                                <a id="leave_group" gid="<?php echo $group_id; ?>" href="#"
                                                   class="btn btn-xs btn-danger">Leave</a>
                                            <?php endif; ?>

                                        </div>
                                        <div class="col-md-8">
                                            <a href="#">
                                                <h5><?php echo $userController->get_user_username_by_id($membership_user_id); ?></h5>
                                            </a>

                                            <p class="small"><?php echo getExcerpt($userController->get_user_about_by_user_id($membership_user_id), 50); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <hr>
                </div>

                <div id="about" class="tab-pane fade">
                    <h2>About Group</h2>
                    <table class="table-condensed table-bordered table-responsive">
                        <tr>
                            <th>
                                Group Admin:
                            </th>
                            <td>
                                <?php echo $userController->get_user_display_name_by_id($group_user_id, true) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Created on:
                            </th>
                            <td>
                                <?php echo get_formatted_date($group_date_created); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                # Members:
                            </th>
                            <td>
                                <?php echo $groupController->get_number_group_members_by_id($group_id);
                                if ($groupController->is_group_member($group_id, get_user_uid())) {
                                    echo ' (you are a member)';
                                }; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Institution:
                            </th>
                            <td>
                                <?php echo $schoolController->get_school_name_by_id($group_school_id); ?>
                            </td>
                        </tr>
                    </table>
                    <div class="text-center pad-up-20">
                        <?php $resources::display($resources->get_image_url($id, 'group'), array_merge($resources::SAMPLE_IMAGE_OPTIONS, array("crop" => "fill"))); ?>
                    </div>
                    <div class="pad-bottom-50 pad-up-20">
                        <h4>Description:</h4>
                        <h5>
                            <p style="text-align: justify;">
                                <?php echo $group_desc; ?>
                            </p>
                        </h5>
                    </div>
                </div>
                <div id="details" class="tab-pane fade">
                    <h3>Admin Contacts</h3>
                    <ul class="list-group">
                        <?php if ($groupController->group_show_phone($group_id)) { ?>
                            <li class="list-group-item"><span
                                    class="fa fa-phone"> <?php echo $userController->get_user_phone_number_by_id($group_user_id); ?></span>
                            </li>
                        <?php }
                        if ($groupController->group_show_email($group_id)) { ?>
                            <li class="list-group-item"><span class="fa fa-envelope"> </span> solomoneseme@gmail.com
                            </li>
                            <!-- LOOK INTO THIS  ===> EMAIL-->
                        <?php } ?>
                    </ul>
                    <h4>Send Personal Message to Group Admin</h4>

                    <div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input required id="subject" class="form-control" type="text"/>
                        </div>

                        <div class="form-group">
                            <label for="body">Message:</label>
                            <textarea required id="message" rows="5" class="form-control" type="text"></textarea>
                        </div>
                        <div class="form-group">
                            <button id="send_group_admin_message" uid="<?php echo $group_user_id; ?>"
                                    class="btn btn-danger" type="text" value="">Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
    <div class="col-md-4">
        <div class="col-sm-12">
            <?php require_once '../include/tabs.php'; ?>
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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {
    $discussion_body = filter_var($_POST['commentBox'], FILTER_SANITIZE_STRING);

    if (!empty($discussion_body) && strlen($discussion_body) != 0 && !empty($_FILES['file']['name'])) {
        if ($id = $groupController->add_group_discussions($discussion_body, get_user_uid(),  $group_id)) {
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }
    } else if (empty($discussion_body) && !empty($_FILES['file']['name'])) {
        if ($id = $groupController->add_group_discussions('picture only', get_user_uid(),  $group_id)) {
            uploadFiles(get_user_uid(), $id);
            unset($_POST);
        }

    } else if (!empty($discussion_body) && empty($_FILES['file']['name'])) {
        echo $id = $groupController->add_group_discussions($discussion_body, get_user_uid(),  $group_id);
        unset($_POST);
    } else {
        $error_text = "Please enter a discussion";
    }

}
function uploadFiles($user_id, $inserted_id)
{
    $files = $_FILES["file"];
    return Resources::upload_image($files, $user_id, $inserted_id, "groups");
}
