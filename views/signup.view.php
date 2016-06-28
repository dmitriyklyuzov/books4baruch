<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php getHead('Sign up');?>
	</head>

	<body>
		<?php getNavbar(); ?>
		</br>
		<h3 class="text-center">Join Books4Baruch</h3>
		<br>
		<div class="container login-form-container well">	
			<form class="login_form" id="register_form" autocomplete="on" action="controller/dataconnect_register.php" method="POST">
				
				<div class="form-group text-center">
					<input name="signUpEmail" class="form-control input-lg" type="email" placeholder="Baruch email address" required>
				</div>

				<div class="form-group text-center">
					<input name="firstName" class="form-control input-lg" type="text" placeholder="First name" required>
				</div>

				<div class="form-group text-center">
					<input name="lastName" class="form-control input-lg" type="text" placeholder="Last name (optional)">
				</div>

				<div class="form-group text-center">
					<input name="phoneNumber" class="form-control input-lg" type="tel" placeholder="Phone number (optional)">
				</div>

				<div class="form-group text-center">
					<input name="inputPassword" class="form-control input-lg" type="password" placeholder="Your password" >
				</div>

				<div class="form-group text-center">
					<input name="inputPassword2" id="inputPassword" class="form-control input-lg" type="password" placeholder="Confirm password">
				</div>

				<br>

				<div class="form-group text-center">
					<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Sign up">
				</div>

			</form>
		</div> <!-- container -->
	</body>
</html>