<?php

session_start();
include_once("utilities.php");
include_once("urlgenerate.php");
include_once("apihandler.php");

/*storing login information*/
function storeLoginInformation($db)
{
	
	$sql_query = sprintf("SELECT * FROM users WHERE username='%s';",$_SESSION['username']);
	$ret = $db->query($sql_query);
	while($row = $ret->fetchArray(SQLITE3_ASSOC))
	{
		$_SESSION['email'] = $row['email'];
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['country'] = $row['country'];
		$_SESSION['password'] = $row['password'];
	}
	$_SESSION['key'] = 'wz2eH73cx2LzfBh90sM9ZQ';
	$_SESSION['secret'] = 'L12gRDTyPwuG9unGB5JRWbWBW4d8U1rurlvA9ZliI';
	//var_dump($_SESSION);
}

//if the user has started his reading year, goto the main page else go to start page
function checkReadYear($db)
{
	$sql_query = sprintf("select * from reading_table where userid=%d;",$_SESSION['userid']);
	$ret = $db->query($sql_query);
	while($row = $ret->fetchArray(SQLITE3_ASSOC))
	{
		//reading year started for user
		header("Location: /reading_year.php");
		//echo 'woopie';
		exit(0);
	}
	//must register a reading year to start using site
	header("Location: /start.php");
}


$db = new myDatabase();
storeLoginInformation($db);
checkReadYear($db);

//sample api usage
$xml = apihandle(bookSearchURL("the hobbit"));
$reviews = getReviews($xml);
echo $reviews;


$db->close();
?>