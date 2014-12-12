<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['edit_level']))
	{
		if(isset($_GET['id']))
		{
			$id= $_GET['id'];
		}
		# Menerima data input
		$level_name	= $_POST['ul_name'];
				
		# Menyimpan ke dalam database
		$sqlInsert = mysql_query("UPDATE cw_user_level SET level_name = '$level_name' WHERE level_id = '$id'") or die(mysql_error());
//		echo $sqlInsert = "UPDATE cw_user_level SET level_name = '$level_name' WHERE level_id = '$id'";
//	exit;
		header('location:../user-level.php?level=updated');
	}	# End of submit
?>