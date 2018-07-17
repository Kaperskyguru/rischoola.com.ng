<?php
session_start();
ob_start();

require_once __DIR__.'/vendor/autoload.php';

require_once 'config.php';



require_once "classes/models/NewsModel.php";
require_once "classes/models/LodgeModel.php";
require_once "classes/models/RoommateModel.php";
require_once "classes/models/UserModel.php";
require_once "classes/models/EventModel.php";
require_once "classes/models/GroupModel.php";
require_once "classes/models/MessageModel.php";
require_once "classes/models/MarketplaceModel.php";
require_once "classes/models/Notification.php";

 // Autoload Core Models
//  spl_autoload_register(function($className)
//  {
//      require_once 'classes/models/'.$className.'.php';
//  });

require_once 'include/functions.php';

require_once 'classes/bootstrap.php';

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
$logger = Logger::getInstance();
$paging = Pagination::getInstance();

$newsModel = NewsModel::getInstance();
$lodgeModel = LodgeModel::getInstance();
$userModel = UserModel::getInstance();
$eventModel = EventModel::getInstance();
$groupModel = GroupModel::getInstance();
$messageModel = MessageModel::getInstance();
$storeModel = MarketplaceModel::getInstance();
$roommateModel = RoommateModel::getInstance();
$notifyModel = Notification::getInstance();
