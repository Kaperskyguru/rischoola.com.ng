<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo get_site_name(); ?>|</title>

        <link rel="stylesheet" type="text/css" href="../res/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../res/css/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../res/css/style.css">
        <link rel="stylesheet" href="../res/css/responsive.css">

        <!-- Bootstrap Core CSS -->
        <link href="../res/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../res/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../res/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../res/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top top-nav" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo_marg" href="../index.php"><img src="../res/imgs/brand.fw.png" class="img-responsive"></a>
                </div>
                <div class="collapse navbar-collapse top-nav" id="bs-example-navbar-collapse-1">
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
                    <ul class="nav navbar-nav">
                        <li ><a href="../index.php" class="active">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="../news/news.php">Latest News</a></li>
                        <li><a href="../lodges/hostels.php">Hostel</a></li>
                        <!-- <li><a href="../scholarships.php">Scholarships</a></li> -->
                        <li><a href="../marketplace/store.php">Store</a></li>
                        <li><a href="roommate.php">Roommate Finder</a></li>
                        <li><a href="../groups/groups.php">Groups</a></li>
                        <li><a href="../events/events.php">Events</a></li>
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
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo timeAgo($message_date_created); ?> </p>
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
                                $stmt = $notifier->get_notifications_by_user_id(get_user_uid());?>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userController->get_user_display_name_by_id($_SESSION['user_id']); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../member/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="../member/"><i class="fa fa-fw fa-user"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="../member/inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="../users/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
