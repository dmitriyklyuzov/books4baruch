<?php

session_start();

$fromUrl='/test-site/index.php';
$email="";

$autofocusEmail=" autofocus";
$autofocusPassword="";

if(isset($_GET['from'])){
	$fromUrl=$_GET['from'];
}

if(isset($_GET['email'])){
	$email=$_GET['email'];
}

if($email!=''){
	$autofocusPassword=" autofocus";
}

include 'controller/redirectIfLoggedIn.php';
redirectIfLoggedIn();

?>

<html>
<head>
	<?php include 'head.php' ?>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/login-form-validation.js"></script>
	<title>Log in</title>
	<style>
		.error{
			/*display: inline;
			margin-left: 5px;*/
		}
	</style>
</head>
<body>
	<?php include 'controller/navigationBar.php';?>
</br>
</br>
	<div class="container">
		<div class="auto-style1">

			<h3>Log in to Books4Baruch</h3>
			
			</br>

			<div id="login_form_div">

				<form class="login_form" id="login_form" autocomplete="on" action="controller/dataconnect_login.php" method="POST">
					<input type="email" autocomplete="on" <?php echo $autofocusEmail; ?> name="inputEmail" value="<?php echo $email; ?>" placeholder="Baruch email address" autofocus="">
					</br>
					</br>
					<input type="password" autocomplete="on" <?php echo $autofocusPassword; ?> name="inputPassword" placeholder="Password" required></br>
					</br>
					<input type="hidden" name="redirectedFrom" value='<?php echo $fromUrl; ?>'>
					<input id="submit-button" type="submit" name="Submit" value="Log in">
				</form>

			</div>
		</div>
	</div>
</body>


 <!-- onchange="checkEmail(this.value, 'false')" -->

<!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
 -->
</html>