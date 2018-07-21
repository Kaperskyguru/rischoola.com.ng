<?php
require_once '../init.php';
require_once '../include/header.php';

$userController->cookie_login();
if ($userController->is_authenticated()) {
    header('Location: ../member');
}
$error = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['name']) && isset($_POST['last_name'])) {
		$name = $_POST['name']. " ". $_POST['last_name'];
		$userModel->set_user_name($name);
	}else {
		$error_text = "First name and last name are required";
		$error = 1;
	}
	if (isset($_POST['user_name'])) {
		if($userController->is_user_user_name_exist($_POST['user_name'])){
			$error_text = 'Username already taken';
			$error = 1;
		}else {
			$userModel->set_user_user_name($_POST['user_name']);
		}
	}else {
		$error_text = "Username is required";
		$error = 1;
	}
	if (isset($_POST['email'])) {
		if($userController->is_user_email_exist($_POST['email'])){
			$error_text = 'Email Address already in Use';
			$error = 1;
		}else {
			$userModel->set_user_email($_POST['email']);
		}
	}else {
		$error_text = "A valid Email address required";
		$error = 1;
	}

	if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
		if ($_POST['password'] === $_POST['confirm_password']) {
			$userModel->set_user_password($_POST['password']);
		}else {
			$error_text = "Password do not match";
			$error = 1;
		}
	}else {
		$error_text = "Password is required";
		$error = 1;
	}
	if (isset($_POST['school_id'])) {
		$userModel->set_user_school_id($_POST['school_id']);
	}else {
		$error_text = "School is required";
		$error = 1;
	}

	if (isset($_POST['phone_number'])) {
		$userModel->set_user_phone_number($_POST['phone_number']);
	}else {
		$error_text = "Phone Number is required";
		$error = 1;
	}
	if ($error !== 1) {
		$unique_id = generate_unique_id();
		$guest_id = $userController->add_temporary_user($userModel, $unique_id);
		if($guest_id !== 0){
			if($mailer->send_verification_mail($guest_id, $unique_id , $userModel->get_user_email())){
				$succes_text =  "Registered successfully, please verify your account";
			}
		}else {
			$error_text  = "Sorry, We could not register you, please try again";
			$error = 1;
		}
	}
}
?>
	<div class="container pad-up-50">
		<div class="col-md-8 col-md-offset-2 pad-up-50 pad-bottom-50" >

			<form class="" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" style="border: 1px solid #ccc; padding: 20px;">
				<h1 style="color: #B70C01">Create a <?php echo get_site_name() ?> Account</h1>
				<div>
					<?php display_error(); ?>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="name">First Name :</label>
						    <input type="text" required class="form-control" id="name" name="name" placeholder="First Name">

						</div>
						<div class="form-group">
						    <label for="school_id">School :</label>
								<select required class="form-control" name="school_id" id="school_id">
									<?php $schoolController->get_schools(); ?>
								</select>
						</div>
						<div class="form-group">
						    <label for="user_name">User Name :</label>
						    <input type="text" required class="form-control" name="user_name" id="user_name" placeholder="Username">

						</div>
						<div class="form-group">
						    <label for="password">Password :</label>
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password">

						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="last_name">Last Name :</label>
						   	<input type="text"  required name="last_name" class="form-control" id="last_name" placeholder="Last Name">

						</div>
						<div class="form-group">
						    <label for="phone_number">Mobile Number :</label>
						   	<input type="tel" required class="form-control" id="phone_number" name="phone_number" placeholder="phone number">

						</div>
						<div class="form-group">
						    <label for="email">Email Address :</label>

						    	<input type="email" required class="form-control" id="email" name="email" placeholder="Email">

						</div>
						<div class="form-group">
						    <label for="confirm_password">Confirm Password :</label>
						    	<input type="password" required class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
						</div>
					</div>
				</div>
				<button type="submit" class="btn  btn-primary" style="margin-left: 15px;">Create Account</button>
				<div>
				  	<h4>Already have an Account? <small><a href="login">Click here to Login</a></small></h4>
				</div>
			</form>

		</div>

	</div>
<?php require_once '../include/footer.php'; ?>
