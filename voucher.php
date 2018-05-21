<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Voucher</title>
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
									<!--<h2 class="art-postheader">Client Profile</h2>-->
										<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self" enctype="multipart/form-data">
									<div class="art-postcontent art-postcontent-0 clearfix">
										<h4 class="art-postheader" align="center"><u>Disbursement Voucher</u></h4>
										<?php
											$uid = $_GET['uid'];

											$query_data = mysql_query("SELECT * FROM requests WHERE uid='$uid' LIMIT 1") or die ("Cannot query data.".mysql_error());
											if($query_data)
											{
												while($get_data = mysql_fetch_array($query_data))
												{
													if($_SESSION['valid_type'] == 'CADMIN')
													{
										?>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;width:25%;">Mode of Payment</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="mode" value="<?php echo $get_data['mode']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Payee</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="payee" value="<?php echo $get_data['name']; ?>" readonly="readonly" /></td>
																</tr>
																<?php
																	$other = mysql_query("SELECT * FROM clients");
																	$get_other = mysql_fetch_array($other);
																?>
																<tr>
																	<td style="border:0;">Address</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="address" value="<?php echo $get_other['address']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office/Unit/Project</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="unit_project" value="CSWD" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office Code</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="code" value="7611" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;"> Explanation
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="reason" style="width:50%;" value="<?php echo $get_other['reason']; ?>" readonly="readonly" />
																	</td>
																</tr>
																<tr>
																	<td style="border:0;">Amount</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="amount" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Total</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="total" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
															</tbody>
														</table>
														<br />
														Issued By: <label for="issuedby"><?php echo $_SESSION['valid_username']; ?></label><br />
														Issued On: <label for="issuedon"><?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?></label>
														<br /><br />
														<input type="submit" name="save" value="Save" class="art-button" />
														<input type="button" name="back" value="Back" class="art-button" onclick="window.history.go(-1);" />
														<input type="button" name="print" value="Print" class="art-button" onclick="location.replace('print.php?form=voucher&amp;user=<?php echo $_SESSION['valid_type']; ?>&amp;uid=<?php echo $uid; ?>');" target="_blank" />
										<?php
													}
													elseif($_SESSION['valid_type'] == 'CACCTG')
													{
										?>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;width:25%;">Mode of Payment</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="mode" value="<?php echo $get_data['mode']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Payee</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="payee" value="<?php echo $get_data['name']; ?>" readonly="readonly" /></td>
																</tr>
																<?php
																	$other = mysql_query("SELECT * FROM clients");
																	$get_other = mysql_fetch_array($other);
																?>
																<tr>
																	<td style="border:0;">Address</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="address" value="<?php echo $get_other['address']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office/Unit/Project</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="unit_project" value="CSWD" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office Code</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="code" value="7611" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;"> Explanation
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="reason" style="width:50%;" value="<?php echo $get_other['reason']; ?>" readonly="readonly" />
																	</td>
																</tr>
																<tr>
																	<td style="border:0;">Amount</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="amount" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Total</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="total" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
															</tbody>
														</table>

														<h4 class="art-postheader"><b>A. Certified </b></h4>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;" colspan="3">
																		<input type="checkbox" name="cert[]" value="Checked" />Allotment obligated for the purpose as indicated above<br />
																		<input type="checkbox" name="cert[]" value="Checked" />Supporting Documents complete
																	</td>
																</tr>
																<tr><td style="border:0;">&nbsp;</td></tr>
																<tr>
																	<td style="border:0;width:25%;">Certified By</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">PRESCILA P. SANGALANG</td>
																</tr>
																<tr>
																	<td style="border:0;">Position</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">City Accountant<br />Head, Accounting Unit/Authorized Representative</td>
																</tr>
															</tbody>
														</table>
														<br />
														<?php
															$other = mysql_query("SELECT * FROM voucher");
															$get_other = mysql_fetch_array($other);
														?>
														Issued By: <label for="issuedby"><?php echo $get_other['issuedby']; ?></label><br />
														Issued On: <label for="issuedon"><?php echo $get_other['issuedon']; ?></label><br />
														<br />
														Updated By: <label for="issuedby"><?php echo $_SESSION['valid_username']; ?></label><br />
														Updated On: <label for="issuedon"><?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?></label>
														<br /><br />
														<input type="submit" name="save" value="Save" class="art-button" />
														<input type="hidden" name="datetime" value="<?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?>" class="art-button" />
														<input type="button" name="back" value="Back" class="art-button" onclick="window.history.go(-1);" />
														<input type="button" name="print" value="Print" class="art-button" onclick="location.replace('print.php?form=voucher&amp;user=<?php echo $_SESSION['valid_type']; ?>&amp;uid=<?php echo $uid; ?>');" target="_blank" />
										<?php
													}
													elseif($_SESSION['valid_type'] == 'CTRSRY')
													{
										?>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;width:25%;">Mode of Payment</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="mode" value="<?php echo $get_data['mode']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Payee</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="payee" value="<?php echo $get_data['name']; ?>" readonly="readonly" /></td>
																</tr>
																<?php
																	$other = mysql_query("SELECT * FROM clients");
																	$get_other = mysql_fetch_array($other);
																?>
																<tr>
																	<td style="border:0;">Address</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="address" value="<?php echo $get_other['address']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office/Unit/Project</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="unit_project" value="CSWD" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Office Code</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="code" value="7611" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;"> Explanation
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" name="reason" style="width:50%;" value="<?php echo $get_other['reason']; ?>" readonly="readonly" />
																	</td>
																</tr>
																<tr>
																	<td style="border:0;">Amount</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="amount" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
																<tr>
																	<td style="border:0;">Total</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;"><input type="" style="width:50%" name="total" value="<?php echo $get_data['approved_budget']; ?>" readonly="readonly" /></td>
																</tr>
															</tbody>
														</table>
													

														<h4 class="art-postheader"><b>A. Certified </b></h4>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;" colspan="3">
																		<input type="checkbox" name="check1" checked="checked" />Allotment obligated for the purpose as indicated above<br />
																		<input type="checkbox" name="check2" checked="checked" />Supporting Documents complete
																	</td>
																</tr>
																<tr><td style="border:0;">&nbsp;</td></tr>
																<tr>
																	<td style="border:0;width:25%;">Certified By</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">PRESCILA P. SANGALANG</td>
																</tr>
																<tr>
																	<td style="border:0;">Position</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">City Accountant<br />Head, Accounting Unit/Authorized Representative</td>
																</tr>
															</tbody>
														</table>

														<h4 class="art-postheader"><b>B. Certified </b></h4>
														<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<td style="border:0;" colspan="3">
																		<input type="checkbox" name="okfunds" value="Checked" />Funds Available
																	</td>
																</tr>
																<tr><td style="border:0;">&nbsp;</td></tr>
																<tr>
																	<td style="border:0;width:25%;">Certified By</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">JOSEFINA O. DE JESUS</td>
																</tr>
																<tr>
																	<td style="border:0;">Position</td>
																	<td style="border:0;">:</td>
																	<td style="border:0;">City Treasurer<br />Treasurer/Authorized Representaive</td>
																</tr>
															</tbody>
														</table>
														<br />
														<?php
															$other = mysql_query("SELECT * FROM voucher");
															$get_other = mysql_fetch_array($other);
														?>													
														Issued By: <label for="issuedby"><?php echo $get_other['issuedby']; ?></label><br />
														Issued On: <label for="issuedon"><?php echo $get_other['issuedon']; ?></label><br />
														<br />
														Updated By: <label for="issuedby"><?php echo $get_other['updatedby']; ?></label><br />
														Updated On: <label for="issuedon"><?php echo $get_other['updatedon']; ?></label>
														<br /><br />
														Finalized By: <label for="issuedby"><?php echo $_SESSION['valid_username']; ?></label><br />
														Finalized On: <label for="issuedon"><?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?></label>														
														<br /><br />
														<input type="submit" name="save" value="Save" class="art-button" />
														<input type="hidden" name="datetime" value="<?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?>" class="art-button" />
														<input type="button" name="back" value="Back" class="art-button" onclick="window.history.go(-1);" />
														<input type="button" name="print" value="Print" class="art-button" onclick="location.replace('print.php?form=voucher&amp;user=<?php echo $_SESSION['valid_type']; ?>&amp;uid=<?php echo $uid; ?>');" target="_blank" />
										<?php
													}
												}
											}

											if($_POST['save'])
											{
												if($_SESSION['valid_type'] == 'CADMIN')
												{
													$issuedby = $_SESSION['valid_username'];

													$save_data = "INSERT INTO voucher(uid, issuedby) VALUES('$uid', '$issuedby')";
													$result = mysql_query($save_data) or die("Cannot process request".mysql_error());
													if($result)
													{
														echo '<script language="javascript">';
															echo 'alert("Voucher successfully issued.");';
															echo 'window.history.go(-1);';
														echo '</script>';
													}
												}
												elseif($_SESSION['valid_type'] == 'CACCTG')
												{
													$updatedby = $_SESSION['valid_username'];
													$updatedon = $_POST['datetime'];
													$check = $_POST['cert'];

													$save_data = "UPDATE voucher SET updatedby='$updatedby', updatedon='$updatedon', allotment='$check[0]', requirements='$check[1]' ";
													$result = mysql_query($save_data) or die("Cannot process request".mysql_error());
													if($result)
													{
														echo '<script language="javascript">';
															echo 'alert("Voucher successfully updated.");';
															echo 'window.history.go(-1);';
														echo '</script>';
													}
												}
												elseif($_SESSION['valid_type'] == 'CTRSRY')
												{
													$finalizedby = $_SESSION['valid_username'];
													$finalizedon = $_POST['datetime'];
													$okfunds = $_POST['okfunds'];

													$save_data = "UPDATE voucher SET finalizedby='$finalizedby', finalizedon='$finalizedon', okfunds='$okfunds' ";
													$result = mysql_query($save_data) or die("Cannot process request".mysql_error());
													if($result)
													{
														echo '<script language="javascript">';
															echo 'alert("Voucher successfully updated.");';
															echo 'window.history.go(-1);';
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