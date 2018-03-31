<?php
session_start();
ob_start();
require 'classes/controllers/dbmodel.php';
require_once "classes/controllers/news.php";
require_once "classes/controllers/lodges.php";
require_once "classes/controllers/roommates.php";
require_once "classes/controllers/marketplace.php";
require_once "classes/controllers/groups.php";
require_once "classes/controllers/events.php";
require_once "classes/controllers/scholarships.php";
require_once 'classes/controllers/users.php';
require_once 'classes/controllers/resources.php';
require_once 'classes/controllers/comments.php';
require_once 'classes/controllers/replies.php';
require_once 'classes/controllers/schools.php';
require_once 'classes/controllers/messages.php';

require_once "classes/models/news.php";
require_once "classes/models/lodge.php";
require_once "classes/models/roommate.php";
require_once "classes/models/user.php";
require_once "classes/models/event.php";
require_once "classes/models/group.php";
require_once "classes/models/message.php";

require_once 'include/functions.php';

$newsControler = new News();
$lodgeController = new Lodges();
$roommateController = new Roommates();
$storeController = new Marketplace();
$groupController = new Groups();
$eventController = new Events();
$userController = new Users();
$scholarshipController = new Scholarships();
$resources = new Resources();
$commentController = new Comments();
$replyController = new Replies();
$schoolController = new Schools();
$messageController = new Messages();

$newsModel = new NewsModel();
$lodgeModel = new LodgeModel();
$userModel = new UserModel();
$eventModel = new EventModel();
$groupModel = new GroupModel();
$messageModel = new MessageModel();
