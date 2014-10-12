<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/utilities.php");
include_once("$_SERVER[DOCUMENT_ROOT]/urlgenerate.php");
include_once("$_SERVER[DOCUMENT_ROOT]/apihandler.php");
// include_once("$_SERVER[DOCUMENT_ROOT]/view_book.php");

include_once("$_SERVER[DOCUMENT_ROOT]/gui/toplayer.php");
// include_once("utilities.php");
// include_once("apihandler.php");
// include_once("urlgenerate.php");

$input = $_POST["textinput"];
//echo $input;
$url = bookSearchURL($input);
$dom = apiHandle($url);

$description = getBookInfo("description",$dom);
$title = getBookInfo("title",$dom);
$rating = getBookInfo("average_rating",$dom);
$review = getBookInfo("reviews_widget",$dom);
$bookid = getBookInfo("id",$dom);
//var_dump(apiHandle1($url));
//echo $bookid;
// displayBook($title,$rating,$description,$review,$bookid);

//var_dump( $xml);


?>


<div class="container">
	<div class="row">
		<div class="col-md-10"><h1><?php echo $title; ?><small> - <?php echo $rating; ?></small></h1></div>
		<div class="col-md-2">
			<a href="/update/add_book.php?bookid=<?php echo $bookid; ?>" class="btn btn-primary btn-lg">Add to my shelf</a>
		</div>
	</div>
	<div class="row well"><?php echo $description; ?></div>
	<div class="row">
		<?php echo $review; ?>
	</div>
	<div class="container">
		
	</div>
</div>
<style type="text/css">
	#goodreads-widget{
		width: 100% !important;
	}
	#goodreads-widget iframe{
		width: 100% !important;
	}
</style>
