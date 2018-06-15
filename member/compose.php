<?php include 'dashboard-header.php';

if(isset($_GET['user_user_name'])){
    // Sanitize data
    $username = $_GET['user_user_name'];
}else{
    $username = null;
}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Messages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-desktop"></i> compose Messages
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Compose Message</h2>
            </div>
        </div>
        <div>
            <form>
                <div class="form-group">
                    <label for="receiver">Enter Receiver Name</label>
                    <input type="text" value="<?php echo $username = (!is_null($username))? $username : '';?>" name="receiver" id="receiver" class="form-control">
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <input name="subject" id="subject" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group" style="padding-top: 20px;">
                    <button type="button" id="send_message" name="send_message" class="btn btn-lg btn-success">Send Message</button>
                    <button type="button" id="save_draft" name="save_draft" class="btn btn-lg btn-danger">Save Draft</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('footer.php');