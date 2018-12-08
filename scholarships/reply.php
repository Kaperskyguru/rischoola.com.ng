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
                                                            <?php $resources::display($resources->get_image_url($comment_user_id, 'profiles'), array_merge($resources::AVATAR_IMAGE_OPTIONS, array("crop" => "fill"))); ?> 
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
                                        ?>