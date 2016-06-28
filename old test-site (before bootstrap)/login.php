<?php

session_start();

$_SERVER['pageName']="LOG IN";

include 'controller/redirectIfLoggedIn.php';
redirectIfLoggedIn();

?>

<html>
<head>
	<script src="controller/checkEmail.js"></script>
	<script src="controller/checkEmail2.js"></script>
	<!-- <script src="controller/checkEmail2.js"></script> -->
	<?php include 'head.php' ?>
	<title>Log in or register</title>
</head>
<body>
	<?php include 'controller/navigationBar.php';?>
</br>
	<div class="container">
		<div class="auto-style1">

			<h3>Books4Baruch</h3>
			
			<div id="login_form_div">
				<form class="login_form" id="login_form" action="controller/dataconnect_login.php" method="POST">
					<p id="welcome_msg"></br></p>
					<input type="email" name="inputEmail" onchange="checkEmail(this.value, 'false')" placeholder="Baruch email address" required="" autofocus=""></br>
					</br>
					<input type="password" name="inputPassword" placeholder="Your password" required=""></br>
					</br>
					<input type="submit" name="Submit" value="LOG IN">
				</form>
			</div>
		</div>
	</div>
</body>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
</html>

<?php
if (isset($_SESSION['error'])){
	if ($_SESSION['error']!=''){
			echo $_SESSION['error'];
			$_SESSION['error']='';
	}
}
?>