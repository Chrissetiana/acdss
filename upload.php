<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Upload</title>
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
									<!--<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">-->
									<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">
									<h2 class="art-postheader"><a href=""></a></h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");

											$uid = $_POST['uid'];
											$name = $_POST['name'];
											$assistance = $_POST['assistance'];
										?>
											<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
												<tbody>
										<?php
												if($assistance == 'Medical')
												{
										?>
													<tr>
														<td style="border:0;width:20%;">Barangay Clearance / Indigency Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image1" id="brgy_clearance" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Voter's ID / COMELEC Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image2" id="comelec_voter" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:30%;">Clinical Abstract</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image3" id="clinical_abstract" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Doctor's Prescription</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image4" id="doctors_prescription" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Hospital Bill</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image5" id="hosp_bill" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Next Checkup Schedule</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image6" id="checkup_sched" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
										<?php
												}
												elseif($assistance == 'Burial')
												{
										?>
													<tr>
														<td style="border:0;width:20%;">Barangay Clearance / Indigency Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image1" id="brgy_clearance" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Voter's ID / COMELEC Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image2" id="comelec_voter" /></td>
													</tr>
													<tr>
														<td style="border:0;width:20%;">Funeral Contract</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image10" id="funeral_contract" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Death Certificate</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image11" id="death_cert" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
										<?php
												}
												elseif($assistance == 'Financial')
												{
										?>
													<tr>
														<td style="border:0;width:20%;">Barangay Clearance / Indigency Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image1" id="brgy_clearance" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Voter's ID / COMELEC Cert</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image2" id="comelec_voter" /></td>
													</tr>
										<?php
												}
										?>
													<tr>
														<td style="border:0;width:20%;">Photo</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image7" id="photo" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">Valid ID*</td>
														<td style="border:0;">:</td>
														<td style="border:0;"><input type="file" name="image8" id="valid_id" /></td>
													</tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr><td style="border:0;" colspan="3">* <font size="2"><u>LIST OF VALID IDs</u>:
														<li>Comelec id (vrr)</li>
														<li>Company id</li>
														<li>Drivers license</li>
														<li>NBI clearance</li>
														<li>Passport</li>
														<li>Postal id</li>
														<li>School id</font></li>
													</td></tr>
													<tr><td style="border:0;">&nbsp;</td></tr>
													<tr>
														<td style="border:0;width:20%;">
															<input type="submit" name="upload" value="Upload Files" class="art-button" />
															<input type="hidden" name="name" value="<? echo $name; ?>" class="art-button" />
															<input type="hidden" name="uid" value="<? echo $uid; ?>" class="art-button" />
														</td>
													</tr>
												</tbody>
											</table>
										<?php
											if($_POST['upload'])
											{
												$req_query = mysql_query("SELECT * FROM requirements WHERE uid='$uid' ");
												
												while($row = mysql_fetch_array($req_query))
												{
													$image1_1 = $row['brgy_clearance'];
													$image2_1 = $row['comelec_voter'];
													$image3_1 = $row['clinical_abstract'];
													$image4_1 = $row['doctors_prescription'];
													$image5_1 = $row['hosp_bill'];
													$image6_1 = $row['checkup_sched'];
													$image7_1 = $row['pic'];
													$image8_1 = $row['valid_id'];
													$image10_1 = $row['funeral_contract'];
													$image11_1 = $row['death_cert'];
												}
												$image1 = $_FILES["image1"]["name"];
												$image2 = $_FILES["image2"]["name"];
												$image3 = $_FILES["image3"]["name"];
												$image4 = $_FILES["image4"]["name"];
												$image5 = $_FILES["image5"]["name"];
												$image6 = $_FILES["image6"]["name"];
												$image7 = $_FILES["image7"]["name"];
												$image8 = $_FILES["image8"]["name"];
												$image10 = $_FILES["image10"]["name"];
												$image11 = $_FILES["image11"]["name"];
												
												if($image1=="")
												{
												
													$image1 = $image1_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image1']['type']) && $image1!="")
													{
														
														$image1 = $image1_1;
														$img1 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image1"]["tmp_name"],"upload/".$_FILES["image1"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image2=="")
												{
													$image2 = $image2_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image2']['type']) && $image2!="")
													{
														$image2 = $image2_1;
														$img2 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image2"]["tmp_name"],"upload/".$_FILES["image2"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												
												if($image3=="")
												{
													$image3 = $image3_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image3']['type']) && $image3!="")
													{
														$image3 = $image3_1;
														$img3 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image3"]["tmp_name"],"upload/".$_FILES["image3"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image4=="")
												{
													$image4 = $image4_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image4']['type']) && $image4!="")
													{														
														$image4 = $image4_1;
														$img4 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image4"]["tmp_name"],"upload/".$_FILES["image4"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image5=="")
												{
													$image5 = $image5_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image5']['type']) && $image5!="")
													{
														$image5 = $image5_1;
														$img5 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												else
													{
														move_uploaded_file(	$_FILES["image5"]["tmp_name"],"upload/".$_FILES["image5"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image6=="")
												{
													$image6 = $image6_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image6']['type']) && $image6!="")
													{
														$image6 = $image6_1;
														$img6 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image6"]["tmp_name"],"upload/".$_FILES["image6"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image7=="")
												{
													$image7 = $image7_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image7']['type']) && $image7!="")
													{														
														$image7 = $image7_1;
														$img7 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image7"]["tmp_name"],"upload/".$_FILES["image7"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image8=="")
												{
													$image8 = $image8_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image8']['type']) && $image8!="")
													{
														$image8 = $image8_1;
														$img8 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image8"]["tmp_name"],"upload/".$_FILES["image8"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image10=="")
												{
													$image10 = $image10_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image10']['type']) && $image10!="")
													{
														$image10 = $image10_1;
														$img10 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image10"]["tmp_name"],"upload/".$_FILES["image10"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												if($image11=="")
												{
													$image11 = $image11_1;
												}
												else
												{
												if (!preg_match( '/png|jpg|jpeg/', $_FILES['image11']['type']) && $image11!="")
													{
														$image11 = $image11_1;
														$img11 = "";
														echo '<script language="javascript">';
														echo 'alert("Extension not allowed!");';
														echo 'location.replace("view.php");';
														echo '</script>';
														
													}
												else
													{
														move_uploaded_file(	$_FILES["image11"]["tmp_name"],"upload/".$_FILES["image11"]["name"]);
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
														echo '</script>';
													}
												}
												
												$uid = $_POST['uid'];
												
												
												
												
														$req_insert = mysql_query("UPDATE requirements SET brgy_clearance = '$image1', comelec_voter = '$image2', clinical_abstract='$image3', doctors_prescription= '$image4', hosp_bill='$image5', checkup_sched = '$image6', pic='$image7', valid_id='$image8', funeral_contract='$image10', death_cert='$image11' WHERE uid='$uid'");
														
															
														if($string!="")
														{
															echo '<script language="javascript">';
															echo "alert('$string');";
															echo '</script>';
														}
														if ($img1 == "" && $img2 == "" && $img3 == "" && $img4 == "" && $img5 == "" && $img6 == "" && $img7 == "" && $img8 == "" && $img10 == "" && $img11 == "")	
														{
														}
														else
														{
														echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("view.php");';
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