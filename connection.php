<?php
	$link = mysql_connect("localhost", "root", "") or die ("Could not connect to web server<br />".mysql_error());
	$linkdb = mysql_select_db("acdss")or die("Could not open database<br />".mysql_error());
?>