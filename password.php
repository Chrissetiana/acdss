<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Password </title>
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
									<h2 class="art-postheader"><a href=""></a></h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">
										<table style="border:0;width:300" align="center" cellspacing=10>
											<?php
												$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
												echo $current_date=date("l, F d, Y  h:i A ",strtotime ("+8 hour"));
												$dateTimeZone = new DateTimeZone('GMT');
												$dateTime->setTimezone($dateTimeZone);
											?>
										</table>
										<br />
										<?php
											include("connection.php");

											$user_query = mysql_query("SELECT * FROM users WHERE username='".$_SESSION['valid_username']."' LIMIT 1") or die("Trouble in querying data.".mysql_error());
											if($user_query)
											{
												if(mysql_num_rows($user_query) > 0)
												{
													$result = mysql_fetch_array($user_query);
										?>
													<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%;">
														<tbody>
															<tr>
																<td style="border:0;width:21%"><label for="edit-name">Old Username: <span class="form-required" title="This field is required.">*</span></label><br /></td>
																<td style="border:0;"><input type="text" name="username" id="edit-name" autocomplete="off" style="width:40%;" value="<?php echo $result['username']; ?>" readonly="readonly" required /></td>
															</tr>
															<tr>
																<td style="border:0;width:21%"><label for="edit-name">New Username: <span class="form-required" title="This field is required.">*</span></label><br /></td>
																<td style="border:0;"><input type="text" name="username" id="edit-name" autocomplete="off" style="width:40%;" required /></td>
															</tr>															
															<tr>
																<td style="border:0;"><label for="edit-pass">Old Password:</label><br /></td>
																<td style="border:0;"><input type="password"  name="old_password" id="old_password" style="width:40%;" /></td>
															</tr>
															<tr>
																<td style="border:0;"><label for="edit-pass">New Password: <span class="form-required" title="This field is required.">*</span></label><br /></td>
																<td style="border:0;"><input type="password"  name="password" id="edit-pass" style="width:40%;" class="form-text required" required /></td>
															</tr>
															<tr>
																<td style="border:0;"><label for="edit-pass">Confirm Password: <span class="form-required" title="This field is required.">*</span></label><br /></td>
																<td style="border:0;"><input type="password"  name="confirm" id="edit-pass" style="width:40%;" class="form-text required" required /></td>
															</tr>
															<tr>
																<td style="border:0;"><input type="submit" name="submit" class="art-button" value="Submit" style="zoom: 1;" align="right" /></td>
															</tr>
														</tbody>
													</table>
										<?php
												}
												else
													echo 'No data found.';
											}
											else
												echo 'No records found.';

											if($_POST['submit'])
											{
												$username = mysql_escape_string(trim($_POST['username']));
												$old_password = mysql_escape_string(trim($_POST['old_password']));
												$password = mysql_escape_string(trim($_POST['password']));
												$password2 = mysql_escape_string(trim($_POST['confirm']));

												if(($username <> " ") && ($password <> " ") && ($password2 <> " "))
												{
													/*if($old_password <> md5($result['username']))
													{
														echo '<script language="javascript">';
															echo 'alert("Input for old password is incorrect.");';
														echo '</script>';
													}
													else*/if($password == $password2)
													{
														$user_insert = mysql_query("UPDATE users SET username='".mysql_escape_string(trim(ucwords(strtolower($username))))."', password='".md5($password)."' WHERE username='".$_SESSION['valid_username']."' LIMIT 1") or die("Cannot alter user information.<br />".mysql_error());
														if($user_insert)
														{
															echo '<script language="javascript">';
																echo 'alert("Record updated.");';
															echo '</script>';
														}
													}													
													else
													{
														echo '<script language="javascript">';
															echo 'alert("Passwords do not match.");';
														echo '</script>';
													}
												}
											}
										?>
										</form>
									</div>
								</article>
							</div>
						</div>
					</div>
				<hr /><?php include("footer.php"); ?>
			</div><br />
		</div>
	</body>
</html>