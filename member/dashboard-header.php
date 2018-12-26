<?php require_once '../init.php';
$userController->cookie_login();
if(!$userController->is_authenticated()){
  header('Location: ../users/login');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard | <?php echo get_site_name() ?></title>
        <link rel="shortcut icon" type="image/png" href="https://res.cloudinary.com/kaperskydisk/image/upload/v1524654792/Rischoola/fav.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo SITEURL; ?>/res/css/bootstrap.min.css" rel="stylesheet">

        <link href="datatable/datatables.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo SITEURL; ?>/res/css/sb-admin.css" rel="stylesheet">

        <link href="<?php echo SITEURL; ?>/res/css/style.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo SITEURL; ?>/res/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top top-nav" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo_marg" href="<?php echo SITEURL; ?>/"><img src="<?php echo SITEURL; ?>/res/imgs/brand.fw.png" class="img-responsive"></a>
                    </div>
                    <div class="collapse navbar-collapse bs-example-navbar-collapse-1" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Top Menu Items -->
                        <ul class="nav navbar-nav top-nav">
                            <li ><a href="<?php echo SITEURL; ?>/" class="active">Home<span class="sr-only">(current)</span></a></li>
                            <li><a href="<?php echo SITEURL; ?>/posts/">Latest News</a></li>
                            <li><a href="<?php echo SITEURL; ?>/lodges/">Hostel</a></li>
                            <li><a href="<?php echo SITEURL; ?>/marketplace/">Store</a></li>
                            <li><a href="<?php echo SITEURL; ?>/roommates/">Roommate Finder</a></li>
                            <li><a href="<?php echo SITEURL; ?>/groups/">Groups</a></li>
                            <li><a href="<?php echo SITEURL; ?>/events/">Events</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                            <?php $m_stmt = $messageController->get_message_notifications(get_user_uid());?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="text-danger"><?php echo $m_stmt->rowCount();?></b><b class="caret"></b></a>
                                <ul class="dropdown-menu message-dropdown">
                                    <?php
                                        if ($m_stmt->rowCount() > 0){
                                            while ($m_row = $m_stmt->fetch(PDO::FETCH_ASSOC)){
                                                extract($m_row);?>
                                                    <li class="message-preview">
                                                        <a href="inbox.php">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <h5 class="media-heading"><strong><?php echo $userController->get_user_display_name_by_id($message_sender_id); ?></strong>
                                                                    </h5>
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo time_ago($message_date_created); ?> </p>
                                                                    <p><?php echo getExcerpt($message_body, 50); ?></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>

                                            <?php }
                                        }else{
                                            echo '<i>No New Messages </i>';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                            <?php
                                $stmt = $notifier->get_notifications_by_user_id(get_user_uid(),5);?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="text-danger"><?php echo $stmt->rowCount();?></b><b class="caret"></b></a>
                                <ul class="dropdown-menu alert-dropdown">
                                    <?php if($stmt->rowCount() > 0){
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            extract($row);?>
                                                <li>
                                                    <a href="#"> <span class="label label-default"><?php echo $notification_content;?></span></a>
                                                </li>
                                            <?php
                                        }
                                    }else{
                                        echo '<i>No New Notifications </i>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userController->get_user_display_name_by_id(get_user_uid()); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <li class="active">
                                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#post"><i class="fa fa-bullhorn"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="post" class="collapse">
                                    <li>
                                        <a href="add_post.php">Add Posts</a>
                                    </li>
                                    <li>
                                        <a href="posts.php">View Posts</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#hostel"><i class="fa fa-home"></i> Hostels <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="hostel" class="collapse">
                                    <li>
                                        <a href="add_lodges.php">Add lodges</a>
                                    </li>
                                    <li>
                                        <a href="hostels.php">View Lodges</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#store"><i class="fa fa-shopping-cart"></i> Store <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="store" class="collapse">
                                    <li>
                                        <a href="add_product.php">Sell Products</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITEURL; ?>/marketplace/">Place Order</a>
                                    </li>
                                    <!-- <li>
                                      <a href="cart.php">Cart</a>
                                    </li> -->
                                    <li>
                                        <a href="store.php">View Products</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#roommate"><i class="fa fa-user"></i> Roommate <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="roommate" class="collapse">
                                    <li>
                                        <a href="roommate.php">Find Roommate</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITEURL; ?>/roommates/">Available Roommates</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#groups"><i class="fa fa-users"></i> Groups <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="groups" class="collapse">
                                    <li>
                                        <a href="<?php echo SITEURL; ?>/groups/">Join a Group</a>
                                    </li>
                                    <li>
                                        <a href="group_member.php">Membership</a>
                                    </li>
                                    <li>
                                        <a href="create_group.php">Create a Group</a>
                                    </li>
                                    <li>
                                        <a href="groups.php">View Groups</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#events"><i class="fa fa-calendar"></i> Events <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="events" class="collapse">
                                    <li>
                                        <a href="view_event.php">View Events</a>
                                    </li>
                                    <li>
                                        <a href="create_event.php">Create Event</a>
                                    </li>
                                    <li>
                                        <a href="event_reminder.php">Reminders</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#demo"><i class="fa fa-inbox"></i> Messages <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="compose.php">Compose Message</a>
                                    </li>
                                    <li>
                                        <a href="inbox.php">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="sent_messages.php">Sent Messages</a>
                                    </li>
                                    <li>
                                        <a href="draft_messages.php">Draft</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#account"><i class="fa fa-user"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="account" class="collapse member-collapse" style="color:blue">
                                    <li>
                                        <a href="profile.php">Update Profile</a>
                                    </li>
                                    <li>
                                    </i><a href="profile.php#Changepassword">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="profile.php#Bankinformation">Bank Information</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                    <!-- /.navbar-collapse -->
                </div>
            </nav>
