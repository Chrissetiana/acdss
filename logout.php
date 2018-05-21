<?php
	session_start();
	//$insert_trail = "INSERT INTO log(username, type, activity) VALUES('".$_SESSION['valid_username']."','".$_SESSION['valid_type']."','Logout')";
	//$_SESSION = array();
	//$result = mysql_query($insert_trail);
	session_destroy();
	header("location:index.php");
?>