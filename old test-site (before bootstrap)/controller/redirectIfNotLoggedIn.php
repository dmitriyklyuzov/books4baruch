<?php
// $path='';
function redirectIfNotLoggedIn($path){
	if($path!=''){
		$_SERVER['REDIRECT_TO']=$path;
	}
	if (!(isset($_SESSION['logged_in']))){
		header("Location: ../login.php");
	}
}
?>