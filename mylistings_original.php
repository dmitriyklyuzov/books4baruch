<?php
session_start();

// connect to the db
include 'controller/dataconnect_movedb.php';

// include the SQL SELECT query 
include 'controller/generateSearchQuery.php';

?>

<!DOCTYPE html>
<html>
	<head>
    	<title>My listings</title>
    	<?php include 'head.php';?>
	</head>
	
	<body>

	
<?php
	
	// include the nav bar - student.php is included automatically
	include "controller/navigationBar.php";

			//Query the database with the user's email
			$resultSet = $mysqli -> query (generateSearchQuery(getEmail()));

			//Count the returned rows and store in a new variable
			if($resultSet!=FALSE){
				$row_count = $resultSet -> num_rows;
			}
			else echo "resultset is false";

			//if there are rows returned, print the number of rows
			if($resultSet -> num_rows != 0){
				
				$row_count = $resultSet -> num_rows;

				//print how many rows were found for the keyword entered
				echo "</br></br></br></br><p>You have $row_count books listed so far!</p>";

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
							<li>
							<a id="details" href="details.php?listing_id=<?php echo $listing_id; ?>">Details</a> / 
							<a id="modify" href="">Modify</a> / 
							<a id="delete" href="controller/deletelisting.php?listing_id=<?php echo $listing_id; ?>">Delete</a>
							</li><!--redirect to details.php-->
						</ul>
					</div>
			<?php	

				} //end while loop - "Turn the results into an array"
			
			} //emd if - "if there are rows returned, print the number of rows"

			//if no rows are returned, display a message to try again
			else{
				?>
				</br>
				</br>
				</br>
				<div id="nothing_listed"><p>Looks like you haven't listed any books yet. Click 'Add listing' at the top of the page!</p></div>

			<?php }

		//} //end "Check if user entered something"
			?>

	</body>
</html>