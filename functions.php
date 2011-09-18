<?php

function checkDateFormat($date){
	if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)){
		if(checkdate($parts[2], $parts[3], $parts[1]))
			return 1;
	}
	return 0;
}

?>
