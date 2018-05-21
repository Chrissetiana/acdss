<?php
	include("session_call.php");
	if($_SESSION['valid_type'] != 'CSWD')
	{
		echo '<script language="javascript">';
			echo 'location.replace("index.php");';
		echo '</script>';
	}

	if ((isset($_GET['table'])) && (isset($_GET['id'])) && (isset($_GET['action'])) )
	{
		$table_name = trim($_GET['table']);
		$id = trim($_GET['id']);
		$action = trim($_GET['action']);
	}
	else
	{
		header("location: cswd_archives.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Admin | Restore</title>
		<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.css" media="screen" />
		<!--[if lte IE 7]><link type="text/css" rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.responsive.css" media="all" />

		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript" src="script.responsive.js"></script>
		<meta name="description" content="Description" />
		<meta name="keywords" content="Keywords" />
	</head>
	<body><a name="top"></a>
		<div id="art-main">
			<?php
				include("header.php");
				echo '<p align="right"><font color="white" size="2">Current User: '.strtoupper($_SESSION['valid_username']).'&nbsp;&nbsp;</font></p>';
				include("nav.php");
			?>
			<div class="art-sheet clearfix">
				<div class="art-layout-wrapper clearfix">
					<div class="art-content-layout">
						<div class="art-content-layout-row">
							<div class="art-layout-cell art-content clearfix">
								<article class="art-post art-article">
									<h2 class="art-postheader">Restore Record</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");

											$table_name = $_GET['table'];
											$row_id = $_GET['id'];
											$action = $_GET['action'];

											$table_archive = mysql_query("UPDATE $table_name SET status = 'Active' WHERE $table_name.id=$id LIMIT 1") or die("Cannot delete record.<br />".mysql_error());
											if($table_archive)
											{
												echo '<script language="javascript">';
													echo 'alert("Record with id '.$id.' restored.");';
													echo 'location.replace("cswd_archives.php");';
												echo '</script>';
											}
											else
											{
												echo '<script language="javascript">';
													echo 'alert("Cannot restore record!");';
													echo 'location.replace("cswd_archives.php");';
												echo '</script>';
											}
										?>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<hr /><?php include("footer.php"); ?>
			</div><br />
		</div>
	</body>
</html>