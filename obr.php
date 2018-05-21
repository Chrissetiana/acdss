<?php
	include("session_call.php");
	/*if($_SESSION['valid_type'] != 'CACCTG')
	{
		echo '<script language="javascript">';
			echo 'location.replace("index.php");';
		echo '</script>';
	}*/
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
										<h4 class="art-postheader" align="center"><u>Obligation Request</u></h4>
										<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
											<tbody>
												<tr>
													<td style="border:0;width:25%">Request No.</td>
													<td style="border:0;"><input type="" style="width:50%" name="requestno" placeholder="Request No. " /></td>
												</tr>
												<tr>
													<td style="border:0;">Payee</td>
													<td style="border:0;"><input type="" style="width:50%" name="payee" placeholder="Payee" /></td>
												</tr>
												<tr>
													<td style="border:0;">Office/Department</td>
													<td style="border:0;"><input type="" style="width:50%" name="office_dept" placeholder="Office/Department" /></td>
												</tr>	
												<tr>
													<td style="border:0;">Address</td>
													<td style="border:0;"><input type="" style="width:50%" name="address" placeholder="Address" /></td>
												</tr>												
												<tr>
													<td style="border:0;">Responsibility Center</td>
													<td style="border:0;"><input type="" style="width:50%" name="responsibility_center" value="CSWD" readonly="readonly" /></td>
												</tr>
												<tr>
                                                	<td style="border:0;"> Particulars
                                                    <td style="border:0;"><textarea maxlength="2000" name="particulars" cols="50" rows="5" style="width:50%;" placeholder="Particulars"></textarea>
													</td>
                                                </tr>
												<tr>
													<td style="border:0;">F.P.P</td>
													<td style="border:0;"><input type="" style="width:50%" name="fpp" placeholder="F.P.P" /></td>
												</tr>
												<tr>
													<td style="border:0;">Account Code</td>
													<td style="border:0;"><input type="" style="width:50%" name="accnt_code" placeholder="Account Code" /></td>
												</tr>	
												<tr>
													<td style="border:0;">Amount</td>
													<td style="border:0;"><input type="" style="width:50%" name="amount" placeholder="Amount" /></td>
												</tr>		
												<tr>
													<td style="border:0;">Total</td>
													<td style="border:0;"><input type="" style="width:50%" name="total" placeholder="Total" /></td>
												</tr>						
											</tbody>
										</table>
										
										<h4 class="art-postheader"><b>A. Certified </b></h4>
										<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
											<tbody>
												<tr>
													<td style="border:0;width:25%"></td>	
													<td style="border:0;"><input type="radio" name="cert" value="Charges to appropriation/allotment necessary lawful and under my direct supervision" />Charges to appropriation/allotment necessary lawful and under my direct supervision</td>	
												</tr>
												<tr>
													<td style="border:0;"></td>
													<td style="border:0;"><input type="radio" name="cert" value="Suporting documents valid, proper and legal" />Suporting Documents complete</td>
												</tr>
												<tr>
													<td style="border:0;">Signature</td>
													<td style="border:0;"><input type="" style="width:50%" name="signature1" placeholder="Signature" /></td>
												</tr>
												<tr>
													<td style="border:0;">Printed Name</td>
													<td style="border:0;"><input type="" style="width:50%" name="printed_name1" placeholder="Printed Name" /></td>
												</tr>
												<tr>
													<td style="border:0;">Position</td>
													<td style="border:0;"><input type="" style="width:50%" name="position1" value="Officer-In-Charge" readonly /></td>
												</tr>
												<tr>
													<td style="border:0;"></td>
													<td style="border:0;">Head, Requesting Office/Authorized Representative</td>
												</tr>
												<tr>
													<td style="border:0;">Date</td>
													<td style="border:0;"><input type="date" style="width:50%" name="date2"  /></td>
												</tr>					
											</tbody>
										</table>
										
										<h4 class="art-postheader"><b>B. Certified </b></h4>
										<table class="art-article" cellpadding="2" cellspacing="2" style="width:100%">
											<tbody>
												<tr>
													<td style="border:0;width:25%"></td>	
													<td style="border:0;">EXISTENCE OF AVAILABLE APPROPRIATION</td>	
												</tr>
												</tr>
												<tr>
													<td style="border:0;">Signature</td>
													<td style="border:0;"><input type="" style="width:50%" name="signature2" placeholder="Signature" /></td>
												</tr>
												<tr>
													<td style="border:0;">Printed Name</td>
													<td style="border:0;"><input type="" style="width:50%" name="printed_name2" value="MARISSA D. MERCADO" readonly /></td>
												</tr>
												<tr>
													<td style="border:0;">Position</td>
													<td style="border:0;"><input type="" style="width:50%" name="position2" value="Supervising Administrative Officer" readonly /></td>
												</tr>
												<tr>
													<td style="border:0;"></td>
													<td style="border:0;">Head, Budget Unit/Authorized Representaive</td>
												</tr>
												<tr>
													<td style="border:0;">Date</td>
													<td style="border:0;"><input type="date" style="width:50%" name="date2"  /></td>
												</tr>					
											</tbody>
										</table>
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