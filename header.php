<!DOCTYPE html>
<html>
<head>
	<title>Kerpersky</title>

    <link rel="stylesheet" type="text/css" href="res/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link rel="stylesheet" href="res/css/responsive.css">
		<link rel="stylesheet" type="text/css" href="res/css/font-awesome/css/font-awesome.css">

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
      <a class="navbar-brand" href="index.php">River Schools</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
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
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="news/news.php">Latest News</a></li>
        <li><a href="lodges/hostels.php">Hostels</a></li>
				<li><a href="roommates/roommate.php">Roommate Finder</a></li>
        <!-- <li><a href="scholarships/scholarships.php">Scholarships</a></li> -->
        <li><a href="marketplace/store.php">Store</a></li>
        <li><a href="groups/groups.php">Groups</a></li>
        <li><a href="events/events.php">Events</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="users/register.php">Sign Up</a></li>
            <li><a href="users/login.php">Login</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
