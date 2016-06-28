<?php

session_start();

$fromUrl='/test-site/index.php';
$email="";

$autofocusEmail=" autofocus";
$autofocusFirstName="";

if(isset($_GET['from'])){
	$fromUrl=$_GET['from'];
}

if(isset($_GET['email'])){
	$email=$_GET['email'];
}

if($email!=''){
	$autofocusFirstName=" autofocus";
}

include 'controller/redirectIfLoggedIn.php';
redirectIfLoggedIn();

?>

<html>
<head>
	<?php include 'head.php' ?>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/login-form-validation.js"></script>
	<title>Sign up</title>
</head>
<body>
	<?php include 'controller/navigationBar.php';?>
</br>
</br>
	<div class="container">
		<div class="auto-style1">

			<h3>Join Books4Baruch today!</h3>

			</br>
			
			<div id="login_form_div">
				
				<form class='login_form' id='register_form' action='controller/dataconnect_register.php' method='POST'>
					
					<input type='email' name='signUpEmail' <?php echo $autofocusEmail; ?> value="<?php echo $email; ?>" placeholder='Baruch email address'>
					</br>
					</br>
					<input type='text' name='firstName' <?php echo $autofocusFirstName; ?> placeholder='First name'>
					</br>
					</br>
					<input type='text' name='lastName' placeholder='Last name (optional)'>
					</br>
					</br>
					<input type='tel' name='phoneNumber' placeholder='Phone number (optional)'>
					</br>
					</br>
					<input type='password' name='inputPassword' id="inputPassword" placeholder='Your password' >
					</br>
					</br>
					<input type='password' name='inputPassword2' placeholder='Confirm password' >
					</br>
					</br>
					<input type='submit' name='Submit' value='Sign up'>
				</form>
			</div>
		</div>
	</div>
</body>


 <!-- onchange="checkEmail(this.value, 'false')" -->

<!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
 -->
</html>

<?php
if (isset($_SESSION['error'])){
	if ($_SESSION['error']!=''){
			echo $_SESSION['error'];
			$_SESSION['error']='';
	}
}
?>