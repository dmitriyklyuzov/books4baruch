<?php

if(isset($_SESSION))
{
	//start the session
	session_start();
}

$listingId='';
$book_title = '';
$book_author = '';
$book_ISBN = '';
$book_edition = '';
// $book_edition_ordinal = getOrdinalSuffix($book_edition);
$price = '';
$seller_name = '';
$seller_email = '';
$seller_phone = '';
$listing_id = '';
$listing_condition = '';

if(isset($_GET['listing_id'])){
	$listingId=$_GET['listing_id'];
	// echo $listingId;

	include 'controller/dataconnect_movedb.php';

	$resultSet = $mysqli -> query("SELECT book_title, book_author, book_ISBN,
					book_edition, listing_condition, price, first_name,
					student_email, phone_number, listing_id
			FROM book_info 
			INNER JOIN listing ON book_info.book_ISBN=listing.ISBN
			INNER JOIN student on listing.student_email=student.email
			WHERE listing_id = '" .$listingId."';");

	if($resultSet -> num_rows != 0){
				
		$row_count = $resultSet -> num_rows;
		//print how many rows were found for the keyword entered
		echo "<p>$row_count results found</p>";

		//Turn the results into an array
		while($rows = $resultSet -> fetch_assoc())
		{
			$book_title = $rows['book_title'];
			$book_author = $rows['book_author'];
			$book_ISBN = $rows['book_ISBN'];
			$book_edition = $rows['book_edition'];
			// $book_edition_ordinal = getOrdinalSuffix($book_edition);
			$price = $rows['price'];
			$seller_name = $rows['first_name'];
			$seller_email = $rows['student_email'];
			$seller_phone = $rows['phone_number'];
			$listing_id = $rows['listing_id'];
			$listing_condition = $rows['listing_condition'];

		}

		echo $book_title;
		echo "</br>";
		echo $book_author;
		echo "</br>";
		echo $book_ISBN;
		echo "</br>";
		echo $book_edition;
		echo "</br>";
		// $book_edition_ordinal = getOrdinalSuffix($book_edition);
		echo $price;
		echo "</br>";
		echo $seller_name;
		echo "</br>";
		echo $seller_email;
		echo "</br>";
		echo $seller_phone;
		echo "</br>";
		echo $listing_id;
		echo "</br>";
		echo $listing_condition;
		echo "</br>";


		// else echo "listing_id not set";
	}
	else echo "numrows == 0";
}

?>