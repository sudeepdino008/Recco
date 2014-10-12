<?php 

session_start();
include "utilities.php";

function checkUserExist($username, $db)
{
	$sql_query = vsprintf("SELECT * FROM users WHERE username='%s';",array($username));
	$ret = $db->query($sql_query);
	//echo 'jajjaj';
	if(checkEmpty($ret))      //if user exists, return to index page
		header("Location: /index.php?message=userexist");
}

function checkPasswords($pass1,$pass2)
{
	//echo $pass1, $pass2;
	if(empty($pass1))
		header("Location: /index.php?message=emptypass");   //if empty password entered, redirect to login
	if(strcmp($pass1,$pass2))  //if the password do not match
		header("Location: /index.php?message=nopassmatch");
}

function createUser($username,$email,$country,$passwd,$db)
{
   $sql_query = vsprintf("insert into users values(null,'%s','%s','%s','%s');",array($username,$email,$country,$passwd));
	$ret = $db->exec($sql_query);
	if(!$ret)
	{
		echo 'not good';
		//	header("Location: /database_error.php");
	}
	else 
	{
		
		$sql_query = vsprintf("SELECT * FROM users WHERE username='%s';",array($username));
		$ret = $db->query($sql_query);
		if($row = $ret->fetchArray(SQLITE3_ASSOC))
			$_SESSION['userid'] = $row['userid'];

		$_SESSION['username'] = $username;
		//echo $_SESSION['username'];
		header("Location: /userpage.php");
	}
}



$db = new myDatabase();

$passwd = $_POST["passwd"];
$conf_passw = $_POST["conf_passwd"];
$username = $_POST["username"];
$email = $_POST["email"];
$country = $_POST["country"];

echo $passwd;
echo $conf_passw;

if(!$db)
	header("Location: /database_error.php");


checkPasswords($passwd,$conf_passw);
checkUserExist($username,$db);

//now we can create the user
createUser($username,$email,$country,$passwd,$db);

$db->close();
?>
