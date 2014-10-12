<?php

include_once("utilities.php");
//header('Content-type: text');


function apiHandle($url)
{
	$urlsArray = array($url,);
	
// Calling curl for each element of the urlsArray. each curl runs on its own thread.
	$curl_array = array();
	$ch = curl_multi_init();

	foreach ($urlsArray as $count => $url) {
		$curl_array[$count] = curl_init($url);
		curl_setopt($curl_array[$count], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
		curl_setopt($curl_array[$count], CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_array[$count], CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl_array[$count], CURLOPT_PROXY, "10.3.100.211:8080");
		curl_setopt($curl_array[$count], CURLOPT_ENCODING, '');
	
		curl_multi_add_handle($ch, $curl_array[$count]);
	}
	do {
		curl_multi_exec($ch, $exec);
	} while ($exec > 0);

// Looping through the results

	foreach ($curl_array as $curl) {
		// code fetched from this curl
		$thisData = curl_multi_getcontent($curl);
		//echo $thisData;
		$thisDOM = new DOMDocument;
    	$thisDOM->loadXml($thisData);
		//$title = $thisDOM->getElementsByTagName('title')->item(0)->textContent;

	}
	
	return $thisDOM;
}

/* function apiHandle1($url) */
/* { */
/* 	$urlsArray = array($url,); */
	
/* // Calling curl for each element of the urlsArray. each curl runs on its own thread. */
/* 	$curl_array = array(); */
/* 	$ch = curl_multi_init(); */

/* 	foreach ($urlsArray as $count => $url) { */
/* 		$curl_array[$count] = curl_init($url); */
/* 		curl_setopt($curl_array[$count], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'); */
/* 		curl_setopt($curl_array[$count], CURLOPT_RETURNTRANSFER, true); */
/* 		curl_setopt($curl_array[$count], CURLOPT_FOLLOWLOCATION, true); */
/* 		curl_setopt($curl_array[$count], CURLOPT_PROXY, "10.3.100.211:8080"); */
/* 		curl_setopt($curl_array[$count], CURLOPT_ENCODING, ''); */
	
/* 		curl_multi_add_handle($ch, $curl_array[$count]); */
/* 	} */
/* 	do { */
/* 		curl_multi_exec($ch, $exec); */
/* 	} while ($exec > 0); */

/* // Looping through the results */

/* 	foreach ($curl_array as $curl) { */
/* 		// code fetched from this curl */
/* 		$thisData = curl_multi_getcontent($curl); */
/* 		//echo $thisData; */
/* 		$thisDOM = new DOMDocument; */
/*     	$thisDOM->loadXml($thisData); */
/* 		//$title = $thisDOM->getElementsByTagName('title')->item(0)->textContent; */

/* 	} */
	
/* 	return $thisData; */
/* } */



//return review widget.
function getReviews($xml)
{
	//var_dump($xml);
	$widget = $xml->getElementsByTagName('reviews_widget')->item(0)->textContent;
	//$widget = get_string_between($xml,"<reviews_widget>","</reviews_widget>");
	$widget = strtr($widget, array("<![CDATA["=>"","]]>"=>""));
	$widget = sprintf("<center>%s</center>",$widget);
	return $widget;
}


//gives some info from the xml dom
function getBookInfo($info_name,$xml)
{
	$str = $xml->getElementsByTagName($info_name)->item(0)->textContent;
	return strtr($str,array("<![CDATA["=>"","]]>"=>""));
}
?>

