<?php
	session_start();

	include("connection.php");

	if(!isset($_SESSION['valid_username']) && !isset($_SESSION['valid_password']))
	{
		echo '<script language="javascript">';
			echo 'alert("Please log-in first.");';
			echo 'location.replace("index.php");';
		echo '</script>';
	}
	$_SESSION['EXPIRES'] = time() + 3600;
	/*
	if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time() + 3600)
	{
		session_destroy();
		$_SESSION = array();
	}
	$_SESSION['EXPIRES'] = time() + 3600;
	*/
?>