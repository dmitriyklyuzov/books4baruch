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

	include 'controller/dataconnect_movedb.php';
?>

<!DOCTYPE html>
<head>
	
	<title>Details - Books4Baruch</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/newstylesheet.css" rel="stylesheet">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script charset="utf-8"></script>

</head>
<html lang="en">
	<body >

		<?php 

		include 'navbar.php'; 

		$resultSet = $mysqli -> query("SELECT book_title, book_author, book_ISBN,
										book_edition, listing_condition, price, first_name,
										student_email, phone_number, description, listing_id
										FROM book_info 
										INNER JOIN listing ON book_info.book_ISBN=listing.ISBN
										INNER JOIN student on listing.student_email=student.email
										WHERE listing_id = '" .$listingId."';");
		?>



		<br>

		<div class="container" >

		<?php

		if($resultSet -> num_rows != 0){
				
			$row_count = $resultSet -> num_rows;
			// include 'controller/ordinalFormatter.php';

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

		?>

			<div class="row">
					
					<div class="cover 
									col-lg-3 col-lg-offset-1
									col-md-4 col-md-offset-0
									col-sm-5 col-sm-offset-0
									col-xs-8 col-xs-offset-2
									">
						<img 	class="img-responsive img-thumbnail" 
								src='img/covers/<?php echo $book_ISBN; ?>.jpg'
								onError="this.src='img/covers/backupImg.jpg';">

					</div> <!-- cover -->
					
					<div class="details 
										col-lg-6
										col-md-7
										col-sm-7
										col-xs-11">
						<h2><?php echo $book_title ?> | <?php echo $book_edition ?></h2>
						<p><b>By</b><?php echo " ".$book_author?></p>
						<p><b>ISBN:</b><?php echo " ".$book_ISBN?></p>
						<p><b>Condition:</b><?php echo " ".$listing_condition?>/10</p>
						<p><b>Sold by:</b><?php echo " ".$seller_name?></p>
						<p><b>Email:</b><?php echo " ".$seller_email?></p>
						<p><b>Description:</b><?php echo " ".$listing_description?></p>
						<h1><?php echo "$".$price?></h1>
					</div> <!-- details -->
			</div> <!-- row -->

			<?php

			} // end while loop
			
		} // end if - numrows is not 0

		else  echo "

				
				<div class='row'>
					<div class='message 
								col-lg-7 col-lg-offset-3
								col-md-9 col-md-offset-2
								col-sm-10 col-sm-offset-1
								col-xs-11 col-xs-offset-0
								'>
						<h2>Sorry, this listing doesn't exist. Please search again or go to the <a href='index.php'>home page</a> if you got here accidentally.</h2>
					</div>
				</div>

			<?php ";

	}
	else header("Location: 404.php");

			?>
		</div> <!-- container -->
	</body>
</html>