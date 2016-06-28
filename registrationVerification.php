<?php
	include_once 'view/parts/head.part.php';
	include_once 'view/parts/navbar.part.php';
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
		
		getHead('Welcome!');
		
		$email="";
		if(isset($_GET['email'])){
		$email=$_GET['email'];
	}

	?>    
	</head>
	<body>
	<?php getNavbar(); ?>
	
	<div class="container">
		<div class="jumbotron text-center">
			<h1>Welcome!</h1>
			<p>Thank you for signing up!</p>
			<br>
			<form action="login.php?" method="GET">
				<input type="submit" class="btn btn-primary btn-lg" value="Back to Login">
				<input type="text" name="email" id="email" style="display: none;" value=<?php echo $email; ?>>
			</form>
		</div>
	</div>
	
	</body>
</html>
