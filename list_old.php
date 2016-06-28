<?php
session_start();

include 'controller/redirectIfNotLoggedIn.php';
include_once 'view/parts/head.part.php';
include_once 'view/parts/navbar.part.php';

$pageUrl = str_replace("/", "", $_SERVER["REQUEST_URI"]);

redirectIfNotLoggedIn($pageUrl);

include 'controller/generateListingForm.php';

$_SERVER['pageName']="ADD LISTING";

?>
<html>
<head>
	<?php getHead('Add listing');?>
	<script src="controller/checkISBN.js"></script>
</head>
<body>
	<?php getNavbar();?>

	<br>

	<h3 class="text-center">Enter the ISBN number</h3>

	<br>

	<div class="container login-form-container well">

		<form id="register_form" action="controller/dataconnect_register.php" method="POST">
			<div class="form-group text-center">
				<input name="signUpEmail" class="form-control input-lg" type="email" placeholder="Baruch email address" required>
			</div>
		</form>
	</div>
      
</body>
</html>