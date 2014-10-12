<?php
session_start();


//trims spaces from query, and replaces spaces with '+'. needed for genearting URL
function processString($titleString)
{
	$titleString = trim($titleString," \t.");
	return strtr($titleString,array(" "=>"+"));
	//return $titleString;
}


function bookSearchURL($titleString)
{
	$titleString = processString($titleString);
	return sprintf("http://www.goodreads.com/book/title.xml?key=%s&title=%s",$_SESSION['key'],$titleString);
}

function authorSearchURL($titleString)
{
	$titleString = processString($titleString);
	return sprintf("http://www.goodreads.com/book/search.xml?key=%s&query=%s",$_SESSION['key'],$titleString);
}

//generate URL from book id. book id can be drawn form the xml obtained from book/author search.
function bookReviewFromID($bookId)
{
	return sprintf("http://www.goodreads.com/book/show/%s?format=xml&key=%s",$bookId,$_SESSION['key']);
}

?>
