<?php
// if(!isset($_SESSION)){
// 	session_start();
// }

// $status = session_status();
// if($status == PHP_SESSION_NONE){
//     //There is no active session
//     session_start();
// }
// else{
// 	session_start();
// }

	function getEmail(){
		if(isset($_SESSION['email'])){
			if(empty($_SESSION['email'])){
				return "empty";
			}
			else return $_SESSION['email'];
		}
		else return "Not set ";
	}
	// public setEmail(){}

	function getFirstName(){
		if(isset($_SESSION['firstName'])){
			if(empty($_SESSION['firstName'])){
				return "empty";
			}
			else return $_SESSION['firstName'];
		}
		else return "Not set ";
	}
	// public setFirstName(){}

	function getLastName(){
		if(isset($_SESSION['lastName'])){
			if(empty($_SESSION['lastName'])){
				return "empty";
			}
			else return $_SESSION['lastName'];
		}
		else return "Not set ";
	}
	// public setLastName(){}

	function getPhoneNumber(){
		if(isset($_SESSION['phoneNumber'])){
			if(empty($_SESSION['phoneNumber'])){
				return "empty";
			}
			else return $_SESSION['phoneNumber'];
		}
		else return "Not set ";
	}

	function getLoggedIn(){
		if(isset($_SESSION['logged_in'])){
			if(empty($_SESSION['logged_in'])){
				return "empty";
			}
			else return $_SESSION['logged_in'];
		}
		else return "Not set ";
	}
	// public setPhoneNumber(){}
?>