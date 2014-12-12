<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_about_us']))
	{
		# Menerima data input
		$desc		= $_POST['au_about_us'];
		
		$sqlInsert = mysql_query("INSERT INTO cw_about_us SET description = '$desc'") or die(mysql_error());
	
		header('location:../about-us.php?message=added');
	}	# End of submit
?>