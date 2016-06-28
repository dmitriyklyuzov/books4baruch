<?php 
session_start();

include_once 'view/parts/head.part.php';
include_once 'view/parts/navbar.part.php';
?>

<!DOCTYPE html>

<html lang="en">

	<head>
		<?php getHead('Books4Baruch'); ?>
	</head>

	<body >

		<?php getNavbar(); ?>

		<br>

		<div class="container index-search-container">
			<div class="jumbotron">
				<h1 class="text-align-center">Books4Baruch</h1>
				<br>
				<form class="search_form" id="index_search_form" method="GET" action="results.php">			
					<div class="form-group text-center has-feedback">
						<input class="input-lg form-control" name="s" id="searchbox" placeholder="Book Title, Author or ISBN" type="text" autofocus />
						<span class="glyphicon glyphicon-search form-control-feedback"></span>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>