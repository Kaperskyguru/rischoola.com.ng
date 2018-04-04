<?php include 'dashboard-header.php' ?>
<style>
    h3{
        color: grey;
    }
</style>
<div id="page">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 style="color:red" class="page-header">
                    Hello, <?php echo $userController->get_user_username_by_id(get_user_uid()); ?>
                </h2>
            </div>
        </div>

        <div class="margin-btom-20">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#UpdateProfile">Update Profile</a></li>
                <li><a data-toggle="tab" href="#Changepassword">Change password</a></li>
                <li><a data-toggle="tab" href="#Bankinformation">Bank information</a></li>
            </ul>
            <div class="tab-content">
                <div id="UpdateProfile" class="tab-pane fade in active">
                    <br />
                    <div class="col-md-6">
                        <form role="form" >
                            <h3>Profile Picture</h3>
                            <div class="form-group">
                                <input type="file" >
                                <hr />
                            </div>

                            <h3>Personal Information</h3>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label>First Name: </label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-xs-6">
                                    <label> Last Name: </label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label>Display Name: </label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-xs-6">
                                    <label>Phone Number: </label>
                                    <input type="number" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label>Gender: </label>
                                    <select class="form-control">
                                        <option value="0" disabled>select your gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label>Birthday: </label>
                                    <input type="date" class="form-control" />
                                </div>
                            </div>

                            <h3> Login Information</h3>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label>Email Address: </label>
                                    <input type="email" class="form-control" />
                                </div>
                                <div class="col-xs-6">
                                    <label>User Name: </label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>


                    </div>
                    <h3>School Information</h3>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>School: </label>
                                <select class="form-control">
                                    <?php $schoolController->get_schools() ?>
                                </select>
                            </div>

                            <div class="col-xs-6">
                                <label>Level: </label>
                                <select class="form-control">
                                    <?php $schoolController->get_schools() ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Course of Study: </label>
                            <input type="text" class="form-control" />
                        </div>
                        <h3>About Me</h3>
                        <div class="form-group">
                            <label>Address: </label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>About You: </label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="text-center btn btn-danger btn-lg" type="submit">Update Profile</button>
                        </div>
                    </div>
                    </form>

                </div>
                <div id="Changepassword" class="tab-pane fade">
                    <h3>Change Password</h3>
                    <div class="container-fluid">
                        <div class="col-md-6">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Old Password: </label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3"> New Password: </label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Confirm Password: </label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="password" class="btn btn-primary" >Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div id="Bankinformation" class="tab-pane fade">
                  <h3>Bank Information</h3>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Bank:</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Account Name:</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Account Number:</label>
                      <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <a class="btn btn-danger" href="read-news.php">Submit</a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</body>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
