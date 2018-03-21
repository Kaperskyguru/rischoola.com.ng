<?php
require '../init.php';
include 'header.php';
?>
<section id="roommate">
    <div class="container pad-up-50">
        <div class="row">
            <h2>Roommate In Need</h2>
            <?php $roommateController->display_availabe_roommates(12, "../"); ?>

            <!--  Pagination starts here -->
            <div class="margin-btom-20 pagination">
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
                    <li class="last-child"><a href="#">last</a></li>
                </ul>
            </div>

            <div class="pad-bottom-20">
                <form>
                    <div class="form-group">
                        <label>Enter House Address And Description : </label>
                        <textarea class="form-control" placeholder="enter house address and description">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone : </label>
                        <input type="number" class="form-control"  placeholder="Your Phone Number">
                    </div>
                    <button  class="btn btn-success">Post To Get Roommate</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
