<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date('Y-m-d H:i:s', time());

	if(isset($_POST['update_user']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		# Menerima data input
		$name		= $_POST['us_name'];
		$nickname	= $_POST['us_nickname'];
		$old_pass	= $_POST['us_old_password'];
		$new_pass	= $_POST['us_new_password'];
		$re_pass	= $_POST['us_re_password'];
		$email		= $_POST['us_email'];
		$level		= $_POST['us_user_level'];
		$status		= $_POST['us_status'];
				
		$pass2 = mysql_real_escape_string(md5($new_pass));

		if($old_pass == "")
		{
			if($_SESSION['level'] == 1)
			{
				$sqlUpdate = mysql_query("UPDATE cw_users SET name = '$name', nickname = '$nickname', email = '$email',
									level_id = '$level', date_modified = '$datetime', status = '$status'
									WHERE user_id = '$id'") or die(mysql_error());
				echo "UPDATE cw_users SET name = '$name', nickname = '$nickname', email = '$email',
									level_id = '$level', date_modified = '$datetime', status = '$status'
									WHERE user_id = '$id'";			
			}
			elseif($_SESSION['level'] == 2)
			{
				$sqlUpdate = mysql_query("UPDATE cw_users SET name = '$name', date_modified = '$datetime', status = '$status'
										  WHERE user_id = '$id'") or die(mysql_error());
			}
		
			header('location:../manage-user.php?user=updated');
		}
		elseif($old_pass != "")
		{
			$sqlSelect = mysql_query("SELECT * FROM cw_users WHERE user_id = '$id' AND password = '".md5($old_pass)."'") or die(mysql_error());
			$user = mysql_fetch_array($sqlSelect);
			if(md5($old_pass) == $user['password'])
			{
				if($_SESSION['level'] == 1)
				{
					$sqlUpdate = mysql_query("UPDATE cw_users SET name = '$name', nickname = '$nickname', password = '$pass2', email = '$email',
										level_id = '$level', date_modified = '$datetime', status = '$status'
										WHERE user_id = '$id'") or die(mysql_error());
				}
				elseif($_SESSION['level'] == 2)
				{
					$sqlUpdate = mysql_query("UPDATE cw_users SET name = '$name', password = '$pass2', date_modified = '$datetime', status = '$status'
											  WHERE user_id = '$id'") or die(mysql_error());
				}
				header('location:../manage-user.php?user=updated');
			}
			else
				{
					echo "<script>alert('Maaf password lama tidak sesuai');</script>";
					echo "<script>return false;</script>";
				}
		}
		
	}	# End of submit
?>