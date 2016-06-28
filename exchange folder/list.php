<?php
session_start();

include 'controller/redirectIfNotLoggedIn.php';

$pageUrl = $_SERVER['REQUEST_URI'];

redirectIfNotLoggedIn($pageUrl);

include 'controller/generateListingForm.php';

$_SERVER['pageName']="ADD LISTING";

?>
<html>
<head>
	<script src="controller/checkISBN.js"></script>
	<?php include 'head.php' ?>
	<title>Add a listing</title>
</head>
<body>
<?php include_once("controller/analyticsTracking.php") ?>
	<?php include 'controller/navigationBar.php';?>
	</br></br></br>
	<!-- <h3 style="text-align: center">Enter the ISBN</h3> -->
	<p style="text-align: center">First, enter the ISBN number of a book</p>
      <div class="auto-style1">
      	<div id="newListingDiv">
   			<?php generateListingForm("", "", "", "", "", "ISBN", ""); ?>
      	</div>
	</div>
</body>
</html>