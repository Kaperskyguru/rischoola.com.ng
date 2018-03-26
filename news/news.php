<?php
include '../init.php';

$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}
?>

?>
<section id="index-news">
    <div class="container pad-up-50">
        <h2>News Updates <span style="float: right;"><button class="btn btn-primary">post news</button></span></h2>
        <div class="col-md-4">
          <div class="container-fluid">
          <section class="index-scholarships">
            <div>
                <h3>Latest News </h3>
            </div>
            <?php echo $newsControler->get_last_inserted_post($resources->get_image_url(1), ""); ?>
            <div class="col-md-12" id="displayNews">
                 <!-- News will display here -->
            </div>
          </section>
          </div>
          <hr />
            <!--  Pagination starts here -->
            <div class="margin-btom-20">
                <ul class="pager">
                    <li class="previous"><a> Previous </a></li>
                    <li class="next"><a href="#">Next</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-5">
          <div class="container-fluid">
            <section class="index-scholarships">
              <div class="row">
              <h3>Available Scholarships/Internships</h3>
                <?php $scholarshipController->display_latest_scholarship(9, "../"); ?>
              </div>
            </section>
          </div>
         <hr />
          <!--  Pagination starts here -->
          <div class="margin-btom-20">
              <ul class="pager">
                  <li class="previous"><a> Previous </a></li>
                  <li class="next"><a href="#">Next</a></li>
              </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="row">
            <?php require '../include/tabs.php'; ?>
          </div>
          <div class="col-sm-12">
              <div class="pad-bottom-20">
                  <img src="../res/imgs/8722.gif" class="img-responsive">
              </div>
              <div class="pad-bottom-20">
                  <img src="../res/imgs/p.gif" class="img-responsive">
              </div>
              <div class="pad-bottom-20">
                  <img src="../res/imgs/m.png" class="img-responsive">
              </div>
              <div class="pad-bottom-20">
                  <img src="../res/imgs/m.png" class="img-responsive">
              </div>
          </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
