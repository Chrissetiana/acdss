<?php
	include("session_call.php");
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
									<center>
										<input type="search" name="keyword" autocomplete="on" />
										<input type="submit" name="search" class="art-button" value="Search" />
									</center><br />
									<?php
										include("connection.php");
										
										$table_query = mysql_query(" (SELECT 'client_cs' AS location, assistance, brgy, count(post) FROM client_cs WHERE status='Active')
															UNION ALL (SELECT 'client_gi' AS location, assistance, brgy, count(post) FROM client_gi WHERE status='Active')
															UNION ALL (SELECT 'client_pwd' AS location, assistance, brgy, count(post) FROM client_pwd WHERE status='Active')
															UNION ALL (SELECT 'client_sen' AS location, assistance, brgy, count(post) FROM client_sen WHERE status='Active')
															UNION ALL (SELECT 'client_yth' AS location, assistance, brgy, count(post) FROM client_yth WHERE status='Active')
															") or die("This webpage is not available.<br />".mysql_error());
										$approved_query = mysql_query(" (SELECT 'client_cs' AS location, assistance, brgy, post FROM client_cs WHERE post='Approved' AND status='Active')
															UNION ALL (SELECT 'client_gi' AS location, assistance, brgy, post FROM client_gi WHERE post='Approved' AND status='Active')
															UNION ALL (SELECT 'client_pwd' AS location, assistance, brgy, post FROM client_pwd WHERE post='Approved' AND status='Active')
															UNION ALL (SELECT 'client_sen' AS location, assistance, brgy, post FROM client_sen WHERE post='Approved' AND status='Active')
															UNION ALL (SELECT 'client_yth' AS location, assistance, brgy, post FROM client_yth WHERE post='Approved' AND status='Active')
															") or die("This webpage is not available.<br />".mysql_error());
										$pending_query = mysql_query(" (SELECT 'client_cs' AS location, assistance, brgy, post FROM client_cs WHERE post='Pending' AND status='Active')
															UNION ALL (SELECT 'client_gi' AS location, assistance, brgy, post FROM client_gi WHERE post='Pending' AND  status='Active')
															UNION ALL (SELECT 'client_pwd' AS location, assistance, brgy, post FROM client_pwd WHERE post='Pending' AND  status='Active')
															UNION ALL (SELECT 'client_sen' AS location, assistance, brgy, post FROM client_sen WHERE post='Pending' AND  status='Active')
															UNION ALL (SELECT 'client_yth' AS location, assistance, brgy, post FROM client_yth WHERE post='Pending' AND  status='Active')
															") or die("This webpage is not available.<br />".mysql_error());
										if($table_query)
										{
											if(mysql_num_rows($table_query) > 0)
											{
												echo '<br />';
												echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
													echo '<tbody>';
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99" rowspan="2">TYPE OF ASSISTANCE</th>';
															echo '<th bgcolor="#FFFF99" rowspan="2">BARANGAY</th>';																
															echo '<th bgcolor="#FFFF99" colspan="2">NO. OF CLIENTS </th>';
														echo '</tr>';
														echo '<tr bgcolor="#666666">';
															echo '<th bgcolor="#FFFF99">PENDING</th>';																
															echo '<th bgcolor="#FFFF99">APPROVED </th>';
														echo '</tr>';
													$approved = mysql_fetch_array($approved_query);
													$pending = mysql_fetch_array($pending_query);
													while ($table_row = mysql_fetch_array($table_query))
													{
														$name = $table_row['assistance'].' '.$table_row['brgy'].' '.$table_row['post'];
														echo '<tr>';
															echo '<td bgcolor="#FFFFFF">'.$table_row['assistance'].'</td>';
															echo '<td bgcolor="#FFFFFF">'.$table_row['brgy'].'</td>';
															echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
															echo '<td bgcolor="#FFFFFF">'.$table_row['post'].'</td>';
														echo '</tr>';
													}
													echo '<tr bgcolor="#666666">';
														echo '<td bgcolor="#FFFF99" colspan="4">Total records found: '.mysql_num_rows($table_query).'</td>';
													echo '</tr>';
													echo '</tbody>';
												echo '</table>';
											}
											else
												echo 'No records found';
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