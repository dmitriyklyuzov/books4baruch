<?php
session_start();
$_SERVER['pageName']='RESULTS';

$searchBox="";

if (isset($_POST['Submit'])) {
	$searchBox = $_POST['searchbox'];
 	}

if (isset($_POST['MyListings'])) {
	$searchBox = $_POST['searchbox'];
 	}
	
//connect to the database
require_once 'controller/dataconnect_movedb.php';

//include ordinal number formatter
include 'controller/ordinalFormatter.php';

//include search query generator
include 'controller/generateSearchQuery.php';

?>

<head>
	<!--include head-->
	<?php include 'head.php' ?>
	<title>Results</title>
</head>
<html>
	<body>
		<!-- include navbar -->
		<?php include 'controller/navigationBar.php';?>

	</br>
	</br>
	</br>

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

		//check if a user entered something
		if ($searchBox!=""){

			//protect from injection attacks
			$searchBox = stripslashes($searchBox);

			//escape special characters
			$searchBox = $mysqli->real_escape_string($searchBox);

			//Query the database with the searchbox value - keyword entered
			$resultSet = $mysqli -> query (generateSearchQuery($searchBox));

			//Count the returned rows and store in a new variable
			if($resultSet!=FALSE){
				$row_count = $resultSet -> num_rows;
			}
			else echo "resultset is false";

			//if there are rows returned, print the number of rows
			if($resultSet -> num_rows != 0){
				
				$row_count = $resultSet -> num_rows;
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
					$listing_condition = $rows['listing_condition'];

					if(is_int($book_edition)){
						$book_edition = getOrdinalSuffix($book_edition);
					}

					?>

					<div class="listing_small">
						<ul class="info_list">
							<li><?php echo "<b>" .$book_title. ",</b> ".$book_edition." - $".$price; ?></li>
							<li><?php echo "By " .$book_author; ?></li>
							<li><?php echo "Condition: " .$listing_condition; ?></li>
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
			} //emd if - "if there are rows returned, print the number of rows"

			//if no rows are returned, display a message to try again
			else echo "Nothing found for '$searchBox.' Please try again with different criteria";

		} //end "Check if user entered something"
		else{
			echo "you haven't entered anything";
		}

		
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