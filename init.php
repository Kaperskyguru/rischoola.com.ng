<?php
session_start();
require 'classes/controllers/dbmodel.php';
require_once "classes/controllers/news.php";
require_once "classes/controllers/lodges.php";
require_once "classes/controllers/roommates.php";
require_once "classes/controllers/marketplace.php";
require_once "classes/controllers/groups.php";
require_once "classes/controllers/events.php";
require_once "classes/controllers/scholarships.php";
require_once 'classes/controllers/users.php';

require_once "classes/models/news.php";
require_once "classes/models/lodge.php";
require_once "classes/models/roommate.php";
require_once "classes/models/user.php";

require_once 'include/functions.php';

$newsControler = new News();
$lodgeController = new Lodges();
$roommateController = new Roommates();
$storeController = new Marketplace();
$groupController = new Groups();
$eventController = new Events();
$userController = new Users();
$scholarshipController = new Scholarships();

$newsModel = new NewsModel();
$lodgeModel = new LodgeModel();
$userModel = new UserModel();
