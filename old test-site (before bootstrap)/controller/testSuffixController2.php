<?php 
if(isset($_POST['field'])){
	$edition = $_POST['field'];

	echo "original value: ".$edition."</br>";

	$edition = str_replace(" edition", "", $edition);
	$edition = str_replace(" ed", "", $edition);
	$edition = str_replace("first", "1", $edition);
	$edition = str_replace("second", "2", $edition);
	$edition = str_replace("thirdnd", "3", $edition);
	$edition = str_replace("forth", "4", $edition);
	$edition = str_replace("fourth", "4", $edition);
	$edition = str_replace("fifth", "5", $edition);
	$edition = str_replace("sixth", "6", $edition);
	$edition = str_replace("st", "", $edition);
	$edition = str_replace("nd", "", $edition);
	$edition = str_replace("rd", "", $edition);

	echo "modified value: ".$edition;
}
?>