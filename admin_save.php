<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Admin | Save</title>
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
									<h2 class="art-postheader">Save / Update Record</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
										<?php
											include("connection.php");

											$table_name = mysql_escape_string(trim($_POST['table']));

											if($table_name == "users")
											{
												$name = mysql_escape_string(trim($_POST['name']));
												$pwd = mysql_escape_string(trim($_POST['pwd']));
												
												$uname = substr($name, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;

												$table_insert = "INSERT INTO $table_name(uid, username, password) VALUES('".$uid."','".$name."','".$pwd."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=users");';
													echo '</script>';
												}
											}
											elseif($table_name == "client_cs")
											{
												$brgy = $_POST['client_brgy'];
												$fname = ucfirst($_POST['client_fname']);
												$mname = ucfirst($_POST['client_mname']);
												$lname = ucfirst($_POST['client_lname']);
												$name = $fname.' '.$mname.' '.$lname;
												$age = $_POST['client_age'];
												$religion = $_POST['client_religion'];
												$civilstat = $_POST['client_civilstat'];
												$bdate = $_POST['client_bdate'];
												$bplace = ucfirst($_POST['client_bplace']);
												$address = ucfirst($_POST['client_address']);
												$educ = $_POST['client_educ'];
												$job = $_POST['client_job'];
												$informant = $_POST['client_informant'];
												$informant_rel = $_POST['client_informant_rel'];
												$assistance = $_POST['client_assistance'];
												$requirements = $_POST['client_requirements'];
												$post = $_POST['client_post'];
												$budget = $_POST['client_budget'];
												$dep_name = $_POST['client_dep_name'];
												$dep_age = $_POST['client_dep_age'];
												$dep_rel = $_POST['client_dep_rel'];
												$dep_civilstat = $_POST['client_dep_civilstat'];
												$dep_educ= $_POST['client_dep_educ'];
												$dep_job = $_POST['client_dep_job'];
												$prob_presented = $_POST['client_prob_pres'];
												$present_functioning = $_POST['client_pres_functioning'];
												$fam_rel = $_POST['client_fam_rel'];
												$support_sys = $_POST['client_support_sys'];
												$eco_condition = $_POST['client_eco_con'];
												$other_assistances = $_POST['client_other_assist'];
												$eval = $_POST['client_eval'];
												$status = $_POST['client_status'];
												
												$uname = substr($fname, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;
												
												
												$count = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM client_cs WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname' ");
												if (mysql_num_rows($count) > 0)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Exists.");';
														echo 'location.replace("admin_add.php");';
													echo '</script>';
												}

												else
												{
													$client_insert = "INSERT INTO client_cs(uid, brgy, fname, mname, lname, age, religion, civilstat, bdate, bplace, address, educ, job, informant, informant_rel, assistance, requirements, post, budget, dep_name, dep_age, dep_rel, dep_civilstat, dep_educ, dep_job, prob_presented, present_functioning, fam_rel, support_sys, eco_condition, other_assistances, eval, status)
																	VALUES('".$uid."','".$brgy."','".$fname."','".$mname."','".$lname."','".$age."','".$religion."','".$civilstat."','".$bdate."','".$bplace."','".$address."','".$educ."','".$job."','".$informant."','".$informant_rel."','".$assistance."','".$requirements."','".$post."','".$budget."','".$dep_name."','".$dep_age."','".$dep_rel."','".$dep_civilstat."','".$dep_educ."','".$dep_job."','".$prob_presented."','".$present_functioning."','".$fam_rel."','".$support_sys."','".$eco_condition."','".$other_assistances."','".$eval."','".$status."')";
													$result = mysql_query($client_insert) or die("Trouble in saving data.<br />".mysql_error());
													if($result)
													{
														$client_add = "INSERT INTO users (uid, username) VALUES ('".$uid."','".$name."')";
														$added = mysql_query($client_add) or die("Trouble in saving data".mysql_error());
														if($added)
														{
															echo '<script language=javascript>';
																echo 'alert("Record Saved.");';
																echo 'location.replace("admin_view.php?table=client_cs");';
															echo '</script>';
														}
													}
													else
													{
														echo '<script language=javascript>';
															echo 'alert("Problem in saving data.");';
														echo '</script>';
													}
												}
											}
											
											elseif($table_name == "client_gi")
											
											{
												$fname = ucfirst($_POST['gi_fname']);
												$mname = ucfirst($_POST['gi_mname']);
												$lname = ucfirst($_POST['gi_lname']);
												$name = $fname.' '.$mname.' '.$lname;
												$gender = $_POST['gi_gender'];
												$age = $_POST['gi_age'];
												$spouse_name= $_POST['gi_spouse_name'];
												$spouse_bdate = $_POST['gi_spouse_bdate'];
												$spouse_bplace = $_POST['gi_spouse_bplace'];
												$civilstat = $_POST['gi_civilstat'];
												$religion = $_POST['gi_religion'];
												$telno = $_POST['gi_telno'];
												$address = ucfirst($_POST['gi_address']);
												$province_address = $_POST['gi_province_address'];
												$educ = $_POST['gi_educ'];
												$philhealth = $_POST['gi_philhealth'];
												$job = $_POST['gi_job'];
												$mo_income = $_POST['gi_mo_income'];
												$admission = $_POST['gi_admission'];
												$referring_party = $_POST['gi_referring_party'];
												$referring_party_address = $_POST['gi_referring_party_address'];
												$requirements = $_POST['gi_requirements'];
												$post = $_POST['gi_post'];
												$budget = $_POST['gi_budget'];												

												$dep_name = $_POST['gi_dep_name'];
												$dep_age = $_POST['gi_dep_age'];
												$dep_rel =  $_POST['gi_dep_rel'];
												$dep_civilstat = $_POST['gi_dep_civilstat'];
												$dep_educ =  $_POST['gi_dep_educ'];
												$dep_job = $_POST['gi_dep_job'];
																	
												$prob_presented = $_POST['gi_prob_pres'];
												$workers_assessment= $_POST['gi_workers_assessment'];
												$client_cat = $_POST['gi_client_cat'];
												$assistance = $_POST['gi_assistance'];
												$specification = $_POST ['gi_specification'];
												$value_pesos =  $_POST ['gi_value_pesos'];
												$subtotal = $_POST['gi_subtotal'];
												$amt_figures = $_POST['gi_amt_figures'];
												$amt_words = $_POST['gi_amt_words'];
												$assistance_mode = $_POST['gi_assistance_mode'];
												$assistance_source = $_POST['gi_assistance_source'];
												$assistance_material = $_POST['gi_assistance_material'];
												$total = $_POST['gi_total'];
												$interviewer = $_POST['gi_interviewer'];
												$status = $_POST['gi_status'];

												$uname = substr($fname, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;
												
												$count = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM client_gi WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname' ");
												if (mysql_num_rows($count) > 0)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Exists.");';
														echo 'location.replace("admin_add.php");';
													echo '</script>';
												}
												else
												{
													$client_insert = "INSERT INTO client_gi(uid, fname, mname, lname, gender, age, spouse_name, spouse_bdate, spouse_bplace, civilstat, religion, telno, address, province_address, educ, philhealth, job, mo_income, admission, referring_party, referring_party_address, requirements, post, budget, dep_name, dep_age, dep_rel, dep_civilstat, dep_educ, dep_job, prob_presented, workers_assessment, client_cat, assistance, specification, value_pesos, subtotal, amt_figures, amt_words, assistance_mode, assistance_source, assistance_material, total, interviewer, status)
																	VALUES('".$uid."','".$fname."','".$mname."','".$lname."','".$gender."','".$age."','".$spouse_name."','".$spouse_bdate."','".$spouse_bplace."','".$civilstat."','".$religion."','".$telno."','".$address."','".$province_address."','".$educ."','".$philhealth."','".$job."','".$mo_income."','".$admission."','".$referring_party."','".$referring_party_address."','".$requirements."','".$post."','".$budget."','".$dep_name."','".$dep_age."','".$dep_rel."','".$dep_civilstat."','".$dep_educ."','".$dep_job."','".$prob_presented."','".$workers_assessment."','".$client_cat."','".$assistance."','".$specification."','".$value_pesos."','".$subtotal."','".$amt_figures."','".$amt_words."','".$assistance_mode."','".$assistance_source."','".$assistance_material."','".$total."','".$interviewer."','".$status."')";
													$result = mysql_query($client_insert) or die("Trouble in saving data.<br />".mysql_error());
													if($result)
													{
														$client_add = "INSERT INTO users(uid, username) VALUES ('".$uid."','".$name."')";
														$added = mysql_query($client_add) or die("Trouble in saving data".mysql_error());
														if($added)
														{
															echo '<script language=javascript>';
																echo 'alert("Record Saved.");';
																echo 'location.replace("admin_view.php?table=client_gi");';
															echo '</script>';
														}
													}
													else
													{
														echo '<script language=javascript>';
															echo 'alert("Problem in saving data.");';
														echo '</script>';
													}
												}										
											}
											
											elseif($table_name == "client_pwd")
											{										
												$fname = ucfirst($_POST['pwd_fname']);
												$mname = ucfirst($_POST['pwd_mname']);
												$lname = ucfirst($_POST['pwd_lname']);
												$disability = $_POST['pwd_disability'];
												$bdate = $_POST['pwd_bdate'];
												$gender = $_POST['pwd_gender'];
												$civilstat = $_POST['pwd_civilstat'];
												$educ = $_POST['pwd_educ'];
												$assistance = $_POST['pwd_assistance'];
												$requirements = $_POST['pwd_requirements'];
												$post = $_POST['pwd_post'];
												$budget = $_POST['pwd_budget'];	
												$address = ucfirst($_POST['pwd_address']);
												$brgy = $_POST['pwd_brgy'];
												$municipality = $_POST['pwd_municipality'];
												$province = $_POST['pwd_province'];
												$region = $_POST['pwd_region'];
												$telno = $_POST['pwd_telno'];
												$celno = $_POST['pwd_celno'];
												$email = $_POST['pwd_email'];
												$empstat = $_POST['pwd_empstat'];
												$employer = $_POST['pwd_employer'];
												$employment = $_POST['pwd_employment'];
												$skill = $_POST['pwd_skill'];
												$sss = $_POST['pwd_sss'];
												$gsis = $_POST['pwd_gsis'];
												$phil_health_member = $_POST['pwd_phil_health_member'];
												$phil_health_dependent = $_POST['pwd_phil_health_dependent'];
												$dad_name = $_POST['pwd_dad_name'];
												$mom_name = $_POST['pwd_mom_name'];
												$guardian_name = $_POST['pwd_guardian_name'];
												$accom_name = $_POST['pwd_accom_name'];
												$ru_name = $_POST['pwd_ru_name'];		
												$org = $_POST['pwd_org'];
												$org_contact = $_POST['pwd_org_contact'];
												$org_address = $_POST['pwd_org_address'];
												$org_telno = $_POST['pwd_org_telno'];
												$status = $_POST['pwd_status'];

												
												
												$uname = substr($fname, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;
												
												$count = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM client_pwd WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname' ");
												if (mysql_num_rows($count) > 0)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Exists.");';
														echo 'location.replace("admin_add.php");';
													echo '</script>';
												}
												else
												{
													$client_insert = "INSERT INTO client_pwd(uid, fname, mname, lname, disability, bdate, gender, civilstat, educ, assistance, requirements, post, budget, address, brgy, municipality, province, region, telno, celno, email, empstat, employer, employment, skill, sss, gsis, phil_health_member, phil_health_dependent, dad_name, mom_name, guardian_name, accom_name, ru_name, org, org_address, org_contact, org_telno, status)
																	VALUES('".$uid."','".$fname."','".$mname."','".$lname."','".$disability."','".$bdate."','".$gender."','".$civilstat."','".$educ."','".$assistance."','".$requirements."','".$post."','".$budget."','".$address."','".$brgy."','".$municipality."','".$province."','".$region."','".$telno."','".$celno."','".$email."','".$empstat."','".$employer."','".$employment."','".$skill."','".$sss."','".$gsis."','".$phil_health_member."','".$phil_health_dependent."','".$dad_name."','".$mom_name."','".$guardian_name."','".$accom_name."','".$ru_name."','".$org."','".$org_address."','".$org_contact."','".$org_telno."','".$status."')";
													$result = mysql_query($client_insert) or die("Trouble in saving data.<br />".mysql_error());
													if($result)
													{
														$client_add = "INSERT INTO users (uid, username) VALUES ('".$uid."','".$name."')";
														$added = mysql_query($client_add) or die("Trouble in saving data".mysql_error());
														if($added)
														{
															echo '<script language=javascript>';
																echo 'alert("Record Saved.");';
																echo 'location.replace("admin_view.php?table=client_pwd");';
															echo '</script>';
														}
													}
													else
													{
														echo '<script language=javascript>';
															echo 'alert("Problem in saving data.");';
														echo '</script>';
													}
												}										
											}											
											elseif($table_name == "client_sen")	
											{
												$osca_id = $_POST['sen_osca_id'];
												$new_rep = $_POST['sen_new_rep'];
												$brgy = $_POST['sen_brgy'];
												$fname = ucfirst($_POST['sen_fname']);
												$mname = ucfirst($_POST['sen_mname']);
												$lname = ucfirst($_POST['sen_lname']);
												$bdate = ucfirst($_POST['sen_bdate']);
												$age = $_POST['sen_age'];
												$gender = $_POST['sen_gender'];
												$civilstat = $_POST['sen_civilstat'];
												$bplace = ucfirst($_POST['sen_bplace']);												
												$job = $_POST['sen_job'];
												$address = ucfirst($_POST['sen_address']);
												$other_skills = $_POST['sen_other_skills'];
												$telno = $_POST['sen_telno'];
												$assistance = $_POST['sen_assistance'];
												$requirements = $_POST['sen_requirements'];
												$post = $_POST['sen_post'];
												$budget = $_POST['sen_budget'];
												$status = $_POST['sen_status'];
												
												
												$uname = substr($fname, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;
												
												$count = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM client_sen WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname' ");
												if (mysql_num_rows($count) > 0)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Exists.");';
														echo 'location.replace("admin_add.php");';
													echo '</script>';
												}
												else
												{
													$client_insert = "INSERT INTO client_sen(uid, osca_id, new_rep, brgy, fname, mname, lname, bdate, age, gender, civilstat, bplace, address, job, other_skills, telno, assistance, requirements, post, budget, status)
																	VALUES('".$uid."','".$osca_id."','".$new_rep."','".$brgy."','".$fname."','".$mname."','".$lname."','".$bdate."','".$age."','".$gender."','".$civilstat."','".$bplace."','".$address."','".$job."','".$other_skills."','".$telno."','".$assistance."','".$requirements."','".$post."','".$budget."','".$status."')";
													$result = mysql_query($client_insert) or die("Trouble in saving data.<br />".mysql_error());
													if($result)
													{
														$client_add = "INSERT INTO users (uid, username) VALUES ('".$uid."','".$name."')";
														$added = mysql_query($client_add) or die("Trouble in saving data".mysql_error());
														if($added)
														{
															echo '<script language=javascript>';
																echo 'alert("Record Saved.");';
																echo 'location.replace("admin_view.php?table=client_sen");';
															echo '</script>';
														}
													}
													else
													{
														echo '<script language=javascript>';
															echo 'alert("Problem in saving data.");';
														echo '</script>';
													}
												}										
											}				
											
											elseif($table_name == "client_yth")	
											{
												$fname= ucfirst($_POST['yth_fname']);
												$mname = ucfirst($_POST['yth_mname']);
												$lname = ucfirst($_POST['yth_lname']);
												$gender = $_POST['yth_gender'];
												$age = $_POST['yth_age'];
												$address = ucfirst($_POST['yth_address']);
												$religion = $_POST['yth_religion'];
												$bplace = ucfirst($_POST['yth_bplace']);
												$bdate = $_POST['yth_bdate'];
												$dad_name = $_POST['yth_dad_name'];
												$mom_name = $_POST['yth_mom_name'];
												$sib_name = $_POST['yth_sib_name'];
												$sib_gender = $_POST['yth_sib_gender'];
												$sib_age = $_POST['yth_sib_age'];
												$sib_grade = $_POST['yth_sib_grade'];
												$sib_isy = $_POST['yth_sib_isy'];
												$sib_osy = $_POST['yth_sib_osy'];												
												$school = $_POST['yth_school'];
												$school_level = $_POST['yth_school_level'];
												$school_year = $_POST['yth_school_year'];												
												$skills = $_POST['yth_skills'];
												$interest = $_POST['yth_interest'];
												$job = $_POST['yth_job'];
												$job_year = $_POST['yth_job_year'];
												$job_title = $_POST['yth_job_title'];
												$job_income = $_POST['yth_job_income'];
												$reason_of_leaving = $_POST['yth_reason_of_leaving'];
												$org_name = $_POST['yth_org_name'];
												$org_position = $_POST['yth_org_position'];
												$org_years = $_POST['yth_org_years'];
												$youth_org_name = $_POST['yth_youth_org_name'];
												$youth_org_position = $_POST['yth_youth_org_position'];
												$youth_service_provider = $_POST['yth_youth_service_provider'];
												$status = $_POST['yth_status'];

												
												
											$uname = substr($fname, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;
												
												$count = mysql_query("SELECT *, date_format(date, '%M %d, %Y %r') AS date FROM client_yth WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname' ");
												if (mysql_num_rows($count) > 0)
												{
													echo '<script language=javascript>';
														echo 'alert("Record Exists.");';
														echo 'location.replace("admin_add.php");';
													echo '</script>';
												}
												else
												{
													$client_insert = "INSERT INTO client_yth(uid, fname, mname, lname, gender, age, address, religion, bdate, bplace, dad_name, mom_name, sib_name, sib_gender, sib_age, sib_grade, sib_ISY, sib_OSY, school, school_level, school_year, skills, interest, job, job_year, job_title, job_income, reason_of_leaving, org_name, org_position, org_years, youth_org_name, youth_org_position, youth_service_provider, status)
																	VALUES('".$uid."','".$fname."','".$mname."','".$lname."','".$gender."','".$age."','".$address."','".$religion."','".$bdate."','".$bplace."','".$dad_name."','".$mom_name."','".$sib_name."','".$sib_gender."','".$sib_age."','".$sib_grade."','".$sib_isy."','".$sib_osy."','".$school."','".$school_level."','".$school_year."','".$skills."','".$interest."','".$job."','".$job_year."','".$job_title."','".$job_income."','".$reason_of_leaving."','".$org_name."','".$org_position."','".$org_years."','".$youth_org_name."','".$youth_org_position."','".$youth_service_provider."','".$status."')";
													$result = mysql_query($client_insert) or die("Trouble in saving data.<br />".mysql_error());
													if($result)
													{
														$client_add = "INSERT INTO users (uid, username) VALUES ('".$uid."','".$name."')";
														$added = mysql_query($client_add) or die("Trouble in saving data".mysql_error());
														if($added)
														{
															echo '<script language=javascript>';
																echo 'alert("Record Saved.");';
																echo 'location.replace("admin_view.php?table=client_yth");';
															echo '</script>';
														}
													}
													else
													{
														echo '<script language=javascript>';
															echo 'alert("Problem in saving data.");';
														echo '</script>';
													}
												}										
											}	
											
											
											elseif($table_name == "directory")
											{
												$office = $_POST['office'];
												$floors = $_POST['floors'];
												$telno = $_POST['telno'];
												$email1 = $_POST['email1'];
												$email2 = $_POST['email2'];
												$email = $email1.'<br />'.$email2;
												$oic = $_POST['oic'];

												$table_insert = "INSERT INTO $table_name(office, floors, telno, email, oic) VALUES('".$office."','".$floors."','".$telno."','".$email."','".$oic."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php");';
													echo '</script>';
												}
											}
											elseif($table_name == "faq")
											{
												$question = $_POST['question'];
												$answer = $_POST['answer'];

												$table_insert = "INSERT INTO $table_name(question, answer) VALUES('".$question."','".$answer."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php");';
													echo '</script>';
												}
											}
											elseif($table_name == "feedback")
											{
												echo '<script language="javascript">';
													echo 'alert("Cannot alter record!");';
													echo 'location.replace("home.php");';
												echo '</script>';
											}
											elseif($table_name == "legal")
											{
												$tc = $_POST['tc'];

												$table_insert = "INSERT INTO $table_name(tc) VALUES('".$tc."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php");';
													echo '</script>';
												}
											}
											elseif($table_name == "log")
											{
												echo '<script language="javascript">';
													echo 'alert("Cannot alter record!");';
													echo 'location.replace("home.php");';
												echo '</script>';
											}
											elseif($table_name == "managers")
											{
												$name = $_POST['name'];
												$pwd = $_POST['pwd'];
												$uname = substr($name, 0, 3);
												$today = str_replace("/", "" ,strftime('%x')).str_replace(":", "" ,strftime('%X'));
												$uid = $uname.$today;


												$table_insert = "INSERT INTO $table_name(uid, name, pwd) VALUES('".$uid."','".$name."','".$pwd."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php");';
													echo '</script>';
												}
											}
											elseif($table_name == "services")
											{
												$title = $_POST['title'];
												$division = $_POST['division'];
												$description = $_POST['description'];

												$table_insert = "INSERT INTO $table_name(title, division, description) VALUES('".$title."','".$division."','".$description."')";
												$result = mysql_query($table_insert) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php");';
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