<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
    	<title>404</title>
    	<?php include 'head.php';?>
	</head>
	
	<body>

	
<?php
		// include the nav bar - student.php is included automatically
		include "controller/navigationBar.php";
?>
			<div id="404_msg" style="padding-top: 15%; height: 200px">
				<center><h1 style="font-size: 15em">404.</h1><br></center>
				<center><h1 style="padding-top: 60px">Opps! Something went wrong.</h1></center>
				<h1 style="padding-top: 60px">You can: <h1>
				<ul>
					<h2><li><a href="index.php">Go to the home page</a></li></h2>
					<h2><li><a href="login.php">Try logging in</a></li></h2>
					<h2><li><a href="login.php">Try signing up</a></li></h2>
				</ul>
			</div>
		</center>
	</body>
</html>