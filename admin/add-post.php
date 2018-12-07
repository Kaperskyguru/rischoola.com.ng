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
            <h1>Add Post</h1>
            <small>Post list</small>
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
                            <a class="btn btn-add " href="all-Posts.html">
                                <i class="fa fa-list"></i> Post List </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Post Description</label>
                                    <textarea class="form-control" rows="20" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Featured image upload</label>
                                    <input type="file" name="picture">
                                    <input type="hidden" name="old_picture">
                                </div>
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control">
                                        <option>Silver ₦2,000</option>
                                        <option>Gold ₦20,000</option>
                                        <option>Premium ₦50,000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select School</label>
                                    <select class="form-control">
                                        <option>Silver ₦2,000</option>
                                        <option>Gold ₦20,000</option>
                                        <option>Premium ₦50,000</option>
                                    </select>
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
    <?php require_once 'footer.php';
