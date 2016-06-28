<?php

if(!isset($_SESSION))
{
	//start the session
	session_start();
}

$_SERVER['pageName']="STATUS";

// include 'controller/student.php';

?>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>Status</title>
	<body>
		<?php

		include 'controller/navigationBar.php';
		
		$loggedIn=getLoggedIn();
		
		?>

	</br>
	</br>
	</br>
		<table>
			<tr id="first_name">
				<td>First name: </td>
				<td><?php echo getFirstName(); ?></td>
			</tr>
			<tr id="last_name">
				<td>Last name: </td>
				<td><?php echo getLastName(); ?></td>
			</tr>
			<tr id="email">
				<td>email: </td>
				<td><?php echo getEmail(); ?></td>
			</tr>
			<tr id="phone_number">
				<td>Phone number:</td>
				<td><?php echo getPhoneNumber(); ?></td>
			</tr>
			<tr id="logged_in">
				<td>Logged in:</td>
				<td><?php echo getLoggedIn(); ?></td>
			</tr>
		</table>
		</br>
		<p>$_SESSION:</p><?php echo "<pre>"; print_r ($_SESSION); echo "</pre>"; ?></br></br></br>
		<p>$_SERVER:</p><?php echo "<pre>"; print_r ($_SERVER); echo "</pre>"; ?></br>
	<body>
</html>