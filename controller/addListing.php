<?php
//start session
session_start();

$test_mode=false;

/*
	This is the page you're redirected to
	after you click "ADD" on the newlisting.php page.
*/

//Connect to the 'test_books' database
include 'dataconnect_movedb.php';
include 'student.php';

// include student info

//check if POST variables are set
if (isset($_POST['title']) && isset($_POST['author'])
	&& isset($_POST['ISBN']) && isset($_POST['publisher'])
	&& isset($_POST['edition']) && isset($_POST['condition'])
	&& isset($_POST['price'])
	){

	//get input from previous page and hold it in new variables

	// ASSUME THAT ALL FIELDS (BUT 'DESCRIPTION') HAVE BEEN FILLED IN
	$title = $_POST['title'];
	$author = $_POST['author'];
	$ISBN = $_POST['ISBN'];
	$publisher = $_POST['publisher'];
	$edition = $_POST['edition'];
	$condition = $_POST['condition'];
	$price = $_POST['price'];
	$description ='';

	//get a current user's email
	$email=getEmail();

	if($test_mode){
	echo $email;
	echo "</br>";
	}

	// if "description" has been filled in too, get its value; else, keep ''
	if (isset($_POST['description'])) {
		if($_POST['description']!=''){
			$description = $_POST['description'];

			// protect from injection attacks
			$description = stripslashes($description);

			//escape special characters
			$description = $mysqli->real_escape_string($description);
			
			if($test_mode){
			echo $description;
			echo "</br>";
			}
		}
		// else $description = '';
	}

	// remove dashes from 'ISBN'
	$ISBN = str_replace("-", "", $ISBN);

	// remove $ from 'price'
	$price = str_replace("$", "", $price);

	// protect from injection attacks
	$title = stripslashes($title);
	$author = stripslashes($author);
	$ISBN = stripslashes($ISBN);
	$publisher = stripslashes($publisher);
	$edition = stripslashes($edition);
	$condition = stripslashes($condition);
	$price = stripslashes($price);

	//escape special characters
	$title = $mysqli->real_escape_string($title);
	$author = $mysqli->real_escape_string($author);
	$ISBN = $mysqli->real_escape_string($ISBN);
	$publisher = $mysqli->real_escape_string($publisher);
	$edition = $mysqli->real_escape_string($edition);
	$condition = $mysqli->real_escape_string($condition);
	$price = $mysqli->real_escape_string($price);

	if($test_mode){
		echo $title;
		echo "</br>";
		echo $author;
		echo "</br>";
		echo $ISBN;
		echo "</br>";
		echo $publisher;
		echo "</br>";
		echo $edition;
		echo "</br>";
		echo $condition;
		echo "</br>";
		echo $price;
		echo "</br>";
		echo $description;
		echo "</br>";
	}

	else{
		// add an entry to the "listing" table
		$mysqli -> query("INSERT INTO `movedb`.`listing` 
					(`listing_id`, `student_email`, `ISBN`, 
					`description`, `price`, `listing_condition`) 
					VALUES (NULL, '".$email."', '".$ISBN."', 
						'".$description."', '".$price."', '".$condition."');
					");

	}

	// close the connection;
	mysqli_close($mysqli);

	if(!$test_mode){
		header("Location: ../listingVerification.php");
	}

}// end if

else {
	if($test_mode){
		echo "POST vars not set</br>";
	}
}
if($test_mode){
		echo "done";
	}
?>