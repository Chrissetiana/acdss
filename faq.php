<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | FAQs</title>
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
								<h2 class="art-postheader"><font color="white">Frequently Asked Questions</font></h2>
								<div class="art-postcontent art-postcontent-0 clearfix">
                                	<?php
										include("connection.php");

										$result = mysql_query("SELECT * FROM faq") or die("This webpage is not available.".mysql_error());
										if($result)
										{
											echo '<br />';
											echo '<table class="art-article" border="1" cellpadding="2" cellspacing="2" style="width:100%;" bgcolor="#CCCCCC">';
												echo '<tbody>';
													echo '<tr class="even" bgcolor="#666666">';
														echo '<th bgcolor="#FFFF99"><b>ID</b></th>';
														echo '<th bgcolor="#FFFF99"><b>QUESTIONS</b></th>';
														echo '<th bgcolor="#FFFF99"><b>ANSWERS</b></th>';
													echo '</tr>';
													while($faq = mysql_fetch_object($result))
													{
														$id = $faq -> id;
														$quessie = $faq -> question;
														$ans = $faq -> answer;
														echo '<tr class="even">';
															echo '<td bgcolor="#FFFFFF">'.$id.'</td>';
															echo '<td bgcolor="#FFFFFF">'.$quessie.'</td>';
															echo '<td bgcolor="#FFFFFF">'.$ans.'</td>';
														echo '<tr>';
													}
												echo '</tbody>';
											echo '</table>';
										}
										else
											die("This webpage is not available.".mysql_error());

										mysql_close($link);
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