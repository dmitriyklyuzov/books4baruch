<?php
session_start();

$email='';
$need='';

if(isset($_GET['email']) && isset($_GET['need'])){
	$email=$_GET['email'];
	$need=$_GET['need'];
}

// email not set
else header("Location: ../404.php");

if($email!=''&&$need!=''){

	include 'dataconnect_movedb.php';

	$resultSet = $mysqli -> query("SELECT email
					FROM student
					WHERE email='".$email."';");

	$row_count = $resultSet -> num_rows;
	
	mysqli_close($mysqli);
		
	if($row_count==0){ // 0 rows returned

		// email does not exist
		if($need=='true'){
			// echo "row count is 0 and need == true";
			echo "true";
		}

		// else echo "row count is 0 and need == false";
		else echo "false";

	}

	//email exists
	else {

		// email does not exist
		if($need=='true'){
			
			// echo "row count is $row_count and need == true ($need $email)";
			echo "false";
		}

		// else echo "row count is $row_count and need == false ($need $email)";
		else echo "true";
	}
}

// else echo "true";

?>