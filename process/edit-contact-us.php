<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['edit_contact_us']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		# Menerima data input
		$email		= $_POST['cu_email'];
		$subject	= $_POST['cu_subject'];
		
		$sqlUpdate = mysql_query("UPDATE cw_contact_us SET contact_email = '$email', subject = '$subject' WHERE contact_id = '$id'") or die(mysql_error());

		header('location:../contact-us.php?contact=updated');
	}	# End of submit
?>