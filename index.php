<?php
require 'init.php';
require 'include/header.php';

$userController->cookie_login();
if($userController->is_authenticated()){
  header("Location: member/index.php");
  exit;
}
?>

<section id="top-input">
    <?php require_once 'include/searchBar.php'; ?>
</section>

<section id="index-news">
    <div class="container">
        <h2>Latest Updates</h2>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h3>Latest News</h3>
                </div>
                <?php echo $newsControler->get_last_inserted_post("res/imgs/1.jpg", "news/"); ?>
                <div class="col-md-12" id="displayNews">
                    <?php $newsControler->display_latest_news(9, "news/"); ?>
                </div>
                <div>
                    <a href="news/news.php"class="btn btn-success">See more latest news</a>
                </div>
            </div>
            <div class="col-md-5">
                <section class="index-scholarships">
                    <?php require_once 'include/listOfScholarships.php'; ?>
                </section>
                <div>
                    <a href="news/news.php"class="btn btn-success">See more latest scholarship/internship</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                  <?php require 'include/tabs.php'; ?>
                  <div class="col-sm-12">
                      <div class="pad-bottom-20">
                          <img src="res/imgs/8722.gif" class="img-responsive">
                      </div>
                      <div class="pad-bottom-20">
                          <img src="res/imgs/p.gif" class="img-responsive">
                      </div>
                      <div class="pad-bottom-20">
                          <img src="res/imgs/m.png" class="img-responsive">
                      </div>
                      <div class="pad-bottom-20">
                          <img src="res/imgs/s.png" class="img-responsive">
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="index-hostel">
    <?php require_once 'include/listOfHostels.php'; ?>
</section>

<section id="index-roommate">
    <?php require_once 'include/listOfRoomates.php'; ?>
</section>

<section id="index-store">
    <?php require_once 'include/listOfStoreItems.php'; ?>
</section>

<!--
<section id="index-groups">
<?php //require_once 'include/listOfGroups.php'; ?>
</section>
-->

<section id="index-event">
    <?php require_once 'include/listOfEvents.php'; ?>
</section>

<?php include 'include/footer.php'; ?>
