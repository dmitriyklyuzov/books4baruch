<?php
session_start();

$searchBox="";

if (isset($_POST['Submit'])) { 
 	//$_SESSION['searchbox'] = $_POST['searchbox'];
 	//$searchBox = $_SESSION['searchbox'];
 	$searchBox = $_POST['searchbox'];
 	}

//connect to the database
include 'dataconnect_test_books.php';
?>

<head>
	<!--include head-->
	<?php include 'head.php' ?>
	<title>Results</title>
</head>
<html>
	<body>
		<div id="searchbox">
			<form method = "POST" action="results.php">
				<input name="searchbox"
						placeholder="Book title, author or ISBN"
						type="text"/>
						<!--for value, put what user entered on previous page - either search.php or results.php-->
				<!--<button type="submit" action="results.php">Search</button> -->
				<input type="submit" name="Submit" value="Search" />
			</form>
  		</div>

		<?php

		//Query the database if user entered something
		if ($searchBox!=""){
			$resultSet = $mysqli -> query("SELECT book_title, book_author, book_ISBN,
													book_edition, price, first_name,
													student_email, phone_number, listing_id
											FROM book_info 
											INNER JOIN listing ON book_info.book_ISBN=listing.ISBN
											INNER JOIN student on listing.student_email=student.email
											WHERE  book_author LIKE '%" .$searchBox."%'
												OR book_title LIKE '%" .$searchBox."%'
												OR book_ISBN = '" .$searchBox."'");

			if($resultSet!=FALSE){

				//Count the returned rows and store in a new variable
				$row_count = $resultSet -> num_rows;

				//if there are rows returned, print the number of rows
				if($row_count != 0){
					//print how many rows were found for the keyword entered
					echo "<p>$row_count results found for '$searchBox'</p>";

					//Turn the results into an array
					while($rows = $resultSet -> fetch_assoc())
					{
						$book_title = $rows['book_title'];
						$book_author = $rows['book_author'];
						$book_ISBN = $rows['book_ISBN'];
						$book_edition = $rows['book_edition'];
						$price = $rows['price'];
						$seller_name = $rows['first_name'];
						$seller_email = $rows['student_email'];
						$seller_phone = $rows['phone_number'];
						$listing_id = $rows['listing_id'];

						?>

						<div class="listing_small">
							<ul class="info_list">
								<li><?php echo "'<b>" .$book_title. "'</b> - $".$price; ?></li>
								<li><?php echo "By ".$book_author.", ".$book_edition." edition"; ?></li>
								<li>ISBN: <?php echo $book_ISBN; ?></li>
								<li><a href="mailto:<?php echo $seller_email; ?>"><?php echo $seller_email; ?></li>
								<li><a href="tel://<?php echo $seller_phone; ?>"><?php echo $seller_phone; ?></a></li>
								<li><a id="details" href="details.php?listing_id=<?php echo $listing_id; ?>">Details</a></li><!--redirect to details.php-->
							</ul>
						</div>
				<?php	

						//increment the listing id by 1
						//$listing_id++;

					} //end while loop - "Turn the results into an array"
				} //end if - "if there are rows returned, print the number of rows"

				//if no rows are returned, display a message to try again
				else echo "Nothing found for '$searchBox.' Please try again with different criteria";
			
			} //end if resulset!=FALSE

		} //end "Query the database if user entered something"
		
		?>
	</body>
	<style>
		ul {
 			list-style: none;
		}

		a{
			text-decoration: none;
			color:#000000;
		}

		a:visited{
			color:#000000;
		}

		#details{
			color:#0000ee;
		}
	</style>

</html>