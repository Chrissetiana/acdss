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

											$table_name = $_POST['table'];
											$id = $_POST['id'];

											if($table_name == "users")
											{
												$name = mysql_escape_string(trim($_POST['user_name']));
												$pwd = mysql_escape_string(trim($_POST['user_pwd']));

												$table_update = "UPDATE $table_name SET username='$name', password='$pwd' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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
												$job = ucfirst($_POST['client_job']);
												$informant = ucfirst($_POST['client_informant']);
												$informant_rel = ucfirst($_POST['client_informant_rel']);
												$assistance = $_POST['client_assistance'];
												$requirements = $_POST['client_requirements'];
												$post = $_POST['client_post'];
												$budget = $_POST['client_budget'];
												$dep_name = ucfirst($_POST['client_dep_name']);
												$dep_age = $_POST['client_dep_age'];
												$dep_rel = ucfirst($_POST['client_dep_rel']);
												$dep_civilstat = $_POST['client_dep_civilstat'];
												$dep_educ= ucfirst($_POST['client_dep_educ']);
												$dep_job = ucfirst($_POST['client_dep_job']);
												$prob_presented = ucfirst($_POST['client_prob_pres']);
												$present_functioning = ucfirst($_POST['client_pres_functioning']);
												$fam_rel = ucfirst($_POST['client_fam_rel']);
												$support_sys = ucfirst($_POST['client_support_sys']);
												$eco_condition = ucfirst($_POST['client_eco_con']);
												$other_assistances = ucfirst($_POST['client_other_assist']);
												$eval = ucfirst($_POST['client_eval']);
												$status = $_POST['client_status'];

												$table_update = "UPDATE $table_name SET brgy='$brgy', fname='$fname', mname='$mname', lname='$lname', age='$age', religion='$religion', civilstat='$civilstat', bdate='$bdate', bplace='$bplace', address='$address', educ='$educ', job='$job', informant='$informant', informant_rel='$informant_rel', assistance='$assistance', requirements='$requirements', post='$post', budget='$budget', dep_name='$dep_name', dep_age='$dep_age', dep_rel='$dep_rel', dep_civilstat='$dep_civilstat', dep_educ='$dep_educ', dep_job='$dep_job', prob_presented='$prob_presented', present_functioning='$present_functioning', fam_rel='$fam_rel', support_sys='$support_sys', eco_condition='$eco_condition', other_assistances='$other_assistances', eval='$eval', status='$status'  WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=client_cs");';
													echo '</script>';
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

												$table_update = "UPDATE $table_name SET fname='$fname', mname='$mname', lname='$lname', gender='$gender', age='$age', spouse_name='$spouse_name', spouse_bdate='$spouse_bdate', spouse_bplace='$spouse_bplace', civilstat='$civilstat', religion='$religion', telno='$telno', address='$address', province_address='$province_address', educ='$educ', philhealth='$philhealth', job='$job', mo_income='$mo_income', admission='$admission', referring_party='$referring_party', referring_party_address='$referring_party_address', requirements='$requirements', post='$post', budget='$budget', dep_name='$dep_name', dep_age='$dep_age', dep_rel='$dep_rel', dep_job='$dep_job', dep_educ='$dep_educ', dep_job='$dep_job', prob_presented='$prob_presented', workers_assessment='$workers_assessment', client_cat='$client_cat', assistance='$assistance', specification='$specification', value_pesos='$value_pesos', subtotal='$subtotal', amt_figures='$amt_figures', amt_words='$amt_words', assistance_mode='$assistance_mode', assistance_source='$assistance_source', assistance_material='$assistance_material', total='$total', interviewer='$interviewer', status='$status'  WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=client_gi");';
													echo '</script>';


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


												$table_update = "UPDATE $table_name SET fname='$fname', mname='$mname', lname='$lname', disability='$disability', bdate='$bdate', gender='$gender', educ='$educ', assistance='$assistance', requirements='$requirements', post='$post', budget='$budget', address='$address', brgy='$brgy', municipality='$municipality', province='$province', region='$region', telno='$telno', celno='$celno', email='$email', empstat='$empstat', employer='$employer', employment='$employment', skill='$skill', sss='$gsis', phil_health_member='$phil_health_member', phil_health_dependent='$phil_health_dependent', dad_name='$dad_name', mom_name='$mom_name', guardian_name='$guardian_name', accom_name='$accom_name', ru_name='$ru_name', org='$org', org_address='$org_address', org_contact='$org_contact', org_telno='$org_telno', status='$status'  WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=client_pwd");';
													echo '</script>';


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

												$table_update = "UPDATE $table_name SET osca_id='$osca_id', new_rep='$new_rep', fname='$fname', mname='$mname', lname='$lname', bdate='$bdate', age='$age', gender='$gender', civilstat='$civilstat', bplace='$bplace', address='$address', job='$job', other_skills='$other_skills', telno='$telno', assistance='$assistance', requirements='$requirements', post='$post', budget='$budget', status='$status'  WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=client_sen");';
													echo '</script>';


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


												$table_update = "UPDATE $table_name SET fname='$fname', mname='$mname', lname='$lname', gender='$gender', age='$age', address='$address', religion='$religion', bdate='$bdate', bplace='$bplace', dad_name='$dad_name', mom_name='$mom_name', sib_name='$sib_name', sib_gender='$sib_gender', sib_age='$sib_age', sib_grade='$sib_grade', sib_ISY='$sib_isy', sib_OSY='$sib_osy', school='$school', school_level='$school_level', school_year='$school_year', skills='$skills', interest='$interest', job='$job', job_year='$job_year', job_title='$job_title', job_income='$job_income', reason_of_leaving='$reason_of_leaving', org_name='$org_name', org_position='$org_position', org_years='$org_years', youth_org_name='$youth_org_name', youth_org_position='$youth_org_position', youth_service_provider='$youth_service_provider', status='$status'  WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
												if($result)
												{
													echo '<script language="javascript">';
														echo 'alert("Record Saved");';
														echo 'location.replace("admin_view.php?table=client_yth");';
													echo '</script>';


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

												$table_update = "UPDATE $table_name SET office='$office', floors='$floors', telno='$telno', email='$email', oic='$oic' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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

												$table_update = "UPDATE $table_name SET question='$question', answer='$answer' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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

												$table_update = "UPDATE $table_name SET tc='$tc' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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

												$table_update = "UPDATE $table_name SET name='$name', pwd='$pwd' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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

												$table_update = "UPDATE $table_name SET title='$title', division='$division', description='$description' WHERE id=$id LIMIT 1";
												$result = mysql_query($table_update) or die("No data received.<br />".mysql_error());
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