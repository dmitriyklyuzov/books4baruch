<?php

$_SESSION['debugMode']=false;

function stripFormChars ($input) {
return nl2br(htmlspecialchars(trim($input), ENT_QUOTES), false);
}

function ifDebug ($msg){
	if($_SESSION['debugMode']==true){
		echo $msg.'<br>';
	}
}

function genPass ($password, $login) {
return md5('dkbk'.md5('321'.$password.'123').md5('678'.$login.'890'));
}

?>