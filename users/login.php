<?php
require '../init.php';
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
	$userModel->set_user_user_name($_POST['username']);
	$userModel->set_user_password($_POST['password']);
	$userController->login($userModel);
	if($userController->is_authenticated()){
		//$_SESSION['user_uid'] = $userController->get_user_uid_by_user_user_name();
		header("Location: ../member/index.php");
		exit;
	}else{
		  //var_dump(password_verify($password, $hash_pass));
		//log message here
		$error_text = "Account Not Found";
	}
}

?>
	<div class="container pad-up-50">
		<div class="loginForm col-md-6 col-md-offset-3 pad-up-50 pad-bottom-50" >
			<?php display_error(); ?>
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="" style="border: 1px solid #ccc; padding: 20px;">
				<h1 style="color: #B70C01">Member Login</h1>
				 <div class="form-group">
				    <label for="username">Username</label>
				    <div class="input-group">
	      				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <div class="input-group">
	      				<div class="input-group-addon"><i class="fa fa-key"></i></div>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				    </div>
				  </div>

				  <button class="btn  btn-primary" style="margin-left: 2px;" style="color: #fff">login</button>
				  <div>
				  	<h4>Don't have an Account? <small><a href="register.php">Click here to Register</a></small></h4>
				  </div>
			</form>

		</div>

	</div>
<?php include 'footer.php'; ?>
