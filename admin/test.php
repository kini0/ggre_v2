<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
<link type="text/css" href="./css/jquery.ui.all.css" rel="stylesheet">
	<script src="functions/js/jquery-1.4.4.min.js"></script>
	<script src="functions/js/jquery.ui.core.js"></script>
	<script src="functions/js/jquery.ui.widget.js"></script>
	<script src="functions/js/jquery.ui.datepicker.js"></script>
    <link type="text/css" href="./css/demos.css" rel="stylesheet" />
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
</head>

<body>		<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>



<div class="demo">

<p>Date: <input id="datepicker" type="text"></p>

</div><!-- End demo -->



<div style="display: none;" class="demo-description">
<p>The datepicker is tied to a standard form input field.  Focus on the input (click, or use the tab key) to open an interactive calendar in a small overlay.  Choose a date, click elsewhere on the page (blur the input), or hit the Esc key to close. If a date is chosen, feedback is shown as the input's value.</p>
</div><!-- End demo-description -->
<?php
include("functions/php/functions.php");

echo formatDateDB("28/12/2010");
?>
</body>
</html>