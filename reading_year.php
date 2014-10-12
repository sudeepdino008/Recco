<?php
session_start();
include_once("gui/toplayer.php");
include_once("utilities.php");
include_once("apihandler.php");
include_once("urlgenerate.php");

function createList()
{
	//var_dump($_SESSION);
	$db = new myDatabase();
	$sql_query = sprintf("select * from book_record where userid=%d",$_SESSION['userid']);
	$ret = $db->query($sql_query);
	$bid = array();
	$bname = array();
	$sdate = array();
	$edate = array();

	while($row = $ret->fetchArray(SQLITE3_ASSOC))
	{
		/* if($row['bookid']==5907) */
		/* { */
		array_push($bid,$row['bookid']);
		$xmlDOM = apihandle(bookReviewFromID($row['bookid']));
		array_push($bname,getBookInfo("title",$xmlDOM));
		array_push($sdate,$row['start_date']);
		array_push($edate,$row['end_date']);
	}
	//var_dump($bid);
	$db->close();
	return array_map(null,$bid,$bname,$sdate,$edate);
}

function nbooksRead($db)
{
	$sql_query = sprintf("select * from reading_table where userid=%d;",$_SESSION['userid']);
	$ret = $db->query($sql_query);
	$count = array(0=>0,1=>0);
	while($row=$ret->fetchArray(SQLITE3_ASSOC))
	{
		$count[0] = $row['books_num'];   //target
		$arr = explode(',',$row['books']);
		$cnt = 0;
		foreach($arr as $val)
		{
			$sql_query_1 = sprintf("select * from book_record where userid=%d and bookid=%d;",$_SESSION['userid'],$val);
			$ret1 = $db->query($sql_query_1);
			$date = date("Y-m-d");
			while($row1=$ret1->fetchArray(SQLITE3_ASSOC))
			{
				if($date>=$row1['end_date'])
					$cnt++;
				break;
			}
		}
		
		
		$count[1] = $cnt;
		return $count;
	}
}

$db = new myDatabase();
$count = nbooksRead($db);
$db->close();
//var_dump($count);
/* echo sprintf("<center><progress class='progress progress-striped active' value='%d' max='%d'></progress></center><br><br>",$count[1],$count[0]); */

echo '
<div class="progress progress-striped">
  <div class="progress-bar"  role="progressbar" aria-valuenow="'.$count[1].'" aria-valuemin="0" aria-valuemax="'.$count[0].'" style="width: '.($count[1]/$count[0]*100).'%">
 '.$count[1].'/'.$count[0].' books completed
  </div>
</div>';

//table stuff begins
//   <span class="sr-only">45% Complete</span>
echo "<table style='width:1000px' align='center' padding=1px margin-top:10px>";
echo "<tr>";
//echo "<th>remove</th>";
echo "<th>Book</th>";
echo "<th>Start Date</th>";
echo "<th>End Date</th>";
echo "<th>Save</th>";
echo "</tr>";

$list = createList();
$c=0;
foreach($list as $element)
{
	$c++;
	//if($c==4)
	//	break;
	echo "<tr>";
	//echo $element[2];
	//var_dump($element[1]);
	
	//var_dump($element);
	//echo sprintf("<td><a href='update/getBookInfo.php' title='textinput' method='post'>%s</a></td>"/*,strtr($element[1],array(" "=>"+"))*/,$element[1]);
	echo sprintf("<td>%s</td>"/*,strtr($element[1],array(" "=>"+"))*/,$element[1]);
	echo sprintf("<form action='update/save_book.php?bookid=%d' method='post'>",$element[0]);
	echo sprintf("<td><input type='date' name='start_date' value=%s></td>",$element[2]);
	echo sprintf("<td><input type='date' name='end_date' value=%s></td>",$element[3]);
	echo sprintf("<td><button style='background:none; border:none;' ><img alt='save details' src='images/save.png' title='save details'></button></td>");
	//echo sprintf("<td><a href='update/save_book.php?bookid=%d&start_date=%s&end_date=%s'><img alt='save details' src='images/save.png' title='save details'></a></td>",$element[0],$_POST['start_date'],$_POST['end_date']);   /*$element[2],$element[3]);*/
	echo "</form>";
	echo sprintf("<td><a href='update/delete_book.php?bookid=%d'><img alt='remove this book' src='images/remove.png' title='remove this book'></a></td>",$element[0]);
	//echo "</form>";
	echo "</tr>";
}

echo "</table>";


//table stuff ends
?>
