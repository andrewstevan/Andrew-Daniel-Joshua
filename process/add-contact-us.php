<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_contact_us']))
	{
		# Menerima data input
		$email		= $_POST['cu_email'];
		$subject	= $_POST['cu_subject'];
		
		$sqlInsert = mysql_query("INSERT INTO cw_contact_us SET contact_email = '$email', subject = '$subject'") or die(mysql_error());
	
		header('location:../contact-us.php?contact=added');
	}	# End of submit
?>