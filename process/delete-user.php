<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	
	# Menghapus isi dari database
	$sqlDelete = mysql_query("DELETE FROM cw_users WHERE user_id = '$id'") or die(mysql_error());
	header("location:../manage-user.php?user=deleted");
?>