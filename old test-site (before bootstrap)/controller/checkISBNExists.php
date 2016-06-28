<?php
session_start();

include 'ordinalFormatter.php';

include 'dataconnect_movedb.php';

include 'generateListingForm.php';

if(isset($_GET['ISBN'])){

	$ISBN=$_GET['ISBN'];
	$ISBN = str_replace("-", "", $ISBN);
	$ISBN = stripslashes($ISBN);
	$ISBN = $mysqli->real_escape_string($ISBN);
}

if($ISBN!=''){
	
	$resultSet = $mysqli -> query("SELECT *
					FROM book_info
					WHERE book_ISBN='".$ISBN."';");

	$row_count = $resultSet -> num_rows;
	
	if($row_count!=0){

		//Turn the results into an array
		while($rows = $resultSet -> fetch_assoc())
		{
			$book_title = $rows['book_title'];
			$book_author = $rows['book_author'];
			$book_ISBN = $rows['book_ISBN'];
			$book_publisher = $rows['book_publisher'];
			$book_edition = $rows['book_edition'];
			// $book_edition = 'Baruch Edition';
			// $book_edition_ordinal = getOrdinalSuffix($book_edition);

			generateListingForm($book_ISBN, $book_title, $book_author, $book_publisher, $book_edition, "condition", "controller/addListing.php");

		}
		mysqli_close($mysqli);
	}
	else {
		generateListingForm($ISBN, "", "", "", "", "title", "controller/createBookAddListing.php");
	}
}
?>