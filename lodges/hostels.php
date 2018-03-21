<?php
include '../init.php';
include 'header.php';

?>
<section id="hostel">
    <div class="container pad-up-50">
        <div class="row">
            <div class="searchHostel col-sm-3 margin-btom-20 pad-bottom-20">
                <div class="form-group">
                    <label for="school">Enter School</label>
                    <select class="form-control">
                        <option value="">RSUST</option>
                        <option value="">UNIPORT</option>
                        <option value="">IAUOE</option>
                        <option value="">RIVPOLY</option>
                        <option value="">RSPOLY</option>
                        <option value="">FCE</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-xs-6">
                        <label for="">Max Price</label>
                        <input type="text" class="form-control"></input>
                    </div>
                    <div class="col-xs-6">
                        <label for="">Min Price</label>
                        <input type="text" class="form-control"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="school">Hostel Name</label>
                    <input type="text" id="school" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="school">Hostel type</label>
                    <select class="form-control">
                        <option value="">Self Contain</option>
                        <option value="">Single Room</option>
                        <option value="">Flats</option>
                        <option value="">School hostel</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
                <br />
                <h5 class="side-header">Hostel Facilities </h5>
                <div class="checkbox-items">
                    <div class="checkbox">
                        <label><input type="checkbox">24/7 Power Supply</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Constant water</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Security</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Free Gym</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Tilled Floor</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Internet WiFi</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Cable TV</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Common Room</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Share Kitchen</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Nearby Carteen</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Air Condition</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Furnished Rooms</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Parking Space</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Nearby Worship Center</label>
                    </div>

                </div>
                <br />
                <h5 class="side-header">Hostel Rules </h5>
                <div class="checkbox-items">
                    <div class="checkbox">
                        <label><input type="checkbox">24/7 Power Supply</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Constant water</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Security</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" >Free Gym</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Tilled Floor</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox"><input type="checkbox" value="">Internet WiFi</label>
                    </div>
                </div>
                <div>
                </div>
            </div>


            <div class="col-sm-9">
                <h2>Available Hostels For Rent</h2>
                <div class="row">
                    <?php $lodgeController->display_availabe_lodges(12, "../"); ?>

                    <!--  Pagination starts here -->
                    <div class="col-lg-12 pagination text-center">
                        <ul class="pagination">
                            <li class="active"><a>1</a></li>
                            <li class=""><a href="#">2</a></li>
                            <li class=""><a href="#">3</a></li>
                            <li class=""><a href="#">4</a></li>
                            <li class=""><a href="#">5</a></li>
                            <li class=""><a href="#">6</a></li>
                            <li class=""><a href="#">7</a></li>
                            <li class=""><a href="#">8</a></li>
                            <li class=""><a href="#">9</a></li>
                            <li class=""><a href="#">10</a></li>
                            <li class=""><a href="#">11</a></li>
                            <li><a href="#">Next »</a></li>
                            <li class="last-child"><a href="#">last »»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
include 'footer.php';
