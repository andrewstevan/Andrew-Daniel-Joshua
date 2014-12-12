<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_level']))
	{
		# Menerima data input
		$level_id	= $_POST['ul_id'];
		$level_name	= $_POST['ul_name'];
				
		# Menyimpan ke dalam database
		$sqlInsert = mysql_query("INSERT INTO cw_user_level SET level_id = '$level_id', level_name = '$level_name'") or die(mysql_error());
	
		header('location:../user-level.php?level=added');
	}	# End of submit
?>