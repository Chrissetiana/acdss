<?php
	include("session_call.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Referral</title>
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
									<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" target="_self" enctype="multipart/form-data">
									<!--<h2 class="art-postheader">Client Profile</h2>-->
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");

											$uid = $_GET['uid'];
											
											$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
											if($profile_query)
											{
												while($profile_rec = mysql_fetch_array($profile_query))
												{
													echo '<br /><br />';
													/*$dateTime = new DateTime("", new DateTimeZone('Asia/Taipei'));
													echo $current_date = date("F d, Y").'<br />';
													echo $current_date = date("h:i A", strtotime("+8 hour"));
													$dateTimeZone = new DateTimeZone('GMT');
													$dateTime->setTimezone($dateTimeZone);
													*/echo $profile_rec['date'];
													$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];
													$getsum = mysql_query("SELECT approved_budget FROM requests WHERE uid='$uid' ");
													$sum = mysql_fetch_object($getsum);
													echo '<p>Sir/Madam:</p>';
													echo '<p>May we respectfully refer our client, '.$name.', '.$profile_rec['age'].', of '.$profile_rec['address'].' for assistance specified below:</p>';
													echo '<br /><li><u>'.$profile_rec['assistance'].'</u> Assistance with a suggested amount of '.$sum -> approved_budget.' pesos.<br />';
													echo '<br /><strong>Brief Case Background:</strong>';
													echo '<br />The client is in need of the assistance for his/her stated reason: "'.$profile_rec['reason'].'". He/she has a total of '.count(unserialize($profile_rec['dep_name'])).' dependents. <em>Please see client profile for more info.</em><br />';
													echo '<br /><p>Thank you for your kind and immediate attention.</p>';
													echo '<br /><p>Sincerely yours,</p>';
													echo '<br />';
													echo '<p>NADEIA S. SARTE</p>';
													echo '<p>Officer-in-charge</p>';
													echo '<br /><br />';
													
													echo '<input type="hidden" name="uid" class="art-button" value="'.$profile_rec['uid'].'" />';
										?>			
													<input type="button" name="print" value="Print" class="art-button" onclick="location.replace('print.php?form=referral&amp;user=<?php echo $_SESSION['valid_type']; ?>&amp;uid=<?php echo $uid; ?>');" target="_blank" />
										<?php
													
													if($_SESSION['valid_type'] == 'CSWD')
													{
														echo '&nbsp;&nbsp;';
														echo '<input type="submit" name="refer" class="art-button" value="Refer" />&nbsp;&nbsp;&nbsp;';													
													}
													elseif($_SESSION['valid_type'] != 'Client')
													{
														echo '&nbsp;&nbsp;';
														?><input type="button" name="vouch" value="Vouch for Client" class="art-button" onclick="location.replace('voucher.php?uid=<?php echo $uid; ?>');" /><?php
													}
												}
											}
											
											if($_GET['refer'])
											{
												$uid = $_GET['uid'];
												$update_post = mysql_query("UPDATE clients SET post='Pending' WHERE uid='$uid' LIMIT 1") or die("Could not update user post!".mysql_error());
												if($update_post)
												{
													echo '<script language="javascript">';
														echo 'alert("User status updated.");';
														echo 'location.replace("home.php");';
													echo '</script>';
												}
											}
											elseif($_GET['approve'])
											{
												$uid = $_GET['uid'];
												$update_post = mysql_query("UPDATE clients SET post='Approved' WHERE uid='$uid' LIMIT 1") or die("Could not update user post!".mysql_error());
												if($update_post)
												{
													echo '<script language="javascript">';
														echo 'alert("User status updated.");';
														echo 'location.replace("home.php");';
													echo '</script>';
												}
											}
											if($_GET['reapply'])
											{
												$uid = $_GET['uid'];
												$update_post = mysql_query("UPDATE clients SET post='Reapply' WHERE uid='$uid' LIMIT 1") or die("Could not update user post!".mysql_error());
												if($update_post)
												{
													echo '<script language="javascript">';
														echo 'alert("User status updated.");';
														echo 'location.replace("home.php");';
													echo '</script>';
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