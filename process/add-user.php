<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date('Y-m-d H:i:s', time());

	if(isset($_POST['add_user']))
	{
		# Menerima data input
		$name		= $_POST['us_name'];
		$nickname	= $_POST['us_nickname'];
		$pass		= $_POST['us_password'];
		$re_pass	= $_POST['us_re_password'];
		$email		= $_POST['us_email'];
		$level		= $_POST['us_user_level'];
		$status		= $_POST['us_status'];
		
		$pass2 = mysql_real_escape_string(md5($pass));
		
		$sqlInsert = mysql_query("INSERT INTO cw_users SET name = '$name', nickname = '$nickname', password = '$pass2', email = '$email',
							level_id = '$level', date_created = '$datetime', status = '$status'") or die(mysql_error());
	
		header('location:../manage-user.php?user=added');
	}	# End of submit
?>