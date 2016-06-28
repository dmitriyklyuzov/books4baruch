<?php
session_start();
?>

<!DOCTYPE html>
<head>
	
	<title>TEST 2</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script charset="utf-8"></script>

<style>
</style>

</head>
<html lang="en">
	<body >

		<nav class="navbar navbar-default navbar-inverse">
		  <div class="container-fluid" style="width: 95%">
		    <div class="navbar-header">
		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="status.php"><span class="glyphicon glyphicon-home"></span> Books4Baruch<sup>Beta</sup></a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
			    
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="test2.php">MY LISTINGS</a></li>
			      <li><a href="list.php">ADD LISTING</a></li>
			      <!-- <li><a href="">LOG IN</a></li>
			      <li><a href="">SIGN UP</a></li> -->
			      
			      <li class="dropdown">
			      	<a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span> HI, DMITRIY
			      	<span class="caret"></span></a>
			      	<ul class="dropdown-menu">
			          <li><a href="logout.php">LOG OUT</a></li>
			          <li><a href="#">VIEW PROFILE</a></li> 
			        </ul>
			      </li>

			    </ul>
			</div>
		  </div>
		</nav>



		<br>

		<div class="container" >

			<div class="row">
					
					<div class="cover 
									col-lg-3 col-lg-offset-1
									col-md-4 col-md-offset-0
									col-sm-5 col-sm-offset-0
									col-xs-8 col-xs-offset-2
									">
						<img class="img-responsive img-thumbnail" src='img/covers/9780143118442.jpg'>
					</div>
					
					<div class="details 
										col-lg-6
										col-md-7
										col-sm-7
										col-xs-11">
						<br><p><b>Difficult conversations: How to discuss what matters most | Baruch edition</b></p>
						<p><b>By</b> Shoshana Ohlbaum</p>
						<p><b>ISBN:</b> 9780143118442</p>
						<p><b>Condition:</b> 5/10</p>
						<p><b>Sold by:</b> Dmitriy</p>
						<p><b>Email:</b> dk@baruchmail.cuny.edu</p>
						<p><b>Description:</b> I got this book about a year ago. Still in good condition. Good for the COM4900 capstone class with Prof. Shoshana Ohlbaum. You'll need this book for the final paper. Pls email me if interested
						<h1>$15</h1></div>
					</div>
			</div>
		</div>
	</body>
</html>