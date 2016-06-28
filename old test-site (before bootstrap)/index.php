<?php
session_start();
$_SERVER['pageName']='HOME';
?>
<html>
<head>
	<?php include 'head.php' ?>
	<title>Books4Baruch</title>
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
	<!--  Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> -->
</head>
<body>
	<!-- Navigation bar -->
	<?php include 'controller/navigationBar.php';?>
	
	</br>
	</br>
	</br>

	<!-- Search form -->
	<div class="search_form">
		<div class"auto-style1">
			<form method = "POST" action="results.php">
				<input name="searchbox" id="searchbox"
						class="searchbox"
						placeholder="Book title, author or ISBN"
						type="text" autofocus=""/>
				<input type="submit" id="submit_btn" name="Submit" value="Search" />
			</form>
		</div>
	</div>
</body>
</html>