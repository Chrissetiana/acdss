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
											$assistance = $_GET['assistance'];
											$sum = $_GET['sum'];

											$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
											if($profile_query)
											{
												while($profile_rec = mysql_fetch_array($profile_query))
												{
													echo '<br /><br />';
													$dateTime = new DateTime("", new DateTimeZone('Asia/Taipei'));
													echo $current_date = date("F d, Y").'<br />';
													echo $current_date = date("h:i A", strtotime("+8 hour"));
													$dateTimeZone = new DateTimeZone('GMT');
													$dateTime->setTimezone($dateTimeZone);													
													$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];
													echo '<p>Sir/Madam:</p>';
													echo '<p>In connection with your referral regarding client '.$name.', '.$profile_rec['age'].', of '.$profile_rec['address'].', wewish to submit report on the action taken regarding the matter.</p>';
													echo '<br />';
													echo '<p>NADEIA S. SARTE</p>';
													echo '<p>Officer-in-charge</p>';
													echo '<br /><br />';
													
													if($_SESSION['valid_type'] == 'CSWD')
														echo '<input type="submit" name="refer" class="art-button" value="Refer" />&nbsp;&nbsp;&nbsp;';
													echo '<input type="hidden" name="uid" class="art-button" value="'.$profile_rec['uid'].'" />';
													echo '<input type="button" name="print" class="art-button" value="Print" onclick="location.replace("print.php");" />';
													
													if($_SESSION['valid_type'] == 'CTRSRY')
													{
														echo '&nbsp;&nbsp;';
														echo '<a href=".php?table='.$form.'&amp;id='.$id.'&amp;post=approved&amp;action=update" class="art-button"></a>';
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