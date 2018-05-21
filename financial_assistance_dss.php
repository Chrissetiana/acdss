<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Assessment</title>
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
									<h2 class="art-postheader">Case Worker Assessment</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<br />
										<?php
											include("connection.php");
											//error_reporting(E_ALL);
											//ini_set('display_errors', 'On');

											$uid = $_GET['uid'];
											$assistance = $_GET['assistance'];

											$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
											if($profile_query)
											{
												if(mysql_num_rows($profile_query) > 0)
												{
													while($profile_rec = mysql_fetch_array($profile_query))
													{
														$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];
														echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
															echo '<tbody>';
																echo '<tr>';
																	echo '<td style="border:0;width:25%;">Date of request</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['date'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Name</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$name.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Age</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['age'].'</td>';
																	switch($profile_rec['age'])
																	{
																		case $profile_rec['age'] <= 14: $equiv_age = 55;
																			$assessment = "Children/Youth in need of special protection.";
																			break;
																		case $profile_rec['age'] >= 15 AND $profile_rec['age'] <= 20: $equiv_age = 10;
																			break;
																		case $profile_rec['age'] >= 21 AND $profile_rec['age'] <= 30: $equiv_age = 20;
																			break;
																		case $profile_rec['age'] >= 31 AND $profile_rec['age'] <= 40: $equiv_age = 30;
																			break;
																		case $profile_rec['age'] >= 41 AND $profile_rec['age'] <= 50: $equiv_age = 40;
																			break;
																		case $profile_rec['age'] >= 51 AND $profile_rec['age'] <= 60: $equiv_age = 50;
																			break;
																		case $profile_rec['age'] >= 61: $equiv_age = 60;
																			$assessment = "Senior Citizen";
																			break;
																	}
																	$x1_age = 10;
																	$x2_age = $equiv_age;
																	$x3_age = 60;
																	$y1_age = 50;
																	$y3_age = 300;
																	$sub_age=($x2_age - $x1_age) * ($y3_age - $y1_age) / ($x3_age - $x1_age) + $y1_age;
																	$y2_age = round($sub_age * 10000) / 10000;
																	//echo '<td style="border:0;width:25%;">Equivalent Amount</td>';
																	//echo '<td style="border:0;">:</td>';
																	//echo '<td style="border:0;">'.$y2_age.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Civil Status</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['civilstat'].'</td>';
																	switch($profile_rec['civilstat'])
																	{
																		case "Single": $equiv_civilstat = 10;
																			break;
																		case "Separated": $equiv_civilstat = 20;
																			$assessment = "Family Head and/or Other Needy Adult";
																			break;
																		case "Divorced": $equiv_civilstat = 30;
																			$assessment = "Family Head and/or Other Needy Adult";
																			break;
																		case "Civil Union": $equiv_civilstat = 40;
																			$assessment = "Family Head and/or Other Needy Adult";
																			break;
																		case "Married": $equiv_civilstat = 50;
																			$assessment = "Family Head and/or Other Needy Adult";
																			break;
																		case "Widow": $equiv_civilstat = 60;
																			$assessment = "Family Head and/or Other Needy Adult";
																			break;
																	}
																	$x1_civilstat = 10;
																	$x2_civilstat = $equiv_civilstat;
																	$x3_civilstat = 60;
																	$y1_civilstat = 50;
																	$y3_civilstat = 300;
																	$sub_civilstat=($x2_civilstat - $x1_civilstat) * ($y3_civilstat - $y1_civilstat) / ($x3_civilstat - $x1_civilstat) + $y1_civilstat;
																	$y2_civilstat = round($sub_civilstat * 10000) / 10000;
																	//echo '<td style="border:0;">Equivalent Amount</td>';
																	//echo '<td style="border:0;">:</td>';
																	//echo '<td style="border:0;">'.$y2_civilstat.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Educational Attainment</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['educ'].'</td>';
																	switch($profile_rec['educ'])
																	{
																		case "Elementary Level": $equiv_educ = 80;
																			break;
																		case "Elementary Grad": $equiv_educ = 70;
																			break;
																		case "Highschool Level": $equiv_educ = 60;
																			break;
																		case "Highschool Grad": $equiv_educ = 50;
																			break;
																		case "College Level": $equiv_educ = 40;
																			break;
																		case "College Grad": $equiv_educ = 30;
																			break;
																		case "Post Grad": $equiv_educ = 20;
																			break;
																		case "Vocational": $equiv_educ = 10;
																			break;
																		case "None": $equiv_educ = 90;
																			break;
																	}
																	$x1_educ = 10;
																	$x2_educ = $equiv_educ;
																	$x3_educ = 90;
																	$y1_educ = 33;
																	$y3_educ = 300;
																	$sub_educ=($x2_educ - $x1_educ) * ($y3_educ - $y1_educ) / ($x3_educ - $x1_educ) + $y1_educ;
																	$y2_educ = round($sub_educ * 10000) / 10000;
																	//echo '<td style="border:0;">Equivalent Amount</td>';
																	//echo '<td style="border:0;">:</td>';
																	//echo '<td style="border:0;">'.$y2_educ.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Occupation</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['job_title'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Employment</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['employment'].'</td>';
																	switch($profile_rec['employment'])
																	{
																		case "Contractual": $equiv_employment = 30;
																			break;
																		case "Regular": $equiv_employment = 10;
																			break;
																		case "Self_employed": $equiv_employment = 20;
																			break;
																		case "Seasonal": $equiv_employment = 40;
																			break;
																	}
																	$x1_employment = 10;
																	$x2_employment = $equiv_employment;
																	$x3_employment = 40;
																	$y1_employment = 75;
																	$y3_employment = 300;
																	$sub_employment=($x2_employment - $x1_employment) * ($y3_employment - $y1_employment) / ($x3_employment - $x1_employment) + $y1_employment;
																	$y2_employment = round($sub_employment * 10000) / 10000;
																	//echo '<td style="border:0;">Equivalent Amount</td>';
																	//echo '<td style="border:0;">:</td>';
																	//echo '<td style="border:0;">'.$y2_employment.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Type of Employer</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['employer'].'</td>';
																	switch($profile_rec['employer'])
																	{
																		case "Semi Private": $equiv_employer = 30;
																			break;
																		case "Private": $equiv_employer = 20;
																			break;
																		case "Public": $equiv_employer = 10;
																			break;
																	}
																	$x1_employer = 10;
																	$x2_employer = $equiv_employer;
																	$x3_employer = 30;
																	$y1_employer = 100;
																	$y3_employer = 300;
																	$sub_employer=($x2_employer - $x1_employer) * ($y3_employer - $y1_employer) / ($x3_employer - $x1_employer) + $y1_employer;
																	$y2_employer = round($sub_employer * 10000) / 10000;
																	//echo '<td style="border:0;">Equivalent Amount</td>';
																	//echo '<td style="border:0;">:</td>';
																	//echo '<td style="border:0;">'.$y2_employer.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Requested Assitance</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['assistance'].'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Requested Budget</td>';
																	echo '<td style="border:0;">:</td>';
																	echo '<td style="border:0;">'.$profile_rec['budget'].' pesos</td>';
																echo '</tr>';
																echo '<tr><td style="border:0;">&nbsp;</td></tr>';
																echo '<tr>';
																	$get_dep = mysql_query("SELECT dep_name, dep_age, dep_educ, dep_occupation FROM clients WHERE uid='$uid'");
																	echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
																		echo '<tbody>';
																			echo '<tr>';
																				echo '<th bgcolor="#FFFF99">Name of Dependent</th>';
																				echo '<th bgcolor="#FFFF99">Age of Dependent</th>';
																				echo '<th bgcolor="#FFFF99">Education of Dependent</th>';
																				echo '<th bgcolor="#FFFF99">Occupation of Dependent</th>';
																			echo '</tr>';
																		while($dep = mysql_fetch_array($get_dep))
																		{
																			$dep_name = unserialize($dep['dep_name']);
																			$dep_age = unserialize($dep['dep_age']);
																			$dep_educ = unserialize($dep['dep_educ']);
																			$dep_occupation = unserialize($dep['dep_occupation']);
																			for($i=0;$i<count($dep_name);$i++)
																			{
																				echo '<tr>';
																					echo '<td bgcolor="#FFFFFF">'.$dep_name[$i].'</td>';
																					echo '<td bgcolor="#FFFFFF">'.$dep_age[$i].'</td>';
																					echo '<td bgcolor="#FFFFFF">'.$dep_educ[$i].'</td>';
																					echo '<td bgcolor="#FFFFFF">'.$dep_occupation[$i].'</td>';
																				echo '</tr>';
																			}
																		}
																		echo '<tr><th bgcolor="#FFFF99" colspan="4">Total dependents: '.count($dep_name).'</th></tr>';
																		echo '</tbody>';
																	echo '</table>';
																echo '</tr>';
																echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
																	echo '<tbody>';
																/*echo '<tr>';
																	echo '<td style="border:0;width:25%;">Client Category</td>';
																	echo '<td style="border:0;width:3%;">:</td>';
																	echo '<td style="border:0;">'.$assessment.'</td>';
																echo '</tr>';*/
																echo '<tr>';
																	switch(count($dep_name))
																	{
																		case count($dep_name) == 0: $equiv_dep_num = 10;
																			break;
																		case count($dep_name) >=1 AND count($dep_name) <=5: $equiv_dep_num = 20;
																			break;
																		case count($dep_name) >=6 AND count($dep_name) <=10: $equiv_dep_num = 30;
																			break;
																		case count($dep_name) >=11 AND count($dep_name) <=15: $equiv_dep_num = 40;
																			break;
																		case count($dep_name) >=16: $equiv_dep_num = 50;
																			break;
																	}
																	$x1_dep_num = 10;
																	$x2_dep_num = $equiv_dep_num;
																	$x3_dep_num = 50;
																	$y1_dep_num = 60;
																	$y3_dep_num = 300;
																	$sub_dep_num=($x2_dep_num - $x1_dep_num) * ($y3_dep_num - $y1_dep_num) / ($x3_dep_num - $x1_dep_num) + $y1_dep_num;
																	$y2_dep_num = round($sub_dep_num * 10000) / 10000;
																	//echo '<td style="border:0;width:33%;">Amount based on dependents</td>';
																	//echo '<td style="border:0;width:3%;">:</td>';
																	//echo '<td style="border:0;">'.$y2_dep_num.'</td>';
																echo '</tr>';
																echo '<tr>';
																	echo '<td style="border:0;">Suggested Amount</td>';
																	echo '<td style="border:0;">:</td>';
																	$sum = $y2_age + $y2_civilstat + $y2_educ + $y2_employment + $y2_employer + $y2_dep_num;
																	echo '<td style="border:0;">'.$sum.' pesos</td>';
																echo '</tr>';
										?>
																<tr>
																	<td style="border:0;">Mode of Financial Assitance</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><?php include("combo_payment_mode.php"); ?></td>
																</tr>
																<tr>
																	<td style="border:0;">Source of Assitance</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><?php include("combo_payment_source.php"); ?></td>
																</tr>																
																<tr>
																	<td style="border:0;"></td>
																</tr>																
															</tbody>
														</table>														
														<br /><br />
														<input type="submit" name="submit" value="Submit" class="art-button" />
														<input type="hidden" name="uid" value="<?php echo $uid; ?>" class="art-button" />
														<input type="hidden" name="name" value="<?php echo $name; ?>" class="art-button" />
														<input type="hidden" name="assistance" value="<?php echo $assistance; ?>" class="art-button" />
														<input type="hidden" name="sum" value="<?php echo $sum; ?>" class="art-button" />
														<input type="reset" name="cancel" value="Cancel" class="art-button" onclick="window.history.go(-1);" />
										<?php
													}													
												}
												else
													echo 'No records found.';
											}
											
											if($_POST['submit'])
											{
												$uid = $_POST['uid'];
												$name = $_POST['name'];
												$approved_assistance = $_POST['assistance'];
												$approved_budget = $_POST['sum'];
												$mode = $_POST['mode_of_assistance'];
												$source = $_POST['source_of_assistance'];
												
												$assess_insert = "INSERT INTO requests(uid, name, approved_assistance, approved_budget, mode, source)
																VALUES('".$uid."','".$name."','".$approved_assistance."','".$approved_budget."','".$mode."','".$source."')";
												$result = mysql_query($assess_insert);
												if($result)
												{
													echo '<script language="javascript">';
														echo 'location.replace("requirements.php?uid='.$uid.'&amp;assistance='.$approved_assistance.'");';
													echo '</script>';
												}
											}
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