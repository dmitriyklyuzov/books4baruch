<?php
function redirectIfLoggedIn(){
	if (isset($_SESSION['logged_in'])){
		if($_SESSION['logged_in']=='true'){
			header("Location: index.php");
		}
	}
}
?>