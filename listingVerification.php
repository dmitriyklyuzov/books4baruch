<?php
	session_start();
	include_once 'view/parts/head.part.php';
	include_once 'view/parts/navbar.part.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Great!'); ?>
	</head>
	<body>

		<?php getNavbar(); ?>
		<div class="container">
			<div class="jumbotron text-center">
				<h1>Success!</h1>
				<p>You just listed a book!</p>
				<br>
				<form action="mylistings.php" method="GET">
					<input type="submit" class="btn btn-primary btn-lg" value="My listings">
				</form>
			</div>
		</div>
	</body>
</html>
