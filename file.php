<?php
	include("connection.php");
	
	$file = $_GET['file'];
	$uid = $_GET['uid'];
	
	$image_query = mysql_query("SELECT * FROM requirements WHERE uid='$uid' ") or die("This webpage is not available.".mysql_error());
	while($row = mysql_fetch_array($image_query))
	{
	echo "<img src='upload/$row[$file]'>";
	}
?>