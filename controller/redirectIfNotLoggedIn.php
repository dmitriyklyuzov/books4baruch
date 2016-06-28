<?php
function redirectIfNotLoggedIn($fromUrl){
	if (!(isset($_SESSION['logged_in']))){
		header("Location: login.php?from=".$fromUrl);
	}
}
?>