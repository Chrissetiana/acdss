<?php
	include("session_call.php");
	if($_SESSION['valid_type'] != 'Administrator')
	{
		echo '<script language="javascript">';
			echo 'location.replace("index.php");';
		echo '</script>';
	}

	if ((isset($_GET['table'])) && (isset($_GET['action'])) )
	{
		$table_name = trim($_GET['table']);
		$action = trim($_GET['action']);
	}
	else
	{
		header("location: admin_view.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Admin | Print</title>
		<link type="text/css" rel="stylesheet" href="style.css" media="screen" />
		<link type="text/css" rel="stylesheet" href="print.css" />
		<script type="text/javascript" src="print.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body onload="window.print()"><a name="top"></a>
		<div id="container">
			<img src="images\banner.jpg" width="100%" height="" />
			<?php
				include("connection.php");

				$table_name = $_GET['table'];

				$table_query = mysql_query("SELECT * FROM $table_name ORDER by id ASC") or die("This webpage is not available.<br />".mysql_error());
				if($table_query)
				{
					if(mysql_num_rows($table_query) > 0)
					{
						if($table_name == 'clients')
						{
							echo '<br />';
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFFF">ID</th>';
									echo '<th bgcolor="#FFFFFF">UID</th>';
									echo '<th bgcolor="#FFFFFF">DATE CREATED</th>';
									echo '<th bgcolor="#FFFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
						elseif($table_name == 'client_gi')
						{
							echo '<br />';
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFFF">ID</th>';
									echo '<th bgcolor="#FFFFFF">UID</th>';
									echo '<th bgcolor="#FFFFFF">DATE CREATED</th>';
									echo '<th bgcolor="#FFFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
						elseif($table_name == 'client_pwd')
						{
							echo '<br />';
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFF">ID</th>';
									echo '<th bgcolor="#FFFFF">UID</th>';
									echo '<th bgcolor="#FFFFF">DATE CREATED</th>';
									echo '<th bgcolor="#FFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
						elseif($table_name == 'client_sen')
						{
							echo '<br />';
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFF">ID</th>';
									echo '<th bgcolor="#FFFFF">UID</th>';
									echo '<th bgcolor="#FFFFF">DATE CREATED</th>';
									echo '<th bgcolor="#FFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
						elseif($table_name == 'client_yth')
						{
							echo '<br />';
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFF">ID</th>';
									echo '<th bgcolor="#FFFFF">UID</th>';
									echo '<th bgcolor="#FFFFF">DATE CREATED</th>';
									echo '<th bgcolor="#FFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
						elseif($table_name == "directory")
						{
							echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
								echo '<tr bgcolor="#666666">';
									echo '<th bgcolor="#FFFFF">ID</th>';
									echo '<th bgcolor="#FFFFF">OFFICE</th>';
									echo '<th bgcolor="#FFFFF">FLOOR</th>';
									echo '<th bgcolor="#FFFFF">EMAIL</th>';
									echo '<th bgcolor="#FFFFF">TEL NO</th>';
									echo '<th bgcolor="#FFFFF">OIC</th>';
									echo '<th bgcolor="#FFFFF">STATUS</th>';
								echo '</tr>';

							while ($table_row = mysql_fetch_array($table_query))
							{
								echo '<tr>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['office'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['floors'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['email'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['telno'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['oic'].'</td>';
									echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
								echo '</tr>';
							}
						}
					elseif($table_name == "faq")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">QUESTION</th>';
								echo '<th bgcolor="#FFFFF">ANSWER</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['question'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['answer'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "feedback")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">NAME</th>';
								echo '<th bgcolor="#FFFFF">EMAIL</th>';
								echo '<th bgcolor="#FFFFF">GENDER</th>';
								echo '<th bgcolor="#FFFFF">RATING</th>';
								echo '<th bgcolor="#FFFFF">MESSAGE</th>';
								echo '<th bgcolor="#FFFFF">DATE POSTED</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['fname'].' '.$table_row['sname'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['email'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['gender'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['rating'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['comments'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['dateposted'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "flow")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">DEPARTMENT</th>';
								echo '<th bgcolor="#FFFFF">INPUT</th>';
								echo '<th bgcolor="#FFFFF">PROCESS</th>';
								echo '<th bgcolor="#FFFFF">OUTPUT</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['dept'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['input'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['process'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['output'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "legal")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">TERMS</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['tc'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "log")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">DATE</th>';
								echo '<th bgcolor="#FFFFF">USER</th>';
								echo '<th bgcolor="#FFFFF">TYPE</th>';
								echo '<th bgcolor="#FFFFF">ACTIVITY</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['date'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['username'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['type'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['audit'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "requirements")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">REQUIREMENTS</th>';
								echo '<th bgcolor="#FFFFF">TYPE</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['requirements'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['type'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "services")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">TITLE</th>';
								echo '<th bgcolor="#FFFFF">DIVISION</th>';
								echo '<th bgcolor="#FFFFF">DESCRIPTION</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['title'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['division'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['description'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}
					elseif($table_name == "users")
					{
						echo '<table class="art-article" cellpadding="2" cellspacing="10" style="border:0;width:100%;">';
							echo '<tr bgcolor="#666666">';
								echo '<th bgcolor="#FFFFF">ID</th>';
								echo '<th bgcolor="#FFFFF">UID</th>';
								echo '<th bgcolor="#FFFFF">NAME</th>';
								echo '<th bgcolor="#FFFFF">TYPE</th>';
								echo '<th bgcolor="#FFFFF">DATE CREATED</th>';
								echo '<th bgcolor="#FFFFF">STATUS</th>';
							echo '</tr>';

						while ($table_row = mysql_fetch_array($table_query))
						{
							echo '<tr>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['id'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['uid'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['username'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['type'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['dateAdded'].'</td>';
								echo '<td bgcolor="#FFFFFF">'.$table_row['status'].'</td>';
							echo '</tr>';
						}
					}						
				}
					echo '<tr>';
						echo '<td colspan="6">'.mysql_num_rows($table_query).' records found</td>';
					echo '</tr>';
				echo '</table>';
			}
			?>
		</div>
	</body>
</html>