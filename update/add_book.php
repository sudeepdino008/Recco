<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/utilities.php");
$db = new myDatabase();

$bookid = $_GET['bookid'];
//echo $bookid;

$sql_query = sprintf("select * from book_record where userid=%d AND bookid=%d; ",$_SESSION['userid'],$bookid);
$ret = $db->query($sql_query);
$flag = 0;
while($row = $ret->fetchArray(SQLITE3_ASSOC))
{
	$flag = 1;
	break;
}

if($flag==0)
{
	//book record update
	$sql_query = sprintf("insert into book_record values(%d,%d,'2014-04-24','2014-04-24')",$_SESSION['userid'],$bookid);
	$ret = $db->exec($sql_query);
	
	//reading_table update
	$sql_query = sprintf("select * from reading_table where userid=%d;",$_SESSION['userid']);
	$ret = $db->query($sql_query);
	$str="";
	while($row = $ret->fetchArray(SQLITE3_ASSOC))
	{
		$str=$row['books'];
		break;
	}
	$str = sprintf("%s%d,",$str,$bookid);
	
	$sql_query = sprintf("update reading_table set books='%s' where userid=%d;",$str,$_SESSION['userid']);
	$ret = $db->exec($sql_query);
	header("Location: /search.php");
}


?>