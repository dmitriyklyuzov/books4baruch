<?php
//start session
session_start();

//get input from previous page and hold it in a new variable
$email = $_POST[inputEmail];
$password = $_POST[inputPassword];

//if the form was submitted
if (isset($_POST['Submit'])){
	//either var is empty
	if(empty($_POST('inputEmail'))) || empty($_POST['inputPassword']){
		$_SESSION['error']="email or password are empty; please try again";
		//header('Location: login.html');
	}

	
	//both vars are not empty
	else{

		//define $email and $password
		$email = $_POST['inputEmail'];
		$password = $_POST['inputPassword'];

		//protect from injection attacks
		$email = stripcslashes($email);
		$password = stripcslashes($password);

		//escape special characters
		$email = $mysqli->real_escape_string($email);
		$password = $mysqli->real_escape_string($password);

		//connect to the db
		include 'dataconnect_movedb.php';

		//run query to find that user in db
		$sql = "SELECT *
				FROM student
				WHERE email=$email AND password=$password";
		$resultSet = $mysqli -> query($sql);

		//Count the returned rows and store in a new variable
		$row_count=0;

		if($resultSet!=FALSE){
			$row_count = $resultSet -> num_rows;
		}
		else $_SESSION['error']="resultset is false";

		if($row_count==1){
			$_SESSION['user']='$email';
			$_SESSION['password'] = '$password';
			$_SESSION['logged_in'] = 'true';
			while($rows = $resultSet -> fetch_assoc())
				{
					$_SESSION['first_name']=$rows['first_name'];
					$_SESSION['last_name']=$rows['last_name'];
				}
			header("Location: search.php");
		}
		else {
			$_SESSION['error']='Invalid username or password. Please try again';
			header("Location: search.php");

		}

		//close the connection
		mysqli_close($mysqli);

	}//end else statement

}// end if the form was submitted

?>