<?php
//get input from previous page and hold it in a new variable
$searchBox = $_POST[searchbox];

//echo the value of the variable
echo "You entered: " .$searchBox. "</br>";

//connect to the database
include 'dataconnect.php';


//Query the database
$resultSet = $mysqli -> query("SELECT * 
								FROM book_info 
								WHERE Book_Author LIKE '%" .$searchBox."%'
								OR Book_ISBN = '" .$searchBox."'
								OR Book_Condition = '" .$searchBox."'
								OR Book_Name LIKE '%" .$searchBox."%'");

//Count the returned rows
if($resultSet -> num_rows != 0){

//Turn the results into an array
	while($rows = $resultSet -> fetch_assoc())
	{
		$bname = $rows['Book_Name'];
		$bauthor = $rows['Book_Author'];
		$bISBN = $rows['Book_ISBN'];
		$bcondition = $rows['Book_Condition'];
		$email = $rows['email'];

		echo "<p>Book Name: $bname
				Book Author: $bauthor
				ISBN: $bISBN
				Condition: $bcondition 
				Seller's email: $email</p>";
	}

//Display the results
}

else{
	echo "No results to display.";
}

// <a href="/index.php">Go back</a>

?>