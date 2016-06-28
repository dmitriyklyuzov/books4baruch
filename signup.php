<?php

session_start();

$fromUrl='/test-site/index.php';
$email="";

$autofocusEmail=" autofocus";
$autofocusFirstName="";

if(isset($_GET['from'])){
	$fromUrl=$_GET['from'];
}

if(isset($_GET['email'])){
	$email=$_GET['email'];
}

if($email!=''){
	$autofocusFirstName=" autofocus";
}

include 'controller/redirectIfLoggedIn.php';

redirectIfLoggedIn();

include_once 'views/parts/head.part.php';
include_once 'views/parts/navbar.part.php';

include ('views/signup.view.php');

?>