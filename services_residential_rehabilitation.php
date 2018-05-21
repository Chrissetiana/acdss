<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Services | Residential and Rehabilitation Division</title>
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
							<font color="#F1EDC2">
								<article class="art-post art-article">
									<h3 class="art-postheader"><font color="white">Residential and Rehabilitation Division</font></h3>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<br /><br /><br />
									</div>
									<?php
										include("connection.php");

										$service_query = mysql_query("SELECT * FROM services WHERE division='Residential and Rehabilitation Division' AND status='Active'") or die("This webpage is not available.<br />".mysql_error());
										if($service_query)
										{
											while($content = mysql_fetch_array($service_query))
											{
												if(mysql_num_rows($service_query) != 0)
												{
													echo '<u><h3 class="post-header"><font color="white">'.$content['title'].'</font></h3></u>';
													echo '<br />'.$content['description'].'<br /><br /><br />';
												}
												else
													echo 'No records found.';
											}
										}
									?>
								</article>
							</font>
							</div>
						</div>
					</div>
				</div>
				<hr /><?php include("footer.php"); ?>
			</div><br />
		</div>
	</body>
</html>