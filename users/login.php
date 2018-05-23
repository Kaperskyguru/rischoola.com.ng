<?php
require_once '../init.php';
require_once '../include/header.php';


// MY VERIFICATION EMAIL LINK LOOKS LIKE THIS:
// http://localhost/old_rsschools.ng/users/login.php?guestid=1&uniqueid=ilove222god

if(isset($_GET['guestid']) && $_GET['uniqueid']){
	$guest_id = $_GET['guestid'];
	$unique_id = $_GET['uniqueid'];

	// sanitize strings

	if(isset($unique_id) && isset($guest_id)){
			if($userController->is_temporary_user_exist($guest_id, $unique_id)){
					if($userController->move_guest_to_member($userModel, $guest_id, $unique_id)){
						$succes_text = "Account Verify successfuly, Please Login";
					}else{
							$error_text = "sorry, we could not activate your account, Click on the link again";
					}
				}
			// }else {
			// 	$error_text = 'Account not found';
			// }
	}
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
	$userModel->set_user_user_name($_POST['username']);
	$userModel->set_user_password($_POST['password']);
	$userController->login($userModel);
	if($userController->is_authenticated()){
		header("Location: ../member/index.php");
		exit;
	}else{
		//log message here
		$error_text = "Username/Password combination not correct";
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
						<a href="#" style="float:right; color:#0366d6" for="password">Forgot Password?</a>
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
<?php require_once '../include/footer.php'; ?>
