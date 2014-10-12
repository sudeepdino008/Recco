<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/utilities.php");
$bookid = $_GET['bookid'];
//delete this book from the 2 databases for this user and return back to reading_year.php page
$db = new myDatabase();
$sql_query = sprintf("delete from book_record where userid=%d and bookid=%d;",$_SESSION['userid'],$bookid);
$ret = $db->exec($sql_query);

$sql_query = sprintf("select * from reading_table where userid=%d;",$_SESSION['userid']);
$ret = $db->query($sql_query);
$str="";
while($row = $ret->fetchArray(SQLITE3_ASSOC))
{
	$str=$row['books'];
	break;
}

$str = strtr($str,array(sprintf("%d,",$bookid)=>""));

$sql_query = sprintf("update reading_table set books='%s' where userid=%d;",$str,$_SESSION['userid']);
$ret = $db->exec($sql_query);

header("Location: /reading_year.php");
?>