<?php
	include("session_call.php");
	if($_SESSION['valid_type'] != 'Administrator')
	{
		echo '<script language="javascript">';
			echo 'location.replace("index.php");';
		echo '</script>';
	}

	if ((isset($_GET['table'])))
	{
		$table_name = trim($_GET['table']);
	}
	else
	{
		//header("location: admin_home.php");
		//exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="images\icon.ico" rel="shortcut icon" />
		<title>ACDSS | Admin | View</title>
		<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.css" media="screen" />
		<!--[if lte IE 7]><link type="text/css" rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
		<link type="text/css" rel="stylesheet" href="style.responsive.css" media="all" />
		<link rel="stylesheet" type="text/css" href="jquery.jqplot.css" />
		<!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.js"></script><![endif]-->
		
		<link rel="stylesheet" href="demos.css" type="text/css" media="screen" />
    
    <script src="RGraph.common.core.js" ></script>
    <script src="RGraph.common.dynamic.js" ></script>
    <script src="RGraph.common.tooltips.js" ></script>
    <script src="RGraph.common.effects.js" ></script>
    <script src="RGraph.pie.js" ></script>
		

		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript" src="script.responsive.js"></script>
		<script language="javascript" type="text/javascript" src="jquery.jqplot.js"></script>
		<script language="javascript" type="text/javascript" src="jqplot.pieRenderer.js"></script>
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
									<h2 class="art-postheader">View Reports</h2>
									<div class="art-postcontent art-postcontent-0 clearfix">
									<form name="mark" method="post">
										<?php
											include("connection.php");
											error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
										?>
									
										
										<?php
											$table_name = $_GET['table'];
											
											
											
											$legal= "SELECT * FROM $table_name WHERE assistance = 'Burial'";
											$result = mysql_query($legal);
										    $count= mysql_num_rows($result);
											
											echo "<input type='hidden' name='tb1' value='$count'>";

											$legal2= "SELECT * FROM $table_name WHERE assistance = 'Financial'";
											$result2 = mysql_query($legal2);
										    $count2= mysql_num_rows($result2);
											
											echo "<input type='hidden' name='tb2' value='$count2'>";
											
											$legal3= "SELECT * FROM $table_name WHERE assistance = 'Medical'";
											$result3 = mysql_query($legal3);
										    $count3= mysql_num_rows($result3);
											
											echo "<input type='hidden' name='tb3' value='$count3'>";			
											

											$table_query = mysql_query("SELECT * FROM $table_name ORDER by id ASC") or die("This webpage is not available.<br />".mysql_error());
											if($table_query)
											{
												if(mysql_num_rows($table_query) > 0)
												{
													if($table_name == "clients")
													{
													
													echo "<center><canvas id='cvs' width='700' height='400'>[No canvas support]</canvas>
    
													<script>
														window.onload = function(){
														var tb1 = 0;
														tb1 = Math.abs(parseInt(document.mark.tb1.value));
														tb2 = Math.abs(parseInt(document.mark.tb2.value));
														tb3 = Math.abs(parseInt(document.mark.tb3.value));														
														var pie1 = new RGraph.Pie('cvs', [tb1,tb2,tb3]);      
														pie1.Set('chart.radius', 150);		
														pie1.Set('chart.tooltips', ['Burial ('+ tb1 +')', 'Financial ('+ tb2 +')', 'Medical ('+ tb3 +')']);
														pie1.Set('chart.labels', ['Burial ('+ tb1 +')', 'Financial ('+ tb2 +')', 'Medical ('+ tb3 +')']);
														pie1.Set('chart.strokestyle', 'white');
														pie1.Set('chart.linewidth', 5);
														pie1.Set('chart.shadow', true);
														pie1.Set('chart.shadow.blur', 10);
														pie1.Set('chart.shadow.offsetx', 0);
														pie1.Set('chart.shadow.offsety', 0);
														pie1.Set('chart.shadow.color', '#000');
														pie1.Set('chart.text.color', '#fff');
        
														var explode = 20;

														function myExplode (obj)
															{
															window.__pie__ = pie1;

															for (var i=0; i<obj.data.length; ++i) {
															setTimeout('window.__pie__.Explode('+i+',10)', i * 50);
															}
														}

														if (RGraph.isOld()) {
															pie1.Draw();
        
															} else if (navigator.userAgent.toLowerCase().indexOf('firefox') >= 0) {
															RGraph.Effects.Pie.RoundRobin(pie1);
        
														} else {
															/**
															* The RoundRobin callback initiates the exploding
															*/

														RGraph.Effects.Pie.RoundRobin(pie1, null, myExplode);
														RGraph.Effects.Pie.Implode(pie1);
														}}
													</script>";
													
										echo "<form action='report.php' method='POST'>";
										echo "<input type='submit' name='sort' value='Sort by' class='art-button'>";
										echo "<select name='search'>";
										echo "<option value='Date'>"."Date"."</option>";
										echo "<option value='Brgy'>"."Barangay"."</option>";
										echo "<option value='Age'>"."Age"."</option>";
										echo "<option value='Gender'>"."Gender"."</option>";
										echo "<option value='Assistance'>"."Assistance"."</option>";
										
										echo "</select>";
										
										echo "</form>";
										echo "</br>";
										echo "</br>";
										if(!isset($_POST['sort']))
										{
											$query = "Select * From clients";
											$result = mysql_query($query);
											echo "<table border=1>";
											echo "<tr>";
											echo "<th>Date</th>";
											echo "<th>Name</th>";
											echo "<th>Barangay</th>";
											echo "<th>Age</th>";
											echo "<th>Gender</th>";
											echo "<th>Assistance</th>";
											echo "</tr>";
											while($row = mysql_fetch_array($result))
											{
												echo "<tr>";
												echo "<td>".$row['date']."</td>";
												echo "<td>".$row['lname'].", ".$row['fname']." ".$row['mname']."</td>";
												echo "<td>".$row['brgy']."</td>";
												echo "<td>".$row['age']."</td>";
												echo "<td>".$row['gender']."</td>";
												echo "<td>".$row['assistance']."</td>";
												echo "</tr>";
											}
											echo "</table>";
											
										}
										else
										{
										$search = $_POST['search'];
											$query = "Select * From clients ORDER BY $search ASC";
											$result = mysql_query($query);
											echo "<table border=1>";
											echo "<tr>";
											echo "<th>Date</th>";
											echo "<th>Name</th>";
											echo "<th>Barangay</th>";
											echo "<th>Age</th>";
											echo "<th>Gender</th>";
											echo "<th>Assistance</th>";
											echo "</tr>";
											while($row = mysql_fetch_array($result))
											{
												echo "<tr>";
												echo "<td>".$row['date']."</td>";
												echo "<td>".$row['lname'].", ".$row['fname']." ".$row['mname']."</td>";
												echo "<td>".$row['brgy']."</td>";
												echo "<td>".$row['age']."</td>";
												echo "<td>".$row['gender']."</td>";
												echo "<td>".$row['assistance']."</td>";
												echo "</tr>";
											}
											echo "</table>";
										
										}
											}
												}
												else
													echo "No records found.";
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