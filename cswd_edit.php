<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Application Form</title>
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
									<h2 class="art-postheader">Financial Assistance Application Form</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");
											
											$id = $_GET['id'];
											$uid = $_GET['uid'];
											
											$table_query = mysql_query("SELECT * FROM clients WHERE uid='$uid' LIMIT 1") or die("Cannot query user information.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													while($table_row = mysql_fetch_array($table_query))
													{
										?>
														<fieldset>
															<legend>Personal Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:20%">First Name</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="fname" value="<?php echo $table_row['fname']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Middle Name</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="mname" value="<?php echo $table_row['mname']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Last Name</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="lname" value="<?php echo $table_row['lname']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Age</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="age" value="<?php echo $table_row['age']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Birthdate</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="date" style="width:50%" name="bdate" style="width:50%" value="<?php echo $table_row['bdate']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Birthplace</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="bplace" value="<?php echo $table_row['bplace']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Gender</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_gender.php"); ?></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Religion</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_religion.php"); ?></td>
																	</tr>
																</tbody>
															</table>
														</fieldset>
														<br />
														<fieldset>
															<legend>Contact Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:20%;">Barangay</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_brgy.php"); ?></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Address</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="address" value="<?php echo $table_row['address']; ?>" required /></td>
																	</tr>
																	<tr>
																	  <td style="border:0;">Tel No.</td>
																	  <td style="border:0;">:</td>
																	  <td style="border:0;"><input type="" style="width:50%" name="telno" value="<?php echo $table_row['telno']; ?>" required /></td>
																	</tr>
																	<tr>
																	  <td style="border:0;">Mobile No.</td>
																	  <td style="border:0;">:</td>
																	  <td style="border:0;"><input type="" style="width:50%" name="celno" value="<?php echo $table_row['mobile_no']; ?>" required /></td>
																	</tr>
																	<tr>
																	  <td style="border:0;">Email Address</td>
																	  <td style="border:0;">:</td>
																	  <td style="border:0;"><input type="" style="width:50%" name="eadd" value="<?php echo $table_row['email']; ?>" required /></td>
																	</tr>
																</tbody>
															</table>
														</fieldset>
														<br />
														<fieldset>
															<legend>Employment Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:30%;">Educational Attainment</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_educ.php"); ?></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Work Experience</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"></td>
																	</tr>
																</tbody>
															</table>
															<table class="art-article" id="dataTable"cellpadding="2" cellspacing="2" style="width:100%">
															<br />
															<tbody>
																<tr>
																	<th></th>
																	<th>Job Title</th>
																	<th>Mo. & Yr Started</th>   
																	<th>Employment</th>   
																	<th>Employer</th>             
																	<th>Skill</th>                                       
																	<th>Monthly Income</th>
																</tr>
															   <tr>
																	<td style="border:1;"><input type="checkbox" name="chk"/></td>
																	<td style="border:1;"><input type="" style="width:100%" name="job_title" value="" required /></td>
																	<td style="border:1;"><input type="" style="width:100%" name="month_year" value="" required /></td>
																	<td style="border:1;">
																		<select name="employment">
																			<option disabled="disabled" selected="selected">Employment</option>
																			<option value="Contractual">Contractual</option>
																			<option value="Regular">Regular</option>
																			<option value="Self_Employed">Self-Employed</option>
																			<option value="Seasonal">Seasonal</option>
																		</select>
																	</td>
																	<td style="border:1;">
																		<select name="employer">
																			<option disabled="disabled" selected="selected">Employer</option>
																			<option value="Private">Private</option>
																			<option value="Public">Public</option>
																		</select>
																	</td>
																	<td style="border:1;">
																		<select name="skill">
																			<option disabled="disabled" selected="selected">Skill</option>
																			<option value="Political Official">Political Official</option>
																			<option value="Manager">Exec or Mngr</option>
																			<option value="Professional">Professional</option>
																			<option value="Technician ">Technician</option>
																			<option value="Clerk">Clerk</option>
																			<option value="Service Worker">Service Worker</option>
																			<option value="Agricultural">Agricultural</option>
																			<option value="Industrial">Industrial</option>
																			<option value="Assembler">Assembler</option>
																			<option value="Labor">Laborer</option>
																			<option value="Unskilled">Unskilled Worker</option>
																			<option value="Special Occupation">Special Occupation</option>
																		</select></td>
																	<td style="border:1;"><input type="" style="width:100%" name="income" value="" required /></td>
																</tr>
															</tbody>
														</table>
														
														</br >
														<input type="button" class="art-button" value="Add Row" onclick="addRow('dataTable')" />
														<input type="button" class="art-button" value="Delete Row" onclick="deleteRow('dataTable')" />    
														
														<script language="javascript">
															function addRow(tableID) 
															{
																var table = document.getElementById(tableID);
																var rowCount = table.rows.length;
																var row = table.insertRow(rowCount);									 
																var colCount = table.rows[0].cells.length;
																
																for(var i=0; i<colCount; i++) 
																{									 
																	var newcell = row.insertCell(i);
																	newcell.innerHTML = table.rows[1].cells[i].innerHTML;
																	//alert(newcell.childNodes);
																	switch(newcell.childNodes[0].type) 
																	{
																		case "text":
																				newcell.childNodes[0].value = "";
																				break;
																		case "checkbox":
																				newcell.childNodes[0].checked = false;
																				break;
																		case "select-one":
																				newcell.childNodes[0].selectedIndex = 0;
																				break;
																	}
																}
															}
													 
															function deleteRow(tableID) 
															{
																try 
																{
																	var table = document.getElementById(tableID);
																	var rowCount = table.rows.length;
													 
																	for(var i=0; i<rowCount; i++) 
																	{
																		var row = table.rows[i];
																		var chkbox = row.cells[0].childNodes[0];
																		if(null != chkbox && true == chkbox.checked) 
																		{
																			if(rowCount <= 2) 
																			{
																				alert("Cannot delete all the rows.");
																				break;
																			}
																			table.deleteRow(i);
																			rowCount--;
																			i--;
																		}										 
																	}
																}
																catch(e) 
																{
																	alert(e);
																}
															}									 
														</SCRIPT>
														</fieldset>
														<br />
														<fieldset>
															<legend>Family Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:30%;">Civil Status</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_civilstat.php"); ?></td>
																	</tr>
																	<tr>
																		<td style="border:0;width:30%;">Residence</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_residence.php"); ?></td>
																	</tr>													
																	<tr>
																		<td style="border:0;">Family Composition</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"></td>
																	</tr>
																</tbody>
															</table>
															
															<table class="art-article" id="dataTable2" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
															<tbody>
																<tr>
																	<th></th>
																	<th>Name</th>
																	<th>Age</th>
																	<th>Relationship</th>
																	<th>Education</th>
																	<th>Occupation</th>
																</tr>
																<tr>
																	<td style="border:1;"><input type="checkbox" name="chk"/></td>
																	<td style="border:1;"><input type="" name="dep_name[]" required /></td>
																	<td style="border:1;"><input type="" name="dep_age[]" required /></td>
																	<td style="border:1;"><input type="" name="dep_rel[]" required /></td>
																	<td style="border:1;"><input type="" name="dep_educ[]" required /></td>
																	<td style="border:1;"><input type="" name="dep_occupation[]" required /></td>
																</tr>
															</tbody>
														</table>
														
														</br >
														<input type="button" class="art-button" value="Add Row" onclick="addRow('dataTable2')" />
														<input type="button" class="art-button" value="Delete Row" onclick="deleteRow('dataTable2')" />    
														
														<script language="javascript">
															function addRow(tableID) 
															{
																var table = document.getElementById(tableID);
																var rowCount = table.rows.length;
																var row = table.insertRow(rowCount);									 
																var colCount = table.rows[0].cells.length;
																
																for(var i=0; i<colCount; i++) 
																{									 
																	var newcell = row.insertCell(i);
																	newcell.innerHTML = table.rows[1].cells[i].innerHTML;
																	//alert(newcell.childNodes);
																	switch(newcell.childNodes[0].type) 
																	{
																		case "text":
																				newcell.childNodes[0].value = "";
																				break;
																		case "checkbox":
																				newcell.childNodes[0].checked = false;
																				break;
																		case "select-one":
																				newcell.childNodes[0].selectedIndex = 0;
																				break;
																	}
																}
															}
													 
															function deleteRow(tableID) 
															{
																try 
																{
																	var table = document.getElementById(tableID);
																	var rowCount = table.rows.length;
													 
																	for(var i=0; i<rowCount; i++) 
																	{
																		var row = table.rows[i];
																		var chkbox = row.cells[0].childNodes[0];
																		if(null != chkbox && true == chkbox.checked) 
																		{
																			if(rowCount <= 2) 
																			{
																				alert("Cannot delete all the rows.");
																				break;
																			}
																			table.deleteRow(i);
																			rowCount--;
																			i--;
																		}										 
																	}
																}
																catch(e) 
																{
																	alert(e);
																}
															}									 
														</SCRIPT>
														
														</fieldset>
														<br />
														<fieldset>
															<legend>Organizational Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;"></td>
																	</tr>
																</tbody>
															</table>
															<table class="art-article" id="dataTable3" cellpadding="2" cellspacing="2" style="width:100%">
															<tbody>
																<tr>
																	<th></th>
																	<th>Name</th>
																	<th>Position</th>
																	<th>Address</th>
																	<th>Contact Person</th>
																	<th>Contact Address</th>
																</tr>
															   <tr>
																	<td style="border:1;"><input type="checkbox" name="chk"/></td>
																	<td style="border:1;"><input type="" style="width:100%" name="org_name[]" value="" required /></td>
																	<td style="border:1;"><input type="" style="width:100%" name="org_position[]" value="" required /></td>
																	<td style="border:1;"><input type="" style="width:100%" name="org_address[]" value="" required /></td>
																	<td style="border:1;"><input type="" style="width:100%" name="org_cperson[]" value="" required /></td>
																	<td style="border:1;"><input type="" style="width:100%" name="org_caddress[]" value="" required /></td>
																</tr>
															</tbody>
														</table>
														
														</br >
														<input type="button" class="art-button" value="Add Row" onclick="addRow('dataTable3')" />
														<input type="button" class="art-button" value="Delete Row" onclick="deleteRow('dataTable3')" />    
														
														<script language="javascript">
															function addRow(tableID) 
															{
																var table = document.getElementById(tableID);
																var rowCount = table.rows.length;
																var row = table.insertRow(rowCount);									 
																var colCount = table.rows[0].cells.length;
																
																for(var i=0; i<colCount; i++) 
																{									 
																	var newcell = row.insertCell(i);
																	newcell.innerHTML = table.rows[1].cells[i].innerHTML;
																	//alert(newcell.childNodes);
																	switch(newcell.childNodes[0].type) 
																	{
																		case "text":
																				newcell.childNodes[0].value = "";
																				break;
																		case "checkbox":
																				newcell.childNodes[0].checked = false;
																				break;
																		case "select-one":
																				newcell.childNodes[0].selectedIndex = 0;
																				break;
																	}
																}
															}
													 
															function deleteRow(tableID) 
															{
																try 
																{
																	var table = document.getElementById(tableID);
																	var rowCount = table.rows.length;
													 
																	for(var i=0; i<rowCount; i++) 
																	{
																		var row = table.rows[i];
																		var chkbox = row.cells[0].childNodes[0];
																		if(null != chkbox && true == chkbox.checked) 
																		{
																			if(rowCount <= 2) 
																			{
																				alert("Cannot delete all the rows.");
																				break;
																			}
																			table.deleteRow(i);
																			rowCount--;
																			i--;
																		}										 
																	}
																}
																catch(e) 
																{
																	alert(e);
																}
															}									 
														</SCRIPT>
														</fieldset>
														<br />
														<fieldset>
															<legend>Tax Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:20%">SSS No.</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="sss" value="<?php echo $table_row['sss']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">GSIS No.</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="gsis" value="<?php echo $table_row['gsis']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">PhilHealth No.</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="philhealth" value="<?php echo $table_row['philhealth']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">PAG-IBIG No.</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="pagibig" value="<?php echo $table_row['pagibig']; ?>" required /></td>
																	</tr>

																</tbody>
															</table>
														</fieldset>
														<br />
														<fieldset>
															<legend>Request Information</legend>
															<table class="art-article" cellpadding="2" cellspacing="2" style="border:0;width:100%;">
																<tbody>
																	<tr>
																		<td style="border:0;width:20%;">Source of Information</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="informant" value="<?php echo $table_row['info_source']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Relation to the Client</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="informant_rel" value="<?php echo $table_row['client_relation']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Assistance</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><?php include("combo_assistance.php"); ?></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Budget</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="budget" placeholder="Budget" value="<?php echo $table_row['budget']; ?>" required /></td>
																	</tr>
																	<tr>
																		<td style="border:0;">Reason</td>
																		<td style="border:0;">:</td>
																		<td style="border:0;"><input type="" style="width:50%" name="reason" placeholder="State reason for request" value="<?php echo $table_row['reason']; ?>" required /></td>
																	</tr>
																	
																</tbody>
															</table>											
														</fieldset>
														<br />
														<input type="submit" name="submit" value="Submit" class="art-button" />
														<input type="reset" name="cancel" value="Cancel" class="art-button" onclick="window.history.go(-1);" />													
										<?php
													}
												}
											}
											
											if($_POST['submit'])
											{		
												$fname = ucwords($_POST['fname']);
												$mname = ucwords($_POST['mname']);
												$lname = ucwords($_POST['lname']);
												$name = $fname.' '.$mname.' '.$lname;
												$age = $_POST['age'];
												$bdate = $_POST['bdate'];
												$bplace = $_POST['bplace'];
												$gender = $_POST['gender'];
												$religion = $_POST['religion'];
												$brgy = $_POST['brgy'];
												$address = ucfirst($_POST['address']);
												$telno = $_POST['telno'];
												$celno = $_POST['celno'];
												$eadd = $_POST['eadd'];												
												$educ = $_POST['educ'];
												$job_title = $_POST['job_title'];
												$month_year = $_POST['month_year'];
												$employment = $_POST['employment'];
												$employer = $_POST['employer'];
												$skill = $_POST['skill'];											
												$income = $_POST['income'];
												
												$civilstat = $_POST['civilstat'];
												$residence = $_POST['residence'];
												$dep_name = serialize($_POST['dep_name']);
												$dep_age= serialize($_POST['dep_age']);
												$dep_rel = serialize($_POST['dep_rel']);
												$dep_educ = serialize($_POST['dep_educ']);
												$dep_occupation = serialize($_POST['dep_occupation']);
												
												$org_name = serialize($_POST['org_name']);
												$org_position = serialize($_POST['org_position']);
												$org_address = serialize($_POST['org_address']);
												$org_contact_person = serialize($_POST['org_cperson']);
												$org_contact_address = serialize($_POST['org_caddress']);
												
												$sss = $_POST['sss'];
												$gsis = $_POST['gsis'];
												$philhealth = $_POST['philhealth'];
												$pagibig = $_POST['pagibig'];
												
												$informant = $_POST['informant'];
												$informant_rel = $_POST['informant_rel'];
												$assistance = $_POST['assistance'];
												$budget = str_replace(',','',$_POST['budget']);
												$reason = mysql_escape_string($_POST['reason']);
												
												//$client_query = mysql_query("SELECT * FROM clients WHERE fname='$fname' AND mname='$mname' AND lname='$lname'");
												
												$uname = strtoupper(substr($fname, 0, 3));
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = trim($uname.$today);
												
												//insert sa clients table
												$client_update = mysql_query("UPDATE clients SET fname='$fname', mname='$mname', lname='$lname', age='$age', bdate='$bdate', bplace='$bplace', gender='$gender', religion='$religion', brgy='$brgy', address='$address', telno='$telno', mobile_no='$celno', email='$eadd', educ='$educ', job_title='$job_title', month_year='$month_year', employment='$employment', employer='$employer', skill='$skill', income='$income', civilstat='$civilstat', residence='$residence', dep_name='$dep_name', dep_age='$dep_age', dep_rel='$dep_rel', dep_educ='$dep_educ', dep_occupation='$dep_occupation', org_name='$org_name', org_position='$org_position', org_address='$org_address', org_contact_person='$org_contact_person', org_contact_address='$org_contact_address', sss='$sss', gsis='$gsis', philhealth='$philhealth', pagibig='$pagibig', info_source='$informant', client_relation='$informant_rel', assistance='$assistance', budget='$budget', reason='$reason' WHERE uid='$uid' LIMIT 1")or die("Trouble in saving data.<br />".mysql_error());
												
												if($client_update)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Saved.");';
														echo 'window.history.go(-1);';
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