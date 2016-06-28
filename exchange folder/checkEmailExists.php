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
		
	if($row_count==0){ //email doesn't exist
		
		echo "
			<form class='login_form' id='register_form' action='controller/dataconnect_register.php' method='POST'>
				<p>Please fill the form below</p>
				<input type='email' name='inputEmail' value='".$email."' onchange='checkEmail2(this.value)' placeholder='Baruch email address (required)'></br>
				</br>
				<input type='text' autofocus='' name='firstName' placeholder='First name (required)'></br>
				</br>
				<input type='text' name='lastName' placeholder='Last name (optional)'></br>
				</br>
				<input type='tel' name='phoneNumber' placeholder='Phone number (optional)'></br>
				</br>
				<input type='password' name='inputPassword' placeholder='Your password' ></br>
				</br>
				<input type='password' name='inputPassword2' placeholder='Confirm password' ></br>
				</br>
				<input type='submit' name='Submit' value='Register'>
			</form>
		";
	}
}
?>