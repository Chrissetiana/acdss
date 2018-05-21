<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Login</title>
		<script type="text/javascript" src="timeFormat.js"></script>
		<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.css" media="screen" />
		<!--[if lte IE 7]><link type="text/css" rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.responsive.css" media="all" />
		<link type="text/css" rel="stylesheet" href="jquery.toastmessage.css" media="all" />

		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript" src="script.responsive.js"></script>
		<script type="text/javascript" src="jquery.toastmessage.js"></script>

		<meta name="description" content="Description" />
		<meta name="keywords" content="Keywords" />				
	</head>
	<body><a name="top"></a>
			<div id="art-main">
			<?php
				include("header.php");
				include("nav.php");
			?>
			<div class="art-sheet clearfix">
				<div class="art-layout-wrapper clearfix">
					<div class="art-content-layout">
						<div class="art-content-layout-row">
							<div class="art-layout-cell art-content clearfix">
								<article class="art-post art-article">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_self" enctype="multipart/form-data">
									<!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">-->
										<h2 class="art-postheader">Login</h2>
										<center>
											<?php
												$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
												echo $current_date=date("l, F d, Y  h:i A ",strtotime ("+8 hour"));
												$dateTimeZone = new DateTimeZone('GMT');
												$dateTime->setTimezone($dateTimeZone);
											?>
										</center>
										<br />
										<div class="art-postcontent art-postcontent-0 clearfix" align="center">
											<img src="images/login.png" width="232" height="234" alt="" style="float:left;" class="art-lightbox" />
											<label for="edit-name">Username: <span class="form-required" title="This field is required."><font color="red">*</font></span></label><br />
											<input type="text" name="username" id="edit-name" autocomplete="off" style="width:40%;" value="<?php echo htmlspecialchars($username);?>" />
											<?php
												if(isset($_SESSION['missing_uname']))
												{
													echo '<font color="red">'.$_SESSION['missing_uname'].'</font>';
													unset($_SESSION['missing_uname']);
												}
											?>
											<span class="error"><?php echo $nameErr;?></span><br /><br />
											<label for="edit-pass">Password: <span class="form-required" title="This field is required."><font color="red">*</font></span></label><br />
											<input type="password"  name="password" id="edit-pass" style="width:40%;" value="<?php echo htmlspecialchars($password);?>" class="form-text required" />
											<?php
												if(isset($_SESSION['missing_upass']))
												{
													echo '<font color="red">'.$_SESSION['missing_upass'].'</font>';
													unset($_SESSION['missing_upass']);
												}
											?>
											<span class="error"><?php echo $passErr;?></span><br /><br />
											<input type="submit" name="login" class="art-button" value="Login" style="zoom: 1;" /><br />
										</div>
									</form>
									<?php
										if ((isset($_POST['username'])) && (isset($_POST['password'])) && (isset($_POST['login'])))
										{
											$username = mysql_escape_string(trim(ucwords(strtolower($_POST['username']))));
											$password = md5(mysql_escape_string(trim($_POST['password'])));

											$query = mysql_query("SELECT * FROM users WHERE username='".$username."' OR password='".$password."'") or die('Trouble in querying data.<br />'.mysql_error());
											if($query)
											{
												if (mysql_num_rows($query) > 0)
												{
													$row = mysql_fetch_object($query);
													$id = $row -> id;
													$uid = $row -> uid;
													$name = $row -> username;
													$pwd = $row -> password;
													$type = $row -> type;
													//$name = ucwords($uname);
													if(($username  ==  $name) && ($password  ==  $pwd))
													{
														$_SESSION['valid_id'] = $id;
														$_SESSION['valid_uid'] = $uid;
														$_SESSION['valid_username'] = $name;
														$_SESSION['valid_password'] = $password;
														$_SESSION['valid_type'] = $type;

														$insert_trail = "INSERT INTO log(username, type, activity) VALUES('".$username."','".$type."','Login')";
														$result = mysql_query($insert_trail);

														if($type == 'Administrator')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'Client')
														{
															echo '<script language="javascript">';
																echo 'location.replace("profile.php?form=clients&id='.$_SESSION['valid_id'].'&uid='.$_SESSION['valid_uid'].'");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'CSWD')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'CADMIN')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'CBUDGET')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'CACCTG')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														elseif($type == 'CTRSRY')
														{
															echo '<script language="javascript">';
																echo 'location.replace("home.php");';
																echo '$().toastmessage("showSuccessToast", "You are now Logged-In...");';
															echo '</script>';
														}
														else
														{
															session_destroy();
														}
													}
													else
													{
														echo '<script type="text/javascript">';
															echo '$().toastmessage("showErrorToast", "Invalid User. Please try again.");';
														echo '</script>';
													}
												}
												else
												{
													echo '<script type="text/javascript">';
														echo '$().toastmessage("showErrorToast", "Invalid Username or Password.");';
													echo '</script>';
												}
											}
											else
											{
												echo '<script type="text/javascript">';
													echo '$().toastmessage("showWarningToast", "Trouble in accesing data.");';
												echo '</script>';
											}
											//Missing Username
											if(!$username)
											{
												$_SESSION['missing_uname'] = "Missing!";
											}
											else
											{
												unset($_SESSION['missing_uname']);
											}
											//Missing password
											if(!$password)
											{
												$_SESSION['missing_upass'] = "Missing!";
											}
											else
											{
												unset($_SESSION['missing_upass']);
											}
										}
									?>
								</article>
							</div>
						</div>
					</div>
				</div>
				<hr /><p align="center">&copy; 2013. Antipolo CSWD Decision Support System</p>
			</div><br />
			</div>
		</div>
	</body>
</html>