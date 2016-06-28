<?php
session_start();

// include 'ordinalFormatter.php';

// include 'dataconnect_movedb.php';

// include 'generateListingForm.php';

$email='';

if(isset($_GET['email'])){
	$email=$_GET['email'];
}
else echo "email not set";

if($email!=''){

	include 'dataconnect_movedb.php';

	$resultSet = $mysqli -> query("SELECT *
					FROM student
					WHERE email='".$email."';");

	$row_count = $resultSet -> num_rows;
	mysqli_close($mysqli);

	if($row_count==1){ //email exists
		
		echo "
			<form id='login_form' action='controller/dataconnect_login.php' method='POST'>
				<p>Welcome back!</p>
				<input type='email' name='inputEmail' value='".$email."' onchange='checkEmail(this.value)' placeholder='Baruch email address' required=''></br>
				</br>
				<input type='password' name='inputPassword' placeholder='Your password' required='' autofocus=''></br>
				</br>
				<input type='submit' name='Submit' value='LOG IN'>
			</form>
		";
	}
}
?>