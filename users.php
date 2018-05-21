<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Add Managers</title>
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
									<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">
									<h2 class="art-postheader">Create New Manager</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<br />
										<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%;">
											<tbody>
												<tr>
													<td style="border:0;width:21%"><label for="edit-name">Enter Username: <span class="form-required" title="This field is required.">*</span></label><br /></td>
													<td style="border:0;"><input type="text" name="username" id="edit-name" autocomplete="off" style="width:40%;" required /></td>
												</tr>
												<tr>
													<td style="border:0;width:21%"><label for="edit-name">Enter User Type: <span class="form-required" title="This field is required.">*</span></label><br /></td>
													<td style="border:0;">
														<select name="type">
															<option disabled="disanled" selected="selected">Select type</option>
															<option value="CSWD">CSWD</option>
															<option value="CADMIN">CADMIN</option>
															<option value="CBUDGET">CBUDGET</option>
															<option value="CACCTG">CACCTG</option>
															<option value="CTRSRY">CTRSRY</option>
														</select>
													</td>
												</tr>												
												<tr>
													<td style="border:0;"><label for="edit-pass">Enter Password: <span class="form-required" title="This field is required.">*</span></label><br /></td>
													<td style="border:0;"><input type="password"  name="password" id="edit-pass" style="width:40%;" required /></td>
												</tr>															
												<tr>
													<td style="border:0;"><label for="edit-pass">Confirm Password: <span class="form-required" title="This field is required.">*</span></label><br /></td>
													<td style="border:0;"><input type="password"  name="confirm" id="edit-pass" style="width:40%;" required /></td>
												</tr>
												<tr>
													<td style="border:0;"><input type="submit" name="submit" class="art-button" value="Submit" style="zoom: 1;" align="right" /></td>
												</tr>
											</tbody>
										</table>
										<?php
											include("connection.php");
											
											if($_POST['submit'])
											{
												$username = mysql_escape_string(trim($_POST['username']));
												$type = $_POST['type'];
												$password = mysql_escape_string(trim($_POST['password']));
												$confirm = mysql_escape_string(trim($_POST['confirm']));
												
												$uname = strtoupper(substr($username, 0, 3));
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = trim($uname.$today);
												
												if(($username == "") || ($password == "") || ($confirm == "") || ($type == ""))
												{
													echo '<script language="javascript">';
														echo 'alert("Please fill out all the fields.");';
													echo '</script>';
												}
												else
												{
													if($password == $confirm)
													{
														$add_user = "INSERT INTO users(uid, username, password, type) VALUES('".$uid."','".$username."','".md5($password)."','".$type."')";
														$result = mysql_query($add_user);
														if($result)
														{
															echo '<script language="javascript">';
																echo 'alert("User successfully created!");';
															echo '</script>';
														}
														else
														{
															echo '<script language="javascript">';
																echo 'alert("Error in creating user. Please try again.");';
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