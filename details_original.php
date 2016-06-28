<?php

session_start();
$test_mode=false;

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

	if($test_mode){
		echo $listingId;
	}

	include 'controller/dataconnect_movedb.php';?>

	<head>
		<!--include head-->
		<?php include 'head.php';?>
		<title>Details</title>
	</head>
	<html>
		<body>
			<!-- include navbar -->
			<?php include 'controller/navigationBar.php';?>

	<?php

	$resultSet = $mysqli -> query("SELECT book_title, book_author, book_ISBN,
					book_edition, listing_condition, price, first_name,
					student_email, phone_number, description, listing_id
			FROM book_info 
			INNER JOIN listing ON book_info.book_ISBN=listing.ISBN
			INNER JOIN student on listing.student_email=student.email
			WHERE listing_id = '" .$listingId."';");

			?>

	<div id="detailsWrapper" style="margin: 0 auto; width:85%" >

			<?php

	if($resultSet -> num_rows != 0){
				
		$row_count = $resultSet -> num_rows;
		include 'controller/ordinalFormatter.php';

		if($test_mode){
			//print how many rows were found for the keyword entered
			echo "<p>$row_count results found</p>";
		}

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
			$listing_description = $rows['description'];

		}
		?>
				<div class="cover" style="float: left; margin: 20px; max-width: 300px; border:1px solid; border-color:#333333 ">
					<img src=<?php echo "'img/covers/" . $book_ISBN . ".jpg'"; ?> onError="this.src='img/covers/backupImg.jpg';" height="auto" width="auto">
				</div>

				<div class="details" style="float: left; padding: 20px; max-width: 500px">

					<h2><?php echo $book_title ?> | <?php echo $book_edition ?></h2>
					<p><?php echo "By " . $book_author ?></p>
					<p><?php echo "ISBN-13: " . $book_ISBN ?></p>
					<hr>
					<p><?php echo "Sold by: " . $seller_name ?></p>
					<p><?php echo "Condition " . $listing_condition . "/10" ?></p>

					<p>Email: <a href="mailto:<?php echo $seller_email ?>?Subject=<?php echo $book_title?>"><?php echo $seller_email ?></a></p>

					<?php 

					if($seller_phone!=""){

						$seller_phone_formatted = "(" . substr($seller_phone, 0, 3) . ") "
														. substr($seller_phone, 3, 3) . "-"
														. substr($seller_phone, 6, 4);

						echo "<p>Phone: <a href='tel:".$seller_phone."'>".$seller_phone_formatted."</a></p>";
					}

					if($listing_description!=""){
						
						echo "<div id='description' style='max-width:450px;'><p>Description: " . $listing_description . "</p></div>";
					}

					?>
					
					<h2><?php echo "<hr>"; echo "$" . $price ?></h2>
				

				</div> <!-- details div -->
			<!-- </div> top_row -->
		</div> <!-- detailsWrapper div -->




		<?php

		// echo $price;
		// echo "</br>";
		// echo $seller_name;
		// echo "</br>";
		// echo $seller_email;
		// echo "</br>";
		// echo $seller_phone;
		// echo "</br>";
		// echo $listing_id;
		// echo "</br>";
		// echo $listing_condition;
		// echo "</br>";

		?>

		<?php


		// else echo "listing_id not set";
	}
	else echo "Listing not found";
}
else header("Location: 404.php");

?>

	</body>
</html>