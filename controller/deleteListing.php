<?php
session_start();

$test_mode=false;

if(isset($_GET['listing_id'])){
	
	$listingId=$_GET['listing_id'];
	$student_email="";

	include 'dataconnect_movedb.php';
	include 'student.php';

	// get the email associated with a listing
	$resultSet = $mysqli -> query("SELECT `student_email` FROM `listing` WHERE `listing_id` = ".$listingId);

	while($rows = $resultSet -> fetch_assoc()){
		$student_email = $rows['student_email'];
	}

	if($test_mode){
		echo "<p>Your email: " .getEmail(). "</p>";
		echo "<p>Listing id: " .$listingId. "</p>";
		echo "<p>Email on the listing you're trying to delete: " .$student_email. "</p>";
	}

	// if the email on the listing and the email of the user match, allow deletiion
	if(getEmail()==$student_email){

		if($test_mode){
			echo "<p>Emails match.</p>";
		}
		else {
			$mysqli -> query("DELETE FROM `movedb`.`listing` WHERE `listing`.`listing_id` = ".$listingId);

			// close the connection
			mysqli_close($mysqli);

			// redirect to 'my listings' page
			header("Location: ../mylistings.php");
		}
	}
	else {

		if($test_mode){
			echo "<p>Emails DON'T match</p>";
		}
		else{
			header("Location: ../404.php");		
		}
	}


	// SELECT `student_email` FROM `listing` WHERE `listing_id` = 23

	
}

// else $_GET['listing_id'] is not set - redirect to 404
else header("Location: ../404.php");

?>