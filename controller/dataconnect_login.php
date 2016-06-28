<?php
//start session
session_start();

$_SESSION['error']='';

$_POST['redirectedFrom'] = 'books4baruch/index.php';

/*
	This is the page you're redirected to
	after you click "login" on the login.php page.
*/

//Connect to the 'test_books' database
include 'dataconnect_movedb.php';

// include 'student.php';

//check if POST variables are set
if (isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['redirectedFrom'])){

	//get input from previous page and hold it in a new variables
	$email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
	$from = $_POST['redirectedFrom'];

	//check if either password or email are empty
	if(empty($email) || empty($password)){
		//set the session error message
		// $_SESSION['error']="Please enter the username and password";
		//redirect to the login page
		header("Location: ../login.php");
	}
	else{
		//protect from injection attacks
		$email = stripslashes($email);
		$password = stripslashes($password);

		//escape special characters
		$email = $mysqli->real_escape_string($email);
		$password = $mysqli->real_escape_string($password);

		//get the results from the 'student' table
		$resultSet = $mysqli -> query("SELECT * 
									FROM student 
									WHERE email = '".$email."'
									AND password = '" .$password."';");

		//close the connection;
		mysqli_close($mysqli);

		//get the number of rows
		$numrows = $resultSet -> num_rows;

		//Count the returned rows
		if($numrows == 1){

			//Turn the results into an array
			while($rows = $resultSet -> fetch_assoc())
			{
				$_SESSION['firstName'] = $rows['first_name'];
				$_SESSION['lastName'] = $rows['last_name'];
				$_SESSION['phoneNumber'] = $rows['phone_number'];
				$_SESSION['email'] = $rows['email'];
				$_SESSION['logged_in'] = 'true';

				/*$firstName = $rows['first_name'];
				$lastName = $rows['last_name'];
				$phoneNumber = $rows['phone_number'];
				$email = $rows['email'];*/
			}
			//echo "successfully logged in!";
			//redirect to the search page
			header("Location: ../../".$from);
		}// end if ($numrows == 1)

		//if $numrows!=1 - no rows are returned
		else{
			//set the 'error' session variable to hold a message about an incorrect password or email
			$_SESSION['error'] = "Invalid username or password. Please try again</br>";
			header("Location: ../login.php");
		} //end else if $numrows!=1 - no rows are returned
	}
}
else header("Location: ../index.php"); // end check if POST variables are set
?>