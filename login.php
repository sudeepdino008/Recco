<?php 


session_start();
include "utilities.php";

function checkLogin($username, $passw, $db)
{
	//check if user exists
	$sql_query = vsprintf("select * from users where username='%s';",array($username));
	$ret = $db->query($sql_query);
	
	if(checkEmpty($ret))
	{
		header("Location: /index.php?message=nouser");
		return ;
	}

//check if password correct

	$sql_query = vsprintf("select * from users where username='%s' and password='%s';",array($username,$passw));
	$ret = $db->query($sql_query);

	if(checkEmpty($ret))
	{
		header("Location: /index.php?message=wrongpass");
		return;
	}
  
	$_SESSION['username'] = $username;
	//var_dump($_SESSION);
	header("Location: /userpage.php");
}

$db = new myDatabase();

$passw = $_POST["passwd"];
$username = $_POST["username"];

if(!$db || empty($passw))
	header("Location: /index.php?message=emptypass");   //if the database cannot be opened, redirect to login

// database found
checkLogin($username, $passw, $db);
$db->close();
?>
