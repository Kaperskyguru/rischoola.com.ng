<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- <link href="../res/css/style.css" rel="stylesheet"> -->

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <a class="navbar-brand" href="../index.php">Home</a>
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
                            <li ><a href="../index.php" class="active">Home<span class="sr-only">(current)</span></a></li>
                            <li><a href="../news/news.php">Latest News</a></li>
                            <li><a href="../lodges/hostels.php">Hostel</a></li>
                            <!-- <li><a href="../scholarships.php">Scholarships</a></li> -->
                            <li><a href="../marketplace/store.php">Store</a></li>
                            <li><a href="../roommates/roommate.php">Roommate Finder</a></li>
                            <li><a href="../groups/groups.php">Groups</a></li>
                            <li><a href="../events/events.php">Events</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                                <ul class="dropdown-menu message-dropdown">
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong><?php echo $userController->get_user_display_name_by_id($_SESSION['user_id']); ?></strong>
                                                    </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong>Don Iyke</strong>
                                                    </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong>John Smith</strong>
                                                    </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                                <ul class="dropdown-menu alert-dropdown">
                                    <li>
                                        <a href="#"> <span class="label label-default">uche sent u a message</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-primary">uche sent u a message</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-success">uche sent u a message</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> <span class="label label-info">uche sent u a message</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-warning">uche sent u a message</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-danger">uche sent u a message</span></a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userController->get_user_display_name_by_id($_SESSION['user_id']); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-bullhorn"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#hostel"><i class="fa fa-home"></i> Hostels <i class="fa fa-fw fa-caret-down"></i></a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#store"><i class="fa fa-shopping-cart"></i> Store <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="store" class="collapse">
                                    <li>
                                        <a href="compose.php">Sell Products</a>
                                    </li>
                                    <li>
                                        <a href="../marketplace/store.php">Place Order</a>
                                    </li>
                                    <li>
                                        <a href="store.php">View Orders</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#roommate"><i class="fa fa-user"></i> Roommate <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="roommate" class="collapse">
                                    <li>
                                        <a href="roommate.php">Find Roommate</a>
                                    </li>
                                    <li>
                                        <a href="../roommates/roommate.php">Available Roommates</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#groups"><i class="fa fa-users"></i> Groups <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="groups" class="collapse">
                                    <li>
                                        <a href="../groups/groups.php">Join a Group</a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#events"><i class="fa fa-calendar"></i> Events <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="events" class="collapse">
                                    <li>
                                        <a href="view_event.php">View Events</a>
                                    </li>
                                    <li>
                                        <a href="create_event.php">Create Event</a>
                                    </li>
                                    <li>
                                        <a href="event_reminder.php">Remainders</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-inbox"></i> Messages <i class="fa fa-fw fa-caret-down"></i></a>
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
                                <a href="javascript:;" data-toggle="collapse" data-target="#account"><i class="fa fa-user"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="account" class="collapse">
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
