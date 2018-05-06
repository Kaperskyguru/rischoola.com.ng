<?php
session_start();
ob_start();
require_once 'lib/cloudinary/src/Api.php';
require_once 'lib/cloudinary/src/Cloudinary.php';
require_once 'lib/cloudinary/src/Uploader.php';

require_once 'config.php';
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
require_once 'classes/controllers/mails.php';
require_once 'classes/controllers/notifications.php';
require_once 'classes/controllers/Images.php';

require_once "classes/models/news.php";
require_once "classes/models/lodge.php";
require_once "classes/models/roommate.php";
require_once "classes/models/user.php";
require_once "classes/models/event.php";
require_once "classes/models/group.php";
require_once "classes/models/message.php";
require_once "classes/models/marketplace.php";

require_once 'include/functions.php';


$newsControler = News::getInstance();
$lodgeController = Lodges::getInstance();
$roommateController = Roommates::getInstance();
$storeController = Marketplace::getInstance();
$groupController = Groups::getInstance();
$eventController = Events::getInstance();
$userController = Users::getInstance();
$scholarshipController = Scholarships::getInstance();
$resources = Resources::getInstance();
$commentController = Comments::getInstance();
$replyController = Replies::getInstance();
$schoolController = Schools::getInstance();
$messageController = Messages::getInstance();
$mailer = Mails::getInstance();
$notifier = Notifications::getInstance();

$newsModel = NewsModel::getInstance();
$lodgeModel = LodgeModel::getInstance();
$userModel = UserModel::getInstance();
$eventModel = EventModel::getInstance();
$groupModel = GroupModel::getInstance();
$messageModel = MessageModel::getInstance();
$storeModel = MarketplaceModel::getInstance();
$roommateModel = RoommateModel::getInstance();

