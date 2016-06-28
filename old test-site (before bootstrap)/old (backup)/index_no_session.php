<?php
session_start();
?>
<html>
<head>
	<?php include 'head.php' ?>
	<title>*** Buy books ***</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!--  Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-main">
	<div class="container">
		<form method = "POST" action="test.php">
		<input name="searchbox" id="searchbox"
				class="searchbox"
				placeholder="Book title, author or ISBN"
				type="text"/>
		<input type="submit" name="Submit" value="Search" />
	</form>
	</div>
  </div>
  <?php
  if (isset($_POST['Submit'])) { 
 	$_SESSION['searchbox'] = $_POST['searchbox'];
 	} 
  ?>
</body>
</html>