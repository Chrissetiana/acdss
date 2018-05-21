<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Home</title>
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
									<?php
										include("connection.php");										

										if($_SESSION['valid_type'] == 'Administrator')
										{
											$table_query = mysql_query("SHOW TABLES IN acdss");
											if ($table_query)
											{
												if (mysql_num_rows($table_query) != 0)
												{
													while ($table_row = mysql_fetch_array($table_query))
													{
														$tables = $table_row['Tables_in_acdss'];
														$table_status = mysql_query("SHOW TABLE STATUS FROM acdss LIKE '$tables'");
														if ($table_status)
														{
															if (mysql_num_rows($table_status) != 0)
															{
																while ($table_row = mysql_fetch_array($table_status))
																{
																	$table_name = explode('_', $table_row['Name']);
																	$one = $table_name[0];
																	$two = $table_name[1];
																	$three = $table_name[2];
																	$table = $one.' '.$two.' '.$three;
																	if ($tables != "account")
																	echo '<a href="admin_view.php?table='.$table_row['Name'].'" target=""><img src="images/'.$table_row['Name'].'.png" width="100" height="100" title="'.strtoupper($table).'" alt="'.strtoupper($table).'" /></a>';
																}																	
															}
														}
													}
												}
											}
											else
											{
												echo '<p>No records found!</p>';
											}
										}
										elseif($_SESSION['valid_type'] == 'Client')
										{
											echo '<h2 class="art-postheader"><font color="white">Antipolo City Decision Support System (ACDSS)</font></h2>';
											echo '<div class="art-postcontent art-postcontent-0 clearfix"><font color="#F1EDC2">';
												echo '<p style="text-align:center;"><span style="font-style:italic;">&quot;Mandated to alleviate poverty and empower the poor, the vulnerable and the disadvantaged families, communities and individuals for an improved quality of life.&quot;</span></p>';
												echo '<p><img src="images/CSWD-4.jpg" alt="CSWD" title="CSWD" style="float:left;" width="378" height="250" class="art-lightbox" /></p>';
												echo '<p><span style="font-weight:bold;"><font color="white">CSWD PROFILE:</font></span></p>';
												echo '<p>The City Social Welfare and Development Office by virtue of R.A.7160 is mandated to alleviate poverty and empower the poor, the vulnerable and the disadvantaged families, communities, and individuals for an improved quality of life. It is responsible for the following through the City Social Welfare and Development Officer:</p>';
												echo '<p>(1) Formulate measures for the approval of the sanggunian and provide technical assistance and support to the governor or mayor, as the case may be, in carrying out measures to endure the delivery of basic services and provisions of adequate facilities relative to social welfare and development services as provided for under Section 17 of this Code;</p>';
												echo '<p>(2) Develop plans and strategies and upon approval thereof by the governor or mayor, as the case may be, implement the same particularly those which have to do with social welfare programs and projects which the governor or mayor is empowered to implement and which the sanggunian is empowered to provide for under this Code;</p>';
												echo '<p>(3) Be in the frontline or service delivery, particularly those which have to do with immediate relief during and assistance in the aftermath of man-made and natural disaster and natural calamities; <a href="http://www.antipolo.gov.ph/cswd.php">more...<span style="font-style:italic;"><br /></span></a></p>';
												echo '<a href="#top" class="art-button">Go to Top</a>';												
											echo '</div>';
										}
										elseif($_SESSION['valid_type'] == 'CSWD')
										{
											echo '<h2 class="art-postheader">CSWD Home</font></h2>';
											echo '<div class="art-postcontent art-postcontent-0 clearfix">';
												echo '<p align="center">';
													//echo '<a href="search.php"><img src="images/view.png" width="128" height="128" alt="Search" title="Search" /></a>';
													echo '<a href="financial_assistance_app.php"><img src="images/unknown.png" width="128" height="128" alt="Add Record" title="Add Record" /></a>';
													echo '<a href="view.php"><img src="images/modify.png" width="128" height="128" alt="View Records" title="View Records" /></a>';
													echo '<a href="cswd_archives.php"><img src="images/archive.png" width="128" height="128" alt="Archived" title="Archived" /></a>';
												echo '</p>';
											echo '</div>';
										}
										elseif($_SESSION['valid_type'] == 'CADMIN')
										{
											echo '<h2 class="art-postheader">City Administrator Home</font></h2>';
												echo '<div class="art-postcontent art-postcontent-0 clearfix">';
													echo '<p align="center">';
														//echo '<a href="search.php"><img src="images/view.png" width="128" height="128" alt="Search" title="Search" /></a>';
														echo '<a href="view.php?post=pending"><img src="images/people.png" width="128" height="128" alt="Pending Requests" title="Pending Requests" /></a>';
														echo '<a href="view.php?post=approved"><img src="images/ok.png" width="128" height="128" alt="Approved Requests" title="Approved Requests" /></a>';
														echo '<a href="view.php?post=reapply"><img src="images/cancel.png" width="128" height="128" alt="Re-application Requests" title="Re-application Requests" /></a>';
													echo '</p>';
												echo '</div>';
										}
										elseif($_SESSION['valid_type'] == 'CBUDGET')
										{
											echo '<h2 class="art-postheader">City Budget Home</font></h2>';
											echo '<div class="art-postcontent art-postcontent-0 clearfix">';
												echo '<p align="center">';
													//echo '<a href="search.php"><img src="images/view.png" width="128" height="128" alt="Search" title="Search" /></a>';
													echo '<a href="view.php"><img src="images/reports.png" width="128" height="128" alt="For Financial Assistance Release" title="For Financial Assistance Release" /></a>';
													echo '<a href="budget_allotment.php"><img src="images/modify.png" width="128" height="128" alt="Budget Allocation" title="Budget Allocation" /></a>';
												echo '</p>';
											echo '</div>';
										}
										elseif($_SESSION['valid_type'] == 'CACCTG')
										{
											echo '<h2 class="art-postheader">City Accounting Home</font></h2>';
											echo '<div class="art-postcontent art-postcontent-0 clearfix">';
												echo '<p align="center">';
													//echo '<a href="search.php"><img src="images/view.png" width="128" height="128" alt="Search" title="Search" /></a>';
													echo '<a href="view.php"><img src="images/reports.png" width="128" height="128" alt="For Financial Assistance Release" title="For Financial Assistance Release" /></a>';
												echo '</p>';
											echo '</div>';
										}
										elseif($_SESSION['valid_type'] == 'CTRSRY')
										{
											echo '<h2 class="art-postheader">City Treasury Home</font></h2>';
											echo '<div class="art-postcontent art-postcontent-0 clearfix">';
												echo '<p align="center">';
													//echo '<a href="search.php"><img src="images/view.png" width="128" height="128" alt="Search" title="Search" /></a>';
													echo '<a href="view.php"><img src="images/reports.png" width="128" height="128" alt="For Financial Assistance Release" title="For Financial Assistance Release" /></a>';
												echo '</p>';
											echo '</div>';
										}
										else
										{
											echo '<script language="javascript">';
												echo 'alert("You must log-in first.");';
												echo 'location.replace("index.php");';
											echo '</script>';
										}
									?>
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