<?php
//formats a passed integer argument a number with an ordinal suffix
//ex turns "1" into "1st," "2" into "2nd," "25" into "25th," etc.

function getOrdinalSuffix($argument){
	$set_format = numfmt_create('en_US', NumberFormatter::ORDINAL);
	return numfmt_format($set_format, $argument);
}
?>