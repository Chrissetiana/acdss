<?php
	include("session_call.php");

	if (isset($_GET['uid']))
	{
		$uid = trim($_GET['uid']);
	}
	else
	{
		header("location: index.php");
		//window.history.go(-1);
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Client | Requirements</title>
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
									<form action="upload.php" method="POST" target="_self" enctype="multipart/form-data">
									<h2 class="art-postheader">Requirements</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">

										<?php
											include("connection.php");

											$uid = $_GET['uid'];
											$name = urldecode($_GET['name']);
											$assistance = $_GET['assistance'];

											$req_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM requirements WHERE uid='$uid' ") or die("Error in querying data.<br />".mysql_error());
											if($req_query)
											{
												if(mysql_num_rows($req_query) > 0)
												{
													while($rec_query = mysql_fetch_array($req_query))
													{
														echo '<h4>Showing requirements of '.strtoupper($rec_query['username']).'</h4>';
														echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
															echo '<tbody>';
																echo '<tr>';
																	echo '<td style="border:0;width:25%;">User ID</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$rec_query['uid'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;width:25%;">Date of request</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$rec_query['date'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Requested Assistance</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$assistance.'</td>';
																echo '</tr>';
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';

																if($assistance == 'Medical')
																{
																	echo '<tr>';
																		echo '<td style="border:0;">Barangay Clearance /<br />Indigency Certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['brgy_clearance'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=brgy_clearance"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																			echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Voters ID /<br />COMELEC certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['comelec_voter'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=comelec_voter"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Clinical Abstract</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['clinical_abstract'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=clinical_abstract"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Doctors Prescription</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['doctors_prescription'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=doctors_prescription"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Hospital Bill</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['doctors_prescription'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=hosp_bill"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Checkup Schedule</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['doctors_prescription'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=checkup_sched"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																}
																elseif($assistance == 'Burial')
																{
																	echo '<tr>';
																		echo '<td style="border:0;">Barangay Clearance /<br />Indigency Certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['brgy_clearance'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=brgy_clearance"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Voters ID /<br />COMELEC certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['comelec_cert'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=comelec_cert"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Death Certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['death_cert'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=death_cert"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Funeral Contract</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['death_cert'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=funeral_contract"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																}
																elseif($assistance == 'Financial')
																{
																	echo '<tr>';
																		echo '<td style="border:0;">Barangay Clearance /<br />Indigency Certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['brgy_clearance'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=brgy_clearance"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																	echo '<tr>';
																		echo '<td style="border:0;">Voters ID /<br />COMELEC certificate</td>';
																		echo '<td style="border:0;">:</td>';
																		if($rec_query['brgy_clearance'] !="")
																		{
																		echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=comelec_cert"><img src="images/success.png" height="25" width="25"/></a></td>';
																		}
																		else
																		{
																		echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																		}
																	echo '</tr>';
																	echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																}
																echo '<tr>';
																	echo '<td style="border:0;">Valid ID</td>';
																	echo '<td style="border:0;">:</td>';
																	if($rec_query['valid_id'] !="")
																	{
																	echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=valid_id"><img src="images/success.png" height="25" width="25"/></a></td>';
																	}
																	else
																	{
																	echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																	}
																echo '</tr>';
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Photo</td>';
																	echo '<td style="border:0;">:</td>';
																	if($rec_query['valid_id'] !="")
																	{
																	echo '<td style="border:0;"><a href="file.php?uid='.$uid.'&file=pic"><img src="images/success.png" height="25" width="25"/></a></td>';
																	}
																	else
																	{
																	echo '<td style="border:0;"><img src="images/error.png" height="25" width="25"/></td>';
																	}
																echo '</tr>';
															echo '</tbody>';
														echo '</table>';
														echo '<br />';
														echo '<input type="button" name="return" value="Back" onclick="window.history.go(-1);" class="art-button" />';
														echo '&nbsp;&nbsp;&nbsp;';
														if($_SESSION['valid_type'] == 'CSWD')
														{
															echo '<input type="submit" name="update" value="Update" class="art-button" />';
															echo '<input type="hidden" name="name" value="'.$name.'" class="art-button" />';
															echo '<input type="hidden" name="uid" value="'.$uid.'" class="art-button" />';
															echo '<input type="hidden" name="assistance" value="'.$assistance.'" class="art-button" />';
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
									</form>
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