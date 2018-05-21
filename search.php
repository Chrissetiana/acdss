<?
	include("session_call.php");
	if ((isset($_GET['fname'])) && (isset($_GET['order'])) && (isset($_GET['action'])))
	{
		$fname = trim($_GET['fname']);
		$order = trim($_GET['order']);
		$action = trim($_GET['action']);
	}
	else
	{
		header("location:search.php?fname=&order=asc&action=Search");
		exit();
	}

	include ("connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ACDSS | Search</title>
		<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="style.css" media="screen" />
		<!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
		<link rel="stylesheet" href="style.responsive.css" media="all" />

		<script src="jquery.js"></script>
		<script src="script.js"></script>
		<script src="script.responsive.js"></script>
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
									<h2 class="art-postheader"><font color="white">Search</font></h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											echo "<center>";
											/*$letter = "A";
												for($i = 1; $i <= 26; $i++)
												{
													echo '<a href="search.php?fname='.$letter.'&order=asc&action=Search">'.$letter.'</a> ';
													$letter++;
												}
												echo '<br /><br />';*/
												echo '<form action="search.php" method="get">';
										?>
													<label for="searchby">Search by:</label>
													<?php include("combo_searchby.php"); ?>
													<input type="search" name="keyterm" placeholder="Type name to search" autocomplete="off" value="<?php echo $keyterm; ?>" />
													<input type="submit" name="search" class="art-button" value="Search" />
													<input type="button" name="refresh" class="art-button" value="Refresh" onclick="location.replace('search.php');" />
													
											<?php
													//echo '<input type="search" name="fname" placeholder="autosearch" autocomplete="off" value="'.$fname .'" /> ';
													echo '<input type="hidden" name="order" value="asc" />';
													//echo '<input type="submit" name="action" class="art-button" value="Search" />';
												echo '</form>';
											echo '</center>';
											
											$search_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname FROM clients WHERE fname LIKE '%$fname%' OR mname LIKE '%$fname%' OR lname LIKE '%$fname%'")
																 or die("This webpage is not available.<br />".mysql_error());
												switch($searchby)
												{
													case 'gender_female':
														$search_query = mysql_query(" (SELECT id, uid, 'clients' AS location, fname, mname, lname FROM client_cs WHERE gender='Female' AND status='Active')
																	UNION ALL (SELECT id, uid, 'client_gi' AS location, fname, mname, lname FROM client_gi WHERE gender='Female' AND status='Active')
																	UNION ALL (SELECT id, uid, 'client_pwd' AS location, fname, mname, lname FROM client_pwd WHERE gender='Female' AND status='Active')
																	UNION ALL (SELECT id, uid, 'client_sen' AS location, fname, mname, lname FROM client_sen WHERE gender='Female' AND status='Active')
																	UNION ALL (SELECT id, uid, 'client_yth' AS location, fname, mname, lname FROM client_yth WHERE gender='Female' AND status='Active')
																	ORDER BY uid $order") or die("This webpage is not available.<br />".mysql_error());
														break;
													case 'gender_male':
														$search_query = mysql_query("SELECT id, uid, 'clients' AS location, fname, mname, lname FROM client_cs WHERE gender='Male' AND status='Active'")
																	 or die("This webpage is not available.<br />".mysql_error());
														break;
												}
											if ($search_query)
											{
												if (mysql_num_rows($search_query) != 0)
												{
													echo "<h3>" .mysql_num_rows($search_query) ." record/s found. Sort in <a href='search.php?fname=".str_replace(" ", "+" ,$fname)."&order=asc&action=Search'>ascending</a> or <a href='search.php?fname=".str_replace(" ", "+" ,$fname)."&order=desc&action=Search'>descending</a> order.</h3>";
													echo "<br />";
													while ($search_row = mysql_fetch_array($search_query))
													{
														echo '<a href="profile.php?form='.$search_row['location'].'&amp;id='.$search_row['id'].'">'.$search_row['fname'].' '.$search_row['mname'].' '.$search_row['lname'].'</a>';
														echo "<br />";
													}
												}
												else
												{
													echo "<p>No records found</p>";
												}
											}
											else
											{
												echo "<p>No records found</p>";
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