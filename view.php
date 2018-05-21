<?php
	include("session_call.php");

	if ((isset($_GET['table'])))
	{
		$table_name = trim($_GET['table']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Records</title>
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
									<form action="search.php" method="GET" target="_blank" enctype="multipart/form-data">
									<h2 class="art-postheader">View Client Records</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
									<!--
									<center>
										<input type="search" name="keyword" autocomplete="on" />
										<input type="submit" name="search" class="art-button" value="Search" />
									</center>
									<br />
									-->
									<?php
										include("connection.php");

										if($_SESSION['valid_type'] == 'CSWD')
										{
											$table_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname, post, assistance, budget, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE status='Active' ORDER BY date DESC")
																 or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													echo '<br />';
													echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
														echo '<tbody>';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99">DATE OF REQUEST</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">POST</th>';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
															echo '</tr>';

															$other = mysql_query("SELECT * FROM requests");
															$get_other = mysql_fetch_array($other);

														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="profile.php?form='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'">'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="cswd_edit.php?table='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;uid='.$table_row['uid'].'&amp;name='.urlencode($name).'&amp;action=edit"><img src="images/edit.png" title="Edit" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="cswd_delete.php?table='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'&amp;action=delete"><img src="images/delete.png" title="Delete" width="20" height="20" /></a></td>';
															echo '</tr>';
														}
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" colspan="6">'.mysql_num_rows($table_query).' records found</th>';
															echo '<td bgcolor="#FFFF99"><a href="financial_assistance_app.php?&amp;action=add"><img src="images/add.png" title="Add" width="20" height="20" /></a></td>';
															//echo '<td bgcolor="#FFFF99"><a href="print.php?table=clients&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
														echo '</tr>';
														echo '</tbody>';
													echo '</table>';
												}
												else
													echo 'No records found';
											}
										}
										elseif($_SESSION['valid_type'] == 'CADMIN')
										{
											$post = $_GET['post'];
											$table_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname, post, assistance, budget, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE post='$post' AND status='Active' ORDER BY date DESC")
																 or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													echo '<br />';
													echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
														echo '<tbody>';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99">DATE OF REQUEST</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">POST</th>';
																echo '<th bgcolor="#FFFF99" colspan="2">ACTION</th>';
															echo '</tr>';

														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="profile.php?form='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'">'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="result.php?uid='.$table_row['uid'].'&amp;name='.urlencode($name).'&amp;action=approved"><img src="images/success.png" title="Approve" width="20" height="20" /></a></td>';
																echo '<td bgcolor="#FFFFFF"><a href="result.php?uid='.$table_row['uid'].'&amp;name='.urlencode($name).'&amp;action=reapply"><img src="images/delete.png" title="Reapply" width="20" height="20" /></a></td>';
															echo '</tr>';
														}
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" colspan="7">'.mysql_num_rows($table_query).' records found</th>';
															//echo '<td bgcolor="#FFFF99" colspan="2"><a href="print.php?table=clients&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
														echo '</tr>';
														echo '</tbody>';
													echo '</table>';
												}
												else
													echo 'No records found';
											}
										}
										elseif($_SESSION['valid_type'] == 'CBUDGET')
										{
											$table_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname, post, assistance, budget, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE post='Approved' AND status='Active' ORDER BY date DESC")
																 or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													echo '<br />';
													echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
														echo '<tbody>';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99">DATE OF REQUEST</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">POST</th>';
															echo '</tr>';
														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="profile.php?form='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'">'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
															echo '</tr>';
														}
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" colspan="5">'.mysql_num_rows($table_query).' records found</th>';
															//echo '<td bgcolor="#FFFF99"><a href="print.php?table=clients&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
															echo '</tr>';
														echo '</tbody>';
													echo '</table>';
												}
												else
													echo 'No records found';
											}
										}
										elseif($_SESSION['valid_type'] == 'CACCTG')
										{
											$table_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname, post, assistance, budget, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE post='Approved' AND status='Active' ORDER BY date DESC")
																 or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													echo '<br />';
													echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
														echo '<tbody>';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99">DATE OF REQUEST</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">POST</th>';
															echo '</tr>';
														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="profile.php?form='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'">'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
															echo '</tr>';
														}
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" colspan="5">'.mysql_num_rows($table_query).' records found</th>';
															//echo '<td bgcolor="#FFFF99"><a href="print.php?table=clients&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
															echo '</tr>';
														echo '</tbody>';
													echo '</table>';
												}
												else
													echo 'No records found';
											}
										}
										elseif($_SESSION['valid_type'] == 'CTRSRY')
										{
											$table_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname, post, assistance, budget, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE post='Approved' AND status='Active' ORDER BY date DESC")
																 or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													echo '<br />';
													echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
														echo '<tbody>';
															echo '<tr bgcolor="#666666">';
																echo '<th bgcolor="#FFFF99">DATE OF REQUEST</th>';
																echo '<th bgcolor="#FFFF99">UID</th>';
																echo '<th bgcolor="#FFFF99">NAME</th>';
																echo '<th bgcolor="#FFFF99">ASSISTANCE</th>';
																echo '<th bgcolor="#FFFF99">POST</th>';
															echo '</tr>';
														while ($table_row = mysql_fetch_array($table_query))
														{
															$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
															echo '<tr>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
																echo '<td bgcolor="#FFFFFF"><a href="profile.php?form='.$table_row['location'].'&amp;id='.$table_row['id'].'&amp;name='.urlencode($name).'">'.$name.'</a></td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
																echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
															echo '</tr>';
														}
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" colspan="5">'.mysql_num_rows($table_query).' records found</th>';
															//echo '<td bgcolor="#FFFF99"><a href="print.php?table=clients&amp;action=print"><img src="images/print.png" title="Print" width="20" height="20" /></a></td>';
															echo '</tr>';
														echo '</tbody>';
													echo '</table>';
												}
												else
													echo 'No records found';
											}
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