
<!-- update this file Few changes were made-->

<!DOCTYPE html>
<html>
<head>
    <title><?php echo get_site_name(); ?>|</title>

    <link rel="stylesheet" type="text/css" href="<?php echo SITEURL ?>/res/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITEURL ?>/res/css/style.css">
    <link rel="stylesheet" href="<?php echo SITEURL ?>/res/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL ?>/res/css/font-awesome/css/font-awesome.css">

</head>
<body>

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
      <a class="logo_marg" href="<?php echo SITEURL ?>"><img src="<?php echo SITEURL ?>/res/imgs/brand.fw.png" class="img-responsive" ></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse top-nav" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left">
        <div class="input-group">
            <input type="text" id="search_input" url = "<?php echo SITEURL; ?>" class="form-control" placeholder="Search">
            <div class="input-group-btn">
                <a href="#" disabled id="search_btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
      </form>
      <ul class="nav navbar-nav" >
        <li><a href="<?php echo SITEURL ?>" >Home<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo SITEURL ?>/posts/">Latest News</a></li>
        <li><a href="<?php echo SITEURL ?>/lodges">Hostels</a></li>
                <li><a href="<?php echo SITEURL ?>/roommates">Roommate Finder</a></li>
        <!-- <li><a href="scholarships/scholarships.php">Scholarships</a></li> -->
        <li><a href="<?php echo SITEURL ?>/marketplace">Store</a></li>
        <li><a href="<?php echo SITEURL ?>/groups">Groups</a></li>
        <li><a href="<?php echo SITEURL ?>/events">Events</a></li>
        <hr>
        <li class="visible-xs"><a href="<?php echo SITEURL ?>/users/register">Sign Up</a></li>
        <li class="visible-xs"><a href="<?php echo SITEURL ?>/users/login">Login</a></li>
      </ul>

      <ul class="nav nav-drop navbar-right hidden-xs">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo SITEURL ?>/users/register">Sign Up</a></li>
            <li><a href="<?php echo SITEURL ?>/users/login">Login</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>