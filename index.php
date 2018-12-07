<?php
require_once 'init.php';
echo set_title();
$userController->cookie_login();
if ($userController->is_authenticated()) {
    require_once 'include/member_header.php';
} else {
    require_once 'include/header.php';
}
?>

<section id="top-input">
    <?php require_once 'include/searchBar.php'; ?>
</section>
<div class="wrapper">
    <section id="index-news">
        <div class="container">
            <h2>Latest Updates</h2>

            <div class="row" style="background-color:#ffffff; border-radius:10px; padding:10px">
                <div class="margin-btom-20">
                    <div class="col-md-4">
                        <div>
                            <h3>Latest News</h3>
                        </div>
                        <?php echo $newsControler->get_last_inserted_post($resources); ?>
                        <div class="col-md-12" id="displayNews">
                            <?php $newsControler->display_latest_post(9); ?>
                        </div>
                        <div>
                            <a href="news/" class="btn btn-success" style="margin-bottom: 10px;">See more latest news</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <section class="index-scholarships">
                            <?php require_once 'include/listofScholarships.php'; ?>
                        </section>
                        <div>
                            <a href="news/" class="btn btn-success" style="margin-bottom: 10px;">See more latest scholarship/internship</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <?php //require_once 'include/tabs.php'; ?>
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
</div>

<?php require_once 'include/footer.php'; ?>
