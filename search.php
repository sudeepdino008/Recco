<?php
include_once("gui/toplayer.php");


?>

<form class="form-horizontal" action="update/getBookInfo.php" method="post">
<fieldset>



<!-- Text input-->
<div class="form-group">
  <!-- <label class="col-md-4 control-label" for="textinput">Query</label>   -->
  <div class="col-md-3"></div>
  <div class="col-md-3">
  	<input id="textinput" name="textinput" type="text" placeholder="Search" class="form-control input-md">
  </div>
  <div class="col-md-3">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Search</button>
  </div>
  <div class="col-md-3">
  </div>
</div>


</fieldset>
</form>
