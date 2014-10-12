<?php
session_start();
include_once("gui/toplayer.php");
include_once("utilities.php");
include_once("apihandler.php");
include_once("urlgenerate.php");


// function displayBook($book_name,$rating,$description,$review_widget,$bookid)
// {
// 	//echo " Ratings $rating";
// 		//echo sprintf("<td><input type='date' name='end_date' value=%s></td>",$element[3]);
// 	echo sprintf("",$bookid);
// 	echo '
//     <div class="col-md-4></div>
// ';
// 	echo sprintf("<label class='col-md-4 control-label' for='textinput1'>%s</label>",$book_name);
// 	echo sprintf("<label class='col-md-4 control-label' for='textinput1'>%s</label>",$rating);
// 	echo sprintf("<label class='col-md-4 control-label' for='textinput1'>%s</label>",$description);
// 	echo sprintf("<label class='col-md-4 control-label' for='textinput2'>%s</label>",$review_widget);
// 	echo "  <label class='col-md-4'> </label></form> ";
	
// //	echo 	"<input type='submit' value='add book'> </form>";
// }


?>

<div class="container">
	<div class="row"><?php echo $title; ?></div>
	<div class="row"><?php echo $rating; ?></div>
	<div class="row"><?php echo $description; ?></div>
	<div class="row"><?php echo $review_widget; ?></div>
	<div class="row">
		<form action='/update/add_book.php?bookid=<?php echo $bookid; ?>' method='post'>
			<input type='submit' value='add book'> 
		</form>
	</div>
</div>
