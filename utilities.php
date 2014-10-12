<?php

function checkEmpty($ret)   /*note that $ret can't be used after this*/
{
	if($ret->fetchArray(SQLITE3_ASSOC))
		return false;
	return true;
}


/*multiple argument function. If even one of the argument is null, returns true*/
function blankField() 
{
	foreach(func_get_args() as $arg)
	{
		if(empty($arg))
			return true;
	}
	return false;
}


class myDatabase extends SQLite3
{
	function __construct()
	{
		$this->open("$_SERVER[DOCUMENT_ROOT]/data/database.db");
	}
}


function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}


?>