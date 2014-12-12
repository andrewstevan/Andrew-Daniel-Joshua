<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['edit_about_us']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		# Menerima data input
		$desc		= $_POST['au_about_us'];
		
		$sqlUpdate = mysql_query("UPDATE cw_about_us SET description = '$desc' WHERE about_id = '$id'") or die(mysql_error());

		header('location:../about-us.php?message=updated');
	}	# End of submit
?>