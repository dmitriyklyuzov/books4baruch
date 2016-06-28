<?php
//Connect to the 'test_books' database
// include 'dataconnect_movedb.php';

if (isset($_POST['firstName']) &&
	isset($_POST['inputEmail']) &&
	isset($_POST['inputPassword'])
	 ){

	$lastName='';
	$phoneNumber='';

	// if "lastName" has been filled in too, get its value; else, keep '' implicitly
	if (isset($_POST['lastName'])) {
		if($_POST['lastName']!=''){
			$lastName = $_POST['lastName'];

			// protect from injection attacks
			$lastName = stripslashes($lastName);

			//escape special characters
			// $lastName = $mysqli->real_escape_string($lastName);
		}
		// else $lastName = ''; //implicit
	}

	// if "phoneNumber" has been filled in too, get its value; else, keep '' implicitly
	if (isset($_POST['phoneNumber'])) {
		if($_POST['phoneNumber']!=''){
			$phoneNumber = $_POST['phoneNumber'];

			// protect from injection attacks
			$phoneNumber = stripslashes($_POST["phoneNumber"]);

			$phoneNumber = str_replace("(", "", $phoneNumber);
			$phoneNumber = str_replace(")", "", $phoneNumber);
			$phoneNumber = str_replace("-", "", $phoneNumber);

			//escape special characters
			$description = $mysqli->real_escape_string($lastName);
		}
		// else $phoneNumber = ''; //implicit
	}

	//Connect to the 'movedb' database
	include 'dataconnect_movedb.php';

	$firstName = stripslashes($_POST["firstName"]);
	$email = stripslashes($_POST["inputEmail"]);
	$password = stripslashes($_POST["inputPassword"]);


	// $phoneNumber = str_replace("-", "", str_replace(")", "", str_replace("(", "", $_POST["phoneNumber"])));

	//original query used in phpMyAdmin to insert a new student
	/*
	INSERT INTO `movedb`.`student` (`email`, `first_name`, `last_name`, `password`, `phone_number`)
	VALUES ('dmitriy.klyuzov@baruchmail.cuny.edu', 'Dmitriy', 'Klyuzov', 'pass1', '3474957605');
	*/

	$enableQuery = "1";

	if($enableQuery=="1"){
		$mysqli -> query("INSERT INTO `student`
					(`email`, `first_name`, `last_name`, `password`, `phone_number`)
					VALUES
					('".$email."', '".$firstName."', '".$lastName."', '".$password."', '".$phoneNumber."');");

		mysqli_close($mysqli);

		// redirect to the verification page only if query is enabled
		header("Location: ../registrationVerification.php");
	}
	else{
		echo "Test mode. Query is not enabled.</br></br>";
		
		//echo the values of the variables
		echo "<table>";
		echo "<tr><td>first name:</td><td>" .$firstName. "</td></tr>";
		echo "<tr><td>last name:</td><td>" .$lastName. "</td></tr>";
		echo "<tr><td>email:</td><td>" .$email. "</td></tr>";
		echo "<tr><td>phone #:</td><td>" .$phoneNumber. "</td></tr>";
		echo "<tr><td>password:</td><td>" .$password. "</td></tr>";
		echo "</table>";
	}
}
echo "</br>done";

?>