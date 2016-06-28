<?php

$email='';

if(isset($_POST['signUpEmail'])){
	$email=$_POST['signUpEmail'];
}

if($email!=''){

	include 'dataconnect_movedb.php';

	$resultSet = $mysqli -> query("SELECT email
					FROM student
					WHERE email='".$email."';");

	$row_count = $resultSet -> num_rows;
	
	mysqli_close($mysqli);
		
	if($row_count==0){ // 0 rows returned, email is NOT in DB

		if ( isset($_POST['signUpEmail']) && isset($_POST['firstName']) && isset($_POST['inputPassword2']) ){


			

			//Connect to the 'movedb' database
			include 'dataconnect_movedb.php';

			$firstName = stripslashes($_POST["firstName"]);
			$lastName = stripslashes($_POST["lastName"]);
			$email = stripslashes($_POST["signUpEmail"]);
			$phoneNumber = stripslashes($_POST["phoneNumber"]);
			$phoneNumber = str_replace("(", "", $phoneNumber);
			$phoneNumber = str_replace(")", "", $phoneNumber);
			$phoneNumber = str_replace("-", "", $phoneNumber);
			$password = stripslashes($_POST["inputPassword2"]);

			// && isset($_POST['lastName']) && isset($_POST['phoneNumber'])


			// $phoneNumber = str_replace("-", "", str_replace(")", "", str_replace("(", "", $_POST["phoneNumber"])));

			//echo the values of the variables
			// echo "You entered: " .$firstName. "</br>";
			// echo "You entered: " .$lastName. "</br>";
			// echo "You entered: " .$email. "</br>";
			// echo "You entered: " .$phoneNumber. "</br>";
			// echo "You entered: " .$password. "</br>";

			$enableQuery = "1";

			if($enableQuery=="1"){
				$mysqli -> query("INSERT INTO `student`
							(`email`, `first_name`, `last_name`, `password`, `phone_number`)
							VALUES
							('".$email."', '".$firstName."', '".$lastName."', '".$password."', '".$phoneNumber."');");

				mysqli_close($mysqli);
			}
			header("Location: ../registrationVerification.php?email=".$email);
		}
	}

	// redirect, since this email already exists
	else header("Location: ../404.php"); 


}

// email is ''
else header("Location: ../signup.php");

// else echo "vars not set<br>";

// echo "done";

?>