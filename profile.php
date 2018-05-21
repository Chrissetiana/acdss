<?php
	include("session_call.php");

	if ((isset($_GET['form'])) || (isset($_GET['id'])) || (isset($_GET['uid'])))
	{
		$form = trim($_GET['form']);
		$id = trim($_GET['id']);
		$uid = trim($_GET['uid']);
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
		<title>ACDSS | Profile</title>
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
									<form action="referral.php" method="GET" target="" enctype="multipart/form-data">
									<h2 class="art-postheader"><a href="">Profile</a></h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");

											$form = $_GET['form'];
											$id = $_GET['id'];
											$uid = $_GET['uid'];

											$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE id='$id' OR uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
											if($profile_query)
											{
												if(mysql_num_rows($profile_query) > 0)
												{
													while($profile_rec = mysql_fetch_array($profile_query))
													{
														$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];
														echo '<h4>Showing records of '.strtoupper($profile_rec['lname']).', '.strtoupper($profile_rec['fname']).' '.strtoupper(substr($profile_rec['mname'], 0, 1)).'.</h4>';
														echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
															echo '<tbody>';
																echo '<tr>';
																	echo '<td style="border:0;width:25%;">Date of request</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['date'].'</td>';
																echo '</tr>';
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																echo '<tr>';
																	echo '<td style="border:0;">User ID</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['uid'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Name</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$name.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Age</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['age'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Gender</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['gender'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Birthdate</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['bdate'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Birth Place</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['bplace'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Civil Status</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['civilstat'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Religion</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['religion'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Educational Attainment</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['educ'].'</td>';
																echo '</tr>';
																	echo '<tr>';
																	echo '<td style="border:0;">Occupation</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['job_title'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Est. Monthly Income</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['income'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">No. of Dependents</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.count(unserialize($profile_rec['dep_name'])).'</td>';
																echo '</tr>';																
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Barangay</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['brgy'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Address</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['address'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Contact No.</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['telno'].'</td>';
																echo '</tr>';
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Requirements</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;"><a href="requirements.php?&amp;uid='.$profile_rec['uid'].'&amp;name='.urlencode($name).'&amp;assistance='.$profile_rec['assistance'].'">Click to view</a></td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Requested Assistance</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['assistance'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Suggested Budget</td>';
																	echo '<td style="border:0;">:</td>';
																	$getsum = mysql_query("SELECT approved_budget FROM requests WHERE uid='".$profile_rec['uid']."' ");
																	$sum = mysql_fetch_object($getsum);
																	echo '<td style="border:0;">'.$sum -> approved_budget.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Post</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['post'].'</td>';
																echo '</tr>';
															echo '</tbody>';
														echo '</table>';
														echo '<br />';
														echo '<input type="button" name="return" value="Back" onclick="window.history.go(-1);" class="art-button" />';
										?>
														<input type="button" name="print" value="Print" class="art-button" onclick="location.replace('print.php?form=profile&amp;user=<?php echo $_SESSION['valid_type']; ?>&amp;uid=<?php echo $profile_rec['uid']; ?>');" target="_blank" />
										<?php
														echo '&nbsp;&nbsp;';
														if($_SESSION['valid_type'] <> 'Client')
														{
															echo '<input type="submit" name="referral" value="Referral" onclick="location.replace("referral.php?uid='.$profile_rec['uid'].'&assistance='.$profile_rec['assistance'].'");" class="art-button" />';
															echo '<input type="hidden" name="uid" value="'.$profile_rec['uid'].'" class="art-button" />';
															echo '<input type="hidden" name="assistance" value="'.$profile_rec['assistance'].'" class="art-button" />';
														}
													}
												}
												else
													echo 'No records found.';
											}
											else
												echo 'Trouble in fetching data.';
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