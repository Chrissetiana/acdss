<?php
	include("session_call.php");
	if($_SESSION['valid_type'] != 'Administrator')
	{
		echo '<script language="javascript">';
			echo 'location.replace("index.php");';
		echo '</script>';
	}

	if ((isset($_GET['table'])))
	{
		$table_name = trim($_GET['table']);
	}
	else
	{
		header("location: home.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Admin | View</title>
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
									<h2 class="art-postheader">View Records</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");
											error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
										?>
											<!--<center>
												<label for="select-topic">Select table to view: </label>
												<select name="table_name">
												<option value="" selected="selected" disabled="disabled">Select One</option>
													<?php include("combo_tables.php"); ?>
												</select>
												<input type="button" name="refresh" value="Refresh" onclick="location.replace("admin_view.php")" class="art-button" />
											</center>
											<br />-->
										<?php
											$table_name = $_GET['table'];

											$table_query = mysql_query("SELECT * FROM $table_name ORDER by id ASC") or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													if($table_name == 'clients')
													{
														echo '<br />';
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">DATE CREATED</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}													
													elseif($table_name == "directory")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">OFFICE</th>';
																echo '<th bgcolor="#FFFF99">FLOOR</th>';
																echo '<th bgcolor="#FFFF99">EMAIL</th>';
																echo '<th bgcolor="#FFFF99">TEL NO</th>';
																echo '<th bgcolor="#FFFF99">OIC</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['office'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['floors'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['email'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['telno'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['oic'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "faq")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">QUESTION</th>';
																echo '<th bgcolor="#FFFF99">ANSWER</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['question'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['answer'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "feedback")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">EMAIL</th>';
																echo '<th bgcolor="#FFFF99">GENDER</th>';
																echo '<th bgcolor="#FFFF99">RATING</th>';
																echo '<th bgcolor="#FFFF99">MESSAGE</th>';
																echo '<th bgcolor="#FFFF99">DATE POSTED</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['fname'].' '.$table_row['sname'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['email'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['gender'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['rating'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['comments'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['dateposted'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "flow")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">DEPARTMENT</th>';
																echo '<th bgcolor="#FFFF99">INPUT</th>';
																echo '<th bgcolor="#FFFF99">PROCESS</th>';
																echo '<th bgcolor="#FFFF99">OUTPUT</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['dept'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['input'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['process'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['output'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "legal")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">TERMS</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['tc'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "log")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">DATE</th>';
																echo '<th bgcolor="#FFFF99">USER</th>';
																echo '<th bgcolor="#FFFF99">TYPE</th>';
																echo '<th bgcolor="#FFFF99">ACTIVITY</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['username'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['type'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['audit'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "requests")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">APPROVED ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">APPROVED BUDGET</th>';
																echo '<th bgcolor="#FFFF99">MODE</th>';
																echo '<th bgcolor="#FFFF99">SOURCE</th>';
																echo '<th bgcolor="#FFFF99">DATE</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['username'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['name'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['approved_assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['approved_budget'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['mode'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['source'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "requirements")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['username'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="requirements.php?uid='.$table_row['uid'].'>'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "services")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">TITLE</th>';
																echo '<th bgcolor="#FFFF99">DIVISION</th>';
																echo '<th bgcolor="#FFFF99">DESCRIPTION</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['title'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['division'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['description'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
													elseif($table_name == "users")
													{
														echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
																echo '<th bgcolor="#FFFF99">ID</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">TYPE</th>';
																echo '<th bgcolor="#FFFF99">DATE CREATED</th>';
																echo '<th bgcolor="#FFFF99">STATUS</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_edit.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="admin_delete.php?table='.$table_name.'&amp;id='.$table_row['id'].'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['username'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['type'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['dateAdded'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
															echo '</tr>';
														}
													}
														echo '<tr bgcolor="#666666">';
															echo '<td bgcolor="#FFFF99"><a href="admin_add.php?table='.$table_name.'&amp;action=add"><img src="images/add.png" title="Add" width="20" height="20" /></a></td>';
															echo '<td bgcolor="#FFFF99"><a href="admin_print.php?table='.$table_name.'&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
															echo '<td bgcolor="#FFFF99"><a href="report.php?table='.$table_name.'&amp;"><img src="images/report.png" title="Reports" width="20" height="20" /></a></td>';															
															echo '<td bgcolor="#FFFF99" colspan="8">'.mysql_num_rows($table_query).' records found</td>';
																		
														echo '</tr>';
																	
																	
																	echo '</table>';
																	
												}
												else
													echo 'No records found.';
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