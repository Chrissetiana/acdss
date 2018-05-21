<?php
	include("session_call.php");		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | About Us</title>
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
								<h2 class="art-postheader"><a name="contact"></a><font color="white">About Us</font></h2>
								<div class="art-postcontent art-postcontent-0 clearfix">
									<p><img width="174" height="174" alt="link to us" class="art-lightbox" src="images/contactus-2.gif" style="float: left;" /></p>								
									<font color="white"><p>How to apply for financial assitance:</p></font>
									<ol>
                                    	<li>Get request slip from Mayor's Office.</li>
                                        <li>Complete requirements.</li>
                                        <li>Interview with CSWD case worker.</li>
                                        <li>Review and Approval of request.</li>
                                        <li>Release of assistance.</li>
                                    </ol>
                                    <p><b>Problems with this Web site?</b> <font color="#F1EDC2"> - Found a broken link? Unable to access a database? Need other technical assistance on our site? <a href="#feedback">Report site problems or suggest improvements.</font></a></p>                                                                   
								</div>
								<br /><br /><br />
								<h2 class="art-postheader"><a name="directory"></a><font color="white">Directory</font></h2>
								<div class="art-postcontent art-postcontent-0 clearfix">
                                	<?php
										include("connection.php");
										error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

										$display = "SELECT * FROM directory ORDER BY floors ASC";
										$result = mysql_query($display) or die("This webpage is not available.".mysql_error());
										if($result)
										{
											echo '<table class="art-article" border="1" cellpadding="2" cellspacing="2" style="width:100%;" class="static_text02">';
												echo '<tbody>';
													echo '<tr class="even" bgcolor="#666666">';
														echo '<td align="center" bgcolor="#FFFF99">Department</td>';
														echo '<td align="center" bgcolor="#FFFF99">Floor</td>';
														echo '<td align="center" bgcolor="#FFFF99">Telephone Number</td>';
														echo '<td align="center" bgcolor="#FFFF99">E-mail Address</td>';
														echo '<td align="center" bgcolor="#FFFF99">Department Head</td>';
													echo '</tr>';
													while($directory = mysql_fetch_object($result))
													{
														$office = $directory -> office;
														$floor = $directory -> floors;
														$telno = $directory -> telno;
														$email = $directory -> email;
														$oic = $directory -> oic;
														echo '<tr class="even">';
															echo '<td bgcolor="#FFFFFF">'.$office.'</td>';
															echo '<td bgcolor="#FFFFFF">'.$floor.'</td>';
															echo '<td align="center" bgcolor="#FFFFFF">'.$telno.'</td>';
															echo '<td bgcolor="#FFFFFF">'.$email.'</td>';
															echo '<td bgcolor="#FFFFFF">'.$oic.'</td>';
														echo '<tr>';
													}
												echo '</tbody>';
											echo '</table>';
										}
										mysql_close($link);
									?>
									<br />
								</div>
								<br /><br /><br />
								<h2 class="art-postheader"><a name="feedback"></a><font color="white">Comments / Suggestions</font></h2>
								<div class="art-postcontent art-postcontent-0 clearfix">
								<font color="#F1EDC2">
									<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">
										<table cellpadding=4 cellspacing=2 style="border:0;width:100%;">
											<tr><td style="border:0;" align="right">Name:<td style="border:0;"><input type="text" style="width:50%" name="Name" size="30" value="<?php echo $_SESSION['valid_username']; ?>" readonly="readonly" />
											<tr><td style="border:0;" align="right">Gender:<td style="border:0;"><input type="radio" name="Gender" value="Male">Male<input type="radio" name="Gender" value="Female">Female
											<tr><td style="border:0;" align="right">Site Rating:<td style="border:0;"><input type="radio" name="Rating" value=1>Excellent<br /><input type="radio" name="Rating" value=2>Satisfactory<br /><input type="radio" name="Rating" value=3>Needs Improvement
											<tr><td style="border:0;" align="right">Feedback:<td style="border:0;"><textarea name="Comments" rows=5 cols=25 placeholder="Place your comments/suggestions here"></textarea>
											<tr><td style="border:0;" colspan=2 align="right"><input type="submit" name="Submit" value="SEND" class="art-button">&nbsp;&nbsp;&nbsp;<a href="home.php"><input type="reset" name="Clear" value="CANCEL" class="art-button"></a>
										</table>
										<?php
											include("connection.php");
												
											if($_POST['Submit'])
											{
												$name = mysql_escape_string(trim($_POST['Name']));
												$gender = mysql_escape_string(trim($_POST['Gender']));
												$rating = mysql_escape_string(trim($_POST['Rating']));
												$comments = mysql_escape_string(trim($_POST['Comments']));
												
												$insert_feedback = "INSERT INTO feedback(name, gender, rating, comments)
																	VALUES('".$name."','".$gender."','".$rating."','".$comments."')";
												$result = mysql_query($insert_feedback);
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Message Sent!");';
													echo '</script>';													
												}
												else
												{
													echo '<script language="javascript">';
														echo 'alert("Message not sent. Please try again.");';
													echo '</script>';
												}

												mysql_close($link);
											}
										?>
								</div>
								</font>
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