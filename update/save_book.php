<?php
include_once("$_SERVER[DOCUMENT_ROOT]/utilities.php");
session_start();
$bookid = $_GET['bookid'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];



$db = new myDatabase();
$sql_query = sprintf("update book_record set start_date='%s',end_date='%s' where userid=%d AND bookid=%d;",$start_date,$end_date,$_SESSION['userid'],$bookid);
//echo $sql_query;
$ret = $db->exec($sql_query);
$db->close();

header("Location: /reading_year.php");

?>