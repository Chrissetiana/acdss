<html>
	<nav class="art-nav clearfix">
		<div class="art-nav-inner">			
			<ul class="art-hmenu">
			<?php
				if($_SESSION['valid_type'] == 'Administrator')
				{
					echo '<li><a href="home.php">Administrator Home</a></li>';
					echo '<li><a href="admin_archives.php">Archives</a></li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="users.php">Create Another User</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'Client')
				{
					echo '<li><a href="home.php">Home</a></li>';
					echo '<li><a href="services.php">Programs & Services</a><ul>';
						echo '<li><a href="services_relief_public_assistance.php">Relief and Public Assistance Division</a>';
							echo '<ul>';
								echo '<li><a href="services_relief_public_assistance.php#crisis">Assistance in Crisis Situation</a></li>';
								echo '<li><a href="services_relief_public_assistance.php#province">Balik-Probinsya Assistance</a></li>';
								echo '<li><a href="services_relief_public_assistance.php#core">Core Shelter Assistance</a></li>';
								echo '<li><a href="services_relief_public_assistance.php#emdisaster">Emergency Disaster Relief</a></li>';
								echo '<li><a href="services_relief_public_assistance.php#emshelter">Emergency Shelter Assistance</a></li>';
							echo '</ul>';
						echo '</li>';
						echo '<li><a href="services_comm_outreach.php">Community Outreach Division</a>';
							echo '<ul>';
								echo '<li><a href="services_comm_outreach.php#youth">Children and Youth Development Program</a></li>';
								echo '<li><a href="services_comm_outreach.php#family">Family and Community Development Program</a></li>';
								echo '<li><a href="services_comm_outreach.php#pwd">Persons with Disability Development Program</a></li>';
								echo '<li><a href="services_comm_outreach.php#senior">Senior Citizen"s Development Program</a></li>';
								echo '<li><a href="services_comm_outreach.php#women">Women"s Welfare Program</a></li>';
							echo '</ul>';
						echo '</li>';
						echo '<li><a href="services_residential_rehabilitation.php">Residential and Rehabilitation Division</a>';
							echo '<ul>';
								echo '<li><a href="services_residential_rehabilitation.php#bahaykalinga">Bahay Kalinga-Antipolo Center for Girls</a>';
								echo '<li><a href="services_residential_rehabilitation.php#daycenter">Day Center for Street Children cum CICL Custodial Care Shelter</a>';
							echo '</ul>';
						echo '</li>';
						echo '<li><a href="services_special_prog_proj.php">Special Programs and Projects</a>';
							echo '<ul>';
								echo '<li><a href="services_special_prog_proj.php#4ps">Pantawid Pamilyang Pilipino Program</a></li>';
								echo '<li><a href="services_special_prog_proj.php#certs">Issuance of Certificates, Referrals, Reports</a></li></ul></li>';
							echo '</ul>';
						echo '</li>';
					$table_query = mysql_query("SELECT * FROM clients WHERE uid='".$_SESSION['valid_uid']."' AND status='Active'") or die("This webpage is not available.<br />".mysql_error());
					if($table_query)
					{
						$table_row = mysql_fetch_array($table_query);
						echo '<li><a href="profile.php?form=clients&id='.$table_row['id'].'&uid='.$_SESSION['valid_uid'].'">Profile</a></li>';
					}
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'CSWD')
				{
					echo '<li><a href="home.php">Home</a></li>';
					echo '<li><a href="financial_assistance_app.php">Add Record</a></li>';
					echo '<li><a href="">Manage Records</a>';
						echo '<ul>';						
							echo '<li><a href="view.php">Records</a></li>';							
							echo '<li><a href="cswd_archives.php">Archives</a></li>';
						echo '</ul>';
					echo '</li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'CADMIN')
				{
					echo '<li><a href="home.php">Home</a></li>';					
					echo '<li><a href="">Requests</a>';
						echo '<ul>';
							echo '<li><a href="view.php?post=pending">Pending</a></li>';
							echo '<li><a href="view.php?post=approved">Approved</a></li>';
							echo '<li><a href="view.php?post=reapply">Re-apply</a></li>';
						echo '</ul>';
					echo '</li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'CBUDGET')
				{
					echo '<li><a href="home.php">Home</a></li>';
					echo '<li><a href="budget_allotment.php">Budget Allocation</a></li>';
					echo '<li><a href="view.php">Approved Assistances</a></li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'CACCTG')
				{
					echo '<li><a href="home.php">Home</a></li>';
					echo '<li><a href="view.php">Approved Assistances</a></li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				elseif($_SESSION['valid_type'] == 'CTRSRY')
				{
					echo '<li><a href="home.php">Home</a></li>';
					echo '<li><a href="view.php">Approved Assistances</a></li>';
					echo '<li><a href="">Account</a>';
						echo '<ul>';
							echo '<li><a href="password.php">Change Login Details</a></li>';
							echo '<li><a href="logout.php">Logout</a></li>';
						echo '</ul>';
					echo '</li>';
				}
				else
					echo '<br />&nbsp;<br />';
			?>
			</ul>
		</div>
	</nav>
</html>