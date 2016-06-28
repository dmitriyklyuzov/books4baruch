<?php

session_start();

$fromUrl=str_replace("/", "", $_SERVER["REQUEST_URI"]);
$email="";

$autofocusEmail=" autofocus";
$autofocusPassword="";

if(isset($_GET['from'])){
	$fromUrl=$_GET['from'];
}

if(isset($_GET['email'])){
	$email=$_GET['email'];
}

if($email!=''){
	$autofocusPassword=" autofocus";
}

include 'controller/redirectIfLoggedIn.php';

redirectIfLoggedIn();

include_once 'views/parts/head.part.php';
include_once 'views/parts/navbar.part.php';

include ('views/login.view.php');

?>