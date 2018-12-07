<?php
require_once 'head.php';
require_once 'header.php';
require_once 'sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Add Hostel</h1>
            <small>Hostel list</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="all-Hostels.html">
                                <i class="fa fa-list"></i> Hostel List </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6">
                                <div class="form-group">
                                    <label>Lodge Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Lodge Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" placeholder="Enter lodge price" required>
                                </div>
                                <div class="form-group">
                                    <label>Lodge Description</label>
                                    <textarea class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact Mobile</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile" required>
                                </div>
                                <div class="form-group">
                                    <label>featured image upload</label>
                                    <input type="file" name="picture">
                                    <input type="hidden" name="old_picture">
                                </div>
                                <div class="form-group">
                                    <label>image upload</label>
                                    <input type="file" name="picture">
                                    <input type="hidden" name="old_picture">
                                </div>
                                <div class="form-group">
                                    <label>image upload</label>
                                    <input type="file" name="picture">
                                    <input type="hidden" name="old_picture">
                                </div>
                                <div class="form-group">
                                    <label>image upload</label>
                                    <input type="file" name="picture">
                                    <input type="hidden" name="old_picture">
                                </div>
                                <div class="form-group">
                                    <label>Select School</label>
                                    <select class="form-control">
                                        <option>Silver ₦2,000</option>
                                        <option>Gold ₦20,000</option>
                                        <option>Premium ₦50,000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Models</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" checked="checked">Self Contain</label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0" >Single Room</label>
                                        <label class="radio-inline"><input type="radio" name="status" value="0" >Hostel</label>
                                    </div>
                                    <div class="form-group">
                                        <label  for="lodge_facilities">Select/Insert Facilities</label>
                                        <input class="form-control" list="facility" id="lodge_facilities" placeholder="Type to add a new Facility" name="lodge_facilities" />
                                        <datalist id="facility">

                                        </datalist>
                                    </div>

                                    <div class="form-group">
                                        <label for="lodge_rules">Select/Insert Rules</label>
                                        <input class="form-control" id="lodge_rules" list="rules" placeholder="Type to add a new Rule" name="lodge_rules" />
                                        <datalist id="rules">

                                        </datalist>
                                    </div>
                                    <div class="reset-button">
                                        <a href="#" class="btn btn-warning">Reset</a>
                                        <a href="#" class="btn btn-success">Save</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once 'footer.php';
