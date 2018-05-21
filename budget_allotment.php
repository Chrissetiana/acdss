<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Budget Allocation</title>
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
									<h2 class="art-postheader">Budget Allocation</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											/*
											$table_query = mysql_query(" (SELECT id, uid, 'client_cs' AS location, fname, mname, lname, post, assistance, budget, date FROM client_cs WHERE status='Active')
																	UNION ALL (SELECT id, uid, 'client_gi' AS location, fname, mname, lname, post, assistance, budget, date FROM client_gi WHERE status='Active')																	
																	ORDER BY id ASC") or die("This webpage is not available.<br />".mysql_error());
											echo '<td bgcolor="#FFFFFF">'.mb_strimwidth($directory['description'], 0,300, "...").'</td>';
											*/
											$display = mysql_query(" (SELECT title, min_range, max_range, 'services' AS location FROM services WHERE status = 'Active')
															UNION ALL (SELECT mode, approved_assistance, COUNT(approved_budget) AS budget, 'requests' AS location FROM requests WHERE status = 'Active')
																") or die("This webpage is not available.<br />".mysql_error());
											if($display)
											{
												echo '<table class="art-article" border="1" cellpadding="2" cellspacing="2" style="width:100%;" class="static_text02">';
													echo '<tbody>';
														echo '<tr class="even" bgcolor="#666666">';
															echo '<th align="center" bgcolor="#FFFF99">Assistance</th>';
															echo '<th align="center" bgcolor="#FFFF99">Min. Range</th>';
															echo '<th align="center" bgcolor="#FFFF99">Max Range</th>';
															//echo '<th align="center" bgcolor="#FFFF99">Initial</th>';														
															//echo '<th align="center" bgcolor="#FFFF99">Requested</th>';
															//echo '<th align="center" bgcolor="#FFFF99">On-Hand</th>';
														echo '</tr>';
														$budget = $disp['budget'];
														$onhand = 100000 - $budget;
														while($disp = mysql_fetch_array($display))
														{															
															echo '<tr class="even">';
																echo '<td bgcolor="#FFFFFF">'.$disp['title'].'</td>';
																echo '<td bgcolor="#FFFFFF">300</td>';
																echo '<td bgcolor="#FFFFFF">3000</td>';
																//echo '<td bgcolor="#FFFFFF">100000</td>';																
																//echo '<td bgcolor="#FFFFFF">'.$budget.'</td>';
																//echo '<td bgcolor="#FFFFFF">'.$onhand.'</td>';
															echo '<tr>';
														}
														echo '<tr><th bgcolor="#FFFF99" colspan="6"	>Total records: '.mysql_num_rows($display).'</th></tr>';
													echo '</tbody>';
												echo '</table>';
											}
											mysql_close($link);
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