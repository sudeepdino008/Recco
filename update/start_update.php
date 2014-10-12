<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/utilities.php");
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$books_num = $_POST['books_num'];

$db = new myDatabase();
$sql_query = sprintf("insert into reading_table values(%d,'%s','%s',%d,'%s');",$_SESSION['userid'],$start_date,$end_date,$books_num,NULL);
$db->exec($sql_query);
$db->close();
header("Location: /reading_year.php");

?>
