<?php
	$query_tables = mysql_query("SHOW TABLES IN acdss");
	if ($query_tables)
	{
		if (mysql_num_rows($query_tables) != 0)
		{
			while ($table_row = mysql_fetch_array($query_tables))
			{
				$table_name = $table_row['Tables_in_acdss'];
				$query_status = mysql_query("SHOW TABLE STATUS FROM acdss LIKE '$table_name'");
				if ($query_status)
				{
					if (mysql_num_rows($query_status) != 0)
					{
						while ($table_row = mysql_fetch_array($query_status))
						{
							if ($table_name != "account")
								echo '<option value="".$table_row["Name"]."">'.$table_row['Name'].'</option>';
						}
					}
				}
			}
		}
	}
?>