<?php
require 'dashboard-header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Add a new Lodge<hr /></h2>
        </div>
        <div class="col-md-5">
            <form role="form">
                <div class="form-group">
                    <label for="">Title:</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label for="">Price:</label>
                    <input class="form-control" type="number" />
                </div>
                <div class="form-group">
                    <label for="" > Description: </label>
                    <textarea rows="5" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <label for="" > Address: </label>
                    <textarea class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <label for="">Choose Featured image: </label>
                    <input multiple type="file" class="form-control" />
                </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Category:</label>
                <select class="form-control">
                    <option value="">Select Categories </option>
                    <option value="">Scholarships</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select School</label>
                <select class="form-control">
                    <option value="">All School </option>
                    <option value="">Uniport</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select Models</label>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Self Contain</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Single Room</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Hostel</label>
                </div>

            </div>
            <div class="form-group">
                <label  for="">Select Facilities</label>
                <select multiple class="form-control">
                    <option value="">All School </option>
                    <option value="">Uniport</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Select Rules</label>
                <select multiple class="form-control">
                    <option value="">All School </option>
                    <option value="">Uniport</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button class="text-center btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- <?php require 'footer.php'; ?> -->
