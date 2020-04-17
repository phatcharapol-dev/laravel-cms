<?php

function strLimit($words,$length = 50){

	if (strlen($words) > $length) {	
			$words = substr($words,0,$length)."...";
	} 

	return $words ;
}

?>