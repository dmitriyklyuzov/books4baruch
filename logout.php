<?php
//connect to the current session
session_start();
		
// unset all session variables
session_unset();

// destroy the session
session_destroy();

// redirect to the index (search) page
header("Location: index.php");
?>