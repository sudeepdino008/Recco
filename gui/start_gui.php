<head>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
</head>
<body>

<center>
<form action="/update/start_update.php" method="post">
<br><br><br>
 <!--
	 handle: blankfield
-->

	 Start Date:<br> <input type="date" name="start_date"><br><br>
	 End Date:<br> <input type="date" name="end_date"><br><br>
	 Number of Books to Complete:<br> <input type="number" name="books_num" min="1" max="2000" value="1"><br><br>
	 
	<input type="submit"> <br>
	
</form>
</center>


</body>
