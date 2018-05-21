<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Print</title>
		<link type="text/css" rel="stylesheet" href="style.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="print.css" />
		<script type="text/javascript" src="print.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body onload="window.print()"><a name="top"></a>
	<!--<body><a name="top"></a>-->
		<div id="container">
			<img src="images\banner.jpg" width="100%" height="" />
			<?php
				include("connection.php");
				$user = $_GET['user'];
				$uid = $_GET['uid'];
				$form = $_GET['form'];

				if($form == 'voucher')
				{
					$query_data = mysql_query("SELECT * FROM requests WHERE uid='$uid' LIMIT 1") or die ("Cannot query data.".mysql_error());
					if($query_data)
					{
						while($get_data = mysql_fetch_array($query_data))
						{
							$other = mysql_query("SELECT * FROM voucher");
							$get_other = mysql_fetch_array($other);

							$info = mysql_query("SELECT * FROM clients WHERE uid='$uid' LIMIT 1");
							$get_info = mysql_fetch_array($info);

							if($_SESSION['valid_type'] == 'CADMIN')
							{
			?>
								<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
									<tbody>
										<tr>
											<td style="border:0;width:25%;">Mode of Payment</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['mode']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Payee</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['name']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Address</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['address']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Office/Unit/Project</td>
											<td style="border:0;">:</td>
											<td style="border:0;">CSWD</td>
										</tr>
										<tr>
											<td style="border:0;">Office Code</td>
											<td style="border:0;">:</td>
											<td style="border:0;">7611</td>
										</tr>
										<tr>
											<td style="border:0;"> Explanation
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['reason']; ?></td>
											</td>
										</tr>
										<tr>
											<td style="border:0;">Amount</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Total</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
									</tbody>
								</table>
								<br />
								Issued By: <label for="issuedby"><?php echo $get_other['issuedby']; ?></label><br />
								Issued On: <label for="issuedon"><?php echo $get_other['issuedon']; ?></label><br />
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
											<td style="border:0;"><?php echo $get_data['mode']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Payee</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['name']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Address</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['address']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Office/Unit/Project</td>
											<td style="border:0;">:</td>
											<td style="border:0;">CSWD</td>
										</tr>
										<tr>
											<td style="border:0;">Office Code</td>
											<td style="border:0;">:</td>
											<td style="border:0;">7611</td>
										</tr>
										<tr>
											<td style="border:0;"> Explanation
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['reason']; ?></td>
											</td>
										</tr>
										<tr>
											<td style="border:0;">Amount</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Total</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
									</tbody>
								</table>

								<h4 class="art-postheader"><b>A. Certified </b></h4>
								<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
									<tbody>
										<tr>
											<td style="border:0;" colspan="3">
												Allotment obligated for the purpose as indicated above<?php echo ' - '.$get_other['allotment']; ?><br />
												Supporting Documents complete<?php echo ' - '.$get_other['requirements']; ?>
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
								Issued By: <label for="issuedby"><?php echo $get_other['issuedby']; ?></label><br />
								Issued On: <label for="issuedon"><?php echo $get_other['issuedon']; ?></label><br />
								<br />
								Updated By: <label for="issuedby"><?php echo $get_other['updatedby']; ?></label><br />
								Updated On: <label for="issuedon"><?php echo $get_other['updatedon']; ?></label>
			<?php
							}
							elseif($_SESSION['valid_type'] == 'CTRSRY')
							{
								$name = $table_row['fname'].' '.$table_row['mname'].' '.$table_row['lname'];
			?>
								<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
									<tbody>
										<tr>
											<td style="border:0;width:25%;">Mode of Payment</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['mode']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Payee</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['name']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Address</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['address']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Office/Unit/Project</td>
											<td style="border:0;">:</td>
											<td style="border:0;">CSWD</td>
										</tr>
										<tr>
											<td style="border:0;">Office Code</td>
											<td style="border:0;">:</td>
											<td style="border:0;">7611</td>
										</tr>
										<tr>
											<td style="border:0;"> Explanation
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_info['reason']; ?></td>
											</td>
										</tr>
										<tr>
											<td style="border:0;">Amount</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
										<tr>
											<td style="border:0;">Total</td>
											<td style="border:0;">:</td>
											<td style="border:0;"><?php echo $get_data['approved_budget']; ?></td>
										</tr>
									</tbody>
								</table>

								<h4 class="art-postheader"><b>A. Certified </b></h4>
								<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
									<tbody>
										<tr>
											<td style="border:0;" colspan="3">
												Allotment obligated for the purpose as indicated above<?php echo ' - '.$get_other['allotment']; ?><br />
												Supporting Documents complete<?php echo ' - '.$get_other['requirements']; ?>
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
												Funds Available<?php echo ' - '.$get_other['okfunds']; ?>
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
								Issued By: <label for="issuedby"><?php echo $get_other['issuedby']; ?></label><br />
								Issued On: <label for="issuedon"><?php echo $get_other['issuedon']; ?></label><br />
								<br />
								Updated By: <label for="issuedby"><?php echo $get_other['updatedby']; ?></label><br />
								Updated On: <label for="issuedon"><?php echo $get_other['updatedon']; ?></label>
								<br /><br />
								Finalized By: <label for="issuedby"><?php echo $_SESSION['valid_username']; ?></label><br />
								Finalized On: <label for="issuedon"><?php echo $current_date = date("F d, Y").' '.$current_date = date("h:i A", strtotime("+8 hour")); ?></label>
			<?php
							}
						}
					}
				}
				elseif($form == 'referral')
				{
					$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
					if($profile_query)
					{
						while($profile_rec = mysql_fetch_array($profile_query))
						{
							$getsum = mysql_query("SELECT approved_budget FROM requests WHERE uid='$uid' ");
							$sum = mysql_fetch_object($getsum);
							
							echo '<br /><br />';
							echo $profile_rec['date'];
							$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];							
							echo '<p>Sir/Madam:</p>';
							echo '<p>May we respectfully refer our client, '.$name.', '.$profile_rec['age'].', of '.$profile_rec['address'].' for assistance specified below:</p>';
							echo '<br /><li><u>'.$profile_rec['assistance'].'</u> Assistance with a suggested amount of '.$sum -> approved_budget.' pesos.<br />';
							echo '<br /><strong>Brief Case Background:</strong>';
							echo '<br />The client is in need of the assistance for his/her stated reason: "'.$profile_rec['reason'].'". He/she has a total of '.count(unserialize($profile_rec['dep_name'])).' dependents. <em>Please see client profile for more info.</em><br />';
							echo '<br /><p>Thank you for your kind and immediate attention.</p>';
							echo '<br /><p>Sincerely yours,</p>';
							echo '<br />';
							echo '<p>NADEIA S. SARTE</p>';
							echo '<p>Officer-in-charge</p>';							
						}
					}
				}
				elseif($form == 'profile')
				{
					$profile_query = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM clients WHERE id='$id' OR uid='$uid' LIMIT 1") or die("This webpage is not available.<br />".mysql_error());
					if($profile_query)
					{
						if(mysql_num_rows($profile_query) > 0)
						{
							while($profile_rec = mysql_fetch_array($profile_query))
							{
								$name = $profile_rec['fname'].' '.$profile_rec['mname'].' '.$profile_rec['lname'];
								echo '<h4>Showing records of '.strtoupper($profile_rec['lname']).', '.strtoupper($profile_rec['fname']).' '.strtoupper(substr($profile_rec['mname'], 0, 1)).'.</h4>';
								echo '<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">';
									echo '<tbody>';
										echo '<tr>';
											echo '<td style="border:0;width:25%;">Date of request</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['date'].'</td>';
										echo '</tr>';
										echo '<tr><td style="border:0;">&nbsp;</td></tr>';
										echo '<tr>';
											echo '<td style="border:0;">User ID</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['uid'].'</td>';
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
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Gender</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['gender'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Birthdate</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['bdate'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Birth Place</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['bplace'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Civil Status</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['civilstat'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Religion</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['religion'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Educational Attainment</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['educ'].'</td>';
										echo '</tr>';
											echo '<tr>';
											echo '<td style="border:0;">Occupation</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['job_title'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Est. Monthly Income</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['income'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">No. of Dependents</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.count(unserialize($profile_rec['dep_name'])).'</td>';
										echo '</tr>';																
										echo '<tr><td style="border:0;">&nbsp;</td></tr>';
										echo '<tr>';
											echo '<td style="border:0;">Barangay</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['brgy'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Address</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['address'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Contact No.</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['telno'].'</td>';
										echo '</tr>';
										echo '<tr><td style="border:0;">&nbsp;</td></tr>';										
										echo '<tr>';
											echo '<td style="border:0;">Requested Assistance</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['assistance'].'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Suggested Budget</td>';
											echo '<td style="border:0;">:</td>';
											$getsum = mysql_query("SELECT approved_budget FROM requests WHERE uid='".$profile_rec['uid']."' ");
											$sum = mysql_fetch_object($getsum);
											echo '<td style="border:0;">'.$sum -> approved_budget.'</td>';
										echo '</tr>';
										echo '<tr>';
											echo '<td style="border:0;">Post</td>';
											echo '<td style="border:0;">:</td>';
											echo '<td style="border:0;">'.$profile_rec['post'].'</td>';
										echo '</tr>';
									echo '</tbody>';
								echo '</table>';
							}
						}
					}
				}
			?>
			<br /><br /><hr /><br /><br />
		</div>
	</body>
</html>