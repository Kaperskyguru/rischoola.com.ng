<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" style="position: absolute; z-index: 0; background-image: none;" role="listbox">

        <div class="item active">
            <img class="first-slide" src="res/imgs/hb1.jpg" alt="First slide">
        </div>

        <div class="item">
            <img class="second-slide" src="res/imgs/banner1_0.jpg" alt="Second slide">
        </div>

        <div class="item">
            <img class="third-slide" src="res/imgs/banner2.png" alt="Third slide">
        </div>
    </div>
</div>
<<<<<<< HEAD
<div id="myCarouselOverlay"></div>
=======
<div id="overlay"></div>
>>>>>>> e100d64716b8ceb69450ae0ae84f01cf01e12533
<div class="container">
    <div class="carousel-caption">
        <div class="text-center">
            <h1 class="site-slogan white-text hidden-xs">Schooling in Rivers State just got easier</h1>
            <h5 class="red-text  hidden-xs">Select a school and get latest information.</h5>
            <h5 class="site-slogan white-text visible-xs">Schooling in Rivers State just got easier</h5>
        </div>
        <div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <select class="form-control" id="school_type">
                        <option disabled="ture" selected="">Select School Category</option>
                        <option value=1>University</option>
                        <option value=2>Polytecnic</option>
                        <option value=3>Colledges</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <select class="form-control" id="list_of_schools">
                        <option disabled="true" selected="">Select a school from here to get latest
                            information</option>
                        <?php $schoolController->get_schools();?>
                    </select>

                </div>
                <div class="col-sm-2 form-group">
                    <button class="btn btn-success form-control">Go to Page</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
