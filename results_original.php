<?php
session_start();
// $_SERVER['pageName']='RESULTS';

$searchBox="";

if (isset($_GET['s'])) {
	$searchBox = $_GET['s'];
 }
	
//connect to the database
include 'controller/dataconnect_movedb.php';

//include ordinal number formatter
include 'controller/ordinalFormatter.php';

//include search query generator
include 'controller/generateSearchQuery.php';

?>

<head>
	<!--include head-->
	<?php include 'head.php' ?>
	
	<title>Search results</title>
</head>
<html>
	<body>
		<!-- <center> -->
		<!-- include navbar -->
		<?php include 'controller/navigationBar.php';?>

	</br>
	</br>
	</br>

		<div id="searchbox" style="margin: 0 auto; width:80%">
			<form class="search_form" id="results_search_form" method = "POST" action="results.php" >
				<input name="searchbox"
						placeholder="Book Title, Author or ISBN" type="text" style="margin: 0 auto; width:50%"/>
						<!--for value, put what user entered on previous page - either search.php or results.php-->
				<!--<button type="submit" action="results.php">Search</button> -->
				<input type="submit" name="Submit" value="Search" style="margin: 0; width: 160px; height: 45px"; />

				<!-- style="width: 160px; height: 33px" 
				style="margin: 0px; height: 30px; width: 30%"-->
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
					<div class="container">
						<div class="row">
							<div class="listing_small" style="width:85%; margin: 0 auto;">
								<div class="listing_side_image" style="max-height: 30px; float:left; margin: 0 auto;">
									<img src=<? echo "'img/covers/".$book_ISBN.".jpg'"; ?> onError="this.src='img/covers/backupImg.jpg';" height="auto" width="auto">
								</div>

								<div class="listing_wrapper" style=" float:left; margin: 0 auto; height:auto">
									<ul class="info_list">
										<li><?php echo "<b>" .$book_title. ",</b> ".$book_edition." - $".$price;
											if(getEmail()==$seller_email){ echo " (your listing)";} ?></li>
										<li><?php echo "By " .$book_author; ?></li>
										<li><?php echo "Condition: " .$listing_condition; ?></li>
										<li>ISBN: <?php echo $book_ISBN; ?></li>
										<!-- <li><a href="mailto:<?php echo $seller_email; ?>"><?php echo $seller_email ; ?></li> -->
										<!-- <li><a href="tel://<?php echo $seller_phone; ?>"><?php echo $seller_phone; ?></a></li> -->
										<?php
										// if logged in, 
										if (isset($_SESSION['logged_in'])){
											if($_SESSION['logged_in']=='true'){ 

												// if the listing  email is your email
												if(getEmail()==$seller_email){ ?>
													<li>
														<a id="details" href="details.php?listing_id=<?php echo $listing_id; ?>">Details</a> / 
														<a id="modify" href="">Modify</a> / 
														<a id="delete" href="controller/deletelisting.php?listing_id=<?php echo $listing_id; ?>">Delete</a>
													<?php 
												}
												else{ ?>
													<li><a id="details" href="details.php?listing_id=<?php echo $listing_id; ?>">Details</a></li><!--redirect to details.php-->
												<?php
												}
											}
										}
										else{ ?>
													<li><a id="details" href="details.php?listing_id=<?php echo $listing_id; ?>">Details</a></li><!--redirect to details.php-->
										<?php
												} ?>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<?php
								if($row_count>1){
									echo "<hr>";
									// echo "<br>";
								}

				} //end while loop - "Turn the results into an array"
			} //emd if - "if there are rows returned, print the number of rows"

			//if no rows are returned, display a message to try again
			else echo "Nothing found for '$searchBox.' Please try again with different criteria";

		} //end "Check if user entered something"
		else{
			echo "<font color='red'>You have not entered any text. Please try again.</font>";
		}

		
		?>
		<!-- </center> -->
	</body>
</html>