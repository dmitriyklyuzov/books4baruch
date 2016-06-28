<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php getHead('Log in');?>
	</head>

	<body>

		<?php getNavbar(); ?>

		<br>

		<h3 class="text-center">Log in</h3>
 			
 		<br>
	
		<div class="container login-form-container well">

			<form id="login_form" autocomplete="on" action="controller/dataconnect_login.php" method="POST" class="login_form">
				
				<div class="form-group text-center">
					<input class="form-control input-lg" type="email" autocomplete="on" <?php echo $autofocusEmail; ?> name="inputEmail" value="<?php echo $email; ?>" placeholder="Baruch email address" autofocus="">
				</div>
				
				<div class="form-group text-center">
					<input class="form-control input-lg"	type="password" autocomplete="on" <?php echo $autofocusPassword; ?> name="inputPassword" placeholder="Password" required>
				</div>
				
					<input type="hidden" name="redirectedFrom" value='<?php echo $fromUrl; ?>'>

				
				<div class="form-group text-center">
					<input class="btn btn-primary btn-lg" type="submit" name="Submit" value="Log in">
				</div>
			</form>
		</div> <!-- container -->
	</body>
</html>