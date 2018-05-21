<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Site Map</title>
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
									<h2 class="art-postheader"><font color = "white">ACDSS Site Map</font></h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<p align="center">
											<?php
												if($_SESSION['valid_type'] == 'Administrator')
												{
													echo '<li><a href="home.php">Administrator Home</a></li>';
													echo '<li><a href="admin_archives.php">Archives</a></li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="users.php">Create Another User</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'Client')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="services.php">Programs & Services</a><ul>';
														echo '<li><a href="services_relief_public_assistance.php">Relief and Public Assistance Division</a>';
															echo '<ul>';
																echo '<li><a href="services_relief_public_assistance.php#crisis">Assistance in Crisis Situation</a></li>';
																echo '<li><a href="services_relief_public_assistance.php#province">Balik-Probinsya Assistance</a></li>';
																echo '<li><a href="services_relief_public_assistance.php#core">Core Shelter Assistance</a></li>';
																echo '<li><a href="services_relief_public_assistance.php#emdisaster">Emergency Disaster Relief</a></li>';
																echo '<li><a href="services_relief_public_assistance.php#emshelter">Emergency Shelter Assistance</a></li>';
															echo '</ul>';
														echo '</li>';
														echo '<li><a href="services_comm_outreach.php">Community Outreach Division</a>';
															echo '<ul>';
																echo '<li><a href="services_comm_outreach.php#youth">Children and Youth Development Program</a></li>';
																echo '<li><a href="services_comm_outreach.php#family">Family and Community Development Program</a></li>';
																echo '<li><a href="services_comm_outreach.php#pwd">Persons with Disability Development Program</a></li>';
																echo '<li><a href="services_comm_outreach.php#senior">Senior Citizen"s Development Program</a></li>';
																echo '<li><a href="services_comm_outreach.php#women">Women"s Welfare Program</a></li>';
															echo '</ul>';
														echo '</li>';
														echo '<li><a href="services_residential_rehabilitation.php">Residential and Rehabilitation Division</a>';
															echo '<ul>';
																echo '<li><a href="services_residential_rehabilitation.php#bahaykalinga">Bahay Kalinga-Antipolo Center for Girls</a>';
																echo '<li><a href="services_residential_rehabilitation.php#daycenter">Day Center for Street Children cum CICL Custodial Care Shelter</a>';
															echo '</ul>';
														echo '</li>';
														echo '<li><a href="services_special_prog_proj.php">Special Programs and Projects</a>';
															echo '<ul>';
																echo '<li><a href="services_special_prog_proj.php#4ps">Pantawid Pamilyang Pilipino Program</a></li>';
																echo '<li><a href="services_special_prog_proj.php#certs">Issuance of Certificates, Referrals, Reports</a></li></ul></li>';
															echo '</ul>';
														echo '</li>';
													$table_query = mysql_query("SELECT * FROM clients WHERE uid='".$_SESSION['valid_uid']."' AND status='Active'") or die("This webpage is not available.<br />".mysql_error());
													if($table_query)
													{
														$table_row = mysql_fetch_array($table_query);
														echo '<li><a href="profile.php?form=clients&id='.$table_row['id'].'&uid='.$_SESSION['valid_uid'].'">Profile</a></li>';
													}
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'CSWD')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="financial_assistance_app.php">Add Record</a></li>';
													echo '<li><a href="">Manage Records</a>';
														echo '<ul>';						
															echo '<li><a href="view.php">Records</a></li>';							
															echo '<li><a href="cswd_archives.php">Archives</a></li>';
														echo '</ul>';
													echo '</li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'CADMIN')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="search.php">Search</a></li>';
													echo '<li><a href="">Requests</a>';
														echo '<ul>';
															echo '<li><a href="view.php?post=pending">Pending</a></li>';
															echo '<li><a href="view.php?post=approved">Approved</a></li>';
															echo '<li><a href="view.php?post=reapply">Re-apply</a></li>';
														echo '</ul>';
													echo '</li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'CBUDGET')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="view.php">Approved Assistances</a></li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'CACCTG')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="view.php">Approved Assistances</a></li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												elseif($_SESSION['valid_type'] == 'CTRSRY')
												{
													echo '<li><a href="home.php">Home</a></li>';
													echo '<li><a href="view.php">Approved Assistances</a></li>';
													echo '<li><a href="">Account</a>';
														echo '<ul>';
															echo '<li><a href="password.php">Change Login Details</a></li>';
															echo '<li><a href="logout.php">Logout</a></li>';
														echo '</ul>';
													echo '</li>';
												}
												else
													echo '<br />&nbsp;<br />';
											?>
										</p>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<hr /><?php include("footer.php"); ?>
			</div><br />
			</div>
		</div>
	</body>
</html>